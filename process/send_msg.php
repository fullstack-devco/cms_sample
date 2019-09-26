<?php
  $mysqli = new mysqli('localhost','id11005518_cms_admin','JesusSaves0211!','id11005518_cms_sample') or die(mysqli_error($mysqli));

  $inbox_from = "";
  $inbox_contact = "";
  $inbox_txt = "";
  $inbox_date = "";
  $inbox_status = 0; //unread

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Check field validity
    if(strcmp($_POST["inbox_from"], "") == 0 || 
        strcmp($_POST["inbox_contact"], "") == 0 ||
        strcmp($_POST["inbox_txt"], "") == 0) {
      //header("location: ../index.php"); //Redirect user to login page if all field is blank
      ?>
      <script>
        setTimeout(function() { 
            window.location = "../index.php"; 
        }, 0);
      </script>
      <?php
    }

    $inbox_from = validateInput($_POST["inbox_from"]);
    $inbox_contact = validateInput($_POST["inbox_contact"]);
    $inbox_txt = validateInput($_POST["inbox_txt"]);
    date_default_timezone_set('Asia/Manila');
    $inbox_date = date('Y-m-d H:i:s');
    $inbox_status = 0;

    $result = $mysqli->query("INSERT INTO inbox_tbl (inbox_status,inbox_txt,inbox_from,inbox_contact,inbox_date) VALUES ($inbox_status,'$inbox_txt','$inbox_from','$inbox_contact',STR_TO_DATE('$inbox_date', '%Y-%m-%d %H:%i:%s'))") or die($mysqli->error());

    if($result) {
      echo '<script>alert("Message successfully sent. We will be sure to respond within 24 hours. Thank you and have a good day!")</script>';
    }

    //header("refresh:0.5; url=../index.php?");
    ?>
    <script>
      setTimeout(function() { 
          window.location = "../index.php"; 
      }, 500);
    </script>
    <?php
  }
  
  //Perform validation to avoid potential hacking of inputs
  function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>