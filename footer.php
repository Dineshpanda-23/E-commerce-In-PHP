<div id="footer">
    <div class="container"> 
                       <div class="row p-5" >
                           <div class="col-md-4">
                                 <ul>
                                      <li><h3>Information</h3></li>
                                      <li><a href="about.php">About us</a></li>
                                      <li><a href="contact.php">Contact us</a></li>
                                 </ul>
                             </div>
                             <div class="col-md-4">
                                 <ul>
                                      <li><h3>My Account</h3></li>
                                      
                                    <?php  if (isset($_SESSION['id'])) {
                                               echo '<li><a href="logout.php">Logout</a></li>';
                                            
                                            } 
                                            else {
                                               echo  '<li><a href="login.php">Login </a></li>';
                                               echo '<li><a href="signup.php">SignUp</a></li>';

                                            }
                                       ?>                                     
                                 </ul>
                             </div>
                             <div class="col-md-4">
                                 <ul>
                                      <li><h3>Contact Us</h3></li>
                                      <p>E-mail: princevworld@gmail.com</p>
                                      <p>Mobile no. 9592133606</p>
                                 </ul>
                             </div>
                         </div>
                           <div id="footer-c"><p>Created By Prince Vishwakarma</p></div>
    </div>       
</div>
</body>
</html>