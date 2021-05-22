<?php 
$conn=mysqli_connect('localhost','root','','crime_rate');
if($conn){
 }
 else echo "error";



$query="SELECT * from admin_db where account_status='Unverified'";
$result=mysqli_query($conn,$query);
$array=mysqli_fetch_all($result,MYSQLI_ASSOC); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Verification-Admin Panel</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap-4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/admin-panel.css">
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
    
    
    <!--START of Approval Table -->
    <section class="approval-section">
        <div class="container py-5">
            <div class="heading text-center py-5 mt-4">
                <h1>Admin Verification</h1>
            </div>
            <table class="table table-striped approval-table my-5">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Police ID No:</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <?php foreach($array as $ind){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $ind['admin_id']; ?></td>
                    <td><?php echo $ind['fullname']; ?></td>
                    <td><?php echo $ind['police_id']; ?></td>
                    <td><a href="verification-detail.php?view_id=<?php echo $ind['admin_id']; ?>">View Details</a></td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
        </div>
    </section>

    <!--END of Approval Table-->

    
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