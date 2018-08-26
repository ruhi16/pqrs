select clss_id, subject_id, sum(fm)
from exmtypmodclssubs
group by clss_id, subject_id