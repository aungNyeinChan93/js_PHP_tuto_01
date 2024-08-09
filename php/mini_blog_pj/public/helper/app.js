

function loadFile(event) {
  var reader = new FileReader();
  reader.onload = function () {
    var image = document.getElementById("image");
    image.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
