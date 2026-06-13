<?php 
include "include/session.php"; 
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
include "include/functions.php";

if (!(isset($_SESSION['username']) && $_SESSION['username']=='Admin')){
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html>

<html lang = "en">
<!-- Description: User Management -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 31/10/2024 -->
<!-- Validated: OK 12/10/2024 -->

<head>
    <title>Admin Dashboard | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="Join our community by creating an account. Register to contribute plant photos, access advanced identification tools, and manage your activity on our platform."/>
    <meta name="keywords" content="Green Life, herbarium, herbarium tutorial, plant, identification, plant identification, species, genus, plant family, plant classification, register, join now, sign up"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/> <!-- small icon at webpage head -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/> <!-- link for icons -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body class="admin_body">
<?php include "include/admin_header.php"; ?>

<article>
	<?php 
		require_once __DIR__ . '/config.php';
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		$items_per_page = 5; //Number display per page
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$offset = ($page - 1) * $items_per_page;

		$bin_table = isset($_GET['bin_table']) ? $_GET['bin_table'] : 'user'; //displayed recycle bin table
		$search = isset($_GET['search']) ? sanitise_input($_GET['search']) : ''; 

		switch ($bin_table){
			case 'user':
				$table_info = ['ID', 'username', 'firstname', 'lastname', 'email', 'trash_date'];
				$table_heading = ['Username', 'Name', 'Email'];
				break;
			case 'enquiry': 
				$table_info = ['ID', 'firstname', 'lastname', 'email', 'tutorial', 'solve', 'trash_date'];
				$table_heading = ['Name', 'Email', 'Tutorial', 'Status'];
				break;
			case 'contribute':
				$table_info = ['ID', 'username', 'plant_name', 'trash_date'];
				$table_heading = ['Username', 'Plant Name'];
				break;
			case 'feedback':
				$table_info = ['ID', 'goal', 'star_rating', 'trash_date'];
				$table_heading = ['Goal', 'Rating'];
				break;
		}

		$table_column = implode(',', $table_info);
		$sql = "SELECT $table_column FROM $bin_table WHERE trash='yes'";
		$sql_total = "SELECT COUNT(*) FROM $bin_table WHERE trash='yes'"; 

		if(!empty($search)) {
			$search_escaped = mysqli_real_escape_string($conn, $search); 
			$search_conditions = []; 
			foreach ($table_info as $column) { 
				$search_conditions[] = "($column LIKE '$search%')"; 
			} 
			$search_result = implode(' OR ', $search_conditions); 
			$sql .= " AND ($search_result)"; 
			$sql_total .= " AND ($search_result)"; 
		}
		
		$sql .= " LIMIT $offset, $items_per_page";

		$result_total = mysqli_query($conn, $sql_total); 
		$row_total = mysqli_fetch_array($result_total); 
		$total_rows = $row_total[0];  

		$result = mysqli_query($conn, $sql);
		$displayed_rows = mysqli_num_rows($result);

		$start_no = $offset + 1;
		$end_no = $offset + $displayed_rows;

		$session_key_select = 'select_' . $bin_table; $session_key_visible_page = 'visible_page_' . $bin_table;
	?>
	<div>
		<?php if (isset($_SESSION['restore_success'])): ?>
			<div class="pop-up_message">
				<p><i class="fa-regular fa-circle-check"></i> &nbsp; The item(s) have been successfully restored!</p>
			</div>
			<?php unset($_SESSION['restore_success']); ?>
		<?php endif; ?>

		<h1>Recycle Bin</h1>
		<div class="button_nav">
			<nav>
				<ul>
					<li class="<?php echo ($bin_table == 'user') ? 'active_table' : ''; ?>"><a href="?bin_table=user"><i class="fa-solid fa-users"></i>&ensp;Users</a></li>
					<li class="<?php echo ($bin_table == 'enquiry') ? 'active_table' : ''; ?>"><a href="?bin_table=enquiry"><i class="fa-regular fa-circle-question"></i>&ensp;Enquiries</a></li>
					<li class="<?php echo ($bin_table == 'contribute') ? 'active_table' : ''; ?>"><a href="?bin_table=contribute"><i class='fa-brands fa-pagelines'></i>&ensp;Contributions</a></li>
					<li class="<?php echo ($bin_table == 'feedback') ? 'active_table' : ''; ?>"><a href="?bin_table=feedback"><i class='fa-regular fa-comment-dots'></i>&ensp;Feedbacks</a></li>
				</ul>
			</nav>
			<div class="search-container">
				<form name="search_user" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
					<input type='search' placeholder='Search' name='search' value="<?php echo htmlspecialchars($search); ?>"/> 
					<input type="hidden" name="bin_table" value="<?php echo htmlspecialchars($bin_table); ?>"/> 
					<button type='submit'><i class='fa fa-search'></i></button> 
				</form>
			</div>
		</div>

		<form name="bin_management" method="post" action="restore.php" class="admin_table_form"> 
			<div class="table_container"> 
				<table>
					<tr>
						<th></th>
						<th>No</th> 
						<?php 
							for ($i = 0; $i < count($table_heading); $i++){
								echo "<th>$table_heading[$i]</th>"; 
							} 
						?> 
						<th>Delete Date</th>
						<th>Actions</th>
					</tr>
				<?php
					if ($displayed_rows > 0){
						while ($row = mysqli_fetch_assoc($result)){
				?>
					<tr>
						<td><input type="checkbox" name="selected_user[]" value="<?php echo $row['ID']; ?>" /></td>
						<td><?php echo $row["ID"]; ?></td>

					<?php 
						for ($i = 0; $i < count($table_heading); $i++) {
							 if ($table_heading[$i] == 'Name') { 
								echo "<td>{$row['firstname']} {$row['lastname']}</td>"; 
							} elseif ($bin_table == 'enquiry' || $bin_table == 'user') { 
								$column = $table_info[$i + 2];  
								echo "<td>{$row[$column]}</td>"; 
							} else {
								$column = $table_info[$i + 1];  
								echo "<td>{$row[$column]}</td>"; 
							}
						}
					?>

						<td><?php echo $row["trash_date"]; ?></td>
						<td>
							<a href="restore.php?id=<?php echo $row['ID']; ?>&action=restore&data_table=<?php echo $bin_table; ?>&page=<?php echo $page; ?>&search=<?php echo $search; ?>"><i class="fa-solid fa-arrow-rotate-left"></i></a>&ensp;
							<a href="?id=<?php echo $row['ID']; ?>&action=pmt_delete1&bin_table=<?php echo $bin_table; ?>&page=<?php echo $page; ?>&search=<?php echo $search; ?>&offset=<?php echo $offset; ?>"><i class="fa-solid fa-trash"></i></a>
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
						<li><a href="?page=<?php echo $page - 1; ?>&bin_table=<?php echo $bin_table; ?>">Previous</a></li> 
					<?php endif; ?> 
					<?php 
						$total_pages = ceil($total_rows / $items_per_page);
						$start_page = max(1, $page - 1);
						$end_page = min($total_pages, $page + 1);

						if ($end_page - $start_page + 1 < 3){
							if ($start_page == 1) { 
								$end_page = min(3, $total_pages); 
							} else { 
								$start = max(1, $end_page - 2); 
							}
						}

						for ($i = $start_page; $i <= $end_page; $i++){
							if ($i == $page){
								echo "<li class='current_page page_num'><a href='?page=$i&bin_table=$bin_table'>$i</a></li>"; 
							} else {
								echo "<li class='page_num'><a href='?page=$i&bin_table=$bin_table'>$i</a></li>"; 
							}
						} 
					?>
					<?php if ($page < $total_pages): ?> <!-- Next page -->
						<li><a href="?page=<?php echo $page + 1; ?>&bin_table=<?php echo $bin_table; ?>">Next</a></li>
					<?php endif; ?> 
					</ul>
				</nav>
			</div>

			<input type="hidden" name="offset" value="<?php echo $offset; ?>" />
			<input type="hidden" name="data_table" value="<?php echo $bin_table; ?>" />
			<input type="hidden" name="page" value="<?php echo $page; ?>">
			<input type="hidden" name="search" value="<?php echo $search; ?>" />
			<input type="hidden" name="page" value="<?php echo $page; ?>" />

			<div class="admin-btns">
				<button type="submit" name="restore" class="add-btn"><i class="fa-solid fa-trash-arrow-up"></i>&ensp;RESTORE</button>&emsp;
				<button type="submit" name="pmt_delete" class="delete-btn"><i class="fa-solid fa-trash"></i>&ensp;DELETE</button>
			</div>
		</form>
		<?php if (isset($_GET['action']) && ($_GET['action'] == 'pmt_delete1' || $_GET['action'] == 'pmt_delete')): ?>
			<div class="popup_overlay"></div>
			<form class="popup" method="post" action="restore.php">
				<?php if (isset($_GET['action']) && $_GET['action'] == 'pmt_delete'): ?>
					<input type="hidden" name="offset" value="<?php echo $_SESSION['offset']; ?>" />
					<input type="hidden" name="data_table" value="<?php echo $_SESSION['data_table']; ?>" />
					<input type="hidden" name="page" value="<?php echo $_SESSION['page']; ?>">
					<input type="hidden" name="search" value="<?php echo $$_SESSION['search']; ?>" />
					<?php if (isset($_SESSION['selected_user'])): ?>
						<?php foreach ($_SESSION['selected_user'] as $selected): ?>
							<input type="hidden" name="selected_user[]" value="<?php echo htmlspecialchars($selected); ?>" />
						<?php endforeach; ?>
					<?php endif; ?>
					<?php unset($_SESSION['offset'], $_SESSION['data_table'], $_SESSION['page'], $_SESSION['search'], $_SESSION['selected_user']); ?>
				<?php else: ?>
					<input type="hidden" name="pmt_id" value="<?php echo $_GET['id']; ?>" />
					<input type="hidden" name="data_table" value="<?php echo $_GET['bin_table']; ?>" />
					<input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
					<input type="hidden" name="search" value="<?php echo $_GET['search']; ?>" />
				<?php endif; ?>

				<p><i class="fa-regular fa-circle-xmark"></i></p> 
				<h2>Are you sure?</h2> 
				<p>Do you really want to delete these records? This process cannot be undone.</p>
				<p>
					<a href="recyclebin.php?bin_table=<?php echo $bin_table; ?>&page=<?php echo $page; ?>&search=<?php echo $search; ?>">CANCEL</a>&emsp;
					<button type="submit" name="confirm_delete">DELETE</button>
				</p>
			</form>
		<?php endif; ?>
	</div>
</article>

<footer>
	<p>&copy; Green Life 2024</p>
</footer>
</body>
</html>