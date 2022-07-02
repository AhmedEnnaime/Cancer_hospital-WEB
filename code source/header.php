

<?php include('connect.php');?>
<body>
<?php
$que="select * from manage_website";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
  //print_r($row);
  extract($row);
  $business_name = $row['business_name'];
  $business_email = $row['business_email'];
  $business_web = $row['business_web'];
  $portal_addr = $row['portal_addr'];
  $addr = $row['addr'];
  $date_format = $row['date_format'];
  $logo = $row['logo'];
}
?>

<div class="theme-loader">
<div class="ball-scale">
<div class='contain'>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
<div class="ring">
<div class="frame"></div>
</div>
</div>
</div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">

<a href="index.php">

  <div class="text-center">
<image class="profile-img" src="uploadImage/Logo/<?php echo $logo; ?>" style="width: 50%"></image>
</div>
</a>
<a class="mobile-options">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<li class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
 <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
<input type="text" class="form-control">
<span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
</div>
</div>
</li>
<li>
<a href="#!" onclick="javascript:toggleFullScreen()">
<i class="feather icon-maximize full-screen"></i>
</a>
</li>
</ul>
<ul class="nav-right">
 <li class="header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<i class="feather icon-bell"></i>
<span class="badge bg-c-pink">5</span>
</div>
<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<li>
<h6>Notifications</h6>
<label class="label label-danger">Nouveau</label>
</li>
<li>
<div class="media">
<img class="d-flex align-self-center img-radius" src="files/assets/images/profile.jpg" alt="Generic placeholder image">
<div class="media-body">
<h5 class="notification-user">Jalal Eddine Bouchrit</h5>
<p class="notification-msg"> </p>
<span class="notification-time">  </span>
</div>
</div>
</li>


</ul>
</div>
</li> 


<li class="header-notification" onclick="window.open('https:','_newtab');">
<div class="dropdown-primary dropdown">
<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
<i class="feather icon-message-square"></i>
<span class="badge bg-c-green">3</span>
</div>
</div>
</li>



<li class="user-profile header-notification" >
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
	
		<?php 

     
        if($_SESSION['user'] == 'admin'){
    ?>
	
<img src="uploadImage/Profile/<?php echo $_SESSION['image'];?>" class="img-radius" alt="User-Profile-Image"/><?php }?>
<span><?php echo $_SESSION['name']; ?></span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
   
<li>
<a href="profile.php">
<i class="feather icon-user"></i> Profile
</a>
</li>
<li>
<a href="changepassword.php">
<i class="feather icon-edit"></i> Change Passe
</a>
</li>

<li>
<a href="logout.php">
<i class="feather icon-log-out"></i> Deconnection
</a>
</li>
</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>

