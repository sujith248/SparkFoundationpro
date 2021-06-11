<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transactions.css" type="text/css">
    <title>Transactions</title>
</head>
<body>
    <?php
        require 'navbar.php';
    ?>
    <div class="transactions">
        <h1>Transactions</h1>
        <table class="transactionstable">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Amount Transferred</td>
                    <td>Date and Time of Transaction</td>
                </tr>
            </thead>
            <?php
                require 'connect.php';
                $sql = "SELECT * FROM `transaction`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['sender']; ?></td>
                    <td><?php echo $row['receiver']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    <td><?php echo $row['datetimeoftransaction']; ?></td>
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