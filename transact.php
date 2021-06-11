<?php
    require 'connect.php';

    if(isset($_POST['submit']))
    {
        $from = $_GET['sno'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from customer where sno=$from";
        $query = mysqli_query($conn,$sql);
        $result1 = mysqli_fetch_array($query); 

        $sql = "SELECT * from customer where sno=$to";
        $query = mysqli_query($conn,$sql);
        $result2 = mysqli_fetch_array($query);



        // constraint to check input of negative value by user
        if (($amount)<0)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
            echo '</script>';
        }


    
        // constraint to check insufficient balance.
        else if($amount > $result1['balance']) 
        {
            
            echo '<script type="text/javascript">';
            echo ' alert("Sorry! Insufficient Balance")';  // showing an alert box.
            echo '</script>';
        }
        


        // constraint to check zero values
        else if($amount == 0){

            echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero value cannot be transferred')";
            echo "</script>";
        }


    else {
            
                    // deducting amount from sender's account
                    $newbalance = $result1['balance'] - $amount;
                    $sql = "UPDATE customer SET balance=$newbalance WHERE sno=$from";
                    mysqli_query($conn,$sql);
                

                    // adding amount to reciever's account
                    $newbalance = $result2['balance'] + $amount;
                    $sql = "UPDATE customer SET balance=$newbalance WHERE sno=$to";
                    mysqli_query($conn,$sql);

                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-y h:i:s');

                    $sender = $result1['name'];
                    $receiver = $result2['name'];
                    $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`, `datetimeoftransaction`) VALUES ('$sender','$receiver','$amount', '$date')";
                    $query=mysqli_query($conn,$sql);

                    if($query)
                    {
                        echo "<script> alert('Transaction Successful');
                                        window.location='transactions.php';
                            </script>";
                        
                    }

                    $newbalance= 0;
                    $amount =0;
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="transact.css">
    <title>Transaction</title>
</head>
<body>
    <?php
        require 'navbar.php';
    ?>
    <div class="transact">
        <h1>Transfer Money</h1>
        <form method="post" name="transactform" class="tform">
            <table class="transacttable">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Balance</td>
                    </tr>
                </thead>
                <?php
                    require 'connect.php';
                    $cid = $_GET['sno'];
                    $sql = "SELECT * FROM  `customer` WHERE sno= $cid";
                    $result = mysqli_query($conn, $sql);
                    if(!$result)
                    {
                        echo "Error : ".$sql."<br>".mysqli_error($conn);
                    }
                    $row = mysqli_fetch_assoc($result);
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['sno']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                    </tr>
                </tbody>
            </table>
                <div class="transfer">
                    <label for ="to"><b>Transfer To:</b></label>
                    <select name="to" id="to" required>
                        <option value="">Choose</option>
                        <?php
                            include 'connect.php';
                            $cid=$_GET['sno'];
                            $sql = "SELECT * FROM `customer` WHERE sno!=$cid";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['sno'];?>" >
                            <?php echo $row['name'] ;?> (Balance: 
                            <?php echo $row['balance'] ;?> ) 
                        </option>
                        <?php 
                            } 
                        ?>
                    </select>
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" required>
                    <button name="submit" type="submit" id="Btn" class="btn">Submit</button>
                </div>
        </form>
        <?php
            require 'footer.php';
        ?>
    </div>
</body>
</html>