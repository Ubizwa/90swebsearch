<?php


define("SITE_ADDR", "https://nineties.ruthenic.com/");

include "./include.php";
$site_title = '90s web search';

session_start();

$_SESSION['keyword'] = $_GET['k'];

if ($_GET['language']) {
    $_SESSION['language'] = $_GET['language'];
}

if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = "English";
}

if ($_GET['order']) {
    $_SESSION['order'] = $_GET['order'];
}

if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = "Popularity";
}
?>

<html>
     <head>
     
     
     
 


<script>
     
     function changefunction() {
  //var selectbox = document.getElementById("selectbox");
   //  var selectedValue = selectbox.options[selectbox.selectedIndex].value;
     
     alert(selectedValue);
}     
     }
     </script>
     
                  <meta charset="utf-8">
                <meta name="viewport" content="width=device-width" />
 <title><?php echo $site_title; ?></title>
 <link rel="stylesheet" type="text/css" href="./main.css">
</head>

<body>


<?php
include "include.php";

$conn5 = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conn5->connect_error) {
    die("Connection failed: " . $conn5->connect_error);
}

$ipadd = $_SERVER['HTTP_X_FORWARDED_FOR'];

$visitoradd = $conn5->prepare("INSERT INTO visitors (ip) VALUES (?)");
$visitoradd->bind_param("s", $ipadd);
$visitoradd->execute();

$visitoradd->close();
$conn5->close();
?>


        <div id="wrapper">

                <div id="top_header">
                

                <div id="logo">
                       <script>  //<h1><a href=<?php echo SITE_ADDR; ?>>90s web engine</a></h1> </script>

                </div>
        </div>
        

<div id="main" class="shadow-box"><div id="content">


   
<center>
  <img src="wordart2.png" width="700px"><br/>
<div id="nav">
                        <a href="<?php echo SITE_ADDR; ?>about.php"><b><u>About</u></b></a> | 

                        <a href="<?php echo SITE_ADDR; ?>suggest_entry.php">Suggest websites</a> |
                        
                        <a href="https://discord.gg/dskucUNCwU" target="blank"><b><u>Discord server</u></b></a><br> |

			<a href="https://www.reddit.com/r/90sssearchengine/" target="blank"><b><u>Subreddit</u></b></a><br> |
<a href="https://www.twitter.com/StatuarySpace" target="blank"><b><u>My Twitter</u></b></a><br>


                </div>

<br /><br />

If you like you can send a donation:<br />
                
                <form action="https://www.paypal.com/donate" method="post" target="_top">
<input type="hidden" name="hosted_button_id" value="ADRSTK6CT5WT4" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form>

               <?php 


include "include.php";

 $servername = DB_SERVER;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;

        $query_stringcountid2 = "SELECT id FROM search_engine";

        $mysqlii = new mysqli($servername, $username, $password, $dbname);
        // show amount of search results for search


        if ($resultrand22 = mysqli_query($mysqlii, $query_stringcountid2)) {
            // Return the number of rows in result set

$maxnumber = mysqli_num_rows($resultrand22);
            // Free result set
            mysqli_free_result($resultrand22);
        }



$randomnumber = rand(1,$maxnumber);

$select = "SELECT * FROM search_engine WHERE id='$randomnumber' AND NSFW < 1";

if($select == FALSE) 
{
$randomnumber = rand(1,$maxnumber);
$select = "SELECT * FROM search_engine WHERE id='$randomnumber' AND NSFW < 1";
}


$resrandom = $mysqlii->query($select);

if($resrandom->num_rows > 0) {
while($rowrand = $resrandom->fetch_assoc()){

echo "<br /><br />
<a onclick='randomClick(". $randomnumber . ");' href=". $rowrand['link']. " target='blank'><u>Surprise me!</u></a>  <br /><small>(Turn off pop-up blocker for it to work)</small>";

} 
  }


?>

<br />
A special thanks to <a href="https://theoldnet.com/"><u>The Old Net</u></a> for improved displaying of the websites.<br/>

<script>
function randomClick(intrand) {

    
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("button").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","random_click.php?intr="+intrand,true);
  xmlhttp.send();

location.reload(true);


}


