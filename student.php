<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student &mdash;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.html">BITSAT Allocation Portal</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Campuses</a></li>
                <li><a href="#programs-section" class="nav-link">About BITS</a></li>
                <li><a href="#teachers-section" class="nav-link">Our Team</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/bits.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Welcome Student</h1>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="PreferenceList.php" class="btn btn-primary py-3 px-5 btn-pill">My Preferences</a><a href="allotment.php" class="btn btn-primary py-3 px-5 btn-pill" style="margin-left:15px;">My Allotment</a></p>
                <form action="" method="POST">
                  <p data-aos="fade-up" data-aos-delay="300"><input type="submit" value="Withdraw" name="withdraw" class="btn btn-danger py-3 px-5 btn-pill"/></p>
                </form>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="" method="post" class="form-box">



    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "bitsat";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $user = $_SESSION['sess_user'];
      $sql = "select Name, Rank,MarksPhy,MarksChem,MarksMath from Student WHERE RegNo = $user";

      $result = $conn->query($sql);
      $row = mysqli_fetch_row($result);
      echo "Name: ".$row[0]."<br>";
      echo "Rank: ".$row[1]."<br>";
      echo "Physics: ".$row[2]."<br>";
      echo "Chemistry: ".$row[3]."<br>";
      echo "Math: ".$row[4]."<br>";

      $_SESSION['sess_name']=$row[0];
    ?>

    <?php
    if(isset($_POST["pref"])){
      header("Location: PreferenceList.php");
    }
    ?>
    <?php
    if(isset($_POST["allot"])){
      header("Location: allotment.php");
    }
    ?>
    <?php
    if(isset($_POST["withdraw"])){
      $_SESSION['with_user'] = $user;
      header("Location: Withdraw.php");
    }
    ?>
<?php
}
?>
</form>

</div>
</div>
</div>

</div>
</div>
</div>
</div>


<div class="site-section courses-title" id="courses-section">
<div class="container">
<div class="row mb-5 justify-content-center">
<div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
<h2 class="section-title">Campuses</h2>
</div>
</div>
</div>
</div>
<div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100" style="margin-bottom:10px">
<div class="container">
<div class="row">

<div class="owl-carousel col-12 nonloop-block-14">

<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/bitsp.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<!--<span class="course-price">$20</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>-->
<h3><a href="https://www.bits-pilani.ac.in/Pilani/">BITS Pilani Pilani Campus</a></h3>
<p>This is the original and our oldest campus boasting of over 50 years of heritage.</p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 3,500 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>
</div>

<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/bitsg.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<!--<span class="course-price">$99</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>-->
<h3><a href="https://www.bits-pilani.ac.in/Goa/">BITS Pilani Goa Campus</a></h3>
<p>Established in 2006, BPGC is known for it's beautiful scenery and excellent coding culture</p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 3,000 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>
</div>

<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/bitsh.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<!--  <span class="course-price">$99</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div> -->
<h3><a href="https://www.bits-pilani.ac.in/hyderabad/">BITS Pilani Hyderabad Campus</a></h3>
<p>Established in 2008, BPHC is our newest campus and has the biggest strength among all three campuses. </p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 4,500 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>
</div>



<!--<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<span class="course-price">$20</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
<h3><a href="#">Study Law of Physics</a></h3>
<p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>
</div>

<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/img_5.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<span class="course-price">$99</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
<h3><a href="#">Logo Design Course</a></h3>
<p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>
</div>

<div class="course bg-white h-100 align-self-stretch">
<figure class="m-0">
<a href="course-single.html"><img src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
</figure>
<div class="course-inner-text py-4 px-4">
<span class="course-price">$99</span>
<div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
<h3><a href="#">JS Programming Language</a></h3>
<p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
</div>
<div class="d-flex border-top stats">
<div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
<div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
</div>-->
</div>

</div>



<!--</div>
<div class="row justify-content-center">
<div class="col-7 text-center">
<button class="customPrevBtn btn btn-primary m-1">Prev</button>
<button class="customNextBtn btn btn-primary m-1">Next</button>
</div>
</div>-->
</div>
</div>


<div class="site-section" id="programs-section">
<div class="container">
<div class="row mb-5 justify-content-center">
<div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
<h2 class="section-title"></h2>
<p>Birla Institute of Technology & Science, Pilani (shortened BITS Pilani or BITS) is a private institute of higher education and a deemed university under Section 3 of the UGC Act 1956. The institute is one among the 6 Indian 'Institutes of Eminence' recognized by the Government of India in 2018.</p>
</div>
</div>
<div class="row mb-5 align-items-center">
<div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
<img src="images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid">
</div>
<div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
<h2 class="text-black mb-4">We Always Keep Up The Latest Technological Advancements</h2>
<p class="mb-4">We are one of the few Universities in India which are Impartus-enabled for the convenience of students.</p>

<div class="d-flex align-items-center custom-icon-wrap mb-3">
<span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
<div><h3 class="m-0">Over 10,000 hours of video content</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap">
<span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
<div><h3 class="m-0">150+ courses branch-wise</h3></div>
</div>

</div>
</div>

<div class="row mb-5 align-items-center">
<div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
<img src="images/undraw_teaching.svg" alt="Image" class="img-fluid">
</div>
<div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
<h2 class="text-black mb-4">We Always Hire The Best</h2>
<p class="mb-4">All our faculties are extremely qualified which shows our no compromise approach towards quality.</p>

<div class="d-flex align-items-center custom-icon-wrap mb-3">
<span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
<div><h3 class="m-0">400+ Teaching Staff</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap">
<span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
<div><h3 class="m-0">100+ Ph.D students</h3></div>
</div>

