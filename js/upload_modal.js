var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";

const model = document.querySelector(".popup-upload");
document.querySelector(".upload").addEventListener("click", function() {
  document.querySelector(".popup-upload").style.display = "flex";
});

document.querySelector(".upload-clo").addEventListener("click", function() {
  document.querySelector(".popup-upload").style.display = "none";
});

window.addEventListener("click", outsideClick);

function outsideClick(e) {
  if (e.target == model) {
    model.style.display = "none";
  }
}
// $(document).ready(function() {
//   alert("hii");
// });
