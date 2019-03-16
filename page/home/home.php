<div class="table-responsive">
  <table class="table table-bordered boxx" id="person">
     <thead class="thead-light">
       <tr>
         <th>no</th>
         <th>nama daerah</th>
         <th>jumlah penduduk</th>
         <th>total pendapatan</th>
         <th>rata rata pendapatan</th>
         <th>status</th>
       </tr>
     </thead>
     <tbody>
     <?php
     $no=1;
     $hasil=0;
     $sql=mysqli_query($conn,"SELECT distinct name_region, name,count(name) as totname,sum(income) as totincome FROM person JOIN regions ON person.id_regions=regions.id_regions group by name_region")or die(mysqli_error($conn));
     while ($row=mysqli_fetch_assoc($sql)) { 
      $jumlah=$row['totincome']/$row['totname'];
         ?>
        <tr>
          <td><?=$no++?></td>
          <td><?=$row['name_region'];?></td>
          <td><?=$row['totname']?></td>
          <td><?=number_format($row['totincome'])."-,"?></td>
          <td><?=number_format($jumlah)."-,"?></td>
          <td>
          <?php
            if ($jumlah < 1700000) {
              echo "<div class='btn btn-danger'>merah</div>";
            }elseif ($jumlah > 1700000 && $jumlah <2200000) {
              echo "<div class='btn btn-warning'>kuning</div>";
            }elseif ($jumlah > 2200000) {
              echo "<div class='btn btn-info'>hijau</div>";
            }
          ?>
          </td>
          </tr>
     <?php }?>
     </tbody>
  </table>
</div>

