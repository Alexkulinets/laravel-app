document.querySelectorAll('.config-option').forEach(option => {
option.addEventListener('click', () => {
    document.querySelectorAll('.config-option').forEach(opt => {
        opt.classList.remove('active');
    });

    option.classList.add('active');

    const selectedMemorySize = option.getAttribute('data-config');
    document.getElementById('selected-color-memory-size').textContent = selectedMemorySize;
});


const colorBoxes = document.querySelectorAll('.config-box');
colorBoxes.forEach(box => {
  box.addEventListener('click', function() {
    colorBoxes.forEach(b => b.classList.remove('active'));
    this.classList.add('active');
    const selectedColorName = this.getAttribute('data-config');
    document.getElementById('selected-color-name').textContent = selectedColorName;
  });
});


  const settingsBox = document.getElementById('productSpecificationHome');
  
  document.querySelectorAll('.section input[type="checkbox"]').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
          // Перевірка, чи активний 'section1'
          if (checkbox.id === 'section1' && checkbox.checked) {
              settingsBox.classList.remove('none');  // Показати settingsBox
          } else {
              settingsBox.classList.add('none');  // Сховати settingsBox
          }

          // Зміна видимості контенту залежно від вибраної секції
          if (checkbox.id === 'section1') {
              document.getElementById('product-info').style.display = 'flex';
              document.getElementById('product-specifications').style.display = 'none';
              document.getElementById('product-reviews').style.display = 'none';
          } else if (checkbox.id === 'section2') {
              document.getElementById('product-info').style.display = 'none';
              document.getElementById('product-specifications').style.display = 'block';
              document.getElementById('product-reviews').style.display = 'none';
          } else if (checkbox.id === 'section3') {
              document.getElementById('product-info').style.display = 'none';
              document.getElementById('product-specifications').style.display = 'none';
              document.getElementById('product-reviews').style.display = 'block';
          }


          document.querySelectorAll('.section input[type="checkbox"]').forEach(otherCheckbox => {
              if (otherCheckbox !== checkbox) {
                  otherCheckbox.checked = false;
                  otherCheckbox.nextElementSibling.classList.remove('active');
              }
          });
          checkbox.nextElementSibling.classList.add('active');
      });
  });
  const firstCheckbox = document.querySelector('#section1');
  if (firstCheckbox && firstCheckbox.checked) {
      settingsBox.classList.remove('none');
  } else {
      settingsBox.classList.add('none');
  }
});
