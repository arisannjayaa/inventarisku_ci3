create database db_inventarisku_ci3;

use db_inventarisku_ci3;

create table tb_user(
	id_user int primary key auto_increment,
	nama_lengkap varchar(255),
	email varchar(100),
	username varchar(100),
	password varchar(100),
	avatar varchar(50),
	level enum('admin', 'mahasiswa');
);

insert into tb_user(username, password) values
('admin', sha1('admin'), 'admin'),
('siswa1', sha1('admin'), 'mahasiswa'),
('siswa2', sha1('admin'), 'mahasiswa'),

create table tb_user_details(
	nim varchar(10) primary key
	id_user int,
	id_jurusan char(2),
	id_prodi char(4),
	agama varchar(50),
	alamat varchar(255),
	jenis_kelamin varchar(20),
	tanggal_lahir date,
	foreign key (id_user) references tb_user(id_user),
	foreign key (id_jurusan) references tb_jurusan(id_jurusan),
	foreign key (id_prodi) references tb_prodi(id_prodi)
);

insert into tb_user_details values
('2015354053', 1, 'I Wayan Ari Sanjaya', 'Jalan Metila No.5', 
'Hindu', '2001-10-31', 'default_profile.jpg');

create table tb_barang(
	id_barang int primary key auto_increment,
	nama_barang varchar(100),
	stok_barang int,
	harga_barang int,
	gambar_barang varchar(255)
);

create table tb_jurusan(
	id_jurusan char(2) primary key,
	nama_jurusan varchar(100)
);

insert into tb_jurusan values
('TE', 'Teknik Elektro'),
('TM','Teknik Mesin'),
('TS','Teknik Sipil'),
('AN','Administrasi Niaga'),
('AK','Akuntansi');

create table tb_prodi(
	id_prodi char(4) primary key,
	id_jurusan char(2),
	nama_prodi varchar(100),
	foreign key (id_jurusan) references tb_jurusan(id_jurusan)
);

insert into tb_prodi(id_prodi, id_jurusan, nama_prodi) values
('TE01', 'TE', 'Teknik Elektro'),
('TE02', 'TE', 'Manajemen Informatika'),
('TE03', 'TE', 'Teknik Otomasi'),
('TE04', 'TE', 'Teknologi Rekayasa Perangkat Lunak'),
('AN01', 'TE', 'Administrasi Bisnis'),
('AN02', 'TE', 'Manajemen Bisnis Internasional');

create table tb_orders(
	id_orders int primary key auto_increment,
	nim varchar(10),
	id_barang int,
	tanggal_pinjam date,
	tanggal_kembali date,
	jumlah_orders int,
	status enum('belum', 'kembali')
);

create table tb_transaksi(
	id_transaksi,
	status_bayar,
	status_pengembalian
);




