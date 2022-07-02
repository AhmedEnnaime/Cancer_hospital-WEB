 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $ro=mysqli_fetch_array($result);

 ?>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigatio-lavel">Navigation</div>
<ul class="pcoded-item pcoded-left-item">
<li class="">
<a href="index.php">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>

<?php if(($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor') || ($_SESSION['user'] == 'patient')){ ?>
<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
        <span class="pcoded-mtext">Les Rendez-vous</span>
    </a>
    <ul class="pcoded-submenu">
    <?php if(($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'patient')) { ?>
        <li class="">
            <a href="appointment.php">
                <span class="pcoded-mtext">Nouveau Rendez-vous</span>
            </a>
        </li>
    <?php } ?>
    <?php if(($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor')) { ?>
        <li class="">
            <a href="view-pending-appointment.php">
                <span class="pcoded-mtext">Rendez-vous en attente</span>
            </a>
        </li>
        <li class="">
            <a href="view-appointments-approved.php">
                <span class="pcoded-mtext">Rendez-vous Approuvé</span>
            </a>
        </li>
    <?php } ?>
    <?php if($_SESSION['user'] == 'patient') { ?>
        <li class="">
            <a href="view-appointments.php">
                <span class="pcoded-mtext">Liste des Rendez-vous</span>
            </a>
        </li>
    <?php } ?>
    </ul>
</li>
<?php } ?>

<?php if($_SESSION['user'] == 'admin') { ?>
<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
        <span class="pcoded-mtext">Docteurs</span>
    </a>
    <ul class="pcoded-submenu">
   
        <li class="">
            <a href="doctor.php">
                <span class="pcoded-mtext">Nouveau Docteur</span>
            </a>
        </li>

        <li class="">
            <a href="view-doctor.php">
                <span class="pcoded-mtext">Liste des Docteurs</span>
            </a>
        </li>
    </ul>
</li>
<?php } ?>








<?php if(($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor')) { ?>
<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
        <span class="pcoded-mtext">Patients</span>
    </a>
    <ul class="pcoded-submenu">
    <?php if($_SESSION['user'] == 'admin') { ?>
        <li class="">
            <a href="patient.php">
                <span class="pcoded-mtext">Ajouter Patient</span>
            </a>
        </li>
    <?php } ?>
        <li class="">
            <a href="view-patient.php">
                <span class="pcoded-mtext">Liste des Patients</span>
            </a>
        </li>
    </ul>
</li>
<?php } ?>





<li class="">
<a href="historique.php">
<span class="pcoded-micon"><i class="feather icon-menu"></i></span>
<span class="pcoded-mtext">Historique</span>
</a>
</li> 

<li class="">
<a href="setting.php">
<span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
<span class="pcoded-mtext">Parametres</span>
</a>
</li> 

<li>
<a href="logout.php">
<i class="feather icon-log-out"></i> Deconnection
</a>
</li>
</ul>
</div>
</nav>

