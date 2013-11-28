<?php include 'header.php'; ?>

<?php
if(isset($_SESSION['username']))
{
?>

<div id="wrap">
  <section class="container">
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
          <h3 class="panel-title">My Treasure Gallery</h3>
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
