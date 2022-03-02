-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.32


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema report_forecast
--

CREATE DATABASE IF NOT EXISTS report_forecast;
USE report_forecast;

--
-- Definition of table `forecast`
--

DROP TABLE IF EXISTS `forecast`;
CREATE TABLE `forecast` (
  `idFor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sod` varchar(15) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `qtyFor` int(10) unsigned DEFAULT NULL,
  `materialCode` varchar(45) DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `changedBy` varchar(45) DEFAULT NULL,
  `changedDate` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dateFinishFormula` datetime DEFAULT NULL,
  PRIMARY KEY (`idFor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast`
--

/*!40000 ALTER TABLE `forecast` DISABLE KEYS */;
INSERT INTO `forecast` (`idFor`,`sod`,`customer`,`qtyFor`,`materialCode`,`deliveryDate`,`createdBy`,`createdDate`,`changedBy`,`changedDate`,`status`,`dateFinishFormula`) VALUES 
 (1,'SOD-200626-0001','Uni',50000,'TC.0021.0183','2020-07-14','admin','2020-06-30 13:26:32','admin','2020-06-30 13:26:32','In Progress','2020-06-30 13:34:31');
/*!40000 ALTER TABLE `forecast` ENABLE KEYS */;


--
-- Definition of table `forecasting_ppic_month`
--

DROP TABLE IF EXISTS `forecasting_ppic_month`;
CREATE TABLE `forecasting_ppic_month` (
  `idppic` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `bulan` varchar(45) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `toleransi` double DEFAULT NULL,
  `CustomerCode` varchar(45) DEFAULT NULL,
  `ProductCode` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdDate` datetime NOT NULL,
  `categoryMt` varchar(45) NOT NULL,
  `bulanName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idppic`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecasting_ppic_month`
--

/*!40000 ALTER TABLE `forecasting_ppic_month` DISABLE KEYS */;
INSERT INTO `forecasting_ppic_month` (`idppic`,`date`,`bulan`,`qty`,`toleransi`,`CustomerCode`,`ProductCode`,`createdBy`,`createdDate`,`categoryMt`,`bulanName`) VALUES 
 (100,'2020-07-20','08',540000,1.1,'PSR.0216','ET.0195.98','iherlina','2020-07-20 14:54:16','Paper','August'),
 (101,'2020-07-20','09',500000,1.1,'PSR.0216','ET.0195.98','iherlina','2020-07-20 14:54:16','Paper','September'),
 (102,'2020-07-20','10',720000,1.1,'PSR.0216','ET.0195.98','iherlina','2020-07-20 14:54:16','Paper','October'),
 (103,'2020-07-20','08',0,1.1,'PSR.0216','ET.0195.96','iherlina','2020-07-20 14:55:41','Paper','August'),
 (104,'2020-07-20','09',540000,1.1,'PSR.0216','ET.0195.96','iherlina','2020-07-20 14:55:41','Paper','September'),
 (105,'2020-07-20','10',540000,1.1,'PSR.0216','ET.0195.96','iherlina','2020-07-20 14:55:42','Paper','October'),
 (106,'2020-07-20','08',0,1.1,'PSR.0216','ET.0195.92','iherlina','2020-07-20 14:57:02','Paper','August'),
 (107,'2020-07-20','09',500000,1.1,'PSR.0216','ET.0195.92','iherlina','2020-07-20 14:57:02','Paper','September'),
 (108,'2020-07-20','10',500000,1.1,'PSR.0216','ET.0195.92','iherlina','2020-07-20 14:57:02','Paper','October'),
 (109,'2020-07-20','08',0,1.1,'PSR.0216','ET.0195.91','iherlina','2020-07-20 15:01:52','Paper','August'),
 (110,'2020-07-20','09',500000,1.1,'PSR.0216','ET.0195.91','iherlina','2020-07-20 15:01:52','Paper','September'),
 (111,'2020-07-20','10',0,1.1,'PSR.0216','ET.0195.91','iherlina','2020-07-20 15:01:52','Paper','October'),
 (112,'2020-07-20','08',500000,1.1,'PSR.0216','ET.0195.99','iherlina','2020-07-20 15:03:24','Paper','August'),
 (113,'2020-07-20','09',500000,1.1,'PSR.0216','ET.0195.99','iherlina','2020-07-20 15:03:24','Paper','September'),
 (114,'2020-07-20','10',680000,1.1,'PSR.0216','ET.0195.99','iherlina','2020-07-20 15:03:24','Paper','October');
/*!40000 ALTER TABLE `forecasting_ppic_month` ENABLE KEYS */;


--
-- Definition of table `forecasting_ppic_po`
--

DROP TABLE IF EXISTS `forecasting_ppic_po`;
CREATE TABLE `forecasting_ppic_po` (
  `idpo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaterialCode` varchar(45) DEFAULT NULL,
  `PODocNo` varchar(45) DEFAULT NULL,
  `Qty` double DEFAULT NULL,
  `QtyRecieved` double DEFAULT NULL,
  `QtyRemain` double DEFAULT NULL,
  `Begda` varchar(3) DEFAULT NULL,
  `Endda` varchar(3) DEFAULT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `MaterialName` varchar(105) DEFAULT NULL,
  PRIMARY KEY (`idpo`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1 COMMENT='Purchase Order Outstanding';

--
-- Dumping data for table `forecasting_ppic_po`
--

/*!40000 ALTER TABLE `forecasting_ppic_po` DISABLE KEYS */;
INSERT INTO `forecasting_ppic_po` (`idpo`,`MaterialCode`,`PODocNo`,`Qty`,`QtyRecieved`,`QtyRemain`,`Begda`,`Endda`,`Year`,`MaterialName`) VALUES 
 (115,'K.040.0250.PLN.011','POM-200117-0002',208,201.6,6.4,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up'),
 (116,'K.040.0250.PLN.011','POM-200413-0008',1041,996.8,44.2,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up'),
 (117,'K.040.0250.PLN.011','POM-200511-0005',208,190.4,17.6,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up'),
 (118,'K.040.0250.PLN.011','POM-200608-0005',729,0,729,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up'),
 (119,'K.040.0250.PLN.011','POM-200711-0001',209,0,209,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up'),
 (120,'K.040.0250.PLN.012','POM-200625-0003',208,0,208,'08','10','2020','IVORY 250 / 53 x 72.5  LG -- SPN @18 Up'),
 (121,'K.040.0230.PLN.019','POM-200413-0008',362.2,347.2,15,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up'),
 (122,'K.040.0230.PLN.019','POM-200608-0005',453,46.4,406.6,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up'),
 (123,'K.040.0230.PLN.019','POM-200711-0001',181,0,181,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up'),
 (124,'K.040.0230.PLN.019','POM-200413-0008',362.2,347.2,15,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up'),
 (125,'K.040.0230.PLN.019','POM-200608-0005',453,46.4,406.6,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up'),
 (126,'K.040.0230.PLN.019','POM-200711-0001',181,0,181,'08','10','2020','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up');
/*!40000 ALTER TABLE `forecasting_ppic_po` ENABLE KEYS */;


--
-- Definition of table `forecasting_ppic_totqty`
--

DROP TABLE IF EXISTS `forecasting_ppic_totqty`;
CREATE TABLE `forecasting_ppic_totqty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MaterialCode` varchar(45) DEFAULT NULL,
  `MaterialName` varchar(200) DEFAULT NULL,
  `TotalQty` double DEFAULT NULL,
  `TotalQtyTol` double DEFAULT NULL,
  `CustomerCode` varchar(45) DEFAULT NULL,
  `Category` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `begda` varchar(45) DEFAULT NULL,
  `endda` varchar(45) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `ProductCode` varchar(45) DEFAULT NULL,
  `Up` int(10) unsigned DEFAULT NULL,
  `QtyWarehouse` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecasting_ppic_totqty`
--

/*!40000 ALTER TABLE `forecasting_ppic_totqty` DISABLE KEYS */;
INSERT INTO `forecasting_ppic_totqty` (`id`,`MaterialCode`,`MaterialName`,`TotalQty`,`TotalQtyTol`,`CustomerCode`,`Category`,`createdBy`,`createdDate`,`begda`,`endda`,`year`,`ProductCode`,`Up`,`QtyWarehouse`) VALUES 
 (218,'K.040.0230.PLN.020','IVORY SAVVIPAK 230 / 53 x 94  LG -- IK @24 Up',500000,525000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.91',24,77800),
 (219,'K.040.0250.PLN.011','IVORY 250 / 53 x 72.5  LG -- IK VR @18 Up',1000000,1050000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.92',18,2800),
 (220,'K.040.0250.PLN.012','IVORY 250 / 53 x 72.5  LG -- SPN @18 Up',1000000,1050000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.92',18,0),
 (221,'K.040.0230.PLN.019','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up',1080000,1134000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.96',22,0),
 (222,'K.040.0230.PLN.019','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK @22 Up',1760000,1848000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.98',22,0),
 (223,'K.040.0230.PLN.005','IVORY 230 / 79 x 109  LG -- IK VA @18 Up',1680000,1764000,'PSR.0216','Paper','iherlina','2020-07-20 15:05:28','08','10','2020','ET.0195.99',18,7460);
/*!40000 ALTER TABLE `forecasting_ppic_totqty` ENABLE KEYS */;


--
-- Definition of table `formula_calculate`
--

DROP TABLE IF EXISTS `formula_calculate`;
CREATE TABLE `formula_calculate` (
  `idCalc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idFor` int(10) unsigned DEFAULT NULL,
  `qtyFor` double DEFAULT NULL,
  `qtyTargetBom` double DEFAULT NULL,
  `componentName` varchar(500) DEFAULT NULL,
  `qtyComponent` double DEFAULT NULL COMMENT 'A',
  `hasilBagiQtyForTarget` double DEFAULT NULL COMMENT 'B = Qty Forecast / QtyTarget ',
  `hasilAkhir` double DEFAULT NULL COMMENT 'A * B',
  `unitComp` varchar(45) DEFAULT NULL,
  `createdBy` varchar(45) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `materialcode` varchar(45) DEFAULT NULL,
  `component` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idCalc`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Hasil Kalkulasi Kebutuhan';

--
-- Dumping data for table `formula_calculate`
--

/*!40000 ALTER TABLE `formula_calculate` DISABLE KEYS */;
INSERT INTO `formula_calculate` (`idCalc`,`idFor`,`qtyFor`,`qtyTargetBom`,`componentName`,`qtyComponent`,`hasilBagiQtyForTarget`,`hasilAkhir`,`unitComp`,`createdBy`,`createdDate`,`materialcode`,`component`) VALUES 
 (1,1,50000,10000,'BP.002.099',30.3,5,151.5,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (2,1,50000,10000,'K.060.0350.PLN.065',10,5,50,'RIM','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (3,1,50000,10000,'T.CO.SGW.005.037',1.75,5,8.75,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (4,1,50000,10000,'T.CO.SGW.006.004',0.18,5,0.9,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (5,1,50000,10000,'T.CO.SGW.006.039',3,5,15,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (6,1,50000,10000,'T.CO.SGW.017.007',0.08,5,0.4,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (7,1,50000,10000,'TC.0021.0183.WIP.PTG',10000,5,50000,'LBR','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.CTK.X'),
 (8,1,50000,10000,'TC.0021.0183.WIP.CTK',10000,5,50000,'LBR','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.EMB.X'),
 (9,1,50000,10000,'TC.0021.0183.WIP.CTK',10000,5,50000,'LBR','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.EPL.X'),
 (10,1,50000,100000,'TC.0021.0183.WIP.EPL',10000,0.5,5000,'LBR','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.KPS.X'),
 (11,1,50000,10000,'TC.0021.0183.WIP.EMB',10000,5,50000,'LBR','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.PLG.X'),
 (12,1,50000,10000,'K.060.0350.PLN.065',10,5,50,'RIM','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.PTG.X'),
 (13,1,50000,100000,'TC.0021.0183.WIP.KPS',100000,0.5,50000,'PCS','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.WIP.STR.X'),
 (14,1,50000,100000,'BP.003.019',5.3,0.5,2.65,'KG','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.X'),
 (15,1,50000,100000,'D.COR.460.005',100,0.5,50,'DOS','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.X'),
 (16,1,50000,100000,'TC.0021.0183.WIP.STR',100000,0.5,50000,'PCS','admin','2020-06-30 13:27:19','TC.0021.0183','TC.0021.0183.X');
/*!40000 ALTER TABLE `formula_calculate` ENABLE KEYS */;


--
-- Definition of table `mdepartment`
--

DROP TABLE IF EXISTS `mdepartment`;
CREATE TABLE `mdepartment` (
  `idDep` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namaDep` varchar(45) NOT NULL,
  PRIMARY KEY (`idDep`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdepartment`
--

/*!40000 ALTER TABLE `mdepartment` DISABLE KEYS */;
INSERT INTO `mdepartment` (`idDep`,`namaDep`) VALUES 
 (1,'EDP'),
 (2,'PPIC'),
 (3,'SALES');
/*!40000 ALTER TABLE `mdepartment` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `idMenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(45) NOT NULL,
  `SubMenu` varchar(45) NOT NULL,
  `Link` text,
  `icon` varchar(45) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`idMenu`,`MenuName`,`SubMenu`,`Link`,`icon`) VALUES 
 (1,'Transaction','Forecast','?n=forecast','&#xE85C;'),
 (2,'Transaction','Formula','?n=formula','&#xE85C;'),
 (3,'Report','Forecast','?n=report-forecast','&#xE24D;'),
 (4,'Report','Formula','?n=report-formula','&#xE24D;'),
 (5,'Master Data','User Management','?n=user','&#xE0B9;'),
 (6,'Master Data','Menu Management','?n=menu','&#xE0B9;'),
 (7,'Master Data','Department','?n=department','&#xE0B9;'),
 (8,'Tools','Change Calculate Status','?n=change-calc-status','&#xE0B9;'),
 (9,'Master Data','Master Forecasting','?n=master-forecasting','î‚¹'),
 (11,'Transaction','Forecasting PPIC','?n=forecasting-ppic','î‚¹'),
 (12,'Report','Forecasting PPIC','?n=report_forecastingppic','&#xE0B9;');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menu_user`
--

DROP TABLE IF EXISTS `menu_user`;
CREATE TABLE `menu_user` (
  `idMu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMenu` int(10) unsigned DEFAULT NULL,
  `idDep` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idMu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_user`
--

/*!40000 ALTER TABLE `menu_user` DISABLE KEYS */;
INSERT INTO `menu_user` (`idMu`,`idMenu`,`idDep`) VALUES 
 (1,1,3),
 (2,3,3),
 (3,2,2),
 (4,4,2),
 (5,1,1),
 (6,2,1),
 (7,3,1),
 (8,4,1),
 (9,5,1),
 (10,6,1),
 (11,7,1),
 (12,8,1),
 (13,9,1),
 (14,11,1),
 (15,11,2),
 (16,9,2),
 (17,12,1),
 (18,12,2);
/*!40000 ALTER TABLE `menu_user` ENABLE KEYS */;


--
-- Definition of table `mforecastingd`
--

DROP TABLE IF EXISTS `mforecastingd`;
CREATE TABLE `mforecastingd` (
  `IDFord` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerCode` varchar(45) NOT NULL,
  `MaterialCode` varchar(45) NOT NULL,
  `MaterialName` varchar(255) NOT NULL,
  `IDForh` int(10) unsigned NOT NULL,
  `createdBy` varchar(45) NOT NULL,
  `createdDate` datetime NOT NULL,
  `Category` varchar(45) NOT NULL,
  `JumlahUp` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`IDFord`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mforecastingd`
--

/*!40000 ALTER TABLE `mforecastingd` DISABLE KEYS */;
INSERT INTO `mforecastingd` (`IDFord`,`CustomerCode`,`MaterialCode`,`MaterialName`,`IDForh`,`createdBy`,`createdDate`,`Category`,`JumlahUp`) VALUES 
 (115,'PSR.0216','K.040.0230.PLN.005','IVORY 230 / 79 x 109  LG -- IK VA',65,'iherlina','2020-07-17 18:17:40','Paper',18),
 (116,'PSR.0216','K.040.0230.PLN.020','IVORY SAVVIPAK 230 / 53 x 94  LG -- IK',60,'iherlina','2020-07-17 18:19:01','Paper',24),
 (117,'PSR.0216','K.040.0250.PLN.011','IVORY 250 / 53 x 72.5  LG -- IK VR',61,'iherlina','2020-07-17 18:21:08','Paper',18),
 (118,'PSR.0216','K.040.0250.PLN.011','IVORY 250 / 53 x 72.5  LG -- IK VR',62,'iherlina','2020-07-17 18:23:23','Paper',18),
 (119,'PSR.0216','K.040.0230.PLN.019','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK',64,'iherlina','2020-07-20 10:53:18','Paper',22),
 (120,'PSR.0216','K.040.0230.PLN.019','IVORY SAVVIPAK 230 / 49.5 x 97  LG -- IK',63,'iherlina','2020-07-20 10:56:34','Paper',22),
 (121,'PSR.0216','K.040.0250.PLN.012','IVORY 250 / 53 x 72.5  LG -- SPN',61,'iherlina','2020-07-20 13:58:18','Paper',18),
 (122,'PSR.0216','K.040.0250.PLN.012','IVORY 250 / 53 x 72.5  LG -- SPN',62,'iherlina','2020-07-20 14:00:21','Paper',18);
/*!40000 ALTER TABLE `mforecastingd` ENABLE KEYS */;


--
-- Definition of table `mforecastingh`
--

DROP TABLE IF EXISTS `mforecastingh`;
CREATE TABLE `mforecastingh` (
  `IDForh` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CustomerCode` varchar(45) NOT NULL,
  `ProductCode` varchar(45) NOT NULL,
  `CreatedBy` varchar(45) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ChangedBy` varchar(45) NOT NULL,
  `ChangedDate` datetime NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `CustomerName` varchar(105) NOT NULL,
  PRIMARY KEY (`IDForh`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mforecastingh`
--

/*!40000 ALTER TABLE `mforecastingh` DISABLE KEYS */;
INSERT INTO `mforecastingh` (`IDForh`,`CustomerCode`,`ProductCode`,`CreatedBy`,`CreatedDate`,`ChangedBy`,`ChangedDate`,`ProductName`,`CustomerName`) VALUES 
 (60,'PSR.0216','ET.0195.91','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','Esse Blue Change 20 (5 PHW) SPM','PT.Tri Sakti Purwosari Makmur'),
 (61,'PSR.0216','ET.0195.92','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','Esse Change Grape 20 (5PHW)','PT.Tri Sakti Purwosari Makmur'),
 (62,'PSR.0216','ET.0195.95','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','Esse Change Juicy 20 (5 PHW)','PT.Tri Sakti Purwosari Makmur'),
 (63,'PSR.0216','ET.0195.96','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','Esse Honey Pop Caramel Capsule 16 (5 PHW)','PT.Tri Sakti Purwosari Makmur'),
 (64,'PSR.0216','ET.0195.98','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','Esse Shuffle Pop Capsule 16 (5 PHW)','PT.Tri Sakti Purwosari Makmur'),
 (65,'PSR.0216','ET.0195.99','iherlina','2020-07-17 18:15:37','iherlina','2020-07-17 18:15:37','INNER + LAYER JUARA TEH MANIS ND','PT.Tri Sakti Purwosari Makmur');
/*!40000 ALTER TABLE `mforecastingh` ENABLE KEYS */;


--
-- Definition of table `muser`
--

DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser` (
  `idUser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL,
  `idDep` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muser`
--

/*!40000 ALTER TABLE `muser` DISABLE KEYS */;
INSERT INTO `muser` (`idUser`,`fullName`,`username`,`password`,`level`,`idDep`) VALUES 
 (1,'Administrator','admin','S3mangat!','admin',1),
 (3,'Miarti','miarti','Mia-123','user',2),
 (4,'Nisa Anggraini A','nanggraini','123','user',3),
 (5,'Ghonza Tobing','gtobing','Gho-123','user',3),
 (6,'Ike Herlina','iherlina','Lina-123','user',2),
 (7,'Erwin Gunawan','egunawan','Erw-123','user',2);
/*!40000 ALTER TABLE `muser` ENABLE KEYS */;


--
-- Definition of procedure `OutstandingPO`
--

DROP PROCEDURE IF EXISTS `OutstandingPO`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `OutstandingPO`(customer varchar(100),cat varchar(100),begda varchar(2),endda varchar(2))
BEGIN
    SET @cust = customer;
    SET @cat = cat;
    SET @begda = begda;
    SET @endda = endda;
    SET @sql = NULL;
    SET @no  = 0;

    SET @sql = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(

            'MAX(IF ("" = "', f.bulan,  '", "","-")) AS `',f.bulan,'>`'
        )
    )
    FROM forecasting_ppic_month f where CustomerCode = @cust and categoryMt = @cat and (bulan between @begda and @endda)
                                  order by f.bulan asc);

    SET @sqlgo = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(
            'MAX(IF (K.MaterialName = "', f.MaterialName,  '", K.QtyRemain,"0")) AS `',f.MaterialName,'`'
        )
    )
    FROM forecasting_ppic_totqty f left join forecasting_ppic_po K on f.MaterialCode=K.MaterialCode
      where f.CustomerCode = @cust and f.Category = @cat and f.begda = @begda and f.endda = @endda);

    SET @sql =  CONCAT(
                    'SELECT @no:=@no+1 as `No.>1`,@no:=@no+1 as `No.>1`,K.podocno `PO DocNo`,',@sql,', K.podocno `PO DocNo`,',
                    @sqlgo,
                    ' FROM forecasting_ppic_totqty f left join forecasting_ppic_po K on f.MaterialCode=K.MaterialCode
                           left join mforecastingd n on n.MaterialCode=K.MaterialCode
                           left join forecasting_ppic_month b on b.ProductCode=f.ProductCode
                           WHERE n.CustomerCode =  "',
                    @cust,
                    '" AND n.Category = "',
                    @cat,
                    '" AND f.begda = "',
                    @begda,
                    '" AND f.endda = "',
                    @endda,
                    '" GROUP BY K.podocno Order by K.podocno asc'
                );

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    SET @sql = NULL;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `TotalForecastPPIC`
--

DROP PROCEDURE IF EXISTS `TotalForecastPPIC`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `TotalForecastPPIC`(customer varchar(100),cat varchar(100))
BEGIN
    SET @cust = customer;
    SET @cat = cat;
    SET @sql = NULL;
    SET @no  = 0;

    SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(
            'MAX(IF (K.MaterialName = "', K.MaterialName,  '", K.TotalQtyTol,"-")) AS `',K.MaterialName,' > ',K.MaterialCode,'`'
        )
    ) INTO @sql
    FROM forecasting_ppic_totqty K;

    SET @sql =  CONCAT(
                    'SELECT @no:=@no+1 as `No.>1`, m.ProductName as `Product Name>2`, (K.TotalQty)`Total Qty>3`,
                    (K.TotalQtyTol)`Total Qty + Tol>4`,',
                    @sql,
                    ' FROM mforecastingh m
												  left join mforecastingd n on m.IDForh=n.IDForh
                          left join forecasting_ppic_totqty K on K.ProductCode=m.ProductCode
                          left join forecasting_ppic_month f on f.ProductCode=m.ProductCode
                          WHERE n.CustomerCode =  "',
                    @cust,
                    '" AND n.Category = "',
                    @cat,
                    '" GROUP BY K.ProductCode Order by @no asc'
                );

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    SET @sql = NULL;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `TotalForecastPPICFix`
--

DROP PROCEDURE IF EXISTS `TotalForecastPPICFix`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `TotalForecastPPICFix`(customer varchar(100),cat varchar(100),begda varchar(2),endda varchar(2))
BEGIN
    SET @cust = customer;
    SET @cat = cat;
    SET @begda = begda;
    SET @endda = endda;
    SET @sql = NULL;
    SET @no  = 0;

    SET @sql = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(

            'MAX(IF (f.bulanName = "', f.bulanName,  '", f.qty,"-")) AS `',f.bulanName,'>`'
        )
    )
    FROM forecasting_ppic_month f where CustomerCode = @cust and categoryMt = @cat and (bulan between @begda and @endda)
                              order by f.bulan asc);

    SET @sqlgo = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(
            'MAX(IF (K.MaterialName = "', K.MaterialName,  '", K.TotalQtyTol,"-")) AS `',K.MaterialName,' > ',K.MaterialCode,'`'
        )
    )
    FROM forecasting_ppic_totqty K where CustomerCode = @cust and Category = @cat and begda = @begda and endda = @endda);

    SET @sql =  CONCAT(
                    'SELECT @no:=@no+1 as `No.>1`, m.ProductName as `Product Name>2`,
                      ',@sql,', (K.TotalQty)`Total Qty>3`,
                    (K.TotalQtyTol)`Total Qty + Tol>4`,',@sqlgo,' FROM mforecastingh m
												  left join mforecastingd n on m.IDForh=n.IDForh
                          left join forecasting_ppic_totqty K on K.ProductCode=m.ProductCode
                          left join forecasting_ppic_month f on f.ProductCode=m.ProductCode
                          WHERE n.CustomerCode =  "',
                    @cust,
                    '" AND n.Category = "',
                    @cat,
                    '" AND begda = "',
                    @begda,
                    '" AND endda = "',
                    @endda,
                    '" GROUP BY K.ProductCode Order by @no asc'
                );

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    SET @sql = NULL;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `WarehousePPIC`
--

DROP PROCEDURE IF EXISTS `WarehousePPIC`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `WarehousePPIC`(customer varchar(100),cat varchar(100),begda varchar(2),endda varchar(2))
BEGIN
    SET @cust = customer;
    SET @cat = cat;
    SET @begda = begda;
    SET @endda = endda;
    SET @sql = NULL;
    SET @no  = 0;

    SET @sql = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(

            'MAX(IF (f.bulanName = "', f.bulanName,  '","0" ,"0")) AS `',f.bulanName,'>`'
        )
    )
    FROM forecasting_ppic_month f where CustomerCode = @cust and categoryMt = @cat and (bulan between @begda and @endda)
                                  order by f.bulan asc);


    SET @sqlgo = (SELECT
    GROUP_CONCAT(DISTINCT
        CONCAT(
            'MAX(IF (K.MaterialName = "', K.MaterialName,  '", K.QtyWarehouse,"-")) AS `',K.MaterialName,'`'
        )
    )
    FROM forecasting_ppic_totqty K where CustomerCode = @cust and Category = @cat and begda = @begda and endda = @endda);

    SET @sql =  CONCAT(
                    'SELECT @no:=@no+1 as `No.>1`, m.ProductName as `Product Name>2`,',@sql,', (K.TotalQty*0)`Total Qty>3`,
                    (K.TotalQtyTol*0)`Total Qty + Tol>4`,',
                    @sqlgo,
                    ' FROM mforecastingh m
												  left join mforecastingd n on m.IDForh=n.IDForh
                          left join forecasting_ppic_totqty K on K.ProductCode=m.ProductCode
                          left join forecasting_ppic_month f on f.ProductCode=m.ProductCode
                          WHERE n.CustomerCode =  "',
                    @cust,
                    '" AND n.Category = "',
                    @cat,
                    '" AND begda = "',
                    @begda,
                    '" AND endda = "',
                    @endda,
                    '" Order by @no asc'
                );

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    SET @sql = NULL;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
