
<!DOCTYPE html>
<html lang="en">
<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>



 <?php 
 include('connect.php');
  $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);

 ?>   




<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper full-calender">
<div class="page-body">
<div class="row">


<?php
$sql_manage = "select * from manage_website"; 
$result_manage = $conn->query($sql_manage);
$row_manage = mysqli_fetch_array($result_manage);
?>

<?php if($_SESSION['user'] == 'admin'){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white">
    <?php
    $sql = "SELECT * FROM patient WHERE status='Active' and delete_status='0'";
    $qsql = mysqli_query($conn,$sql);
    echo mysqli_num_rows($qsql);
    ?>
</h4>
<h6 class="text-white m-b-0">Total Patient</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-2" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white">
<?php
    $sql = "SELECT * FROM doctor WHERE status='Active' and delete_status='0'";
    $qsql = mysqli_query($conn,$sql);
    echo mysqli_num_rows($qsql);
?>
</h4>
<h6 class="text-white m-b-0">Total Doctor</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-3" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-c-lite-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white">
<?php
    $sql = "SELECT * FROM Appointment WHERE delete_status='0' AND raison='Visite' AND status='Approuver'";
    $qsql = mysqli_query($conn,$sql);
    echo mysqli_num_rows($qsql);
?>
</h4>
<h6 class="text-white m-b-0">Total  Visites
</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>








<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white">
<?php
    $sql = "SELECT * FROM appointment WHERE delete_status='0' AND raison='Cure' AND status='Approuver'";
    $qsql = mysqli_query($conn,$sql);
    echo mysqli_num_rows($qsql);
?>
</h4>
<h6 class="text-white m-b-0">Total Cures
</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>





   
<?php } ?>

</div> 

<?php if($_SESSION['user'] == 'admin'){ ?>
    <div class="row" >
      <div class="col-md-6" >
        <div class="card" >
        
            <div class="card-header">
                <h5>Le nombre des Cures et Visites  ( 7 Jours )</h5>
                
            </div>
            <div class="card-block">
                <div class="ct-chart1 ct-perfect-fourth" id="chart_div"  ></div>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Pourcentage des Cures et Visites</h5>
            </div>
            <div class="card-block">
                <div class="ct-chart1-patient ct-perfect-fourth" id="piechart_3d"></div>
            </div>
        </div>
    </div>
  </div>
  <div class="row" >
      <div class="col-md-6" >
        <div class="card" >
        
            <div class="card-header">
                <h5>Les Toxicités Les Plus Déclarées ( 30 Jours )</h5>
                
            </div>
            <div class="card-block">
                <div class="ct-chart1 ct-perfect-fourth" id="piechart"  ></div>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Le nombre de Cures Par jour</h5>
            </div>
            <div class="card-block">
                <div class="ct-chart1-patient ct-perfect-fourth" id="top_x_div"></div>
            </div>
        </div>
    </div>
  </div>


  <div class="card">
  <div class="card-header">
        <h2>Les Rendez-vous d'aujourd'hui</h2>
  
  </div>
  <div class="card-block">
  <div class="table-responsive dt-responsive">
  <table id="dom-jqry" class="table table-striped table-bordered nowrap">
  <thead>
  <tr>
        <th>Patient Details </th>
        <th>Docteur</th>
        <th>Rendez_vous Details</th>
        <th>Raison</th>
        <th>Status</th>
        <th>Message</th>
  </tr>
  </thead>
  <tbody>
    <?php
      $sql ="SELECT * FROM appointment WHERE (((appointment.La_date_du_rendezvous)= Now()-1)) and delete_status='0';";
      if(isset($_SESSION['patientid']))
      {
        $sql  = $sql . " AND patientid='$_SESSION[patientid]'";
      }
      $qsql = mysqli_query($conn,$sql);
      while($rs = mysqli_fetch_array($qsql))
      {
        $sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]' and delete_status='0'";
        $qsqlpat = mysqli_query($conn,$sqlpat);
        $rspat = mysqli_fetch_array($qsqlpat);
      
      
        $sqldoc= "SELECT * FROM doctor WHERE  delete_status='0'";
        $qsqldoc = mysqli_query($conn,$sqldoc);
        $rsdoc = mysqli_fetch_array($qsqldoc);
          echo "<tr>
            <td>&nbsp;$rspat[patientname]<br>&nbsp;$rspat[mobileno]</td>    
            <td>&nbsp;<strong>Dr</strong>.&nbsp;$rsdoc[doctorname]</td> 
         <td>&nbsp;" . date("d-M-Y",strtotime($rs['La_date_du_rendezvous'])) . " &nbsp; " . date("H:i A",strtotime($rs['Le_temps_du_rendezvous'])) . "</td> 
           <td>&nbsp;$rs[raison]</td>
            <td>&nbsp;$rs[status]</td>
            <td>&nbsp;$rs[message]</td></tr>";
      }
      ?>
  </tbody>
  <tfoot>
  <tr>
        <th>Patients Details</th>
        <th>Docteur</th>
        <th>Rendez_vous Details</th>
        <th>Raison</th>
        <th>Status</th>
        <th>Message</th>
  </tr>
  </tfoot>
  </table>
  </div>
  </div>
  </div>
