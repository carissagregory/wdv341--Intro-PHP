<?php
session_start();

if($_SESSION['validSession'] !== "yes"){
    //you are not a valid user and CANNOT access this porcess - return to login
    header("Location: ../../unit10ProtectedPages/assignment/login.php");    //server side redirect
}

//this page will delete a singe event from wdv341_events table using the events_id value
//No confirmation message is required
//return to selectEvents.php to display the updated events list

//how to get the 
$eventsID = $_GET["eventsID"];
echo "this is the events_id $eventsID that was passed to the deleteEvent.php page from the display events page";


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

    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventsID";
    
    $stmt = $conn->prepare($sql);   //prepared statement PDO

    //Bind Parameters
    //$eventsID = 9;
    $stmt->bindParam(":eventsID", $eventsID);

    $stmt->execute();       //Execute the PDO Prepared statement, save the results in $stmt object

    $stmt->setFetchMode(PDO::FETCH_ASSOC);       //return values as an associative array

}
catch(PDOException $e) {
    echo "Database Failed: " . $e->getMessage();
}

//return to selectEvents.php to display the updated list of events
header("Location: selectEvents.php");

?>