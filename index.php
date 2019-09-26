<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CMS</title>
    <link rel="stylesheet" href="css/fonts/font.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
    <?php require_once("db/db_helper.php"); ?>
    <?php //require_once("process/send_msg.php"); ?>

    <header id="top" style="background: url(<?php echo $header_img; ?>); padding: 0; margin: 0; width: 100%; height: 660px; background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover;">
      <nav id="nav">
        <div id="logo-div"><a href="#top">CMS</a></div>
        <div id="in-between-div"></div>
        <div id="nav-div">
          <div class="horizontal-nav">
            <ul id="menu">
              <li><a class="link-btn" href="#top"></a></li>
              <li><a class="link-btn" href="#about">About</a></li>
              <li><a class="link-btn" href="#services">Services</a></li>
              <li><a class="link-btn" href="#offers">Offers</a></li>
              <li><a class="link-btn" href="#feedback">Feedback</a></li>
              <li><a class="link-btn" href="#connect_with_us">Contact</a></li>
            </ul>
          </div>
          <div id="sidenav-body" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#about" onclick="closeNav()">About</a>
            <a href="#services" onclick="closeNav()">Services</a>
            <a href="#offers" onclick="closeNav()">Offers</a>
            <a href="#feedback" onclick="closeNav()">Feedback</a>
            <a href="#connect_with_us" onclick="closeNav()">Contact</a>
          </div>
          <div id="sidenav-burger">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
          </div>
        </div>
      </nav>
      <h1 class="h1"><?php echo $header_main_txt; ?></h1>
      <span id="header-span"><?php echo $header_sub_txt; ?></span>
    </header>
    
    <section id="about" class="section">
      <div class="white-space"></div>
      <div class="about-content" data-aos="fade-right" data-aos-duration="2000">
        <h2 class="h2">About Us</h2>
        <p class="p-center">
          <?php echo $about_txt; ?>
        </p>
      </div>
      <div class="white-space"></div>
    </section>

    <section id="services" class="section">
      <div class="white-space"></div>
      <div class="services-content" data-aos="fade-up" data-aos-duration="2000">
        <h2 class="h2">Services</h2>
        <div id="services-content-holder">

          <?php $result = $mysqli->query("SELECT * FROM services_tbl") or die($mysqli->error());?>
          <?php $countPerRow = 4; ?>
          <?php $countServices = mysqli_num_rows($result); ?>
          <?php $countTotal = intdiv($countServices, $countPerRow); ?>
          <?php $countTotalDivide = $countServices / $countPerRow; ?>
          <?php if($countTotal < $countTotalDivide) { ?>
            <?php $countTotal += 1; ?>
          <?php } else { ?>
            <?php $countTotal = $countTotalDivide; ?>
          <?php } ?>
          <?php $array = array(); ?>
          <?php $ctr = 0; ?>
          <?php while($row = $result->fetch_assoc()) { ?>
            <?php $array[$ctr] = $row; ?>
            <?php $ctr++; ?>
          <?php } ?>
          <?php $ctr = 0; ?>

          <?php for($i = 1; $i <= $countTotal; $i++) { ?>
            <div class="services-content-main-holder">  
                <?php for($j = 1; $j <= $countPerRow; $j++) { ?>
                  <?php if($ctr < $countServices) { ?>
                    <div class="services-content-main">
                      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($array[$ctr]["services_img"]).'" style="width: 40px; height: 40px;" />'; ?>
                      <h5 class="h5"><?php echo $array[$ctr]["services_name"]; ?></h5>
                    </div>
                  <?php } else { ?>
                    <div class="services-content-main"></div>
                  <?php } ?>
                  <?php $ctr++; ?>
                <?php } ?>
            </div>
          <?php } ?>

        </div>
      </div>
      <div class="white-space"></div>
    </section>
    
    <section class="extra-section" class="section">
      <div style="background: url(<?php echo $services_extra_img; ?>); padding: 0; margin: 0; width: 100%; height: 350px; background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover; overflow: hidden;">
        <div id="services-content-extra-holder">
          <h1 id="services-content-header" class="h1" data-aos="fade-up" data-aos-duration="2000">
            <?php echo $services_extra_main_txt; ?>
          </h1>
          <p id="services-content-p" class="p-center p-color-inverted"  data-aos="fade-up" data-aos-duration="2500">
            <?php echo $services_extra_sub_txt; ?>
          </p>
        </div>
      </div>
    </section>

    <section id="offers" class="section">
      <div class="white-space"></div>
      <div class="offers-content">
        <h2 class="h2 h-color-inverted" data-aos="fade-down" data-aos-duration="2000">Offers</h2>
        <div id="offers-content-holder" data-aos="fade-up" data-aos-duration="2500">

          <?php $result = $mysqli->query("SELECT * FROM offers_tbl") or die($mysqli->error());?>
          <?php $countPerRow = 3; ?>
          <?php $countOffers = mysqli_num_rows($result); ?>
          <?php $countTotal = intdiv($countOffers, $countPerRow); ?>
          <?php $countTotalDivide = $countOffers / $countPerRow; ?>
          <?php if($countTotal < $countTotalDivide) { ?>
            <?php $countTotal += 1; ?>
          <?php } else { ?>
            <?php $countTotal = $countTotalDivide; ?>
          <?php } ?>
          <?php $array = array(); ?>
          <?php $ctr = 0; ?>
          <?php while($row = $result->fetch_assoc()) { ?>
            <?php $array[$ctr] = $row; ?>
            <?php $ctr++; ?>
          <?php } ?>
          <?php $ctr = 0; ?>
          
          <?php for($i = 1; $i <= $countTotal; $i++) { ?>
            <div class="offers-content-main-holder">
              <?php for($j = 1; $j <= $countPerRow; $j++) { ?>
                <?php if($ctr < $countOffers) { ?>
                  <div class="offers-content-main">
                    <?php $array[$ctr]["offers_img"] = 'data:image/png;base64,'.base64_encode($array[$ctr]['offers_img']);?>
                    <div class="offers-content-main-img" style="background: url(<?php echo $array[$ctr]["offers_img"]; ?>); padding: 0; margin: 0; width: 100%; height: 180px; background-position: center; background-repeat: no-repeat; background-size: cover;">
                    </div>
                    <div>
                      <h5 class="h5 padding-top-10"><?php echo $array[$ctr]["offers_name"]; ?></h5>
                    </div>
                    <div class="padding-left-and-right-10 overflow-x-hidden-y-scroll">
                      <?php echo $array[$ctr]["offers_desc"]; ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="offers-content-main" style="border: none;"></div>
                <?php } ?>
                <?php $ctr++; ?>
              <?php } ?>
            </div>
          <?php } ?>

        </div>
      </div>
      <div class="white-space"></div>
    </section>

    <section id="feedback" class="section">
      <div class="white-space"></div>
      <div id="feedback-content">
        <h2 class="h2" data-aos="fade-left" data-aos-duration="2000">Feedback</h2>

        <div class="slideshow-container">
          <?php $resultFeedback = $mysqli->query("SELECT * FROM feedback_tbl") or die($mysqli->error());?>
          <?php $countFeedback = mysqli_num_rows($resultFeedback); ?>
          <?php while($row = $resultFeedback->fetch_assoc()) {?>
            <?php $feedback_txt = $row['feedback_txt']; ?>
            <?php $feedback_from = $row['feedback_from']; ?>
            <div class="mySlides">
              <q class="feed_back_quote">
                <?php echo $feedback_txt; ?>
              </q>
              <p class="author">- <?php echo $feedback_from; ?></p>
            </div>
          <?php } ?>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>
        </div>

        <div class="dot-container" style="display: none;">
          <?php for($i = 1; $i <= $countFeedback; $i++) { ?>
            <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span> 
          <?php } ?>
        </div>
      </div>
      <div class="white-space"></div>
    </section>

    <section id="connect_with_us" class="section">
      <div class="white-space"></div>
      <div id="form-holder">
        <h2 class="h2 txt-align-center" data-aos="fade-right" data-aos-duration="2000">
          Connect with us
        </h2>
        <form id="form-main" action="process/send_msg.php" method="post">
          <input type="text" name="inbox_from" id="inbox_from" class="input input-width-100 padding-20 margin-top-bottom-5" placeholder="Name" required>
          <input type="text" name="inbox_contact" id="inbox_contact" class="input input-width-100 padding-20 margin-top-bottom-5" placeholder="Email or phone" required>
          <textarea rows="5" cols="50" name="inbox_txt" class="textarea textarea-message padding-20 margin-top-bottom-5" placeholder="Message" required></textarea>
          <input type="submit" name="send" id="send" value="SEND" class="btn btn-positive btn-width-100 padding-10"/>  
        </form>
      </div>
      <div class="white-space"></div>
    </section>

    <footer id="contact" class="footer">
      <div id="contact-info" data-aos="fade-right" data-aos-duration="2500">
        <div id="contact-info-header">
          <h3 class="h3 h-color-inverted">Contact Us</h3>
        </div>
        <div>
          <img src="images/icons/contact.png" alt="phone icon">
          <span class="span-color-inverted"><?php echo $contact_email; ?></span>
        </div>
        <div>
          <img src="images/icons/email.png" alt="email icon">
          <span class="span-color-inverted"><?php echo $contact_num; ?></span>
        </div>
      </div>
      <div id="contact-copyright">
        <p class="p-center p-color-inverted">
          Copyright ©2019 All rights reserved | KTA Travel and Tours
        </p>
      </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/aos_init.js"></script>
    <script src="js/side_nav.js"></script>
    <script src="js/sticky_nav.js"></script>
    <script src="js/goto_scroll.js"></script>
    <script src="js/change_nav_on_scroll.js"></script>
    <script src="js/set_active_link.js"></script>
    <script src="js/text_carousel.js"></script>
  </body>
</html>
