<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

if($_SESSION["user"]=='admin'){
    $q = "select * from  admin where id = '".$_SESSION['id']."'";
}else if($_SESSION["user"]=='doctor'){
   $q = "select * from  doctor where Doctor_Ip = '".$_SESSION['id']."'";
}else if($_SESSION["user"]=='patient'){
   $q = "select * from  patient where patientid = '".$_SESSION['id']."'";
}

  $q1 = $conn->query($q);
  while($row = mysqli_fetch_array($q1)){
    extract($row);
    $db_pass = $row['password'];
  }

if(isset($_POST["btn_password"])){
  
  $old = hash('sha256',$_POST['old_password']);
  $pass_new = hash('sha256', $_POST['new_password']);
  $confirm_new = hash('sha256', $_POST['confirm_password']);

function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$old_pass =  hash('sha256', $salt . $old); 
$new_pass =  hash('sha256', $salt . $pass_new); 
$confirm =  hash('sha256', $salt . $confirm_new);

  if($db_pass!=$old_pass){ ?> 
    <?php $_SESSION['error']='Old Password not matched';?>

  <?php } else if($new_pass!=$confirm){ ?> 
    <?php $_SESSION['error']='NEW Password and CONFIRM password not Matched';?>

    </script> -->
  <?php } else {


if($_SESSION["user"]=='admin'){
  $sql = "update  admin set `password`='$confirm' where id = '".$_SESSION['id']."'";
}else if($_SESSION["user"]=='doctor'){
  $sql = "update  doctor set `password`='$confirm' where Doctor_Ip = '".$_SESSION['id']."'";
}else if($_SESSION["user"]=='patient'){
  $sql = "update  patient set `password`='$confirm' where patientid = '".$_SESSION['id']."'";
}

  $res = $conn->query($sql);
  ?>
   <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Succes 
    </h3>
    <p>Pass est bien changé...</p>
    <p> 
      <?php echo "<script>setTimeout(\"location.href = 'changepassword.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
  <?php
    
  }
}


?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Change Pass</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="changepassword.php">Change Pass</a>
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">

</div>
<div class="card-block">
<form id="main" method="POST">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Ancien Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password" name="old_password" placeholder="Ancien Password" required="">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Nouveau Pass</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password" name="new_password" placeholder="Tapez le nouveau" required="">
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Confirmé</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="repeat-password" name="confirm_password" placeholder="Retapez le mot de pass" required="">
<span class="messages"></span>
</div>
</div>






<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_password" class="btn btn-primary m-b-0">Confirmer</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</div>
</div>
       

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h3>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h3>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>