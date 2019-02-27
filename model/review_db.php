<?php
function add_review($vehicle_id, $comfort, $aesthetics, $performance, $value, $overall) {
    global $db;
    $query = 'INSERT INTO reviews
                 (vehicleID, comfort, aesthetics, performance, value, overall)
              VALUES
                 (:vehicle_id, :comfort, :aesthetics, :performance, :value, :overall)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->bindValue(':comfort', $comfort);
    $statement->bindValue(':aesthetics', $aesthetics);
    $statement->bindValue(':performance', $performance);
    $statement->bindValue(':value', $value);
    $statement->bindValue(':overall', $overall);
    $statement->execute();
    $statement->closeCursor();
}

function get_reviews_by_vehicle($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM reviews
              WHERE reviews.vehicleID = :vehicle_id
              ORDER BY reviewID';
    $statement = $db->prepare($query);
    $statement->bindValue(":review_id", $review_id);
    $statement->execute();
    $reviews = $statement->fetchAll();
    $statement->closeCursor();
    return $reviews;
}


?>