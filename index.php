<?php require 'nav.php'; ?>
<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce") or die(mysqli_error($con));
$login_query = "SELECT * FROM product ";
$login_submit = mysqli_query($con, $login_query) or die(mysqli_error($con));
if (isset($_POST['pdID'])) {
  if ($_POST['pdID']){
    if (isset($_SESSION['id'])) {  
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "pdID");
        if (in_array($_POST['pdID'], $item_array_id)) {        
            echo '<script>alert("Product already Add in Cart")</script>';          
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'pdID' => $_POST['pdID']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'pdID' => $_POST['pdID']
        );
        $_SESSION['cart'][0] = $item_array;   
    }
}else{echo '<script>alert("Login to Order ")</script>';}
 }
}
?>
<div id="my-pics" class="carousel slide " style="margin-top: 40px;" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#my-pics" data-slide-to="0" class="active"></li>
        <li data-target="#my-pics" data-slide-to="1"></li>
        <li data-target="#my-pics" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img src="product_img/slide1.jpg" alt="Sunset over beach">
        </div>
        <div class="item">
            <img src="product_img/slide1.jpg" alt="Rob Roy Glacier">
        </div>

        <div class="item">
            <img src="product_img/slide1.jpg" alt="Longtail boats at Phi Phi">
        </div>
    </div>
    <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class=" container">
    <div class="row row_style">
        <?php while ($fetched = mysqli_fetch_array($login_submit)) { ?>
            <div class="col-md-3">
            <form action="index.php" method="post">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><?php echo $fetched['pdName'] ?></h4>
                    </div>
                    <div class="panel-body">
                        <a href="#" class="thumbnail">
                            <img src="product_img/<?php echo $fetched['pdImg'] ?>" alt="<?php echo $fetched['pdName'] ?>" class="img-responsive center-block" />
                        </a>
                        <p><?php echo$fetched['pdDisc'] ?></p>
                        <h3>Rs. <?php echo $fetched['pdPrice'] ?></h3>
                     
                        <button type="submit" class="btn btn-success p-5 buttonbuy" >Order Now!</button>
                        <input type='hidden' name='pdID' value='<?php echo $fetched['pdID'] ?>'>                    
                    </div>
                </div>
            </form>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    // Initialize tooltip component
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Initialize popover component
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>
<?php require 'footer.php'; ?>