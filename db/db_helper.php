<?php 
  $mysqli = new mysqli('localhost','id11005518_cms_admin','JesusSaves0211!','id11005518_cms_sample') or die(mysqli_error($mysqli));

  //HEADER VARIABLES
  $header_img = "";
  $header_main_txt = "";
  $header_sub_txt = "";

  //ABOUT VARIABLES
  $about_txt = "";

  //SERVICES VARIABLES
  $services_img = "";
  $services_name = "";

  //SERVICES EXTRA VARIABLES
  $services_extra_img = "";
  $services_extra_main_txt = "";
  $services_extra_sub_txt = "";

  //OFFERS VARIABLES
  $offers_img = "";
  $offers_name = "";
  $offers_desc = "";

  //FEEDBACK VARIABLES
  $feedback_txt = "";
  $feedback_from = "";

  //CONTACT VARIABLES
  $contact_email = "";
  $contact_num = "";

  $result = $mysqli->query("SELECT * FROM header_tbl") or die($mysqli->error());
  $count = mysqli_num_rows($result);
  if($count == 1) {
    $row = $result->fetch_array();
    $header_img = 'data:image/png;base64,'.base64_encode($row['header_img']);
    $header_main_txt = $row['header_main_txt'];
    $header_sub_txt = $row['header_sub_txt'];
  }

  $result = $mysqli->query("SELECT * FROM about_tbl") or die($mysqli->error());
  $count = mysqli_num_rows($result);
  if($count == 1) {
    $row = $result->fetch_array();
    $about_txt = $row['about_txt'];
  }

  $result = $mysqli->query("SELECT * FROM services_extra_tbl") or die($mysqli->error());
  $count = mysqli_num_rows($result);
  if($count == 1) {
    $row = $result->fetch_array();
    $services_extra_img = 'data:image/png;base64,'.base64_encode($row['services_extra_img']);
    $services_extra_main_txt = $row['services_extra_main_txt'];
    $services_extra_sub_txt = $row['services_extra_sub_txt'];
  }

  $result = $mysqli->query("SELECT * FROM contact_tbl") or die($mysqli->error());
  $count = mysqli_num_rows($result);
  if($count == 1) {
    $row = $result->fetch_array();
    $contact_email = $row['contact_email'];
    $contact_num = $row['contact_num'];
  }
?>