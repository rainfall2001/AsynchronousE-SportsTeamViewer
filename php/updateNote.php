<?php
//this file querys the database to update the notes of the person and sends back the updated notes

	//connect to the database 
    require_once('connect.php'); 

    //get the data and the id of the person to be updated
    $jsondata = file_get_contents("php://input");
    $data = json_decode($jsondata, true);

    $notes = $data['notes'];
    $id = $data['personId'];

    //create the sql query
    $update = "UPDATE `person` SET `notes` = '$notes' WHERE `person`.`id` = $id";
    
    //run the query and check the result
    if ($con->query($update)) {
        //send back the notes as text
        echo "Notes: ".$notes;
    } else {
        echo "Error updating record because : " . $con->errorCode();
    }
?>