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
                                  <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                </li>
                            
                                <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                  <span>Item Records</span></a>
                    
                                  <li>
                                <a href="table.php" aria-expanded="true"><i class="bi bi-archive-fill"></i>
                                    <span>Item Reports</span></a>
                             

                                <li class="active">
                                <a href="student.php" aria-expanded="true"><i class="bi bi-person-plus-fill"></i>
                                    <span>Borrow</span></a>
                        
                        
                                <li>
                                 <a href="return.php" aria-expanded="true"><i class="bi bi-arrow-return-left"></i>
                                    <span>Return</span></a>
                                    <li>
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
                                <li><span>Student & borrow</span></li>
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
            <div>


<!-- Large modal -->

<!-- <div class="text-center">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>
</div> -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <h2 class="text-center mb-4">Add New Student</h2>
      <form method="POST" class="form-horizontal" action="addnewstudent.php">
        <div class="form-group">
          <label for="firstname" class="col-sm-2 control-label">First Name<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="text" autocomplete="off" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required aria-label="First Name">
            <small class="form-text text-muted">Please enter the student's first name.</small>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-sm-2 control-label">Last Name<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="text" autocomplete="off" class="form-control" id="lastname" name="lastname" placeholder="Enter last name"required aria-label="Last Name">
            <small class="form-text text-muted">Please enter the student's last name.</small>
          </div>
        </div>
        <div class="form-group">
          <label for="studentnumber" class="col-sm-5 control-label">Student Number<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <input type="text" autocomplete="off" class="form-control" id="studentnumber" name="studentnumber" placeholder="Enter student number (max 10 characters)" required maxlength="10" pattern="\d*" aria-label="Student Number">
            <small class="form-text text-muted">Please enter the student's unique student number, consisting of up to 10 digits.</small>
          </div>

                  <div class="form-group">
            <label for="itemserialborrow"  class="col-sm-2 control-label">Item Serial</label>
              <div class="col-sm-10">
              <input type="text" autocomplete="off" class="form-control" id="itemserialborrow" name="itemserialborrow" placeholder="Enter borrow item serial number"required>
              </div>
          </div>
          
          <div class="form-group">
            <label for="itemborrow" class="col-sm-2 control-label">Item</label>
            <div class="col-sm-10">
              <input type="text" autocomplete="off" class="form-control" id="itemborrow" name="itemborrow" placeholder="Enter borrow item name"required>
            </div>
          </div>


          <div class="form-group">
          <label for="date" class="col-sm-2 control-label">Date:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="date" placeholder="mm/dd/yyyy" name="date" required>
          </div>
        </div>

        <div class="form-group">
    <label for="name" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
      <input type="number" name="quantity_borrowed" id="quantity_borrowed" min="1" max="" class="form-control"placeholder="Quantity Here"required>
    </div>
  </div>



        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
            <form method="post" action="addnewstudent.php">
    <!-- form fields go here -->
    <button type="submit" class="btn btn-primary" name="add" aria-label="Add Student">Add Student</button>
</form>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
        <!-- Contextual Classes start -->


        <div class="col-lg-11 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Products</h4>
<!-- 
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csvFile">Upload CSV or Excel file:</label>
                    <input type="file" class="form-control-file" id="csvFile" name="csvFile">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Upload File</button>
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
                <!-- <div class="col-md-6 text-right">
                    <a href="additem.php" class="btn btn-success"><i class="fa fa-plus"></i> Add Product</a>
                </div> -->
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Model</th>
                            <!-- <th scope="col">Quantity</th> -->
                            <th scope="col">Serial Number</th>
                            <th scope="col">Description</th>
                            <th scope="col">Item Availability</th>
                            <th scope="col">Action</th>
                           <th scope="col"> <form action="cart.php" method="post">
  <th scope="col">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">Cart</button>
    </div>
  </th>
</form></th>
                    </thead>
                    <tbody>
  <?php
    $conn = new mysqli("localhost","root","","inventorymanagement");
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' OR serialnumber LIKE '%$search%' OR Model LIKE '%$search%'";
    $result = $conn->query($sql);
    $count = 0;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $count++;
        $itemAvailability = $row["quantity"] >= 1 ? "AVAILABLE" : "NOT AVAILABLE";
        
        // check if the item exists in the cart
        $cartSql = "SELECT * FROM cart WHERE product_id = {$row['product_id']}";
        $cartResult = $conn->query($cartSql);
        $cartItem = $cartResult->fetch_assoc();
        $isInCart = ($cartResult->num_rows > 0 && $cartItem['quantity'] > 0) ? true : false;
  ?>
  <tr>
    <td ><?php echo $count ?></td>
    <td><?php echo $row["product_name"] ?></td>
    <td><?php echo $row["Model"] ?></td>
    <!-- <td><?php echo $row["quantity"] ?></td> -->
    <td><?php echo $row["serialnumber"] ?></td>
    <td><?php echo $row["description"] ?></td>
    <td><?php echo $itemAvailability ?></td>
    <td>
      <form method="post" action="addtocart.php">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
        <?php if ($row['quantity'] > 0 && !$isInCart): ?>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-max="<?php echo $row['quantity']; ?>" onclick="updateModal(this)">
            Add to Cart
          </button>
        <?php elseif ($isInCart): ?>
          <p class="text-success">IN CART</p>
        <?php else: ?>
          <p class="text-danger">CURRENTLY BORROWED</p>
        <?php endif; ?>
      </form>
    </td>
  </tr>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Quantity Borrowed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addtocart.php" method="post">
          <input type="hidden" name="product_id" id="product_id_modal" value="">
          <div class="form-group">
            <label for="quantity">Quantity Borrowed:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
          </div>
          <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function updateModal(button) {
    var max = button.getAttribute('data-max');
    document.getElementById('quantity').max = max;
    document.getElementById('product_id_modal').value = button.form.elements.product_id.value;
  }
</script>





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
