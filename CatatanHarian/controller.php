<?php
require_once 'koneksi.php';

class Daily {
    private $conn;

    public function __construct(){
        $db = new Database();
        $this -> conn = $db -> conn;
    }

    public function getAll(){
        $result = $this -> conn -> query ("SELECT
                                            catatan.id, 
                                            catatan.tanggal, 
                                            catatan.keterangan,
                                            catatan.user_id, 
                                            catatan.category_id, 
                                            users.nama_users AS pengguna, 
                                            categories.nama_categories AS kategori, 
                                            catatan.status
                                            FROM catatan
                                            JOIN users ON catatan.user_id = users.id_users
                                            JOIN categories ON catatan.category_id = categories.id_categories");
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function getUsers() {
        $query = "SELECT id_users, nama_users FROM users";
        $result = $this->conn->query($query);
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function getCategories() {
        $query = "SELECT id_categories, nama_categories FROM categories";
        $result = $this->conn->query($query);
        
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function insert($user_id, $category_id, $tanggal, $keterangan, $status){
        $query = "INSERT INTO catatan (user_id, category_id, tanggal, keterangan, status) 
        VALUES ('$user_id', '$category_id', '$tanggal', '$keterangan', '$status')";
        return $this -> conn -> query($query);
    }

    public function getById($id){
        $query = "SELECT
        catatan.id, 
        catatan.tanggal, 
        catatan.keterangan, 
        catatan.user_id, 
        catatan.category_id, 
        users.nama_users AS pengguna, 
        categories.nama_categories AS kategori, 
        catatan.status
        FROM catatan
        JOIN users ON catatan.user_id = users.id_users
        JOIN categories ON catatan.category_id = categories.id_categories WHERE catatan.id = $id";
        $result = $this -> conn -> query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $user_id, $category_id, $tanggal, $keterangan, $status){
        $query = "UPDATE catatan SET 
        user_id='$user_id', category_id='$category_id', tanggal='$tanggal', keterangan='$keterangan', status='$status' 
        WHERE id=$id";
        return $this -> conn -> query($query);
    }

    public function delete($id){
        $query = "DELETE FROM catatan WHERE id=$id";
        return $this -> conn -> query($query);
    }

    public function ubahStatusCatatan($id, $status){
        $query = "UPDATE catatan SET status = '$status' WHERE id = $id";
        return $this -> conn -> query($query);
    }

    public function getCatatanSelesai() {
        $query = "SELECT 
        catatan.tanggal, 
        catatan.keterangan, 
        users.nama_users AS pengguna, 
        categories.nama_categories AS kategori
        FROM catatan
        JOIN users ON catatan.user_id = users.id_users
        JOIN categories ON catatan.category_id = categories.id_categories
        WHERE catatan.status = 'Sudah'";

        $result = $this->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data; 
    }
 
    public function getCatatanBelumSelesai() {
        $query = "SELECT 
                    catatan.tanggal, 
                    catatan.keterangan, 
                    users.nama_users AS pengguna, 
                    categories.nama_categories AS kategori
                  FROM catatan
                  JOIN users ON catatan.user_id = users.id_users
                  JOIN categories ON catatan.category_id = categories.id_categories
                  WHERE catatan.status = 'Belum'";
        
        $result = $this->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data; 

    }
}
?>