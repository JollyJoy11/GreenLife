<?php
    include "include/session.php"; 
    include "include/functions.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greenlife";

    $conn =  mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $errors = array();

    if (isset($_POST['contribute'])){
        $user_name = $_SESSION['username'];
        $plant_name = ucfirst(strtolower(sanitise_input($_POST['plantname'])));
        $plant_family = $_POST['plantfamily'];
        $plant_genus = $_POST['plantgenus'];
        $plant_species = $_POST['plantspecies'];
        $plant_photo_error = $_FILES['plant-photo']['error'];
        $herbarium_photo_error = $_FILES['herbarium-photo']['error'];

        $field_error = [];

        if (empty($plant_name) or empty($plant_family) or empty($plant_genus) or empty($plant_species)) {
            array_push($errors, " Please fill in all the required fields.");
        } else {
            if (!preg_match("/^[A-Za-z\s]+$/", $plant_name)) {
                $field_error['plantname'] = "* Can only contain letters.";  
            } 
        } 

        $extension = ['jpg', 'jpeg', 'png'];
        // plant photo
        if ($plant_photo_error != 0) {
            $field_error['plant-photo'] = "* No image selected for plant photo.";
        } else {
            $plant_photo_name = $_FILES['plant-photo']['name'];
            $plant_photo_size = $_FILES['plant-photo']['size'];
            $plant_photo_tmp = $_FILES['plant-photo']['tmp_name'];

            if ($plant_photo_size > 10485760){
                $field_error['plant-photo'] = "* Image size exceeds 10MB.";
            } else {
                $plant_photo_ex = strtolower(pathinfo($plant_photo_name, PATHINFO_EXTENSION));
                if(!in_array($plant_photo_ex, $extension)){
                    $field_error['plant-photo'] = "* Invalid image format.";
                }
            }
        }
        // herbarium photo
        if ($herbarium_photo_error != 0) {
            $field_error['herbarium-photo'] = "* No image selected for herbarium photo.";
        } else {
            $herbarium_photo_name = $_FILES['herbarium-photo']['name'];
            $herbarium_photo_size = $_FILES['herbarium-photo']['size'];
            $herbarium_photo_tmp = $_FILES['herbarium-photo']['tmp_name'];

            if ($herbarium_photo_size > 10485760){
                $field_error['herbarium-photo'] = "* Image size exceeds 10MB.";
            } else { 
                $herbarium_photo_ex = strtolower(pathinfo($herbarium_photo_name, PATHINFO_EXTENSION));
                if(!in_array($herbarium_photo_ex, $extension)){
                    $field_error['herbarium-photo'] =  "* Invalid image format.";
                }
            }
        }

        if (count($errors) == 0 && count($field_error) == 0){
            $new_plant_photo_name = uniqid("IMG-", true) . '.' . $plant_photo_ex;
            $new_herbarium_photo_name = uniqid("IMG-", true) . '.' . $herbarium_photo_ex;

            move_uploaded_file($plant_photo_tmp, 'upload_img/' . $new_plant_photo_name);
            move_uploaded_file($herbarium_photo_tmp, 'upload_img/' . $new_herbarium_photo_name);

            $contribute_query = "INSERT INTO contribute (username, plant_name, plant_family, plant_genus, plant_species, plant_photo, herbarium_photo) VALUES ('$user_name', '$plant_name', '$plant_family', '$plant_genus', '$plant_species', '$new_plant_photo_name', '$new_herbarium_photo_name')";
            if (mysqli_query($conn, $contribute_query)){
                $_SESSION['contribute_submitted'] = TRUE;
            } else {
                array_push($errors, " Data insertion failed." . mysqli_error($conn));
            }
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header('Location: contribute.php');
            exit();
        }
        if (count($field_error) > 0) {
            $_SESSION['field_error'] = $field_error;
            header('Location: contribute.php'); 
            exit();
        } 
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>

<html lang="en">
<!-- Description: Contribution Confirm Page -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date 11/11/2024 -->
<!-- Validated: OK -->

<head>
    <title>Contribution Submission | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Aryn Jee Mei Wei"/>
	<meta name="description" content="Contribution form confirmation page"/>
	<meta name="keywords" content="plant, identification, plant contribution, species, genus, plant family"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="contribute_process">
<?php 
    include "include/enquiry_btn.php"; 
    $time = date("Y-m-d H:i:s");
    echo "
    <div id='contribute_process_container'>
        <h1>Contribution Submitted</h1>
        <form>
            <fieldset>
                <legend>Contribution Details</legend>
                <h2>Thank You for Growing Our Community!</h2>
                <p>We deeply appreciate your effort in sharing plant photos with our database. Every image you upload helps us create a richer resource for plant enthusiasts, researchers, and hobbyists around the world.</p>
                <p>Thank you $user_name, for being an invaluable part of our journey.</p>
                <p>Your contribution details are as follow:</p>
                <div id='contribute_process_details'>
                    <p>Submitted on:&emsp;$time</p>
                    <p>Plant Name:&emsp;<em>$plant_name</em></p>
                    <p>Plant Family:&emsp;<em>$plant_family</em></p>
                    <p>Plant Genus:&emsp;<em>$plant_genus</em></p>
                    <p>Plant Species:&emsp;<em>$plant_species</em></p>
                </div>
                <div id='contribute_process_photo'>
                    <div class='photo_container'>
                        <label>Plant Photo: </label>
                        <img src='upload_img/$new_plant_photo_name' alt='Plant Photo' height='300'>
                    </div>
                    <div class='photo_container'>
                        <label>Herbarium Photo: </label>
                        <img src='upload_img/$new_herbarium_photo_name' alt='Herbarium Photo' height='300'>
                    </div>
                </div>
                <div class='back-btn'>
                    <a href='contribute.php'>BACK</a>
                </div>
            </fieldset>
        </form>
    </div>";
    unset($_SESSION['contribute_submitted']);
?>   
</article>
<?php include "include/footer.php"; ?>
</body>
</html>