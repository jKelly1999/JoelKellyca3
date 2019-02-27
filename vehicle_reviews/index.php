<?php
require('../model/database.php');
require('../model/vehicle_db.php');
require('../model/category_db.php');
require('../model/review_db.php');

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
    include('vehicle_review_list.php');
}


if ($action == 'show_review_form') 
{
    $categories = get_categories();
    $vehicles = get_vehicles();
    include('vehicle_review.php');
} 

else if ($action == 'add_review') 
{
    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
    $comfort = filter_input(INPUT_POST, 'comfort');
    $aesthetics = filter_input(INPUT_POST, 'aesthetics');
    $performance = filter_input(INPUT_POST, 'performance');
    $value = filter_input(INPUT_POST, 'value');
    $overall = filter_input(INPUT_POST, 'overall');
    
    if ($vehicle_id == NULL || $comfort == NULL || 
            $aesthetics == NULL || $performance == NULL || $value == NULL || $overall == NULL) 
    {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
    { 
        add_review($vehicle_id, $comfort, $aesthetics, $performance, $value, $overall);
        header("Location: .?category_id=$category_id");
    }
}





?>

