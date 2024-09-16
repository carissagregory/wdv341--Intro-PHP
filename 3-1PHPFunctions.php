<?php 
//use a function with a timestamp parameter that will format the date as mm/dd/yyyy
    function dateFormat($inTodaysDate){
        echo "<p>" . "Today's Date is: ". date("m/d/Y") . "</p>";
    }

//use a function with a timestamp parameter that will format the date as dd/mm/yyyy
    function internationDateFormat($inIntTodaysDate){
        echo "<p>" . "Today's International Date is: ". date("d/m/Y") . "</p>";
    }

//use a function with a string parameter 
    //display character number of string
    //trim extra white spaces
    //string is all lowercase
    //display DMACC if entered lowercase or uppercase
    function formatSchoolString($inSchoolName){
        echo "<p>" . "String Character #: ". strlen($inSchoolName) ."</p>";
        echo "<p>" . "School Name: " . trim($inSchoolName) . "</p>";
        echo "<p>" . "Lowercase School Name: " . strtolower($inSchoolName) ."</p>";
        if (stripos($inSchoolName, "DMACC") !== false){
           echo "<p>" . "DMACC was found " ."</p>"; 
        };
        

        // if dmacc is in string
    }

    //use a function with a number parameter that will format to phone number
    function formatPhoneNumber($inNumber){
        $convertNumber = strval($inNumber);
        $formattedPhoneNumber = substr($convertNumber, 0, 3) . "-" . substr($convertNumber, 3, 3) . "-" . substr($convertNumber, 6, 4 );
        echo "<p>" . "Phone #: ". $formattedPhoneNumber . "</p>";
    }

    //use a function with a number parameter that will format and display as US currency
    function formatCurrency($inCurrencyNumber){
        $formattedCurrecy = number_format($inCurrencyNumber, 2, ".", ",");
        echo "<p>" . "Currency: " . "$" . $formattedCurrecy . "</p>";
    }

    dateFormat($date);
    internationDateFormat($date);
    formatSchoolString("DMACC");
    formatSchoolString("dmacc");
    formatSchoolString(" Iowa State ");
    formatSchoolString("UNI, DMACC");
    formatPhoneNumber(1234567890);
    formatCurrency(123456);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3-1 PHP Functions</title>
</head>
<body>
<h1>3-1 PHP Functions</h1>
</body>
</html>