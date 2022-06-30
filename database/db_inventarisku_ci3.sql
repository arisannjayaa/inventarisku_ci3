create database db_inventarisku_ci3;

use db_inventarisku_ci3;

create table tb_user(
	id_user int primary key auto_increment,
	username varchar(100),
	password varchar(100),
	level enum('admin', 'mahasiswa');
);

create table tb_barang(
	id_barang int primary key auto_increment,
	nama_barang varchar(100),
	stok_barang int,
	harga_barang int
);

create table tb_jurusan(
	id_jurusan int primary key auto_increment,
	id_jurusan int,
	nama_prodi varchar(100)
);

create table tb_prodi(
	id_prodi int primary key auto_increment,
	id_jurusan int,
	nama_prodi varchar(100)
);

