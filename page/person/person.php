<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahperson">tambah person</button>

<!-- Modal -->
<div class="modal fade" id="tambahperson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">tambah person</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?halaman=prosesperson" method="post">
            <div class="form-group">
              <label for="name">name person</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label for="region">pilih region</label>
              <select name="region" id="region"  class="form-control">
                  <option value="">--pilih regions--</option>
                  <?php
             $query=mysqli_query($conn,"SELECT * FROM regions");
             while ($row=mysqli_fetch_assoc($query)) {?>
                 <option value="<?=$row['id_regions'];?>">
                  <?=$row['name_region'];?>
                 </option>
             <?php }?>
                </select>
          </div>
            <div class="form-group">
              <label for="addres">addres person</label>
              <input type="text" class="form-control" name="addres" id="addres" required>
            </div>
            <div class="form-group">
              <label for="income">income person</label>
              <input type="number" class="form-control" name="income" id="income" required>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="add" value="kirim">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-bordered boxx" id="person">
     <thead class="thead-light">
       <tr>
         <th>no</th>
         <th>name</th>
         <th>region</th>
         <th>addres</th>
         <th>income</th>
         <th>date</th>
         <th>aksi</th>
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
          <td><?=$row['name_region'];?></td>
          <td><?=$row['addres'];?></td>
          <td><?=number_format($row['income']);?></td>
          <td><?=$row['created_person'];?></td>
          <td>
               <a href="?halaman=update&id=<?=$row['id_person']?>"  class="btn btn-info">update</a>
               <a href="?halaman=hapus&id=<?=$row['id_person']?>"  class="btn btn-danger" onclick="return confirm('yakin menghapus data ini')">hapus</a>
          </td>
        </tr>
     <?php }?>
     </tbody>
  </table>
</div>