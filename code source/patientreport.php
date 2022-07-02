
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_GET['delid']))
{
  $sql ="UPDATE appointment SET delete_status='1' WHERE appointmentid='$_GET[delid]'";
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
        <p>Enregistrement de rendez-vous supprimé avec succès.</p>
        <p>
         <?php echo "<script>setTimeout(\"location.href = 'view-pending-appointment.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
 <?php
   
  }
}
if(isset($_GET['approveid']))
{
  $sql ="UPDATE patient SET status='Active' WHERE patientid='$_GET[patientid]'";
  $qsql=mysqli_query($conn,$sql);
  
  $sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
  $qsql=mysqli_query($conn,$sql);
  if(mysqli_affected_rows($conn) == 1)
  {
?>
     <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          Success 
        </h3>
        <p>Enregistrement de rendez-vous Approuvé avec succès.</p>
        <p>

         <?php echo "<script>setTimeout(\"location.href = 'view-pending-appointment.php';\",1500);</script>"; ?>
        </p>
      </div>
    </div>
 <?php

  } 
}
?>
?>
<?php
if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>êtes-vous sûr de supprimer cet enregistrement ?</p>
    <p>
      <a href="view-pending-appointment.php?delid=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view-pending-appointment.php" class="button button--error" data-for="js_success-popup">No</a>
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
<h4> Rapport du Patient</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Rapport du Patient</a>
</li>
<li class="breadcrumb-item"><a href="#">Rapport</a>
</li>
</ul>
</div>
</div>
</div>
</div>



<div class="row" >
      <div class="col-md-6" >
        <div class="card" >
        
            <div class="card-header">
                <h5>Historique des Cures</h5>
                <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Date </th>
      <th scope="col">Prochaine Cure</th>
       <th scope="col">Jours restants</th>
       <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  
  <tr>
     
  <th scope="row">2022-06-08</th>
      <td>2022-06-20</td>
      <td>12</td>
      <td>En attente</td>
    </tr>
    <tr>
     
    <th scope="row">2022-06-04</th>
     <td>2022-06-08</td>
     <td>4</td>
     <td>Faite</td>
   </tr>
  <tr>
     
  <th scope="row">2022-06-01</th>
      <td>2022-06-04</td>
      <td>3</td>
      <td>Faite</td>
    </tr>
  </tbody>
</table>
            </div>
            <div class="card-block">
                <div class="ct-chart1 ct-perfect-fourth" id="piechart"  ></div>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Les Toxicités déclarées</h5>
                <table class="table">
  <thead>
    <tr>

      <th scope="col">Date de Déclaration</th>
      <th scope="col">Toxicité</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">2022-06-08</th>
      <td>Digestive</td>
    </tr>
    <tr>
      <th scope="row">2022-06-08</th>
      <td>Digestive</td>

    </tr>
    <tr>
      <th scope="row">2022-06-08</th>
      <td>Cutane</td>

    </tr>
  </tbody>
</table>
            </div>
      
            <div class="card-block">
                <div class="ct-chart1-patient ct-perfect-fourth" id="table_div"></div>
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
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
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
     <?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
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



