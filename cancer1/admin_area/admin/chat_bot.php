
<?php



if(isset($_POST["action"]))
{
  require_once "db_conn.php";

if($_POST["action"] == "chat_bot")
    {
      $output = '<div class="container">

     

  </div>';
      echo $output;
    }
}
?>