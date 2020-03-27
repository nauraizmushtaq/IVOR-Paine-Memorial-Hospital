--===============Query 1====================
select a.const_id,d.Doc_Id,a.name,d.name
from consultant a,DocTeam_rec b, juniorDr d,team c
where a.const_id=c.Const_id
and c.team_code=b.team_code
and b.Doc_id=d.Doc_ID;
--==============================================

--==============Query no 2-=====================
select a.name,b.sis_id,b.shift,c.name,c.head_nurse
from ward a,careunit c,nurseshift b
where a.ward_id=c.ward_id
and a.ward_id=b.incharge_ward;

--==================================

--===============Quer 3=====================
select Pat_id,Com_code,TRT_Code,Start_date,End_Date 
from medical_histroy;

--=====================================


--===================Quer 4====================
select a.Doc_ID,a.pat_id,e.name,d.head_nurse,f.name
from pataint_Incharge a,JuniorDr b,CU_Admit c,careunit d,patient e,nurse f
where  b.Doc_id=a.DOc_Id
and b.positon='Junior HouseMan'
and c.pat_id=a.pat_id
and c.cu_code=d.cu_code
and a.pat_id=e.pat_id
and f.nurse_id=d.head_nurse;

--===============================================

--========================Quer 5=========================

select c.const_id, c.name, e.name,e.spec_code from consultant c ,speciality e where c.spec_code not in(
select d.spec_code from consultant d where d.const_id != c.const_id) and c.spec_code=e.spec_code;
--=======================================================

--=====================Query 6==================================
 select m.*,t.*,c.*,p.*
from medical_histroy m,treatment t,complaint c,performance p
where m.trt_code=t.trt_code
and c.com_code=m.com_code
and m.doc_id=p.doc_id
order by c.com_code,t.trt_code
;
--==========================================================

--=====================Query 7===========================
select p.name,c.com_code,c.title, t.trt_code,t.name
 from patient p inner join medical_histroy mh
   on p.pat_id=mh.pat_id
   join treatment t on t.trt_code=mh.trt_code
     inner join complaint c on c.com_code=mh.com_code
     where mh.pat_id in (
      select m.pat_id
     from medical_histroy m
     where m.pat_id=mh.pat_id and m.com_code!=mh.com_code);
	 
--==========================================================

--============================Query 8======================

 select p.pat_id, p.name, m.trt_code, m.com_code
    from patient p inner join medical_histroy m
    on p.pat_id=m.pat_id
    order by m.com_code , m.trt_code;
	
--=================================================

--================Query 9===========================	
select * from performance
where Doc_id='$doc1';
--=============================================

--===================================Query 10========================
select * from medical_histroy a,cu_admit b
where a.pat_ID=b.pat_id
AND A.pat_id='$pat1';
--==================================================

--======================Query 11============================
select t.trt_code, t.name, mh.*
    from medical_histroy mh inner join treatment t
    on mh.trt_code=t.trt_code
    where mh.com_code='$c1'
    and mh.start_date between '$d1' and '$d2'
    and mh.end_date between  '$d1'  and  '$d2'
    order by mh.trt_code;
--=========================================================

--=====================Query 12--========================
select positon, count(doc_id)
    from juniordr
    group by positon
    union
    select position, count(const_id)
    from consultant
    group by position
    union
    select position , count(nurse_id)
   from nurse
   group by position;
   
--==========================================================