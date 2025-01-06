document.addEventListener("DOMContentLoaded", () => {
  let alertBox = document.querySelector('.alert-danger')

  if (alertBox) {
    setTimeout(() => {
        alertBox.style.display = "none";
    }, 3000);

    alertBox.addEventListener("click", () => {
        alertBox.style.display = "none";
    })
  }
});