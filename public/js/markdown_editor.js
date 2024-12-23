var inputHidden = document.getElementById("des_variable");
document.querySelector("#kirim").addEventListener("click", function (event) {
    // Lakukan skrip JavaScript Anda di sini
    var nilaiP = document.querySelector(".quill-editor-default").innerHTML;
    nilaiP = nilaiP.split("</div>");
    //get hidden text and remove it
    inputHidden.value = nilaiP[0].replace(/<div.*?>/g, "");
    console.log(inputHidden.value);

    // Mencegah perilaku default dari form submit
    event.preventDefault();

    // Jalankan submit form secara manual setelah menjalankan skrip JavaScript
    document.getElementById("myform").submit();
});
