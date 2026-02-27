export function about() {

// About Page
// I’m handling the About page behaviour here for the Core / Work / Love sections

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


  // I’m resetting everything so only one state (Core / Work / Love) is active one at a time
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

  // I’m showing my core personality here
  function showCore() {
    hideAllAbout();
    coreBtn.classList.add("is-active");
    coreImg.classList.add("is-active");
    coreBox.classList.add("is-active");
    coreHotspotsCon.classList.add("is-active");
    coreList.classList.add("is-active");
  }

  // I’m switching to my work side here
  function showWork() {
    hideAllAbout();
    workBtn.classList.add("is-active");
    workImg.classList.add("is-active");
    workBox.classList.add("is-active");
    workHotspotsCon.classList.add("is-active");
    workList.classList.add("is-active");
  }

  // I’m switching to things I love here
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

  // I’m activating the clicked hotspot so the right bear lights up
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

  // I want Core Section to show first when you land on this page
  showCore();
}
}