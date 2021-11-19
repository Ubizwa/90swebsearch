<?php




if($_GET['nsfw'] == 'on')

{

switch($_SESSION['language']){

case "English":


  if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND language = '' AND nsfw >= 0 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
            //$language_check = $_SESSION['language'];




$stmt4->bind_param("sss", $search, $calc_page, $num_results_on_page);
$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();

  }

break;

case "All-languages":

if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND nsfw >= 0 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
            //$language_check = $_SESSION['language'];
            $ordercheck = $_SESSION['order'];
$stmt4->bind_param("sss", $search, $calc_page, $num_results_on_page);
//$stmt4->bind_param("ssss", $search, $language_check, $calc_page, $num_results_on_page);

$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();
}
break;

default:

if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND language = ? AND nsfw >= 0 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
      $languee = $_SESSION['language'];
                  $ordercheck = $_SESSION['order'];
            //$language_check = $_SESSION['language'];

$stmt4->bind_param("ssss", $search, $languee, $calc_page, $num_results_on_page);





//$stmt4->bind_param("ssss", $search, $language_check, $calc_page, $num_results_on_page);

$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();

}
}


}
else
{

switch($_SESSION['language']){
case "English":




  if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND language = '' AND nsfw < 1 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
            //$language_check = $_SESSION['language'];


$stmt4->bind_param("sss", $search, $calc_page, $num_results_on_page);
//$stmt4->bind_param("ssss", $search, $language_check, $calc_page, $num_results_on_page);

$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();

  }

break;

case "All-languages":

if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND nsfw < 1 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
            //$language_check = $_SESSION['language'];
            $ordercheck = $_SESSION['order'];
$stmt4->bind_param("sss", $search, $calc_page, $num_results_on_page);
//$stmt4->bind_param("ssss", $search, $language_check, $calc_page, $num_results_on_page);

$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();
}
break;

default:

if ($stmt4 = $mysqli->prepare("SELECT id, title, description, keywords, link, date, click FROM search_engine WHERE MATCH( keywords ) AGAINST (?) AND language = ? AND nsfw < 1 ORDER BY `click` DESC LIMIT ?, ?")) {
      $calc_page = ($page - 1) * $num_results_on_page;
      $languee = $_SESSION['language'];
                  $ordercheck = $_SESSION['order'];
            //$language_check = $_SESSION['language'];

$stmt4->bind_param("ssss", $search, $languee, $calc_page, $num_results_on_page);





//$stmt4->bind_param("ssss", $search, $language_check, $calc_page, $num_results_on_page);

$stmt4->execute();
$resul = $stmt4->get_result(); 
$stmt4->close();

}
}



}