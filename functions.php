<?php

$conn = mysqli_connect("localhost", "root", "", "perpus" ); // koneksi ke database


function query($query) {
    global $conn; //agar variabel yang diluar function dapat diakses
    $result = mysqli_query($conn, $query); //ambil data dari seluruh isi dari tabel tb_book
    $rows =[]; //membuat wadah kosong
    while( $row = mysqli_fetch_assoc($result)) { // ambil data dari variabel result dengan tipe data string
        $rows[] = $row; // menambahkan elemen baru di akhir tiap array

    }
    return $rows;
}


function add($data)
{
     global $conn;
      //ambil data dari tiap form
      $judul = htmlspecialchars($data["judul_buku"]);
      $cover = htmlspecialchars($data["cover"]);
      $penulis = htmlspecialchars($data["penulis"]);
      $penerbit = htmlspecialchars($data["penerbit"]);

       //query nsert ke database
    $query = "INSERT INTO tb_book VALUES
    ('', '$judul', '$cover', '$penulis', '$penerbit')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_book WHERE id = $id");

    return mysqli_affected_rows($conn);

}

function update($data){
    global $conn;
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul_buku"]);
    $cover = htmlspecialchars($data["cover"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);

     //query nsert ke database
  $query = "UPDATE tb_book SET
                judul_buku = '$judul',
                cover = '$cover',
                penulis = '$penulis',
                penerbit = '$penerbit'
                WHERE id = $id
                ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function search($keyword){
    $query = "SELECT * FROM tb_book
                WHERE
                judul_buku LIKE '%$keyword%' OR
                penulis LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' 
                ";

        return query($query);


}

?>