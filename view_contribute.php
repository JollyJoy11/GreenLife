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
<!-- Description: Contribution Management -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 31/10/2024 -->
<!-- Validated: OK 1/11/2024 -->

<head>
    <title>Contribution Management | Green Life</title>
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
		if ($sort_item == 'submit_time'){
			$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'DESC'; 
		} else {
			$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'ASC'; 
		}
		$new_sort = ($sort_order=='ASC') ? 'DESC' : 'ASC';

		$items_per_page = 5; //Number display per page
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$offset = ($page - 1) * $items_per_page;

		$search = isset($_GET['search']) ? sanitise_input($_GET['search']) : '';
		$filter = isset($_GET['filter']) ? $_GET['filter'] : ''; 
		$filter_select = isset($_GET['filter_select']) ? $_GET['filter_select'] : ''; 

		$sql_base = "SELECT * FROM contribute WHERE trash='no'";
		$sql_total = "SELECT COUNT(*) FROM contribute WHERE trash='no'";

		if (!empty($search)) {
			$search_escaped = mysqli_real_escape_string($conn, $search); 
			$sql_search = " AND ((username LIKE '$search_escaped%') OR (plant_name LIKE '$search_escaped%') OR (plant_family LIKE '$search_escaped%') OR (plant_genus LIKE '$search_escaped%') OR (plant_species LIKE '$search_escaped%'))";
			$sql_base .= $sql_search;
			$sql_total .= $sql_search;
		}
		if (!empty($filter) && !empty($filter_select)) {
			$sql_filter = " AND $filter='$filter_select'"; 
			$sql_base .= $sql_filter; 
			$sql_total .= $sql_filter; 
		} 
		$sql = $sql_base . " ORDER BY $sort_item $sort_order LIMIT $offset, $items_per_page";

		$result_total = mysqli_query($conn, $sql_total); //Count displayed items
		$row_total = mysqli_fetch_array($result_total); 
		$total_rows = $row_total[0];

		$result = mysqli_query($conn, $sql);
		$displayed_rows = mysqli_num_rows($result);

		$start_no = $offset + 1;
		$end_no = $offset + $displayed_rows;

		//Edit Form for contribution
		if (isset($_GET['id']) && $_GET['action'] == 'edit') {
			$edit_id = intval($_GET['id']);
			$edit_info = "SELECT * FROM contribute WHERE ID=$edit_id";
			$edit_result = mysqli_query($conn, $edit_info);

			if ($edit_result){
				$edit_row = mysqli_fetch_assoc($edit_result);
				$edit_username = $edit_row['username'];
				$edit_plantname = $edit_row['plant_name'];
				$edit_family = $edit_row['plant_family'];
				$edit_genus = $edit_row['plant_genus'];
				$edit_species = $edit_row['plant_species'];
				$edit_plantphoto = $edit_row['plant_photo'];
				$edit_herbphoto = $edit_row['herbarium_photo'];
				$edit_date = $edit_row['submit_time'];
			}
			
			ob_start();
			echo 
			"<div class='popup_overlay'></div>
			<form method='POST' action='' class='edit_form'>
				<h2>Edit Contribution</h2>
				<table>
					<tr>
						<td colspan='2'>";
			include "include/errors.php";
			echo 	"</td>
						<th>Plant Photo:</th>
						<th>Herbarium Photo:</th>
					</tr>
					<tr>
						<th>Username:</th>
						<td>$edit_username</td>
						<td rowspan='6'><figure><img src='upload_img/$edit_plantphoto' /></figure></td>
						<td rowspan='6'><figure><img src='upload_img/$edit_herbphoto' /></figure></td>
					</tr>
					</tr>
					<tr>
						<th><label for='edit_plantname'>Plant Name:</label></th>
						<td><input type='text' name='updated_plantname' value='$edit_plantname' id='edit_plantname' maxlength='25'/>";
						if (isset($_SESSION['field_error']['updated_plantname'])){
							echo "<p class='error-messages'>" . $_SESSION['field_error']['updated_plantname'] . "</p>";
							unset($_SESSION['field_error']['updated_plantname']);
						}
						echo"</td>
					<tr>
						<th>Plant Family:</th>
						<td>
							<select name='updated_family'>
								<option value=''>Please Select</option>
								<option value='Dipterocarpaceae' " . ($edit_family == "Dipterocarpaceae" ? "selected = 'selected'" : "") . ">Dipterocarpaceae</option>
								<option value='Lauraceae' " . ($edit_family == "Lauraceae" ? "selected = 'selected'" : "") . ">Lauraceae</option>
								<option value='Burseraceae' " . ($edit_family == "Burseraceae" ? "selected = 'selected'" : "") . ">Burseraceae</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Plant Genus:</th>
						<td><input type='text' name='updated_genus' value='$edit_genus'/>";
						if (isset($_SESSION['field_error']['updated_genus'])){
							echo "<p class='error-messages'>" . $_SESSION['field_error']['updated_genus'] . "</p>";
							unset($_SESSION['field_error']['updated_genus']);
						}
						echo"</td>
					</tr>
					<tr>
						<th>Plant Species:</th>
						<td><input type='text' name='updated_species' value='$edit_species'/>";
						if (isset($_SESSION['field_error']['updated_species'])){
							echo "<p class='error-messages'>" . $_SESSION['field_error']['updated_species'] . "</p>";
							unset($_SESSION['field_error']['updated_species']);
						}
						echo"</td>
					</tr>
					<tr>
						<th>Contribute Date:</th>
						<td>$edit_date</td>
					</tr>
					<tr>
						<td colspan='4'>
							<input type='submit' value='SAVE' name='update_plant'/>&ensp;
							<a href='?page=$page&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select'>CANCEL</a>
						</td>
					</tr>
				</table>

				<input type='hidden' name='updated_id' value='$edit_id' />
				<input type='hidden' name='page' value='$page' /> 
				<input type='hidden' name='sort_order' value='$sort_order' /> 
				<input type='hidden' name='sort_item' value='$sort_item' /> 
				<input type='hidden' name='search' value='$search' />
				<input type='hidden' name='filter' value='$filter' />
				<input type='hidden' name='filter_select' value='$filter_select' />
			</form>";
		}

		//Process edit form
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_plant'])){
			$update_id = intval($_POST['updated_id']);
			$update_plantname = ucfirst(strtolower(sanitise_input($_POST['updated_plantname'])));
			$update_family = $_POST['updated_family'];
			$update_genus = sanitise_input($_POST['updated_genus']);
			$update_species = sanitise_input($_POST['updated_species']);

			$field_error = [];

			if (empty($update_plantname) or empty($update_genus) or empty($update_species)){
				array_push($errors, " Please fill in all the required fields.");
			} else {
				if (!preg_match("/^[A-Za-z\s]+$/", $update_plantname)) {
					$field_error['updated_plantname'] = "* Plant name can only contain letters.";
				}
				if (!preg_match("/^[A-Za-z\s]+$/", $update_genus)) {
					$field_error['updated_genus'] = "* Plant genus can only contain letters.";
				}
				if (!preg_match("/^[A-Za-z\s]+$/", $update_species)) {
					$field_error['updated_species'] = "* Plant species can only contain letters.";
				}
			}

			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$sort_order = isset($_POST['sort_order']) ? $_POST['sort_order'] : ''; 
			$sort_item = isset($_POST['sort_item']) ? $_POST['sort_item'] : ''; 
			$search = isset($_POST['search']) ? $_POST['search'] : ''; 
			$filter = isset($_POST['filter']) ? $_POST['filter'] : ''; 
			$filter_select = isset($_POST['filter_select']) ? $_POST['filter_select'] : '';

			if (count($errors) == 0 && count($field_error) == 0) {
				$update_sql = "UPDATE contribute SET plant_name = '$update_plantname', plant_family = '$update_family', plant_genus = '$update_genus', plant_species = '$update_species' WHERE ID = $update_id";
				if (mysqli_query($conn, $update_sql)) {
					$_SESSION['pop_up'] = TRUE;
					header("Location:?page=$page&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select");
					exit();
				} 
			} 
	
			if (count($errors) > 0) {
				$_SESSION['errors'] = $errors;
				header('Location: view_contribute.php?action=edit&id=' . $update_id); 
				exit();
			}
			if (count($field_error) > 0) {
				$_SESSION['field_error'] = $field_error;
				header('Location: view_contribute.php?action=edit&id=' . $update_id); 
				exit();
			}

			header("Location:?page=$page&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select");
			exit();
		}
	?>
	<div>
		<h1>Contribution Management</h1>
		<div class="button_nav">
			<div class="sorting">
				<input type="checkbox" id="sort_selection"/>
				<p class="sort_nav">
					<label for="sort_selection"><i class="fa-solid fa-sort"></i>&ensp;Sort by</label>
					<a href="?title=ID"><i class="fa-solid fa-rotate"></i></a>
				</p>
				<ul class="sort_list">
					<li><a href="?title=ID&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">No</a></li>
					<li><a href="?title=username&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Username</a></li>
					<li><a href="?title=plant_name&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Plant name</a></li>
					<li><a href="?title=submit_time&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Contribute date</a></li>
				</ul>
			</div>
			<div class="search-container">
				<form name="search" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<input type='search' placeholder='Search' name='search'/>
					<button type="submit"><i class='fa fa-search'></i></button>
				</form>
			</div>
		</div>

		<form name="contribution_management" method="post" action="movetobin.php" class="admin_table_form">
			<div class="table_container">
				<table>
					<tr>
						<th></th>
						<th>No 
							<a href="?sort=<?php echo $new_sort; ?>&title=ID&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'ID'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'ID'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Username 
							<a href="?sort=<?php echo $new_sort; ?>&title=username&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'username'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'username'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Plant Name 
							<a href="?sort=<?php echo $new_sort; ?>&title=plant_name&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'plant_name'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'plant_name'): ?>
								<i class="fa-solid fa-arrow-down-short-wide sort"></i>
							<?php endif; ?>
							</a>
						</th>
						<th>Plant Family
							<input type="checkbox" id="filter1" />
							<label for="filter1" id="filter1_overlay"></label>
							<label for="filter1"><i class="fa-solid fa-filter"></i></label>
							<ul class="filter">
								<li><a href="?filter=plant_family&sort_order=<?php echo $sort_order; ?>&page=1&data_table=contribute&filter_select=Dipterocarpaceae">Dipterocarpaceae</a></li>
								<li><a href="?filter=plant_family&sort_order=<?php echo $sort_order; ?>&page=1&data_table=contribute&filter_select=Lauraceae">Lauraceae</a></li>
								<li><a href="?filter=plant_family&sort_order=<?php echo $sort_order; ?>&page=1&data_table=contribute&filter_select=Burseraceae">Burseraceae</a></li>
							</ul>
						</th>
						<th>Plant Genus</th>
						<th>Plant Species</th>
						<th>Plant Photo</th>
						<th>Herbarium Photo</th>
						<th>Contribute Date 
							<a href="?sort=<?php echo $new_sort; ?>&title=submit_time&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
							<?php if ($sort_order == 'DESC' && $sort_item == 'submit_time'): ?>
								<i class="fa-solid fa-arrow-down-wide-short sort"></i>
							<?php elseif ($sort_order == 'ASC' && $sort_item == 'submit_time'): ?>
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
						<td><input type="checkbox" name="selected_user[]" value="<?php echo $row['ID']; ?>"/></td> 
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["username"]; ?></td>
						<td><em><?php echo $row["plant_name"]; ?></em></td>
						<td><em><?php echo $row["plant_family"]; ?></em></td>
						<td><em><?php echo $row["plant_genus"]; ?></em></td>
						<td><em><?php echo $row["plant_species"]; ?></em></td>
						<td><a href="?display_image&file=<?php echo $row['plant_photo']; ?>&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><?php echo $row["plant_photo"]; ?></a></td>
						<td><a href="?display_image&file=<?php echo $row['herbarium_photo']; ?>&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><?php echo $row["herbarium_photo"]; ?></a></td>
						<td><?php echo $row["submit_time"]; ?></td>
						<td>
							<a href="?id=<?php echo $row['ID']; ?>&action=edit&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-pen"></i></a>&ensp;
							<a href="movetobin.php?id=<?php echo $row['ID']; ?>&action=delete&data_table=contribute&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-trash"></i></a>
						</td>
					</tr>
				<?php
						}
						if (isset($_GET['display_image'])){
							$image_path = htmlspecialchars($_GET['file']);
							echo 
							"<div>
								<a href='?page=$page&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select' class='popup_overlay'></a>
								<figure class='display_img'><img src='upload_img/$image_path'/></figure>
							</div>";
						}
					} else {
						$start_no = 0;
						echo "<tr><td colspan='11'>No results found</td></tr>";
					}
					mysqli_close($conn);
				?>
				</table>
			</div>

			<!-- Pagination -->
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
						<li><a href="?page=<?php echo $page - 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Previous</a></li> 
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
								echo "<li class='page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select'>$i</a></li>"; 
							}
						} 
					?>
					<?php if ($page < $total_pages): ?> <!-- Next page -->
						<li><a href="?page=<?php echo $page + 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Next</a></li>
					<?php endif; ?> 
					</ul>
				</nav>
			</div>

			<!--Hidden input type to retain the original position-->
			<input type="hidden" name="title" value="<?php echo $sort_item; ?>" />
			<input type="hidden" name="sort" value="<?php echo $sort_order; ?>" />
			<input type="hidden" name="offset" value="<?php echo $offset; ?>" />
			<input type="hidden" name="data_table" value="contribute" />
			<input type="hidden" name="search" value="<?php echo $search; ?>" />
			<input type="hidden" name="filter" value="<?php echo $filter; ?>" />
			<input type="hidden" name="filter_select" value="<?php echo $filter_select; ?>" />
			<input type="hidden" name="page" value="<?php echo $page; ?>" />

			<div class="admin-btns">
				<button type="submit" name="delete" class="delete-btn"><i class="fa-solid fa-trash-can"></i>&ensp;DELETE</button>
			</div>
		</form>
	</div>
</article>

<footer>
	<p>&copy; Green Life 2024</p>
</footer>
</body>
</html>