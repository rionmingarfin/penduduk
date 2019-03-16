<script src="<?=base_url('assets/package/dist/sweetalert2.all.min.js');?>"></script>
<?php
session_destroy();
?>
<script>
Swal.fire({
    title: 'logout',
    text: "anda sudah berhasil logout",
    type: 'success',     
    confirmButtonText: 'ok'
}).then((result) => {
    if (result.value) {          
     window.location.href="login.php";
    }
});   
</script>
<?php
?>