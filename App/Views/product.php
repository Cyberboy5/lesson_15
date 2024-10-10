
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
            <td><img width="150px" src="../../<?=$product['image']?>" alt=""></td>
            <td><?= $product['name']?></td>
            <td><?= $product['price']?></td>
            <td><?= $product['category_id']?></td>
            <td>

                <form action="/deleteProduct" method = 'POST'>
                    <input type="hidden" name="id" value="<?=$product['id']?>" id="">
                    <input type="submit" name="ok" class="btn btn-danger" value="Delete" id="">
                </form>

                <form action="/editProductPage" method = 'POST'>
                    <input type="hidden" name="id" value="<?=$product['id']?>" id="">
                    <input type="submit" name="ok" class="btn btn-success m-2" value="Edit" id="">
                </form>
            </td>
        </tr>

    <?php } 
    ?>
</table>