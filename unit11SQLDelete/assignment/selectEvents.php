<?php
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

        $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";
        
        $stmt = $conn->prepare($sql);   //prepared statement PDO

        //Bind Parameters - n/a

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
    <title>11-1: Delete Event</title>
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
        button {
            border: 1px solid black;
            border-radius: 15px;
            background-color: purple;
            color: white;
            padding: 10px;
        }
        a {
            color: white;
            text-decoration: none;
        }
        button:hover {
            background-color: #730099;
        }
    </style>
    <script>
        function confirmDelete(inEventsID) {
            //alert("inside confirmDelete() need to know events_id: " + inEventsID);
            //display a modal asking Delete this Record Y or N
            let confirmCode = confirm("To 'DELETE' this event click 'OK'. If you delete this event you cannot recover it.");
            
            //if the response is Y send the events_ID to the deleteEvent.php page to be deleted
            if (confirmCode == true) {
                //True - delete record
                //alert("Delete Record");
                window.location.href = "deleteEvent.php?eventsID=" + inEventsID;
            } 
            else {
                //alert("Save Record");
            }
            //if N nothing
            
        }
    </script>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>11-1: Delete Event</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Delete Event</th>
        </tr>
        <?php
            //put the loop that processes the database result and outputs the content as HTML table

            //we need to pass the events_id for each row to the deleteEvent.php process

            while($eventRow = $stmt->fetch()){
                echo "<tr>";
                echo "<td>" . $eventRow["events_name"] . "</td>";
                echo "<td>" . $eventRow["events_description"] . "</td>";
                //echo "<td> <button> <a href='deleteEvent.php?eventsID=" . $eventRow["events_id"] . "'> Delete </a> </button> </td>";
                echo"<td> <button onclick='confirmDelete(" . $eventRow['events_id'] . ")'> Delete</button> </td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>