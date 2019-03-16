<script src="<?=base_url('assets/package/dist/sweetalert2.all.min.js');?>"></script>
<?php
$id_person=$_GET['id'];
if (isset($_GET['id'])) {
    $sql=mysqli_query($conn,"DELETE FROM regions WHERE id_regions='$id_person'")or die(mysqli_error($conn));
  if ($sql) {
      ?>
       <script>
         Swal.fire({
            title: 'data terhapus',
            text: "person berhasil dihapus",
            type: 'success',     
            confirmButtonText: 'ok'
        }).then((result) => {
            if (result.value) {          
                window.location.href="?halaman=region";
            }
        });
       </script>
      <?php
  }
}
?>