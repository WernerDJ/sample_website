<?php
require_once __DIR__.'/../php/MLangContact.php';

// Capture the language from the URL parameter
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en'; // Default to English if not set

// Determine which fields to select based on the language
$titleField = "Title_" . $lang;
$shortField = "Short_" . $lang;
$textField = "Text_" . $lang; // Filename of the post for the hyperlink

// Query the database for blog posts
$sql = "SELECT $titleField AS title, $shortField AS short_desc, BlogImage, $textField AS text_file 
FROM Blogposts
ORDER BY PostOrder ASC";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Prepare an array to store blog posts
    $posts = [];
    
    // Fetch all rows and store them in the $posts array
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
} else {
    echo "No blog posts found.";
}
$conn->close();

// Set the page title based on the selected language
switch ($lang) {
    case 'en':
        $titulo = "Title";
        break;
    case 'es':
        $titulo = "Título";
        break;
    case 'pl':
        $titulo = "Tytuł";
        break;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/BlogStyles.css" /> 
</head>
<body>
    <header>
        <img src="../Images/SeaLogo.png" alt="Sea logo" width="100" height="70">
        <h1><?php echo $titulo; ?></h1>
    </header>

    <ul class="blog-container">
        <?php foreach ($posts as $post): ?>
            <li class="blog-item">
                <div class="blog-image">
                    <img src="../Images/<?php echo htmlspecialchars($post['BlogImage']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                </div>
                <div class="blog-entry">
                    <!-- Blog Title as Hyperlink -->
                    <h4>
                        <a href="../Blog/<?php echo htmlspecialchars($post['text_file']); ?>">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </a>
                    </h4>
                    <p><?php echo htmlspecialchars($post['short_desc']); ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
