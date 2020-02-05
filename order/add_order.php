<?php 
session_start();
require '../config/UserProcess.php';
require '../config/CategoryProcess.php';
require '../config/OrderProcess.php';
require '../config/ItemProcess.php';
require '../config/TableProcess.php';

use point_of_sale\config\User;
use point_of_sale\config\Category;
use point_of_sale\config\Order;
use point_of_sale\config\Item;
use point_of_sale\config\Table;

if (isset($_SESSION['email'])) {

$user = new User;
$data_user = $user->show_data();

$category = new Category;
$data_category = $category->show_data();
$baris_category = count($data_category);

$order = new Order;

$item = new Item;
$item_ava = $item->show_available();

$table = new Table;
$table_ava = $table->show_available();

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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" integrity="sha256-RPilbUJ5F7X6DdeTO6VFZ5vl5rO5MJnmSk4pwhWfV8A=" crossorigin="anonymous" />
    <link rel="stylesheet" href="bootstrap.min.css" />

    <!-- Data table -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->

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
                            <!-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Order</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5>Add Order</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="process.php?action=addorder">
                                                        <div class="form-group">
                                                            <label for="categorySelect">User</label>
                                                            <select class="form-control" id="categorySelect" name="user" required>
                                                                <option value="" selected >-- Choose User --</option>
                                                                <?php 
                                                                foreach ($data_user as $user) {
                                                                ?>
                                                                <option value="<?=$user['id']?>"><?=$user['name']?></option>
                                                                <?php   
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tableInput">Table Number</label>
                                                            <input type="text" class="form-control" id="tableInput" name="table" aria-describedby="emailHelp" placeholder="Enter Order table" required>
                                                            <small id="emailHelp" class="form-text text-muted">Fill with table of menu.</small>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-12 mb-5">
                                <h5 class="mt-4">Menu</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <ul class="nav flex-column nav-pills sticky-top" style="top: 20px;"  id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <?php 
                                            $no = 1;
                                            foreach ($data_category as $category) {
                                            ?>
                                            <li><a class="nav-link text-left no-<?= $no++ ?>" id="v-pills-<?= $category['name'] ?>-tab" data-toggle="pill" href="#v-pills-<?= $category['name'] ?>" role="tab" aria-controls="v-pills-<?= $category['name'] ?>" aria-selected="true"><?= $category['name'] ?></a></li>
                                            
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <?php 
                                            $no = 1;
                                            foreach ($data_category as $category) {
                                            ?>
                                            <div class="tab-pane fade show no-<?= $no++ ?>" id="v-pills-<?= $category['name'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $category['name'] ?>-tab">
                                                <div class="row pb-5">
                                                <?php 
                                                $item_with_category_available = $item->item_with_category_available($category['id']);
                                                foreach ($item_with_category_available as $iwc) {
                                                ?>
                                                <div class="col-4"> 
                                                    <div class="bg-dark mb-3" style="overflow: hidden;">
                                                        <img src="../menu/<?=$iwc['image']?>" alt="" style="width: 100%">
                                                    </div>
                                                    <div class="">
                                                        <h3><?= $iwc['name'] ?></h3>
                                                        <h6>Harga : Rp.<?= $iwc['price'] ?></h6>
                                                        <h6>Stock : <?= $iwc['stock'] ?></h6>
                                                        <!-- <form action=""> -->
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">qty</span>
                                                                </div>
                                                                <input type="number" value="1" name="qty" class="form-control qty qty-<?=$iwc['id']?>" onChange="qty_change('<?=$iwc['id']?>', '<?=$iwc['price']?>')" aria-label="Default" aria-describedby="inputGroup-sizing-default" min="1" max="<?=$iwc['stock']?>">
                                                            </div>
                                                            <h5 class="d-inline">Total : Rp.<h5 class="d-inline total-inline-<?=$iwc['id']?>"><?= $iwc['price'] ?></h5></h5>
                                                            <button type="submit" onClick="add_to_cart('<?=$iwc['name']?>', '<?=$iwc['id']?>', '<?=$iwc['price']?>', '<?=$category['name']?>', '<?=$iwc['stock']?>')" class="btn btn-primary d-block mt-3">Add to cart</button>
                                                        <!-- </form> -->
                                                    </div>
                                                </div>
                                               
                                                <?php
                                                }
                                                ?>
                                                 </div>
                                            </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Table ] end -->   

    
                            <!-- [ Table ] start -->
                            <div class="col-xl-12">
                                <div class="card Recent-Users"> 
                                    <div class="card-header">
                                        <h5>Cart</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <form action="process.php?action=add" method="post">
                                            <div class="d-flex justify-content-between align-items-end">

                                                <!-- Input table number and user -->
                                                <div class="">
                                                    <label for="tableInput">Table Number : </label>
                                                    <select type="text" class="form-control" id="tableInput" name="table" aria-describedby="emailHelp" placeholder="Enter Table Number" required>
                                                        <?php 
                                                        foreach ($table_ava as $ava) {
                                                        ?>
                                                        <option value="<?=$ava['id']?>"><?=$ava['number']?> with <?=$ava['seats']?> seats</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="user" value="<?=$_SESSION['id']?> ">

                                                <div>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-hover" id="cart-table">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="20%">Item</th>
                                                            <th width="10%">Category</th>
                                                            <th width="20%">Price</th>
                                                            <th width="5%">Qty</th>
                                                            <th width="25%">Total</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="cart-list">
                                                        <!-- <?php 
                                                        $no = 1;
                                                        foreach ($item_ava as $row) {
                                                        $get_category = $item->get_category($row['category_id']);
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $row['name']; ?></td>
                                                            <td><?= $get_category['name']; ?></td>
                                                            <td><?= $row['price']; ?></td>
                                                            <td><?= ($row['stock']>=10 ? "<i class='fas fa-circle text-c-green f-10'> </i> " : "<i class='fas fa-circle text-c-red f-10'> </i> ") . $row['stock'];?></td>
                                                            <td>
                                                                <a href="edit.php?id=<?=$row['id']?>" class="label theme-bg2 text-white f-12">Edit</a>
                                                                <a href="process.php?id=<?=$row['id']?>&action=delete" class="label theme-bg text-white f-12">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                        }
                                                        ?> -->
                                                    </tbody>
                                                    <tfoot class="">
                                                        <tr class="summary">
                                                            <td colspan="5"><b>TOTAL</b></td>
                                                            <td><b class="total-order-cart">0</b><input class="total-order-cart-value" type="hidden" name="total-cart" value="" required ></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>    


                                    </div>
                                </div>
                            </div>

                            <!-- <div class="card w-25 m-auto" id="item_dialog">
                                <div class="card-body text-center">
                                    <h3 class="mb-4">Add Item</h3>
                                    <div class="form-group text-left">
                                        <label for="itemSelect">Item</label>
                                        <select class="form-control" id="itemSelect" name="item" required>
                                            <option value="" selected >-- Choose Item --</option>
                                            <?php 
                                            foreach ($item_ava as $item) {
                                            ?>
                                            <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                            <?php   
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control" id="qty" placeholder="Qty">
                                    </div>
                                    <button id="checkout" class="btn btn-primary shadow-2 mb-4">Add</button>
                                </div>
                            </div> -->
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <!-- <input type="hidden" value="'+$id+'" name="hidden_item[]" id="item-cart-'++count'" class="item-cart"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Sweat Alert 2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Data table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        
        function qty_change($id, $price) {
            var qty = $(".qty-"+$id).val();
            var total = $price * qty;
            $('.total-inline-'+$id).html(total);
        };

        var count = 0;
        function add_to_cart($name, $id, $price, $category, $stock) {
                
            var qty = parseInt($(".qty-"+$id).val());
            var total = qty * $price;

            if (qty <= $stock) {
                swal(
                    'Item telah masuk keranjang',
                    $name+' , '+qty+' = '+total,
                    'success'
                );

                count = count + 1;
                output = '<tr id="cart_row'+count+'">';
                output += '<td>'+count+'</td>';
                output += '<td>'+$name+'<input type="hidden" value="'+$id+'" name="hidden_item[]" id="item-cart-'+count+'" class="item-cart"></td>';
                output += '<td>'+$category+'</td>';
                output += '<td>'+$price+'</td>';
                output += '<td>'+qty+'<input type="hidden" value="'+qty+'" name="hidden_qty[]" id="qty-cart-'+count+'" class="qty-cart"></td>';
                output += '<td class="total-cart-col">'+total+'<input type="hidden" value="'+total+'" name="hidden_total[]" id="total-cart-'+count+'" class="total-cart"></td>';
                output +='<td><button type="button" name="remove_cart" class="btn btn-danger btn-xs remove-cart" id="'+count+'">Remove</button></td>';
                output += '</tr>';

                $('#cart-list').append(output);



                var total_order_cart = 0;
                $('.total-cart-col').each(function() {
                    var value = $(this).text();
                    total_order_cart += parseInt(value);

                    // if(!isNaN(value) && value.length != 0) {
                    //         total_order_cart += parseFloat(value);
                    // };
                });

                $('.total-order-cart').html(total_order_cart);
                $('.total-order-cart-value').val(total_order_cart);

                // var total_order_cart = getColumnTotal('#total-cart');
                // $('#total-order-cart').html(total_order_cart);
                // alert(total_order_cart);

                // function getColumnTotal(selector) {
                //     return Array.from($(selector)).reduce(sumReducer, 0);
                // };

                // function sumReducer(total, cell) {
                //     return total += parseInt(cell.innerHTML, 10);
                // };

                // var table = $('#cart-table').DataTable();
                // var tot = table.column( 6 ).data().sum();

                // $('#example').DataTable( {
                //     drawCallback: function () {
                //         var api = this.api();
                //         $( api.table().footer() ).html(
                //             api.column( 4, {page:'current'} ).data().sum()
                //         );
                //     }
                // } );
            } else {
                swal({
                    title: 'Stock yang kami miliki kurang',
                    text: 'Silahkan kurangi item anda',
                    icon: 'warning',
                });
            };


        };

        $(document).on('click','.remove-cart', function(){
            var row = $(this).attr("id")

            swal({
              title: 'Are you sure?',
              text: "Your item will deleted from cart",
              icon: 'warning',
              dangerMode: true,
              buttons: {
                cancel: "Cancel",
                true : "Im Sure!",
              }
            })
            .then(function(result) {
              if (result) {
                swal(
                  'Deleted!',
                  'Your item has been deleted.',
                  'success'
                );
                $('#cart_row'+row).remove();

                var total_order_cart = 0;
                $('.total-cart-col').each(function() {
                    var value = $(this).text();
                    total_order_cart += parseInt(value);
                });
                
                $('.total-order-cart').html(total_order_cart);
                $('.total-order-cart-value').val(total_order_cart);
              }
            });

            // if (confirm("Are you sure you want to remove this row data?")) {
            // $('#cart_row'+row).remove();
            // } else { return false; }
        });




        $('document').ready(function(){
            $(".no-1").addClass('active');
            $(".order-nav").addClass("active");

            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function() {
                if ($window.scrollTop() >= 200) {
                    nav.addClass('active');
                } else {
                    nav.removeClass('active');
                }
            });

            $('#checkout').click(function(){
                swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    swal(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                })
            });


            // var count = 0;

            // $('#item_dialog').dialog({
            //     autoOpen: false;
            //     width: 400;
            // });

            // $('#add_item').click(function() {
            //     $('#item_dialog').dialog('option', 'title', 'Add Item');
            //     $('#itemSelect').val('');
            //     $('#qty').val('');

            //     $('#item_dialog').dialog('open');
            // });
        });
    </script>

<!--     <script>
        $(document).ready(function() {
            $('#cart-table').DataTable( {
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
         
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
         
                    // Total over all pages
                    total = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Total over this page
                    pageTotal = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Update footer
                    $( api.column( 4 ).footer() ).html(
                        '$'+pageTotal +' ( $'+ total +' total)'
                    );
                }
            } );
        } );
    </script> -->

</body>
</html>
<?php 
} else { 
    header('location:../authentication/login.php');
}
?>