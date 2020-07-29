<?php require 'nav.php';?>
<div class="container row_style">
        <div class="row top_margin">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">User Registration</div>
                    <div class="panel-body">
                        <form method="POST" action="signupcode.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="userEmail" require>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="password" name="userPassword" require>
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="userFirstName" require>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="userLastName" require>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="userMobile" require>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="userAddress" require>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="userCity" require>
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="State" name="userState" require>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="Country" name="userCountry" require>
                            </div>
                            <div class="form-group">
                                <label for="Zip">ZIP</label>
                                <input type="number" class="form-control" id="Zip" name="userZip" require>
                            </div>
                            <button type="submit" class="btn btn-primary buttonbuy" value=”registration_submit”>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php require 'footer.php';?>