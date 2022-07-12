create database db_inventarisku_ci3;

use db_inventarisku_ci3;

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
('TS01', 'TS', 'Teknik Sipil'),
('TS02', 'TS', 'Manajemen Proyek Kontruksi'),
('AK01', 'AK', 'Akuntansi'),
('AK02', 'AK', 'Akuntansi Manajerial'),
('AN01', 'AN', 'Administrasi Bisnis'),
('AN02', 'AN', 'Manajemen Bisnis Internasional');

create table tb_user(
	id_user int primary key auto_increment,
	nim varchar(20),
	nama_lengkap varchar(100),
	id_jurusan char(2),
	id_prodi char(4),
	no_telp varchar(20),
	email varchar(100),
	agama varchar(50),
	alamat varchar(255),
	jenis_kelamin varchar(20),
	username varchar(30),
	password varchar(255),
	tanggal_lahir date,
	avatar varchar(50),
	foreign key (id_jurusan) references tb_jurusan(id_jurusan),
	foreign key (id_prodi) references tb_prodi(id_prodi),
	level enum('admin', 'mahasiswa')
);

insert into tb_user(username, password, level) values
('admin', sha1('admin'), 'admin'),
('siswa1', sha1('admin'), 'mahasiswa'),
('siswa2', sha1('admin'), 'mahasiswa');

create table tb_barang(
	id_barang int primary key auto_increment,
	nama_barang varchar(50),
	stok_barang int,
	harga_barang int,
	gambar_barang varchar(255)
);

insert into tb_barang(nama_barang, stok_barang, harga_barang) values 
('Mixer Yamaha MGP10XU', 1, 50000),
('Mix Krezt Beta58', 1, 35000),
('Mic Wireless Ashley MC Pro 1', 1, 45000),
('Stand Mic', 5, 12000),
('Green Screen Fulset', 1, 20000),
('Tripod Kamera', 2, 20000),
('Zhiyun Smooth 2', 1, 70000);


create table tb_orders(
	id_orders int primary key auto_increment,
	nim varchar(20),
	id_barang int,
	tanggal_pinjam date,
	tanggal_kembali date,
	jumlah_orders int,
	catatan text,
	metode_bayar enum('transfer', 'bayar ditempat');
	status_bayar enum('lunas', 'belum'),
	status_pesanan enum ('proses', 'diambil');
);

create table tb_transaksi(
	id_transaksi,
	id_orders,
	status_bayar,
	status_pengembalian enum('belum', 'kembali')
);




