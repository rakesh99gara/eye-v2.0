var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";
const pwda_modal = document.querySelector(".popup-cng-pwd");
document
  .querySelector(".change-password")
  .addEventListener("click", function () {
    document.querySelector(".popup-cng-pwd").style.display = "flex";
  });

document.querySelector(".cng-pwd-close").addEventListener("click", function () {
  document.querySelector(".popup-cng-pwd").style.display = "none";
  document.querySelector("#re-cng-pwd").value = "";
  document.querySelector("#cng-pwd").value = "";
  $(".cng-pwd-error").html("");
});

window.addEventListener("click", outsideClick);
function outsideClick(e) {
  if (e.target == pwda_modal) {
    pwda_modal.style.display = "none";
    document.querySelector("#re-cng-pwd").value = "";
    document.querySelector("#cng-pwd").value = "";
    $(".cng-pwd-error").html("");
  }
}
