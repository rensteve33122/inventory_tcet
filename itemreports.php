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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
                        </li>

                        <li class="active">
                                <a href="itemreports.php" aria-expanded="true"><i class="bi bi-archive-fill"></i>
                                    <span>Item Reports</span></a>

                        <li>
                            <a href="student.php" aria-expanded="true"><i class="bi bi-person-plus-fill"></i>
                                <span>Borrow</span></a>
                        </li>
                        
                        <li>
                            <a href="return.php" aria-expanded="true"><i class="bi bi-arrow-return-left"></i>
                                <span>Return</span></a>
                        </li>

                        <li>
                            <a href="reports.php" aria-expanded="true"><i class="bi bi-archive-fill"></i>
                                <span>Reports</span></a>
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
                                <li><span>Item Records</span></li>
                                
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

</form>
</body>
            <div class="main-content-inner">
                <div class="row">
                    <!-- Contextual Classes start -->
                    <div class="col-lg-11 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Products</h4>


            <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csvFile">Upload CSV:</label>
                    <input type="file" class="form-control-file" id="csvFile" name="csvFile">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit" style="width: 10%;">Upload File</button>

            </form> -->

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <form method="get" action="" class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by name or serial number" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Model</th>
                           
                            <th scope="col">Serial Number</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn = new mysqli("localhost","root","","inventorymanagement");
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $sql = "SELECT * FROM itemreports WHERE product_name LIKE '%$search%' OR serialnumber LIKE '%$search%' OR Model LIKE '%$search%'";
                            $result = $conn->query($sql);
                            $count = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $row["product_name"] ?></td>
                                            <td><?php echo $row["Model"] ?></td>
                                           
                                            <td><?php echo $row["serialnumber"] ?></td>
                                            <td><?php echo $row["description"] ?></td>
                                            <td>

                              

                                            <a href="deleteitemreports.php?id=<?php echo $row["product_id"] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>

                                        

                                            </td>
                                        </tr>
                                    <?php
                 
                 }
               }

            ?>

                                            </tbody>
                                        </table>
           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>


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
