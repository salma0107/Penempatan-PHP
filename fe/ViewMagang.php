<?php 
require_once '../Magang.php';
$magang = new Magang();
$listMagang = $magang->view();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIEW MAGANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <div class="bg-secondary text-white">
      <br>
    <h1 class="text-center font-monospace"><b>-->> Aplikasi Penempatan Kerja <<--</b></h1>
       <br>
    </div>

    <br>
    <div class="container">
      <?php 
      if (empty($_GET['alert'])) {
          echo "";
      }elseif ($_GET['alert'] == 2) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Anda berhasil menyimpan user.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }else if ($_GET['alert'] == 1) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Anda gagal menyimpan user.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }elseif ($_GET['alert'] == 3) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Anda berhasil menghapus data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }


      ?>
    
      <div class="row">
        <div class="col-6">
          <h3 class="text-black-50 font-monospace">Job Placement Data List</h3>
        </div>
        <div class="col-6 text-end">
          <a class="btn btn-primary" href="FormMagang.php" role="button">Add Data</a>
        </div>

        <br>
      </div>
      <div class="row">
        <table class="table table-hover">
          <thead class="table">
            <tr class="table-info">
              <th scope="col">No</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Alamat</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Divisi</th>
              <th scope="col">Nama Perusahaan</th>
              <th scope="col">No Telp</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($listMagang as $key => $val){?>
            <tr>
              <th scope="row"><?php echo $key+1; ?></th>
              <td><?php echo $val['nama_mahasiswa']; ?></td>
              <td><?php echo $val['alamat']; ?></td>

              <td><?php 
                if($val['jurusan'] == 0){
                  echo "Manajemen Informatika"; 
                }else if($val['jurusan'] == 1){
                   echo "Manajemen Pemasaran";
                }else if($val['jurusan'] == 2){
                   echo "Manajemen Keuangan";
                }else if($val['jurusan'] == 3){
                   echo "Administrasi Bisnis";
                }else{
                  echo "Not Found";
                }
              ?></td>

              <td><?php 
                if($val['divisi'] == 0){
                  echo "IT"; 
                }else if($val['divisi'] == 1){
                   echo "Marketing";
                }else if($val['divisi'] == 2){
                   echo "Finance";
                }else if($val['divisi'] == 3){
                   echo "HRD";
                }else{
                   echo "Not Found";
                }
                ?>
              </td>

              <td><?php echo $val['nama_perusahaan']; ?></td>
              <td><?php echo $val['no_telp']; ?></td>

              <td>
                <a href="FormMagang.php?id=<?php echo $val['no'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a class="btn btn-danger btn-sm" href="ViewMagang.php?id=<?php echo $val['no'];?>" onclick="return confirm('Anda yakin ingin menghapus data <?php echo $val['nama_mahasiswa']; ?>?');">
                  Hapus
                </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(!empty($_GET['id'])){ 
  $magang->delete($_GET['id']);
}   
?>