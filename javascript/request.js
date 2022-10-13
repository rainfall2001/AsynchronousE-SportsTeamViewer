// This method will create a new AJAX request.
let ajaxRequest = (method, url, data, callback) => {
    var request = new XMLHttpRequest();

    //set up request
    request.open(method, url);
    if(method == "POST"){
        request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    }
    request.onload = function(){
        var response = request.responseText;
        callback(response);
    }
    //execute the request
    request.send(data);
}

// This method will create a new fetch request.
let fetchRequest = async(method, url, data, callback) => {
    //set up the fetch request
    let response = await fetch(
        url, {
            method: method,
            body: JSON.stringify(data)
        }
    );
    //once a response has been received execute the callback function
    let responseData = await response.text();
    callback(responseData);
}

// This method creates all the parameters to create an ajax request to get all the teams 
// in the database.
let getTeams = () => {
    var relativeUrl = "~php/getTeams.php";
    var url = relativeUrl.replace('~', '');
    ajaxRequest("GET", url, "", processResult);
}

// This method creates all the parameters to create a fetch request to get the team info of the 
// team selected.
let getTeamInfo = (teamId) => {
    var data = {
        teamId: teamId
    }
    var relativeUrl ="~php/getTeamInfo.php";
    var url = relativeUrl.replace('~', '');
    fetchRequest("post", url, data, processResult);
}

// This method creates all the parameters to create a fetch request to get info about the person
// selected.
let getPerson = (teamId, personId) => {
    //the teamId must be passed in to allow the user to go back to the team the person was in
    var data = {
        personId: personId,
        teamId: teamId
    }
    var relativeUrl ="~php/getPerson.php";
    var url = relativeUrl.replace('~', '');
    fetchRequest("post", url, data, processResult);
}

// This method is the callback function when the request has finished.
// It will display what was in the response.
let processResult = (response) => {
    var divElement = document.getElementById("centre");
    divElement.innerHTML = response;
}

// This method is the callback function when the request to update the notes
// has finished. It will display what was in the response.
let processUpdate = (response) => {
    var notes = document.getElementById("notes");
    notes.innerHTML = response;
}

// This method allows the user to update the notes of a person.
let editNotes = () => {
    //make the input text area visible to the user
    document.getElementById("divEdit").className = "show";

    //add the previous notes to the input text
    var textArea = document.getElementById("inputArea");
    var notes = (document.getElementById("notes")).textContent;
    notes = notes.replace("Notes: ", "");
    textArea.innerHTML = notes;

    //hide the edit button
    document.getElementById("buttonEdit").className = "hide";
}

// This method creates an ajax request to update the notes of the person selected.
let submitNotes = () => {
    //get and check if the updated notes are valid
    var notes = (document.getElementById("inputArea")).value;
    var regex = /^[A-Za-z0-9 _ . -]*$/;
    var result = regex.test(notes);
    //check to see if the notes the user has provided is valid
    if(notes == ""){
        alert("Please enter text.");
    }
    else if(result) {
        //get the person's id
        var idValue = (document.getElementById("personId")).textContent;
        var id = idValue.replace("ID: ", "");

        let data = JSON.stringify({
            personId: parseInt(id, 10),
            notes: notes
        });
        
        //the note is valid, create a new ajax request to update the notes in the database
        var relativeUrl = "~php/updateNote.php";
        var url = relativeUrl.replace('~', '');
        ajaxRequest("POST", url, data, processUpdate);

        //show the edit button again and hide the input text area
        hideEdit();
    } 
    else {
        alert("Invalid characters in the notes.");
    }
}

// This method shows the edit button and hides the input text area
let hideEdit = () => {
    document.getElementById("divEdit").className = "hide";
    document.getElementById("buttonEdit").className = "show";
}