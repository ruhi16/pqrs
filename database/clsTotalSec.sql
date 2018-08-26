select c.name as ClsName, count(s.name ) as NoOfSections
from clssecs cs, clsses c, sections s
where cs.clss_id = c.id and cs.section_id = s.id
group by c.name
order by c.id