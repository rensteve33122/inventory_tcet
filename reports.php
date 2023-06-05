<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  

  


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Inventory & borrowing Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">
  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- others css -->
  <link rel="stylesheet" href="assets/css/typography.css">
  <link rel="stylesheet" href="assets/css/default-css.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- modernizr css -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- preloader area start -->
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  <!-- page container area start -->
  <div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
      <div class="sidebar-header">
        <div class="logo">
          <a href="index.php"><img src="images/tcet.png" alt="logo"></a>
        </div>
      </div>
      <div class="main-menu">
        <div class="menu-inner">
          <nav>
            <ul class="metismenu" id="menu">
            <li>
            <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            
                            </li>
                            
                                 <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                  <span>Item Records</span></a>
                    
                                  <li>
                                <a href="itemreports.php" aria-expanded="true"><i class="bi bi-archive-fill"></i>
                                    <span>Item Reports</span></a>
                             

                                    <li>
                                <a href="student.php" aria-expanded="true"><i class="bi bi-person-plus-fill"></i>
                                    <span>Borrow</span></a>
                        
                        
                                <li>
                                 <a href="return.php" aria-expanded="true"><i class="bi bi-arrow-return-left"></i>
                                    <span>Return</span></a>
                                    <li class="active">
                                  <a href="reports.php" aria-expanded="true"><i class="bi bi-archive-fill"></i>
                                    <span>Reports</span></a>
                                   </li>
                        </li>

        </ul>
      </nav>
    </div>
  </div>
</div>
        <!-- sidebar menu area end -->


        
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                     
                    </div>
                    
                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">
                        
                    </div>
                </div>
            </div>
            
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Reports</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                
                               <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
           
  

        <!-- Contextual Classes start -->
        <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Borrowed History</h4>
        </div>
        <div class="card-body">
            <form method="post" action="" class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" name="search" placeholder="Search by name or student number" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <button type="submit"  class="btn btn-primary mx-2" name="submit-search">Search</button>
                        <a href="csv.php?search=<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>" class="btn btn-primary mx-2">Download CSV</a>

                    </div>
                </div>
            </form>
            <div class="table-responsive mt-4">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">First name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Student Number</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Model</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Date Borrowed</th>
                            <th scope="col">Item Return Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "inventorymanagement");
                    $search = isset($_POST['search']) ? $_POST['search'] : '';
                    $sql = "SELECT * FROM logs WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR studentnumber LIKE '%$search%'";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $count = $count + 1;
                            ?>
                            <tr>
                            
                                <td><?php echo $row["firstname"] ?></td>
                                <td><?php echo $row["lastname"] ?></td>
                                <td><?php echo $row["studentnumber"] ?></td>
                                
                                <td><?php echo $row["product_name"] ?></td>
                                <td><?php echo $row["Model"] ?></td>
                                <td><?php echo $row["serialnumber"] ?></td>
                                <td><?php $date_obj = new DateTime($row["date"]); $date_str = $date_obj->format('m/d/Y');
                                echo $date_str; ?></td>
                                <td><?php $date_obj = new DateTime($row["returndate"]); $date_str = $date_obj->format('m/d/Y');
                                echo $date_str; ?></td>
                                
                             
                                <td>
                                    <div class="btn-group">
                                        
                                    <a href="deletereport.php?id=<?php echo $row["product_id"] ?>" class="btn btn-sm btn-danger">Delete data</a>

                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">No results found.</td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!-- Contextual Classes end -->
        <!-- main content area end -->
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

</html>
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
