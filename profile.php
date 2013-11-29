<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
  $p_query = $mysqli->prepare("SELECT user_id, password, firstname, lastname, address, city, country, created_at, updated_at, email, key_email, phone, gender, user_type, deleted FROM users WHERE user_id='$_SESSION[user_id]'");
  $p_query->execute();
  $p_query->bind_result($user_id, $password, $firstname, $lastname, $address, $city, $country, $created_at, $updated_at, $email, $key_email, $phone, $gender, $user_type, $deleted);
  $p_query->store_result();
  
  if($p_query->num_rows > 0){
    while($p_query->fetch()){
?>

<div id="wrap">
  <section class="container">
  <?php if($gender=='M') { $img = "male"; } else {  $img = "female";  } ?>
  
    <article class="col-md-3"> 
      <div class="<?php echo $img; ?>"></div>
    </article>
  
    <article class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">EDIT PROFILE</h3>
        </div>
    <?php if(isset($_GET["s"]) and $_GET["s"]=="success") { ?> <div class="alert alert-success"> SUCCESS! </div> <?php } ?>
    
        <div class="panel-body">
         <form action="process.php" method="post" id="profileedit" name="profileedit">
    <input type="hidden" name="action" value="edit" />
    
        <div class="form-horizontal clearfix">
        <div class="message"></div>
        <div class="form-group">
          <label for="fname" class="col-lg-4 control-label">First Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $firstname; ?>"/>
          </div>
        </div><!--end of FIRST NAME-->

        <div class="form-group">
          <label for="lname" class="col-lg-4 control-label">Last Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lastname; ?>" />
          </div>
        </div><!--end of LAST NAME-->

        <div class="form-group">
          <label for="email" class="col-lg-4 control-label">Email Address</label>
          <div class="col-lg-8">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" disabled/>
          </div>
        </div><!--end of USERNAME / EMAIL-->

        <div class="form-group">
          <label for="address" class="col-lg-4 control-label">Address</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Address" />
          </div>
        </div><!--end of ADDRESS-->

        <div class="form-group">
          <label for="city" class="col-lg-4 control-label">City</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" placeholder="City" />
          </div>
        </div><!--end of CITY-->

        <div class="form-group">
          <label for="country" class="col-lg-4 control-label">Country</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" placeholder="Country" />
          </div>
        </div><!--end of COUNTRY-->

        <div class="form-group">
          <label for="phone" class="col-lg-4 control-label">Phone</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" placeholder="Phone" />
          </div>
        </div><!--end of PHONE-->
  
        <div class="form-group">
          <label for="u_gender" class="col-lg-4 control-label">Gender</label> 
          <div class="col-lg-3">
            <label for="gender_male" class="control-label">Male</label>
      <input type="radio" id="gender_male" value="M" name="gender" <?php if($gender=='M'){ echo "checked";}?>/>
          </div>
          <div class="col-lg-3">
            <label for="gender_female" class="control-label">Female</label>
            <input  type="radio" id="gender_female" value="F" name="gender" <?php if($gender=='F'){ echo "checked";}?>/>
          </div>
        </div><!--end of GENDER-->
    
    <hr class="brown">
    <h4><span class="brown">Change Password</span></h4>

    <div class="form-group">
          <label for="pass" class="col-lg-4 control-label">Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="pass" name="pass" value="" placeholder="New Password" />
          </div>
        </div><!--end of PASSWORD-->

        <div class="form-group">
          <label for="u_c_password" class="col-lg-4 control-label">Confirm Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="u_c_password" value="" placeholder="Confirm New Password" />
          </div>
        </div><!--end of CONFIRM PASSWORD-->
    
      </div><!--end of FORM-HORIZONTAL-->
      
      <div class="login-actions">          
        <button type="submit" name="submit" class="button btn login-btn btn-large">Save</button>  
      </div> <!-- .actions -->
    </form>
    </div><!--end of PANEL BODY-->
  </div><!--end of PANEL-->
  </article>

  <article class="col-md-4">
     <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">History of Rounds</h3>
        </div>
        <div class="panel-body">

          <!--<form class="form-horizontal">
            <fieldset>
              <div class="form-group row"> 
                <div class="col-xs-8 input-append date"> 
                  <label class="control-label">Search Date</label> 
                  <div class="input-group date" id="dp3" data-date="12-02-2012" data-date-format="mm-dd-yyyy"> 
                    <input class="form-control" type="text" readonly="" value="12-02-2012"> <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span> 
                </div> 
              </div> 
            </div>
            </fieldset>
          </form>-->

           <div class="table-responsive">
             <table class="table profile">
              <tr>
                <th></th>
                <th>Keys</th>
                <th>Results</th>
                <th>Time</th>
              </tr>
              <tr>
                <td>1</td>
                <td><img src="assets/img/profile_yellow_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Win</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>2</td>
                <td><img src="assets/img/profile_purple_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="assets/img/profile_green_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>4</td>
                <td><img src="assets/img/profile_blue_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>5</td>
                <td><img src="assets/img/profile_orange_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>6</td>
                <td><img src="assets/img/profile_yellow_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Win</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>7</td>
                <td><img src="assets/img/profile_purple_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>8</td>
                <td><img src="assets/img/profile_green_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Win</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="assets/img/profile_blue_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Lose</td>
                <td>11/29/13 8:00 am</td>
              </tr>
              <tr>
                <td>10</td>
                <td><img src="assets/img/profile_orange_key.png" class="img-responsive" alt="Used Key"/></td>
                <td>Win</td>
                <td>11/29/13 8:00 am</td>
              </tr>
             </table>
          </div><!--end of TABLE-RESPONSIVE-->
          <ul class="pagination pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div><!--end of PANEL BODY-->
     </div><!--end of PANEL-->
  </article>

  </section><!--end of CONTAINER-->


</div><!--end of WRAP-->

<?php
 }
 }
}
else
{
header('Location: login.php');
}
?>

<?php include 'footer.php'; ?>
