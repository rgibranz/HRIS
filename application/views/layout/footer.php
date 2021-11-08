</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    HRIS
  </div>
  <!-- Default to the left -->
  <?php
  $ctahun = explode("-", date("d-m-Y"));

  ?>
  <strong>Copyright &copy; <?= $ctahun[2]; ?> Korpora Trainindo Consultant.</strong>
</footer>
</div>
<!-- ./wrapper -->


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove()
    });
  }, 3000)
</script>

<script>
  $(document).ready(function() {
    $('#log_out').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Yakin ingin Logout?',
        imageWidth: 150,
        imageAlt: 'Custom image',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: 'rgb(28, 173, 28)',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Batal',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger mr-3',
        reverseButtons: true,
        buttonsStyling: false
      }).then(function(result) {
        if (result.value) {
          document.location.href = href;
        }
      })
    })
  })
</script>

</body>

</html>