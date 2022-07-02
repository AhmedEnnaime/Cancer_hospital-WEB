

<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_GET['id']))
{
  $sql ="UPDATE patient SET delete_status='1' WHERE patientid='$_GET[id]'";
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
            <p>Dossier patient supprimé avec succès.</p>
            <p>
             
             <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
            </p>
          </div>
        </div>
<?php

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
      Bien sur
    </h1>
    <p>Êtes-vous sûr de supprimer cet enregistrement ?</p>
    <p>
      <a href="view-patient.php?id=<?php echo $_GET['delid']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view-patient.php" class="button button--error" data-for="js_success-popup">No</a>
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
<h4>Patient</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Patient</a>
</li>
<li class="breadcrumb-item"><a href="view-patient.php">Patient</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
</div>
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
    <th>Nom & Prenom</th>
    <th>Admission details</th>
    <th>Telephone</th>    
    <th>Patient Profile</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
  $sql ="SELECT * FROM patient where delete_status='0'";
  $qsql = mysqli_query($conn,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {

    echo "<tr>
        <td>$rs[patientname]<br></td>
       
        <td>
        <strong>Date</strong>: &nbsp;$rs[admissiondate]<br></td>
        <td> <strong> Email  :</strong> $rs[email] <br><strong>
        Mob Num. -</strong> $rs[mobileno]
        <br><strong>
        Age. -</strong> $rs[Age]</td>
        <td>
        <strong>Sex</strong> - &nbsp;$rs[gender]<br>
        <td align='center'>Status - $rs[status] <br>";
        if(isset($_SESSION['adminid']))
        {
          echo "<a href='patient.php?editid=$rs[patientid]' class='btn btn-primary'>Modifier</a>
          <a href='view-patient.php?delid=$rs[patientid]' class='btn btn-danger'>Supprimer</a> <hr>
          <a href='patientreport.php?patientid=$rs[patientid]' class='btn btn-success'>Voir l'Historique</a>";
        }
        echo "</td></tr>";
      }    
?>
</tbody>
<tfoot>
<tr> 
  <th>Nom & Prenom</th>
    <th>Admission details</th>
    <th>Telephone</th>    
    <th>Patient Profile</th>
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
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
     <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
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
     <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
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