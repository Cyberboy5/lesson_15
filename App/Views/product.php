
<h1>Products</h1>
<a class = 'btn btn-primary m-3' href="/createProduct">Add New</a>

<table class = "table">

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Category ID</th>
    <th>Options</th>
</tr>

<?php
    foreach($products as $product){?>
        <tr>

            <td><?= $product['id']?></td>
            <td><?= $product['image']?></td>
            <td><?= $product['name']?></td>
            <td><?= $product['price']?></td>
            <td><?= $product['category_id']?></td>
            <td>

                <form action="" method = 'POST'>
                    <?php $_SESSION['product_id'] = $product['id']?>
                    <a class="btn btn-primary" href = 'editproduct.php?id=<?= $product['id']?> ' >Edit</a>
                    <a class="btn btn-danger" href = '?id=<?= $product['id']?>' name = 'delete'>Delete</a>
                </form>
            </td>
        </tr>

    <?php } 
    ?>
</table>