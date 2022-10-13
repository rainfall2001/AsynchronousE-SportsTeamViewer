<?php
//this file querys the database to get the team information and sends back the team info which
//has already been formated

	//connect to the database
    require_once('connect.php');
    
    //get the team id selected in the body
    $jsondata = file_get_contents("php://input");
    $data = json_decode($jsondata, true);

    $team_id = $data['teamId'];

    //query the database for the team details selected
    $team_query = "SELECT * FROM `team` WHERE `id` =".$team_id;
    $team_result = $con->query($team_query);
    
    //query the database for the team members of the team selected
    $team_member_query = "SELECT * FROM `team_member` WHERE `team_id` = ".$team_id;
    $team_member_result = $con->query($team_member_query);

    //if it is avaliable format it
    if($team_member_result != FALSE && $team_result != FALSE){
        $team = $team_result->fetch();
        echo "<div id='members'>";
        echo "<h2 id=team>".$team['name']."</h2>";
        echo "<h4 id=plays>Plays: ".$team['game']."</h4>";

        //loop through all the rows that were queried        
        while($row = $team_member_result->fetch()){
            //query the database for the person who's id matches the current team member
            $person_query = "SELECT * FROM `person` WHERE `id` = ".$row['person_id'];
            $person_result = $con->query($person_query);
            //format the team members name
            if($person_result != FALSE){
                //format the data to send back
                $person = $person_result->fetch();
                echo "<div class=teamItem onclick='getPerson(".$team_id. ",".$person['id'].")'>";
                echo "<p>".$person['given_name'];
                echo " ".$person['family_name']."</p>";
                echo "</div>";
            }
        }
        echo "</div>";
        echo "<button onclick='getTeams()'><span>Home</span></button>";
    } 
    else
    	die("Error in database query");
   
?>