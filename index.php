<?php
include_once 'Data.php';
include_once 'Products.php';
$products = Data::loadData();

if (isset($_REQUEST['page'])){

    if ($_REQUEST['page']=='delete'){
        $id =$_REQUEST['id'];
        array_splice($products,$id,1);
        Data::saveData($products);
        header('location: index.php');
}
}
?>
    <!doctype html>
    <html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<a href="add.php">ADD Product</a>
<button onclick="<?php sort($products)?>">sort</button>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Address</th>
        <th scope="col">Image</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $key=>$product): ?>
        <tr>
            <td><?php echo $product->getId(); ?></td>
            <td><?php echo $product->getName() ?></td>
            <td><?php echo $product->getPrice() ?></td>
            <td><?php echo $product->getAddress() ?></td>
            <td><?php echo $product->getImage() ?></td>
            <td>
                <a href="edit.php?id=<?php echo $product->getId()?>" >Edit</a>
            </td>
            <td>
                <a href="index.php?page=delete&id=<?php echo $key?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
    </html><?php
