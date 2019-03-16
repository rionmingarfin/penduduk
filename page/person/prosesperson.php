<script src="<?=base_url('assets/package/dist/sweetalert2.all.min.js');?>"></script>

<?php
if(isset($_POST['add'])){
    $name =$_POST['name'];
    $region =$_POST['region'];
    $addres =$_POST['addres'];
    $income =$_POST['income'];
    $created_person =date('Y-m-d');

    $sql=mysqli_query($conn,"INSERT INTO person(name,id_regions,addres,income,created_person)VALUES('$name','$region','$addres','$income','$created_person')")or die(mysqli_error($conn));
    if ($sql) {
        ?>
        <script>
        Swal.fire({
            title: 'tambah person',
            text: "data person berhasil ditambahkan",
            type: 'success',     
            confirmButtonText: 'ok'
        }).then((result) => {
            if (result.value) {          
                window.location.href="?halaman=person";
            }
        });      
       </script>
       <?php
    }
}elseif(isset($_POST['update'])){
    $tgl =date('Y-m-d');
    $namee =$_POST['namee'];
    $address =$_POST['address'];
    $regionn =$_POST['regionn'];
    $incomee =$_POST['incomee'];
    $id= $_POST['id'];

    $sql=mysqli_query($conn,"UPDATE person SET name='$namee',id_regions='$regionn',addres='$address',income='$incomee' WHERE id_person='$id'")or die(mysqli_error($conn));
    if ($sql) {
        ?>
        <script>
        Swal.fire({
            title: 'update regions',
            text: "data regions berhasil diupdate",
            type: 'success',     
            confirmButtonText: 'ok'
        }).then((result) => {
            if (result.value) {          
                window.location.href="?halaman=person";
            }
        });      
       </script>
       <?php
    }
}
?>