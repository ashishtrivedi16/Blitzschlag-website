var modal = document.getElementById('myModal');
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
// var captionText = document.getElementById("caption");
// img.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     // captionText.innerHTML = this.innerHTML;
// }
// var imgNew = document.getElementById('play-btn');
// imgNew.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     // captionText.innerHTML = img.innerHTML;
// }
function qwerty(x){
    modal.style.display = "block";
    modalImg.src = x;
    console.log("Hello");
    // captionText.innerHTML = img.innerHTML;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    modalImg.src = "";
}
