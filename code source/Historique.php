<!DOCTYPE html>
<html lang="en">
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<?php date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_web"]))
{
  extract($_POST);
  if($_FILES['logo']['name']!=''){
      $file_name = $_FILES['logo']['name'];
      $file_type = $_FILES['logo']['type'];
      $file_size = $_FILES['logo']['size'];
      $file_tem_loc = $_FILES['logo']['tmp_name'];
      $file_store = "uploadImage/Logo/".$file_name;

      if (move_uploaded_file($file_tem_loc, $file_store)) {
        echo "file uploaded successfully";
      }
  }
  else{
    $file_name=$_POST['old_image'];
  } 
      $folder = "uploadImage/Logo/";

      if (is_dir($folder)) 
      {
         if ($open = opendir($folder))

          while (($logo=readdir($open)) !=false) {
              
              if($logo=='.'|| $logo=="..") continue;

              echo '<img src="uploadImage/Logo/'.$logo.'" width="100" height="100">';
          }

          closedir($open);
        } 
 
   $q1="UPDATE `manage_website` SET `business_name`='$business_name',`business_email`='$business_email',`business_web`='$business_web',`portal_addr`='$portal_addr' ,`addr`= '$addr' , `date_format` = '$date_format' , `logo` = '$file_name'";
  if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
      <script type="text/javascript">
        window.location = "setting.php";
      </script>
      <?php 

} else {
   
      $_SESSION['error']='Something Went Wrong';
}
  ?>
  <script>

  </script>
  <?php
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
<h4>Historique</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>

<li class="breadcrumb-item"><a href="setting.php">Historique</a>
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

<div class="card-block">

<div class="row">
<div class="col-lg-12 col-xl-12">
 <div class="sub-title">Historique Générale</div>

<ul class="nav nav-tabs  tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab"  href="#general" role="tab"> Toxicité Digestive</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab"  href="#cutane" role="tab">Toxicité Cutané</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab"  href="#arth" role="tab">Toxicité Arthromyalgique</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab"  href="#neuro" role="tab">Toxicité Neurologique</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab"  href="#ocuul" role="tab">Toxicité Oculaire</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab"  href="#gona" role="tab">Toxicité Gonadique</a>
</li>

</ul>


<div class="tab-content tabs-left-content card-block">
              <div class="tab-pane active" id="general" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr><th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date de declaration</th>
                          <th>Grade nausées</th>
                          <th>Grade diarrhées</th>
                          <th>Grade constipation</th>
                          <th>Grade mucite</th>
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM digestive_symptome  INNER JOIN patient  ON digestive_symptome.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade_de_nausées]</td>
    <td>&nbsp;$rspatient[Grade_de_diarrhées]</td>
    <td>&nbsp;$rspatient[Grade_de_constipation]</td>
    <td>&nbsp;$rspatient[Grade_de_mucite]</td>
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>
<div class="tab-pane " id="cutane" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr><th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date de declaration</th>
                          <th>Grade rash cutanée</th>
                          <th>Grade mains et pieds</th>
                          <th>Grade ongles</th>
                         
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM cutane_symptome  INNER JOIN patient  ON cutane_symptome.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade_de_rash_cutanée]</td>
    <td>&nbsp;$rspatient[Grade_de_mains_et_pieds]</td>
    <td>&nbsp;$rspatient[Grade_des_ongles]</td>
  
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>
<div class="tab-pane " id="arth" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr><th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date_de_declaration</th>
                          <th>Grade</th>
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM arthromyalgique  INNER JOIN patient  ON arthromyalgique.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade]</td>
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>

<div class="tab-pane " id="neuro" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr>
<th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date_de_declaration</th>
                          <th>Grade</th>
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM neurologique  INNER JOIN patient  ON neurologique.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade]</td>
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>


<div class="tab-pane " id="ocuul" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr>
<th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date_de_declaration</th>
                          <th>Grade</th>
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM oculaire  INNER JOIN patient  ON oculaire.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade]</td>
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>




<div class="tab-pane " id="gona" role="tab">
                  <p class="m-0">
             

                  <div class="table-responsive dt-responsive">
                    <table  class="table table-striped table-bordered nowrap">
                  
<thead>
<tr>
                          <th>Nom du Patient</th>
                          <th>Téléphone</th>
                          <th>Email</th>
                          <th>Sex</th>
                          <th>Age</th>
                
                          <th>Date_de_declaration</th>
                          <th>Grade</th>
</tr>
</thead>
<tbody>
<?php

$sqlpatient = "SELECT * FROM gonadique  INNER JOIN patient  ON gonadique.Patient_Ip=patient.patientid" ;
$qsqlpatient = mysqli_query($conn,$sqlpatient);

  while($rspatient=mysqli_fetch_array($qsqlpatient))
  {
    

    echo "<tr>
    <td>&nbsp;$rspatient[patientname]</td>
    
    <td>&nbsp;$rspatient[mobileno]</td>
    <td>&nbsp;$rspatient[email]</td>
    <td>&nbsp;$rspatient[gender]</td>
    <td>&nbsp;$rspatient[Age]</td>
   
    <td>&nbsp;$rspatient[Date_de_declaration]</td>
    <td>&nbsp;$rspatient[Grade]</td>
    </tr>
   ";
  }        
?>
</tbody>
<tfoot>

</tfoot>
</table>
</div>
</div>













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
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>



<?php include('footer.php');?>


































