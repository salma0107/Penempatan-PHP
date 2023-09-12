<?php 
require_once "Database.php";
class Magang{
    private $db;

    function __construct(){
        $this->db = new Database();
    }

    function view() {
        // membuka koneksi ke database
        $mysqli = $this->db->connect();
        $sql = "SELECT * FROM penempatan_magang ORDER BY no ASC";
        $result = $mysqli->query($sql);
        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }
        // menutup koneksi database
        $mysqli->close();
        // nilai kembalian dalam bentuk array
        return $hasil;
    }

    function insert($nama_mahasiswa, $alamat, $jurusan, $divisi, $nama_perusahaan, $no_telp) {
        $mysqli = $this->db->connect();

        $nama_mahasiswa     = $mysqli->real_escape_string($nama_mahasiswa);
        $alamat             = $mysqli->real_escape_string($alamat);
        $jurusan            = $mysqli->real_escape_string($jurusan);
        $divisi             = $mysqli->real_escape_string($divisi);
        $nama_perusahaan    = $mysqli->real_escape_string($nama_perusahaan);
        $no_telp            = $mysqli->real_escape_string($no_telp);

        // sql statement untuk insert data mahasiswa magang
        $sql = "INSERT INTO penempatan_magang (nama_mahasiswa, alamat, jurusan, divisi, nama_perusahaan, no_telp) 
                VALUES ('$nama_mahasiswa', '$alamat', '$jurusan', '$divisi', '$nama_perusahaan', '$no_telp')";

        $result = $mysqli->query($sql);
        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman magang dan tampilkan pesan = 2 */
            header("Location: ViewMagang.php?alert=2");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman magang dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
        // menutup koneksi database
        $mysqli->close();
    }

    function get_magang($id) {
        $mysqli = $this->db->connect();

        // sql statement untuk mengambil data magang berdasarkan no
        $sql = "SELECT * FROM penempatan_magang WHERE no='$id'";

        $result = $mysqli->query($sql);
        $data   = $result->fetch_assoc();

        // menutup koneksi database
        $mysqli->close();
        
        // nilai kembalian dalam bentuk array
        return $data;
    }
    
    function update($nama_mahasiswa, $alamat, $jurusan, $divisi, $nama_perusahaan, $no_telp) {
        $mysqli = $this->db->connect();

        $nama_mahasiswa     = $mysqli->real_escape_string($nama_mahasiswa);
        $alamat             = $mysqli->real_escape_string($alamat);
        $jurusan            = $mysqli->real_escape_string($jurusan);
        $divisi             = $mysqli->real_escape_string($divisi);
        $nama_perusahaan    = $mysqli->real_escape_string($nama_perusahaan);
        $no_telp            = $mysqli->real_escape_string($no_telp);
        

        // sql statement untuk update data siswa
        $sql = "UPDATE penempatan_magang SET 
        nama_mahasiswa      = '$nama_mahasiswa',
        alamat              = '$alamat',
        jurusan             = '$jurusan',
        divisi              = '$divisi',
        nama_perusahaan     = '$nama_perusahaan',
        no_telp             = '$no_telp'
        WHERE no            = '$id'"; 

        $result = $mysqli->query($sql);
        

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman magang mahasiswa dan tampilkan pesan = 2 */
            header("Location: ViewMagang.php?alert=2");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman magang mahasiswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
        
    }
    
    /* Method untuk menghapus data pada tabel siswa */
    function delete($id) {
       $mysqli = $this->db->connect();


        // sql statement untuk delete data magang mahasiswa
        $sql = "DELETE FROM penempatan_magang WHERE no = '$id'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if($result){
            /* jika data berhasil disimpan alihkan ke halaman magang mahasiswa dan tampilkan pesan = 2 */
            header("Location: ViewMagang.php?alert=3");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman magang mahasiswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }

        // menutup koneksi database
        $mysqli->close();
    }
} 

?>

