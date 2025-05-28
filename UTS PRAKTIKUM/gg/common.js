// Description: Common functions for all pages
function loadComponent(url, elementId, callback) {
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById(elementId).innerHTML = data;
      if (callback) callback();
    })
    .catch((error) => console.error(`Error loading ${url}:`, error));
}

document.addEventListener("DOMContentLoaded", function () {
  loadComponent("header.html", "header-container");
  loadComponent("slider.html", "slider-container", initSlider);
});

// Slider background
function initSlider() {
  let items = document.querySelectorAll(".slider .list .item");
  let countItem = items.length;
  let itemActive = 0;

  function showSlider() {
    itemActive = (itemActive + 1) % countItem;
    let itemActiveOld = document.querySelector(".slider .list .item.active");
    itemActiveOld.classList.remove("active");

    items[itemActive].classList.add("active");
  }

  setInterval(showSlider, 8000);
}
const toggleIcons = document.querySelectorAll("#toggleIcon");

toggleIcons.forEach((icon) => {
  icon.addEventListener("click", () => {
    const targetId = icon.getAttribute("data-target");
    const passwordInput = document.getElementById(targetId);

    const isHidden = passwordInput.getAttribute("type") === "password";
    passwordInput.setAttribute("type", isHidden ? "text" : "password");

    // Ganti ikon sesuai status baru
    if (isHidden) {
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    } else {
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }
  });
});

window.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector(".form-container");
  form.classList.add("animate-in");
});