</script>


        
                
                
          <form action="" method="get" name="">

          <table>
                  <tr>




                          <td><input list='text' style='width:400px;height:35px' name='k' placeholder='Search for something'  autocomplete='off' value='



<?php echo $_SESSION['keyword']; ?>

'><datalist id="text2">
                          <?php
//selectBoxOptions='Canada'
?>
                          <?php
                          // Fetch title in search bar, this works

                          $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

                          $searchoptions = "SELECT * FROM search_engine";
                          $result2 = $conn->query($searchoptions);

                          if ($result2->num_rows > 0) {
                              while ($row2 = $result2->fetch_assoc()) {
                                  echo "<option value='" . $row2['title'] . "'>";
                              }
                          }
                          ?>
                          </datalist>
                          
                          
                          </td>
                          <td><input type='submit' name='' value='Search'></td></tr>
                          <tr><br />

<?php if ($_GET['nsfw'] == 'on') {
    echo '<td><input type="checkbox" name="nsfw" checked float:left;>Show NSFW search results</td>';
} else {
    echo '<td><input type="checkbox" name="nsfw" float:left;>Show NSFW search results</td> ';
} ?>




                  </tr>
              <tr>
              <td>
              Order by: <select id="selectbox" id="order" name="order" onchange="changefunction();">

 <?php
 $arrayorder = ["click", "date", "title"];
 $arrayordername = ["Popularity", "Date ascending", "Name A-Z"];

 foreach ($arrayorder as $value1 => $order2) {
     if ($order2 == $_GET['order']) {
         echo "<option selected='selected' value='" . $order2 . "'>" . $arrayordername[$value1] . "</option>";
     } else {
         echo "<option value='" . $order2 . "'>" . $arrayordername[$value1] . "</option>";
     }
 }
 ?>


             
              </select>
              </td></tr>
              
          </table>



          <br /><br />
                     <input type="hidden" name="page" value=1>

                     Language: <select name="language">
                     <?php
                     $array = ["English", "All-languages", "French", "Dutch"];

                     foreach ($array as $value => $name) {
                         if ($name == $_GET['language']) {
                             echo "<option selected='selected' value='" . $name . "'>" . $name . "</option>";
                         } else {
                             echo "<option value='" . $name . "'>" . $name . "</option>";
                         }
                     }
                     ?>
                     </select><br />
  </form>
  <br />
  Selected language: <?php echo $_SESSION['language']; ?>

  
  <br /><br />
  To view some of the websites you will need Flash, for Firefox <a href="https://addons.mozilla.org/en-US/firefox/addon/flash-player-emulator/?utm_source=addons.mozilla.org&utm_medium=referral&utm_content=search" target="blank"><b><u>you can download an add-on here</u></b></a> to view them.
