<?php
require_once('database.php');
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}


// Get all categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    
    <table>
    <?php foreach ($categories as $categories) : ?>
        <tr>
            <th>Name</th>
            <td><?php echo $categories['categoryName']; ?></td>
        </tr>
        
        <!-- add code for the rest of the table here -->
        <?php endforeach; ?>
    </table>
   
    <h2>Add Category</h2>
    
    <form action="add_category.php" method="post"
              id="add_category_form">

            <label>Name Category:</label>
            <input type="text" name="categoryName"><br>
            <input type="submit" value="Add Category"><br>
        </form>

    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>