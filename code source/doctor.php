<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');
if(isset($_POST['btn_submit']))
{
    if(isset($_GET['editid']))
    {
        $sql ="UPDATE doctor SET doctorname='$_POST[doctorname]',Sex='$_POST[Sex]',Age='$_POST[Age]',mobileno='$_POST[mobilenumber]',email='$_POST[email]',status='$_POST[status]' WHERE Doctor_Ip='$_GET[editid]'";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Succes
                </h3>
                <p>Doctor est bien modifé</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
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
        $sql ="INSERT INTO doctor(doctorname,mobileno,email,Age,Sex,status) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[email]','$_POST[Age]','$_POST[Sex]','$_POST[status]')";
        if($qsql = mysqli_query($conn,$sql))
        {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                  Succes
                </h3>
                <p>Doctor est bien inseré</p>
                <p>
                 <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                 <?php echo "<script>setTimeout(\"location.href = 'view-doctor.php';\",1500);</script>"; ?>
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
    $sql="SELECT * FROM doctor WHERE Doctor_Ip='$_GET[editid]' ";
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
<h4>Doctor</h4>
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
<li class="breadcrumb-item"><a>Doctor</a>
</li>
<li class="breadcrumb-item"><a href="add_user.php">Doctor</a>
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
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nom & Prenom </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="doctorname" id="doctorname" placeholder="Entrer Nom...." required=""  value="<?php if(isset($_GET['editid'])) { echo $rsedit['doctorname']; } ?>" >
            <span class="messages"></span>
        </div>

        <label class="col-sm-2 col-form-label">Telephone</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Entrer numero...." required="" value="<?php if(isset($_GET['editid'])) { echo $rsedit['mobileno'];} ?>">
            <span class="messages"></span>
        </div>
    </div>



    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input type="email" class="form-control" name="email" id="email" placeholder="Entrer email...." required=""  value=" <?php 
            if(isset($_GET['editid'])) { echo $rsedit['email']; } ?>" />
        </div>
        <label class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-4">
        <input type="number" class="form-control" name="Age" id="Age" placeholder="Entrer l'Age..." required="" value="<?php if(isset($_GET['editid'])) { echo $rsedit['Age']; } ?>"/>
        </div>   
        
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Sexe</label>
        <div class="col-sm-4">
        <select name="Sex" id="Sex" class="form-control" required="">
                <option value="">-- Choisi un -- </option>
                <option value="Male" <?php if(isset($_GET['editid']))
        { if($rsedit['Sex'] == 'Male') { echo 'selected'; } } ?>>Male</option>
                <option value="Femelle" <?php if(isset($_GET['editid']))
        { if($rsedit['Sex'] == 'Femelle') { echo 'selected'; } } ?>>Femelle</option>
            </select>
            <span class="messages"></span>
            
        </div>        

        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-4">
            <select name="status" id="status" class="form-control" required="">
                <option value="">-- choisi un -- </option>
                <option value="Active" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Active') { echo 'selected'; } } ?>>Active</option>
                <option value="Inactive" <?php if(isset($_GET['editid']))
        { if($rsedit['status'] == 'Inactive') { echo 'selected'; } } ?>>Inactive</option>
            </select>
            <span class="messages"></span>
        </div>
    </div>
    


    <div class="form-group row">
        <label class="col-sm-2"></label>
        <div class="col-sm-10">
            <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Confirme</button>
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