<?php

    session_start();        //gives us access to a session, or starts a new one if needed

    //check if the form was submitted or needs to be displayed to the customer

    //$errorMessage = "";       //option 1- set global variable

    if($_SESSION['validSession'] === "yes"){
        //if you are a 'validSession' then you should see the Admin page 
        //  you do not need to sign on again
        $validUser = true;  //set flag for valid user to display the Admin Page
    }
    else {
        if (isset($_POST['submit'])) {
            //Did the user SUBMIT the form to sign on?  Yes
            //the form was submitted continue processing the form data
            /*
                -get the data from the form
                -connect to the database
                see if you have a matching record in the users table
                if (match = true) {
                    valid user
                    display the admin page
                }
                else {
                    invalid user
                    display error message
                    display the form
                }
            */

            $inUsername = $_POST['inUsername'];
            $inPassword = $_POST['inPassword'];   //pull the username from the login form

            try{
                require '../../dbConnect.php';        //access to the database 
                
                //does the input username AND password MATCH the username AND password in the datebase?
                //SELECT for a specific set of data WHERE
                $sql = "SELECT COUNT(*) FROM wdv341_users WHERE user_username = :username AND user_password = :password";
        
                $stmt = $conn->prepare($sql);
                
                // Bind parameters
                $stmt->bindParam(":username", $inUsername);
                $stmt->bindParam(":password", $inPassword);
            
                $stmt->execute();
                
                // Fetch the count
                $rowCount = $stmt->fetchColumn();       //get number of rows in result set/statement


                /* 
                echo "Username: $username <br>";
                echo "Password: $password <br>";
                echo "Count: $rowCount <br>";
                */
                if ($rowCount > 0) {
                    //valid username/passwod
                    //echo "<h3> Login successful </h3>";
                    $validUser = true;          //switch aka flag
                    $_SESSION['validSession'] = "yes";  //Valid user- allow access to the admin page
                } else {
                    //invalid
                    //echo "<h3> Invalid username or password </h3>";
                    $validUser = false;
                    $errorMessage = "Invalid username/password, please try again.";
                    $_SESSION['validSession'] = "no";       //invalid user - do Not allow access
                }
                
                $stmt->setFetchMode(PDO::FETCH_ASSOC);       //return values as an associative array
            
                // Prepare and execute the query

            }
            catch(PDOException $e) {
                echo "Database Failed: " . $e->getMessage();
            }
        }
        else {
            //the customer needs to see the form in order to fill it out and SUBMIT it for signin
        }
    }//end of check for 'validSession'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3 {
            color: purple;
        }
        .errorMessageFormat {
            color: red;
            font-style: italic;

        }
        button {
            border: 1px solid black;
            border-radius: 15px;
            background-color: purple;
            color: white;
            padding: 10px;
        }
        a button {
            color: white;
            text-decoration: none;
        }
        button:hover {
            background-color: #730099;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Login Page</h2>
    <?php
        if (isset($_POST['submit']) && $validUser === true) {
            //display ADMIN
    ?>
            <section class="adminPage">
                <!--this section will display to a VALID user once they login-->
                <a href="logout.php"><button>Log Out</button></a>
                <h2>Admin Page</h2>
                <h3>Choose Your Option:</h3>
                <ol>
                    <li><a href="../../unit9SQLInsert/assignment/eventInputForm.php">Add New Event</a></li>
                    <li><a href="../../unit11SQLDelete/assignment/deleteEvent.php">Display Events</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ol>
            </section>
    <?php
        }
        else {
            //display form
    ?>
        <section class="loginForm">
            <!--this section will display when the user asks to login to the application-->
        <h2>Login Form</h2>
        <form method="post" action="login.php">
            <div class="errorMessageFormat">
                <?php
                //option 2- check to see if you have defined ths variable yet
                    if (isset($errorMessage)) {
                        echo $errorMessage;
                    }
                ?>
            </div>
            <p>
                <label for="inUsername">Username: </label>
                <input type="text" name="inUsername" id="inUsername" required>
            </p>
            <p>
                <label for="inPassword">Password: </label>
                <input type="password" name="inPassword" id="inPassword" required>
            </p>
            <p>
                <input type="submit" name="submit" value="Submit">
                <input type="reset">
            </p>
        </form>
        </section>   
    <?php
        }
    ?>

</body>
</html>