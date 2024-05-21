<?php include '../../path.php';
include '../../app/database/db.php';
/* include "../../app/controllers"; */
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <title>Социальная сеть</title>
</head>

<body>
    <?php include("../../app/include/headerAdmin.php");
    ?>
    <!--main-->
    <div class="container">
        <div class="container row">
            <div class="col-md-8">
                <?php include("../../app/include/listMes.php");
                ?>
            </div>
            <!--поиск и фильтр-->
            <div class="sidebar col-md-3">
                <?php include("../../app/include/searchMes.php");
                ?>
            </div>
        </div>
    </div>

</body>

</html>