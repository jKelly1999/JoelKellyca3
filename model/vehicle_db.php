<?php
function get_vehicles() {
    global $db;
    $query = 'SELECT * FROM vehicles
              ORDER BY vehicleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicles.categoryID = :category_id
              ORDER BY vehicleID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($vehicleID) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":vehicle_id", $vehicleID);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}

function delete_vehicle($vehicleID) {
    global $db;
    $query = 'DELETE FROM vehicles
              WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($category_id, $make, $model, $year) {
    global $db;
    $query = 'INSERT INTO vehicles
                 (categoryID, make, model, year)
              VALUES
                 (:category_id, :make, :model, :year)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor();
}

function update_vehicle($vehicleID, $category_id, $make, $model, $year) {
    global $db;
    $query = 'UPDATE vehicles
              SET categoryID = :category_id,
                  make = :make,
                  model = :model,
                  year = :year
               WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':vehicle_id', $vehicleID);
    $statement->execute();
    $statement->closeCursor();
}
?>