<?php
require('../model/database.php');
require('../model/vehicle_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'list_vehicles';
    }
}

if ($action == 'list_vehicles') 
{
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) 
    {
        $category_id = 1;
    }
    
    // Get product and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $vehicles = get_vehicles_by_category($category_id);

    // Display the product list
    include('vehicle_list.php');
}



else if ($action == 'show_edit_form') 
{
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    if ($vehicle_id == NULL || $vehicle_id == FALSE) 
    {
        $error = "Missing or incorrect vehicle id.";
        include('../errors/error.php');
    }
    
    
    else 
    { 
        $vehicle = get_vehicle($vehicle_id);
        include('vehicle_edit.php');
    }
} 



else if ($action == 'update_vehicle') 
{
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $make = filter_input(INPUT_POST, 'make');
    $model = filter_input(INPUT_POST, 'model');
    $year = filter_input(INPUT_POST, 'year');

    // Validate the inputs
    if ($vehicle_id == NULL || $vehicle_id == FALSE || $category_id == NULL || 
            $category_id == FALSE || $make == NULL || $model == NULL || 
            $year == NULL) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
    {
        update_vehicle($vehicle_id, $category_id, $make, $model, $year);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} 



else if ($action == 'delete_vehicle') 
{
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $vehicle_id == NULL || $vehicle_id == FALSE) 
    {
        $error = "Missing or incorrect vehicle id or category id.";
        include('../errors/error.php');
    } 
    
    else 
    { 
        delete_vehicle($vehicle_id);
        header("Location: .?category_id=$category_id");
    }
} 


else if ($action == 'show_add_form') 
{
    $categories = get_categories();
    include('vehicle_add.php');
} 


else if ($action == 'add_vehicle') 
{
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $make = filter_input(INPUT_POST, 'make');
    $model = filter_input(INPUT_POST, 'model');
    $year = filter_input(INPUT_POST, 'year');
    
    if ($category_id == NULL || $category_id == FALSE || $make == NULL || 
            $model == NULL || $year == NULL) 
    {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
    { 
        add_vehicle($category_id, $make, $model, $year);
        header("Location: .?category_id=$category_id");
    }
} 


else if ($action == 'list_categories') 
{
    $categories = get_categories();
    include('category_list.php');
} 


else if ($action == 'add_category') 
{
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) 
    {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } 
    
    else 
    {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} 


else if ($action == 'delete_category')
{
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>