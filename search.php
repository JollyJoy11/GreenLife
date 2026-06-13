<?php
    require_once __DIR__ . '/config.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$conn) { 
        die("Connection failed: " . mysqli_connect_error()); 
    }

    if (isset($_GET['search'])) {
        // Get the search term from the GET request
        $search_term = $_GET['search'];
        
        // Sanitize the input to prevent malicious input
        $search_safe = htmlspecialchars($search_term, ENT_QUOTES, 'UTF-8'); // Prevent XSS
    
        // List of PHP files to search through
        $files = ['tutorial.php', 'care.php', 'tools.php', 'classify.php', 'contribute.php', 'identify.php', 'index.php'];

        // Mapping of file names to page names
        $page_names = [
            'tutorial.php' => 'Tutorial Page',
            'care.php' => 'Care Page',
            'tools.php' => 'Tools Page',
            'classify.php' => 'Classification Page',
            'contribute.php' => 'Contribute Page',
            'identify.php' => 'Identify Page',
            'index.php' => 'HomePage'
        ];
        
        // Store files that contain the search term
        $results = [];
        
        // Loop through the files and search each one
        foreach ($files as $file) {
            if (file_exists($file)) {
                $content = file_get_contents($file);  // Read content of the PHP file

                // Remove PHP tags and other non-content code
                $content = preg_replace('/<\?php.*?\?>/s', '', $content);
                $content = preg_replace('/<\?(?:php|=).*?\?>/s', '', $content);
                $content = strip_tags($content);
                
                // Search for the term in the content
                if (stripos($content, $search_safe) !== false) {
                    // Find all occurrences of the search term in the content
                    $matches = [];
                    $start_pos = 0;
                    while (($start_pos = stripos($content, $search_safe, $start_pos)) !== false) {
                        // Get a snippet around the found term (50 characters before and after)
                        $snippet_start = max(0, $start_pos - 60);
                        $snippet_end = min(strlen($content), $start_pos + strlen($search_safe) + 100);
                        $snippet = substr($content, $snippet_start, $snippet_end - $snippet_start);

                        // Highlight the search term in the snippet
                        $highlighted_snippet = str_ireplace($search_safe, "<span>$search_safe</span>", $snippet);
                        $matches[] = $highlighted_snippet;
                        
                        // Move the search position ahead to continue searching
                        $start_pos += strlen($search_safe);
                    }

                    if (!empty($matches)) {
                        $results[] = [
                            'file' => $file,
                            'page_name' => $page_names[$file],
                            'matches' => $matches
                        ];
                    }
                }
            } else {
                $results[] = ["error" => "File '$file' does not exist."];
            }
        }

        // Search for images in the content
        foreach ($files as $file) {
            if (file_exists($file)) {
                $content = file_get_contents($file);  // Read content of the PHP file
                
                // Extract image information
                preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/i', $content, $image_matches);
                foreach ($image_matches[1] as $image_path) {
                    if (stripos($image_path, $search_safe) !== false) {
                        $results[] = [
                            'file' => 'image',
                            'page_name' => 'Image',
                            'matches' => [
                                "<a href='$image_path'><img src='$image_path' alt='Image'></a>"
                            ]
                        ];
                    }
                }
            }
        }
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>

<html lang="en">
<!-- Description: Search Result -->
<!-- Author: Cyndia Teo Ya Aii -->
<!-- Date 17/11/2024 -->
<!-- Validated: OK -->
 
<head>
    <title>Search Results</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Cyndia Teo Ya Aii"/>
    <meta name="description" content="Search for Green Life"/>
    <meta name="keywords" content="Green Life, herbarium, herbarium tutorial, plant, identification, plant identification, species, genus, plant family, plant classification"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>

<body>
<?php include "include/header.php"; ?>
<article>
    <?php include "include/enquiry_btn.php"; ?>
    
    <?php if (isset($results)): ?>
    <!-- Search Results -->
    <div class="results <?php echo (count($results) == 0) ? 'no-found' : ''; ?>">
        <h2>Results for:&ensp;<strong><?php echo $search_safe; ?></strong></h2>
            
        <?php if (count($results) > 0): ?>
            <?php foreach ($results as $result): ?>
                <?php if (isset($result['error'])): ?>
                    <p class="error"><?php echo $result['error']; ?></p>
                <?php else: ?>
                    <div class="result-item">
                        <?php if ($result['file'] != 'image'): ?> 
                            <h3>Matches found in:&ensp;
                                <a href="<?php echo $result['file']; ?>"><?php echo $result['page_name']; ?></a>
                            </h3> 
                        <?php else: ?> 
                            <h3>Image matches found:</h3> 
                        <?php endif; ?>
                        <ul>
                            <?php foreach ($result['matches'] as $match): ?>
                                <li><?php echo $match; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-results">No results found for "<strong><?php echo $search_safe; ?></strong>"</p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

</article>

<?php include "include/footer.php"; ?>
</body>
</html>
