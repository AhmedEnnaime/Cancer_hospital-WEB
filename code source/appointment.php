<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');

if(isset($_POST['btn_submit']))
{
  if(isset($_GET['editid']))
  {
    $sql ="UPDATE appointment SET patientid='$_POST[patient]',La_date_du_rendezvous='$_POST[La_date_du_rendezvous]',Le_temps_du_rendezvous='$_POST[Le_temps_du_rendezvous]',Doctor_Ip='$_POST[doctor]',status='$_POST[status]' WHERE appointmentid='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Succes
                </h3>
                <p>Rendez-vous Modifié</p>
                <p>

                 <?php echo "<script>setTimeout(\"location.href = 'appointment.php';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }   
    }
    else
    {
       $sql ="UPDATE patient SET status='Active' WHERE patientid='$_POST[patient]'";
       $qsql=mysqli_query($conn,$sql);

       $sql ="INSERT INTO appointment( patientid,La_date_du_rendezvous,doctorname, Le_temps_du_rendezvous, status, message,raison) values('$_POST[patient]','$_POST[La_date_du_rendezvous]','$_POST[doctorname]','$_POST[Le_temps_du_rendezvous]','$_POST[status]','$_POST[message]','$_POST[raison]')";
        if($qsql = mysqli_query($conn,$sql))
        {

?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Success 
                </h3>
                <p>Rendez-vous Bien inserer</p>
                <p>

                 <?php echo "<script>setTimeout(\"location.href = 'appointment.php?patientid=$_POST[patient]';\",1500);</script>"; ?>
                </p>
              </div>
            </div>
<?php
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
}
if(isset($_GET['editid']))
{
    $sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
    $qsql = mysqli_query($conn,$sql);
    $rsedit = mysqli_fetch_array($qsql);
    
}

?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Rendez-vous</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Rendez-vous</a>
</li>
<li class="breadcrumb-item"><a href="add_user.php">Rendez-vous</a>
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
<form id="main" method="post" action="" enctype="multipart/form-data">
    <?php
        if(isset($_GET['patid']))
        {
            $sqlpatient= "SELECT * FROM patient WHERE patientid='".$_GET['patid']."'";
            $qsqlpatient = mysqli_query($con,$sqlpatient);
            $rspatient=mysqli_fetch_array($qsqlpatient);
            echo $rspatient[patientname] . " (Patient ID - $rspatient[patientid])";
            echo "<input type='hidden' name='select4' value='$rspatient[patientid]'>";
        }
    ?>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Patient</label>
        <div class="col-sm-4">
            <select class="form-control" name="patient" id="patient" required="">
                <option>-- Choisi un --</option>
    <?php
        $sqlpatient= "SELECT * FROM patient WHERE status='Active'";
        $qsqlpatient = mysqli_query($conn,$sqlpatient);
        while($rspatient=mysqli_fetch_array($qsqlpatient))
        {
            if($rspatient[patientid] == $rsedit[patientid])
            {
             echo "<option value='$rspatient[patientid]' selected>$rspatient[patientid] - $rspatient[patientname]</option>";
            }
            else
            {
                echo "<option value='$rspatient[patientid]'>$rspatient[patientid] - $rspatient[patientname]</option>";
            }

        }
    ?>
            </select>
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Raison</label>
        <div class="col-sm-4">
            <select class="form-control" name="raison" id="raison" placeholder="" required="">
                <option value="" selected>-- Choisi une -- </option>
               <option value='Visite' >Visite</option>
                <option value='Cure'>Cure</option>
                       
            </select>
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="La_date_du_rendezvous" id="La_date_du_rendezvous"  required="">
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Temps</label>
        <div class="col-sm-4">
            <input type="time" class="form-control" name="Le_temps_du_rendezvous" id="Le_temps_du_rendezvous" required="">
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Docteur</label>
        <div class="col-sm-4">
            <select class="form-control" name="doctorname" id="doctorname" required="">
                <option value='$rsdoctor[doctorname]'selected>-- Choisi un --</option>
    <?php
        $sqldoctor= "SELECT * FROM doctor WHERE status='Active'";
        $qsqldoctor = mysqli_query($conn,$sqldoctor);
        while($rsdoctor=mysqli_fetch_array($qsqldoctor))
        {
            if($rsdoctor[Doctor_Ip] == $rsedit[Doctor_Ip])
            {
             echo "<option value='$rsdoctor[doctorname]' ><strong>DR.</strong> - $rsdoctor[doctorname]</option>";
            }
            else
            {
                echo "<option value='$rsdoctor[doctorname]'><strong>DR</strong> - $rsdoctor[doctorname]</option>";
            }

        }
    ?>
            </select>
            <span class="messages"></span>
        </div>


        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-4">
            <select name="status" id="status" class="form-control" required="">
                <option value="">-- choisi une -- </option>
                <option value="Approuver" <?php if(isset($_GET['patid']))
        { if($rsedit[status] == 'Approuver') { echo 'selected'; } } ?>>Approuver</option>
                <option value="En attente" <?php if(isset($_GET['patid']))
        { if($rsedit[status] == 'En attente') { echo 'selected'; } } ?>>En attente</option>
            </select>
            <span class="messages"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Message</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="message" id="message" placeholder="Tapez Votre Message...." required=""><?php if(isset($_GET['patid']))
        { echo $rsedit['message']; } ?></textarea>
            <span class="messages"></span>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
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