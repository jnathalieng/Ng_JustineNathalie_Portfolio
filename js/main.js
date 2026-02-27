import { about } from "./modules/about.js";
import { videoplayer } from "./modules/videoplayer.js";
import { homepagesliders } from "./modules/homepagesliders.js";
import { contact } from "./modules/contact.js";
import { burgerMenu } from "./modules/burgermenu.js";
import { gsapAnimations } from "./modules/GSAPanimation.js";

burgerMenu();

if (document.body.dataset.page === "about") {
  about();
}

if (document.body.dataset.page === "videoplayer") {
  videoplayer();
}

if (document.body.dataset.page === "homepagesliders") {
  homepagesliders();
}

if (document.body.dataset.page === "contact") {
  contact();
}

if (
  document.body.dataset.page === "homepagesliders" ||
  document.body.dataset.page === "contact"
) {
  gsapAnimations();
}