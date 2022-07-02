
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
<li class="breadcrumb-item"><a>Rapport</a>
</li>
<li class="breadcrumb-item"><a href="#">Rapport</a>
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

</div>
<div class="card-block">
  <div class="row">
      <div class="col-lg-12">
          <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profil du patient</a>
                  <div class="slide"></div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profiledoctor" role="tab">Profil du docteur</a>
                  <div class="slide"></div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#appointment" role="tab">Dossier de rendez-vous </a>
                  <div class="slide"></div>
              </li>
              
              
         </ul>
   
          <div class="tab-content tabs-left-content card-block">
              <div class="tab-pane active" id="profile" role="tabpanel">
                  <p class="m-0">
              <?php
                $sqlpatient = "SELECT * FROM patient where patientid='$_GET[patientid]'";
                $qsqlpatient = mysqli_query($conn,$sqlpatient);
                $rspatient=mysqli_fetch_array($qsqlpatient);
              ?>

                  <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                      <tbody>
                        <tr>
                          <th>Nom du Patient</th>
                          <td>&nbsp;<?php echo $rspatient['patientname']; ?></td>
                          <th>Patient ID</th>
                          <td>&nbsp;<?php echo $rspatient['patientid']; ?></td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>&nbsp;<?php  echo $rspatient['mobileno']; ?></td>
                          <th>Email</th>
                          <td> <?php echo $rspatient['email'];?></td>
                        </tr>
                        <tr>
                          <th>Sexe</th>
                          <td>&nbsp;<?php echo $rspatient['gender']; ?></td>
                          <th>Age </th>
                          <td>&nbsp;<?php   echo $rspatient['Age']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  </p>
              </div>




              <div class="tab-pane" id="profiledoctor" role="tabpanel">
                  <p class="m-0">
                  <?php 
                   
        
                   $sqlappointment = "SELECT * FROM (SELECT doctorname FROM patient join appointment where patient.patientid='$_GET[patientid]' and appointment.appointmentid='$_GET[appointmentid]' ) as t join doctor where t.doctorname=doctor.doctorname;";
                   $qsqlappointment = mysqli_query($conn,$sqlappointment);
                   $rsappointment=mysqli_fetch_array($qsqlappointment);
   ?>
        
                    <div class="table-responsive dt-responsive">
                      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                      <tbody>
                        <tr>
                          <th>Nom du Docteur</th>
                          <td>&nbsp;<?php echo $rsappointment['doctorname']; ?></td>
                          <th>Docteur ID</th>
                          <td>&nbsp;<?php echo $rsappointment['Doctor_Ip']; ?></td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>&nbsp;<?php  echo $rsappointment['mobileno']; ?></td>
                          <th>Email</th>
                          <td> <?php echo $rsappointment['email'];?></td>
                        </tr>
                        <tr>
                          <th>Sexe</th>
                          <td>&nbsp;<?php echo $rsappointment['Sex']; ?></td>
                          <th>Age </th>
                          <td>&nbsp;<?php   echo $rsappointment['Age']; ?></td>
                        </tr>
                      </tbody>
                      </table>
                    </div>
                  </p>
              </div>
              
              

              
              <div class="tab-pane" id="appointment" role="tabpanel">
                  <p class="m-0">
                  <?php 
  
          
          $sqlappointment = "SELECT * FROM patient join appointment where patient.patientid=$_GET[patientid] and appointment.appointmentid=$_GET[appointmentid] ";
          $qsqlappointment = mysqli_query($conn,$sqlappointment);
          $rsappointment=mysqli_fetch_array($qsqlappointment);

         
        ?>
                    <div class="table-responsive dt-responsive">
                      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                        <tr>
                          <th>Raison</th>
                          <td>&nbsp;<?php echo  $rsappointment['raison']; ?></td>
                        </tr>
                        <tr>
                          <th>Docteur</th>
                          <td>&nbsp;<?php echo $rsappointment['doctorname']; ?></td>
                        </tr>
                        <tr>
                          <th>Date de rendez-vous</th>
                          <td>&nbsp;<?php echo date("d-M-Y",strtotime($rsappointment['La_date_du_rendezvous'])); ?></td>
                        </tr>
                        <tr>
                          <th>Heure de rendez-vous </th>
                          <td>&nbsp;<?php echo date("h:i A",strtotime($rsappointment['Le_temps_du_rendezvous'])); ?></td>
                        </tr>
                      </table>
                    </div>
                  </p>
              </div>
              
              
                      </table>
                    </div>
                  </p>
              </div>

              
                          </div>
          </div>
      </div>
      
  </div>
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