var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";

const down_model = document.querySelector(".popup-download");
document.querySelector(".download").addEventListener("click", function() {
  document.querySelector(".popup-download").style.display = "flex";
});

document.querySelector(".download-clo").addEventListener("click", function() {
  document.querySelector(".popup-download").style.display = "none";
  document.querySelector(".dwn_name").value = "";
  $("#dwn-error").html("");
});

window.addEventListener("click", outsideClick);

function outsideClick(e) {
  if (e.target == down_model) {
    down_model.style.display = "none";
    document.querySelector(".dwn_name").value = "";
    $("#dwn-error").html("");
  }
}
// $(document).ready(function() {
//   alert("hii");
// });
