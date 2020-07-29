<?php require 'nav.php';?>
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
<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		        
		        </div>
		        <div class="content">
	 				<div class="row" style="margin-left: 5px;">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
                                   

                             <?php
            $total = 0;
            $product_list = array();

            if (isset($_SESSION['cart'])) {
                $product_id = array_column($_SESSION['cart'], 'pdID');


                while ($row = mysqli_fetch_array($login_submit)) {
                    foreach ($product_id as $id) {
                        if ($row['pdID'] == $id) {
                            
                            echo '<div class="product">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="img-fluid mx-auto d-block image " style="text-align:center;width=100px;max-width:100%" src="'.$row['pdImg'].'">
                                </div>
                                <div class="col-md-8">
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-md-5 product-name">
                                                <div class="product-name">
                                                 
                                                    <div class="product-info">
                                                        <div>Name: <span class="value">'.$row['pdName'].'</span></div>
                                                        <div>Discription: <span class="value">'.$row['pdDisc'].'</span></div>
                                                        <div>Memory: <span class="value">32GB</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 quantity">
                                                <label for="quantity">Quantity:</label>
                                                <input id="quantity" type="number" value ="1" class="form-control quantity-input" disabled>
                                            </div>
                                            <div class="col-md-3 price">
                                                <span>Rs. '.$row['pdPrice'].'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> ';

                            array_push($product_list, $row["pdID"]);
                            $total = $total + (int)$row['pdPrice'];
                           
                        }
                    }
                } 

            } else {
                echo '<h1 class="text-center">Cart is Empty</h1>';
                
            }
            if (isset($_POST['user_id'])) {

                $user = $_POST['user_id'];

                foreach ($product_list as $x => $x_value) {
                    $order_query = "INSERT INTO order_product ( `product_id`, `user_id`) VALUES ('$x_value', '$user')";

                    $order_submit = mysqli_query($con, $order_query) or die(mysqli_error($con));
                  unset($_SESSION['cart']);
                }
                echo "<script>window.location = 'success.php'</script>";
                
            }

            ?>


</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">Rs. <?php
                                        echo $total;
                                        ?></h6></span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price">Rs. 0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">Rs. 0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">Rs.  <?php
                                        echo $total;
                                        ?></h6></span></div>
                                         <form action="cart.php" method="POST">
                        <input type="submit" class="btn btn-primary btn-md btn-block buttonbuy" name="insert" value="Checkout" style="padding:10px;" <?php if ($total==0) { echo 'disabled'; }?> />

                        <input type='hidden' name='user_id' value='<?php  echo $_SESSION['id'] ?>'>
                    </form>
			 					
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
<?php require 'footer.php'; ?>