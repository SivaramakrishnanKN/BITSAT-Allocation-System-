<?php
    if(isset($_POST["submit"])){
        if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['id']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty($_POST['phy']) && !empty($_POST['chem']) && !empty($_POST['math'])) {
            $name=$_POST['name'];
            $pass=$_POST['pass'];
            $id=$_POST['id'];
            $email=$_POST['email'];
            $dob=$_POST['dob'];
            $phy=$_POST['phy'];
            $chem=$_POST['chem'];
            $math=$_POST['math'];
            $total = $math+$phy+$chem;
            $con=mysqli_connect('localhost','root','') or die(mysqli_error());
            mysqli_select_db($con, 'bitsat') or die("cannot select DB");

            $query=mysqli_query($con,"SELECT * FROM Student WHERE regno='".$id."'");
            $numrows=mysqli_num_rows($query);
            if($numrows==0) {
                $sql="INSERT INTO student(RegNo, Name, Email, Password, DOB, MarksPhy, MarksChem, MarksMath, Total) VALUES ('$id','$name', '$email', '$pass', '$dob', '$phy', '$chem', '$math', '$total')";

                $result=mysqli_query($con,$sql);
                if($result){
                    echo "Account Successfully Created";
                    include 'rank.php';

                } else {
                    echo "Failure!";
                    echo $result;
                }

            } else {
                echo "That Registration number already exists! Please try again with another.";
            }

        } else {
            echo "All fields are required!";
        }
    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <title>BITSAT Allocation Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <style>

            .jumbotron {
                background-image: url(BITSJumbo.jpg);
                text-align: center;
                text-decoration-color: white;
                margin-top: 50px;
                background-size: cover;
            }

            form {
                position: relative;
                text-align: left;
            }

            #register {
                margin-top: 20px;
            }

        </style>

    </head>

    <body data-spy="scroll" data-target="#navbar" data-offset="150">

        <nav class="navbar navbar-light bg-faded navbar-fixed-top" id="navbar">
            <a class="navbar-brand" href="#">BITSAT Allocation Portal</a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#jumbotron">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="PreferenceList.php">My Preferences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            <form class="form-inline pull-xs-right">
                <small>Already registered?</small>
                <a href="Register.php" class="btn btn-success" type="submit">Login</a>
            </form>
        </nav>

        <div class="jumbotron" id="jumbotron">
            <h1 class="display-3">BITSAT Preferences Allocation Portal</h1>
            <p class="lead">Welcome! Enter your details and unlock your future.</p>
            <hr class="m-y-2">
            <p>Some additional text here</p>
        </div>

        <div class="container">

            <div class="row">
                <fieldset>
                    <form method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Registration Number</label>
                                <input type="number" class="form-control" id="inputPassword4" placeholder="Registraion Number">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label for="marks">Physics</label>
                                <input type="number" class="form-control"  name="chem" placeholder="Marks scored in Physics">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="marks">Chemistry</label>
                                <input type="number" class="form-control" name="chem" placeholder="Marks scored in Chemistry">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="marks">Math</label>
                                <input type="number" class="form-control" name="math" placeholder="Marks scored in Math">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary" id="register">Register</button>
                    </form>
                </fieldset>
            </div>

        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

    </body>

</html>