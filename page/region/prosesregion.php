<script src="<?=base_url('assets/package/dist/sweetalert2.all.min.js');?>"></script>

<?php
if(isset($_POST['add'])){
    $name =$_POST['region'];
    $created_regions =date('Y-m-d');

    $sql=mysqli_query($conn,"INSERT INTO regions(name_region,created_region)VALUES('$name','$created_regions')")or die(mysqli_error($conn));
    if ($sql) {
        ?>
        <script>
        Swal.fire({
            title: 'tambah regions',
            text: "data regions berhasil ditambahkan",
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