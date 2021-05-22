<?php 
$conn=mysqli_connect('localhost','root','','crime_rate');
if($conn){
 }
 else echo "error";
$complaintid=$_GET['c_id'];

$query="SELECT * from complaint_db WHERE complaint_id='$complaintid'";
$result=mysqli_query($conn,$query);
$array=mysqli_fetch_assoc($result); 

if(isset($_POST["update"])) { 
 $status=$_POST["status"];
 $query1="UPDATE complaint_db SET status='$status' WHERE complaint_id='$complaintid'";
  if(mysqli_query($conn,$query1)){
    echo "<script>alert('Complaint Status Updated Successfully')</script>";
    header('Location:compl-status-updater.php');
  }
  else{
    echo "<script>alert('Error in Updating Complaint Status')</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status Updater</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/details.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome-free-5.15.1-web\css\all.css">
</head> 
<body>
    <!--Navigation Bar--> 
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <a class="navbar-brand pl-5" href="#">
          <img src="../img/home/logo.jpg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy">
          A.J.M.G
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link pr-5" href="../admin-home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pr-5" href="#">Analysis</a>
            </li>
            <li class="nav-item dropdown active pr-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin Panel
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="admin-verification.php">Verify admin</a>
                  <a class="dropdown-item" href="complaint-approval.php">Complaint Approval</a>
                  <a class="dropdown-item" href="compl-status-updater.php">Complaint Status</a>
                </div>
            </li> 
            <li class="nav-item dropdown pr-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../admin-settings.php">Account Settings</a>
                  <a class="dropdown-item" href="../login-ua.html">Log out</a>
                </div>
            </li> 
            <li class="nav-item">
                <a class="nav-link pr-5" href="#">Prediction</a>
            </li>
          </ul>
        </div>
      </nav>
    <!--END of Navigation Bar-->

    <!-- START OF APPROVAL DETAIL SECTION-->
    <section class="approval-details">
        <div class="container py-5 px-3">
            <div class="heading text-center py-5 mt-4">
                <h1>Complaint Details</h1>
            </div>
            <div class="details">
                <h2 class="py-2">Personal Details</h2>
                <hr>
                <br>
                <h3>Complaint#</h3>
                <p class="complaint-no"><?php echo $array['complaint_id']; ?></p>
                <br>
                <h4>Name : <span class="value"><?php echo $array['full_name']; ?></span></h4>
                <br>
                <h4>Email-id : <span class="value"><?php echo $array['email']; ?></span></h4>
                <br>
                <h4>Phone : <span class="value"><?php echo $array['phone']; ?></span></h4>
                <br>
                <h4>Address : <span class="value"><?php echo $array['address']; ?></span></h4>
                <br>
                <h4>Aadhar Card No: <span class="value"><?php echo $array['aadharnum']; ?></span></h4>
                <br>
                <hr><br>
                <h2 class="py-4">Crime Details</h2>
                <hr>
                <br>
                <h3>Categoery</h3>
                <p class="categoery"><?php echo $array['crime_category']; ?></p>
                <br>
                <h4>Date : <span class="value"><?php echo $array['crime_day'].'/'.$array['crime_month'].'/'.$array['crime_year']; ?></span></h4>
                <br>
                <h4>District : <span class="value"><?php echo $array['crime_district']; ?></span></h4>
                <br>
                <h4>State : <span class="value"><?php echo $array['crime_state']; ?></span></h4>
                <br>
                <h4>Discription : </h4>
                <p class="discription"><?php echo $array['complaint_detail']; ?></p>
                <br><br><br>
                <h4>Cuurent Status : </h4>
                <p class="categoery"><?php echo $array['status']; ?></p>
            </div>
            <form action="" method="POST">
                <div class="row py-2">
        					<div class="form-group col-lg-6">
                    <label for="area" class="py-1">New Case Status</label>
                      <select class="form-control py-1" name="status">
                        <option selected></option>
                        <option value="Investigating">Investigating</option>
                        <option value="Case Closed">Case Closed</option>
                      </select>
                  </div>
				        </div>
                <div class="row">
                    <input type="submit" name="update" class="btn-approve mx-2" value="Update"/>
                </div>
            </form>
            <br>
        </div>
    </section>
    <!-- END OF APPROVAL DETAIL SECTION-->


    <!-- START OF Footer -->
    <footer class="bg-light text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #3b5998; border-radius: 50%;border-color:#3b5998;"
              href="#!"
              role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #55acee; border-radius: 50%; border-color:#55acee;"
              href="#!"
              role="button"
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #dd4b39; border-radius: 50%; border-color:#dd4b39;"
              href="#!"
              role="button"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #ac2bac; border-radius: 50%;border-color:#ac2bac;"
              href="#!"
              role="button"
              ><i class="fab fa-instagram"></i
            ></a>
      
            <!-- Linkedin -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #0082ca; border-radius: 50%;border-color:#0082ca;"
              href="#!"
              role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #333333; border-radius: 50%;border-color:#333333;"
              href=""
              role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color:#f0f0f0; color: #19b6cf; font-weight: 600;">
          © 2020 Copyright: AJMG.com       
        </div>        
    </footer>
    <!--END OF Footer-->

    
    <script src="../bootstrap-4/js/jquery-3.5.1.slim.min.js"></script>  
    <script src="../bootstrap-4/js/popper.min.js"></script> 
    <script type="text/javascript" src="../bootstrap-4/js/bootstrap.min.js"></script>
</body> 
</html>