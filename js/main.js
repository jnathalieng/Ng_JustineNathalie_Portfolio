// Burger Menu
const burgerButton = document.querySelector("#burger-button");
const burgerCon = document.querySelector("#burger-con");

function toggleMenu() {
  burgerCon.classList.toggle("menu-open");
}

if (burgerButton && burgerCon) {
  burgerButton.addEventListener("click", toggleMenu);
}

// Home Page Sliders
// I’m handling the slideshow bears here
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

function hideAllSlides() {
  if (slide1) {
     slide1.classList.remove("show"); 
    }

  if (slide2) {
     slide2.classList.remove("show"); 
    }

  if (slide3) { 
    slide3.classList.remove("show"); 
  }
  if (slide4) { 
    slide4.classList.remove("show"); 
  }

  if (slide5) {
     slide5.classList.remove("show"); 
    }

  if (slide6) {
     slide6.classList.remove("show"); 
    }
}

function resetBears() {
  if (bear1) { 
    bear1.classList.remove("active"); 
  }

  if (bear2) {
     bear2.classList.remove("active"); 
  }

  if (bear3) { 
    bear3.classList.remove("active"); 
  }

  if (bear4) { 
    bear4.classList.remove("active"); 
  }

  if (bear5) { 
    bear5.classList.remove("active"); 
  }

  if (bear6) { 
    bear6.classList.remove("active"); 
  }
}

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

// I’m using named functions for each bear to click
function handleBear1Click() { 
  showOnlySlide(slide1, bear1); 
}

function handleBear2Click() {
  showOnlySlide(slide2, bear2); 
}

function handleBear3Click() {
   showOnlySlide(slide3, bear3); 
}

function handleBear4Click() {
   showOnlySlide(slide4, bear4); 
}

function handleBear5Click() { 
  showOnlySlide(slide5, bear5);
}

function handleBear6Click() {
   showOnlySlide(slide6, bear6); 
}

if (bear1 && slide1) {
  slide1.classList.add("show");
  bear1.classList.add("active");

  bear1.addEventListener("click", handleBear1Click);
  bear2.addEventListener("click", handleBear2Click);
  bear3.addEventListener("click", handleBear3Click);
  bear4.addEventListener("click", handleBear4Click);
  bear5.addEventListener("click", handleBear5Click);
  bear6.addEventListener("click", handleBear6Click);

}

// GSAP Hero Animation
// I’m animating the hero section using GSAP
// Reference: https://codepen.io/cassie-codes/pen/jOwyPrJ

const hiImg = document.querySelector(".hi-img");
const lilmeWrap = document.querySelector(".lilme-wrap");
const nameLine = document.querySelector(".name-line");
const subtitle = document.querySelector(".subtitle");
const learnButton = document.querySelector(".section-learn-btn");

if (typeof gsap !== "undefined" && hiImg && lilmeWrap && nameLine && subtitle) {

  const heroTimeline = gsap.timeline({
    defaults: { duration: 0.8, ease: "power3.out" }
  });

  heroTimeline.from(hiImg, { opacity: 0, y: 40 });
  heroTimeline.from(lilmeWrap, { opacity: 0, y: 50 }, "-=0.3");
  heroTimeline.from(nameLine, { opacity: 0, y: 20 }, "-=0.2");
  heroTimeline.from(subtitle, { opacity: 0, y: 20 }, "-=0.25");

  if (learnButton) {
    heroTimeline.from(learnButton, { opacity: 0, y: 15 }, "-=0.3");
  }

  // I added a simple float effect on the hero image
  gsap.to(lilmeWrap, {
    y: -10,
    duration: 2.4,
    repeat: -1,
    yoyo: true,
    ease: "sine.inOut",
    delay: 1.6
  });
}



//
// Video Player
// I built a custom video player here
//

const video = document.querySelector("#player-container video");
const videoControls = document.querySelector("#video-controls");
const playButton = document.querySelector("#play-button");
const pauseButton = document.querySelector("#pause-button");
const stopButton = document.querySelector("#stop-button");
const changeVol = document.querySelector("#change-vol");
const fullScreenButton = document.querySelector("#full-screen");

function handlePlayClick() { video.play(); }
function handlePauseClick() { video.pause(); }
function handleStopClick() {
  video.pause();
  video.currentTime = 0;
}
function handleVolumeChange() { video.volume = changeVol.value; }

function handleFullScreenClick() {
  if (video.requestFullscreen) {
    video.requestFullscreen();
  } else if (video.webkitRequestFullscreen) {
    video.webkitRequestFullscreen();
  } else if (video.msRequestFullscreen) {
    video.msRequestFullscreen();
  }
}

