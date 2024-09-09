<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $yourName = "Carissa";
        $number1 = 10;
        $number2 = 5;
        $total = $number1 + $number2;
        $languages = array("PHP", "HTML", "JavaScript");
    ?>    
</head>
<body>
    <?php 
       echo "<h1>2-1 PHP Basics</h1>";
    ?>
    <h2><?php echo $yourName; ?></h2>
    <?php 
        echo "<p> Number 1: $number1</p>";
        echo "<p> Number 2: $number2</p>";
        echo "<p> Total: $total </p>";
    ?>
    <p>
    <script>
        let languages = [];
            <?php 
                foreach ($languages as $language){
                    echo "languages.push('$language');";
                }            
            ?>
        for (let x = 0; x < languages.length; x++){
            document.write("<p>" + languages[x] + "</p>");
        }
    </script>
    </p>
</body>
</html>