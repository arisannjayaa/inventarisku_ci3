create database db_inventarisku_ci3;

use db_inventarisku_ci3;

create table tb_jurusan(
	id_jurusan char(2) primary key,
	nama_jurusan varchar(100)
);

insert into tb_jurusan values
('TE', 'Teknik Elektro'),
('TM', 'Teknik Mesin'),
('TS', 'Teknik Sipil'),
('AN', 'Administrasi Niaga'),
('AK', 'Akuntansi');

create table tb_prodi(
	id_prodi char(4) primary key,
	id_jurusan char(2),
	nama_prodi varchar(100),
	foreign key (id_jurusan) references tb_jurusan(id_jurusan)
);

insert into tb_prodi(id_prodi, id_jurusan, nama_prodi) values
('TE01', 'TE', 'Teknik Listrik'),
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
	nim varchar(20) default '-',
	nama_lengkap varchar(100) default '-',
	id_jurusan char(2) default 'TE',
	id_prodi char(4) default 'TE01',
	no_telp varchar(20) default '-',
	email varchar(100) default '-',
	agama varchar(50) default '-',
	alamat varchar(255) default '-',
	jenis_kelamin varchar(20) default '-',
	username varchar(30) default '-',
	password varchar(255) default '-',
	tanggal_lahir date default curdate(),
	avatar varchar(50) default 'default.png',
	foreign key (id_jurusan) references tb_jurusan(id_jurusan),
	foreign key (id_prodi) references tb_prodi(id_prodi),
	level enum('admin', 'mahasiswa') default 'mahasiswa'
);

insert into tb_user(username, password, level) values
('admin', sha1('admin'), 'admin');

create table tb_barang(
	id_barang int primary key auto_increment,
	nama_barang varchar(50),
	stok_barang int,
	harga_barang int,
	keterangan_barang text,
	gambar_barang varchar(255) default 'default.png'
);

insert into tb_barang(nama_barang, stok_barang, harga_barang) values 
('Mixer Yamaha MGP10XU', 1, 50000),
('Mix Krezt Beta58', 1, 35000),
('Mic Wireless Ashley MC Pro 1', 1, 45000),
('Stand Mic', 5, 12000),
('Green Screen Fulset', 1, 20000),
('Tripod Kamera', 2, 20000),
('Zhiyun Smooth 2', 1, 70000);

create table transaksi (
	id_transaksi int primary key auto_increment,
	id_user int,
	id_barang int,
	tanggal_sewa date,
	tanggal_kembali date,
	jumlah_barang,
	keterangan varchar(255),
	status enum('Berjalan', 'Selesai'),
)

create table keranjang(
	id_user int,
	item varchar(255),
	harga int,
	jumlah int
);

-- create table tb_transaksi(
-- 	id_transaksi,
-- 	id_orders,
-- 	status_bayar,
-- 	status_pengembalian enum('belum', 'kembali')
-- );




