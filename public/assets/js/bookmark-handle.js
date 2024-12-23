var inputText = document.getElementById('search-input');
var searchButton = document.getElementById('search-button');
var textDisplay = document.getElementById('output');
var link = document.getElementById('cari');
var button_bookmark = document.getElementsByClassName('item-bookmark');

// Menambahkan event listener untuk event 'input' pada elemen input teks
inputText.addEventListener('input', function() {
    
    var url = '/api/landing-page-search/' + inputText.value;
    link.href = url;
    inputText.onkeyup = function(e){
       if(e.key == 'Enter'){
        searchButton.click()
    }
};
});

for (var i = 0; i < button_bookmark.length; i++) {
button_bookmark[i].addEventListener('click', function() {
    var id_program = this.getAttribute('value');
    var id_user = this.getAttribute('userid');

    console.log("di tekan");
// Membuat instance objek XMLHttpRequest
var xhr = new XMLHttpRequest();

// Mengatur fungsi callback untuk menangani respon dari server
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Mengonversi respons JSON menjadi objek JavaScript
            var response = JSON.parse(xhr.responseText);
            // Menampilkan hasil respons ke console atau melakukan operasi lainnya
            console.log(response);
            if(response[0] === false){
                console.log('tersimpan');
            }
        } else {
            console.error('Terjadi kesalahan: ' + xhr.status);
        }
    }
};
var origin = window.location.origin;
// var apiURL = origin + '/landing-page/bookmark/';
// Mengatur metode HTTP dan URL endpoint
xhr.open('GET', origin+'/api/bookmark/'+id_program+'/'+id_user, true);
console.log(origin+'/api/bookmark/'+id_program+'/'+id_user)
// Mengirimkan permintaan ke server
xhr.send();
});
}