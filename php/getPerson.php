<?php
//this file querys the database to get the person information and sends back the person info which
//has already been formated

	//connect to the database 
    require_once('connect.php');

    //get the team id selected from the body
    $jsondata = file_get_contents("php://input");
    $data = json_decode($jsondata, true);

    //get the person and team id selected
    $person_id = $data['personId'];
    $team_id = $data['teamId'];

    //create the sql query for the team members of the team selected and send it
    $person_query = "SELECT * FROM `person` WHERE `id` = ".$person_id;
    $person_result = $con->query($person_query);

    //if we get data back format it
    if($person_result != FALSE){
        echo "<div id='person'>";
        $person = $person_result->fetch();
        echo "<p id=personId>ID: ".$person['id']."</p>";
        echo "<p>Given Name: ".$person['given_name']."</p>";
        echo "<p>Family Name: ".$person['family_name']."</p>";
        echo "<p>Stats: ".$person['stats']."</p>";
        echo "<p id='notes'>Notes: ".$person['notes']."</p>";

        //create a button to allow the user to edit the notes
        echo "<button id='buttonEdit' class='show' onclick='editNotes()'><span>Edit Notes</span></button>";
        //create a div which have elements to allow the user to input text to edit the notes
        //hide the div from the user
        echo "<div id='divEdit' class='hide'>
        <label for='inputArea'>Edit Notes:</label>
        <br>
        <textarea id='inputArea' cols='40' rows='5'></textarea>
        <br>
        <button id='buttonSubmit' type='button' onclick='submitNotes()'><span>Submit Notes</span></button>
        <br>
        <button id='buttonCancel' type='button' onclick='hideEdit()'><span>Cancel</span></button>
        </div>";
        echo "</div>";
        echo "<br>";
        //allow the user to go back to either the team info or all the teams
        echo "<button onclick='getTeamInfo(".$team_id.")'><span>Back</span></button>";
        echo "<br>";
        echo "<button onclick='getTeams()'><span>Home</span></button>";
    } 
    else
    	die("Error in database query");
   
?>