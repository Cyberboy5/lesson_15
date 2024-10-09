<?php

require '../../../autoload.php'; 
use App\Model\Category;

if(isset($_POST['update']) && isset($_GET['id'])){
    $new_name = htmlspecialchars(strip_tags($_POST['name']));
    $id = htmlspecialchars(strip_tags($_GET['id']));

    if(Category::edit($new_name,$id)){
        header("Location:../../../index.php");
    }  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../bootstrap-5.3.3-dist/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <div class="row ">   
            <div class="col-4 justify-content-center">
            <nav class = "navbar">
                    <a href="../../../index.php">Talaba</a>
                    <a href="../subject/subjects.php">Fanlar</a>
                    <a href="../imtihon.php">Imtihon</a>
                    <a href="../natija.php">Natija</a>
                </nav>
            </div>
        </div>
        

        <form action="" method = 'POST'>

            <br><input type="text" name="name" placeholder = 'New Student Name:'>

            <br><br>
            <button class = "btn btn-primary" type = 'submit' name = 'update'>Update</button>
            <a href = '../../../index.php' class = "btn btn-danger" >Ortga qaytish</a>
        </form>
    </div>        

    <script src='../../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js'> </script>
</body>
</html>