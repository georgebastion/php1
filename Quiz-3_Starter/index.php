<?php
require_once('database.php');

// Get category ID
if (!isset($product_id)) {
    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $product_id = 1;
    }
}

// Get name for selected category
$queryCategory = 'SELECT productName, productID FROM products';
$statement1 = $db->prepare($queryCategory);
$statement1->execute();
$product = $statement1->fetch();
$product_name = $product['productName'];
$statement1->closeCursor();


// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

//Get Product Names
$queryProductNames = 'SELECT productName, productID FROM products';
$statement4 = $db->prepare($queryProductNames);
$statement4->execute();
$productNames = $statement4->fetchAll();
$statement4->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM products
                  WHERE productID = :product_id
                  ORDER BY productID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':product_id', $product_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<?php include 'view/header.php'; ?>


<!-- the body section -->
<body>
<header><h1>Products</h1></header>
<main>
    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Products</h2>
        <nav>
        <ul>
            <?php foreach ($productNames as $product) : ?>
            <li><a href=".?product_id=<?php echo $product['productID']; ?>">
                    <?php echo $product['productName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $product_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>

            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td class="right"><?php echo $product['listPrice']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
</footer>
</body>
</html>