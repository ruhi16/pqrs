
select csecsubtotal.* , csubfm.fmTotal
from clsSubjectFM csubfm, clsSecStdcrSubTotalObtMarks csecsubtotal
where csubfm.clss_id = csecsubtotal.clss_id and csubfm.subject_id = csecsubtotal.subject_id

order by csecsubtotal.clss_id, csecsubtotal.section_id, csecsubtotal.studentcr_id, csecsubtotal.subject_id