select c.name as ClsName, s.name as SecName, count(scr.id) as TotalStudents
from clssecs cs, clsses c, sections s, studentcrs scr
where cs.clss_id = c.id and cs.section_id = s.id and cs.clss_id = scr.clss_id and cs.section_id = scr.section_id
group by c.id,s.id
order by c.id