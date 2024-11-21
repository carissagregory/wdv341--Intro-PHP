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

        form	{
            width:750px;
            margin:auto;
            padding-left: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            
        }
            
        form legend	{
            font-size:36px;
            text-align:center; 
        }

        form p {
            margin-bottom: 15px;
            margin-left: 200px;
        }

        [type="text"], [type="date"], [type="time"]{
            width: 325px;
            background-color: #f2e9ff;
            border: 1px solid #e9daff;
            border-radius: 10px;
        }

        textarea {
            vertical-align: top;
            text-align: left;
        }

        [type="submit"], [type="reset"] {
            background-color: #212121;
            color: white;
            margin-bottom: 15px;
            margin-right: 5px;
            border-radius: 15px;
            padding: 10px;
            margin-left: 70px;
        }
    </style>
</head>
<body>
    <h1>WDV 341 Intro PHP</h1>
    <h2>Unit 9 Insert - Input form sends data to the database</h2>
    <form method="post" action="insertEvent.php">
        <legend>Insert Event</legend>
        <p>
            <label for="events_name">Event Name:</label>
            <input type="text" name="events_name" id="events_name" placeholder="Event Name" required>
        </p>
        <p>
            <label for="events_description">Event Description:</label>
            <input type="text" name="events_description" id="events_description" placeholder="Description" required>
        </p>
        <p>
            <label for="events_presenter">Event Presenter:</label>
            <input type="text" name="events_presenter" id="events_presenter" placeholder="Event Presenter" required>
        </p>
        <p>
            <label for="events_date">Event Date:</label>
            <input type="date" name="events_date" id="events_date" required> 
        </p>
        <p>
            <label for="events_time">Event Time:</label>
            <input type="time" name="events_time" id="events_time" required> 
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Submit">
            <input type="reset" name="reset" id="reset" value="Reset">
        </p>
    </form>
</body>
</html>