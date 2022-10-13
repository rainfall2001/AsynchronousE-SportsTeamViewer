<?php
//this file querys the database to get all the team and sends back the team information which
//has already been formated

	//connect to the database 
    require_once('connect.php');

    //create the sql query and send it
    $query = "select * from `team`";
    $result = $con->query($query);

    //format data that has been received
    if($result != FALSE){
        echo "<div id='teams'>";
        echo "<h2 class=teamHeading>Teams</h2>";
        while($row = $result->fetch()){
            echo "<div class=teamItem onclick='getTeamInfo(".$row['id'].")'>";
            echo "<p> ".$row['name']."</p>";
            echo "</div>";
        }
        echo "</div>";
    } 
    else
    	die("Error in database query");
   
?>