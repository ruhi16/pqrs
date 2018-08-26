select c.name as ClsName, s.name as SecName, csb.subject_id, sb.name  as subject_name, scr.id as studentcr_id, sum(mrk.marks) as TotalObtMarks
from clssecs cs, clsses c, sections s, clssubs csb, subjects sb, studentcrs scr, marksentries mrk
where     cs.clss_id 	= c.id 
      and cs.section_id = s.id 
	  and cs.clss_id 	= csb.clss_id 
	  and csb.subject_id = sb.id
	  and sb.extype_id  = 2
	  and cs.clss_id 	= scr.clss_id 
	  and cs.section_id = scr.section_id
	  
	  and mrk.clssec_id = cs.id
	  and mrk.clssub_id	= csb.id
	  and mrk.studentcr_id	= scr.id
	  
group by c.id, s.id, sb.id, scr.id, mrk.marks
order by c.id, s.id, scr.id