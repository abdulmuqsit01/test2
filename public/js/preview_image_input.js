document
    .getElementById("inputGroupFile01")
    .addEventListener("change", function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById("imagePreview").style.display = "block";
                document
                    .getElementById("imagePreview")
                    .setAttribute("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
document
    .getElementById("inputGroupFile02")
    .addEventListener("change", function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById("imagePreview2").style.display =
                    "block";
                document
                    .getElementById("imagePreview2")
                    .setAttribute("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