</div>
</div>

<div class="row mb-5 align-items-center">
<div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
<img src="images/undraw_teacher.svg" alt="Image" class="img-fluid">
</div>
<div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
<h2 class="text-black mb-4">Environment Is Everything</h2>
<p class="mb-4">BITS offers the best facilities to students in order to help them achieve their true potential.</p>

<div class="d-flex align-items-center custom-icon-wrap mb-3">
<span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
<div><h3 class="m-0">300+ Student Support Staff</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap">
<span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
<div><h3 class="m-0">Female Staff for Girls</h3></div>
</div>

</div>
</div>

</div>
</div>

<div class="site-section pb-0">

<div class="future-blobs">
<div class="blob_2">
<img src="images/blob_2.svg" alt="Image">
</div>
<div class="blob_1">
<img src="images/blob_1.svg" alt="Image">
</div>
</div>
<div class="container">
<div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
<div class="col-lg-7 text-center">
<h2 class="section-title">Courses We offer</h2>
</div>
</div>
<div class="row">
<div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

<div class="p-4 rounded bg-white why-choose-us-box">

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Computer Science Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Electronics and Communication Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Electrical and Electronics Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Electronics and Instrumentation Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Mechanical Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Civil Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
<div><h3 class="m-0">Chemical Engineering</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">MSc. Biological Sciences</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">Msc. Chemistry</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">Msc. Economics</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">MSc. Mathematics</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">Msc. Physics</h3></div>
</div>

<div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
<div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
<div><h3 class="m-0">B. Pharma</h3></div>
</div>

</div>


</div>
<div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
<img src="images/person_transparent.png" alt="Image" class="img-fluid">
</div>
</div>
</div>
</div>


<div class="site-section" id="teachers-section">
<div class="container">

<div class="row mb-5 justify-content-center">
<div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
<h2 class="section-title">Our Team</h2>
<p class="mb-5">We are 5 people who decided to implement a databse that everyone here has interacted with.</p>
</div>
</div>

<div class="row">

<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
<div class="teacher text-center">
<img src="images/neal.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
<div class="py-2">
<h3 class="text-black">Neal Menon</h3>
<p class="position">2017A7PS1219H</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
<div class="teacher text-center">
<img src="images/rynaa.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
<div class="py-2">
<h3 class="text-black">Rynaa Grover</h3>
<p class="position">2017A7PS0258H</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
<div class="teacher text-center">
<img src="images/siva.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
<div class="py-2">
<h3 class="text-black">Sivaramakrishnan KN</h3>
<p class="position">2017A7PS0153H</p>
</div>
</div>
</div>
</div>
<div class="row" style="vertical-align:middle">

<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
<div class="teacher text-center">
<img src="images/jaya.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
<div class="py-2">
<h3 class="text-black">Jaya Venkatesh</h3>
<p class="position">2017A7PS0015H</p>
</div>
</div>
</div>

<div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
<div class="teacher text-center">
<img src="images/koushik.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
<div class="py-2">
<h3 class="text-black">Koushik Swaminathan</h3>
<p class="position">2017A7PS0192H</p>
</div>
</div>
</div>

</div>
</div>
</div>

<div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-md-8 text-center testimony">
<img src="images/lov.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle" style="margin-right:15px";>
<img src="images/jabez.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
<h3 class="mb-4">Our Professors</h3>
<blockquote>
<p>&ldquo; We would like to thank our respected professors without whom this project would not have been possible. &rdquo;</p>
</blockquote>
</div>
</div>
</div>
</div>






<!--<div class="site-section bg-light" id="contact-section">
<div class="container">

<div class="row justify-content-center">
<div class="col-md-7">



<h2 class="section-title mb-3">Message Us</h2>
<p class="mb-5">Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.</p>

<form method="post" data-aos="fade">
<div class="form-group row">
<div class="col-md-6 mb-3 mb-lg-0">
<input type="text" class="form-control" placeholder="First name">
</div>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="Last name">
</div>
</div>

<div class="form-group row">
<div class="col-md-12">
<input type="text" class="form-control" placeholder="Subject">
</div>
</div>

<div class="form-group row">
<div class="col-md-12">
<input type="email" class="form-control" placeholder="Email">
</div>
</div>
<div class="form-group row">
<div class="col-md-12">
<textarea class="form-control" id="" cols="30" rows="10" placeholder="Write your message here."></textarea>
</div>
</div>

<div class="form-group row">
<div class="col-md-6">

<input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message">
</div>
</div>

</form>
</div>
</div>
</div>
</div>-->


<footer class="footer-section bg-white">
<div class="container">
<div class="row">
<div class="col-md-4">
<h3>About Our Project</h3>
<p>This Project aims to emulate the allotment process for the prestigious BITSAT examination.</p>
</div>

<div class="col-md-3 ml-auto">
<h3>Links</h3>
<ul class="list-unstyled footer-links">
<li><a href="#home-section">Home</a></li>
<li><a href="#courses-section">Campuses</a></li>
<li><a href="#programs-section">About BITS</a></li>
<li><a href="#teachers-section">Our Team</a></li>
</ul>
</div>

<!--<div class="col-md-4">
<h3>Subscribe</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
<form action="#" class="footer-subscribe">
<div class="d-flex mb-5">
<input type="text" class="form-control rounded-0" placeholder="Email">
<input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
</div>
</form>
</div>-->

</div>


</div>
</footer>



</div> <!-- .site-wrap -->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>


<script src="js/main.js"></script>

</body>
</html>
