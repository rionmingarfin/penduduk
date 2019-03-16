<div>
<form action="?halaman=pencarian" method="post">
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
      </div>
      
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
     <?php
     $no=1;
     $sql=mysqli_query($conn,"SELECT * FROM person JOIN regions ON person.id_regions=regions.id_regions")or die(mysqli_error($conn));
     while ($row=mysqli_fetch_assoc($sql)) {?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$row['name'];?></td>
          <td><?=number_format($row['income']);?></td>
          <td><?=$row['addres'];?></td>
        </tr>
     <?php }?>
     </tbody>
  </table>
</div>
