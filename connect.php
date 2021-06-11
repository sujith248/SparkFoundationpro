<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connect</title>
</head>
<body>
    <?php
        // Connecting to the Database:
        $servername = "localhost";
        $username = "root";
        $password = ""; //needs to be empty string
        $database = "bankingsystem";
        //Creation of Connection:
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        //Die if connection was not successful
        if(!$conn)
        {
            die("Sorry failed to connect: ".mysqli_connect_error());
        }
        
    ?>
</body>
</html>