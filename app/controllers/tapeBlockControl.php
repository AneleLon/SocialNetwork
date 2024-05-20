<?php
$userId = $_GET['id'];
$current_url = $_SERVER['REQUEST_URI'];
$filtet = $_GET['filter'];
if (!empty($userId )) {
    $tape = selectTablePostUser($userId );
} else {
    if (!empty($_GET['search-term'])) {
        $tape = searchTablePost($_GET['search-term']);
    } elseif ($filtet == 'NEW') {
        $tape = selectTablePost($userId);
    } elseif ($filtet == 'OLD') {
        $tape = selectTablePost($userId, 'OLD');
    } elseif ($filtet == 'POPULAR') {
        $tape = selectTablePostByLikes();
    } elseif ($filtet == 'NOPOPULAR') {
        $tape = selectTablePostByLikes(' ');
    } else {
        $tape = selectTablePost($userId);
    }
}
