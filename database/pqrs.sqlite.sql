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
INSERT INTO `users` VALUES (1,'Hari Narayan Das','hndas15@gmail.com','$2y$10$z8lDYmHIWw4x8/BIDnk/C.p9KEWHf6ExRgnOfbcGhTaYuqX5BqLwK','M2c4NJoBWLTXsvUAUj0oX1xI9JYPTqylhnpvGoDYYR3CIBQJ86XzIo7bQixD','2018-03-23 17:07:01','2018-03-23 17:07:01');
CREATE TABLE IF NOT EXISTS `teachers` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`name`	varchar NOT NULL,
	`mobno`	varchar,
	`desig`	varchar,
	`hqual`	varchar,
	`mnsub_id`	varchar,
	`status`	varchar,
	`notes`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `teachers` VALUES (1,1,'Md Miftahus Isalm Beg',NULL,'HM/TIC','Bachallors with BEd','3','OKey','NA','2018-03-22 13:49:17','2018-03-22 13:49:17');
INSERT INTO `teachers` VALUES (2,1,'Manik Biswas',NULL,'AHM','Bachallors with BEd','16','OKey','NA','2018-03-22 14:03:28','2018-03-22 14:03:28');
INSERT INTO `teachers` VALUES (3,1,'Abu Taher',NULL,'Asst. Teacher','Bachallors with BEd','16','OKey','NA','2018-03-22 14:04:13','2018-03-22 14:04:13');
INSERT INTO `teachers` VALUES (4,1,'Mashihar Rahaman',NULL,'Asst. Teacher','Masters with B.Ed','2','OKey','NA','2018-03-22 14:04:42','2018-03-22 14:04:42');
INSERT INTO `teachers` VALUES (5,1,'Narayan Barman',NULL,'Asst. Teacher','Masters with B.Ed','5','OKey','NA','2018-03-22 14:05:26','2018-03-22 14:05:26');
INSERT INTO `teachers` VALUES (6,1,'Rameez Raja',NULL,'Asst. Teacher','Masters with B.Ed','4','OKey','NA','2018-03-22 14:05:57','2018-03-22 14:05:57');
INSERT INTO `teachers` VALUES (7,1,'Md Faridul Haque',NULL,'Asst. Teacher','Bachallors with BEd','18','OKey','NA','2018-03-22 14:06:31','2018-03-22 14:06:31');
INSERT INTO `teachers` VALUES (8,1,'Ganesh Chandra Mondal',NULL,'Asst. Teacher','Masters with B.Ed','10','OKey','NA','2018-03-27 17:41:08','2018-03-27 17:41:08');
INSERT INTO `teachers` VALUES (9,1,'Abdul Momen',NULL,'Asst. Teacher','Masters with B.Ed','19','OKey','NA','2018-03-27 17:41:39','2018-03-27 17:41:39');
INSERT INTO `teachers` VALUES (10,1,'Navid Anjum',NULL,'Asst. Teacher','Masters with B.Ed','4','OKey','NA','2018-03-27 17:42:17','2018-03-27 17:42:17');
INSERT INTO `teachers` VALUES (11,1,'Md Abu Jar',NULL,'Asst. Teacher','Bachallors with BEd','3','OKey','NA','2018-03-27 17:42:49','2018-03-27 17:42:49');
INSERT INTO `teachers` VALUES (12,1,'Soumen Mondal',NULL,'Asst. Teacher','Bachallors with BEd','16','OKey','NA','2018-03-27 17:43:27','2018-03-27 17:43:27');
INSERT INTO `teachers` VALUES (13,1,'Md Abdur Rouf',NULL,'Asst. Teacher','Masters with B.Ed','17','OKey','NA','2018-03-27 17:44:06','2018-03-27 17:44:06');
INSERT INTO `teachers` VALUES (14,1,'Rafina Yeasmin',NULL,'Asst. Teacher','Bachallors with BEd','1','OKey','NA','2018-03-27 17:44:38','2018-03-27 17:44:38');
INSERT INTO `teachers` VALUES (15,1,'Hanjal Sk',NULL,'Asst. Teacher','Bachallors with BEd','1','OKey','NA','2018-03-27 17:44:53','2018-03-27 17:44:53');
INSERT INTO `teachers` VALUES (16,1,'Mst Aleya Khatun',NULL,'Asst. Teacher','Bachallors with BEd','16','OKey','NA','2018-03-27 17:45:32','2018-03-27 17:45:32');
INSERT INTO `teachers` VALUES (17,1,'Md Mukhlesur Rahaman',NULL,'Asst. Teacher','Masters with B.Ed','19','OKey','NA','2018-03-27 17:46:11','2018-03-27 17:46:11');
INSERT INTO `teachers` VALUES (18,1,'Md Sarifujjaman',NULL,'Asst. Teacher','Masters with B.Ed','3','OKey','NA','2018-03-27 17:46:38','2018-03-27 17:46:38');
INSERT INTO `teachers` VALUES (19,1,'Rajesh Upadhyay',NULL,'Asst. Teacher','Bachallors with BEd','16','OKey','NA','2018-03-27 17:47:19','2018-03-27 17:47:19');
INSERT INTO `teachers` VALUES (20,1,'Koushik Goswami',NULL,'Asst. Teacher','Bachallors with BEd','19','OKey','NA','2018-03-27 17:48:11','2018-03-27 17:48:11');
INSERT INTO `teachers` VALUES (21,1,'Hari Narayan  Das','9635212811','Asst. Teacher','Masters with B.Ed','4','OKey','NA','2018-03-27 17:50:02','2018-03-27 17:50:02');
INSERT INTO `teachers` VALUES (22,1,'Debasis Roy',NULL,'Asst. Teacher','Masters with B.Ed','2','OKey','NA','2018-03-27 17:50:28','2018-03-27 17:50:28');
INSERT INTO `teachers` VALUES (23,1,'Md Abul Fazal',NULL,'Asst. Teacher','Masters with B.Ed','3','OKey','NA','2018-03-27 17:52:08','2018-03-27 17:52:08');
INSERT INTO `teachers` VALUES (24,1,'Md Sabir Ahamed',NULL,'Asst. Teacher','Bachallors with BEd','9','OKey','NA','2018-03-27 17:52:40','2018-03-27 17:52:40');
INSERT INTO `teachers` VALUES (25,1,'Barun Kumar Singha',NULL,'Asst. Teacher','Masters with B.Ed','18','OKey','NA','2018-03-27 17:54:17','2018-03-27 17:54:17');
INSERT INTO `teachers` VALUES (26,1,'Dola Rani Dey',NULL,'Asst. Teacher','Bachallors with BEd','17','OKey','NA','2018-03-27 17:54:44','2018-03-27 17:54:44');
INSERT INTO `teachers` VALUES (27,1,'Md Aynal Hoque',NULL,'Asst. Teacher','Bachallors with BEd','2','OKey','NA','2018-03-27 17:55:03','2018-03-27 17:55:03');
INSERT INTO `teachers` VALUES (28,1,'Sutap Giri',NULL,'Asst. Teacher','Bachallors with BEd','16','OKey','NA','2018-03-27 17:56:33','2018-03-27 17:56:33');
INSERT INTO `teachers` VALUES (29,1,'Jiarul Sardar',NULL,'Asst. Teacher','Masters with B.Ed','2','OKey','NA','2018-03-27 17:57:23','2018-03-27 17:57:23');
INSERT INTO `teachers` VALUES (30,1,'Sk Abdul Aziz',NULL,'Asst. Teacher','Masters with B.Ed','1','OKey','NA','2018-03-27 17:57:42','2018-03-27 17:57:42');
INSERT INTO `teachers` VALUES (31,1,'Choudhury Zinnat Hossain',NULL,'Asst. Teacher','Bachallors with BEd','2','OKey','NA','2018-03-27 17:58:04','2018-03-27 17:58:04');
INSERT INTO `teachers` VALUES (32,1,'Ziarul Golder',NULL,'Asst. Teacher','Masters with B.Ed','1','OKey','NA','2018-03-27 17:58:56','2018-03-27 17:58:56');
INSERT INTO `teachers` VALUES (33,1,'Md Rafikul Hasan',NULL,'Asst. Teacher','Masters with B.Ed','4','OKey','NA','2018-03-27 17:59:26','2018-03-27 17:59:26');
INSERT INTO `teachers` VALUES (34,1,'Md Ismail Hoque',NULL,'Para Teacher','Bachallors','2','OKey','NA','2018-03-27 18:01:02','2018-03-27 18:01:02');
INSERT INTO `teachers` VALUES (35,1,'Ziaul Hoque',NULL,'Asst. Teacher','Bachallors','19','OKey','NA','2018-03-27 18:01:30','2018-03-27 18:01:30');
INSERT INTO `teachers` VALUES (36,1,'Rakhi Khatun',NULL,'Para Teacher','Bachallors','1','OKey','NA','2018-03-27 18:06:38','2018-03-27 18:06:38');
INSERT INTO `teachers` VALUES (37,1,'Pakija Khatun',NULL,'Para Teacher','Bachallors','18','OKey','NA','2018-03-27 18:06:57','2018-03-27 18:06:57');
INSERT INTO `teachers` VALUES (38,1,'Miratunnehar',NULL,'Para Teacher','Bachallors','1','OKey','NA','2018-03-27 18:07:11','2018-03-27 18:07:11');
CREATE TABLE IF NOT EXISTS `subjteachers` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer NOT NULL,
	`subject_id`	integer NOT NULL,
	`teacher_id`	integer NOT NULL,
	`status`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `subjteachers` VALUES (1,1,3,1,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (2,1,8,1,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (3,1,4,2,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (4,1,16,2,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (5,1,3,3,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (6,1,4,3,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (7,1,5,3,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (8,1,8,3,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (9,1,2,4,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (10,1,1,5,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (11,1,5,5,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (12,1,6,5,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (13,1,7,5,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (14,1,4,6,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (15,1,5,6,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (16,1,3,7,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (17,1,8,7,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (18,1,18,7,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (19,1,6,8,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (20,1,7,8,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (21,1,9,8,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (22,1,10,8,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (23,1,5,9,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (24,1,6,9,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (25,1,7,9,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (26,1,18,9,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (27,1,19,9,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (28,1,4,10,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (29,1,5,10,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (30,1,16,10,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (31,1,3,11,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (32,1,8,11,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (33,1,4,12,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (34,1,5,12,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (35,1,16,12,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (36,1,5,13,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (37,1,9,13,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (38,1,17,13,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (39,1,1,14,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (40,1,1,15,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (41,1,4,16,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (42,1,5,16,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (43,1,16,16,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (44,1,17,16,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (45,1,6,17,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (46,1,7,17,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (47,1,19,17,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (48,1,3,18,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (49,1,8,18,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (50,1,4,19,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (51,1,5,19,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (52,1,17,19,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (54,1,6,20,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (55,1,7,20,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (56,1,19,20,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (57,1,4,21,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (58,1,5,21,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (59,1,2,22,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (60,1,5,22,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (61,1,3,23,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (62,1,8,23,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (63,1,9,23,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (64,1,3,24,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (65,1,8,24,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (66,1,9,24,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (67,1,18,24,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (68,1,6,25,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (69,1,18,25,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (70,1,5,26,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (71,1,17,26,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (72,1,2,27,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (73,1,4,28,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (74,1,5,28,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (75,1,16,28,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (76,1,2,29,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (77,1,1,30,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (78,1,2,31,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (79,1,1,32,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (80,1,4,33,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (81,1,5,33,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (82,1,16,33,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (83,1,2,34,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (84,1,19,35,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (85,1,1,36,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (86,1,18,37,'OKey',NULL,NULL);
INSERT INTO `subjteachers` VALUES (87,1,1,38,'OKey',NULL,NULL);
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
CREATE TABLE IF NOT EXISTS `subjects` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`code`	varchar,
	`extype_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `subjects` VALUES (1,'Bengali','BENG',2,1,'2018-03-16 07:32:43','2018-03-16 07:32:43');
INSERT INTO `subjects` VALUES (2,'English','ENGB',2,1,'2018-03-16 07:33:14','2018-03-16 07:33:14');
INSERT INTO `subjects` VALUES (3,'Arabic','ARBC',2,1,'2018-03-16 07:53:14','2018-03-16 07:53:14');
INSERT INTO `subjects` VALUES (4,'Mathematics','MATH',2,1,'2018-03-16 07:53:27','2018-03-16 07:53:27');
INSERT INTO `subjects` VALUES (5,'Environment and Science','ENSC',2,1,'2018-03-16 07:53:54','2018-03-16 07:53:54');
INSERT INTO `subjects` VALUES (6,'Environment and History','ENHS',2,1,'2018-03-16 07:54:18','2018-03-16 07:54:18');
INSERT INTO `subjects` VALUES (7,'Environment and Geography','ENGR',2,1,'2018-03-16 07:54:58','2018-03-16 07:54:58');
INSERT INTO `subjects` VALUES (8,'Islam Parichay','ISPR',2,1,'2018-03-16 07:55:30','2018-03-16 07:55:30');
INSERT INTO `subjects` VALUES (9,'Health & Physical Education','HLPH',2,1,'2018-03-16 07:56:03','2018-03-16 07:56:03');
INSERT INTO `subjects` VALUES (10,'Art & Work Education','ARWR',2,1,'2018-03-16 07:56:32','2018-03-16 07:56:32');
INSERT INTO `subjects` VALUES (11,'Participation','PRCP',1,1,'2018-03-16 07:57:06','2018-03-16 07:57:06');
INSERT INTO `subjects` VALUES (12,'Questioning and Experimentation','QUEX',1,1,'2018-03-16 07:57:33','2018-03-16 07:57:33');
INSERT INTO `subjects` VALUES (13,'Interpretation and Application','INAP',1,1,'2018-03-16 07:57:54','2018-03-16 07:57:54');
INSERT INTO `subjects` VALUES (14,'Empathy and Co-operation','EMCO',1,1,'2018-03-16 07:58:17','2018-03-16 07:58:17');
INSERT INTO `subjects` VALUES (15,'Aesthetic and Creative Expression','ASCE',1,1,'2018-03-16 07:58:41','2018-03-16 07:58:41');
INSERT INTO `subjects` VALUES (16,'Physical Science','PHSC',2,1,'2018-03-16 07:59:26','2018-03-16 07:59:26');
INSERT INTO `subjects` VALUES (17,'Lief Science','LFSC',2,1,'2018-03-16 07:59:37','2018-03-16 07:59:37');
INSERT INTO `subjects` VALUES (18,'History','HIST',2,1,'2018-03-16 07:59:48','2018-03-16 07:59:48');
INSERT INTO `subjects` VALUES (19,'Geography','GEGR',2,1,'2018-03-16 07:59:58','2018-03-16 07:59:58');
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
INSERT INTO `studentdbs` VALUES (1,NULL,NULL,NULL,NULL,NULL,'Gopal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male',NULL,'Islam','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:16:09','2018-03-26 17:26:07');
INSERT INTO `studentdbs` VALUES (2,NULL,NULL,NULL,NULL,NULL,'Krishna',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Male',NULL,'Hindu','General','Indian',NULL,NULL,NULL,NULL,NULL,1,5,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:18:37','2018-03-19 10:54:12');
INSERT INTO `studentdbs` VALUES (3,NULL,NULL,NULL,NULL,NULL,'Radha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Female',NULL,'Hindu','General','Indian',NULL,NULL,NULL,NULL,NULL,1,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:18:59','2018-03-16 13:18:59');
INSERT INTO `studentdbs` VALUES (4,1,1,'IV','abcd','02-01-2018','Nimai','123456789012','Kiran','123456789012','Sneha','123456789012','02-03-2012','Gopal Nagar','Gopal Nagar','Hridaynagar','Kolkata','700214','1234567890','Male','No','Hindu','General','Indian',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'running',NULL,'2018-03-16 13:23:26','2018-03-16 13:24:12');
INSERT INTO `studentdbs` VALUES (5,NULL,NULL,NULL,NULL,NULL,'Jashoda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Female',NULL,'Hindu','General','Indian',NULL,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-17 05:08:10','2018-03-17 05:08:10');
CREATE TABLE IF NOT EXISTS `studentcrs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`studentdb_id`	integer,
	`session_id`	integer,
	`clss_id`	integer,
	`section_id`	integer,
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
INSERT INTO `studentcrs` VALUES (1,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:16:10','2018-03-16 13:16:10');
INSERT INTO `studentcrs` VALUES (2,2,1,5,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:18:38','2018-03-19 10:53:44');
INSERT INTO `studentcrs` VALUES (3,3,1,1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-16 13:18:59','2018-03-16 13:18:59');
INSERT INTO `studentcrs` VALUES (4,5,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-17 05:08:31','2018-03-17 05:08:31');
CREATE TABLE IF NOT EXISTS `sessions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`stdate`	date NOT NULL,
	`entdate`	date NOT NULL,
	`status`	varchar,
	`prsession_id`	integer,
	`nxsession_id`	integer,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `sessions` VALUES (1,'2018','2018-01-01','2018-01-12','CURRENT',0,1,'2018-03-16 07:08:25','2018-03-26 19:33:20');
INSERT INTO `sessions` VALUES (2,'2019','2019-01-01','2019-12-31','CLOSED',1,NULL,'2018-03-26 19:33:19','2018-03-26 19:33:19');
CREATE TABLE IF NOT EXISTS `sections` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`status`	varchar,
	`session_id`	integer,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `sections` VALUES (1,'A',NULL,1,'2018-03-16 07:21:25','2018-03-16 07:21:25');
INSERT INTO `sections` VALUES (2,'B',NULL,1,'2018-03-16 07:21:30','2018-03-16 07:21:30');
INSERT INTO `sections` VALUES (3,'C',NULL,1,'2018-03-16 07:21:35','2018-03-16 07:21:35');
INSERT INTO `sections` VALUES (4,'D',NULL,1,'2018-03-16 07:21:41','2018-03-16 07:21:41');
INSERT INTO `sections` VALUES (5,'E',NULL,1,'2018-03-16 07:21:49','2018-03-16 07:21:49');
INSERT INTO `sections` VALUES (6,'F',NULL,1,'2018-03-16 07:21:54','2018-03-16 07:21:54');
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
INSERT INTO `schools` VALUES (3,1,'Manikchak High Madrasah(H.S.)','Manikchak','Manikchak','Lalgola','742148','Murshidabad',NULL,NULL,'19071515802','1921','2018-03-26 19:19:27','2018-03-26 19:19:27');
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
INSERT INTO `miscoptions` VALUES (16,1,'teachers','desig','HM/TIC','active','','');
INSERT INTO `miscoptions` VALUES (17,1,'teachers','desig','AHM','active','','');
INSERT INTO `miscoptions` VALUES (18,1,'teachers','desig','Asst. Teacher','active','','');
INSERT INTO `miscoptions` VALUES (19,1,'teachers','desig','Para Teacher','active','','');
INSERT INTO `miscoptions` VALUES (20,1,'teachers','desig','Guest Teacher','active','','');
INSERT INTO `miscoptions` VALUES (21,1,'teachers','hqual','Masters','active','','');
INSERT INTO `miscoptions` VALUES (22,1,'teachers','hqual','Masters with B.Ed','active','','');
INSERT INTO `miscoptions` VALUES (23,1,'teachers','hqual','Bachallors','active','','');
INSERT INTO `miscoptions` VALUES (24,1,'teachers','hqual','Bachallors with BEd','active','','');
CREATE TABLE IF NOT EXISTS `migrations` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`migration`	varchar NOT NULL,
	`batch`	integer NOT NULL
);
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (3,'2017_12_19_145955_create_exams_table',1);
INSERT INTO `migrations` VALUES (4,'2017_12_19_150030_create_extypes_table',1);
INSERT INTO `migrations` VALUES (5,'2017_12_19_150039_create_clsses_table',1);
INSERT INTO `migrations` VALUES (6,'2017_12_19_150058_create_sessions_table',1);
INSERT INTO `migrations` VALUES (7,'2017_12_19_150115_create_subjects_table',1);
INSERT INTO `migrations` VALUES (8,'2017_12_23_034512_create_clssubs_table',1);
INSERT INTO `migrations` VALUES (9,'2017_12_27_185747_create_exmtypclssubs_table',1);
INSERT INTO `migrations` VALUES (10,'2017_12_28_154305_create_studentdbs_table',1);
INSERT INTO `migrations` VALUES (11,'2017_12_28_161133_create_studentcrs_table',1);
INSERT INTO `migrations` VALUES (12,'2017_12_29_143537_create_sections_table',1);
INSERT INTO `migrations` VALUES (13,'2017_12_29_143628_create_clssecs_table',1);
INSERT INTO `migrations` VALUES (14,'2018_01_07_193715_create_marksentries_table',1);
INSERT INTO `migrations` VALUES (15,'2018_01_16_094831_create_schools_table',1);
INSERT INTO `migrations` VALUES (16,'2018_01_18_013929_create_finalizeparticulars_table',1);
INSERT INTO `migrations` VALUES (17,'2018_01_18_014454_create_finalizesessions_table',1);
INSERT INTO `migrations` VALUES (18,'2018_01_28_074244_create_gradeparticulars_table',1);
INSERT INTO `migrations` VALUES (19,'2018_01_28_074703_create_grades_table',1);
INSERT INTO `migrations` VALUES (20,'2018_02_01_054857_create_gradedescriptions_table',1);
INSERT INTO `migrations` VALUES (21,'2018_03_02_180044_create_miscoptions_table',1);
INSERT INTO `migrations` VALUES (22,'2018_03_08_061327_create_teachers_table',1);
INSERT INTO `migrations` VALUES (23,'2018_03_08_061927_create_subjteachers_table',1);
INSERT INTO `migrations` VALUES (24,'2018_03_09_061722_create_subjfullmarks_table',1);
INSERT INTO `migrations` VALUES (25,'2018_03_22_141626_create_answerscriptdistributions_table',2);
INSERT INTO `migrations` VALUES (26,'2018_03_26_185029_create_clssteachers_table',3);
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
INSERT INTO `marksentries` VALUES (1,1,1,1,1,5,'Correct',1,'2018-03-16 13:25:30','2018-03-16 13:25:30');
INSERT INTO `marksentries` VALUES (2,13,1,1,1,15,'Correct',1,'2018-03-16 13:25:40','2018-03-16 13:25:40');
INSERT INTO `marksentries` VALUES (3,25,1,1,1,40,'Correct',1,'2018-03-16 13:25:50','2018-03-16 13:25:50');
INSERT INTO `marksentries` VALUES (4,6,1,6,1,10,'Correct',1,'2018-03-16 13:26:10','2018-03-16 13:26:10');
INSERT INTO `marksentries` VALUES (5,18,1,6,1,18,'Correct',1,'2018-03-16 13:26:20','2018-03-16 13:26:20');
INSERT INTO `marksentries` VALUES (6,30,1,6,1,35,'Correct',1,'2018-03-16 13:26:29','2018-03-16 13:26:29');
INSERT INTO `marksentries` VALUES (7,7,1,7,1,9,'Correct',1,'2018-03-16 13:29:37','2018-03-16 13:29:37');
INSERT INTO `marksentries` VALUES (8,19,1,7,1,-99,'Correct',1,'2018-03-16 14:05:58','2018-03-16 14:05:58');
INSERT INTO `marksentries` VALUES (9,1,1,1,4,10,'Correct',1,'2018-03-17 05:09:17','2018-03-17 05:09:17');
INSERT INTO `marksentries` VALUES (10,13,1,1,4,45,'Correct',1,'2018-03-25 17:28:11','2018-03-25 17:28:11');
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
INSERT INTO `grades` VALUES (1,2,1,90.0,100.0,'sfafdsa',1,'2018-03-16 08:04:23','2018-03-26 20:01:03');
INSERT INTO `grades` VALUES (2,2,2,80.0,89.0,NULL,1,'2018-03-16 08:04:48','2018-03-16 08:04:48');
INSERT INTO `grades` VALUES (3,2,3,70.0,79.0,NULL,1,'2018-03-16 08:08:24','2018-03-16 08:08:24');
INSERT INTO `grades` VALUES (4,2,4,60.0,69.0,NULL,1,'2018-03-16 08:08:37','2018-03-16 08:08:37');
INSERT INTO `grades` VALUES (5,2,5,45.0,59.0,NULL,1,'2018-03-16 08:09:34','2018-03-16 08:09:34');
INSERT INTO `grades` VALUES (6,2,6,25.0,44.0,NULL,1,'2018-03-16 08:10:13','2018-03-16 08:10:13');
INSERT INTO `grades` VALUES (7,2,7,0.0,24.0,NULL,1,'2018-03-16 08:10:25','2018-03-16 08:10:25');
INSERT INTO `grades` VALUES (8,1,2,75.0,100.0,NULL,1,'2018-03-16 08:11:26','2018-03-16 08:11:26');
INSERT INTO `grades` VALUES (9,1,4,50.0,74.0,NULL,1,'2018-03-16 08:11:40','2018-03-16 08:11:40');
INSERT INTO `grades` VALUES (10,1,6,25.0,49.0,NULL,1,'2018-03-16 08:11:56','2018-03-16 08:11:56');
INSERT INTO `grades` VALUES (11,1,7,0.0,24.0,NULL,1,'2018-03-16 08:12:10','2018-03-16 08:12:10');
CREATE TABLE IF NOT EXISTS `gradeparticulars` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`status`	varchar,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `gradeparticulars` VALUES (1,'A+','Oke',1,'2018-03-16 08:02:21','2018-03-16 08:02:21');
INSERT INTO `gradeparticulars` VALUES (2,'A','Oke',1,'2018-03-16 08:02:27','2018-03-16 08:02:27');
INSERT INTO `gradeparticulars` VALUES (3,'B+','Oke',1,'2018-03-16 08:02:34','2018-03-16 08:02:34');
INSERT INTO `gradeparticulars` VALUES (4,'B','Oke',1,'2018-03-16 08:02:38','2018-03-16 08:02:38');
INSERT INTO `gradeparticulars` VALUES (5,'C+','Oke',1,'2018-03-16 08:02:46','2018-03-16 08:02:46');
INSERT INTO `gradeparticulars` VALUES (6,'C','Oke',1,'2018-03-16 08:02:50','2018-03-16 08:02:50');
INSERT INTO `gradeparticulars` VALUES (7,'D','Oke',1,'2018-03-16 08:02:54','2018-03-16 08:02:54');
CREATE TABLE IF NOT EXISTS `gradedescriptions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`subject_id`	integer,
	`grade_id`	integer,
	`desc`	varchar,
	`session_id`	integer,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `gradedescriptions` VALUES (123,11,8,'সক্রিয়ভাবে অংশগ্রহণ করেছে ও নেত্রীত্ব্দানের গুণাবলী আছে।',NULL,'2018-03-24 19:11:24','2018-03-24 19:11:24');
INSERT INTO `gradedescriptions` VALUES (124,11,9,'আদান প্রদানের মধ্যমে সক্রিয়ভাবে অংশগ্রহণ করেছে।',NULL,'2018-03-24 19:11:24','2018-03-24 19:11:24');
INSERT INTO `gradedescriptions` VALUES (125,11,10,'সক্রিয়ভাবে অংশগ্রহণ করেছে কিন্তু আদান প্রদানে খুব আগ্রহী নয়।',NULL,'2018-03-24 19:11:24','2018-03-24 19:11:24');
INSERT INTO `gradedescriptions` VALUES (126,11,11,'অংশগ্রহণে স্বাল্প আগ্রহী।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (127,12,8,'শিক্ষক সহায়ক প্রশ্ন করতে সক্ষম ও অনুসন্ধানে আগ্রহী।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (128,12,9,'শিক্ষক সহায়ক প্রশ্ন করতে সক্ষম কিন্তু অনুসন্ধানে আগ্রহী নয়।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (129,12,10,'শিক্ষক সহায়ক প্রশ্ন করে না কিন্তু অনুসন্ধানে আগ্রহী।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (130,12,11,'প্রশ্ন করে কিন্তু তা শিক্ষণ সম্পর্কিত  অনুসন্ধানে সহায়ক নয়।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (131,13,8,'সংশ্লিষ্ট ধারণার উদাহরয়ের সাহায্যে ব্যাখ্যা ও প্রয়োগ সমর্থ ।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (132,13,9,'সংশ্লিষ্ট ধারণার উদাহরয়ের সাহায্যে ব্যাখ্যা করতে সমর্থ কিন্তু প্রয়োগ অক্ষম।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (133,13,10,'সংশ্লিষ্ট ধারণার আংশিক ব্যাখ্যা করতে সমর্থ কিন্তু প্রয়োগ অক্ষম।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (134,13,11,'সংশ্লিষ্ট ধারণা কেবলমাত্র মুখস্থ করছে।',NULL,'2018-03-24 19:11:25','2018-03-24 19:11:25');
INSERT INTO `gradedescriptions` VALUES (135,14,8,'পরিচিত ও অপরিচিত উভয়ের জন্যই সক্রিয়ভাবে সমানুভূতিশীল।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (136,14,9,'পরিচিত ও অপরিচিত উভয়ের জন্যই সক্রিয়ভাবে সমানুভূতিশীল।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (137,14,10,'পরিচিত এর জন্য  সমানুভূতিশীল।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (138,14,11,'সমানুভূতির প্রকাশ কম।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (139,15,8,'নান্দনিক ও সৃষ্টিশীল(শ্রেণীকক্ষের ভিতর ও বাইরে)।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (140,15,9,'নান্দনিক ও সৃষ্টিশীল(শ্রেণীকক্ষের ভিতর)।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (141,15,10,'নান্দনিক।  সৃষ্টিশীল কর্মকান্ডে আগ্রহী।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
INSERT INTO `gradedescriptions` VALUES (142,15,11,'নান্দনিক।  সৃষ্টিশীল কর্মকান্ডে আগ্রহী কম।',NULL,'2018-03-24 19:11:26','2018-03-24 19:11:26');
CREATE TABLE IF NOT EXISTS `finalizesessions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`finalizeparticular_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`remarks`	varchar NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `finalizesessions` VALUES (1,18,1,'oke','2018-03-16 07:22:37','2018-03-16 07:22:37');
INSERT INTO `finalizesessions` VALUES (2,2,1,'oke','2018-03-16 07:22:46','2018-03-16 07:22:46');
INSERT INTO `finalizesessions` VALUES (3,17,1,'oke','2018-03-16 07:22:55','2018-03-16 07:22:55');
INSERT INTO `finalizesessions` VALUES (4,4,1,'oke','2018-03-16 07:25:58','2018-03-16 07:25:58');
INSERT INTO `finalizesessions` VALUES (5,6,1,'oke','2018-03-16 07:26:53','2018-03-16 07:26:53');
INSERT INTO `finalizesessions` VALUES (6,1,1,'oke','2018-03-16 07:31:58','2018-03-16 07:31:58');
INSERT INTO `finalizesessions` VALUES (7,22,1,'oke','2018-03-16 08:00:34','2018-03-16 08:00:34');
INSERT INTO `finalizesessions` VALUES (10,3,1,'oke','2018-03-16 09:39:32','2018-03-16 09:39:32');
CREATE TABLE IF NOT EXISTS `finalizeparticulars` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`particular`	varchar NOT NULL,
	`status`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `finalizeparticulars` VALUES (1,'clssecs','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (2,'clsses','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (3,'clssubs','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (4,'exams','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (5,'exmtypclssubs','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (6,'extypes','active',1,'2018-03-16 07:12:19','2018-03-16 07:12:19');
INSERT INTO `finalizeparticulars` VALUES (7,'finalizeparticulars','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (8,'finalizesessions','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (9,'gradedescriptions','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (10,'gradeparticulars','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (11,'grades','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (12,'marksentries','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (13,'migrations','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (14,'miscoptions','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (15,'password_resets','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (16,'schools','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (17,'sections','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (18,'sessions','active',1,'2018-03-16 07:12:20','2018-03-16 07:12:20');
INSERT INTO `finalizeparticulars` VALUES (19,'sqlite_sequence','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (20,'studentcrs','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (21,'studentdbs','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (22,'subjects','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (23,'subjfullmarks','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (24,'subjteachers','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (25,'teachers','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (26,'users','active',1,'2018-03-16 07:12:21','2018-03-16 07:12:21');
INSERT INTO `finalizeparticulars` VALUES (27,'answerscriptdistributions','active',1,'2018-03-23 08:48:27','2018-03-23 08:48:27');
INSERT INTO `finalizeparticulars` VALUES (28,'clssteachers','active',1,'2018-03-26 19:40:26','2018-03-26 19:40:26');
CREATE TABLE IF NOT EXISTS `extypes` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `extypes` VALUES (1,'Formative',1,'2018-03-16 07:26:35','2018-03-16 07:26:35');
INSERT INTO `extypes` VALUES (2,'Summative',1,'2018-03-16 07:26:42','2018-03-16 07:26:42');
CREATE TABLE IF NOT EXISTS `exmtypclssubs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`exam_id`	integer NOT NULL,
	`extype_id`	integer NOT NULL,
	`clss_id`	integer NOT NULL,
	`subject_id`	integer NOT NULL,
	`fm`	integer NOT NULL,
	`pm`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `exmtypclssubs` VALUES (1,1,1,1,11,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (2,1,1,1,12,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (3,1,1,1,13,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (4,1,1,1,14,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (5,1,1,1,15,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (6,1,2,1,1,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (7,1,2,1,2,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (8,1,2,1,3,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (9,1,2,1,4,10,0,1,'2018-03-16 10:12:27','2018-03-16 10:12:27');
INSERT INTO `exmtypclssubs` VALUES (10,1,2,1,5,10,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (11,1,2,1,9,10,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (12,1,2,1,10,10,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (13,2,1,1,11,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (14,2,1,1,12,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (15,2,1,1,13,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (16,2,1,1,14,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (17,2,1,1,15,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (18,2,2,1,1,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (19,2,2,1,2,20,0,1,'2018-03-16 10:12:28','2018-03-16 10:12:28');
INSERT INTO `exmtypclssubs` VALUES (20,2,2,1,3,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (21,2,2,1,4,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (22,2,2,1,5,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (23,2,2,1,9,15,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (24,2,2,1,10,15,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (25,3,1,1,11,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (26,3,1,1,12,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (27,3,1,1,13,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (28,3,1,1,14,20,0,1,'2018-03-16 10:12:29','2018-03-16 10:12:29');
INSERT INTO `exmtypclssubs` VALUES (29,3,1,1,15,20,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (30,3,2,1,1,50,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (31,3,2,1,2,50,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (32,3,2,1,3,50,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (33,3,2,1,4,50,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (34,3,2,1,5,50,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (35,3,2,1,9,25,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
INSERT INTO `exmtypclssubs` VALUES (36,3,2,1,10,25,0,1,'2018-03-16 10:12:30','2018-03-16 10:12:30');
CREATE TABLE IF NOT EXISTS `exams` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `exams` VALUES (1,'1st Term',1,'2018-03-16 07:25:13','2018-03-16 07:25:13');
INSERT INTO `exams` VALUES (2,'2nd Term',1,'2018-03-16 07:25:28','2018-03-16 07:25:28');
INSERT INTO `exams` VALUES (3,'3rd Term',1,'2018-03-16 07:25:36','2018-03-16 07:25:36');
CREATE TABLE IF NOT EXISTS `clssubs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`clss_id`	integer NOT NULL,
	`subject_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clssubs` VALUES (1,1,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (2,1,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (3,1,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (4,1,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (5,1,15,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (6,1,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (7,1,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (8,1,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (9,1,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (10,1,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (11,1,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (12,1,10,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (13,2,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (14,2,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (15,2,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (16,2,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (17,2,15,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (18,2,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (19,2,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (20,2,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (21,2,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (22,2,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (23,2,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (24,2,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (25,2,8,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (26,2,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (27,2,10,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (28,3,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (29,3,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (30,3,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (31,3,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (32,3,15,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (33,3,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (34,3,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (35,3,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (36,3,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (37,3,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (38,3,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (39,3,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (40,3,8,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (41,3,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (42,3,10,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (43,4,11,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (44,4,12,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (45,4,13,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (46,4,14,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (47,4,15,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (48,4,1,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (49,4,2,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (50,4,3,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (51,4,4,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (52,4,5,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (53,4,6,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (54,4,7,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (55,4,8,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (56,4,9,1,NULL,NULL);
INSERT INTO `clssubs` VALUES (57,4,10,1,NULL,NULL);
CREATE TABLE IF NOT EXISTS `clssteachers` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer,
	`clss_id`	integer,
	`section_id`	integer,
	`teacher_id`	integer,
	`subject_id`	integer,
	`remarks`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
CREATE TABLE IF NOT EXISTS `clsses` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	varchar NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clsses` VALUES (1,'V',1,'2018-03-16 07:20:03','2018-03-16 07:20:03');
INSERT INTO `clsses` VALUES (2,'VI',1,'2018-03-16 07:20:09','2018-03-16 07:20:09');
INSERT INTO `clsses` VALUES (3,'VII',1,'2018-03-16 07:20:16','2018-03-16 07:20:16');
INSERT INTO `clsses` VALUES (4,'VIII',1,'2018-03-16 07:20:22','2018-03-16 07:20:22');
INSERT INTO `clsses` VALUES (5,'IX',1,'2018-03-16 07:20:27','2018-03-16 07:20:27');
INSERT INTO `clsses` VALUES (6,'X',1,'2018-03-16 07:20:31','2018-03-16 07:20:31');
CREATE TABLE IF NOT EXISTS `clssecs` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`clss_id`	integer NOT NULL,
	`section_id`	integer NOT NULL,
	`session_id`	integer NOT NULL,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `clssecs` VALUES (1,1,1,1,'2018-03-16 07:30:30','2018-03-16 07:30:30');
INSERT INTO `clssecs` VALUES (2,1,2,1,'2018-03-16 07:30:32','2018-03-16 07:30:32');
INSERT INTO `clssecs` VALUES (3,1,3,1,'2018-03-16 07:30:34','2018-03-16 07:30:34');
INSERT INTO `clssecs` VALUES (4,1,4,1,'2018-03-16 07:30:35','2018-03-16 07:30:35');
INSERT INTO `clssecs` VALUES (5,1,5,1,'2018-03-16 07:30:36','2018-03-16 07:30:36');
INSERT INTO `clssecs` VALUES (6,1,6,1,'2018-03-16 07:30:37','2018-03-16 07:30:37');
INSERT INTO `clssecs` VALUES (7,2,1,1,'2018-03-16 07:30:40','2018-03-16 07:30:40');
INSERT INTO `clssecs` VALUES (8,2,2,1,'2018-03-16 07:30:42','2018-03-16 07:30:42');
INSERT INTO `clssecs` VALUES (9,2,3,1,'2018-03-16 07:30:43','2018-03-16 07:30:43');
INSERT INTO `clssecs` VALUES (10,2,4,1,'2018-03-16 07:30:46','2018-03-16 07:30:46');
INSERT INTO `clssecs` VALUES (11,3,1,1,'2018-03-16 07:30:47','2018-03-16 07:30:47');
INSERT INTO `clssecs` VALUES (12,3,2,1,'2018-03-16 07:30:48','2018-03-16 07:30:48');
INSERT INTO `clssecs` VALUES (13,3,3,1,'2018-03-16 07:30:50','2018-03-16 07:30:50');
INSERT INTO `clssecs` VALUES (14,4,1,1,'2018-03-16 07:30:52','2018-03-16 07:30:52');
INSERT INTO `clssecs` VALUES (15,4,2,1,'2018-03-16 07:30:53','2018-03-16 07:30:53');
INSERT INTO `clssecs` VALUES (16,5,1,1,'2018-03-16 07:30:56','2018-03-16 07:30:56');
INSERT INTO `clssecs` VALUES (17,5,2,1,'2018-03-16 07:30:57','2018-03-16 07:30:57');
INSERT INTO `clssecs` VALUES (18,5,3,1,'2018-03-16 07:30:59','2018-03-16 07:30:59');
INSERT INTO `clssecs` VALUES (19,6,1,1,'2018-03-16 07:31:00','2018-03-16 07:31:00');
INSERT INTO `clssecs` VALUES (20,6,2,1,'2018-03-16 07:31:06','2018-03-16 07:31:06');
CREATE TABLE IF NOT EXISTS `answerscriptdistributions` (
	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	`session_id`	integer,
	`exam_id`	integer,
	`extype_id`	integer,
	`clss_id`	integer,
	`section_id`	integer,
	`subject_id`	integer,
	`teacher_id`	integer,
	`noscripted_rec`	integer,
	`nostudent_pre`	integer,
	`issue_dt`	date,
	`submt_dt`	date,
	`finlz_dt`	date,
	`status`	varchar,
	`remark`	varchar,
	`created_at`	datetime,
	`updated_at`	datetime
);
INSERT INTO `answerscriptdistributions` VALUES (11,1,1,2,1,1,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 05:17:54','2018-03-23 05:19:01');
INSERT INTO `answerscriptdistributions` VALUES (12,1,1,2,1,2,1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 06:16:35','2018-03-23 06:16:35');
INSERT INTO `answerscriptdistributions` VALUES (13,1,1,2,1,1,2,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 06:52:25','2018-03-23 06:52:25');
INSERT INTO `answerscriptdistributions` VALUES (14,1,1,2,1,2,2,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 06:52:33','2018-03-23 06:52:33');
INSERT INTO `answerscriptdistributions` VALUES (15,1,1,2,1,2,3,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 06:52:41','2018-03-23 06:52:41');
INSERT INTO `answerscriptdistributions` VALUES (16,1,1,2,1,1,3,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-03-23 09:19:59','2018-03-23 09:19:59');
CREATE UNIQUE INDEX IF NOT EXISTS `users_email_unique` ON `users` (
	`email`
);
CREATE INDEX IF NOT EXISTS `password_resets_email_index` ON `password_resets` (
	`email`
);
COMMIT;
