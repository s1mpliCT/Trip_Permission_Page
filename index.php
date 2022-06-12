<?php
$insert = false;
$errors=array();
if(isset($_POST['name1'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    // $db="trip";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    

    if($con->query($sql) == true){
        $insert=true;
        $errors['msg']= "Thanks for submitting your form. We are happy to see you joining us for the trip";
    }

    $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="background.jpg" alt="background">
    <div class="container">
        <h1>Welcome to US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your Age" >
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn"name="name1" type="submit" >Submit</button> 
            <button class="btn" type="reset">Reset</button>
        </form>
    </div>
    <script >
        <?php
    foreach($errors as $showerror){ ?>
        console.log('<?php echo $showerror; ?>');
        alert('<?php echo $showerror; ?>');
        if(window.history.replacestate){
            window.history.relacestate(null,null,window.location.href);
        }
<?php    }
?>
    </script>
    
</body>
</html>