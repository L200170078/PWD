<table>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td>Bintang Citra Kusumaatmaja</td>
  </tr>
  <tr>
    <td>Nim</td>
    <td>:</td>
    <td>L200170078</td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td>C</td>
  </tr>
</table>

# PWD
Laporan Praktikum Pemrograman Web Dinamis
<br>
Repositori ini berisi berbagai percobaan dan tugas dari MODUL pemrograman web dinamis.<br>  

SQL MODUL 6
1. Buat database informatika
2. Kilk Database informatika
3. Klik SQL, isikan
CREATE TABLE gudang (
  kode_gudang CHAR(5) NOT NULL,
  nama_gudang VARCHAR(50) NOT NULL,
  lokasi_gudang VARCHAR(50) NOT NULL,
  PRIMARY KEY(kode_gudang)
);

CREATE TABLE barang (
  kode_barang CHAR(5) NOT NULL,
  nama_barang VARCHAR(50) NOT NULL,
  kode_gudang CHAR(5) NOT NULL,
  PRIMARY KEY(kode_barang),
  INDEX barang_FKIndex1(kode_gudang),
  FOREIGN KEY(kode_gudang)
    REFERENCES gudang(kode_gudang)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);


