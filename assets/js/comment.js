function changeImageComment() {
  var commentsContainer = document.getElementById('comments-container');
  var checkbox = document.getElementById('comment');

  if (checkbox.checked) {
    commentsContainer.style.display = 'block'; // Показываем комментарии
  } else {
    commentsContainer.style.display = 'none'; // Скрываем комментарии
  }
}