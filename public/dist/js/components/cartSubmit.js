document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('order-form');
    const submitBtn = document.getElementById('submitBtn');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    
    if (form && submitBtn) {
        form.addEventListener('submit', function (e) {

            if (submitBtn.disabled) {
                e.preventDefault();
                return;
            }


            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Зачекайте...';
        });        
    }
    //надіслання форми кількості певного товару при натиску будь де
    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            const quantityForm = input.closest('form');
            if (quantityForm) {
                quantityForm.submit();
            }
        });
    });
});

