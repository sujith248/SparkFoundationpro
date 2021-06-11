<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav bar</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">
    <script src="https://kit.fontawesome.com/022055d066.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <h2 class="logo">SB</h2>
        <nav>
            <ul class="nav-elements">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="customer.php">Customers</a></li>
                <li><a href="transactions.php">Transaction History</a></li>
                <li><a href="https://www.thesparksfoundationsingapore.org/about/vision-mission-and-values/" target="_blank">About</a></li>
            </ul>
        </nav>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
</header>
<script>
    const navLinks = document.querySelector('.nav-elements');
    const icon = document.getElementById('icon');
    icon.addEventListener('click', function(){
        navLinks.classList.toggle('show');
    });
</script>
</body>
</html>