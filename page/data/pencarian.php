<div>
 <a href="?halaman=data_penduduk" class="btn btn-info pull-right">tampil semua</a>
</div>
<form action="" method="post">
<div class="form-group">
    <label for="region">pilih region</label>
    <select name="pencarian" id="region"  class="form-control" required>
        <option value="">--pilih regions--</option>
        <?php
    $query=mysqli_query($conn,"SELECT * FROM regions");
    while ($data=mysqli_fetch_assoc($query)) {?>
        <option value="<?=$data['name_region'];?>">
        <?=$data['name_region'];?>
        </option>
    <?php }?>
      </select>
      <button type="submit" class="btn btn-primary">filter</button>
</div>
</form>

<?php
$pencarian = $_POST['pencarian'];
$semuadata=array();
$sql=mysqli_query($conn,"SELECT * FROM person JOIN regions ON person.id_regions=regions.id_regions WHERE name_region LIKE '%$pencarian%'")or die(mysqli_error($conn));
while ($ambil=mysqli_fetch_assoc($sql)) {
    $semuadata[]=$ambil;
}
// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>

<h3>hasil pencarian :<?=$pencarian ?></h3>
<div class="table-responsive">
  <table class="table table-bordered boxx" id="tampil">
     <thead class="thead-light">
       <tr>
         <th>no</th>
         <th>name</th>
         <th>income</th>
         <th>addres</th>
       </tr>
     </thead>
     <tbody>
     <?php $no=1;?>
     <?php foreach($semuadata as $row) :?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$row['name'];?></td>
          <td><?=number_format($row['income']);?></td>
          <td><?=$row['addres'];?></td>
        </tr>
        <?php endforeach ?>
     </tbody>
  </table>
</div>