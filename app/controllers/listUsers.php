<?php
$search = $_GET['search-user-all'];
if(!empty($search)){
    $usersAll = searchUsersAndStatusSub('users', $_SESSION['id'],$search);
}else{
    $usersAll = selectUserAndStatusSub('users', $_SESSION['id']);
}