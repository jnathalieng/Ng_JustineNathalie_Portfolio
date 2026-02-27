export function burgerMenu() {

  // Burger Menu
  // I’m using this to open and close the mobile menu

  const burgerButton = document.querySelector("#burger-button");
  const burgerCon = document.querySelector("#burger-con");

  function toggleMenu() {
    burgerCon.classList.toggle("menu-open");
  }

  if (burgerButton && burgerCon) {
    burgerButton.addEventListener("click", toggleMenu);
  }

}