function changeImageLike() {
    var image = document.getElementById('likeImage');
    if (document.getElementById('like').checked) {
        image.src = "../assets/image/likeTrue.png";
    } else {
        image.src = "../assets/image/like.png";
    } 
}