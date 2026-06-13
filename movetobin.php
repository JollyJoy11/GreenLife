<?php 
    session_start();
    require_once __DIR__ . '/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $data_table = isset($_POST['data_table']) ? $_POST['data_table'] : $_GET['data_table'];
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

    if ($data_table == 'user') {
        $sort_item = isset($_POST['title']) ? $_POST['title'] : 'ID'; 
        if ($sort_item == 'reg_date'){
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'DESC'; 
        } else {
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'ASC'; 
        }
        $search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : NULL;
    } elseif ($data_table == 'enquiry') {
        $sort_item = isset($_POST['title']) ? $_POST['title'] : 'submit_time'; 
        if ($sort_item == 'submit_time'){
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'DESC'; 
        } else {
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'ASC'; 
        }
        $search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : NULL; 
        $filter = (isset($_POST['filter']) && $_POST['filter'] != '') ? $_POST['filter'] : NULL;
        $filter_select = (isset($_POST['filter_select']) && $_POST['filter_select'] != '') ? $_POST['filter_select'] : NULL;
    } elseif ($data_table == 'feedback') {
        $sort_item = isset($_POST['title']) ? $_POST['title'] : 'submit_time'; 
        if ($sort_item == 'submit_time'){
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'DESC'; 
        } else {
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'ASC'; 
        }
        $filter = (isset($_POST['filter']) && $_POST['filter'] != '') ? $_POST['filter'] : NULL;
        $filter_select = (isset($_POST['filter_select']) && $_POST['filter_select'] != '') ? $_POST['filter_select'] : NULL;
    } elseif ($data_table == 'contribute') {
        $sort_item = isset($_POST['title']) ? $_POST['title'] : 'ID'; 
        if ($sort_item == 'submit_time'){
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'DESC'; 
        } else {
            $sort_order = isset($_POST['sort']) ? $_POST['sort'] : 'ASC'; 
        }
        $search = (isset($_POST['search']) && $_POST['search'] != '') ? $_POST['search'] : NULL;
        $filter = (isset($_POST['filter']) && $_POST['filter'] != '') ? $_POST['filter'] : NULL;
        $filter_select = (isset($_POST['filter_select']) && $_POST['filter_select'] != '') ? $_POST['filter_select'] : NULL;
    }

    //process delete which is using checkbox
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) { 
        $selected_users = []; 
        $selected_users = isset($_POST['selected_user']) ? $_POST['selected_user'] : []; 
        
        if (!empty($selected_users)) { 
            $delete_id = implode(',', $selected_users); 
            $sql_delete = "UPDATE $data_table SET trash='yes', trash_date=NOW() WHERE ID IN ($delete_id)"; 
            
            mysqli_query($conn, $sql_delete);
        } 
    } 

    //process delete which is using delete icon
    if (isset($_GET['id']) && $_GET['action'] == 'delete') { 
        $delete_id = intval($_GET['id']); 
        $data_table = $_GET['data_table']; 
        $page = (int)$_GET['page']; 
        $sort_order = $_GET['sort']; 
        $sort_item = $_GET['title']; 
        $search = isset($_GET['search']) ? $_GET['search'] : NULL; 
        $filter = isset($_GET['filter']) ? $_GET['filter'] : NULL; 
        $filter_select = isset($_GET['filter_select']) ? $_GET['filter_select'] : NULL; 
        $sql_delete = "UPDATE $data_table SET trash='yes', trash_date=NOW() WHERE ID = $delete_id"; 

        mysqli_query($conn, $sql_delete);
    }

    mysqli_close($conn); 
    header("Location: view_$data_table.php?title=$sort_item&sort=$sort_order&filter=$filter&filter_select=$filter_select&search=$search&page=$page");
    exit();
?>