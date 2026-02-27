export function homepagesliders() {

// Home Page Sliders
// I’m handling the slideshow bears here so each bear shows its own slide

const slide1 = document.querySelector("#slide1");
const slide2 = document.querySelector("#slide2");
const slide3 = document.querySelector("#slide3");
const slide4 = document.querySelector("#slide4");
const slide5 = document.querySelector("#slide5");
const slide6 = document.querySelector("#slide6");

const bear1 = document.querySelector("#bear1");
const bear2 = document.querySelector("#bear2");
const bear3 = document.querySelector("#bear3");
const bear4 = document.querySelector("#bear4");
const bear5 = document.querySelector("#bear5");
const bear6 = document.querySelector("#bear6");

// I’m clearing all the slides before I show the one I want
function hideAllSlides() {
  if (slide1) { slide1.classList.remove("show"); }
  if (slide2) { slide2.classList.remove("show"); }
  if (slide3) { slide3.classList.remove("show"); }
  if (slide4) { slide4.classList.remove("show"); }
  if (slide5) { slide5.classList.remove("show"); }
  if (slide6) { slide6.classList.remove("show"); }
}

// I’m resetting all the bears so only one looks active at a time
function resetBears() {
  if (bear1) { bear1.classList.remove("active"); }
  if (bear2) { bear2.classList.remove("active"); }
  if (bear3) { bear3.classList.remove("active"); }
  if (bear4) { bear4.classList.remove("active"); }
  if (bear5) { bear5.classList.remove("active"); }
  if (bear6) { bear6.classList.remove("active"); }
}

// I’m using this helper to keep the logic in one place
function showOnlySlide(slideElement, bearElement) {
  hideAllSlides();
  resetBears();

  if (slideElement) {
    slideElement.classList.add("show");
  }

  if (bearElement) {
    bearElement.classList.add("active");
  }
}

// I’m using named functions for each bear click
function handleBear1Click() { showOnlySlide(slide1, bear1); }
function handleBear2Click() { showOnlySlide(slide2, bear2); }
function handleBear3Click() { showOnlySlide(slide3, bear3); }
function handleBear4Click() { showOnlySlide(slide4, bear4); }
function handleBear5Click() { showOnlySlide(slide5, bear5); }
function handleBear6Click() { showOnlySlide(slide6, bear6); }

if (bear1 && slide1) {
  // I’m setting a default slide so the first bear is active on load
  slide1.classList.add("show");
  bear1.classList.add("active");

  bear1.addEventListener("click", handleBear1Click);
  bear2.addEventListener("click", handleBear2Click);
  bear3.addEventListener("click", handleBear3Click);
  bear4.addEventListener("click", handleBear4Click);
  bear5.addEventListener("click", handleBear5Click);
  bear6.addEventListener("click", handleBear6Click);
}

}