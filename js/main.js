//Burger Menu

const burgerBtn = document.querySelector(".burger-btn");
const burgerCon = document.querySelector("#burger-con");

// functions
function toggleMenu() {
  console.log("Nav dropdown called");
  burgerCon.classList.toggle("open");
}

// event listeners
burgerBtn.addEventListener("click", toggleMenu);