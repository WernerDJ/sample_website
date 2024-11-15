<?php 
require_once __DIR__.'/../php/contact.php';
// Set the blog post title directly in the code
$blogPostTitle = "Short version of the english title, no spaces";
require_once __DIR__.'/../php/blogdata.php';
?>
//
// The blog text could be stored in the SQL database so only one php file retrieves the text in the selected languae and the images and hyperlinks remain unchanged,
// but since the hyperlinks have to point sometimes to versions in the selected language I find it easier to create  a php file for each blog post in each language
// and let the blog list loaded un the main page to point at a different php file for each language version of each blog post
//
<!DOCTYPE html>
<html lang="en">
	<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/PostStyl.css" /> 
<title><?php echo htmlspecialchars($blogPost['BlogPostTitle']); ?></title>
	</head>
<body>
	<div>
<h1> Complete Title in the blog post language</h1>
<p class="first-paragraph">
Text in the selected language</p>
<p>

Text, hiperlinks, images in or for the selected language

	</div>
<br><br>
<?php
include __DIR__.'/../php/comments.html.php';
