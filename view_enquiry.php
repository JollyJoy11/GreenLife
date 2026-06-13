<?php 
include "include/session.php"; 
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
if (!(isset($_SESSION['username']) && $_SESSION['username']=='Admin')){
	header('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>

<html lang = "en">
<!-- Description: User Management -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 1/11/2024 -->
<!-- Validated: OK 1/11/2024 -->

<head>
    <title>Enquiry Management | Green Life</title>
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
		$sort_item = isset($_GET['title']) ? $_GET['title'] : 'submit_time';
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
		
		$sql_base = "SELECT ID, firstname, lastname, email, tutorial, submit_time, solve, solve_date FROM enquiry WHERE trash='no'"; 
		$sql_total = "SELECT COUNT(*) FROM enquiry WHERE trash='no'"; 

		if (!empty($search)) { 
			$search_escaped = mysqli_real_escape_string($conn, $search); 
			$sql_search = " AND ((firstname LIKE '$search_escaped%') OR (email LIKE '$search_escaped%') OR (tutorial LIKE '$search_escaped%'))"; 
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
	
		if (isset($_GET['id']) && $_GET['action'] == 'reply') { 
			$reply_id = intval($_GET['id']);
			$reply_info = "SELECT * FROM enquiry WHERE ID=$reply_id";
			$reply_result = mysqli_query($conn, $reply_info);

			if ($reply_result){ //retrieved data for the form display
				$reply_row = mysqli_fetch_assoc($reply_result);
				$reply_firstname = $reply_row['firstname'];
				$reply_lastname = $reply_row['lastname'];
				$reply_email = $reply_row['email'];
				$reply_phone = $reply_row['phone'];
				$reply_street = $reply_row['street'];
				$reply_city = $reply_row['city'];
				$reply_postcode = $reply_row['postcode'];
				$reply_state = $reply_row['add_state'];
				$reply_tutorial = $reply_row['tutorial'];
				$enquiry_question = $reply_row['enquiry'];
				$enquiry_date = $reply_row['submit_time'];
				$reply_ans = $reply_row['reply'];
				$reply_date = $reply_row['solve_date'];
			}
		}

		if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['reply'])) { //Reply Email
			$reply_id = intval($_POST['reply_id']);
			$to = filter_var($_POST['reply_email'], FILTER_SANITIZE_EMAIL);
			$subject = "Re: Your Enquiry About " . ucfirst($_POST['reply_tutorial']); 
			$reply_ans = sanitise_input($_POST['reply_ans']);
			$message = "Dear ". $_POST['reply_name'] . ",\n\n" . $_POST['reply_ans'] ."\n\nSincerely, \nGreen Life\n\nEnquiry:\n" . $_POST['reply_question'];

			if (sendEmail($to, $subject, $message)) {
				$update_reply = "UPDATE enquiry SET solve='solved', solve_date=NOW(), reply='$reply_ans' WHERE ID = $reply_id";
				$complete_enquiry = mysqli_query($conn, $update_reply);
				$_SESSION['email'] = $complete_enquiry ? true : false; 
			} else { 
				$_SESSION['email'] = false; 
			} 
			
			$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
			$sort_order = isset($_POST['sort_order']) ? $_POST['sort_order'] : ''; 
			$sort_item = isset($_POST['sort_item']) ? $_POST['sort_item'] : ''; 
			$search = isset($_POST['search']) ? $_POST['search'] : ''; 
			$filter = isset($_POST['filter']) ? $_POST['filter'] : ''; 
			$filter_select = isset($_POST['filter_select']) ? $_POST['filter_select'] : '';

			header("Location:?page=$page&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select"); 
			exit(); 
		} 
	?>
	<div>
		<?php 
			if (isset($_SESSION['email'])){
				if ($_SESSION['email']) { 
					echo "<div class='pop-up_message'> <p><i class='fa-regular fa-circle-check'></i> &nbsp; The email has been sent successfully!</p> </div>"; 
				} else { 
					echo "<div class='pop-up_message'> <p><i class='fa-regular fa-circle-xmark'></i> &nbsp; There was an error sending the email or updating the enquiry.</p> </div>"; 
				}
				unset($_SESSION['email']);
			}
		?>
		<h1>Enquiries Management</h1>
		
		<div class="next_to_next">
			<div class="next1">
				<div class="button_nav">
					<div class="sorting">
						<input type="checkbox" id="sort_selection"/>
						<p class="sort_nav">
							<label for="sort_selection"><i class="fa-solid fa-sort"></i>&ensp;Sort by</label>
							<a href="?title=submit_time"><i class="fa-solid fa-rotate"></i></a>
						</p>
						<ul class="sort_list">
							<li><a href="?title=ID&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">No</a></li>
							<li><a href="?title=firstname&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Name</a></li>
							<li><a href="?title=submit_time&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Enquire date</a></li>
						</ul>
					</div>
					<div class="search-container">
						<form name="search" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<input type='search' placeholder='Search' name='search'/>
							<button type="submit"><i class='fa fa-search'></i></button>
						</form>
					</div>
				</div>

				<form name="enquiry_management" method="post" action="movetobin.php" class="admin_table_form">
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
								<th>Name 
									<a href="?sort=<?php echo $new_sort; ?>&title=firstname&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
									<?php if ($sort_order == 'DESC' && $sort_item == 'firstname'): ?>
										<i class="fa-solid fa-arrow-down-wide-short sort"></i>
									<?php elseif ($sort_order == 'ASC' && $sort_item == 'firstname'): ?>
										<i class="fa-solid fa-arrow-down-short-wide sort"></i>
									<?php endif; ?>
									</a>
								</th>
								<th>Email</th>
								<th>Tutorial 
									<input type="checkbox" id="filter1" />
									<label for="filter1" id="filter1_overlay"></label>
									<label for="filter1"><i class="fa-solid fa-filter"></i></label>
									<ul class="filter">
										<li><a href="?filter=tutorial&sort_item=<?php echo $sort_item; ?>&sort_order=<?php echo $sort_order; ?>&page=1&data_table=enquiry&filter_select=tutorial">Tutorial</a></li>
										<li><a href="?filter=tutorial&sort_item=<?php echo $sort_item; ?>&sort_order=<?php echo $sort_order; ?>&page=1&data_table=enquiry&filter_select=tools">Tools</a></li>
										<li><a href="?filter=tutorial&sort_item=<?php echo $sort_item; ?>&sort_order=<?php echo $sort_order; ?>&page=1&data_table=enquiry&filter_select=care">Care</a></li>
									</ul>
								</th>
								<th>Enquire Date 
									<a href="?sort=<?php echo $new_sort; ?>&title=submit_time&page=<?php echo $page; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">
									<?php if ($sort_order == 'DESC' && $sort_item == 'submit_time'): ?>
										<i class="fa-solid fa-arrow-down-wide-short sort"></i>
									<?php elseif ($sort_order == 'ASC' && $sort_item == 'submit_time'): ?>
										<i class="fa-solid fa-arrow-down-short-wide sort"></i>
									<?php endif; ?>
									</a>
								</th>
								<th>Status 
									<input type="checkbox" id="filter2" />
									<label for="filter2" id="filter2_overlay"></label>
									<label for="filter2"><i class="fa-solid fa-filter"></i></label>
									<ul class="filter">
										<li><a href="?filter=solve&sort_item=<?php echo $sort_item; ?>&sort_order=<?php echo $sort_order; ?>&page=1&data_table=enquiry&filter_select=pending">Pending</a></li>
										<li><a href="?filter=solve&sort_item=<?php echo $sort_item; ?>&sort_order=<?php echo $sort_order; ?>&page=1&data_table=enquiry&filter_select=solved">Solved</a></li>
									</ul>
								</th>
								<th>Actions</th>
							</tr>
						<!-- display database items -->
						<?php
							if ($displayed_rows > 0){
								while ($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><input type="checkbox" name="selected_user[]" value="<?php echo $row['ID']; ?>"/></td> <!-- -->
								<td><?php echo $row["ID"]; ?></td>
								<td><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
								<td><?php echo $row["email"]; ?></td>
								<td><?php echo $row["tutorial"]; ?></td>
								<td><?php echo $row["submit_time"]; ?></td>
								<td><?php echo $row["solve"]; ?></td>
								<td>
									<a href="?id=<?php echo $row['ID']; ?>&action=reply&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-reply"></i></a>&ensp;
									<a href="movetobin.php?id=<?php echo $row['ID']; ?>&action=delete&data_table=enquiry&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&search=<?php echo $search; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-trash"></i></a>
								</td>
							</tr>
						<?php
								}
							} else {
								$start_no = 0;
								echo "<tr><td colspan='7'>No results found</td></tr>";
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
										echo "<li class='current_page page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&search=$search&filter=$filter&filter_select=$filter_select'>$i</a></li>"; 
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
					<input type="hidden" name="data_table" value="enquiry" />
					<input type="hidden" name="search" value="<?php echo $search; ?>" />
					<input type="hidden" name="filter" value="<?php echo $filter; ?>" />
					<input type="hidden" name="filter_select" value="<?php echo $filter_select; ?>" />
					<input type="hidden" name="page" value="<?php echo $page; ?>" />

					<div class="admin-btns">
						<button type="submit" name="delete" class="delete-btn"><i class="fa-solid fa-trash-can"></i>&ensp;DELETE</button>
					</div>
				</form>
			</div>

			<!-- Reply form -->
			<form id="enquiry_display" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<input type="hidden" name="reply_email" value="<?php echo $reply_email; ?>" />
				<input type="hidden" name="reply_name" value="<?php echo $reply_firstname . ' ' . $reply_lastname; ?>" />
				<input type="hidden" name="reply_tutorial" value="<?php echo $reply_tutorial; ?>" />
				<input type="hidden" name="reply_id" value="<?php echo $reply_id; ?>" />
				<input type="hidden" name="reply_question" value="<?php echo $enquiry_question; ?>" />
				<table>
					<tr>
						<th>Name:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$reply_firstname $reply_lastname" : "-"; ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$reply_email" : "-"; ?></td>
					</tr>
					<tr>
						<th>Phone:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$reply_phone" : "-"; ?></td>
					</tr>
					<tr>
						<th>Address:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$reply_street, $reply_postcode $reply_city, $reply_state" : "-"; ?></td>
					</tr>
					<tr>
						<th>Date:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$enquiry_date" : "-"; ?></td>
					</tr>
					<tr>
						<th>Tutorial:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$reply_tutorial" : "-"; ?></td>
					</tr>
					<tr>
						<th>Enquiry:</th>
						<td><?php echo (isset($_GET['id']) && $_GET['action'] == 'reply') ? "$enquiry_question" : "-"; ?></td>
					</tr>
					<tr>
						<th>Reply:</th>
						<td><?php 
							if (isset($_GET['id']) && $_GET['action'] == 'reply' && $reply_ans != NULL) {
								echo "$reply_ans<br/><em>~ $reply_date</em>";
							} else {
								echo "<textarea rows='3' cols='40' name='reply_ans'";
								if (!(isset($_GET['id']) && $_GET['action'] == 'reply')) { 
									echo " disabled"; 
								} 
								echo "></textarea>";
							}
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="submit" name="reply" id="reply-btn" <?php if (!(isset($_GET['id']) && $_GET['action'] == 'reply' && $reply_ans == NULL)) echo "disabled"; ?>><i class="fa-solid fa-paper-plane"></i>&ensp;REPLY</button>
						</td>
					</tr>
				</table>

				<!--Hidden input type to retain the original position-->
				<input type="hidden" name="page" value="<?php echo $page; ?>">
				<input type="hidden" name="sort_order" value="<?php echo $sort_order; ?>"/> 
				<input type="hidden" name="sort_item" value="<?php echo $sort_item; ?>"/> 
				<input type="hidden" name="search" value="<?php echo $search; ?>"/> 
				<input type="hidden" name="filter" value="<?php echo $filter; ?>"/> 
				<input type="hidden" name="filter_select" value="<?php echo $filter_select; ?>"/> 

			</form>
		</div>
	</div>
</article>

<footer>
	<p>&copy; Green Life 2024</p>
</footer>
</body>
</html>