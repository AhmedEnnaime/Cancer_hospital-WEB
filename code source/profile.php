

<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
if(isset($_POST["btn_update"]))
{
    extract($_POST);

    if($_SESSION['user'] == 'admin'){
      $q1="UPDATE admin SET `name`='$name',`email`='$email',`mobileno`='$contact' where id = '".$_SESSION["id"]."'";
    }else if($_SESSION['user'] == 'doctor'){
      $q1="UPDATE doctor SET `doctorname`='$name',`email`='$email',`mobileno`='$contact' where Doctor_Ip = '".$_SESSION["id"]."'";
    }else if($_SESSION['user'] == 'patient'){
      $q1="UPDATE patient SET `patientname`='$name',`email`='$email',`mobileno`='$contact' where patientid = '".$_SESSION["id"]."'";
    }

    if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';

} else {
   
      $_SESSION['error']='Something Went Wrong';
}


  ?>
  <script>

  </script>
  <?php
}

?>

<?php
    if($_SESSION['user'] == 'admin'){
      $que="select * from  admin where id = '".$_SESSION["id"]."'";  
      $query=$conn->query($que);
      while($row=mysqli_fetch_array($query))
      {
        //print_r($row);
        extract($row);
        $name = $row['name'];
        $email = $row['email'];
        $contact = $row['mobileno'];
      }
    }else if($_SESSION['user'] == 'doctor'){
      $que="select * from  doctor where Doctor_Ip = '".$_SESSION["id"]."'";
      $query=$conn->query($que);
      while($row=mysqli_fetch_array($query))
      {
        //print_r($row);
        extract($row);
        $name = $row['doctorname'];
        $email = $row['email'];
        $contact = $row['mobileno'];
      }
    }else if($_SESSION['user'] == 'patient'){
      $que="select * from patient where patientid = '".$_SESSION["id"]."'";
      $query=$conn->query($que);
      while($row=mysqli_fetch_array($query))
      {
        //print_r($row);
        extract($row);
        $name = $row['patientname'];
        $email = $row['email'];
        $contact = $row['mobileno'];
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
<h4>Profile</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>

<li class="breadcrumb-item"><a href="profile.php">Profile</a>
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
<form id="main" method="post" enctype="multipart/form-data">

<div class="form-group row">
<label class="col-sm-2 col-form-label">Nom </label>
<div class="col-sm-4">
<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"  placeholder="Entrer votre nom....">
<span class="messages"></span>
</div>

<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Entrer votre e-mail address..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Contact</label>
<div class="col-sm-4">
<input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $mobileno;?>" placeholder="Entrer votre numero..." minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
<span class="messages"></span>
</div>

</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_update" class="btn btn-primary m-b-0">Modifier</button>
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
      <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
       <?php echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>"; ?>
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
      <button class="button button--error" data-for="js_error-popup">Close</button>
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