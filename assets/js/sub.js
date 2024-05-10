function changeImageSub() {
    var image = document.getElementById('subImage');
    if (document.getElementById('sub').checked) {
        image.src = "assets/image/sub.png";
    } else {
        image.src = "assets/image/unsub.png";
    } 
}