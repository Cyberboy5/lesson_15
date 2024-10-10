<h2 class="mt-4">Yangi Product Qo'shish</h2>

<form action="/create" method="POST" enctype="multipart/form-data"> <!-- enctype added -->
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
        <select class="form-select" name="category_id">
            <?php 
            use App\Model\Category;
            $categories = Category::getAll();
           
           foreach($categories as $category){ ?>
                <option value="<?= $category['id']?>"><?= $category['name']?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="formFile" class="form-label">Product Rasmi:</label>
        <input class="form-control" type="file" name="image" id="formFile" required>
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Qo'shish</button>
    <a class="btn btn-danger" href="/">Ortga qaytish</a>
</form>

