document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('order-form');
    const submitBtn = document.getElementById('submitBtn');

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
});
