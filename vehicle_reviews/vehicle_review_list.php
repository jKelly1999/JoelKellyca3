<?php include '../view/header.php'; ?>
<main>

    <h1>Vehicle List</h1>

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
                
            </tr>
            <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['make']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td><?php echo $vehicle['year']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_review_form">
                    <input type="hidden" name="vehicle_id"
                           value="<?php echo $vehicle['vehicleID']; ?>">
                    <input type="submit" value="Add Review">
                </form></td>
                
   
            </tr>
            <?php endforeach; ?>
        </table>
       
    </section>

</main>
<?php include '../view/footer.php'; ?>