<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="customer.css">
    <!-- <link rel="stylesheet" href="navbar.css" type="text/css">
    <link rel="stylesheet"  href="footer.css" type="text/css"> -->
    <title>Customer</title>
</head>
<body>
    <?php
        require 'navbar.php';
    ?>
    <div class="customer">
        <h1>List Of Customers</h1>
        <table class="custtable">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Balance</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <?php
                require 'connect.php';
                $sql = "SELECT * FROM `customer`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    <td><a href="transact.php?sno= <?php echo $row['sno'] ;?>"><button>Transact</button></a></td>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
    </div>
    <?php
        require 'footer.php';
    ?>
</body>
</html>