export function videoplayer() {

    // Video Player

const video = document.querySelector("#player-container video");
const videoControls = document.querySelector("#video-controls");
const playButton = document.querySelector("#play-button");
const pauseButton = document.querySelector("#pause-button");
const stopButton = document.querySelector("#stop-button");
const changeVol = document.querySelector("#change-vol");
const fullScreenButton = document.querySelector("#full-screen");

function handlePlayClick() {
  video.play();
}

function handlePauseClick() {
  video.pause();
}

function handleStopClick() {
  video.pause();
  video.currentTime = 0;
}

function handleVolumeChange() {
  video.volume = changeVol.value;
}

function handleFullScreenClick() {
  if (video.requestFullscreen) {
    video.requestFullscreen();
  } else if (video.webkitRequestFullscreen) {
    video.webkitRequestFullscreen();
  } else if (video.msRequestFullscreen) {
    video.msRequestFullscreen();
  }
}

// I’m wrapping the video logic so it only runs if the elements exist
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

}