<?php
    include "include/session.php";
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    unset($_SESSION['errors']); 
    
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Contribution Page -->
<!-- Author: Aryn Jee Mei Wei -->
<!-- Date 6/9/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Contribution | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Aryn Jee Mei Wei"/>
	<meta name="description" content="Share your plant photos with our community and help grow our herbarium database. Contribute to plant identification efforts, showcase your findings, and collaborate with fellow plant enthusiasts."/>
	<meta name="keywords" content="plant, identification, plant contribution, species, genus, plant family"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>

<article id="contributionpage">
    <?php 
        include "include/enquiry_btn.php"; 
        if (!isset($_SESSION['success'])) {
            echo
            "<div class='popup_overlay'></div>
            <div class='authenticator'>
                <h2>Sign In Required</h2>
                <p>Please sign in to access this feature.</p>
                <p class='signin'><a href='login.php'>SIGN IN</a></p>
                <p><a href='index.php'>No Thanks</a></p>
            </div>";
        }
    ?>
    <?php if (isset($_SESSION['pop_up'])): ?>
		<div class="pop-up_message">
			<p><i class="fa-regular fa-circle-check"></i> &nbsp; You have successfully logged in!</p>
		</div>
		<?php unset($_SESSION['pop_up']); ?>
	<?php endif; ?>
    <div id="contribution_container">
        <div id="left">
            <h1>Help us out by sharing your<br>plant or herbarium photos</h1>
            <p>Get a chance to be part of our growing plant community by contributing plant photos to our database. Every photo you share helps us create a richer, more diverse resource for plant and herbarium enthusiasts everywhere.</p>
        </div>

        <div id="right">
            <form id="contribution" name="contribution" method="post" action="contribute_process.php" enctype="multipart/form-data" novalidate="novalidate">
            <?php include "include/errors.php"; ?>
                <p><label for="plantname">Plant Name: </label>&nbsp;<input type="text" id="plantname" name="plantname" placeholder="Enter Plant Name" maxlength="25" value=""/>
                <?php 
                    if (isset($_SESSION['field_error']['plantname'])){
                        echo "<span class='error-messages'>" . $_SESSION['field_error']['plantname'] . "</span>";
                        unset($_SESSION['field_error']['plantname']);
                    } 
                ?>
                </p>

                <p>Plant Family: </p>
                <p id="radio-btn">
                    <span><input type="radio" id="dipterocarpaceae" name="plantfamily" value="Dipterocarpaceae" checked="checked"/>
                    <label for="dipterocarpaceae">Dipterocarpaceae</label>&emsp;</span>
                    <span><input type="radio" id="lauraceae" name="plantfamily" value="Lauraceae"/>
                    <label for="lauraceae">Lauraceae</label>&emsp;</span>
                    <span><input type="radio" id="burseraceae" name="plantfamily" value="Burseraceae"/>
                    <label for="burseraceae">Burseraceae</label></span>
                </p>
            
                <p>Plant Genus: </p>
                <p><select name="plantgenus">
                    <option value="">Please select</option>
                    <optgroup label="Dipterocarpaceae">
                        <option value="Vatica">Vatica</option>
                        <option value="Dipterocarpus">Dipterocarpus</option>
                        <option value="Hopea">Hopea</option>
                    </optgroup>
                    <optgroup label="Lauraceae">
                        <option value="Actinodaphne">Actinodaphne</option>
                        <option value="Endiandra">Endiandra</option>
                        <option value="Beilschmiedia">Beilschmiedia</option>
                    </optgroup>
                    <optgroup label="Burseraceae">
                        <option value="Canarium">Canarium</option>
                        <option value="Dacryodes">Dacryodes</option>
                        <option value="Santiria">Santiria</option>
                    </optgroup>
                </select></p>

                <p>Plant Species: </p>
                <p><select name="plantspecies">
                    <option value="">Please select</option>
                    <optgroup label="Vatica">
                        <option value="Vatica acrocarpa">Vatica acrocarpa</option>
                        <option value="Vatica bella">Vatica bella</option>
                        <option value="Vatica chinensis">Vatica chinensis</option>
                        <option value="Vatica flavovirens">Vatica flavovirens</option>
                        <option value="Vatica elliptica">Vatica elliptica</option>
                    </optgroup>

                    <optgroup label="Dipterocarpus">
                        <option value="Dipterocarpus alatus">Dipterocarpus alatus</option>
                        <option value="Dipterocarpus baudii">Dipterocarpus baudii</option>
                        <option value="Dipterocarpus cinereus">Dipterocarpus cinereus</option>
                        <option value="Dipterocarpus elongatus">Dipterocarpus elongatus</option>
                        <option value="Dipterocarpus fusiformis">Dipterocarpus fusiformis</option>
                    </optgroup>

                    <optgroup label="Hopea">
                        <option value="Hopea apiculata">Hopea apiculata</option>
                        <option value="Hopea bullatifolia">Hopea bullatifolia</option>
                        <option value="Hopea cernua">Hopea cernua</option>
                        <option value="Hopea helferi">Hopea helferi</option>
                        <option value="Hopea jacobi">Hopea jacobi</option>
                    </optgroup>

                    <optgroup label="Actinodaphne">
                        <option value="Actinodaphne archboldiana">Actinodaphne archboldiana</option>
                        <option value="Actinodaphne bicolor">Actinodaphne bicolor</option>
                        <option value="Actinodaphne caesia">Actinodaphne caesia</option>
                        <option value="Actinodaphne elegans">Actinodaphne elegans</option>
                        <option value="Actinodaphne mushaensis">Actinodaphne mushaensis</option>
                    </optgroup>

                    <optgroup label="Endiandra">
                        <option value="Endiandra faceta">Endiandra faceta</option>
                        <option value="Endiandra grayi">Endiandra grayi</option>
                        <option value="Endiandra luteola">Endiandra luteola</option>
                        <option value="Endiandra oblonga">Endiandra oblonga</option>
                        <option value="Endiandra pilosa">Endiandra pilosa</option>
                    </optgroup>

                    <optgroup label="Beilschmiedia">
                        <option value="Beilschmiedia anay">Beilschmiedia anay</option>
                        <option value="Beilschmiedia atra">Beilschmiedia atra</option>
                        <option value="Beilschmiedia clarkei">Beilschmiedia clarkei</option>
                        <option value="Beilschmiedia fasciata">Beilschmiedia fasciata</option>
                        <option value="Beilschmiedia louisii">Beilschmiedia louisii</option>
                    </optgroup>

                    <optgroup label="Canarium">
                        <option value="Canarium subulatum">Canarium subulatum</option>
                        <option value="Canarium boivinii">Canarium boivinii</option>
                        <option value="Canarium caudatum">Canarium caudatum</option>
                        <option value="Canarium decumanum">Canarium decumanum</option>
                        <option value="Canarium hirsutum">Canarium hirsutum</option>
                    </optgroup>

                    <optgroup label="Dacryodes">
                        <option value="Dacryodes edulis">Dacryodes edulis</option>
                        <option value="Dacryodes igaganga">Dacryodes igaganga</option>
                        <option value="Dacryodes laxa">Dacryodes laxa</option>
                        <option value="Dacryodes osika">Dacryodes osika</option>
                        <option value="Dacryodes rostrata">Dacryodes rostrata</option>
                    </optgroup>

                    <optgroup label="Santiria">
                        <option value="Santiria laevigata">Santiria laevigata</option>
                        <option value="Santiria griffithii">Santiria griffithii</option>
                        <option value="Santiria apiculata">Santiria apiculata</option>
                        <option value="Santiria sarawakana">Santiria sarawakana</option>
                        <option value="Santiria dacryodifolia">Santiria dacryodifolia</option>
                    </optgroup>
                </select></p>
                
                <fieldset>
                    <legend>Photos</legend>
                    <p>Plant Photo:</p>
                    <?php 
                    if (isset($_SESSION['field_error']['plant-photo'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['plant-photo'] . "</p>";
                        unset($_SESSION['field_error']['plant-photo']);
                    } 
                    ?>
                    <p class="file">
                        <input type="file" id="plantphoto" name="plant-photo" accept="image/*"/>
                    </p>

                    <p>Herbarium Photo:</p>
                    <?php 
                    if (isset($_SESSION['field_error']['herbarium-photo'])){
                        echo "<p class='error-messages'>" . $_SESSION['field_error']['herbarium-photo'] . "</p>";
                        unset($_SESSION['field_error']['herbarium-photo']);
                    } 
                    ?>  
                    <p class="file">
                        <input type="file" id="herbariumphoto" name="herbarium-photo" accept="image/*"/>
                    </p>
                </fieldset>
                
                <p><input type="submit" value="SUBMIT" name="contribute"/></p>
                <p><input type="reset" value="CANCEL"/></p>
            </form>
        </div>
    </div>
</article>

<?php include "include/footer.php"; ?>
</body>
</html>