function initVideoPlayer() {
  if (!video || !videoControls) {
    return;
  }

  video.controls = false;
  videoControls.classList.remove("hidden");

  playButton.addEventListener("click", handlePlayClick);
  pauseButton.addEventListener("click", handlePauseClick);
  stopButton.addEventListener("click", handleStopClick);
  changeVol.addEventListener("input", handleVolumeChange);
  fullScreenButton.addEventListener("click", handleFullScreenClick);
}

initVideoPlayer();



//
// About Page
// I’m handling the About page behaviour here
//

const orbitSection = document.querySelector(".orbit-con");

if (orbitSection) {

  const coreBtn = document.querySelector(".core-btn");
  const workBtn = document.querySelector(".work-btn");
  const loveBtn = document.querySelector(".love-btn");

  const coreImg = document.querySelector(".core-img");
  const workImg = document.querySelector(".work-img");
  const loveImg = document.querySelector(".love-img");

  const coreBox = document.querySelector(".core-box");
  const workBox = document.querySelector(".work-box");
  const loveBox = document.querySelector(".love-box");

  const coreHotspotsCon = document.querySelector(".core-hotspots");
  const workHotspotsCon = document.querySelector(".work-hotspots");
  const loveHotspotsCon = document.querySelector(".love-hotspots");

  const coreList = document.querySelector(".core-list");
  const workList = document.querySelector(".work-list");
  const loveList = document.querySelector(".love-list");

  const allHotspots = document.querySelectorAll(".hotspot");


  // I’m using functions to reset everything before showing a new state
  function hideAllAbout() {
    coreBtn.classList.remove("is-active");
    workBtn.classList.remove("is-active");
    loveBtn.classList.remove("is-active");

    coreImg.classList.remove("is-active");
    workImg.classList.remove("is-active");
    loveImg.classList.remove("is-active");

    coreBox.classList.remove("is-active");
    workBox.classList.remove("is-active");
    loveBox.classList.remove("is-active");

    coreHotspotsCon.classList.remove("is-active");
    workHotspotsCon.classList.remove("is-active");
    loveHotspotsCon.classList.remove("is-active");

    coreList.classList.remove("is-active");
    workList.classList.remove("is-active");
    loveList.classList.remove("is-active");

    allHotspots.forEach(removeHotspotActive);
  }

  function showCore() {
    hideAllAbout();
    coreBtn.classList.add("is-active");
    coreImg.classList.add("is-active");
    coreBox.classList.add("is-active");
    coreHotspotsCon.classList.add("is-active");
    coreList.classList.add("is-active");
  }

  function showWork() {
    hideAllAbout();
    workBtn.classList.add("is-active");
    workImg.classList.add("is-active");
    workBox.classList.add("is-active");
    workHotspotsCon.classList.add("is-active");
    workList.classList.add("is-active");
  }

  function showLove() {
    hideAllAbout();
    loveBtn.classList.add("is-active");
    loveImg.classList.add("is-active");
    loveBox.classList.add("is-active");
    loveHotspotsCon.classList.add("is-active");
    loveList.classList.add("is-active");
  }

  function removeHotspotActive(oneSpot) {
    oneSpot.classList.remove("is-active");
  }

  // I’m activating the clicked hotspot here
  function handleHotspotClick(event) {
    const clickedSpot = event.currentTarget;
    allHotspots.forEach(removeHotspotActive);
    clickedSpot.classList.add("is-active");
  }

  function setupHotspotClick(spot) {
    spot.addEventListener("click", handleHotspotClick);
  }

  coreBtn.addEventListener("click", showCore);
  workBtn.addEventListener("click", showWork);
  loveBtn.addEventListener("click", showLove);

  allHotspots.forEach(setupHotspotClick);

  // I want Core to show first
  showCore();
}



//
// Contact Page Animations
// I added simple gsap fades for the contact page
//

const contactCard = document.querySelector(".contact-card-inner");

if (contactCard && typeof gsap !== "undefined") {
  gsap.from(contactCard, {
    opacity: 0,
    y: 30,
    duration: 0.9,
    ease: "power2.out"
  });
}

const thankBox = document.querySelector(".contact-thankyou");

if (thankBox && typeof gsap !== "undefined") {
  gsap.from(thankBox, {
    opacity: 0,
    y: 15,
    duration: 0.8,
    ease: "power2.out",
    delay: 0.1
  });
}

const errorBox = document.querySelector(".contact-error-box");

if (errorBox && typeof gsap !== "undefined") {
  gsap.from(errorBox, {
    opacity: 0,
    y: 15,
    duration: 0.8,
    ease: "power2.out",
    delay: 0.1
  });
}
