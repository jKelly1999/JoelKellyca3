<?php include '../view/header.php'; ?>
<main>
    <h1>Add Review</h1>
    <form action="index.php" method="post" id="add_vehicle_form">
        
        <input type="hidden" name="action" value="add_review">

        <input type="hidden" name="vehicle_id"
               value="<?php echo $vehicle['vehicleID']; ?>">

        <label>Comfort:</label>
        <select name="comfort">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>


        <label>Aesthetics:</label>
        <select name="aesthetics">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>


        <label>Performance:</label>
        <select name="performance">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>


        <label>Value:</label>
        <select name="value">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>


        <label>Overall:</label>
        <select name="overall">
            <option value="">Select...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Review">
        <br>

    </form>


</main>
<?php include '../view/footer.php'; ?>