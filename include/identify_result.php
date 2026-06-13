<?php 
    if (isset($_POST['identify_submit'])){
        //upload file for identification
        $identify_photo_error = $_FILES['identifyphoto']['error'];

        $extension = ['jpg', 'jpeg', 'png'];
        $field_error = [];
        if ($identify_photo_error != UPLOAD_ERR_OK) {
            $field_error['identifyphoto'] = "* No image selected.";
        } else {
            $identify_photo_name = $_FILES['identifyphoto']['name'];
            $identify_photo_size = $_FILES['identifyphoto']['size'];
            $identify_photo_tmp = $_FILES['identifyphoto']['tmp_name'];

            if ($identify_photo_size > 10485760){
                $field_error['identifyphoto'] = "* Image size exceeds 10MB.";
            } else {
                $identify_photo_ex = strtolower(pathinfo($identify_photo_name, PATHINFO_EXTENSION));
                if(!in_array($identify_photo_ex, $extension)){
                    $field_error['identifyphoto'] = "* Invalid image format.";
                }
            }
        }

        if (empty($field_error)){
            $new_identify_photo_name = uniqid("IMG-", true) . '.' . $identify_photo_ex;
            $target_file = 'identify_img/' . $new_identify_photo_name;

            if (!is_dir('identify_img')) {
                mkdir('identify_img', 0755, true);
            }

            //Move file to a folder
            if (move_uploaded_file($identify_photo_tmp, $target_file)){
                //Send http post request to flask server
                $flask_url = 'https://greenlife-ylki.onrender.com/predict';
                $curl = curl_init();

                $cfile = new CURLFile($target_file, mime_content_type($target_file), $new_identify_photo_name);
                $postFields = ['image' => $cfile];

                // Set cURL options
                curl_setopt($curl, CURLOPT_URL, $flask_url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
                curl_setopt($curl, CURLOPT_TIMEOUT, 90);

                $response = curl_exec($curl);
                $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);

                // Check for errors
                if ($http_status == 200) {
                    $result = json_decode($response, true);
                    if ($result === null) {
                        $field_error['identifyphoto'] = "* Invalid response from server.";
                    } else {
                        $_SESSION['identify_result'] = $result;
                        $_SESSION['plantphoto'] = $target_file;
                    }
                } else {
                    $field_error['identifyphoto'] = "* Error processing image. Please try again later.";
                }
            }
        } else {
            $_SESSION['field_error'] = $field_error;
        }

        //information display based on highest similarity
        if (isset($_SESSION['identify_result']) && is_array($_SESSION['identify_result'])){
            arsort($_SESSION['identify_result']);
            $highest_result = array_key_first($_SESSION['identify_result']);
            $result = $_SESSION['identify_result'];
            switch ($highest_result) {
                case 'Actinodaphne mushaensis':
                    $family = 'Lauraceae';
                    $distribution = 'Taiwan';
                    $habitat = 'Subtropical biome';
                    break;
                case 'Canarium subulatum':
                    $family = 'Burseraceae';
                    $distribution = 'Southeast Asia (Thailand, Cambodia, Laos, Vietnam), Southern China (South-central China), India(Assam and East Himalaya) and Indo-China (Myanmar)';
                    $habitat = 'Wet tropical biome';
                    break;
                case 'Dipterocarpus elongatus':
                    $family = 'Dipterocarpaceae';
                    $distribution = 'Indonesia (Kalimantan and Sumatra), Malaysia (Penisular Malaysia and Sarawak) and Singapore';
                    $habitat = 'Wet tropical biome';
                    break;
                default:
                    $family = '-';
                    $distribution = '-';
                    $habitat = '-';
                    break;
            }
        }
    }

	echo "<div><a href='identify.php' class='popup_overlay'></a></div>
        <div id='identify_popup'>
            <h2>Uncover Your Plant's Identity</h2>";
	if (!isset($_POST['identify_submit']) || isset($_SESSION['field_error']['identifyphoto'])){
        echo "<form name='identify_submit' method='POST' enctype='multipart/form-data'>
                <p class='file'>
                    <input type='file' id='identifyphoto' name='identifyphoto' accept='image/*' />&emsp;
                    <button type='submit' name='identify_submit'><i class='fa-solid fa-arrow-up-from-bracket'></i>&ensp;UPLOAD</button>&emsp;";
                    if (isset($_SESSION['field_error']['identifyphoto'])){
                        echo "<span class='error-messages'>" . $_SESSION['field_error']['identifyphoto'] . "</span>";
                        unset($_SESSION['field_error']['identifyphoto']);
                    } 
        echo	"</p>
			</form>";
        if (isset($_SESSION['plantphoto'])){
            unlink($_SESSION['plantphoto']); //delete identify photo
            unset($_SESSION['plantphoto']);
        }
	    unset($_SESSION['identify_result']);
    }
	echo "<div id='arrange_popup'>
            <div>
                <figure>" . ((isset($_POST['identify_submit']) && empty($field_error)) ? "<img src='$target_file' />" : "") . "</figure>
                <div>
                    <a href='identify.php'><i class='fa-solid fa-angles-left'></i> BACK</a>&ensp;
                    <a href='?action=identify'". ((isset($_POST['identify_submit']) && empty($field_error)) ? "id='reidentify'": "") ."><i class='fa-regular fa-image'></i> IDENTIFY AGAIN</a>
                </div>
            </div>
            <div id='result-right'>
                <div id='plant_details'>
                    <p><strong>Scientific Name: </strong>&ensp;". (isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) && ($highest_result != 'Others') ? "<span class='detail'><em>".$highest_result."</em></span>" : "-") ."</p>
                    <p><strong>Plant Family: </strong>&ensp;". (isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) && ($highest_result != 'Others') ? "<span class='detail'><em>$family</em></span>": "-") ."</p>
                    <p><strong>Distribution: </strong>&ensp;". (isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) && ($highest_result != 'Others') ? "<span class='detail'>$distribution</span>": "-") ."</p>
                    <p><strong>Habitat: </strong>&ensp;". (isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) && ($highest_result != 'Others') ? "<span class='detail'>$habitat</span>": "-") ."</p>
                </div>
                <form>
                    <fieldset>
                        <legend><h3>Identify Result</h3></legend>
                        <table>
                            <tr>
                                <td><em>Actinodaphne mushaensis: </em></td>
                                <td><div class='percentage_bar'><div class='result-bar' style='width:".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Actinodaphne mushaensis'] : "0")."%'></div></div></td>
                                <td>".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Actinodaphne mushaensis']." %" : " - ")."</td>
                            </tr>
                            <tr>
                                <td><em>Canarium subulatum: </em></td>
                                <td><div class='percentage_bar'><div class='result-bar' style='width:".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Canarium subulatum'] : "0")."%'></div></div></td>
                                <td>".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Canarium subulatum']." %" : " - ")."</td>
                            </tr>
                            <tr>
                                <td><em>Dipterocarpus elongatus: </em></td>
                                <td><div class='percentage_bar'><div class='result-bar' style='width:".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Dipterocarpus elongatus'] : "0")."%'></div></div></td>
                                <td>".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Dipterocarpus elongatus']." %" : " - ")."</td>
                            </tr>
                            <tr>
                                <td>Others: </td>
                                <td><div class='percentage_bar'><div class='result-bar' style='width:".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Others'] : "0")."%'></div></div></td>
                                <td>".(isset($_POST['identify_submit']) && isset($_SESSION['identify_result']) && empty($field_error) ? $result['Others']." %" : " - ")."</td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>";
?>