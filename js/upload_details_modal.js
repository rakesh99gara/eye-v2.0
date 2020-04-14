var script = document.createElement("script");
script.src = "js/jquery.js";
script.type = "text/javascript";

const upload_details_model = document.querySelector(".popup-upload-details");
document
  .querySelector(".upload-details-clo")
  .addEventListener("click", function () {
    document.querySelector(".popup-upload-details").style.display = "none";
    document.querySelector(".upload-details").value = "";
  });

window.addEventListener("click", outsideClick);

function outsideClick(e) {
  if (e.target == upload_details_model) {
    upload_details_model.style.display = "none";
    document.querySelector(".upload-details").value = "";
  }
}
// $(document).ready(function() {
//   alert("hii");
// });
