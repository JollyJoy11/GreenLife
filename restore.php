<?php 
    session_start();  
    require_once __DIR__ . '/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $data_table = isset($_POST['data_table']) ? $_POST['data_table'] : $_GET['data_table'];
    $offset = (int)$_POST['offset'];
    $search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : NULL;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

    switch ($data_table){
        case 'user':
            $table_info = ['ID', 'username', 'firstname', 'lastname', 'email', 'trash_date'];
            break;
        case 'enquiry': 
            $table_info = ['ID', 'firstname', 'lastname', 'email', 'tutorial', 'solve', 'trash_date'];
            break;
        case 'contribute':
            $table_info = ['ID', 'username', 'plant_name', 'trash_date'];
            break;
        case 'feedback':
            $table_info = ['ID', 'goal', 'star_rating', 'trash_date'];
            break;
    }

    //Restore
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['restore'])) { 
        $selected_users = [];
        $selected_users = isset($_POST['selected_user']) ? $_POST['selected_user'] : []; 

        if (!empty($selected_users)) { 
            $restore_id = implode(',', $selected_users);  
            $sql_restore = "UPDATE $data_table SET trash='no', trash_date=NULL WHERE ID IN ($restore_id)"; 
            
            mysqli_query($conn, $sql_restore);
            $_SESSION['restore_success'] = TRUE;
        } 
    } 

    if (isset($_GET['id']) && $_GET['action'] == 'restore') { 
        $restore_id = intval($_GET['id']); 
        $search = isset($_GET['search']) ? $_GET['search'] : NULL; 
        $page = (int)$_GET['page']; 
        $sql_restore = "UPDATE $data_table SET trash='no', trash_date=NULL WHERE ID = $restore_id"; 

        mysqli_query($conn, $sql_restore);
        $_SESSION['restore_success'] = TRUE;
    } 

    //Redirect to Popup
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pmt_delete'])) {
        $_SESSION['offset'] = $_POST['offset'];
        $_SESSION['data_table'] = $_POST['data_table'];
        $_SESSION['page'] = $_POST['page'];
        $_SESSION['search'] = $_POST['search'];
        $_SESSION['selected_user'] = $_POST['selected_user'];
        header("Location: recyclebin.php?action=pmt_delete&bin_table=".$_POST['data_table']."&page=".$_POST['page']."&search=".$_POST['search']); 
        exit();
    } 

    //Permanent delete
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) { 
        $selected_users = []; 
        $selected_users = isset($_POST['selected_user']) ? $_POST['selected_user'] : []; 

        if (!empty($selected_users)) { 
            $pmt_id = implode(',', $selected_users); 
            $sql_pmt = "DELETE FROM $data_table WHERE ID IN ($pmt_id)"; 
            
            mysqli_query($conn, $sql_pmt); 
        } 
     
        if (isset($_POST['pmt_id'])) { 
            $pmt_id = intval($_POST['pmt_id']); 
            $search = isset($_POST['search']) ? $_POST['search'] : NULL; 
            $page = (int)$_POST['page']; 
            $sql_pmt = "DELETE FROM $data_table WHERE ID = $pmt_id"; 

            mysqli_query($conn, $sql_pmt); 
        }
    }

    mysqli_close($conn); 
    header("Location: recyclebin.php?bin_table=$data_table&page=$page"); 
    exit();
?>