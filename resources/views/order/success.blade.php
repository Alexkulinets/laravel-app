<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Sphere_litle.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('dist/src/app.css') }}"/>
    <title>Успіх</title>
</head>
<body>
    <main class="success">
        <h1>Ваше замовлення успішно оформлено!</h1>
        <p>Дякуємо за покупку. Ми надішлемо вам підтвердження на електронну пошту.</p>
        <a href="{{ route('home') }}#card" class="back-button success">Продовжити покупки</a>
    </main>
</body>
</html>
