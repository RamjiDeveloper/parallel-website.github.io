<?php

$insert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";
 // <-- yaha tumhara database name

// Connection create karo
$conn = mysqli_connect($server, $username, $password, $database);

// Connection check karo
if (!$conn) {
    die("❌ Connection failed due to: " . mysqli_connect_error());
} 
    // echo "✅ Successfully connected to the 'trip' database!";


    $name = $_POST["name"] ?? "";
    $age = $_POST["age"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $desc = $_POST["desc"] ?? "";

    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;



    if($conn ->query($sql) == true){
        // echo "✅ Successfully inserted";

        $insert = true;

    }
    else{
        echo "❌ Error: $sql <br> $conn->error";
    }

    $conn->close();

}

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $insert = true;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:wght@100;300;400&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Urbanist:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg2.webp" alt="">
    <div class="container">
        <h1>Welcome to BGI Ayodhya us trip form</h1>
        <p>Enter your details and submit this form to confirm your paticipation in the trip.</p>
       
        <?php if ($insert == true): ?>
            <p class="submitMsg" id="msg">✅ Thank you for submitting your form. We are happy to have you join our trip!</p>
            <script>
                setTimeout(() => document.getElementById("msg").style.display = "none", 5000);
            </script>
        <?php endif; ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your question..."></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
</body>
<script src="index.js"></script>


</html>
