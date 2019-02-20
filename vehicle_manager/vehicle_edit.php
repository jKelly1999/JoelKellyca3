<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_vehicle_form">

        <input type="hidden" name="action" value="update_vehicle">

        <input type="hidden" name="vehicle_id"
               value="<?php echo $vehicle['vehicleID']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $vehicle['categoryID']; ?>">
        <br>

        <label>Make:</label>
        <input type="input" name="make"
               value="<?php echo $vehicle['make']; ?>">
        <br>

        <label>Model:</label>
        <input type="input" name="model"
               value="<?php echo $vehicle['model']; ?>">
        <br>

        <label>Year:</label>
        <input type="input" name="year"
               value="<?php echo $vehicle['year']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_vehicles">View Vehicle List</a></p>

</main>
<?php include '../view/footer.php'; ?>