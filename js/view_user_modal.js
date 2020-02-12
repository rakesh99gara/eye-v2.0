var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";

const mod = document.querySelector(".popup-view");
document.querySelector(".view-users").addEventListener("click", function() {
  document.querySelector(".popup-view").style.display = "flex";
});

document.querySelector(".clo").addEventListener("click", function() {
  document.querySelector(".popup-view").style.display = "none";
});

window.addEventListener("click", outsideClick);

function outsideClick(e) {
  if (e.target == mod) {
    mod.style.display = "none";
  }
}
