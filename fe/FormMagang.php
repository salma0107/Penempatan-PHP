<?php 
require_once '../Magang.php';
$magang = new Magang();
if(!empty($_GET['id'])) 

  $usr = $magang->get_magang($_GET['id']);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM MAGANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

  <body>
    <div><br><br>
      <h1 class="text-center font-monospace"><b>-->> Aplikasi Penempatan Kerja <<--</b></h1>
    </div>
    <br>

    <div class="container">
      <div class="row">
        <div class="col-6">
          <h3 class="font-monospace"><?php if(!empty($_GET['id'])) { echo "Edit"; }else{echo "Add";}?> Data</h3>
        </div>
        <div class="col-6 text-end">
          
        </div>
      </div>
      <!-- Awal Form -->
       <form class="row g-3" method="POST">

            <div class="col-6">
              <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Isi Nama Mahasiswa" 
              value="<?php if(!empty($_GET['id'])) { echo $usr['nama_mahasiswa']; }?>">
            </div>

            <div class="col-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Isi Alamat" 
              value="<?php if(!empty($_GET['id'])) { echo $usr['alamat']; }?>">
            </div>

            <div class="col-md-6">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select id="jurusan" name="jurusan" class="form-select">
                <option selected>Choose...</option>
                <option value="0" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['jurusan'] ==0){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >Manajemen Informatika</option>
                <option value="1" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['jurusan'] ==1){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >Manajemen Pemasaran</option>
                <option value="2"
                <?php if(!empty($_GET['id'])){ 
                            if($usr['jurusan'] ==2){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >Manajemen Keuangan</option>
              </select>
            </div>

            <div class="col-md-6">
             <label for="divisi" class="form-label">Divisi</label>
              <select id="divisi" name="divisi" class="form-select">
                <option selected>Pilih Divisi</option>

                <option value="0" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['divisi'] ==0){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >IT</option>

                <option value="1" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['divisi'] ==1){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >Marketing</option>

                <option value="2" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['divisi'] ==2){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >Finance</option>

                <option value="3" 
                <?php if(!empty($_GET['id'])){ 
                            if($usr['divisi'] ==3){
                              echo "selected";
                            }else{
                              echo "";
                            } 
                          } ?> >HRD</option>               
              </select>
            </div>

            <div class="col-md-6">
              <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Isi Nama Perusahaan" 
              value="<?php if(!empty($_GET['id'])) { echo $usr['nama_perusahaan']; }?>">
            </div>

            <div class="col-md-6">
              <label for="no_telp" class="form-label">No Telp</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Isi no telp" 
              value="<?php if(!empty($_GET['id'])) { echo $usr['no_telp']; }?>">
            </div>

            <div class="col-12">
              <button type="reset" onclick="history.back()" class="btn btn-secondary">Back</button>
              <button type="submit" name="save" id="save" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html> 

<?php
if (isset($_POST['save'])) {

  $nama_mahasiswa   = trim($_POST['nama_mahasiswa']);
  $alamat           = trim($_POST['alamat']);
  $jurusan          = trim($_POST['jurusan']);
  $divisi           = trim($_POST['divisi']);
  $nama_perusahaan  = trim($_POST['nama_perusahaan']);
  $no_telp          = trim($_POST['no_telp']);

  if(!empty($_GET['id'])){ 
    $magang->update($nama_mahasiswa, $alamat, $jurusan, $divisi, $nama_perusahaan, $no_telp, $_GET['id']);
  }else{
    $magang->insert($nama_mahasiswa, $alamat, $jurusan, $divisi, $nama_perusahaan, $no_telp);
  }

}     
?>