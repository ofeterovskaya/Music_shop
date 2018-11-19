
<?php
include '../../view/header.php';
include '../../view/sidebar_admin.php';
// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<html>

<!-- the head section -->
<head>
   <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
  <section>
     <h1>Product Manager - Category List</h1>
    <table id="category_table" >
        <tr>
            <th class="left" >Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </td>
            <td>
                <form class="delete_product_form"
                      action="index.php?action=delete_category" method="post">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <h2>Add Category</h2>
    <form id="add_category_form"
          action="index.php?action=add_category" method="post">
        <input type="hidden" name="action" value="add_category">

        
        <input type="input" name="category_name">
        <input type="submit" value="Add">
    </form>

    <p class="last_paragraph">
        <a href="index.php?action=list_products">List Products</a>
    </p>

</section>
</main>

</body>
</html>

<?php include '../../view/footer.php'; ?>