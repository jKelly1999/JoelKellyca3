<?php include '../view/header.php'; ?>
<main>

    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of vehicles -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['make']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td><?php echo $vehicle['year']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="vehicle_id"
                           value="<?php echo $vehicle['vehicleID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $vehicle['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_vehicle">
                    <input type="hidden" name="vehicle_id"
                           value="<?php echo $vehicle['vehicleID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $vehicle['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Vehicle</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>