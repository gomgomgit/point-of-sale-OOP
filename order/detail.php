    <?php 
session_start();
require '../config/OrderProcess.php';
require '../config/TableProcess.php';

use point_of_sale\config\Order;
use point_of_sale\config\Table;

if (isset($_SESSION['email'])) {

$order_id = $_GET['id'];
$order = new Order;
$data_order = $order->get_by_id($order_id);
$data_detail = $order->show_detail_order($order_id);

$table = new Table;
$table_row = $table->get_by_id($data_order['table_number']);

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
                            
							<!-- [ Table ] start -->
                            <div class="col-xl-12">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Order</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">Table</th>
                                                        <th width="25%">User</th>
                                                        <th width="30%">Total</th>
                                                        <th width="20%">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $table_row['number']; ?> : with <?=$table_row['seats']?> seats</td>
                                                        <td><?= $data_order['user']; ?></td>
                                                        <td>Rp. <?= $data_order['total']; ?>;</td>
                                                        <td><?= $data_order['date'];?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-12">
							    <div class="card Recent-Users">
							        <div class="card-header">
							            <h5>Detail Order</h5>
							        </div>
							        <div class="card-block table-border-style">
                                        <button class="btn btn-primary"><a class="text-light" href="add_order_detail.php?id=<?=$data_order['id']?>"><i class="feather icon-plus"></i> Add Order to Detail</a></button>
							            <div class="table-responsive">
							                <table class="table table-hover">
							                    <thead>
							                        <tr>
							                            <th>No</th>
                                                        <th>Item</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
							                        </tr>
							                    </thead>
							                    <tbody>
							                        <?php 
							                        $no = 1;
							                        foreach ($data_detail as $row) {
							                        ?>
							                        <tr>
							                            <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $row['item']; ?></td>
                                                        <td>Rp. <?= $row['price']; ?>;</td>
                                                        <td><?= $row['qty']; ?></td>
                                                        <td>Rp. <p class="total-detail d-inline"><?= $row['total'];?></p>;</td>
                                                        <td>
                                                            <!-- <a href="edit_detail.php?id=<?=$row['id']?>" class="label theme-bg2 text-white f-12">Edit</a> -->
                                                            <a href="process.php?id=<?=$row['id']?>&order=<?=$order_id?>&action=delete_detail" class="label theme-bg text-white f-12">Delete</a>
                                                        </td>
							                        </tr>
							                        <?php 
							                        }
							                        ?>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="3"><h5 class="text-dark font-weight-bold">TOTAL</h5></td>
                                                        <td><h5 class="text-dark d-inline font-weight-bold">Rp. <h5 class="d-inline font-weight-bold" id="total"></h5>;</h5></td>
                                                    </tr>
							                    </tbody>
							                </table>
							            </div>
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
            $(".order-nav").addClass("active");


            var total = 0;
            $('.total-detail').each(function() {
                var value = $(this).text();
                total += parseInt(value);
            });
            $('#total').html(total);

        });
    </script>

</body>
</html>
<?php 
} else { 
    header('location:../authentication/login.php');
}
?>