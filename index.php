<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MediCare</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"> 

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">MediCare</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#work">File Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#blog">Hospital<menu type="toolbar"></menu></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">Hello <span><!--Mohith Suggala--><?php echo $_SESSION["name"]; ?><span></h1>
          
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="box-shadow-full">

        <h1 class="title-a" align="center">About</h1>
        <h3 align="center">User Details</h3>
        <table border="2" align="center">
          <tr>
            <th>Name</th>
            <th>Aadhar Number</th>
          </tr>
          <tr>
            <td><?php echo $_SESSION["name"]; ?></td>
            <td><?php echo $_SESSION["aadhar"]; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </section>

  <br><br>

  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Medical History
            </h3>
            <p class="subtitle-a">
              Here, you can access your past medical history.
            </p>
            <div class="line-mf"></div>
          </div>

          <div class="box-shadow-full"> <!--field-->
            <div class="service-content">
              <h2 class="s-title" align="center">Enter Date to download files !!</h2><br>
              <div>

                <table border="2px" align="center">
                <form action="download.php" method="post">
                  <tr>
                    
                    <th><b>Date</b></th>
                    <th><b>Search for the File</b></th>
                  </tr>
                  <tr>
                    <td><input type="date" name="download_date" required></td>
                    <td><button input type="submit" value="Download File" name="submit">DOWNLOAD FILE</button></td>
                  </tr>

                </form>
              </table>  


              </div>
            </div>

            <br>
            <!--<div>
              <h2 class="s-title" align="center">Medical History displayed here !!!</h2>
              <table border="2px" align="center">
                
      
              </table>
            </div>-->
            
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--/ Section History End /-->


  <!--/ Section File Upload Star /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              File Upload
            </h3>
            <p class="subtitle-a">
              Here, You can upload your medical reports in pdf format.
            </p>
            <div class="line-mf"></div>

            <br>

            <div class="box-shadow-full"> <!--field-->
              <!--
                Here you need to get code to upload file
              -->
              <h1>Here You can Upload Files</h1><br>
              <table border="2px" align="center">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                  <tr>
                    
                    <th><b>Date</b></th>
                    <th><b>Prescription</b></th>
                  </tr>
                  <tr>
                    <td><input type="date" name="upload_date" required></td>
                    <td><input type="file" name="fileToUpload" required></td>
                  </tr>

                  <tr>
                    <td colspan="2"><button input type="submit" value="Upload File" name="submit">UPLOAD FILE</button></td>
                  </tr>

                </form>
              </table>

              <br><br>
              <!-- For Deletion of File-->
              <h1>Here You can delete your Records</h1><br>
              <table border="2px" align="center">
                <form action="delete.php" method="post">
                  <tr>
                    
                    <th><b>Date to Delete ! </b></th>
                  </tr>
                  <tr>
                    <td><input type="date" name="delete_date" required></td>
                  </tr>

                  <tr>
                    <td colspan="2"><button input type="submit" value="Delete File" name="submit">DELETE FILE</button></td>
                  </tr>

                </form>
              </table>
            </div>

          </div>

        </div>
      </div>

    </div>
  </section>

  <!--/ Section Hospitals  /-->
  <section id="blog" class="blog-mf sect-pt4 route">

    <div class="container">
      <div class="box-shadow-full">
          <h1 align="center">
            <b>Hospitals Near Me !!</b>
          </h1><br>
          
          <p>You can search for the best hospitals which are certified by All India Institute Of Medical Sciences - AIIMS.
            You can get good support and assistance from this list of hospitals shown below at any emergency in no-time.
          </p>
          
          <br><br><br>

          <script>
          function showHint(str) 
          {
            if (str.length == 0) {
              document.getElementById("txtHint").innerHTML = "";
              return;
            } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET", "gethint.php?q=" + str, true);
              xmlhttp.send();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
                }
              }; 
            }
          }
          </script>
          </div>

      </div>
    </div>


    <div>
      <h4 style="text-align:center">This website was made by <span style="color:crimson;">Thakshith</span></h4>
    </div>
    <br><br><br><br><br>
  </section>
  <!--/ Section Blog End / -->

  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> 
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