<br />If you use Google Chrome, you can <a href="https://chrome.google.com/webstore/detail/flash-player-emulator-202/ecbnojockcgfohpopbphhgefkfbigcej" target="blank"><b><u>download the Flash emulator here</u></b></a>. <br />If you use Microsoft Edge, <a href="https://microsoftedge.microsoft.com/addons/detail/flash-player/klldcoibpcdcdbmoheppnncghhfoimca" target="blank"><b><u>you can download it here</u></b></a>.
<br /><small>(I am working on adding some of the Flash sites on our web hosting so that you can view them without needing to add an extension, but that can currently only be done for some of the most popular websites, for other sites please use the Ruffle Flash emulator in the accompanied link.</small>
<br /> 

<?php
include "include.php";

$conn6 = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$queryvisit = "SELECT ip FROM visitors";

$resvisit = mysqli_query($conn6, $queryvisit);

if ($resvisit) {
    $rowvisit = mysqli_num_rows($resvisit);

    echo "<br /> <i>Unique visitors: " . $rowvisit . " </i>";


}


mysqli_free_result($resvisit);
mysqli_close($conn6);
?>

<br />



<br /><br />


 </center>
    
    <?php

include "include.php";

 $servername = DB_SERVER;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;

        echo '<div class="right"> 
    <i>This search engine currently contains ';

        $query_stringcount = "SELECT id FROM search_engine";

        $mysqli = new mysqli($servername, $username, $password, $dbname);
        // show amount of search results for search

        if ($resulta = mysqli_query($mysqli, $query_stringcount)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($resulta);
            printf($rowcount);
$maxnumber = mysqli_num_rows($resulta);
            // Free result set
            mysqli_free_result($result);
        }

        echo " websites.</i>";
     



    if (isset($_GET['k']) && $_GET['k'] != '') {
        $k = trim($_GET['k']);

        $query_string = "SELECT * FROM search_engine WHERE ";
        $display_words = "";

        $keywords = explode(' ', $k);

        foreach ($keywords as $word) {
            $query_string .= " keywords LIKE '%" . $word . "%' OR ";
            $display_words .= $word . " ";
        }

        $query_string = substr($query_string, 0, strlen($query_string) - 3);
        $setstring = $query_string;



        if ($_SESSION['language'] == "All-languages") {
            $query_string .= "";
        } elseif ($_SESSION['language'] != "English") {
            $query_string .= " AND `language` = '.$_SESSION[language].' ";
        } else {
            $query_string .= " AND `language` = 'English' ";
        }

        if ($_GET['nsfw'] == "on") {
            $query_string .= " AND NSFW >= 0 ";
        } else {
            $query_string .= " AND NSFW < 1 ";
        }

        if ($_SESSION['order'] == 'popularity') {
            $query_string .= " ORDER BY click DESC ";
        } elseif ($_SESSION['order'] == 'date') {
            $query_string .= " ORDER BY `date` ASC ";
        } elseif ($_SESSION['order'] == 'name') {
            $query_string .= " ORDER BY title ASC ";
        }

        $limit = 5;
        $page_number;

        if (isset($_GET['page'])) {
            $page_number = $_GET['page'];
        } else {
            $page_number = 1;
        }

        $start_from = ($page_number - 1) * $limit;

        $query_string .= " LIMIT " . $start_from . ',' . $limit;

        // insert the search entries into the database, this works now
        $servername = DB_SERVER;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;

        $conn11 = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn11->connect_error) {
            die("Connection failed: " . $conn11->connect_error);
        }

        // prepare and bind
        $stmt33 = $conn11->prepare("INSERT INTO searches (search, ip, date) VALUES (?, ?, ?)");
        $stmt33->bind_param("sss", $search, $ip, $date);

        // set parameters and execute
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $getk = $_GET['k'];
        $date = date('Y-m-d H:i:s');
        $search = $_GET['k'];
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        $stmt33->execute();

        // show the number of entries in the search engine, this function doesn't work





        // Return the number of search results, works again   WORKS

        if ($_GET['nsfw']) {
            if ($_SESSION['language'] == "English") {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND (language = '') AND nsfw >= 0");
            } elseif ($_SESSION['language'] == "All-languages") {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND nsfw >= 0");
            } else {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND (language = '" . $_SESSION['language'] . "') AND nsfw >= 0");
            }
        } else {
            if ($_SESSION['language'] == "English") {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND (language = '') AND nsfw < 1");
            } elseif ($_SESSION['language'] == "All-languages") {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND nsfw < 1");
            } else {
                $stmt4 = $mysqli->prepare("SELECT COUNT(id) FROM `search_engine` WHERE MATCH( keywords ) AGAINST (?) AND (language = '" . $_SESSION['language'] . "') AND nsfw < 1");
            }
        }



        $key_check = '%' . $word . '%';

        $stmt4->bind_param("s", $search);
        if (!$stmt4->execute()) {
            trigger_error('The query execution failed; MySQL said (' . $stmt4->errno . ') ' . $stmt4->error, E_USER_ERROR);
        }

        $coll1 = null;
        $stmt4->bind_result($coll1);

        $keyprint = preg_replace('/%/s', '', $key_check);

        while ($stmt4->fetch()) {
            // for this query, there will only be one row, but it makes for a more complete example
            echo '<br /><br /><b><u>' . $coll1 . '</u></b> search results for <i>' . $_SESSION['keyword'] . '</i><br /></div>';
        }

        $stmt4->close();

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        $query1 = mysqli_query($conn1, $query_stringcount);
        $result_count = mysqli_num_rows($query1);

        echo $result_count;

        if ($coll1 > 0) {
            // show amount of search results for search

            $total_pages = $mysqli->query("SELECT COUNT(*) FROM search_engine")->fetch_row()[0];

            $key_check = "%$word%";

            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
            $num_results_on_page = 5;

            echo '<br />
    <br />';


if(isset($_GET["k"]))
{

echo '<br /><hr></hr>';
}
else
{
//
}


$as = $_SESSION['keyword'];
$asa = preg_replace("/\s+/", ",", $as);


$search = $asa;




    echo '<table class="search">';

            // echo the results of the search as websites under the search bar






            if ($_SESSION['order'] == 'date') {
                include "orderbydate.php";
            } elseif ($_SESSION['order'] == 'click') {
                include "orderbyclick.php";
            } elseif ($_SESSION['order'] == 'title') {
                include "orderbytitle.php";
            }

            while ($row = $resul->fetch_assoc()) {
                
$aa1 = preg_quote('if_', '/');

$a1 = preg_replace("/$aa1/", "", $row['link']);


$v = preg_quote("https://web.archive.org/web/", '/');
$withoutur0 = preg_replace("/$v/", "", $a1);



$timestamp = strstr( $withoutur0, '/', true);



$withouturl2 = strstr( $withoutur0, '/', false);
$urlwithout = substr($withouturl2, 1);



$linkcheck = $row['link'];

if (preg_match("/archive/", $linkcheck))
{
echo "<tr><td><h3><a onclick='registerClick(" .
                    $row['id'] .
                    ");' href='https://theoldnet.com/get?decode=false&scripts=false&timestamp=" . $timestamp . "&url=" . $urlwithout . "' id='" .
                    $row['id'] .
                    "' name='" .
                    $row['id'] .
                    "' target='_blank'>" .
                    $row['title'] .
                    "</a></h3>
</td></tr>
    <tr>";
}
else
{
echo "<tr><td><h3><a onclick='registerClick(" .
                    $row['id'] .
                    ");' href='" .
                    $row['link'] . 
                    "' id='" .
                    $row['id'] .
                    "' name='" .
                    $row['id'] .
                    "' target='_blank'>" .
                    $row['title'] .
                    "</a></h3>
</td></tr>
    <tr>";
}



   echo " <td>Date: " .
                    $row['date'] .
                    "</td></tr>"; ?>




 <script type="text/javascript">

function registerClick(int) {

    
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("button").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","register_click.php?q="+int,true);
  xmlhttp.send();

}



</script>


<?php echo "<tr><td>" .
    $row['description'] .
    "</td>
    </tr><tr><td><small>Unique clicks: " .
    $row['click'] .
    " ";
            }
        }

        $stmt4->close();

        echo "</table>";
        echo "<br /><br />";

        //pagination, this function works.

        if ($_SESSION['language'] == "English") {
            $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM search_engine WHERE MATCH( keywords ) AGAINST ('$search') AND (language = '')");
        } elseif ($_SESSION['language'] == "All-languages") {
            $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM search_engine WHERE MATCH( keywords ) AGAINST ('$search')");
        } else {
            $langue = $_SESSION['language'];
            $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM search_engine WHERE MATCH( keywords ) AGAINST ('$search') AND (language = '" . $langue . "')");
        }

        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);

        $repeatk = $_GET['k'];
        $repeatorder = $_GET['order'];

        $pagLink = "<ul class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($_GET['page'] == $i) {
                $pagLink .= "<b>" . $i . "</b> | ";
            } else {
                $pagLink .= "<a href='index.php?k=" . $repeatk . "&order=" . $repeatorder . "&page=" . $i . "'>" . $i . "</a> | ";
            }
        }
        echo $pagLink . "</ul>";
    } else {

if(isset($_GET['k']))
{
        echo '<br />No results found for your search, please try again.';
} 

   }

    $mysqli->close();
    ?>
    

     
    
    </div></div>
    <div id="footer">
    
    <?php echo "Copyright © 2022 - " . date("Y") . " - Created and updated by Statuary Space Art; Hosted by Ruthenic"; ?>
    
    </div>
    
    
    
</body>
</html>
