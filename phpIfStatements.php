<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP If Statements</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Basics- If Statements</h2>
    <?php 
        /*
        The time is before noon display a "Good Morning" greeting
        else display "good afternoon" greeting
        */
        //displays current date/time

        echo date("H");      //24 hour 

        If(date("H") <= 12){
            echo "Good Morning";
        }
        else{
            echo "Good Afternoon";
        }

        /*
        
        if it's morning output a radio button
        else checkbox

        if(){
            display a chunck of HTML
        }
        else{
            display a different chunk of HTML
        }
        */
        ?>

        <div class="greeting">
            <?php
                if(date("H") <= 12){
            ?>
                <label>Morning</label>
                <input type="radio">
            <?php
                }
                else{
            ?>
                <label>Afternoon</label>
                <input type="checkbox">
            <?php
                }
            ?>
        </div>
    
</body>
</html>