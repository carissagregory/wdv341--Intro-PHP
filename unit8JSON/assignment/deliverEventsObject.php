<?php
    //Access the WDV341 database to get the wdv341_events table data
    //Create an Event object using the Event class
    //Load the events data into that object
    //Format the Event object into a JSON format
    //echo the object back to the client

    //To connect to the database the following steps:
        //1. Connect to the database
        //2. Create your SQL query
        //3. Prepare your PDO Statement
        //4. Bind Variables to the PDO Statement, if any
        //5. Execute the PDO Statement - Run your SQL against the database
        //6. Process the results from the query
    try{
        require '../../dbConnect.php';        //access to the database 

        //variable = SELECT columns FROM table
        //for more columns list them seperated by comma

        $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time FROM wdv341_events";
        
        $stmt = $conn->prepare($sql);   //prepared statement PDO

        //Bind Parameters - n/a

        $stmt->execute();       //Execute the PDO Prepared statement, save the results in $stmt object

        $stmt->setFetchMode(PDO::FETCH_ASSOC);       //return values as an associative array

    }
    catch(PDOException $e) {
        echo "Database Failed: " . $e->getMessage();
    }

    require "Event.php";        //get access to the Event class

    
    //$eventObject = new Event();     //instantiate a new object
    //Fetch an event from the result
    //get each column of data and set it into the eventObject
    //Do this for EACH event in the database

    //fetch one event from the table
    //make this a loop

    $eventArray = [];       //array to store event object
    while ($eventRow = $stmt->fetch()) {
        $outputObj = new Event();  

        $outputObj->setEventsID($eventRow["events_id"]);
        $outputObj->setEventsName ($eventRow["events_name"]);
        $outputObj->setEventsDescription($eventRow["events_description"]);
        $outputObj->setEventsPresenter($eventRow["events_presenter"]);
        $outputObj->setEventsDate($eventRow["events_date"]);
        $outputObj->setEventsTime($eventRow["events_time"]);

        //add the object to an array
        array_push($eventArray, $outputObj);

    }    

        echo json_encode($eventArray);    


    //Testing Output 
    //echo "<p> Events ID: " . $eventObject->getEventsID() . "</p>";
    //echo "<p> Events Name: " . $eventObject->getEventsName() . "</p>";
    //echo "<p> Events Description: " . $eventObject->getEventsDescription() . "</p>";
    //echo "<p> Events Presententer: " . $eventObject->getEventsPresenter() . "</p>";

    //convert $eventObject into a JSON object $eventObjectJSON

    //echo json_encode($eventObject);  //send the JSON object to the response
    //echo $eventObject;    //cannot read a php object, so it displays an error



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8-1: PHP-JSON Event Object</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Assignment 8-1: PHP-JSON Event Object</h2>
</body>
</html>