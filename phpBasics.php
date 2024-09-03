<?php 
//MODEL - data
//assign variables at top of page
//access a database at top of page

$firstName = "Mary";   //PHP variable - datatype? String 

$colors = array("Red", "Green", "Blue");

//CONTROLLER - business logic/general code



//VIEW - user interface
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Basics and Examples</h2>
    <?php
        echo "<h3>Hello from PHP</h3>";
        print "<h3>Hello!</h3>"; //echo is used more, but they do the same things
    
    ?>
    <h3 class=<?php echo "'greetingLine'" ?>>Welcome:<?php echo " Mary" ?></h3>

    <label for="colorRed">Red:</label>
    <input type="radio" name="colorGroup" id="colorRed" value="red">
    <?php
        echo " <label for='colorBlue'>Blue:</label>";
        echo "<input type='radio' name='colorGroup' id='blue' value='blue'>";
        echo " <label for='colorGreen'>Green:</label>";
        echo "<input type='radio' name='colorGroup' id='colorGreen' value='green'>";
    ?>
    <?php 

    for($x=0; $x < count($colors); $x++){
        $radioColor = $colors[$x];
        //echo $colors[$x];
        echo "<div>";
        echo " <label for='color$radioColor'>$radioColor:</label>";
        echo "<input type='radio' name='colorGroup' id='$radioColor' value='"
        . strtolower($radioColor) . "'>";
        echo "</div>";
    }
    ?>
</body>
</html>