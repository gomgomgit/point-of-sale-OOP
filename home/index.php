<?php 
session_start();

require '../config/CategoryProcess.php';
require '../config/UserProcess.php';
require '../config/ItemProcess.php';
require '../config/TableProcess.php';

use point_of_sale\config\Category;
use point_of_sale\config\User;
use point_of_sale\config\Item;
use point_of_sale\config\Table;

if (isset($_SESSION['email'])) {

$category = new Category;
$user = new User;
$item = new Item;
$table = new Table;
$data_user = $user->show_data();
$total_user = $user->total();
$data_item = $item->show_data();
$total_item = $item->total();
$data_category = $category->show_data();
$total_category = $category->total();
$total_table = $table->total();
$total_seats = $table->seats();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Datta Able Free Bootstrap 4 Admin Template</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="../datta-lite/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../datta-lite/assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="../datta-lite/assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../datta-lite/assets/css/style.css">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    
    <?php 
    include '../template/navigation.php';
    include '../template/header.php';
     ?>


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <!--[social-media section] start-->
                            <div class="row">
                                <div class="col-md-12 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <i class="fas fa-users text-primary f-36"></i>
                                                </div>
                                                <div class="col text-right">
                                                    <h3><?=$total_user?> Users</h3>
                                                    <h5 class="text-c-green mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <i class="far fa-clipboard text-c-blue f-36"></i>
                                                </div>
                                                <div class="col text-right">
                                                    <h3><?=$total_item?> Menu</h3>
                                                    <h5 class="text-c-purple mb-0"><span class="text-muted">With <?=$total_category?> category</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <i class="fas fa-table text-c-red f-36"></i>
                                                </div>
                                                <div class="col text-right">
                                                    <h3><?=$total_table?> Table</h3>
                                                    <h5 class="text-c-blue mb-0"><span class="text-muted">With <?=$total_seats?> Total Seats</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[social-media section] end-->
                            
							<!-- [ Table ] start -->
							<div class="col-md-12 m-b-30">
							    <ul class="nav nav-tabs" id="myTab" role="tablist">
							        <li class="nav-item">
							            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#user" role="tab" aria-controls="home" aria-selected="false">User</a>
							        </li>
							        <li class="nav-item">
							            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Category</a>
							        </li>
							        <li class="nav-item">
							            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Item</a>
							        </li>
							    </ul>
							    <div class="tab-content" id="myTabContent">
							        <div class="tab-pane fade active show" id="user" role="tabpanel" aria-labelledby="home-tab">
							            <table class="table table-hover">
							                <thead>
							                    <tr>
							                        <th>No</th>
							                        <th>Name</th>
                                                    <th>Email</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($data_user as $row) {
						                        ?>
						                        <tr>
						                            <th scope="row"><?= $no++ ?></th>
                                                    <td>
                                                        <div class="avatar d-inline-block mr-3" style="width: 40px; height: 40px;">
                                                            <img src="../avatar/<?=$row['avatar']?>" alt="" width="100%">
                                                        </div>
                                                        <?= $row['name']; ?>        
                                                    </td>
                                                    <td><?= $row['email']; ?></td>
						                        </tr>
						                        <?php 
						                        }
						                        ?>
						                    </tbody>
						                </table>

							        </div>
							        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							            <table class="table table-hover">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Name</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($data_category as $row) {
						                        ?>
						                        <tr>
						                            <th scope="row"><?= $no++ ?></th>
						                            <td><?= $row['name']; ?></td>
						                        </tr>
						                        <?php 
						                        }
						                        ?>
						                    </tbody>
						                </table>

							        </div>
							        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Name</th>
                                                                                            <th>Category</th>
                                                                                            <th>Price</th>
                                                                                            <th>Stock</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php 
                                                                                        $no = 1;
                                                                                        foreach ($data_item as $row) {
                                                                                        $get_category = $item->get_category($row['category_id']);
                                                                                        ?>
                                                                                        <tr>
                                                                                            <th scope="row"><?= $no++ ?></th>
                                                                                            <td><?= $row['name']; ?></td>
                                                                                            <!-- <td><?= $row['category']; ?></td> -->
                                                                                            <td><?= $get_category['name']; ?></td>
                                                                                            <td><?= $row['price']; ?></td>
                                                                                            <td><?= ($row['stock']>=10 ? "<i class='fas fa-circle text-c-green f-10'> </i> " : "<i class='fas fa-circle text-c-red f-10'> </i> ") . $row['stock'];?></td>
                                                                                        </tr>
                                                                                        <?php 
                                                                                        }
                                                                                        ?>
                                                                                    </tbody>
                                                                                </table>
							        </div>
							    </div>
							</div>
							<!-- [ Table ] end -->							

                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
	<script src="../datta-lite/assets/js/vendor-all.min.js"></script>
	<script src="../datta-lite/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../datta-lite/assets/js/pcoded.min.js"></script>
    <script>
        $('document').ready(function(){
            $(".home-nav").addClass("active");
        });
    </script>

</body>
</html>
<?php 
} else { 
    header('location:../authentication/login.php');
}
?>
