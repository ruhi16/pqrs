BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `users` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`email`	varchar NOT NULL,
	`password`	varchar NOT NULL,
	`remember_token`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `users` VALUES (1,'Hari Narayan Das','hndas15@gmail.com','$2y$10$jn1N0rdKjJFRuUCWPDyqsu4wRF2fV/9C/CEEbYYy92AjI.ZaAKtNq','AZutyjYXlzAFnryVZrAKs8DGSbk0cLsHOmqLbmZpbNHOrGeJPSJejNd7niwt','2017-12-26 17:34:05','2017-12-26 17:34:05');
CREATE TABLE IF NOT EXISTS `teachers` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`name`	varchar NOT NULL,
	`mobno`	varchar NOT NULL,
	`desig`	varchar NOT NULL,
	`hqual`	varchar NOT NULL,
	`mnsub_id`	varchar NOT NULL,
	`status`	varchar NOT NULL,
	`notes`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `teachers` VALUES (1,1,'Arjun','1234567890','HM/TIC','Masters with B.Ed','1','OKey','NA','','2018-03-11 14:00:17');
INSERT INTO `teachers` VALUES (2,1,'Ram','123','AHM','Bachallors','6','OKey','NA','2018-03-10 19:12:02','2018-03-11 13:50:59');
CREATE TABLE IF NOT EXISTS `subjteachers` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`subject_id`	integer NOT NULL,
	`teacher_id`	integer NOT NULL,
	`status`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `subjteachers` VALUES (2,1,5,1,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (3,1,3,1,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (4,1,1,2,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (7,1,8,2,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (8,1,9,2,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (11,1,3,2,'OKey',NULL,NULL);
CREATE TABLE IF NOT EXISTS `subjfullmarks` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`exmtypclssub_id`	integer NOT NULL,
	`clssub_id`	integer NOT NULL,
	`fm`	integer,
	`status`	varchar,
	`notes`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `subjfullmarks` VALUES (58,2,9,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (59,2,10,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (60,2,11,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (61,2,12,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (62,2,13,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (63,2,14,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (64,2,15,112,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (65,4,16,122,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (66,4,17,122,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (67,4,18,122,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (68,6,9,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (69,6,10,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (70,6,11,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (71,6,12,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (72,6,13,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (73,6,14,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (74,6,15,212,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (75,8,16,222,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (76,8,17,222,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (77,8,18,222,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (78,10,9,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (79,10,10,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (80,10,11,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (81,10,12,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (82,10,13,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (83,10,14,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (84,10,15,312,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (85,12,16,322,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (86,12,17,322,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (87,12,18,322,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (88,1,1,10,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (89,1,2,7,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (90,1,3,0,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (91,1,4,25,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (92,1,5,111,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (93,3,6,121,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (94,3,7,121,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (95,3,8,121,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (96,5,1,20,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (97,5,2,211,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (98,5,3,211,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (99,5,4,211,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (100,5,5,211,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (101,7,6,221,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (102,7,7,221,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (103,7,8,221,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (104,9,1,30,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (105,9,2,311,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (106,9,3,311,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (107,9,4,311,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (108,9,5,311,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (109,11,6,321,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (110,11,7,321,'Active','',NULL,NULL);
INSERT INTO `subjfullmarks` VALUES (111,11,8,321,'Active','',NULL,NULL);
CREATE TABLE IF NOT EXISTS `subjects` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`code`	varchar,
	`extype_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `subjects` VALUES (1,'BENGALI','BENG',1,1,'','2018-01-26 08:00:37');
INSERT INTO `subjects` VALUES (2,'ENGLISH','ENGB',1,1,'','');
INSERT INTO `subjects` VALUES (3,'HISTORY','HIST',1,1,'','');
INSERT INTO `subjects` VALUES (4,'GEOGRAPHY','GEOG',1,1,'','');
INSERT INTO `subjects` VALUES (5,'PHYSICAL SCIENCE','PHYS',1,1,'','');
INSERT INTO `subjects` VALUES (6,'LIEF SCIENCE','LFSC',1,1,'','');
INSERT INTO `subjects` VALUES (7,'MATHEMATICS','MATH',1,1,'','');
INSERT INTO `subjects` VALUES (8,'ARABIC','ARBC',1,1,'','');
INSERT INTO `subjects` VALUES (9,'WORK EDUCATION','WRED	',1,1,'','');
INSERT INTO `subjects` VALUES (10,'PHYSICAL EDUCATION','PHED',1,1,'','');
INSERT INTO `subjects` VALUES (11,'PARTICIPATION','PART',2,1,'','');
INSERT INTO `subjects` VALUES (12,'QUESTIONING AND EXPERIMENTATION','QUEX',2,1,'','');
INSERT INTO `subjects` VALUES (13,'INTERPRETATION AND APPLICATION','INAP',2,1,'','');
INSERT INTO `subjects` VALUES (14,'EMPATHY AND COOPERATION','EMCO',2,1,'','');
INSERT INTO `subjects` VALUES (15,'AESTHETIC AND CREATIVE EXPRESSION','AECR',2,1,'',NULL);
CREATE TABLE IF NOT EXISTS `studentdbs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`admBookNo`	integer,
	`admSlNo`	integer,
	`prCls`	varchar,
	`prSch`	varchar,
	`admDate`	date,
	`name`	varchar,
	`adhaar`	varchar,
	`fname`	varchar,
	`fadhaar`	varchar,
	`mname`	varchar,
	`madhaar`	varchar,
	`dob`	date,
	`vill`	varchar,
	`post`	varchar,
	`pstn`	varchar,
	`dist`	varchar,
	`pin`	varchar,
	`mobl`	varchar,
	`ssex`	varchar,
	`phch`	varchar,
	`relg`	varchar,
	`cste`	varchar,
	`natn`	varchar,
	`accNo`	varchar,
	`ifsc`	varchar,
	`micr`	varchar,
	`bnnm`	varchar,
	`brnm`	varchar,
	`stclss_id`	integer,
	`stsec_id`	integer,
	`stsession_id`	integer,
	`streason`	integer,
	`enclss_id`	integer,
	`ensec_id`	integer,
	`ensession_id`	integer,
	`enreason`	integer,
	`crstatus`	varchar,
	`remarks`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `studentdbs` VALUES (1,1,11,'V','Manikchak','28-02-2018','Gopal Krishna','111111111123','Mahadev','111111132323','Jashoda','154263254125','12-02-2018','Begamganj','Jiaganj','Jiaganj','Murshidabad','742123','123542','Male','No','Hindu','General','Indian','1111111','21524','215236',NULL,'Jiaganj',2,1,1,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-02-28 14:04:57','2018-03-07 20:18:01');
INSERT INTO `studentdbs` VALUES (2,1,1,'IV','dasfas','06-03-2018','Mrinal','111111111111','sdfs','111111111111','gdfg','111111111111','09-03-2018','ssss','aas','sdfd','sdes','9082','1235','Female','No','Hindu','General','Indian','123','123','125','ubi','abcd',3,1,1,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-03-06 17:29:21','2018-03-15 13:52:19');
INSERT INTO `studentdbs` VALUES (3,1,10,'IV','Manikchak Primary School','02-01-2018','Abu Taher','123456789012','dsfas','333333333333','dfsf','333333333333','02-01-1980','Jangipur','Jangipur','Jangipur','Murshidabad','742104','4521458752','Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-03-08 08:50:43','2018-03-08 08:52:04');
INSERT INTO `studentdbs` VALUES (4,1,10,'IV','Manikchak Primary School','02-01-2018','Abu Taher','123456789012','dsfas','333333333333','dfsf','333333333333','02-01-1980','Jangipur','Jangipur','Jangipur','Murshidabad','742104','4521458752','Male','Yes','Islam','OBC-A','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-03-08 08:51:31','2018-03-08 08:51:31');
INSERT INTO `studentdbs` VALUES (5,1,101,'IV','Manikchak Primary School','10-03-2018','Sabir Ali','111111111111','abcbd','111111111111','pqrs','111111111111','16-03-2018','aa','dfd','sfddsf','dfdsfs','fsfsd','1111111111','Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-03-10 08:19:56','2018-03-10 08:19:56');
INSERT INTO `studentdbs` VALUES (6,0,0,'','','','Hari','','','','','','','','','','','','','Male','Yes','Islam','General','Indian','','','','','',1,1,1,'','','','','','','','','2018-03-15 10:46:42');
INSERT INTO `studentdbs` VALUES (7,0,0,'','','','Rahim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (8,0,0,'','','','Tarun',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (9,0,0,'','','','Kiran',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (10,0,0,'','','','Barun',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (11,0,0,'','','','Manish',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (12,0,0,'','','','Agnish',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (13,0,0,'','','','Santanu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (14,0,0,'','','','Gopal','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (15,0,0,'','','','Ayan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (16,0,0,'','','','Shila',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (17,0,0,'','','','Bimla',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (18,0,0,'','','','Kamla','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,3,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (19,0,0,'','','','Toufik','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (20,0,0,'','','','Satyaki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (21,0,0,'','','','Amal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (22,0,0,'','','','Shyamal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (23,0,0,'','','','Sanjoy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (24,0,0,'','','','Bibhas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (25,0,0,'','','','Charan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `studentdbs` VALUES (26,NULL,NULL,NULL,NULL,NULL,'amar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:39:47','2018-03-15 10:13:01');
INSERT INTO `studentdbs` VALUES (27,NULL,NULL,NULL,NULL,NULL,'bbbb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:45:01','2018-03-14 19:45:01');
INSERT INTO `studentdbs` VALUES (28,NULL,NULL,NULL,NULL,NULL,'bbbb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:46:11','2018-03-14 19:46:11');
INSERT INTO `studentdbs` VALUES (29,NULL,NULL,NULL,NULL,NULL,'Sandip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:46:26','2018-03-15 10:22:56');
INSERT INTO `studentdbs` VALUES (30,NULL,NULL,NULL,NULL,NULL,'bbbb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:47:02','2018-03-14 19:47:02');
INSERT INTO `studentdbs` VALUES (31,NULL,NULL,NULL,NULL,NULL,'Abu Taher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 05:54:07','2018-03-15 05:54:07');
INSERT INTO `studentdbs` VALUES (32,NULL,NULL,NULL,NULL,NULL,'Barun Singha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 05:55:04','2018-03-15 05:55:04');
INSERT INTO `studentdbs` VALUES (33,NULL,NULL,NULL,NULL,NULL,'kiran',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 06:04:40','2018-03-15 10:33:59');
INSERT INTO `studentdbs` VALUES (34,NULL,NULL,NULL,NULL,NULL,'toufik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male','Yes','Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,4,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 06:05:05','2018-03-15 10:34:26');
CREATE TABLE IF NOT EXISTS `studentcrs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`studentdb_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`clss_id`	integer NOT NULL,
	`section_id`	integer NOT NULL,
	`roll_no`	integer,
	`exam_status`	varchar,
	`fullmarks`	integer,
	`obtmarks`	integer,
	`obtperc`	float,
	`noDs`	integer,
	`result`	varchar,
	`crstatus`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `studentcrs` VALUES (8,2,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 15:50:38','2018-03-15 10:35:07');
INSERT INTO `studentcrs` VALUES (9,14,1,1,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 15:51:24','2018-01-08 15:51:24');
INSERT INTO `studentcrs` VALUES (11,15,1,1,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:15:49','2018-01-08 18:15:49');
INSERT INTO `studentcrs` VALUES (12,1,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:17:39','2018-01-08 18:17:39');
INSERT INTO `studentcrs` VALUES (13,13,1,1,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:17:41','2018-01-08 18:17:41');
INSERT INTO `studentcrs` VALUES (14,16,1,1,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:17:43','2018-01-08 18:17:43');
INSERT INTO `studentcrs` VALUES (15,6,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:14','2018-03-15 10:46:42');
INSERT INTO `studentcrs` VALUES (16,21,1,1,3,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:15','2018-01-08 18:27:15');
INSERT INTO `studentcrs` VALUES (17,18,1,1,3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:16','2018-01-08 18:27:16');
INSERT INTO `studentcrs` VALUES (18,19,1,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:25','2018-01-08 18:27:25');
INSERT INTO `studentcrs` VALUES (19,8,1,1,5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:26','2018-01-08 18:27:26');
INSERT INTO `studentcrs` VALUES (20,7,1,1,4,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:33','2018-01-08 18:27:33');
INSERT INTO `studentcrs` VALUES (21,20,1,1,4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:34','2018-01-08 18:27:34');
INSERT INTO `studentcrs` VALUES (22,17,1,1,4,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-08 18:27:35','2018-01-08 18:27:35');
INSERT INTO `studentcrs` VALUES (23,9,1,2,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-09 06:43:06','2018-01-09 06:43:06');
INSERT INTO `studentcrs` VALUES (24,22,1,1,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-28 18:55:15','2018-01-28 18:55:15');
INSERT INTO `studentcrs` VALUES (25,24,1,1,1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-02-02 08:58:36','2018-02-02 08:58:36');
INSERT INTO `studentcrs` VALUES (26,30,1,1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:47:02','2018-03-14 19:47:02');
INSERT INTO `studentcrs` VALUES (27,26,1,4,4,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-14 19:48:47','2018-03-15 10:13:01');
INSERT INTO `studentcrs` VALUES (28,31,1,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 05:54:07','2018-03-15 05:54:07');
INSERT INTO `studentcrs` VALUES (29,32,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 05:55:04','2018-03-15 05:55:04');
INSERT INTO `studentcrs` VALUES (30,33,1,4,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 06:04:40','2018-03-15 10:33:59');
INSERT INTO `studentcrs` VALUES (31,34,1,4,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-15 06:05:05','2018-03-15 10:04:27');
CREATE TABLE IF NOT EXISTS `sessions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar,
	`stdate`	date,
	`entdate`	date,
	`status`	varchar,
	`prsession_id`	integer,
	`nxsession_id`	integer,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `sessions` VALUES (1,'2015','01-01-2015','31-12-2015','CURRENT',0,2,'','2018-01-20 01:40:24');
INSERT INTO `sessions` VALUES (2,'2016','01-01-2016','31-12-3016','CLOSED',1,3,'','2018-01-20 01:40:22');
INSERT INTO `sessions` VALUES (3,'2017','01-01-2017','31-12-2017','CLOSED',2,4,'','');
INSERT INTO `sessions` VALUES (4,'2018','01-01-2018','31-12-2018','CLOSED',3,5,'','2018-01-11 15:21:10');
INSERT INTO `sessions` VALUES (5,'2019','2019-01-01','2019-12-31','CLOSED',4,6,'2018-01-11 18:59:47','2018-01-11 18:59:47');
INSERT INTO `sessions` VALUES (6,'2020','2020-01-01','2020-12-31','CLOSED',5,7,'2018-01-11 19:05:06','2018-01-12 07:12:48');
INSERT INTO `sessions` VALUES (7,'2021','2021-01-01','2021-03-12','CLOSED',6,NULL,'2018-01-12 07:12:48','2018-01-12 07:12:48');
CREATE TABLE IF NOT EXISTS `sections` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`status`	varchar,
	`session_id`	integer,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `sections` VALUES (1,'A','Active',1,'','');
INSERT INTO `sections` VALUES (2,'B','Active',1,'','');
INSERT INTO `sections` VALUES (3,'C','Active',1,'','');
INSERT INTO `sections` VALUES (4,'D','Active',1,'','');
INSERT INTO `sections` VALUES (5,'E','Active',1,'','');
INSERT INTO `sections` VALUES (7,'F',NULL,1,'2018-03-12 14:26:09','2018-03-12 14:26:09');
CREATE TABLE IF NOT EXISTS `schools` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`name`	varchar NOT NULL,
	`vill`	varchar,
	`po`	varchar,
	`ps`	varchar,
	`pin`	varchar,
	`dist`	varchar,
	`index`	varchar,
	`hscode`	varchar,
	`disecode`	varchar,
	`estd`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `schools` VALUES (1,1,'Manikchak High Madrash(H.S.)','Manikchak','Manikchak','Lalgola','742148','Murshidabad','12-04-03-01-035','116126','19071515802','1921','2018-01-17 19:05:16','2018-01-17 19:05:16');
CREATE TABLE IF NOT EXISTS `password_resets` (
	`email`	varchar NOT NULL,
	`token`	varchar NOT NULL,
	`created_at`	datetime
);
CREATE TABLE IF NOT EXISTS `miscoptions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`tabName`	varchar NOT NULL,
	`fieldName`	varchar NOT NULL,
	`options`	varchar NOT NULL,
	`status`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `miscoptions` VALUES (1,1,'studentdbs','ssex','Male','active','','');
INSERT INTO `miscoptions` VALUES (2,1,'studentdbs','ssex','Female','active','','');
INSERT INTO `miscoptions` VALUES (3,1,'studentdbs','phch','Yes','active','','');
INSERT INTO `miscoptions` VALUES (4,1,'studentdbs','phch','No','active','','');
INSERT INTO `miscoptions` VALUES (5,1,'studentdbs','relg','Hindu','active','','');
INSERT INTO `miscoptions` VALUES (6,1,'studentdbs','relg','Islam','active','','');
INSERT INTO `miscoptions` VALUES (7,1,'studentdbs','relg','Jain','active','','');
INSERT INTO `miscoptions` VALUES (8,1,'studentdbs','relg','Budhist','active','','');
INSERT INTO `miscoptions` VALUES (9,1,'studentdbs','cste','General','active','','');
INSERT INTO `miscoptions` VALUES (10,1,'studentdbs','cste','SC','active','','');
INSERT INTO `miscoptions` VALUES (11,1,'studentdbs','cste','ST','active','','');
INSERT INTO `miscoptions` VALUES (12,1,'studentdbs','cste','OBC-A','active','','');
INSERT INTO `miscoptions` VALUES (13,1,'studentdbs','cste','OBC-B','active','','');
INSERT INTO `miscoptions` VALUES (14,1,'studentdbs','natn','Indian','active','','');
INSERT INTO `miscoptions` VALUES (15,1,'studentdbs','natn','Other','active','','');
INSERT INTO `miscoptions` VALUES (16,0,'teachers','desig','HM/TIC','active','','');
INSERT INTO `miscoptions` VALUES (17,0,'teachers','desig','AHM','active','','');
INSERT INTO `miscoptions` VALUES (18,0,'teachers','desig','Asst. Teacher','active','','');
INSERT INTO `miscoptions` VALUES (19,0,'teachers','desig','Para Teacher','active','','');
INSERT INTO `miscoptions` VALUES (20,0,'teachers','desig','Guest Teacher','active','','');
INSERT INTO `miscoptions` VALUES (21,0,'teachers','hqual','Masters','active','','');
INSERT INTO `miscoptions` VALUES (22,0,'teachers','hqual','Masters with B.Ed','active','','');
INSERT INTO `miscoptions` VALUES (23,0,'teachers','hqual','Bachallors','active','','');
INSERT INTO `miscoptions` VALUES (24,0,'teachers','hqual','Bachallors with BEd','active','','');
CREATE TABLE IF NOT EXISTS `migrations` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`migration`	varchar NOT NULL,
	`batch`	integer NOT NULL
);
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (3,'2017_12_19_145955_create_exams_table',2);
INSERT INTO `migrations` VALUES (4,'2017_12_19_150030_create_extypes_table',2);
INSERT INTO `migrations` VALUES (5,'2017_12_19_150039_create_clsses_table',2);
INSERT INTO `migrations` VALUES (6,'2017_12_19_150058_create_sessions_table',2);
INSERT INTO `migrations` VALUES (7,'2017_12_19_150115_create_subjects_table',2);
INSERT INTO `migrations` VALUES (8,'2017_12_23_034512_create_clssubs_table',2);
INSERT INTO `migrations` VALUES (9,'2017_12_27_185747_create_exmtypclssubs_table',3);
INSERT INTO `migrations` VALUES (13,'2017_12_28_161133_create_studentcrs_table',4);
INSERT INTO `migrations` VALUES (16,'2017_12_29_143537_create_sections_table',5);
INSERT INTO `migrations` VALUES (17,'2017_12_29_143628_create_clssecs_table',5);
INSERT INTO `migrations` VALUES (20,'2018_01_07_193715_create_marksentries_table',6);
INSERT INTO `migrations` VALUES (22,'2018_01_16_094831_create_schools_table',7);
INSERT INTO `migrations` VALUES (25,'2018_01_18_013929_create_finalizeparticulars_table',8);
INSERT INTO `migrations` VALUES (26,'2018_01_18_014454_create_finalizesessions_table',8);
INSERT INTO `migrations` VALUES (31,'2018_01_28_074244_create_gradeparticulars_table',9);
INSERT INTO `migrations` VALUES (32,'2018_01_28_074703_create_grades_table',9);
INSERT INTO `migrations` VALUES (34,'2018_02_01_054857_create_gradedescriptions_table',10);
INSERT INTO `migrations` VALUES (35,'2017_12_28_154305_create_studentdbs_table',11);
INSERT INTO `migrations` VALUES (37,'2018_03_08_061327_create_teachers_table',13);
INSERT INTO `migrations` VALUES (38,'2018_03_08_061927_create_subjteachers_table',13);
INSERT INTO `migrations` VALUES (39,'2018_03_02_180044_create_miscoptions_table',14);
INSERT INTO `migrations` VALUES (41,'2018_03_09_061722_create_subjfullmarks_table',15);
CREATE TABLE IF NOT EXISTS `marksentries` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`exmtypclssub_id`	integer NOT NULL,
	`clssec_id`	integer NOT NULL,
	`clssub_id`	integer NOT NULL,
	`studentcr_id`	integer NOT NULL,
	`marks`	integer NOT NULL,
	`status`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `marksentries` VALUES (109,1,1,1,12,1,'Correct',1,'2018-03-14 07:24:09','2018-03-14 07:24:09');
INSERT INTO `marksentries` VALUES (110,1,1,1,13,2,'Correct',1,'2018-03-14 07:24:10','2018-03-14 07:24:10');
INSERT INTO `marksentries` VALUES (111,1,1,1,14,3,'Correct',1,'2018-03-14 07:24:10','2018-03-14 07:24:10');
INSERT INTO `marksentries` VALUES (112,1,1,1,24,4,'Correct',1,'2018-03-14 07:24:11','2018-03-14 07:24:11');
INSERT INTO `marksentries` VALUES (113,1,1,1,25,5,'Correct',1,'2018-03-14 07:24:11','2018-03-14 07:24:11');
INSERT INTO `marksentries` VALUES (114,9,1,1,12,3,'Correct',1,'2018-03-14 07:24:53','2018-03-14 07:24:53');
INSERT INTO `marksentries` VALUES (115,9,1,1,13,4,'Correct',1,'2018-03-14 07:24:53','2018-03-14 07:24:53');
INSERT INTO `marksentries` VALUES (116,9,1,1,24,6,'Correct',1,'2018-03-14 07:24:54','2018-03-14 07:24:54');
INSERT INTO `marksentries` VALUES (117,9,1,1,25,7,'Correct',1,'2018-03-14 07:24:55','2018-03-14 07:24:55');
INSERT INTO `marksentries` VALUES (118,2,1,2,12,6,'Correct',1,'2018-03-14 07:27:02','2018-03-14 07:27:02');
INSERT INTO `marksentries` VALUES (119,2,1,2,13,7,'Correct',1,'2018-03-14 07:27:03','2018-03-14 07:27:03');
INSERT INTO `marksentries` VALUES (120,2,1,2,14,8,'Correct',1,'2018-03-14 07:27:03','2018-03-14 07:27:03');
INSERT INTO `marksentries` VALUES (121,2,1,2,24,9,'Correct',1,'2018-03-14 07:27:04','2018-03-14 07:27:04');
INSERT INTO `marksentries` VALUES (122,2,1,2,25,0,'Correct',1,'2018-03-14 07:27:04','2018-03-14 07:27:04');
INSERT INTO `marksentries` VALUES (123,19,1,3,25,-99,'Correct',1,'2018-03-14 07:39:02','2018-03-14 07:39:02');
INSERT INTO `marksentries` VALUES (124,19,1,3,24,4,'Correct',1,'2018-03-14 07:39:03','2018-03-14 07:39:03');
INSERT INTO `marksentries` VALUES (125,19,1,3,14,3,'Correct',1,'2018-03-14 07:39:03','2018-03-14 07:39:03');
INSERT INTO `marksentries` VALUES (126,19,1,3,13,2,'Correct',1,'2018-03-14 07:39:04','2018-03-14 07:39:04');
INSERT INTO `marksentries` VALUES (127,19,1,3,12,1,'Correct',1,'2018-03-14 07:39:04','2018-03-14 07:39:04');
INSERT INTO `marksentries` VALUES (128,16,2,8,8,6,'Correct',1,'2018-03-14 08:02:19','2018-03-14 08:02:19');
INSERT INTO `marksentries` VALUES (129,16,2,8,9,5,'Correct',1,'2018-03-14 08:02:20','2018-03-14 08:02:20');
INSERT INTO `marksentries` VALUES (130,16,2,8,11,4,'Correct',1,'2018-03-14 08:02:20','2018-03-14 08:02:20');
INSERT INTO `marksentries` VALUES (131,6,1,6,25,-99,'Correct',1,'2018-03-14 08:06:54','2018-03-14 08:06:54');
INSERT INTO `marksentries` VALUES (132,6,1,6,24,4,'Correct',1,'2018-03-14 08:06:55','2018-03-14 08:06:55');
INSERT INTO `marksentries` VALUES (133,6,1,6,14,3,'Correct',1,'2018-03-14 08:06:55','2018-03-14 08:06:55');
INSERT INTO `marksentries` VALUES (134,6,1,6,13,2,'Correct',1,'2018-03-14 08:06:56','2018-03-14 08:06:56');
INSERT INTO `marksentries` VALUES (135,6,1,6,12,1,'Correct',1,'2018-03-14 08:06:56','2018-03-14 08:06:56');
CREATE TABLE IF NOT EXISTS `grades` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`extype_id`	integer NOT NULL,
	`gradeparticular_id`	integer NOT NULL,
	`stpercentage`	float NOT NULL,
	`enpercentage`	float NOT NULL,
	`descrp`	varchar,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `grades` VALUES (1,1,1,90.0,100.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (2,1,2,80.0,89.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (3,1,3,70.0,79.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (4,1,4,60.0,69.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (5,1,5,45.0,59.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (6,1,6,25.0,44.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (7,1,7,0.0,24.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (8,2,2,75.0,100.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (9,2,4,50.0,74.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (10,2,6,25.0,49.0,NULL,1,NULL,NULL);
INSERT INTO `grades` VALUES (11,2,7,0.0,24.0,NULL,1,NULL,NULL);
CREATE TABLE IF NOT EXISTS `gradeparticulars` (
	`id`	integer NOT NULL,
	`name`	varchar NOT NULL,
	`status`	varchar DEFAULT (null),
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime,
	PRIMARY KEY(`id`)
);
INSERT INTO `gradeparticulars` VALUES (1,'A+','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (2,'A','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (3,'B+','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (4,'B','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (5,'C+','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (6,'C','1',1,NULL,NULL);
INSERT INTO `gradeparticulars` VALUES (7,'D','1',1,NULL,NULL);
CREATE TABLE IF NOT EXISTS `gradedescriptions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`subject_id`	integer NOT NULL,
	`grade_id`	integer NOT NULL,
	`desc`	varchar,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `finalizesessions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`finalizeparticular_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`remarks`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `finalizesessions` VALUES (32,1,1,'oke','2018-03-08 15:05:10','2018-03-08 15:05:10');
INSERT INTO `finalizesessions` VALUES (33,3,1,'oke','2018-03-08 15:06:36','2018-03-08 15:06:36');
INSERT INTO `finalizesessions` VALUES (34,5,1,'oke','2018-03-12 14:25:38','2018-03-12 14:25:38');
INSERT INTO `finalizesessions` VALUES (35,7,1,'oke','2018-03-12 14:25:44','2018-03-12 14:25:44');
INSERT INTO `finalizesessions` VALUES (36,14,1,'oke','2018-03-12 14:26:38','2018-03-12 14:26:38');
CREATE TABLE IF NOT EXISTS `finalizeparticulars` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`particular`	varchar NOT NULL,
	`status`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `finalizeparticulars` VALUES (1,'sessions','active',1,'','');
INSERT INTO `finalizeparticulars` VALUES (2,'clssecs','active',1,'2018-01-19 18:51:28','2018-01-19 18:51:28');
INSERT INTO `finalizeparticulars` VALUES (3,'clsses','active',1,'2018-01-19 18:51:28','2018-01-19 18:51:28');
INSERT INTO `finalizeparticulars` VALUES (4,'clssubs','active',1,'2018-01-19 18:51:28','2018-01-19 18:51:28');
INSERT INTO `finalizeparticulars` VALUES (5,'exams','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (6,'exmtypclssubs','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (7,'extypes','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (8,'finalizeparticulars','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (9,'finalizesessions','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (10,'marksentries','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (11,'migrations','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (12,'password_resets','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (13,'schools','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (14,'sections','active',1,'2018-01-19 18:51:29','2018-01-19 18:51:29');
INSERT INTO `finalizeparticulars` VALUES (15,'sqlite_sequence','active',1,'2018-01-19 18:51:30','2018-01-19 18:51:30');
INSERT INTO `finalizeparticulars` VALUES (16,'studentcrs','active',1,'2018-01-19 18:51:30','2018-01-19 18:51:30');
INSERT INTO `finalizeparticulars` VALUES (17,'studentdbs','active',1,'2018-01-19 18:51:30','2018-01-19 18:51:30');
INSERT INTO `finalizeparticulars` VALUES (18,'subjects','active',1,'2018-01-19 18:51:30','2018-01-19 18:51:30');
INSERT INTO `finalizeparticulars` VALUES (19,'users','active',1,'2018-01-19 18:51:30','2018-01-19 18:51:30');
INSERT INTO `finalizeparticulars` VALUES (20,'gradeparticulars','active',1,'2018-01-28 07:56:41','2018-01-28 07:56:41');
INSERT INTO `finalizeparticulars` VALUES (21,'grades','active',1,'2018-01-28 07:56:41','2018-01-28 07:56:41');
INSERT INTO `finalizeparticulars` VALUES (22,'descriptions','active',1,'2018-01-28 17:45:47','2018-01-28 17:45:47');
INSERT INTO `finalizeparticulars` VALUES (23,'gradedescriptions','active',1,'2018-02-01 10:29:05','2018-02-01 10:29:05');
INSERT INTO `finalizeparticulars` VALUES (24,'miscoptions','active',1,'2018-03-08 15:05:31','2018-03-08 15:05:31');
INSERT INTO `finalizeparticulars` VALUES (25,'subjteachers','active',1,'2018-03-08 15:05:31','2018-03-08 15:05:31');
INSERT INTO `finalizeparticulars` VALUES (26,'teachers','active',1,'2018-03-08 15:05:31','2018-03-08 15:05:31');
INSERT INTO `finalizeparticulars` VALUES (27,'subjfullmarks','active',1,'2018-03-12 14:16:36','2018-03-12 14:16:36');
CREATE TABLE IF NOT EXISTS `extypes` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `extypes` VALUES (1,'SUMMATIVE',1,'','');
INSERT INTO `extypes` VALUES (2,'FORMATIVE',1,'',NULL);
CREATE TABLE IF NOT EXISTS `exmtypclssubs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`exam_id`	integer NOT NULL,
	`extype_id`	integer NOT NULL,
	`clss_id`	integer NOT NULL,
	`subject_id`	INTEGER,
	`fm`	integer NOT NULL,
	`pm`	INTEGER,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `exmtypclssubs` VALUES (1,1,1,1,1,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (2,1,1,1,2,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (3,1,1,1,3,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (4,1,1,1,4,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (5,1,1,1,7,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (6,1,2,1,11,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (7,1,2,1,12,0,0,1,'2018-03-13 15:36:02','2018-03-13 15:36:02');
INSERT INTO `exmtypclssubs` VALUES (8,1,2,1,13,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (9,2,1,1,1,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (10,2,1,1,2,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (11,2,1,1,3,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (12,2,1,1,4,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (13,2,1,1,7,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (14,2,2,1,11,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (15,2,2,1,12,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (16,2,2,1,13,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (17,3,1,1,1,0,0,1,'2018-03-13 15:36:03','2018-03-13 15:36:03');
INSERT INTO `exmtypclssubs` VALUES (18,3,1,1,2,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (19,3,1,1,3,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (20,3,1,1,4,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (21,3,1,1,7,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (22,3,2,1,11,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (23,3,2,1,12,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
INSERT INTO `exmtypclssubs` VALUES (24,3,2,1,13,0,0,1,'2018-03-13 15:36:04','2018-03-13 15:36:04');
CREATE TABLE IF NOT EXISTS `exams` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `exams` VALUES (1,'1ST TERM',1,'','');
INSERT INTO `exams` VALUES (2,'2ND TERM',1,'','');
INSERT INTO `exams` VALUES (3,'3RD TERM',1,'','2018-01-25 13:44:23');
CREATE TABLE IF NOT EXISTS `clssubs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`clss_id`	integer NOT NULL,
	`subject_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clssubs` VALUES (1,1,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (2,1,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (3,1,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (4,1,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (5,1,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (6,1,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (7,1,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (8,1,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (9,2,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (10,2,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (11,2,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (12,2,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (13,2,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (14,2,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (15,2,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (16,2,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (17,2,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (18,2,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (19,3,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (20,3,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (21,3,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (22,3,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (23,3,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (24,3,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (25,3,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (26,3,8,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (27,3,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (28,3,10,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (29,3,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (30,3,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (31,3,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (32,3,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (33,3,15,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (34,4,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (35,4,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (36,4,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (37,4,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (38,4,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (39,4,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (40,4,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (41,4,8,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (42,4,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (43,4,10,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (44,4,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (45,4,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (46,4,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (47,4,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (48,4,15,1,NULL,NULL);
CREATE TABLE IF NOT EXISTS `clsses` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clsses` VALUES (1,'V',1,'','2018-01-22 18:26:26');
INSERT INTO `clsses` VALUES (2,'VI',1,'','');
INSERT INTO `clsses` VALUES (3,'VII',1,'','');
INSERT INTO `clsses` VALUES (4,'VIII',1,'2018-01-25 10:20:58','2018-01-25 10:25:33');
CREATE TABLE IF NOT EXISTS `clssecs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`clss_id`	integer NOT NULL,
	`section_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clssecs` VALUES (1,1,1,1,'2018-01-12 19:11:10','2018-01-12 19:11:10');
INSERT INTO `clssecs` VALUES (2,1,2,1,'2018-01-12 19:11:16','2018-01-12 19:11:16');
INSERT INTO `clssecs` VALUES (3,1,3,1,'2018-01-12 19:11:17','2018-01-12 19:11:17');
INSERT INTO `clssecs` VALUES (4,1,4,1,'2018-01-12 19:11:17','2018-01-12 19:11:17');
INSERT INTO `clssecs` VALUES (5,1,5,1,'2018-01-12 19:11:22','2018-01-12 19:11:22');
INSERT INTO `clssecs` VALUES (6,2,1,1,'2018-01-12 19:11:19','2018-01-12 19:11:19');
INSERT INTO `clssecs` VALUES (7,2,2,1,'2018-01-12 19:11:20','2018-01-12 19:11:20');
INSERT INTO `clssecs` VALUES (8,2,3,1,'2018-01-12 19:11:20','2018-01-12 19:11:20');
INSERT INTO `clssecs` VALUES (9,3,1,1,'2018-01-12 19:11:13','2018-01-12 19:11:13');
INSERT INTO `clssecs` VALUES (10,3,2,1,'2018-01-12 19:11:15','2018-01-12 19:11:15');
INSERT INTO `clssecs` VALUES (11,4,1,1,'2018-01-12 19:11:14','2018-01-12 19:11:14');
INSERT INTO `clssecs` VALUES (12,4,2,1,'2018-01-12 19:11:24','2018-01-12 19:11:24');
CREATE UNIQUE INDEX IF NOT EXISTS `users_email_unique` ON `users` (
	`email`
);
CREATE INDEX IF NOT EXISTS `password_resets_email_index` ON `password_resets` (
	`email`
);
COMMIT;
