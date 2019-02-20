<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Make:</label>
        <input type="input" name="make">
        <br>

        <label>Model:</label>
        <input type="input" name="model">
        <br>

        <label>Year:</label>
        <input type="input" name="year">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehcle">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_vehicles">View Vehicle List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>