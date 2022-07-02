
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_GET['id']))
{
  $sql ="UPDATE doctor SET delete_status='1' WHERE Doctor_Ip='$_GET[id]'";
  $qsql=mysqli_query($conn,$sql);
  if(mysqli_affected_rows($conn) == 1)
  {
    ?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Succes 
            </h3>
            <p>Docteur Bien Supprimer.</p>
            <p>
             <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
             <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
<?php
    //echo "<script>alert('Dcctor record deleted successfully..');</script>";
    //echo "<script>window.location='view-doctor.php';</script>";
  }
}
?>
<?php
if(isset($_GET['delid']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
  Bien Sur

    </h1>
    <p>Êtes-vous sûr de supprimer cet enregistrement?</p>
    <p>
      <a href="view-doctor.php?id=<?php echo $_GET['delid']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view-doctor.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Docteur</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Docteur</a>
</li>
<li class="breadcrumb-item"><a href="view-doctor.php">Docteur</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
    </div>
<!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
</div>
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
    <th>Nom & Prenom</th>
    <th> Numero de telephone</th>
    <th>Sex</th>
    <th>Age</th>
    <th>Mail</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
  $sql ="SELECT * FROM doctor where delete_status='0'";
  $qsql = mysqli_query($conn,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {


    echo "<tr>
    <td>&nbsp;$rs[doctorname]</td>
    <td>&nbsp;$rs[mobileno]</td>
    <td>&nbsp;$rs[Sex]</td>
    <td>&nbsp;$rs[Age]</td>
    <td>&nbsp;$rs[email]</td>
    <td>$rs[status]</td>
    <td>&nbsp;
    <a href='doctor.php?editid=$rs[Doctor_Ip]' class='btn btn-primary'>Modifier</a> <a href='view-doctor.php?delid=$rs[Doctor_Ip]' class='btn btn-danger'>Supprimer</a> </td>
    </tr>";
  }        
?>
</tbody>
<tfoot>
<tr>
<th>Nom & Prenom</th>
    <th> Numero de telephone</th>
    <th>Sex</th>
    <th>Age</th>
    <th>Mail</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</tfoot>
</table>
</div>
</div>
</div>







</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Succes 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
      <!-- <button class="button button--success" data-for="js_success-popup">Close</button> -->
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
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
     <!--  <button class="button button--error" data-for="js_error-popup">Close</button> -->
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