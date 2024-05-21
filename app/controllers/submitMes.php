<?php
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false){
    $pathImage ="/admin/messages/" ;
}else{
    $pathImage ="";
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitMes'])){
    $text = trim($_POST['text']);
    $idIn = $_POST['id'];
    $idFrom = $_SESSION['id'];
        $mes = [
            'text' => $text,
            'idIn' => $idIn,
            'idFrom' => $idFrom,
        ];
       insert('message', $mes);
       $redirect_url = BASE_URL . $pathImage . "dialogue.php?id=". $idIn;
       header("Location: ". $redirect_url);
}