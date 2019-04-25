<?php
session_start();
if(!isset($_SESSION['sess_campus'])){
  echo 'fail';
    header("location:viewInstitute.php");
} else {
?>
      <?php
      $cid =  $_SESSION['sess_campus'];
      if(isset($_POST["submit"])){
      if(!empty($_POST['id'])  && !empty($_POST['seats']) && !empty($_POST['cutoff']) && !empty($_POST['name']) ) {
          $id=$_POST['id'];
          $seats=$_POST['seats'];
          $cutoff=$_POST['cutoff'];
          $name=$_POST['name'];
          $con=mysqli_connect('localhost','root','') or die(mysqli_error());
          mysqli_select_db($con, 'bitsat') or die("cannot select DB");

          $sql=mysqli_query($con,"SELECT * FROM collegebranch WHERE branchid='".$id."' AND collegeid='".$cid."'");

          $numrows=mysqli_num_rows($sql);
          if($numrows == 0)
          {
            echo $cid;
            echo $id;

            $sq="INSERT INTO collegebranch(CollegeID, BranchID, TotalSeats, OccupiedSeats, Cutoff, BranchName) VALUES ('$cid','$id','$seats','0','$cutoff', '$name')";
            $result=mysqli_query($con,$sq);
            if($result) {
              echo "Branch Added";
              $_SESSION['sess_branch'] = $id;
              header("Location: updatePrefList.php");
            }
            else {
              echo "Failure";
            }
          } else {
          echo "Branch in that college already exists";
          }

      } else {
          echo "Please enter all fields";
      }
      }
      ?>
      <?php
      if(isset($_POST["back"])){
        header("Location: Institute.php");
      }
      ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <title>BITSAT Allotment Portal &mdash; DBS Project</title>
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
                <div class="site-logo mr-auto w-25"><a href="index.html">BITSAT Allotment Portal</a></div>

                <div class="mx-auto text-center">
                  <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                      <li><a href="index.html#home-section" class="nav-link">Home</a></li>
                      <li><a href="index.html#courses-section" class="nav-link">Campuses</a></li>
                      <li><a href="index.html#programs-section" class="nav-link">About BITS</a></li>
                      <li><a href="index.html#teachers-section" class="nav-link">Our Team</a></li>
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

            <div class="slide-1" style="background-image: url('images/addbran.jpg');" data-stellar-background-ratio="0.5">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-12">
                    <div class="row align-items-center">
                      <div class="col-lg-6 mb-4">
                        <h1  data-aos="fade-up" data-aos-delay="100">Add Branch</h1>
                        <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Enter Details of branch to be added</p>
                        <form method="POST" action = "">
                        <p data-aos="fade-up" data-aos-delay="300"><input class="btn btn-primary py-3 px-5 btn-pill" type="submit" value="Back" name="back" /></p>
                      </form>
                      </div>


                      <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                        <form action="" method="post" class="form-box">
                          <h3 class="h4 text-black mb-4">Add Branch</h3>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Branch Name" name="name">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Branch ID" name="id">
                          </div>
                          <div class="form-row">
                              <div class="form-group col-lg-6">
                                <input type="number" class="form-control" placeholder="Total Seats" name="seats">
                              </div>
                              <div class="form-group col-lg-6">
                                <input type="number" class="form-control" placeholder="Previous Cutoff" name="cutoff">
                              </div>
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-pill" value="Add Branch" name="submit">
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

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
<?php
}

?>
