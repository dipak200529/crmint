-- MySQL dump 10.13  Distrib 5.7.23, for linux-glibc2.12 (x86_64)
--
-- Host: localhost    Database: crm
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `crm_activity`
--

DROP TABLE IF EXISTS `crm_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `fk_cust_id` int(11) NOT NULL,
  `activity_type` enum('call','email','visit') NOT NULL COMMENT '1=call 2=email 3=visit',
  `description` text NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_activity`
--

LOCK TABLES `crm_activity` WRITE;
/*!40000 ALTER TABLE `crm_activity` DISABLE KEYS */;
INSERT INTO `crm_activity` VALUES (1,2,1,'call','Pls call them',1,'2019-04-30 12:42:34',NULL,NULL),(2,2,65,'email','jkaskjasa ddd  fdvdd',2,'2019-04-30 12:48:14',NULL,NULL),(3,1,3,'email','jkbjhg yt jhb k',1,'2019-05-01 13:58:22',NULL,NULL);
/*!40000 ALTER TABLE `crm_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_customer`
--

DROP TABLE IF EXISTS `crm_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL COMMENT '1= Paid 0=Unpaid',
  `createdby` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_customer`
--

LOCK TABLES `crm_customer` WRITE;
/*!40000 ALTER TABLE `crm_customer` DISABLE KEYS */;
INSERT INTO `crm_customer` VALUES (1,'Timmy Dumbreck','tdumbreck0@reference.com','5142919743','141 North Lane','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(2,'Lilla Teideman','lteideman1@typepad.com','9626438124','35272 Lyons Place','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(3,'Rawley Elger','relger2@symantec.com','3226333748','7430 Aberg Way','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(4,'Grange Tatnell','gtatnell3@over-blog.com','1194354031','29 Gale Park','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(5,'Lorita Morgans','lmorgans4@vinaora.com','4497835257','67589 Vahlen Junction','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(6,'Etienne Scarce','escarce5@ted.com','5389549003','8 Esker Court','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(7,'Honoria Southerell','hsoutherell6@zdnet.com','8112195889','20768 7th Terrace','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(8,'Katharine Finlator','kfinlator7@google.ca','3773119432','55 Darwin Junction','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(9,'Fidel Cordaroy','fcordaroy8@newyorker.com','8886446300','744 Warrior Circle','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(10,'Hartwell Calven','hcalven9@biblegateway.com','4157186327','0657 Susan Drive','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(11,'Che Castellani','ccastellania@naver.com','5328813897','4045 Summer Ridge Hill','Unpaid',1,'2019-04-30 08:23:52',NULL,NULL),(12,'Dody Kmieciak','dkmieciakb@skype.com','2625122319','13 Hanover Point','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(13,'Kippie Elldred','kelldredc@admin.ch','2461686357','3368 Fallview Hill','Paid',1,'2019-04-30 08:23:52',NULL,NULL),(14,'Roxie D\'Ambrosi','rdambrosid@flavors.me','4987215124','57 Esch Trail','Paid',1,'2019-04-30 08:23:53',NULL,NULL),(15,'Carrie Shore','cshoree@acquirethisname.com','9942819441','9006 Sage Place','Unpaid',1,'2019-04-30 08:23:53',NULL,NULL),(16,'Kary Pudsall','kpudsallf@google.de','8075013035','55297 Oxford Place','Unpaid',1,'2019-04-30 08:23:53',NULL,NULL),(17,'Lil Pedron','lpedrong@mozilla.com','5707583705','43 Straubel Hill','Paid',1,'2019-04-30 08:23:53',NULL,NULL),(18,'Gene Minci','gmincih@toplist.cz','7096800558','04 Longview Plaza','Unpaid',1,'2019-04-30 08:23:53',NULL,NULL),(19,'Chrissie Vasyanin','cvasyanini@de.vu','7047756138','8339 Lukken Pass','Unpaid',1,'2019-04-30 08:23:53',NULL,NULL),(20,'Oran Lidster','olidsterj@cbslocal.com','4621838624','8 Continental Hill','Paid',1,'2019-04-30 08:23:53',NULL,NULL),(21,'Nicolea Hryniewicki','nhryniewickik@nbcnews.com','8455553317','3 Nevada Plaza','Unpaid',1,'2019-04-30 08:23:53',NULL,NULL),(22,'Rikki Kier','rkierl@merriam-webster.com','9265989348','4 Grasskamp Circle','Paid',1,'2019-04-30 08:23:53',NULL,NULL),(23,'Tommi Imbrey','timbreym@vk.com','5983699162','54 Everett Lane','Paid',1,'2019-04-30 08:23:53',NULL,NULL),(24,'Thorndike Billings','tbillingsn@technorati.com','1552309977','86 Stang Lane','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(25,'Andra Gillian','agilliano@blinklist.com','5694108637','54 Southridge Alley','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(26,'Nicki Worsalls','nworsallsp@facebook.com','9577853476','0576 Surrey Way','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(27,'Ignacio Clemmett','iclemmettq@wufoo.com','7718944457','0 Graceland Crossing','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(28,'Nickie Schoenleiter','nschoenleiterr@ftc.gov','2141904924','5789 Ronald Regan Circle','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(29,'Justina McGragh','jmcgraghs@ovh.net','9482303173','7 Swallow Plaza','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(30,'Dniren Romaine','dromainet@elegantthemes.com','9632656017','184 Oakridge Court','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(31,'Josiah Wakeman','jwakemanu@scientificamerican.com','6061186590','8 Warrior Place','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(32,'Christopher Alesbrook','calesbrookv@adobe.com','4365564436','09 Sloan Center','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(33,'Carlita Gatiss','cgatissw@amazon.com','1881792138','1 Golf Drive','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(34,'Madison Kenway','mkenwayx@constantcontact.com','1017475015','30 Coleman Road','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(35,'Marie Cordey','mcordeyy@washingtonpost.com','2068574724','88 Fallview Circle','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(36,'Cele Licciardo','clicciardoz@sbwire.com','2482352434','94 Macpherson Park','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(37,'Rene Castanone','rcastanone10@livejournal.com','5346210263','78 Johnson Pass','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(38,'Bradley Whitford','bwhitford11@1688.com','8439392415','8830 Raven Parkway','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(39,'Elijah Bazylets','ebazylets12@purevolume.com','4223303772','98221 Alpine Junction','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(40,'Rena Blooman','rblooman13@house.gov','7387526432','76351 Trailsway Lane','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(41,'Reider Caroli','rcaroli14@aol.com','1067524293','25 Anniversary Avenue','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(42,'Laurie Shewsmith','lshewsmith15@odnoklassniki.ru','9546253773','3827 Banding Parkway','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(43,'Huntington Greatorex','hgreatorex16@patch.com','3485062691','955 Clove Place','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(44,'Corby Bassham','cbassham17@google.com','7864171055','76 Arkansas Terrace','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(45,'Dasha Topham','dtopham18@yolasite.com','8537947960','3 Westerfield Hill','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(46,'Garrot Butten','gbutten19@amazon.co.uk','4139207849','38 Valley Edge Plaza','Paid',1,'2019-04-30 08:23:54',NULL,NULL),(47,'Wernher Eixenberger','weixenberger1a@hubpages.com','4651390841','034 Corry Place','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(48,'Janelle Tevlin','jtevlin1b@sogou.com','1895668820','02131 Center Park','Unpaid',1,'2019-04-30 08:23:54',NULL,NULL),(49,'Man Grimsdike','mgrimsdike1c@accuweather.com','3974889575','172 Waywood Way','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(50,'Sammy Kloster','skloster1d@a8.net','2086085988','249 Mandrake Plaza','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(51,'Kristal Treend','ktreend1e@imageshack.us','4783530542','96230 Lyons Avenue','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(52,'Phillie Romanetti','promanetti1f@statcounter.com','2487237257','53726 Ridgeway Lane','Unpaid',1,'2019-04-30 08:23:55',NULL,NULL),(53,'Roman Di Francesco','rdi1g@bigcartel.com','6898745047','2 Spaight Center','Unpaid',1,'2019-04-30 08:23:55',NULL,NULL),(54,'Morris Prine','mprine1h@ftc.gov','4882498135','1 Anniversary Plaza','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(55,'Charis Maddin','cmaddin1i@exblog.jp','8765029449','776 Parkside Plaza','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(56,'Bobine Hallan','bhallan1j@prnewswire.com','7607915821','217 Nova Way','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(57,'Adolpho Buckner','abuckner1k@bbb.org','8555590814','9 South Avenue','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(58,'Sheff Feldheim','sfeldheim1l@google.com.br','8969528694','51 Sunnyside Terrace','Paid',1,'2019-04-30 08:23:55',NULL,NULL),(59,'Valentia Alen','valen1m@furl.net','9045279647','68730 Golf Course Center','Unpaid',1,'2019-04-30 08:23:55',NULL,NULL),(60,'Stu Conws','sconws1n@tinyurl.com','4108748986','941 Johnson Circle','Unpaid',1,'2019-04-30 08:23:55',NULL,NULL),(61,'Antoni Simeon','asimeon1o@friendfeed.com','3205675480','33429 Becker Drive','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(62,'Laurie Paladini','lpaladini1p@berkeley.edu','4129099553','04715 Heath Point','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(63,'Fiona Goseling','fgoseling1q@sourceforge.net','5776492520','55180 Nancy Way','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(64,'Lana Mossop','lmossop1r@yelp.com','8831437607','526 Meadow Ridge Alley','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(65,'Zaria Blitz','zblitz1s@domainmarket.com','9043210297','0468 Melvin Point','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(66,'Chelsey O\'Callaghan','cocallaghan1t@home.pl','3279629254','790 Butterfield Trail','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(67,'Judy Ugo','jugo1u@1und1.de','7265799760','0 Maple Parkway','Unpaid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(68,'Mahmoud Jerzycowski','mjerzycowski1v@state.gov','5569653897','4202 Sullivan Parkway','Unpaid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(69,'Ericha Burnage','eburnage1w@businessinsider.com','5948034393','20822 Waywood Alley','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(70,'Danny Errol','derrol1x@cisco.com','1938048021','7116 6th Junction','Unpaid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(71,'Becca Dundon','bdundon1y@drupal.org','4007671059','7 Dottie Circle','Paid',2,'2019-04-30 08:23:55',NULL,'2019-04-30 10:08:40'),(72,'Alene Hunston','ahunston1z@cafepress.com','5911190592','1124 Portage Place','Unpaid',2,'2019-04-30 08:23:56',NULL,'2019-04-30 10:08:40'),(73,'Stanly Sparham','ssparham20@walmart.com','5526458530','534 Messerschmidt Center','Unpaid',2,'2019-04-30 08:23:56',NULL,'2019-04-30 10:08:40'),(74,'Bella Fellgate','bfellgate21@about.com','4683515466','8 Becker Circle','Paid',2,'2019-04-30 08:23:56',NULL,'2019-04-30 10:08:40'),(75,'Marabel Bowery','mbowery22@jiathis.com','9575761080','2 Columbus Place','Unpaid',2,'2019-04-30 08:23:56',NULL,'2019-04-30 10:08:40'),(1001,'Ayush Agrawal','ayushsmile01@gmail.com','9439228354','House No: 45,\r\nKIIT Road, Patia','Paid',1,'2019-05-01 13:55:00',NULL,NULL);
/*!40000 ALTER TABLE `crm_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_faq`
--

DROP TABLE IF EXISTS `crm_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` varchar(250) DEFAULT NULL,
  `ans` text NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` varchar(50) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_faq`
--

LOCK TABLES `crm_faq` WRITE;
/*!40000 ALTER TABLE `crm_faq` DISABLE KEYS */;
INSERT INTO `crm_faq` VALUES (1,'How to add user?','Step 1: Login as admin\r\nStep 2: Click on user\r\nStep 3: Click on ADD New\r\nStep 4: Fill up the user data','1','2019-04-30 19:28:19',NULL,NULL),(2,'How to add a customer?','Step 1: Login as admin\r\nStep 2: Click on customer\r\nStep 3: Click on Add New\r\nStep 4: Fill up the user data','1','2019-04-30 20:45:28',NULL,NULL);
/*!40000 ALTER TABLE `crm_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_user`
--

DROP TABLE IF EXISTS `crm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` enum('Admin','User') NOT NULL DEFAULT 'User',
  `createdby` int(11) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_user`
--

LOCK TABLES `crm_user` WRITE;
/*!40000 ALTER TABLE `crm_user` DISABLE KEYS */;
INSERT INTO `crm_user` VALUES (1,'Admin Boss','admin','boss@crmexe.in','7003376429','$2y$10$NJVaqmXL5H1WtDucgK0lCescCquH.JtQHlUpt34f2/mOB2uGtAsM6','Admin',0,'2019-04-29 20:10:27',NULL,'2019-04-30 05:08:16'),(2,'User One','user1','user1@crmexe.in','7003376429','$2y$10$NJVaqmXL5H1WtDucgK0lCescCquH.JtQHlUpt34f2/mOB2uGtAsM6','User',1,'2019-04-30 10:14:12',NULL,NULL);
/*!40000 ALTER TABLE `crm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crmint_sessions`
--

DROP TABLE IF EXISTS `crmint_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmint_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmint_sessions`
--

LOCK TABLES `crmint_sessions` WRITE;
/*!40000 ALTER TABLE `crmint_sessions` DISABLE KEYS */;
INSERT INTO `crmint_sessions` VALUES ('aelgtaseis3srje9a0173218vvh9uqmr','103.218.237.8',1556651237,_binary '__ci_last_regenerate|i:1556651237;user|s:1:\"1\";'),('3e1nu9iupo38df6afh321n490mvp384s','103.218.237.8',1556651632,_binary '__ci_last_regenerate|i:1556651632;user|s:1:\"1\";'),('39j6ic7o3mf6nv6ad8kk2fikcegg570q','103.218.237.8',1556651964,_binary '__ci_last_regenerate|i:1556651964;user|s:1:\"1\";'),('741stlf3l75oohs87obb9606gear0pef','103.218.237.8',1556652507,_binary '__ci_last_regenerate|i:1556652507;user|s:1:\"1\";'),('lcu83lj1em40i9qdfsgppvvgvr5ukvlt','103.218.237.8',1556652918,_binary '__ci_last_regenerate|i:1556652918;user|s:1:\"1\";'),('03eucs33mqjrjud2lhdsdsr96g9hiq0l','103.218.237.8',1556653890,_binary '__ci_last_regenerate|i:1556653890;user|s:1:\"1\";'),('vsrmo6c5hnnn6uftq62ib038v9i0its2','103.218.237.8',1556654603,_binary '__ci_last_regenerate|i:1556654603;user|s:1:\"1\";'),('vp2rc0jjsn7jemutbiavm57gv04a2utm','103.218.237.8',1556654905,_binary '__ci_last_regenerate|i:1556654905;user|s:1:\"1\";'),('a5hcaiq5kpv1jagscka57ki7vdn3t5n5','103.218.237.8',1556655274,_binary '__ci_last_regenerate|i:1556655274;user|s:1:\"1\";'),('o0s8jncrononv7if9fq87cdi26s3ua5f','103.218.237.8',1556655593,_binary '__ci_last_regenerate|i:1556655593;user|s:1:\"1\";'),('i8h527k1nu7gban4i4b0vrfofedg8vfe','103.218.237.8',1556655968,_binary '__ci_last_regenerate|i:1556655968;user|s:1:\"1\";'),('eej4al42ha747mngql1ofbl89aa76e6g','103.218.237.8',1556656335,_binary '__ci_last_regenerate|i:1556656335;user|s:1:\"1\";'),('mrrnvtqlcvn2rs5ntsfbqg1k7i1hcc4u','103.218.237.8',1556656660,_binary '__ci_last_regenerate|i:1556656660;user|s:1:\"1\";'),('me2ql7jtlo5n621jf2e8f2ndcq37pur2','103.218.237.8',1556656996,_binary '__ci_last_regenerate|i:1556656996;user|s:1:\"1\";'),('e7hvk0vpkbi5dminsvap0pm144uqi2ql','103.218.237.8',1556657383,_binary '__ci_last_regenerate|i:1556657383;user|s:1:\"1\";'),('80stmenc5s88srjsmflad9467gvfdl3d','103.218.237.8',1556657773,_binary '__ci_last_regenerate|i:1556657773;user|s:1:\"1\";'),('0lb568fc84hifldmci9a878vk1jnjpli','103.218.237.8',1556658355,_binary '__ci_last_regenerate|i:1556658355;user|s:1:\"1\";'),('qpl5vggd6kbrr5r2r3lfl34fqoqsnqp4','103.218.237.8',1556658606,_binary '__ci_last_regenerate|i:1556658355;user|s:1:\"2\";'),('gift1jv7683p0o7oucc4j5gffiflsqvs','103.218.237.8',1556682927,_binary '__ci_last_regenerate|i:1556682893;user|s:1:\"1\";'),('pe3rhce9u52fc2hvc4q5mc3otgoojrfo','103.218.237.8',1556684252,_binary '__ci_last_regenerate|i:1556684252;'),('kk3pvhrrpg425i1jl7qnjog64n0bpnlb','115.42.33.157',1556719253,_binary '__ci_last_regenerate|i:1556719253;user|s:1:\"1\";'),('pf2ouqf6d96gre2bmv1ei57p3faj4o92','115.42.33.157',1556719262,_binary '__ci_last_regenerate|i:1556719253;user|s:1:\"1\";');
/*!40000 ALTER TABLE `crmint_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-01 13:34:42
