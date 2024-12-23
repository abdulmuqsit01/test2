// USING COOKIES



// var videoPlayer = document.getElementById('videoEdukasi')
// var unwatchedVideoCautionLabel=document.getElementById('unwatchedVideoCautionLabel')
// var checkbox = document.getElementById("flexCheckIndeterminate");
// var dropdown_pos = document.getElementById("id_lokasi");
// var join_button = document.getElementById("button_bergabung");

// // check cookies
// ifCookiesExist()

// function ifCookiesExist(){
//     var getVideoCookie=document.cookie
//     var splittedCookies=getVideoCookie.split(';')

//     for(let i = 0; i < splittedCookies.length; i++) {
//         let cookiesValue = splittedCookies[i];
//         if (cookiesValue=="video_watched=true") {
//             unwatchedVideoCautionLabel.style.display="none"
//             return true
//         }
//     }
    
//     unwatchedVideoCautionLabel.style.display="block"
//     return false
// }

// videoPlayer.addEventListener("play", function(){
//     if (ifCookiesExist()==false) {
//         document.cookie="video_watched=true"
//         unwatchedVideoCautionLabel.style.display="none";

//         if (dropdown_pos!==null && join_button!==null) {
//             locationCheck();
//         }

//         if (checkbox!==null) {
//             termsCheck();
//         }
//     }
// });

// //mobile
// function locationCheck(){
//     // var dropdown_pos=document.getElementById('id_lokasi')

//     if (dropdown_pos.value!="" && ifCookiesExist()==true) {
//         document.getElementById('button_bergabung').disabled = false;
//     } else {
//         document.getElementById('button_bergabung').disabled = true;
//     }
// }

// //desktop
// function termsCheck() {
//     // var checkbox = document.getElementById("flexCheckIndeterminate");

//     if (checkbox.checked == true && ifCookiesExist() == true) {
//         document.getElementById("registerButton").disabled = false;
//     } else {
//         document.getElementById("registerButton").disabled = true;
//     }
// }





//NOT USING COOKIES

var videoPlayer = document.getElementById('videoEdukasi')
var unwatchedVideoCautionLabel=document.getElementById('unwatchedVideoCautionLabel')
var checkbox = document.getElementById("flexCheckIndeterminate");
var dropdown_pos = document.getElementById("id_lokasi");
var join_button = document.getElementById("button_bergabung");
var isWatched=false;

function ifVideoWatched(){
    if (isWatched == true) {
        unwatchedVideoCautionLabel.style.display = "none";
        return true;
    }
    
    unwatchedVideoCautionLabel.style.display="block"
    return false
}

videoPlayer.addEventListener("play", function(){
    if (isWatched == false) {
        unwatchedVideoCautionLabel.style.display = "none";
        isWatched = true;

        if (dropdown_pos!==null && join_button!==null) {
            locationCheck();
        }

        if (checkbox!==null) {
            termsCheck();
        }
    }
});

//mobile
function locationCheck(){
    // var dropdown_pos=document.getElementById('id_lokasi')

    if (dropdown_pos.value!="" && isWatched==true) {
        document.getElementById('button_bergabung').disabled = false;
    } else {
        document.getElementById('button_bergabung').disabled = true;
    }
}

//desktop
function termsCheck() {
    // var checkbox = document.getElementById("flexCheckIndeterminate");

    if (checkbox.checked == true && isWatched == true) {
        document.getElementById("registerButton").disabled = false;
    } else {
        document.getElementById("registerButton").disabled = true;
    }
}