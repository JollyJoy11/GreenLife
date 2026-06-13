<?php 
include "include/session.php"; 
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : []; 
unset($_SESSION['errors']); 

if (!(isset($_SESSION['username']) && $_SESSION['username']=='Admin')){
	header('Location: login.php');
	exit();
}
?> 

<!DOCTYPE html>

<html lang = "en">
<!-- Description: User Management -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 8/11/2024 -->
<!-- Validated: OK 12/11/2024 -->

<head>
    <title>User Management | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="User Management Module"/>
    <meta name="keywords" content="admin, admin dashboard, dashboard, user management"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body class="admin_body">
<?php 
	include "include/admin_header.php"; 
	include "include/functions.php"; 
?>

<article>
	<?php 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "greenlife";
	
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		//Sort
		$sort_item = isset($_GET['title']) ? $_GET['title'] : 'ID';
		if ($sort_item == 'reg_date'){
			$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'DESC'; 
		} else {
			$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'ASC'; 
		}
		$new_sort = ($sort_order=='ASC') ? 'DESC' : 'ASC';

		$items_per_page = 5; //Number display per page
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$offset = ($page - 1) * $items_per_page;

		$search = isset($_GET['search']) ? sanitise_input($_GET['search']) : '';

		$sql_base = "SELECT ID, username, firstname, lastname, email, user_password, reg_date FROM user WHERE trash='no'";
		$sql_total = "SELECT COUNT(*) FROM user WHERE trash='no'";

		if (!empty($search)) {
			$search_escaped = mysqli_real_escape_string($conn, $search); 
			$sql_search = " AND ((username LIKE '$search%') OR (firstname LIKE '$search%'))";
			$sql_base .= $sql_search;
			$sql_total .= $sql_search;
		}
		$sql = $sql_base . " ORDER BY $sort_item $sort_order LIMIT $offset, $items_per_page";

		$result_total = mysqli_query($conn, $sql_total); //Count displayed items
		$row_total = mysqli_fetch_array($result_total); 
		$total_rows = $row_total[0];

		$result = mysqli_query($conn, $sql);
		$displayed_rows = mysqli_num_rows($result);

		$start_no = $offset + 1;
		$end_no = $offset + $displayed_rows;

		//Update user info
		if (isset($_GET['id']) && $_GET['action'] == 'edit') {
			$edit_id = intval($_GET['id']);
			$edit_info = "SELECT ID, username, firstname, lastname, email, user_password, reg_date FROM user WHERE ID=$edit_id";
			$edit_result = mysqli_query($conn, $edit_info);

			if ($edit_result){
				$edit_row = mysqli_fetch_assoc($edit_result);
				$edit_username = $edit_row['username'];
				$edit_firstname = $edit_row['firstname'];
				$edit_lastname = $edit_row['lastname'];
				$edit_email = $edit_row['email'];
				$edit_password = $edit_row['user_password'];
				$edit_date = $edit_row['reg_date'];
			}
			
			echo 
				"<div class='popup_overlay'></div>
				<form method='POST' action='' class='edit_form' novalidate>
					<h2>Update User Info</h2>";
			include "include/errors.php";
			echo 	"<table>
						<tr>
							<th><label for='edit_username'>Username:</label></th>
							<td><input type='text' value='$edit_username' name='updated_username' id='edit_username' maxlength='25'/>";
							if (isset($_SESSION['field_error']['updated_username'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['updated_username'] . "</span>";
								unset($_SESSION['field_error']['updated_username']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='edit_firstname'>First Name:</label></th>
							<td><input type='text' name='updated_firstname' value='$edit_firstname' id='edit_firstname' maxlength='25'/>";
							if (isset($_SESSION['field_error']['updated_firstname'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['updated_firstname'] . "</span>";
								unset($_SESSION['field_error']['updated_firstname']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='edit_lastname'>Last Name:</label></th>
							<td><input type='text' name='updated_lastname' value='$edit_lastname' id='edit_lastname' maxlength='25'/>";
							if (isset($_SESSION['field_error']['updated_lastname'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['updated_lastname'] . "</span>";
								unset($_SESSION['field_error']['updated_lastname']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='edit_email'>Email:</label></th>
							<td><input type='email' name='updated_email' id='edit_email' value='$edit_email'/>";
							if (isset($_SESSION['field_error']['updated_email'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['updated_email'] . "</span>";
								unset($_SESSION['field_error']['updated_email']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th>Password:</th>
							<td>$edit_password</td>
						</tr>
						<tr>
							<th>Registered Date:</th>
							<td>$edit_date</td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type='submit' value='SAVE' name='update_user'/>&ensp;
								<a href='?page=$page&sort=$sort_order&title=$sort_item&search=$search'>CANCEL</a>
							</td>
						</tr>
					</table>
					<input type='hidden' name='updated_id' value='$edit_id' />
					<input type='hidden' name='page' value='$page' /> <input type='hidden' name='sort_order' value='$sort_order' /> 
					<input type='hidden' name='sort_item' value='$sort_item' /> 
					<input type='hidden' name='search' value='$search' />
				</form>";
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
			$update_id = intval($_POST['updated_id']);
			$update_username = sanitise_input($_POST['updated_username']);
			$update_firstname = sanitise_input($_POST['updated_firstname']);
			$update_lastname = sanitise_input($_POST['updated_lastname']);
			$update_email = sanitise_input($_POST['updated_email']);

			$field_error = [];

			//Validate input
			if (empty($update_username) or empty($update_firstname) or empty($update_lastname) or empty($update_email)){
				array_push($errors, " Please fill in all the required fields.");
			} else {
				if (!preg_match("/^[A-Za-z0-9!@#$%^&*]+$/", $update_username)) {
					$field_error['updated_username'] = "* Username cannot contain space.";
				}
				if (!preg_match("/^[A-Za-z\s]+$/", $update_firstname)) {
					$field_error['updated_firstname'] = "* First name can only contain letters.";
				}
				if (!preg_match("/^[A-Za-z\s]+$/", $update_lastname)) {
					$field_error['updated_lastname'] = "* Last name can only contain letters.";
				}
				if (!filter_var($update_email, FILTER_VALIDATE_EMAIL)) {
					$field_error['updated_email'] = "* Invalid email format.";
				}
			}

			$current_username_query = "SELECT username, email FROM user WHERE ID = $update_id";
			$current_username_result = mysqli_query($conn, $current_username_query);
			$current_user = mysqli_fetch_assoc($current_username_result);

			if ($current_user) { //Check for existing user
				$current_username = $current_user['username'];
				$current_email = $current_user['email'];

				if ($update_username != $current_username || $update_email != $current_email) {
					$user_check_query = "SELECT username, email FROM user WHERE (username = '$update_username' AND ID != $update_id) OR (email = '$update_email' AND ID != $update_id)";
					$exist_result = mysqli_query($conn, $user_check_query);
					$user = mysqli_fetch_assoc($exist_result);

					if ($user) {
						if ($user['username'] == $update_username){
							$field_error['updated_username'] = "* Username already exists.";
						} 
						if ($user['email'] == $update_email){
							$field_error['updated_email'] = "* Email already exists.";
						}
					} elseif ($update_username == 'Admin') {
						$field_error['updated_username'] = "* Username already exists.";
					}
				}
			}

			if (count($errors) == 0 && count($field_error) == 0) {
				$update_sql = "UPDATE user SET username = '$update_username', firstname = '$update_firstname', lastname = '$update_lastname', email = '$update_email' WHERE ID = $update_id";
				if (mysqli_query($conn, $update_sql)) {
					header('Location: view_user.php');
					exit();
				} 
			} 
	
			if (count($errors) > 0) {
				$_SESSION['errors'] = $errors;
				header('Location: view_user.php?action=edit&id=' . $update_id); 
				exit();
			}
			if (count($field_error) > 0) {
				$_SESSION['field_error'] = $field_error;
				header('Location: view_user.php?action=edit&id=' . $update_id); 
				exit();
			}

			$page = intval($_POST['page']); 
			$sort_order = $_POST['sort_order']; 
			$sort_item = $_POST['sort_item']; 
			$search = $_POST['search'];

			header("Location:?page=$page&sort=$sort_order&title=$sort_item&search=$search");
			exit();
		}

		//Add user
		if (isset($_GET['action']) && $_GET['action'] == 'add'){
			echo 
				"<div class='popup_overlay'></div>
				<form method='POST' action='' class='edit_form' novalidate>
					<h2>Add User</h2>";
			include "include/errors.php";
			echo 	"<table>
						<tr>
							<th><label for='add_firstname'>First Name:</label></th>
							<td><input type='text' name='add_firstname' id='add_firstname' maxlength='25'/>";
							if (isset($_SESSION['field_error']['firstname'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['firstname'] . "</span>";
								unset($_SESSION['field_error']['firstname']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='add_lastname'>Last Name:</label></th>
							<td><input type='text' name='add_lastname' id='add_lastname' maxlength='25'/>";
							if (isset($_SESSION['field_error']['lastname'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['lastname'] . "</span>";
								unset($_SESSION['field_error']['lastname']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='add_email'>Email:</label></th>
							<td><input type='email' name='add_email' id='add_email' />";
							if (isset($_SESSION['field_error']['email'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['email'] . "</span>";
								unset($_SESSION['field_error']['email']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='add_username'>Username:</label></th>
							<td><input type='text' name='add_username' id='add_username' maxlength='25'/>";
							if (isset($_SESSION['field_error']['user_name'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['user_name'] . "</span>";
								unset($_SESSION['field_error']['user_name']);
							} 
						echo "</td>
						</tr>
						<tr>
							<th><label for='add_password'>Password:</label></th>
							<td><input type='text' name='add_password' id='add_password' />";
							if (isset($_SESSION['field_error']['user_password'])){
								echo "&ensp; <span class='error-messages'>" . $_SESSION['field_error']['user_password'] . "</span>";
								unset($_SESSION['field_error']['user_password']);
							} 
						echo "</td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type='submit' value='SAVE' name='add_user'/>&ensp;
								<a href='?page=$page&sort=$sort_order&title=$sort_item&search=$search'>CANCEL</a>
							</td>
						</tr>
					</table>
				</form>";
		}

		if (isset($_POST['add_user'])){ 
			$firstname = ucwords(strtolower(sanitise_input($_POST['add_firstname'])));
			$lastname = ucwords(strtolower(sanitise_input($_POST['add_lastname'])));
			$email = sanitise_input($_POST['add_email']);
			$user_name = sanitise_input($_POST['add_username']);
			$user_password = sanitise_input($_POST['add_password']);

			$field_error = [];

			//Input data validation
			if (empty($firstname) or empty($lastname) or empty($email) or empty($user_name) or empty($user_password)){
				array_push($errors, " Please fill in all the required fields.");
			} else {
				if (!preg_match("/^[A-Za-z\s]+$/", $firstname)) {
					$field_error['firstname'] = "* First name can only contain letters.";
				}
				if (!preg_match("/^[A-Za-z\s]+$/", $lastname)) {
					$field_error['lastname'] = "* Last name can only contain letters.";
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$field_error['email'] = "* Invalid email format.";
				}
				if (!preg_match("/^[A-Za-z0-9!@#$%^&*]+$/", $user_name)) {
					$field_error['user_name'] = "* Username cannot contain space.";
				}
				if (!preg_match("/^[A-Za-z]+$/", $user_password)) {
					$field_error['user_password'] = "* Password can only contain letters.";
				}
			}

			$user_check_query = "SELECT username, email FROM user WHERE username = '$user_name' OR email = '$email'";
			$result = mysqli_query($conn, $user_check_query);
			$user = mysqli_fetch_assoc($result);

			if ($user) { //Check existing email or username
				if ($user['username'] == $user_name) {
					$field_error['user_name'] = "* Username already exists.";
				} 
				if ($user['email'] == $email) {
					$field_error['email'] = "* Email already exists.";
				}
			} elseif ($user_name == 'Admin') {
				array_push($errors, " Username already exists.");
			}

			if (count($errors) == 0 && count($field_error) == 0) {
				$user_query = "INSERT INTO user (firstname, lastname, email, username, user_password)
							   VALUES ('$firstname', '$lastname', '$email', '$user_name', '$user_password')";
				if (mysqli_query($conn, $user_query)) {
					$_SESSION['pop_up'] = TRUE;
					header('Location: view_user.php');
					exit();
				} 
			} 
	
			if (count($errors) > 0) {
				$_SESSION['errors'] = $errors;
				header('Location: view_user.php?action=add'); 
				exit();
			}
			if (count($field_error) > 0) {
				$_SESSION['field_error'] = $field_error;
				header('Location: view_user.php?action=add'); 
				exit();
			}
		}
	?>
	<div>
		<?php if (isset($_SESSION['pop_up'])): ?>
			<div class="pop-up_message">
				<p><i class="fa-regular fa-circle-check"></i> &nbsp; User added successfully!</p>
			</div>
			<?php unset($_SESSION['pop_up']); ?>
		<?php endif; ?>
		<h1>User Management</h1>
		<div class="button_nav">
			<div class="sorting">
				<input type="checkbox" id="sort_selection"/>
				<p class="sort_nav">
					<label for="sort_selection"><i class="fa-solid fa-sort"></i>&ensp;Sort by</label>
					<a href="?title=ID"><i class="fa-solid fa-rotate"></i></a>
				</p>
				<ul class="sort_list">
					<li><a href="?title=ID">No</a></li>
					<li><a href="?title=username">Username</a></li>
					<li><a href="?title=firstname">Name</a></li>
					<li><a href="?title=reg_date">Reg. date</a></li>
				</ul>
			</div>
			<div class="search-container">
				<form name="search" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<input type='search' placeholder='Search' name='search'/>
					<button type="submit"><i class='fa fa-search'></i></button>
				</form>
			</div>
		</div>

		<form name="user_management" method="post" action="movetobin.php" class="admin_table_form">
			<div class="table_container">
				<table>
					<tr>
						<th></th>
						<th>No 
							<a href="?sort=<?php echo $new_sort; ?>&title=ID&page=<?php echo $page; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'ID'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'ID'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Username 
							<a href="?sort=<?php echo $new_sort; ?>&title=username&page=<?php echo $page; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'username'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'username'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Name 
							<a href="?sort=<?php echo $new_sort; ?>&title=firstname&page=<?php echo $page; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'firstname'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'firstname'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Email</th>
						<th>Password</th>
						<th>Reg. Date 
							<a href="?sort=<?php echo $new_sort; ?>&title=reg_date&page=<?php echo $page; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'reg_date'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'reg_date'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Actions</th>
					</tr>
				<!-- display database items -->
				<?php
					if ($displayed_rows > 0){
						while ($row = mysqli_fetch_assoc($result)){
				?>
					<tr>
						<td><input type="checkbox" name="selected_user[]" value="<?php echo $row['ID']; ?>" /></td> 
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["username"]; ?></td>
						<td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["user_password"]; ?></td>
						<td><?php echo $row["reg_date"]; ?></td>
						<td>
							<a href="?id=<?php echo $row['ID']; ?>&action=edit&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>"><i class="fa-solid fa-pen"></i></a>&ensp;
							<a href="movetobin.php?id=<?php echo $row['ID']; ?>&action=delete&data_table=user&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>"><i class="fa-solid fa-trash"></i></a>
						</td>
					</tr>
				<?php
						}
					} else {
						$start_no = 0;
						echo "<tr><td colspan='8'>No results found</td></tr>";
					}
					mysqli_close($conn);
				?>
				</table>
			</div>

			<!-- pagination -->
			<div class="display_nav">
				<p class="displayed_results">Showing results <strong>
					<?php 
					if ($start_no == $end_no){
						echo "$start_no"; 
					} else {
						echo "$start_no to $end_no"; 
					}?></strong> 
				out of <strong><?php echo $total_rows; ?></strong></p>
				
				<nav>
					<ul> 
					<?php if ($page > 1): ?> <!-- Previous page -->
						<li><a href="?page=<?php echo $page - 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>">Previous</a></li> 
					<?php endif; ?> 
					<?php 
						$total_pages = ceil($total_rows / $items_per_page);
						$start_page = max(1, $page - 1);
						$end_page = min($total_pages, $page + 1);

						if ($end_page - $start_page + 1 < 3){
							if ($start_page == 1) { 
								$end_page = min(3, $total_pages); 
							} else { 
								$start_page = max(1, $end_page - 2); 
							}
						}
						for ($i = $start_page; $i <= $end_page; $i++){
							if ($i == $page){
								echo "<li class='current_page page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&search=$search'>$i</a></li>"; 
							} else {
								echo "<li class='page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&search=$search'>$i</a></li>"; 
							}
						} 
					?>
					<?php if ($page < $total_pages): ?> <!-- Next page -->
						<li><a href="?page=<?php echo $page + 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>">Next</a></li>
					<?php endif; ?> 
					</ul>
				</nav>
			</div>

			<!--Hidden input type to retain the original position-->
			<input type="hidden" name="title" value="<?php echo $sort_item; ?>" />
			<input type="hidden" name="sort" value="<?php echo $sort_order; ?>" />
			<input type="hidden" name="offset" value="<?php echo $offset; ?>" />
			<input type="hidden" name="data_table" value="user" />
			<input type="hidden" name="search" value="<?php echo $search; ?>" />
			<input type="hidden" name="page" value="<?php echo $page; ?>" />

			<div class="admin-btns">
				<button type="submit" name="delete" class="delete-btn"><i class="fa-solid fa-user-minus"></i>&ensp;DELETE</button>&emsp;
				<a href="?action=add&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>" class="add-btn"><i class="fa-solid fa-user-plus"></i>&ensp;ADD USERS</a>
			</div>
		</form>
	</div>
</article>

<footer>
	<p>&copy; Green Life 2024</p>
</footer>
</body>
</html>