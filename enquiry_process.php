<?php 
    include "include/session.php";  
    include "include/functions.php"; 

    require_once __DIR__ . '/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $errors = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enquiry'])){
        $firstname = ucwords(strtolower(sanitise_input($_POST['firstname'])));
        $lastname = ucwords(strtolower(sanitise_input($_POST['lastname'])));
        $email = sanitise_input($_POST["email"]);
        $phone = sanitise_input($_POST["phone"]);
        $street = ucwords(strtolower(sanitise_input($_POST['street'])));
        $city = ucwords(strtolower(sanitise_input($_POST['city'])));
        $postcode = sanitise_input($_POST["postcode"]);
        $add_state = $_POST["state"];
        $tutorial = $_POST["herb_tutorial"];
        $enquiry = sanitise_input($_POST["question"]);
        $name = $firstname . ' ' . $lastname;

        if (isSpamAttempt($email, $name)){
            $_SESSION['spam'] = true;
            header("Location: enquiry.php");
            exit();
        }

        $field_error = [];

        if (empty($firstname) or empty($lastname) or empty($email) or empty($phone) or empty($street) or empty($city) or empty($postcode) or empty($add_state) or empty($tutorial) or empty($enquiry)) {
            array_push($errors, " Please fill in all the required fields.");
        } else {
            if (!preg_match("/^[A-Za-z\s]+$/", $firstname) || !preg_match("/^[A-Za-z\s]+$/", $lastname)) {
                $field_error['name'] = "* Name can only contain letters.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $field_error['email'] = "* Invalid email format.";
            }
            if (!preg_match("/^\d{3}-\d{7,8}+$/", $phone)) {
                $field_error['phone'] = "* Invalid phone number format (e.g., 012-3456789).";
            }
            if (!preg_match("/^[A-Za-z\s]+$/", $city)) {
                $field_error['city'] = "* City can only contain letters.";
            }
            if (!preg_match("/^\d{5}$/", $postcode)) {
                $field_error['postcode'] = "* Invalid postcode.";
            }
        }

        if (count($errors) == 0 && count($field_error) == 0) { 
            $enquiry_query = "INSERT INTO enquiry (firstname, lastname, email, phone, street, city, postcode, add_state, tutorial, enquiry) VALUES ('$firstname', '$lastname', '$email', '$phone', '$street', '$city', '$postcode', '$add_state', '$tutorial', '$enquiry')"; 
            if (mysqli_query($conn, $enquiry_query)) { 
                $submitted = TRUE;
            } else { 
                array_push($errors, "Error: " . mysqli_error($conn)); 
            } 
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header('Location: enquiry.php');
            exit();
        }
        if (count($field_error) > 0) {
            $_SESSION['field_error'] = $field_error;
            header('Location: enquiry.php'); 
            exit();
        } 
    } 
    mysqli_close($conn);
?>

<!DOCTYPE html>  

<html lang="en">
<!-- Description: Enquiry Submission Page -->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date 11/11/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Enquiry Submission | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Cyndia Teo Ya Aii"/>
	<meta name="description" content="Get in touch for any inquiries about plant herbarium, classification, species identification, and care techniques. The Green Life team is ready to assist with all your plant-related questions and provide expert guidance."/>
	<meta name="keywords" content="plant, identification, plant identification, species, genus, plant family, enquiry"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>  
    <?php include "include/header.php"; ?>

<article id="confirm_enquiry">
<?php 
    include "include/enquiry_btn.php"; 
    $time = date("Y-m-d H:i:s");
    echo "
    <div id='confirm_enquiry_container'>
        <h1>Enquiry Submitted</h1>
        <form>
            <fieldset>
                <legend>Enquiry Details</legend>
                <h2>Thank You for Reaching Out!</h2>
                <p>We appreciate you taking the time to connect with us. Our team will review your message and get back to you as soon as possible. Your feedback and questions help us improve and better serve our community.</p>
                <p>Thank you $name, for your trust in us. We're here to help you every step of the way!</p>
                <p>Your enquiry details are as follow:</p>
                <div id='enquiry_process_details'>
                    <p>Submitted on:&emsp;$time</p>
                    <p>Name:&emsp;$name </p>
                    <p>Email:&emsp;$email </p>
                    <p>Phone:&emsp;$phone </p>
                    <p>Address:&emsp;$street, $postcode $city, $add_state, Malaysia. </p>
                    <p>Herbarium Tutorial:&emsp;$tutorial </p>
                    <p>Enquiry:&emsp;$enquiry </p>
                </div>
                <div class='back-btn'>
                    <a href='enquiry.php'>BACK</a>
                </div>
            </fieldset>
        </form>
    </div>";
?>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>