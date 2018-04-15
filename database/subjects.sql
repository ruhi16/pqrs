BEGIN TRANSACTION;
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
CREATE VIEW extclssubfmpms as 
select clss_id ,extype_id, subject_id, sum(fm) as subject_fm, sum(pm) as subject_pm, session_id
from exmtypclssubs
group by clss_id, extype_id, subject_id;
COMMIT;
