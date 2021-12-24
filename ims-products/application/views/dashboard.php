<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <iframe src="" width="100%" height="700" frameborder="0" id="iframe"></iframe>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  document.getElementById("iframe").src = window.location.href.replace("ims-products/dashboard","products-request")
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#dashboardMainMenu").addClass('active');
  });
</script>