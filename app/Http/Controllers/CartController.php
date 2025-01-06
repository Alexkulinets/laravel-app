<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
        $product = DB::table('products')->where('id', $id)->first(); // витягуємо з дб

        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.'); // дивимось чи існує товар 
        }

        $cart = session()->get('cart', []); // отримуємо існуючий товар 

        foreach ($cart as &$item) {
            if (isset($item['original_price'])) {
                $item['price'] = $item['original_price']; // Повертаємо ціну до оригінальної
            }
        }   

        $product->image = explode('; ', $product->image);

        if (isset($cart[$id])) { 
            $cart[$id]['quantity']++; // якщо товар вже є то додаємо ще один такий же
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "original_price" => $product->price,  // якщо товару немає просто додаємо 
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->forget('discount_applied'); // при додавані новго товару видалємо знижку щоб застосувати повторно 
        session()->put('cart', $cart); // записуємо кошик в сесії 

        return redirect()->route('cart')->with('success', 'Product added to cart!'); // відправлеємо користувача в корзину
    }


    public function saveDiscountCode(Request $request){
        $discountCode = $request->input('discount_code'); // отримуємо код з запиту (значення надходить з запиту який надіслалв кліент )


        session()->put('discount_code', $discountCode); // зберігаємо код щоб мати змогу використовувати на різних сторінках 

        
        return response()->json(['message' => 'Discount code saved to session']); // повідомлення про збереження коду знижки до сесії 
    }

    public function applyDiscount(Request $request){
        $request->session()->flash('discount_activated', 'Код активовано!');
        $cart = session()->get('cart', []); // знову отримуємо кошик 

        // перевірка на наявність товару в кошику 
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Ваш кошик порожній!'); 
        }

        // перевірка чи не була знижка вже застосована 
        if (session()->has('discount_applied') && session('discount_applied') === true) {
            return redirect()->route('cart')->with('error', 'Знижка вже застосована!');
        }

        $discountCode = session()->get('discount_code', null); // отримуємо код знижки з сесії
        $discounts = [
            'GREATSALL20' => 0.15, // знижка 15%
            'BLACKFRIDAY24' => 0.50, // знижка 50%
            'ALLPRODUCTS5' => 0.05, // знижка 5%
            'SPHERE10' => 0.1, // знижка 20%
        ];
        $discount = $discounts[$discountCode]; // витягуємо знижки з коду

        foreach ($cart as $id => &$item) {
            // додаємо перевірку на існування original_price
            if (!isset($item['original_price'])) {  // перевіряємо чи існує origonal_price, якщо ні то виконується умова 
                $item['original_price'] = $item['price']; //якщо ціна не задана то вона встановлюється рівний поточній ціні 
            }

            $item['price'] = round($item['original_price'] - ($item['original_price'] * $discount)); // прирівнюємо нової ціни до звичайної та виконуємо розрахунок з округленням до цілого числа
        }

        session()->put('cart', $cart); // оновлюємо данні з ключес cart
        session()->put('discount_applied', true); //запобігає повторному застосування зниижки 

        return redirect()->route('cart')->with('success', 'Знижка застосована!'); // перенаправляє користувача в кошик (просто перезавантаажує його в нашому випадку) з http відповідю
    }

    
    // метод для відображення кошика
    public function showCart(){
        $cart = session()->get('cart', []); // отримуємо кошик з сесії
        $discountCode = session()->get('discount_code', null); // отримуємо промокод з сесії 

        return view('sections.cart', compact('cart', 'discountCode')); //перенаправдяємо на сторінку кошика (cart.blade.php)
    }


    // функція для очищення кошика
    public function clearCart(){
        session()->forget('cart'); // за допомогою метода forget видаляємо товар з сесії
        session()->forget('discount_applied'); // за допомогою метода forget видаляємо промокод з сесії

        return redirect()->route('cart')->with('success', 'Cart has been cleared!'); // перенаправлляжмо (перезавантажуємо кошик) без товарі (ма їх видалили вище:))
    }

    public function updateItemQuantity(Request $request) {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, intval($quantity)); // Перевіряємо, що кількість не менше 1
            session()->put('cart', $cart);
        }
    
        return redirect()->route('cart')->with('success', 'Quantity updated!');
    }

    // функція ввидалення товару по окремості
    public function removeItem(Request $request){
        $id = $request->input('id'); // отримуємо id-шник товару 
        $cart = session()->get('cart', []);  // отримуємо кошик з сесії 
        session()->forget('discount_applied'); // видаляємо активований промокод 

        if (isset($cart[$id])) {               // перевіряємо чи існує в масиві наш товар який ми додали в кошик (повертає true якщо в нас є товар або null якщо немає)
            unset($cart[$id]);                // видалення товару з його унікальним id-шником
            session()->put('cart', $cart);   // записуємо кошик в сесію але вже без товару 
        }

        return redirect()->back(); //повертаємо користувача назад 
    }
}
