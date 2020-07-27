<?php require 'nav.php'; ?>

<?php

$con = mysqli_connect("localhost", "root", "", "ecommerce") or die(mysqli_error($con));
$login_query = "SELECT * FROM product ";
$login_submit = mysqli_query($con, $login_query) or die(mysqli_error($con));

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["pdID"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'order.php'</script>";
            }
        }
    }
}


?>


<div class="container row_style ">
    <h1>Cart </h1>
    <div class="table-responsive">
        <table class="table">
            <!-- On rows -->
            <tr class="active">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Delivery Charge</th>
                <th>Price</th>
                <th>Product Remove</th>
            </tr>

            <?php
            $total = 0;
            $product_list = array();

            if (isset($_SESSION['cart'])) {
                $product_id = array_column($_SESSION['cart'], 'pdID');


                while ($row = mysqli_fetch_array($login_submit)) {
                    foreach ($product_id as $id) {
                        if ($row['pdID'] == $id) {
                            echo '<tr>' .
                                '<td class="active">' . $row["pdID"] . '</td>' .
                                '<td class="active">' . $row["pdName"] . '</td>' .
                                '<td class="active"> FREE </td>' .
                                '<td class="active">' . $row["pdPrice"] . '</td>' .
                                '<td class="active">REMOVE</td>'.
                                '</tr> ';

                            array_push($product_list, $row["pdID"]);
                            $total = $total + (int)$row['pdPrice'];
                            $prod = $row["pdID"];
                        }
                    }
                }
            } else {
                echo "<h5>Cart is Empty</h5>";
            }
            if (isset($_POST['user_id'])) {

                $user = $_POST['user_id'];

                foreach ($product_list as $x => $x_value) {
                    $order_query = "INSERT INTO order_product ( `product_id`, `user_id`) VALUES ('$x_value', '$user')";

                    $order_submit = mysqli_query($con, $order_query) or die(mysqli_error($con));
                   
                    

                    unset($_SESSION['cart']);
                }
                $search_id="SELECT order_id FROM order_product where 'user_id'=`user_id`";
                header("location: success.php");
            }

            ?>

        </table>
    </div>
    <?php



    ?>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-4 ">
        </div>
        <div class="col-md-4 col-md-offset-4">


            <div class="pt-4">

                <hr>
                <div class="row price-details">
                    <table class="table">

                        <tr>

                            <td>
                                <h6>Product Quantity</h6>
                            </td>
                            <td>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $count  = count($_SESSION['cart']);
                                    echo "<h6> ($count items)</h6>";
                                } else {
                                    echo "<h6> (0 items)</h6>";
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>

                            <td>
                                <h6>Delivery Charge</h6>
                            </td>
                            <td>
                                <h6 class="text-success">FREE</h6>
                            </td>

                        </tr>
                        <tr>

                            <td>
                                <h6>Amount Payable</h6>
                            </td>
                            <td>
                                <h6>Rs. <?php
                                        echo $total;
                                        ?></h6>
                            </td>

                        </tr>

                    </table>
                    <form action="cart.php" method="POST">
                        <input type="submit" class="btn btn-success buttonbuy" name="insert" value="Place Order" style="padding:10px;" />

                        <input type='hidden' name='user_id' value='<?php echo $_SESSION['id'] ?>'>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php require 'footer.php'; ?>