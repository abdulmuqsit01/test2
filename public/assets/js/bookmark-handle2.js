
	var button_bookmark = document.getElementsByClassName('item-bookmark');
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
	xhr.open('GET', origin+'/mobile/bookmark/'+id_program+'/'+id_user, true);
	console.log(origin+'/mobile/bookmark/'+id_program+'/'+id_user)
	// Mengirimkan permintaan ke server
	xhr.send();
	});
	}