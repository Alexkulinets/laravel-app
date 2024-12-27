document.addEventListener("DOMContentLoaded", () => {
  function showPopup() {
    const popup = document.querySelector('.popup');
    if (popup) {
      popup.classList.add('show'); 
    
      const timerElement = document.querySelector('.popup .timer');
      let timeLeft = 3600;
      let jumpStarted = false; 
    
      const countdownInterval = setInterval(function() {
        timeLeft -= 1;
        
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    
        
        if (!jumpStarted && timeLeft <= 3595) { 
          jumpStarted = true;
          popup.classList.add('jump'); 
        }
        
        if (timeLeft <= 0) {
          clearInterval(countdownInterval);
        }
      }, 1000); 
    }
  }
  
  window.onload = function() {
    setTimeout(showPopup, 5000); 
  }
  
  
  
  const closeButton = document.querySelector('.close-popup');

  if (closeButton) {
    closeButton.addEventListener('click', closePopup);
  }
  
  function closePopup() {
    document.getElementById('discount-popup').classList.remove('show');
  }
  
  
  
  const discountButton = document.querySelector('.btn-get-discount');
  if (discountButton) {
    discountButton.addEventListener('click', showDiscountCode);
  }
  
  let discountCodeGenerated = false;  
  let discountCode = "";  
  
  function showDiscountCode() {
  
    if (!discountCodeGenerated) {
      discountCode = generateDiscountCode();  
      discountCodeGenerated = true;  
    }
  
  
    document.getElementById('code').textContent = discountCode;
    document.getElementById('discount-code').style.display = 'block'; 
  
    saveDiscountCodeToSession(discountCode);
  
    document.querySelector('.btn-get-discount').disabled = true;
    document.querySelector('.btn-get-discount').textContent = "Вже отримано код";  
  }
  
  
  
  function generateDiscountCode() {
    const code = [
      { code: "BLACKFRIDAY24"},
      { code: "GREATSALL20"},
      { code: "ALLPRODUCTS5"},
      { code: "SPHERE10"}
    ];
    const randomIndex = Math.floor(Math.random() * code.length);
    return code[randomIndex].code;
  }
  
  
  
  
  function saveDiscountCodeToSession(code) {
    const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch('/save-discount-code', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': CSRF
      },
      body: JSON.stringify({ discount_code: code })
    })
    .then(response => response.json())
    .then(data => {console.log('Discount code saved to session: ', data);})
    .catch(error => {console.error('Error saving discount code:', error);});
  }
  
  
}); 
    
  