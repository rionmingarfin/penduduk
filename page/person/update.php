<form action="?halaman=prosesperson" method="post">
    <?php
    $id=$_GET['id'];
    $sql=mysqli_query($conn,"SELECT * FROM person WHERE id_person='$id'")or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($sql);
    ?>
    <div class="form-group">
        <input type="hidden" name="id" value="<?=$row['id_person']?>">
        <input type="hidden" name="tgl" value="<?=$row['created_person']?>">
        <label for="name">name person</label>
        <input type="text" class="form-control" name="namee" id="name" value="<?=$row['name']?>" required>
    </div>
    <div class="form-group">
              <label for="region">pilih region</label>
              <select name="regionn" id="region"  class="form-control" required>
                  <option value="">--pilih regions--</option>
                  <?php
             $query=mysqli_query($conn,"SELECT * FROM regions");
             while ($data=mysqli_fetch_assoc($query)) {?>
                 <option value="<?=$data['id_regions'];?>">
                  <?=$data['name_region'];?>
                 </option>
             <?php }?>
                </select>
          </div>
    <div class="form-group">
        <label for="addres">addres person</label>
        <input type="text" class="form-control" name="address" id="addres" value="<?=$row['addres']?>" required>
    </div>
    <div class="form-group">
        <label for="income">income person</label>
        <input type="text" class="form-control" name="incomee" id="income" value="<?=$row['income']?>" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update" value="kirim">
    </div>
</form>