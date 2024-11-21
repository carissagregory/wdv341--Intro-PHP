<?php

//To connect to the database the following steps:

    //a. Get the form data from the $_POST 
    //1. Connect to the database
    //2. Create your SQL query
    //3. Prepare your PDO Statement
    //4. Bind Variables to the PDO Statement, if any
    //5. Execute the PDO Statement - Run your SQL against the database
    //6. Process the results back to the client

    $eventsName = $_POST['events_name'];    //get the data from the form into a variable
    $eventsDescription = $_POST['events_description'];
    $eventsPresenter = $_POST['events_presenter'];
    $eventsDate = $_POST['events_date'];
    $eventsTime = $_POST['events_time'];
    

    //echo $eventsName;
    //echo $eventsDescription;
    //echo $eventsDate;
    //echo $eventsTime;

    $eventsDateInserted = date("Y-m-d");       //needs format like YYYY-MM-DD with current date
    $eventsDateUpdated = date("Y-m-d");


    try{
        require '../../dbConnect.php';        //access to the database 
        
        $sql = "INSERT INTO wdv341_events (
                    events_name, 
                    events_description, 
                    events_presenter, 
                    events_date, 
                    events_time, 
                    events_date_inserted, 
                    events_date_updated
                    ) 
                VALUES (
                    :eventsName, 
                    :eventsDescription, 
                    :eventsPresenter, 
                    :eventsDate, 
                    :eventsTime, 
                    :eventsDateInserted, 
                    :eventsDateUpdated
                    )";    //named parameter

        $stmt = $conn->prepare($sql);   //prepared statement PDO

        //Bind Parameters
        $stmt->bindParam(":eventsName", $eventsName);
        $stmt->bindParam(":eventsDescription", $eventsDescription);
        $stmt->bindParam(":eventsPresenter", $eventsPresenter);
        $stmt->bindParam(":eventsDate", $eventsDate);
        $stmt->bindParam(":eventsTime", $eventsTime);
        $stmt->bindParam(":eventsDateInserted", $eventsDateInserted);
        $stmt->bindParam(":eventsDateUpdated", $eventsDateUpdated);

        $stmt->execute();       //Execute the PDO Prepared statement, save the results in $stmt object

        $stmt->setFetchMode(PDO::FETCH_ASSOC);       //return values as an associative array

    }
    catch(PDOException $e) {
        echo "Database Failed: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #bbe4ff;
        }
        h1, h2 {
            text-align: center;
        }
        a {
            color: #4b315c;
            text-align: center;
        }
        a:hover{
            color: #74b08e;
        }
    </style>
</head>
<body>
    <h1>Wdv341 Intro PHP</h1>
    <h2>Thank you for the data!</h2>
    <a href="eventInputForm.html" target="_blank">Submit another new event</a>
</body>
</html>