<?php

//Assignment 7-2 Select one event 
//To connect to the database the following steps:
    //1. Connect to the database
    //2. Create your SQL query
    //3. Prepare your PDO Statement
    //4. Bind Variables to the PDO Statement, if any
    //5. Execute the PDO Statement - Run your SQL against the database
    //6. Process the results from the query
    try{
        require '../../dbConnect.php';        //access to the database 
        
        //hard coded selection- Can't change it
        //$sql = "SELECT events_name, events_description FROM wdv341_events WHERE events_id = 1";
        
        //Pass the desired record id as parameter
        $sql = "SELECT events_name, events_description FROM wdv341_events WHERE events_id = 
        :eventsID";          //named parameter

        $stmt = $conn->prepare($sql);   //prepared statement PDO

        //Bind Parameters
        $eventsID = 1;
        $stmt->bindParam(":eventsID", $eventsID);

        $stmt->execute();       //Execute the PDO Prepared statement, save the results in $stmt object

        $stmt->setFetchMode(PDO::FETCH_ASSOC);       //return values as an associative array

    }
    catch(PDOException $e) {
        echo "Database Failed: " . $e->getMessage();
    }

    /* 
    $eventRecord = $stmt->fetch();          //return the first row of the result - Associative

    echo "<p>" . $eventRecord["events_name"]. "</p>";
    echo "<p>" . $eventRecord["events_description"]. "</p>";

    $eventRecord = $stmt->fetch();          //return the first row of the result - Associative

    echo "<p>" . $eventRecord["events_name"]. "</p>";
    echo "<p>" . $eventRecord["events_description"]. "</p>";
    */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7-2: Select One Event</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 16px;
        }
        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: plum;
        }
        tr:nth-child(even) {
            background-color: lavender;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Assignment 7-2: Select One Event</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Description</th>
        </tr>
        <?php
            //put the loop that processes the database result and outputs the content as HTML table
            while($eventRow = $stmt->fetch()){
                echo "<tr>";
                echo "<td>" . $eventRow["events_name"] . "</td>";
                echo "<td>" . $eventRow["events_description"] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>