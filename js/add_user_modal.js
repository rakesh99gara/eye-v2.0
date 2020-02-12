var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";
const modal = document.querySelector(".popup");
document.querySelector(".add-users").addEventListener("click", function() {
  document.querySelector(".popup").style.display = "flex";
});

document.querySelector(".close").addEventListener("click", function() {
  document.querySelector(".popup").style.display = "none";
  document.querySelector("#uname").value = "";
  document.querySelector("#pass").value = "";
  $(".error").html("");
});

window.addEventListener("click", outsideClick);
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = "none";
    document.querySelector("#uname").value = "";
    document.querySelector("#pass").value = "";
    $(".error").html("");
  }
}
