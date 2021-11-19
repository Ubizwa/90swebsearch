<?php

$host = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if (strpos($host,'index') !== false) {

echo '<div id="nav">
                        <a href="'
<?php echo $_SERVER['HTTP_HOST']; ?>'/about.php"><b><u>About</u></b></a> | 

                        <a href="'<?php echo $_SERVER['HTTP_HOST']; ?>'/suggest_entry.php">Suggest websites</a> |
                        
                        <a href="https://discord.gg/dskucUNCwU" target="blank"><b><u>Discord server</u></b></a><br> |

			<a href="https://www.reddit.com/r/90sssearchengine/" target="blank"><b><u>Subreddit</u></b></a><br>


                </div>';
}
