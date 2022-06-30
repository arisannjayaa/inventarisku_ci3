create database db_inventarisku_ci3;

use db_inventarisku_ci3;

create table tb_user(
	id_user int primary key auto_increment,
	username varchar(100),
	password varchar(100),
	level enum('admin', 'mahasiswa');
);

create table tb_user_details(
	nim varchar(10) primary key
	id_user int,
	nama_lengkap varchar(255),
	alamat varchar(255),
	agama varchar(50),
	tanggal_lahir date,
	gambar_users varchar(255),
	foreign key (id_user) references tb_user(id_user)
);

create table tb_barang(
	id_barang int primary key auto_increment,
	nama_barang varchar(100),
	stok_barang int,
	harga_barang int,
	gambar_barang varchar(255)
);

create table tb_jurusan(
	id_jurusan int primary key auto_increment,
	nama_jurusan varchar(100)
);

create table tb_prodi(
	id_prodi int primary key auto_increment,
	id_jurusan int,
	nama_prodi varchar(100),
	foreign key (id_jurusan) references tb_jurusan(id_jurusan)
);

create table tb_orders(
	id_orders,
	nim,
	id_barang,
	tanggal_pinjam,
	tanggal_kembali,
	jumlah_orders
);

create table tb_transaksi(
	id_transaksi,
	status_bayar,
	status_pengembalian
);
