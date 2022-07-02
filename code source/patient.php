<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_POST['btn_submit']))
{
    if(isset($_GET['editid']))
    {
        $sql ="UPDATE patient SET patientname='$_POST[patientname]',mobileno='$_POST[mobileno]',gender='$_POST[gender]',Age='$_POST[Age]' WHERE patientid='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Succes
                </h3>
                <p>Patient Bien Modifier</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
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
    {/*
        $passw = hash('sha256', $_POST['password']);
        function createSalt()
        {
            return '2123293dsj2hu2nikhiljdsd';
        }
        $salt = createSalt();
        $pass = hash('sha256', $salt . $passw);*/
        $sql ="INSERT INTO patient(patientname,mobileno,email,gender,status,Age,admissiondate) values('$_POST[patientname]','$_POST[mobileno]','$_POST[email]','$_POST[gender]','Active','$_POST[Age]',NOW())";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Succes
                </h3>
                <p>Patient Bien inserer</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-patient.php';\",1500);</script>"; ?>
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
    $sql="SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
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
<h4>Patient</h4>
<!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
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
<li class="breadcrumb-item"><a href="add_user.php">Patient</a>
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
<!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<form id="main" method="post" action="" enctype="multipart/form-data">
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nom du Patient</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="patientname" id="patientname" placeholder="Entrer le nom...." required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['patientname']; } ?>" >
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Numero de Telephone</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="mobileno" id="mobileno" placeholder="Entrer votre mobilenumber...." required="" value="<?php if(isset($_GET['editid'])) { echo  $rsedit['mobileno'];} ?>">
            <span class="messages"></span>
        </div>
    </div>




<?php 
  if(!isset($_GET['editid']))
  {
?>
   <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            <input class="form-control" type="email" name="email" id="email" placeholder="Entrer votre email...." required="" value="<?php if(isset($_GET['editid'])) { echo  $rsedit['email'];} ?>">
            <span class="messages"></span>
        </div>

       <label class="col-sm-2 col-form-label">Doctor</label>
        <div class="col-sm-4">
            <select name="doctor" name="doctor" class="form-control">
            <option value=""> Doctor</option>
            <?php
                $sqldoctor= "SELECT * FROM doctor WHERE doctor.status='Active'AND doctor.delete_status='0 '";
                $qsqldoctor = mysqli_query($conn,$sqldoctor);
                while($rsdoctor = mysqli_fetch_array($qsqldoctor))
                {
                    if(isset($_GET['patid'])){
                        if($rsdoctor['Doctor_Ip'] == $rsedit['Doctor_Ip'])
                        {
                            echo "<option value='$rsdoctor[Doctor_Ip]' selected>$rsdoctor[doctorname] </option>";
                        }
                        else
                        {
                            echo "<option value='$rsdoctor[Doctor_Ip]'>$rsdoctor[doctorname] </option>";                
                        }
                    }else{
                        echo "<option value='$rsdoctor[Doctor_Ip]'>$rsdoctor[doctorname] </option>";  
                    } 
                }
            ?>
            </select>
        </div>
    </div>
<?php } ?>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Sex</label>
        <div class="col-sm-4">
            <select name="gender" id="gender" class="form-control" required="">
                <option value="">-- Choisi Un  -- </option>
                <option value="Male" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Male') { echo 'selected'; } } ?>>Male</option>
                <option value="Female" <?php if(isset($_GET['editid']))
                    { if($rsedit['gender'] == 'Femelle') { echo 'selected'; } } ?>>Femelle</option>
            </select>
        </div>
        <label class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="Age" id="Age" placeholder="Entrer Age...." required="" value="<?php if(isset($_GET['editid'])) { echo $rsedit['Age'];} ?>">
            <span class="messages"></span>
        </div>
       
    </div>

   


    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Confirmer</button>
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

<script type="text/javascript">
    $('#main').keyup(function(){
        $('#confirm-pw').html('');
    });

    $('#cnfirmpassword').change(function(){
        if($('#cnfirmpassword').val() != $('#password').val()){
            $('#confirm-pw').html('Password Not Match');
        }
    });

    $('#password').change(function(){
        if($('#cnfirmpassword').val() != $('#password').val()){
            $('#confirm-pw').html('Password Not Match');
        }
    });
</script>