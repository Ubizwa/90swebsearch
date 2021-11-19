 <form action="" method="get" name="">

          <table>
                  <tr>
                          <td><input list='text' style='width:400px;height:35px' name='k' placeholder='search for something'  autocomplete='off' /><datalist id="text">
                          <?php //selectBoxOptions='Canada' ?>



                          <?php
                           $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
    
    $searchoptions = "SELECT * FROM search_engine";
    $result2 = $conn->query($searchoptions);
   
if($result2->num_rows>0)
{
    
    while($row2 = $result2->fetch_assoc()) { 
    echo "<option value='".$row2['title']."'>";
    
    
            }
            
 }                 
                          
                          ?>
                          </datalist>
                          
                          
                          </td>
               
                          <td><input type='submit' name='' value='Search'></td></tr>
                          <tr><br />
                          <td><input type="checkbox" name="showdownload" float:left;>Show modern site links (for broken content)</td>
                          <?php  //<td><input type="checkbox" name="nsfw" float:left;>Show NSFW search results</td> ?>
                          
                  </tr>
              <tr>
              <td>
              Order by: <select id="selectbox" id="order" name="order" onchange="changefunction();">
              <option value="popularity">Popularity (doesn't work yet</option>
              <option value="date">Date descending</option>
              <option value="name">Name A-Z</option>
             
              </select>
              </td></tr>
              
          </table>
          <br /><br />
                     <input type="hidden" name="page" value=1>
  </form>