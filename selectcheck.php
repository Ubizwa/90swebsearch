    if (isset($_GET['k']) && $_GET['k'] != ''){
 
   $k = trim($_GET['k']);
    
 
    $query_string = "SELECT * FROM search_engine WHERE ";
    $display_words = "";
    
    
    $keywords = explode(' ', $k);
    
    
    foreach($keywords as $word)
    {
    $query_string .= " keywords LIKE '%".$word."%' OR ";
    $display_words .= $word." ";
    }
    
    
  
    $query_string = substr($query_string, 0, strlen($query_string) -3);
     $setstring = $query_string;
 
  
  
   

    
 
 
 
    if(!isset ($_GET['nsfw'])) {
    $query_string .= " AND nsfw <1 ";
    }
    
    
    
    
    if($_GET['order'] == 'popularity') {
    
    $query_string .= " ORDER BY title";
    
    }
    elseif($_GET['order'] == 'date') 
    {
    $query_string .= " ORDER BY date";    
    }
    else 
    {
    $query_string .= " ORDER BY title";    
    }
    
    $limit = 5;

$page_number;


    if(isset($_GET['page'])) {
    $page_number = $_GET['page'];
    }
    else 
    {
    $page_number = 1;
    }
    
    $start_from = ($page_number-1)* $limit;
    
    
    
    $query_string .= " LIMIT " . $start_from . ',' . $limit; 