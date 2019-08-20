CREATE VIEW clsSecStdcrSubTotalObtMarks as 
select c.session_id as session_id, c.id as clss_id, c.name as ClsName, s.id as section_id, s.name as SecName, csb.subject_id, sb.extype_id, csb.combination_no as comnination_no, sb.name as subject_name, scr.id as studentcr_id, sum(mrk.marks) as TotalObtMarks 
from clssecs cs, clsses c, sections s, clssubs csb, subjects sb, studentcrs scr, marksentries mrk where cs.clss_id = c.id and cs.section_id = s.id and cs.clss_id = csb.clss_id and csb.subject_id = sb.id and cs.clss_id = scr.clss_id and cs.section_id = scr.section_id and mrk.clssec_id = cs.id and mrk.clssub_id = csb.id and mrk.studentcr_id = scr.id group by c.id, s.id, sb.id, scr.id, mrk.marks order by c.id, s.id, scr.id;




CREATE VIEW clsSecStdcrSubTotalObtMarksFM as select csecsubtotal.* , csubfm.fmTotal from clsSubjectFM csubfm, clsSecStdcrSubTotalObtMarks csecsubtotal where csubfm.clss_id = csecsubtotal.clss_id and csubfm.subject_id = csecsubtotal.subject_id order by csecsubtotal.clss_id, csecsubtotal.section_id, csecsubtotal.studentcr_id, csecsubtotal.subject_id;





CREATE VIEW clsSecStdcrSubTotalObtMarksFMGrade as
select cssto.* , (TotalObtMarks*100/fmTotal)as percentage,  gprt.name as Grade
from clsSecStdcrSubTotalObtMarksFM  cssto, grades, gradeparticulars gprt
where cssto.extype_id = grades.extype_id and ((TotalObtMarks*100)/fmTotal) < enpercentage and (TotalObtMarks*100/fmTotal) > stpercentage and gprt.id = grades.gradeparticular_id
order by cssto.clss_id, cssto.section_id,cssto.studentcr_id;




CREATE VIEW clsExtTotalSubjectsDetail as
select clssubs.session_id, clss_id, subjects.extype_id, count(subject_id) as allSubjects, 
(select count(*) from       (select * from clssubs csb, subjects sbj where csb.subject_id = sbj.id and csb.clss_id = clssubs.clss_id and sbj.extype_id = subjects.extype_id and csb.combination_no > 0 group by csb.combination_no ))as combSubjCateg,(					 
(select count(*) from clssubs csb, subjects sbj where csb.subject_id = sbj.id and csb.clss_id = clssubs.clss_id and sbj.extype_id = subjects.extype_id and csb.combination_no > 0))as TotalCombSubjs,

(count(subject_id) - (select count(*) from clssubs csb, subjects sbj where csb.subject_id = sbj.id and csb.clss_id = clssubs.clss_id and sbj.extype_id = subjects.extype_id and csb.combination_no > 0)
+(select count(*) from      (select * from clssubs csb, subjects sbj where csb.subject_id = sbj.id and csb.clss_id = clssubs.clss_id and sbj.extype_id = subjects.extype_id and csb.combination_no > 0 group by csb.combination_no ))
	)as TotalSubjects

from clssubs, subjects
where subjects.id = clssubs.subject_id
group by clss_id, subjects.extype_id;



CREATE VIEW clsSubjectFM as select session_id, clss_id, subject_id, sum(fm) fmTotal from exmtypmodclssubs group by clss_id, subject_id order by clss_id, subject_id;





CREATE VIEW clssecsubmarksentryviews as 
 select marksentries.exmtypmodclssub_id, marksentries.session_id, (select exam_id from exmtypmodclssubs where exmtypmodclssubs.id = marksentries.exmtypmodclssub_id)as exam_id, 
 (select extype_id from exmtypmodclssubs where exmtypmodclssubs.id = marksentries.exmtypmodclssub_id)as extype_id, 
 (select mode_id from exmtypmodclssubs where exmtypmodclssubs.id = marksentries.exmtypmodclssub_id)as mode_id, 
 (select clss_id from exmtypmodclssubs where exmtypmodclssubs.id = marksentries.exmtypmodclssub_id)as clss_id, 
 (select section_id from clssecs where clssecs.id = marksentries.clssec_id)as section_id, 
 (select subject_id from exmtypmodclssubs where exmtypmodclssubs.id = marksentries.exmtypmodclssub_id)as subject_id, 
 
 sum(marks)as totalMarks 
 from marksentries 
 group by exam_id, extype_id, mode_id, clss_id, section_id, subject_id;





CREATE VIEW duplCrRecords as select session_id, studentdb_id, count(studentdb_id) cid from studentcrs group by studentdb_id having count(studentdb_id) > 0 order by count(studentdb_id) desc;





CREATE VIEW extclssubfmpms as 
select clss_id ,extype_id, subject_id, sum(fm) as subject_fm, sum(pm) as subject_pm, session_id
from exmtypclssubs
group by clss_id, extype_id, subject_id;




CREATE VIEW noOfSummativeSubjects as select clssubs.session_id, clssubs.clss_id, Count(*) as regSumSubj, 
	(select count(*) 
		from(select * from clssubs csub where csub.clss_id = clssubs.clss_id and csub.combination_no > 0 group by csub.combination_no))as combSumSubj, 
		
	((count(*))+(select count(*) from(select * from clssubs csub where csub.clss_id = clssubs.clss_id and csub.combination_no > 0 group by csub.combination_no))) as TotalSumSubject

	
from clssubs, subjects where clssubs.subject_id = subjects.id and subjects.extype_id = 2 and combination_no = 0 group by clss_id;






CREATE VIEW studencrObtTotal as select clssubs.session_id, stdcr.studentdb_id, stdcr.roll_no, sum(mrk.marks) allTotal from studentcrs stdcr, clssubs, marksentries mrk where stdcr.clss_id=1 and section_id=1 and clssubs.clss_id = 1 and mrk.studentcr_id=stdcr.id and mrk.clssub_id = clssubs.id group by stdcr.roll_no;







CREATE VIEW totalClssSubject as

select (select count(*) from clssubs where combination_no = 0 and clss_id = 1 )
	+  (select count(*)  as totsubj
			   from (select * from clssubs where combination_no > 0 and clss_id = 1 group by combination_no))
as totalSubjectCount;
