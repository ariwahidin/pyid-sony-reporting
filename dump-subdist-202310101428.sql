-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: subdist
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `master_customer`
--

DROP TABLE IF EXISTS `master_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_customer` (
  `CardCode` varchar(50) DEFAULT NULL,
  `CardName` varchar(64) DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(50) DEFAULT NULL,
  `CreditLine` int(11) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_customer`
--

LOCK TABLES `master_customer` WRITE;
/*!40000 ALTER TABLE `master_customer` DISABLE KEYS */;
INSERT INTO `master_customer` VALUES ('ECOM01AAU01','PT. ANDALAN ANTAR UTAMA','TALAVERA OFFICE PARK LT.16 JL.LETJEN TB.SIMATUPANG KAV.22-26 RT.001 RW.001 CILANDAK BARAT CILANDAK','JAKARTA SELATAN','NULL',50000000,'NULL'),('ECOM01ABY01','PT. ANGAN BERSAMA YAKIN SELARAS : FUDGYBRO','JL. GARUDA BLOK C2, NO.11 BINTARO JAYA','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01AHA01','ANTHONY HALIM','Taman Kebon Jeruk Blok J No.17 Kembangan Srengseng','JAKARTA BARAT','11630',0,'NULL'),('ECOM01AHP01','PT. TAMAN MANDIRI : THE ARISTA HOTEL PALEMBANG','JL. KAPTEN A.RIVAI KOMPLEK TAMAN MANDIRI B2 NO.5 RT.022 RW.008 SUNGAI PANGERAN ILIR TIMUR 1','PALEMBANG','NULL',0,'NULL'),('ECOM01AIM01','PT. ANUGRAH INDO MANDIRI','JL. MARINA INDAH GOLF EKSLUSIF BLOK E 33 PIK TELP.021-56946230','JAKARTA UTARA','NULL',35000000,'NULL'),('ECOM01AKM01','CV. ARAS KORMA MULIA','APARTEMEN EDUCITY TOWER PRINCETON LT.15 NO.21 JL.KALISARI DARMA SEL.III, KALISARI, MULYOREJO','SURABAYA','60112',0,'NULL'),('ECOM01ALM01','ALOHA MOMDAY (FASTOK)','JL. CEMPAKA PUTIH TIMUR VII NO.20 CEMPAKA PUTIH,','JAKARTA PUSAT','11630',0,'NULL'),('ECOM01ALO01','ANITA LEONI OCTAVIANI','APT. SUNTER GREENLAKE TOWER 2 JL. DANAU SUNTER SELATAN NO.15, RT.15/16 SUNTER AGUNG, TANJUNG PRIOK','JAKARTA UTARA','NULL',0,'NULL'),('ECOM01ALS01','ALDI SAPUTRA','JL. SEMANGI 2 NO.71 RT.02/03, KEL.CEMPAKA PUTIH, KEC.CIPUTAT TIMUR','TANGERANG','NULL',0,'NULL'),('ECOM01AMA01','CV. AMANDA : AMANDA BROWNIES','JL. R.E MARTADINATA NO.154','BANDUNG','NULL',0,'NULL'),('ECOM01AND01','ANDI SURYANA','SENTRA PONDOK RAJEG BLOK A3 NO.11, KEC. CIBINONG','BOGOR','NULL',0,'NULL'),('ECOM01ANN01','ANNISA NURLIANI','Gedung Graha Mampang Lt.3 suite 305, Jl. Mampang Prpt. Raya No.KAV.100, RT.2/RW.1, Duren Tiga','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01ANT01','ANTON NOVIANTO','JL.PANGLIMA SUDIRMAN VII/37','TULUNGAGUNG','NULL',0,'NULL'),('ECOM01API01','PT. ARUS PROPERTI INDONESIA','JATI JAJAR ESTATE BLOK D17 NO.1, KEL.JATIJAJAR, KEC.TAPOS','DEPOK','NULL',0,'NULL'),('ECOM01APM01','PT. MANDJUR SEHAT ABADI : APOTEK MANDJUR','JL. KH. WAHID HASYIM NO.62A, MENTENG','JAKARTA PUSAT','NULL',0,'NULL'),('ECOM01ASB01','TOKO ASBA 7','JL. OTISTA RAYA NO.17 RT.006 RW.08 BIDARA CINA, JATINEGARA','JAKARTA TIMUR','NULL',0,'NULL'),('ECOM01ATI01','PT. ASTRO TECHNOLOGIES INDONESIA','JL. SRENGSENG RAYA NO.58 RT.3 RW.6 SRENGSENG','JAKARTA BARAT','NULL',200000000,'NULL'),('ECOM01ATM01','PT. ARLYDIA TEHNIK MEDIKA','APOTEK NAFACA, JL. LETDA NASIR, BOJONG KULUR, KEC. GUNUNG PUTRI','BOGOR','NULL',0,'NULL'),('ECOM01BAG01','BAKOEL DAGING','JL. HM.ARSYAD SAMPIT KOMPLEK MENTARI SWALAYAN TELP.0812-55885840','KALIMANTAN TENGAH','NULL',0,'NULL'),('ECOM01BAI01','PT. BINTANG ASET INDONESIA','JL. KEMANDORAN I NO.37, RT.13 RW.3, GROGOL UTARA KEC. KEBAYORAN LAMA','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01BBB01','PT. BENTENG BARU PRIMA PERKASA','JL. UJUNG PANDANG NO.4 SAMPING CAFE LANGIT','MAKASSAR','NULL',0,'NULL'),('ECOM01BBV01','PT. CHANA PROJECT BALI (BENNY & BLOOM VEGAN CAFE)','JALAN KARANG SUWUNG NO.2 TIBUBENENG KUTA UTARA TELP.081353552918','BADUNG - BALI','NULL',0,'NULL'),('ECOM01BCH01','BILLY CHIRISTOPHER','JALAN CIDENG BARAT NO.70D, CIDENG BARAT','JAKARTA PUSAT','NULL',0,'NULL'),('ECOM01BDS01','PT. BALI DIRECT STORE','JL. BY PASS TANAH LOT NO.88X, KEC. MENGWI','BADUNG','NULL',0,'NULL'),('ECOM01BNN01','PT. BANANA NIAGA NATURA','MAHAKA SQUARE, JALAN RAYA KELAPA NIAS NOMOR 6 KELAPA GADING BARAT KELAPA GADNG','JAKARTA UTARA','10110',0,'NULL'),('ECOM01BRU01','PT. BERKAT REZEKI UTAMA','BSD GREEN OFFICE PARK LANTAI 6 SAMPORA CISAUK','TANGERANG','15345',0,'NULL'),('ECOM01BSS01','PT. BERDIKARI SELARAS SEMPURNA : BABY FACE PLANETS BY','JL. KEMANG 1A NO.9C BANGKA, KEMANG','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01BUD01','BUDIONO DJOKOSULARSO,DRG : JOIE GELATO','JL. WOLTER MONGINSIDI NO.33 RT.003 LK.02 GOTONG ROYONG, TANJUNG KARANG','BANDAR LAMPUNG','NULL',0,'NULL'),('ECOM01CLA01','CLARICE NATHANIA','GD.PELURU BLOK C NO.96 RT.001 RW.003 KEBON BARU, TEBET,','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01CTA01','PT. CIPTA TEKNOLOGI APLIKASI','JL. TEBET TIMUR DALAM VIII W NO.12, RT.7/RW.9, TEBET TIMUR, KEC.TEBET','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01DMA01','DELUXE MART','JL. GADING KIRANA TIMUR VIII BLOK H8 NO.21, KELAPA GADING','JAKARTA UTARA','NULL',0,'NULL'),('ECOM01DMI01','PT. DROPEZY MAJU INDONESIA','GAPURA CIDENG LANTAI 1 JL. SURYOPRANOTO NO.12 A RT.1 RW.8 PETOJO SELATAN, GAMBIR','JAKARTA PUSAT','NULL',0,'NULL'),('ECOM01DSA01','DIANSYAH SATRIA','-','-','NULL',0,'NULL'),('ECOM01DSA02','DIANSYAH SATRIA : PUTRI SNACK','JL. RAYA PEKAN KAMIS DUSUN SAWAH DANGKA JORONG III KAMPUNG, NAGARI GADUT, KEC.TILATANG KAMANG, AGAM','SUMATERA BARAT','NULL',0,'NULL'),('ECOM01DWA01','DIAN WANANDI','JL. TERUSAN KELAPA HYBRIDA RUKO GRAND ORCHARD BLOK C-9','JAKARTA UTARA','NULL',0,'NULL'),('ECOM01EDJ01','EDWIN TANJUNG','BOULEVARD PALAM RAYA NO.2118 LIPPO KARAWACI','TANGERANG','NULL',0,'NULL'),('ECOM01EJS01','ELIZABETH JENNI SEPTIANA','JL. SEMANGI 2 NO.71 RT.02/03, KEL.CEMPAKA PUTIH, KEC.CIPUTAT TIMUR','TANGERANG','NULL',0,'NULL'),('ECOM01EKO01','EKO KUSTANTO','VILA MAHKOTA PESONA BLOK E7/8 (DEPAN BLOK F1/9) BOJONGKULUR GUNUNGPUTRI','BOGOR','16969',0,'NULL'),('ECOM01EPU01','ERWIN PUTRA (PELIBUR)','APARTEMEN REGATTA TOWER MONTECARLO 15D, PANTAI MUTIARA REGATTA, PLUIT','JAKARTA UTARA','NULL',0,'NULL'),('ECOM01ERW01','ERWIN KURNIAWAN','KONDOMINIUM TAMAN ANGGREK TOWER 7 UNIT 24E JL. LETJEN S PARMAN KAV.21 SLIPI','JAKARTA BARAT','11470',0,'NULL'),('ECOM01FBI01','PT. FRUIT BLOK INDONESIA','JL. KELAPA GADING BARAT BLOK A6 15 NO.24 PAKULONAN BARAT BARAT KEC.KELAPA DUA','TANGERANG','NULL',0,'NULL'),('ECOM01FIG01','FIGARO GELATO','JL.BANGKA IX NO.61','JAKARTA SELATAN','NULL',0,'NULL'),('ECOM01FIP01','FITRINA INTAN PAULIMA NP.SE : MANSAI','PERUMAHAN PALEM GANDA ASRI 2 CLUSTER DD BLOK A2 NO.32 KARANG TENGAH, KARANG MULYA','TANGERANG','15159',0,'NULL'),('ECOM01FRA01','FRANCISCA RATNASARI AMALO','JALAN TUKAD CITARUM DD NO. 2-B RENON','DENPASAR','NULL',0,'NULL'),('ECOM01FUiN01','PT. FILOSOFI UNIT NUSANTARA','JL. SINABUNG BLOK G/I NO.18, RT.8/5 KEBAYORAN BARU','JAKARTA SELATAN','10110',0,'NULL'),('ECOM01GAT01','GOGOBLI ASIA TEKNOLOGI PT','Jl. Palmerah Utara No.61A, RT001 RW001, Gelora Tanah Abang, Jakarta Pusat','JAKARTA','NULL',0,'NULL'),('ECOM01GCA01','PT. GIYANTI ANUGERAH INDONESIA : GIYANTI CAFE','JL. SURABAYA NO.20, RW.5, MENTENG, KEC.MENTENG','JAKARTA PUSAT','NULL',0,'NULL'),('ECOM01GDN01','PT. GLOBAL DIGITAL NIAGA','GEDUNG SARANA JAYA LT.7 JL. BUDI KEMULIAAN 1 NO.1 GAMBIR','JAKARTA PUSAT','10110',35000000,'NULL'),('ECOM01GHO01','GUN HONANDAR : FIESTA PASAR SWALAYAN','JL. SEMANGI 2 NO.71 RT.02/03, KEL.CEMPAKA PUTIH, KEC.CIPUTAT TIMUR','TANGERANG','NULL',0,'NULL'),('ECOM01GOT01','PT. GOTO SOLUSI NIAGA','GEDUNG PASARAYA BLOK M GD. B LT.4 JL. ISKANDARSYAH II, 002 , MELAWAI, KEBAYORAN BARU','JAKARTA SELATAN','NULL',30000000,'NULL');
/*!40000 ALTER TABLE `master_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_subdist`
--

DROP TABLE IF EXISTS `master_subdist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_subdist` (
  `CardCode` varchar(50) DEFAULT NULL,
  `CardName` varchar(50) DEFAULT NULL,
  `Serviced_by` varchar(50) DEFAULT NULL,
  `GroupName` varchar(50) DEFAULT NULL,
  `Dept` varchar(50) DEFAULT NULL,
  `Group_Cust` varchar(50) DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Island` varchar(50) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_subdist`
--

LOCK TABLES `master_subdist` WRITE;
/*!40000 ALTER TABLE `master_subdist` DISABLE KEYS */;
INSERT INTO `master_subdist` VALUES ('RT01LMP01','PT. LIMEKT PAPER','PK JAKARTA','Sub Distributor','RET','Limekt Paper','Jl MT Haryono 187, Kel Jagalan, Kec Semarang Tengah, Kota Semerang, Prov. Jawa Tengah','Luar Kota','Pontianak','Kalimantan Barat','Kalimantan','Central'),('RTB1LCB01','CAHAYA BOGA UTAMA CV','3PL BALI','Sub Distributor','RET','Cahaya Boga Utama','JL. Kebo Iwa Selatan (Belakang Kebo Iwa Square) No.23','Luar Kota','Bali','Bali','Bali','East'),('RT01MSC01','CV. MAJU SUKSES CEMERLANG','PK JAKARTA','Sub Distributor','RET','Maju Sukses Cemerlang','JL. MAPELONG LINK IV (KAIWOLO) WALIAN SATU - TOMOHON SELATAN','Luar Kota','Tomohon','Sulawesi Utara','Sulawesi','East'),('RTS01IML01','PT. INDOWIRA MESTI LANCAR','PK JAKARTA','Sub Distributor','RET','Indowira Mesti Lancar','NULL','Luar Kota','Karimun','Riau','Sumatera','West'),('RTS02DOW01','PT. AKASIA SINAR ABADI','PK JAKARTA','Sub Distributor','RET','Akasia Sinar Abadi','JL. AHMAD YANI KM.15.2 KOMP. PERGUDANGAN CIPTA JAYA GAMBUT NO.E 11, MALINTANG,KEC.GAMBUT,KAB.BANJAR','Luar Kota','Banjarmasin','Kalimantan Selatan','Kalimantan','Central'),('RTS02MAS01','MULTIBOGA ARYA SENTOSA PT','PK JAKARTA','Sub Distributor','RET','Multiboga Arya Sentosa','Komp. Executive Industrial Park B, Belian Batam Kota Batam Kepulauan Riau 29464','Luar Kota','Batam','Riau','Sumatera','West'),('RTS02MGA01','MEGAH AGUNG SURYA PT (RETAIL)','PK JAKARTA','Sub Distributor','RET','Megah Agung Surya','JL. SAYANGAN LRG TEMENGGUNG NO 276','Luar Kota','Palembang','Sumatera Selatan','Sumatera','West'),('RTS01DMC01','PT. DAMAI MAKMUR CEMERLANG','PK JAKARTA','Sub Distributor','RET','Damai Makmur Cemerlang','NULL','Luar Kota','Manado','Sulawesi Utara','Sulawesi','East'),('RTS01MMA01','MASINDO MITRA ABADI PT','PK JAKARTA','Sub Distributor','RET','Masindo Mitra Abadi','Komplek Cahaya Garden G No.8, Sadai, Bengkong, Batam','Luar Kota','Batam','Riau','Sumatera','West'),('RT01SMA01','SURYA MANDIRI X CV','PK JAKARTA','Sub Distributor','RET','Surya Mandiri X','JL MATAHARI NO 100 RT 062, KARANG ANYAR TARAKAN BARAT, KOTA TARAKAN KALIMANTAN UTARA 77111','Luar Kota','Tarakan','Kalimantan Utara','Kalimantan','Central'),('RTS01TRS01','TIGARAKSA SATRIA TBK PT','PK JAKARTA','Sub Distributor','RET','Tigaraksa Satria','Gedung Graha Sucofindo Lt.13, Jl. Raya Pasar Minggu Kav.34 Pancoran, Jakarta Selatan 12780','Dalam Kota','Jakarta Selatan','Jakarta','Jawa','Central'),('RTS01BS01','BINTANG SWALAYAN','PK JAKARTA','Sub Distributor','RET','Bintang Swalayan','Jl. Simpang Tiga No.23, Ramanuju, Purwakarta, Cilegon','Luar Kota','Cilegon','Banten','Jawa','Central'),('SD01SFC01','SEVEN FOOD COUNTRY PRIMA PT','PK JAKARTA','Sub Distributor','RET','Seven Food Country Prima','KOMP TAMAN DUTA MAS BLOK A6, NO 24 RT 004 RW 012 JELAMBAR BARU, GROGOL PETAMBURAN JAKARTA BARAT','Dalam Kota','Jakarta Barat','Jakarta','Jawa','Central'),('RT01BSB01','CV BEFA SUKSES BERKAH','PK JAKARTA','Sub Distributor','RET','Befa Sukses Berkah','Jl MT Haryono 187, Kel Jagalan, Kec Semarang Tengah, Kota Semerang, Prov. Jawa Tengah','Luar Kota','Semarang','Jawa Tengah','Jawa','Central'),('RT01FDU01','PT. FELIXINDO DISTRIBUSI UTAMA','PK JAKARTA','Sub Distributor','RET','Felixindo Distribusi Utama','NULL','Luar Kota','Padang','Sumatera Barat','Sumatera','West'),('RT01FSB01','CV FIGO SUKSES BERKAH','PK JAKARTA','Sub Distributor','RET','Figo Sukses Berkah','JL. BENDUNGAN JAGO RAYA NO.38 RT.005 RW.003 SERDANG KEMAYORAN','Dalam Kota','Jakarta Pusat','Jakarta','Jawa','Central'),('RTS01GIT01','PT. GITA','PK JAKARTA','Sub Distributor','RET','Gita','JL. INDRONOTO KM.0,7 NO.7B RT.006 RW.003 NGABEYAN KARTASURA','Luar Kota','Solo','Jawa Tengah','Jawa','Central'),('RTS01SUR01','SURYA PUTRA CV','PK JAKARTA','Sub Distributor','RET','Surya Putra','Jl. R.E Martadianta A No.2, RT005 RW029, Sungai Jawi Luar, Pontianak Barat, Pontianak','Luar Kota','Pontianak','Kalimantan Barat','Kalimantan','Central'),('RTS01SUW01','SUBUH UTAMA WILLINDO PT (RETAIL)','PK JAKARTA','Sub Distributor','RET','Subuh Utama Willindo','Komplek Pergudangan Sukarami Blok E.8, Rt.090 Rw.020 Talang Kelapa Alang Alang Lebar Kota Palembang','Luar Kota','Palembang','Sumatera Selatan','Sumatera','West'),('RTS02SPN01','SINAR PARAMITA NIAGA PT','PK JAKARTA','Sub Distributor','RET','Sinar Paramita Niaga','PASAR IKAN LAMA BLOK B.23-24, PASAR PADI RANGKUI PANGKALPINANG','Luar Kota','Pangkal Pinang','Bangka Belitung','Sumatera','West'),('RTS02SYS01','SIE YELIANA SIDHARTA ; UD. PANGAN JAYA','PK JAKARTA','Sub Distributor','RET','Pangan Jaya','JL. PANDAN SARI NO.5 RT.024 MARGA SARI BALIKPAPAN BARAT','Luar Kota','Balikpapan','Kalimantan Timur','Kalimantan','Central'),('SD01AJA01','ARVINDA JAYA ABADI PT','PK JAKARTA','Sub Distributor','RET','Arvinda Jaya Abadi','Jl. Raya Gedangan 214A Blok A1, Gedangan, Sidoarjo, Jawa Timur','Luar Kota','Sidoarjo','Jawa Timur','Jawa','Central'),('SD01APJ01','ASIA PANGANINDO JAYA PT','PK JAKARTA','Sub Distributor','RET','Asia Panganindo Jaya','Komplek Union Industrial Park D No.15, Tanjung Sengkuang, Batu Ampar, Batam, Kepulauan Riau','Luar Kota','Batam','Riau','Sumatera','West'),('RT01KMP01','PT. KURNIA MAJU PERKASA','PK JAKARTA','Sub Distributor','RET','Kurnia Maju Perkasa','NULL','Luar Kota','Padang','Sumatera Barat','Sumatera','West'),('RT01SRP01','PT. SUKSES RIAU PERMATA','PK JAKARTA','Sub Distributor','RET','Sukses Riau Permata','KOMP. PERGUDANGAN ANGKASA II BLOK B NO.07 SIMPANG BARU, TAMPAN','Luar Kota','Pekanbaru','Riau','Sumatera','West'),('RT01STM01','SUFO TRITAMA MANDIRI PT (RETAIL)','PK JAKARTA','Sub Distributor','RET','Sufo Tritama Mandiri','Sufo Tritama Mandiri Retail,Jl.Lintas Jambi-Palembang No.88,RT006 RW002,Pd Meja Mestong Muaro Jambi','Luar Kota','Jambi','Jambi','Sumatera','West'),('RTS01AMI01','ANAK MAS INDAH PT','PK JAKARTA','Sub Distributor','RET','Anak Mas Indah','Jl. Daan Mogot KM 12.8 Blok A1 No.3, RT009 RW002, Rawa Buaya, Cengkareng, Jakarta Barat','Dalam Kota','Jakarta Barat','Jakarta','Jawa','Central'),('RTS01PNJ01','PROSPERINDO NUSA JAYA CV (RETAIL)','PK JAKARTA','Sub Distributor','RET','Prosperindo Nusa Jaya','Komplek Union Industrial Park Block I No. 06, Tanjung Sengkuang Batu Ampar Kota Batam,Kepulauan Riau','Luar Kota','Batam','Riau','Sumatera','West'),('RTS01SDA02','SAUDARA JAYA CV','PK JAKARTA','Sub Distributor','RET','Saudara Jaya','KELAPA SAWIT RAYA NO 416 RT.004 RW.007, KEL. PLAMONGANSARI KEC. PEDURUNGAN,KOTA SEMARANG JAWA TENGAH','Luar Kota','Semarang','Jawa Tengah','Jawa','Central'),('RTS01JZV01','JAZA VENUS CV','PK JAKARTA','Sub Distributor','RET','Jaza Venus','Jl. Arcamanik Endah Raya No.109, RT001 RW001, Sukamiskin, Arcamanik, Bandung','Luar Kota','Bandung','Jawa Barat','Jawa','Central'),('RTS01IBM01','CV ICHIBAN MAKASSAR','PK JAKARTA','Sub Distributor','RET','Ichiban','Jl. Bali No. 69, Makkasar','Luar Kota','Makassar','Sulawesi Selatan','Sulawesi','East'),('RTS01SMP01','PT. SUKSES MEDAN PERMATA','PK JAKARTA','Sub Distributor','RET','Sukses Medan Permata','Jl.Medan-Tj Morawa KM 11.5,Komplek SkyDex Business Hub B No.7 Bangun Sari Tj Morowa Kab Deli Serdang','Luar Kota','Medan','Sumatera Utara','Sumatera','West'),('SD01FTR01','FATHUR BERSAUDARA CV','PK JAKARTA','Sub Distributor','RET','Fathur Bersaudara','Jl. Henggi Mimika Baru, Mimika Papua','Luar Kota','Timika','Papua','Papua','Others'),('SD01JJA01','JERINDO JAYA ABADI PT (RETAIL)','PK JAKARTA','Sub Distributor','RET','Jerindo Jaya Abadi','Retail, Komplek Pergudangan 88 B No.23, RT021 RW009, Pabean, Sedati, Sidoarjo 61253','Luar Kota','Surabaya','Jawa Timur','Jawa','Central'),('SD01JP01','JARI PERKASA CV','3PL BALI','Sub Distributor','RET','Jari Perkasa','Jl. Sunia Negara No.45, Pamogan, Denpasar Selatan, Denpasar','Luar Kota','Bali','Bali','Bali','East'),('SD01MFS01','CV MITRA FOOD SEJAHTERA','PK JAKARTA','Sub Distributor','RET','Mitra Food Sejahtera','Jl. Kemayoran Baru No.41, Krembangan Selatan, Krembangan, Surabaya','Luar Kota','Surabaya','Jawa Timur','Jawa','Central'),('SD01MIL01','MUTI INDOFOOD LESTARI, CV','PK JAKARTA','Sub Distributor','RET','Muti Indofood Lestari','NULL','Luar Kota','Medan','Sumatera Utara','Sumatera','West'),('RT01MPM01','CV. MILAN PERDANA MAKASAR','PK JAKARTA','Sub Distributor','RET','Milan Perdana','NULL','Luar Kota','Padang','Sumatera Barat','Sumatera','West'),('RTS01MIT01','CV. MITRA BERSAUDARA','PK JAKARTA','Sub Distributor','RET','Mitra Bersaudara','NULL','Luar Kota','Pontianak','Kalimantan Barat','Kalimantan','Central');
/*!40000 ALTER TABLE `master_subdist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_top`
--

DROP TABLE IF EXISTS `master_top`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_top` (
  `GroupNum` int(11) NOT NULL AUTO_INCREMENT,
  `Descript` varchar(255) DEFAULT NULL,
  `ExtraDays` int(11) DEFAULT NULL,
  `ExtraMonth` int(11) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`GroupNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_top`
--

LOCK TABLES `master_top` WRITE;
/*!40000 ALTER TABLE `master_top` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_top` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'subdist'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-10 14:28:47
