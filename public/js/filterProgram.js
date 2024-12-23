document.querySelectorAll("#toggle").forEach((item) => {
    item.addEventListener("click", function () {
        // Mengubah class 'showss' menjadi 'hidess' dan sebaliknya
        const uls = document.querySelectorAll(".nav-pills");

        uls.forEach((ul) => {
            if (ul.classList.contains("showss")) {
                ul.classList.remove("showss");
                ul.classList.add("hidess");
            } else {
                ul.classList.remove("hidess");
                ul.classList.add("showss");
            }
        });
    });
});
// ======
document.querySelectorAll("#all").forEach((item) => {
    item.addEventListener("click", function (event) {
        // Mengubah class 'showss' menjadi 'hidess' dan sebaliknya
        var value = event.target.value;
        LoadMore(value);
    });
});
// ===========

document.addEventListener("click", function (event) {
    // Periksa apakah elemen yang diklik adalah tombol dengan class 'category'
    if (event.target.classList.contains("tabList")) {
        // Dapatkan nilai dari tombol yang diklik
        var value = event.target.value;

        // Lakukan sesuatu dengan nilai yang telah diperoleh, contoh:
        LoadMore(value);
    }
});

// =================
function LoadMore(link) {
    $.ajax({
        url: link,
        datatype: "html",
        type: "get",
    })
        .done(function (response) {
            document.getElementById("data-wrapper").innerHTML = response;
            //func from intersector.js
            observer();
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log("Server error occured");
        });
}
