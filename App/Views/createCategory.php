<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../../autoload.php';

use App\Model\Product;

if (isset($_POST['submit']) && !empty($_POST['name'])) {
    
    $name = htmlspecialchars(strip_tags($_POST['name']));
    
    if (Product::create($name)) {
        header("Location: /category");
        exit(); 
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link rel="stylesheet" href="../../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-4 justify-content-center">
                <nav class="navbar">
                    <a href="../../../index.php">Talaba</a>
                    <a href="../subject/subjects.php">Fanlar</a>
                    <a href="../imtihon.php">Imtihon</a>
                    <a href="../natija.php">Natija</a>
                </nav>
            </div>
        </div>

        <h2 class="mt-4">Yangi Talaba Qo'shish</h2>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Talaba Ismi:</label>
                <input class="form-control" type="text" name="name" placeholder="Talaba Ismi" required>
            </div>
            
            <button class="btn btn-primary" type="submit" name="submit">Qo'shish</button>
            <a class="btn btn-danger" href="../../../index.php">Ortga qaytish</a>
        </form>
    </div>

    <script src='../../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>
