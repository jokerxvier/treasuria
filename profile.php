<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
?>

<div id="wrap">
  <section class="container">

    <article class="col-md-2"> 
      <div class="female"></div>
    </article>

    <article class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Treasure Hunter</h3>
        </div>
        <div class="panel-body">
        <form>
        <div class="form-horizontal clearfix">
        <div class="message"></div>
        <div class="form-group">
          <label for="u_firstname" class="col-lg-4 control-label">First Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="u_firstname" name="u_firstname" value="" placeholder="First Name" />
          </div>
        </div><!--end of FIRST NAME-->

        <div class="form-group">
          <label for="u_lastname" class="col-lg-4 control-label">Last Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="u_lastname" name="u_lastname" value="" placeholder="Last Name"/>
          </div>
        </div><!--end of LAST NAME-->

        <div class="form-group">
          <label for="u_username" class="col-lg-4 control-label">Email Address</label>
          <div class="col-lg-8">
            <input type="email" class="form-control" id="u_username" name="u_username" value="" placeholder="Email"  />
          </div>
        </div><!--end of USERNAME / EMAIL-->
        
        <div class="form-group">
          <label for="u_password" class="col-lg-4 control-label">Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="u_password" name="u_password" value="" placeholder="Password" />
          </div>
        </div><!--end of PASSWORD-->

        <div class="form-group">
          <label for="u_c_password" class="col-lg-4 control-label">Confirm Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="u_c_password" name="u_c_password" value="" placeholder="Confirm Password" />
          </div>
        </div><!--end of CONFIRM PASSWORD-->

        <div class="form-group">
          <label for="" class="col-lg-4 control-label">Address</label>
          <div class="col-lg-8">
            <input type="" class="form-control" id="" name="" value="" placeholder="Address" />
          </div>
        </div><!--end of ADDRESS-->

        <div class="form-group">
          <label for="" class="col-lg-4 control-label">City</label>
          <div class="col-lg-8">
            <input type="" class="form-control" id="" name="" value="" placeholder="City" />
          </div>
        </div><!--end of CITY-->

        <div class="form-group">
          <label for="" class="col-lg-4 control-label">Country</label>
          <div class="col-lg-8">
            <input type="" class="form-control" id="" name="" value="" placeholder="Country" />
          </div>
        </div><!--end of COUNTRY-->

        <div class="form-group">
          <label for="" class="col-lg-4 control-label">Phone</label>
          <div class="col-lg-8">
            <input type="" class="form-control" id="" name="" value="" placeholder="Phone" />
          </div>
        </div><!--end of COUNTRY-->
  
        <div class="form-group">
          <label for="u_gender" class="col-lg-4 control-label">Gender</label> 
          <div class="col-lg-3">
            <label for="gender_male" class="control-label">Male</label>
            <input type="radio" id="gender_male" value="M" name="gender"/>
          </div>
          <div class="col-lg-3">
            <label for="gender_female" class="control-label">Female</label>
            <input  type="radio" id="gender_female" value="F" name="gender"/>
          </div>
        </div><!--end of GENDER-->

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

        </div><!--end of PANEL BODY-->
     </div><!--end of PANEL-->
  </article>

  </section><!--end of CONTAINER-->

    <div class="clearfix">
    <article class="col-md-2"> 
      <div class="female"></div>
    </article>
    <article class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Player Name</h3>
        </div>
        <div class="panel-body">
          <ul class="list-unstyled">
            <li>Rank: Treasure Master</li>
            <li>Gold Coins: 1,000,000</li>
          </ul>
        </div>
      </div>
    </article>
    </div>
    <article class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">My  Gallery</h3>
        </div>
        <div class="panel-body">
         <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#keys" data-toggle="tab">Magical Keys</a></li>
            <li><a href="#treasures" data-toggle="tab">My Collection</a></li>
            <li><a href="#wishlist" data-toggle="tab">Wishlist</a></li>
            <li><a href="#rankings" data-toggle="tab">Rankings</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="keys">
              <ul>
                <li>Magical Key</li>
                <li>Magical Key</li>
                <li>Magical Key</li>
                <li>Magical Key</li>
                <li>Magical Key</li>
              </ul>
            </div>
            <div class="tab-pane" id="treasures">
              <ul>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
                <li>Treasure Item</li>
              </ul>
            </div>
            <div class="tab-pane" id="wishlist">
              <ul>
                <li>Wishlist Item</li>
                <li>Wishlist Item</li>
                <li>Wishlist Item</li>
              </ul>
            </div>
            <div class="tab-pane" id="rankings">
              <ul>
                <li>Rankings</li>
                <li>Rankings</li>
                <li>Rankings</li>
                <li>Rankings</li>
              </ul>
            </div>
           </div>
        </div>
        </div><!--end of PANEL BODY-->
      </div>
    </article>
  </section>

</div><!--end of WRAP-->

<?php
}
else
{
header('Location: login.php');
}
?>

<?php include 'footer.php'; ?>
