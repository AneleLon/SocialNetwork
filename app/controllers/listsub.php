<?php
$filter = $_GET['filter'];
$search = $_GET['search-user'];
if (empty($filter) and empty($search)) {
    $usersAll = selectSubscribedUsers('users', $_SESSION['id']);
} elseif (!empty($search)) {
    $usersAll = searchSubscribedUsersByUsername('users', $_SESSION['id'], $search);
} else {
    if ($filter === "NEWSUBS") {
        $usersAll =  selectSubscribedUsersNewToOld('users', $_SESSION['id']);
    } elseif ($filter === "OLDSUBS") {
        $usersAll =  selectSubscribedUsersOldToNew('users', $_SESSION['id']);
    }
}