<html>
<head>
<?php


include "include.php";

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if($_POST['Submit'] == true)

{

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_POST['password'] == '2367asweqr21OPtDIVjiASDSFDi3r4')
{

$stmt = $conn->prepare("INSERT IGNORE INTO search_engine (title, description, keywords, category, link, date, nsfw, language) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $title, $description, $keywords, $category, $link, $date, $nsfw, $language);

$title= $_POST['title'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];
$category = $_POST['category'];
$link = $_POST['link'];
$date = $_POST['date'];
$language = $_POST['language'];

if($_POST['nsfw'] == true)
{
$nsfw = 1;
}
else
{
$nsfw = 0;
}

$stmt->execute();

$stmt->close();
$conn->close();

echo "Website added succesfully<br />";

}


}

?>
 <link rel="stylesheet" type="text/css" href="./main.css">
</head>




<body>

<br />
<div id="wrapper">
<div id="main" class="shadow-box">
Add entries:<br /><br />
<form method="post" action=<?php echo '"' .$_SERVER["PHP_SELF"] . '"' ?>" name="website">
Title:  <br /><input type="text" name="title"><br />
Description:  <br /><textarea name="description"></textarea><br />
Keywords:  <br /><textarea name="keywords"></textarea><br />
Category:  <br /><select name="category">
<option value="Entertainment">Entertainment</option>
<option value="News and Media">News and Media</option>
<option value="Fun">Fun</option>
<option value="Gaming">Gaming</option>
<option value="Sports">Sports</option>
<option value="Community">Community</option>
<option value="Technology and Computers">Technology and Computers</option>
<option value="3D">3D</option>
<option value="Personal Website">Personal Website</option>
<option value="Other">Other</option>
</select><br />
Link: <br /><input type="text" name="link"><br />
Date: <br /><input type="date" name="date"><br />
NSFW?: <br /><input type="checkbox" name="nsfw" value="nsfw"><br />
If in another language, give the abbreviation of the country, otherwise leave as is: <br /><select name="language">
<option value="English">English</option>
<option value="Dutch">Dutch</option>
</select>
<br />
Password to add words: <br /><input type="password" name="password"><br />
<input type="submit" value="Submit" name="Submit">
</form>

</div>
</div>


</body>
</html>