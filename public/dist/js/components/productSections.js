document.querySelectorAll('.config-option').forEach(option => {
  const colorBoxes = document.querySelectorAll('.config-box');
  const settingsBox = document.getElementById('productSpecificationHome');
  const firstCheckbox = document.querySelector('#section1');
  const imageElement = document.getElementById('product-image');
  const prevImageButton = document.getElementById('prev-image-button');
  const nextImageButton = document.getElementById('next-image-button');  
  const imagesData = imageElement.getAttribute('data-images');

  option.addEventListener('click', () => {
      document.querySelectorAll('.config-option').forEach(opt => {
          opt.classList.remove('active');
      });
  
      option.classList.add('active');
  
      const selectedMemorySize = option.getAttribute('data-config');
      document.getElementById('selected-color-memory-size').textContent = selectedMemorySize;
  });


  colorBoxes.forEach(box => {
    box.addEventListener('click', function() {
      colorBoxes.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const selectedColorName = this.getAttribute('data-config');
      document.getElementById('selected-color-name').textContent = selectedColorName;
    });
  });

  
  document.querySelectorAll('.section input[type="checkbox"]').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
  
          if (checkbox.checked && !checkbox.previousChecked) {
              checkbox.previousChecked = true;
          } else if (!checkbox.checked) {
              checkbox.checked = true; 
              return;
          }


          if (checkbox.id === 'section1' && checkbox.checked) {
              settingsBox.classList.remove('none'); 
          } else {
              settingsBox.classList.add('none'); 
          }


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


  if (firstCheckbox && firstCheckbox.checked) {
      settingsBox.classList.remove('none');
  } else {
      settingsBox.classList.add('none');
  }

  
  try {
      const images = JSON.parse(imagesData);

      if (images && Array.isArray(images)) {
          let currentImageIndex = 0;  

          const updateImage = () => {
              imageElement.src = images[currentImageIndex];
          };  


          prevImageButton.addEventListener('click', () => {
              currentImageIndex = (currentImageIndex - 1 + images.length) % images.length; 
              updateImage();
          });  

          nextImageButton.addEventListener('click', () => {
              currentImageIndex = (currentImageIndex + 1) % images.length; 
              updateImage();
          });   

          
          updateImage();
      } 
      else {
          console.error("Images array is not valid:", images);
      }
  } 

  catch (error) {
      console.error("JSON parse error:", error);
  }  

  window.updateMainImage = (imageUrl) => {
      imageElement.src = imageUrl;
  };
});
