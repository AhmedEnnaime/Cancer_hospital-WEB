<?php
  include('connect.php');
$que="select * from manage_website";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

  extract($row);
  $addr = $row['addr'];
  $business_name = $row['business_name'];



}
?>
            <footer class="footer text-center" ><marquee behavior="alternate">© 2022 PFE Projet <a href="#"  target="_blank" style="color: yellow;"><?php echo "$addr  ";?><strong><?php echo "$business_name  ";?>
       
</a></marquee></footer> 


        </div>
     
    </div>
  


<script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>




<script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>



<script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="files/assets/pages/data-table/js/data-table-custom.js"></script>


<script src="files/assets/js/pcoded.min.js"></script>

<script src="files/assets/js/vartical-layout.min.js"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="files/assets/js/jquery.mousewheel.min.js"></script>

<script type="text/javascript" src="files/assets/js/script.min.js"></script>
<script type="text/javascript" src="files/assets/js/script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>


</body>


</html>
