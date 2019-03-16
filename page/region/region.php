<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">tambah regions</button>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">tambah regions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?halaman=prosesregion" method="post">
            <div class="form-group">
              <label for="region">regions</label>
              <input type="text" class="form-control" name="region" id="region" required>
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
  <table class="table table-bordered boxx" id="pembayaran">
     <thead class="thead-light">
       <tr>
         <th>no</th>
         <th>regions</th>
         <th>tanggal</th>
         <!-- <th>aksi</th> -->
       </tr>
     </thead>
     <tbody>
     <?php
     $no=1;
     $sql=mysqli_query($conn,"SELECT * FROM regions")or die(mysqli_error($conn));
     while ($row=mysqli_fetch_assoc($sql)) {?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$row['name_region'];?></td>
          <td><?=$row['created_region'];?></td>
          <!-- <td>
          <a href="?halaman=hapusregion&id=<?=$row['id_regions']?>"  class="btn btn-danger" onclick="return confirm('yakin menghapus data ini')">hapus</a>
          </td> -->
        </tr>
     <?php }?>
     </tbody>
  </table>
</div>