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
<!-- Description: Feedback Management -->
<!-- Author: Joanne Chin Jia Xuan -->
<!-- Date: 12/11/2024 -->
<!-- Validated: OK 12/11/2024 -->

<head>
    <title>Feedback Management | Green Life</title>
	<meta charset="utf-8"/>
	<meta name="author" content="Joanne Chin Jia Xuan"/>
	<meta name="description" content="Feedback Management Module"/>
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
		
		$filter = isset($_GET['filter']) ? $_GET['filter'] : ''; $filter_select = isset($_GET['filter_select']) ? $_GET['filter_select'] : '';
		if (!empty($filter) && !empty($filter_select)){
			$sql_total = "SELECT COUNT(*) FROM feedback WHERE trash='no' AND $filter = '$filter_select'"; 
			$sql = "SELECT * FROM feedback WHERE trash='no' AND $filter = '$filter_select' ORDER BY $sort_item $sort_order LIMIT $offset, $items_per_page";
		} else {
			$sql_total = "SELECT COUNT(*) FROM feedback WHERE trash='no'"; 
			$sql = "SELECT * FROM feedback WHERE trash='no' ORDER BY $sort_item $sort_order LIMIT $offset, $items_per_page";
		}
		
		$result_total = mysqli_query($conn, $sql_total); //Count displayed items
		$row_total = mysqli_fetch_array($result_total); 
		$total_rows = $row_total[0];

		$result = mysqli_query($conn, $sql);
		$displayed_rows = mysqli_num_rows($result);

		$start_no = $offset + 1;
		$end_no = $offset + $displayed_rows;

		//display feedback data
		if (isset($_GET['id']) && $_GET['action'] == 'view') { 
			$view_id = intval($_GET['id']);
			$view_info = "SELECT * FROM feedback WHERE ID=$view_id";
			$view_result = mysqli_query($conn, $view_info);

			if ($view_result){
				$view_row = mysqli_fetch_assoc($view_result);
				$view_goal = $view_row['goal'];
				$view_rating = $view_row['star_rating'];
				$view_comment = $view_row['comment'];
			}
		}
	?>

	<div>
		<h1>Feedback Management</h1>

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
							<li><a href="?title=submit_time&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Submitted date</a></li>
						</ul>
					</div>
				</div>
				<form name="feedback_management" method="post" action="movetobin.php" class="admin_table_form">
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
								<th>Goal
									<input type="checkbox" id="filter1" />
									<label for="filter1" id="filter1_overlay"></label>
									<label for="filter1"><i class="fa-solid fa-filter"></i></label>
									<ul class="filter">
										<li><a href="?filter=goal&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=yes">Yes</a></li>
										<li><a href="?filter=goal&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=no">No</a></li>
									</ul>
								</th>
								<th>Rating
									<input type="checkbox" id="filter2" />
									<label for="filter2" id="filter2_overlay"></label>
									<label for="filter2"><i class="fa-solid fa-filter"></i></label>
									<ul class="filter">
										<li><a href="?filter=star_rating&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=rate-1">rate-1</a></li>
										<li><a href="?filter=star_rating&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=rate-2">rate-2</a></li>
										<li><a href="?filter=star_rating&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=rate-3">rate-3</a></li>
										<li><a href="?filter=star_rating&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=rate-4">rate-4</a></li>
										<li><a href="?filter=star_rating&sort_order=<?php echo $sort_order; ?>&page=1&data_table=feedback&filter_select=rate-5">rate-5</a></li>
									</ul>
								</th>
								<th>Submitted Date
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
								<td><input type="checkbox" name="selected_user[]" value="<?php echo $row['ID']; ?>" /></td> 
								<td><?php echo $row["ID"]; ?></td>
								<td><?php echo $row["goal"]; ?></td>
								<td><?php echo $row["star_rating"]; ?></td>
								<td><?php echo $row["submit_time"]; ?></td>
								<td>
									<a href="?id=<?php echo $row['ID']; ?>&action=view&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-eye"></i></a>&ensp;
									<a href="movetobin.php?id=<?php echo $row['ID']; ?>&action=delete&data_table=feedback&page=<?php echo $page; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>"><i class="fa-solid fa-trash"></i></a>
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
								<li><a href="?page=<?php echo $page - 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Previous</a></li> 
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
										echo "<li class='current_page page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&filter=$filter&filter_select=$filter_select'>$i</a></li>"; 
									} else {
										echo "<li class='page_num'><a href='?page=$i&sort=$sort_order&title=$sort_item&filter=$filter&filter_select=$filter_select'>$i</a></li>"; 
									}
								} 
							?>
							<?php if ($page < $total_pages): ?> <!-- Next page -->
								<li><a href="?page=<?php echo $page + 1; ?>&sort=<?php echo $sort_order; ?>&title=<?php echo $sort_item; ?>&filter=<?php echo $filter; ?>&filter_select=<?php echo $filter_select; ?>">Next</a></li>
							<?php endif; ?> 
							</ul>
						</nav>
					</div>

					<!--Hidden input type to retain the original position-->
					<input type="hidden" name="title" value="<?php echo $sort_item; ?>" />
					<input type="hidden" name="sort" value="<?php echo $sort_order; ?>" />
					<input type="hidden" name="offset" value="<?php echo $offset; ?>" />
					<input type="hidden" name="data_table" value="feedback" />
					<input type="hidden" name="filter" value="<?php echo $filter; ?>" />
					<input type="hidden" name="filter_select" value="<?php echo $filter_select; ?>" />
					<input type="hidden" name="page" value="<?php echo $page; ?>" />

					<div class="admin-btns">
						<button type="submit" name="delete" class="delete-btn"><i class="fa-solid fa-trash-can"></i>&ensp;DELETE</button>
					</div>
				</form>
			</div>
			<!-- feedback display -->
			<form>
				<ol id="feedback_view">
					<li>
						Did you find the information you were looking for?
						<p><input type="radio" name="goal" value="yes" id="yes" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_goal == 'yes') ? "checked='checked'" : ""; ?> disabled/><label for="yes">Yes</label>&ensp;
						<input type="radio" name="goal" value="no" id="no" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_goal == 'no') ? "checked='checked'" : ""; ?> disabled/><label for="no">No</label></p>
					</li>
					<li>
						Please rate your overall satisfaction of this website?
						<div id="star-widget">
							<input type="radio" name="ratings" value="rate-5" id="rate-5" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_rating == 'rate-5') ? "checked='checked'" : ""; ?> disabled/><label for="rate-5" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-4" id="rate-4" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_rating == 'rate-4') ? "checked='checked'" : ""; ?> disabled/><label for="rate-4" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-3" id="rate-3" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_rating == 'rate-3') ? "checked='checked'" : ""; ?> disabled/><label for="rate-3" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-2" id="rate-2" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_rating == 'rate-2') ? "checked='checked'" : ""; ?> disabled/><label for="rate-2" class="fa-solid fa-star"></label>
							<input type="radio" name="ratings" value="rate-1" id="rate-1" <?php echo (isset($_GET['id']) && $_GET['action'] == 'view' && $view_rating == 'rate-1') ? "checked='checked'" : ""; ?> disabled/><label for="rate-1" class="fa-solid fa-star"></label>
						</div>
					</li>
					<li>
						<label for="comment">Please let us know how we can improve this website?</label>
						<p><textarea name="comment" rows="4" cols="40" required="required" id="comment" disabled><?php echo (isset($_GET['id']) && $_GET['action'] == 'view') ? "$view_comment" : ""; ?></textarea></p>
					</li>
				</ol>
			</form>
		</div>
	</div>
</article>

<footer>
	<p>&copy; Green Life 2024</p>
</footer>
</body>
</html>