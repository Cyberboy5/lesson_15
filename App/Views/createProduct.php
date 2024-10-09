<?php

require '../../../autoload.php';

use App\Model\Category;
use App\Model\Product;

// Fetch all categories for the dropdown
$categories = Category::getAll();


?>

<h2 class="mt-4">Yangi Product Qo'shish</h2>

<form action="/createProduct" method="POST" enctype="multipart/form-data"> 
    <div class="mb-3">
        <label for="name" class="form-label">Product Nomi:</label>
        <input class="form-control" type="text" name="name" placeholder="Product Nomi" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Product Narxi:</label>
        <input class="form-control" type="number" name="price" placeholder="Product Narxi" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Product Categoriyasi:</label>
        <select class="form-select" name="category_id" required>
            <?php foreach($categories as $category){ ?>
                <option value="<?= $category['id']?>"><?= $category['name']?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="formFile" class="form-label">Product Rasmi:</label>
        <input class="form-control" type="file" name="image" id="formFile">
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Qo'shish</button>
    <a class="btn btn-danger" href="/product">Ortga qaytish</a>
</form>
