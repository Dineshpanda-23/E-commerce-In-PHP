<?php require 'nav.php'; ?>
<?php 
$con=mysqli_connect("localhost","root","","ecommerce") or die(mysqli_error($con));
if (isset($con,$_POST['email'])){
$user_email = mysqli_escape_string($con,$_POST['email']);
$user_email = mb_convert_case($user_email, MB_CASE_LOWER, "UTF-8");	
$user_name = mysqli_escape_string($con,$_POST['name']);
$user_massage = mysqli_escape_string($con,$_POST['massage']);
$login_query = "insert into contact(con_name,con_email,con_mass) values ('$user_name','$user_email','$user_massage')";
$login_submit = mysqli_query($con, $login_query) or die(mysqli_error($con));
header("location: index.php");
}
?>
<div class="container">
    <div class="row_style">
        <img src="product_img/about.svg" alt="" style="width:200px;float:right;" />
            <h2>LIVE SUPPORT</h2>
            <h6>24 hours | 7 days a week | 365 days a year Live Technical Support</h6>
            <p>Information, My Account and Contact Us are text but beneath them all are links except the number below the contact us. Login link below the My Account will again trigger the modal >Information, My Account and Contact Us are text but beneath them all are links except the number below the contact us. Login link below the My Account will again trigger the modalInformation, My Account and Contact Us are text but beneath them all are links except the number below the contact us. Login link below the My Account will again trigger the modal >Information, My Account and Contact Us are text but beneath them all are links except the number below the contact us. Login link below the My Account will again trigger the modal</p>
     </div>       
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-8">
            <h2>CONTACT US</h2>
            <form method="POST" action="contact.php">
                <div class="modal-body mx-3">               
                    <div class="md-form mb-4">
                        <label>Name</label>
                        <input type="text" class="form-control validate" name="name" require>
                    </div>
                    <div class="md-form mb-5">
                        <label>E-mail</label>
                        <input type="email" class="form-control validate" name="email" require>
                    </div>
                    <div class="md-form mb-4">
                        <label>Massage</label>
                        <textarea type="text" id="defaultForm-pass" class="form-control validate" rows="6" cols="50" name="massage" require></textarea>
                        <button type="submit" class="btn btn-primary " style="margin-top: 10px;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <h2>Company Information</h2>
            <address>
                <strong>Twitter, Inc.</strong><br>
                1355 Market Street, Suite 900<br>
                San Francisco, CA 94103<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890<br>
                1355 Market Street, Suite 900<br>
                San Francisco, CA 94103<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>