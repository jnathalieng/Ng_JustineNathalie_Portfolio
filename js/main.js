import { about } from "./modules/about.js";
import { videoplayer } from "./modules/videoplayer.js";
import { homepagesliders } from "./modules/homepagesliders.js";
import { contact } from "./modules/contact.js";

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

<<<<<<< Updated upstream
















=======
>>>>>>> Stashed changes