<?php } ?>

</div>
</div>
</div>
</div>
</div>
</div>


<?php include('footer.php');?>

<link rel="stylesheet" href="files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
<!-- Chartlist charts -->
<script src="files/bower_components/chartist/js/chartist.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="files/assets/pages/chart/chartlist/js/chartist-plugin-threshold.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




<script >

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', ''],
          <?php
  


         $sql = "SELECT raison, count(*) as number from appointment    where La_date_du_rendezvous> now() -  interval 7 day group by raison;";
         $qsql = mysqli_query($conn,$sql);



          while ($result = mysqli_fetch_assoc($qsql)) {
            echo"['".$result['raison']."',".$result['number']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Mise à jour quotidienne',
          hAxis: {title: '', minValue: 0, maxValue: 100},
          vAxis: {title: '', minValue: 0, maxValue: 100},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }


</script>

<script>

    //Second Chat
    

    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
         $sql = "SELECT raison, count(*) as number from appointment group by raison";
         $qsql = mysqli_query($conn,$sql);



          while ($result = mysqli_fetch_assoc($qsql)) {
            echo"['".$result['raison']."',".$result['number']."],";
          }

         ?>
        ]);

        var options = {
          title: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

    
</script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
  


  $sql = "SELECT nom_toxicite,nombre_declaration  as number from toxicite    where date_declaration> now() -  interval 30 day ;";
  $qsql = mysqli_query($conn,$sql);



   while ($result = mysqli_fetch_assoc($qsql)) {
     echo"['".$result['nom_toxicite']."',".$result['number']."],";
   }

  ?>
 ]);

        var options = {
          
          title: 'Mise à jour quotidienne'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Les Jours de La Semaine', 'Nombre de Cures'],
          <?php
  


  $sql = "select  CASE DAYOFWEEK(La_date_du_rendezvous)
  WHEN 1 THEN 'Dimanche'
  WHEN 2 THEN 'Lundi' 
  WHEN 3 THEN 'Mardi' 
  WHEN 4 THEN 'Mercredi'
  WHEN 5 THEN 'Jeudi'
  WHEN 6 THEN 'Vendredi' 
  ELSE 'Samedi'
  END as date, count(*) as cures
  from (SELECT *,DAYOFWEEK(La_date_du_rendezvous) as day FROM Appointment WHERE delete_status='0' AND raison='Cure' AND status='Approuver') as tbl  group by day;";
  $qsql = mysqli_query($conn,$sql);



   while ($result = mysqli_fetch_assoc($qsql)) {
     echo"['".$result['date']."',".$result['cures']."],";
   }

   ?>
  ]);
        var options = {
          chart: {
            title: 'Mise à jour chaque semaine',
      
          }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

