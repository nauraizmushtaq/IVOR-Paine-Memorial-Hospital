<html>
	<head><title>IVOR_Hospital</title></head>
		<body>
		<?php
		$db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.49.93)(PORT = 1521)) ) (CONNECT_DATA = (SID = abid) ) )"; 
		$db_user = "hospital"; 
		$db_pass = "asdf";

		$con = oci_connect($db_user,$db_pass); 
		if($con) 
		{ 
			//echo "Oracle Connection Successful.";
		} 
		else 
		{
			die('Could not connect to Oracle: '); 
		}
		
		//variables
		$pat_id = $_POST['pat_id'];
		$pat_name = $_POST['pat_name'];
		$staff_id = $_POST['staff_id'];
		$staff_name = $_POST['staff_name'];
		$ward_id = $_POST['ward_id'];
		$ward_name = $_POST['ward_name'];
		
		if($pat_id)
		{
			$query="select g.pat_id, g.name as Patient_Name ,g.DOB Date_of_Birth,e.doc_id   as Doctor_no,a.name as Doctor_Name,b.const_id,b.name as Consultant
					from docteam_rec e,team d,juniordr a,consultant b,patient g,pataint_Incharge t
					where g.pat_id='$pat_id'
					and  t.pat_id=g.pat_ID
					and t.doc_id=e.doc_id
					and e.team_code=d.team_code
					and d.const_id=b.const_id
					and e.doc_id=a.doc_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Patient Record</font><br><br>
			</div>
			
			<?PHP
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Doctor ID : </label><?php echo $row[3];?>
					</td>
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient Name : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Doctor Name : </label><?php echo $row[4];?>
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient DOB : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;">
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
					</td>
					<td style="font-size:20px;">
						<label>Consultant ID : </label><?php echo $row[5];?>
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
					</td>
					<td style="font-size:20px;">
						<label>Consultant Name : </label><?php echo $row[6];?>
					</td>					
				</tr>
					<br><br>
			</table>
			
			<?php
			}
			
			?>
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> Medical History </font><br><br>
			</div>
			
			<?php
			
			$query="select serial_no as Treatment_no,Com_code,TRT_Code,Start_date,End_Date,Pat_id
					from medical_histroy
					where pat_id='$pat_id'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Patient ID : </label><?php echo $row[5];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Trearment Number : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Compliant Code : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Trearment Code : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Start Date : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>End date : </label><?php echo $row[4];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			
			<?php
			}
			
		}
		else if ($pat_name)
		{
			$query="select g.pat_id, g.name as Patient_Name ,g.DOB Date_of_Birth,e.doc_id   as Doctor_no,a.name as Doctor_Name,b.const_id,b.name as Consultant
					from docteam_rec e,team d,juniordr a,consultant b,patient g,pataint_Incharge t
					where g.name='$pat_name'
					and  t.pat_id=g.pat_ID
					and t.doc_id=e.doc_id
					and e.team_code=d.team_code
					and d.const_id=b.const_id
					and e.doc_id=a.doc_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Patient Record</font><br><br>
			</div>
			
			<?PHP
			
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>

			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Doctor ID : </label><?php echo $row[3];?>
					</td>
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient Name : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Doctor Name : </label><?php echo $row[4];?>
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Patient DOB : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;">
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
					</td>
					<td style="font-size:20px;">
						<label>Consultant ID : </label><?php echo $row[5];?>
					</td>					
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
					</td>
					<td style="font-size:20px;">
						<label>Consultant Name : </label><?php echo $row[6];?>
					</td>					
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			
			?>
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> Medical History </font><br><br>
			</div>
			
			<?php
			
			$query="select serial_no as Treatment_no,Com_code,TRT_Code,Start_date,End_Date,p.Pat_id  
			from medical_histroy m,patient p
			where p.name = '$pat_name'
			AND m.pat_id = p.pat_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Patient ID : </label><?php echo $row[5];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Trearment Number : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Compliant Code : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Trearment Code : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Start Date : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>End date : </label><?php echo $row[4];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			
			<?php
			}
			
		}
		else if ($ward_id)
		{
			$query="select * from nurseshift where incharge_ward='$ward_id'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Ward Record</font><br><br>
			</div>
			
			<?PHP
			
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Ward ID : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;">
						<label>Sister : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Shift : </label><?php echo $row[2];?>
					</td>
				</tr>
				
				<tr>
					<td>
						<label><br></label>
					</td>
				</tr>
				
					
			</table>
			<?php
			}
			
		
			
			$query="select * from nurseprehistory p,careunit c,ward a
    , regnurse r
    where a.ward_id=c.ward_id
    and c.ward_id='$ward_id'
    and p.nurse_id=r.rnurse_id
    and c.cu_code=p.cu_code
		";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Register Nurse ID : </label><?php echo $row[1];?>
					</td>	
				</tr>
								
					
			</table>
			<?php
			}
			
			?>
		
<?php			
			$query="select * from nurseprehistory p,careunit c,ward a
    , nonregnurse r
    where a.ward_id=c.ward_id
    and c.ward_id='$ward_id'
    and p.nurse_id=r.nrnurse_id
    and c.cu_code=p.cu_code
		";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Non Register Nurse ID : </label><?php echo $row[1];?>
					</td>	
				</tr>
								
					
			</table>
			<?php
			}
			
			?>
		

		
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> History </font><br><br>
			</div>
			
			
			<?php
			
			$query="select c.Pat_id,g.name,a.cu_code,a.bedno,f.const_id,a.admit_date from cu_admit a,careunit b,pataint_Incharge c,team d,DocTeam_rec e,consultant f,patient g
					where a.cu_code=b.Cu_code
					and b.Ward_id='$ward_id'
					and a.pat_id=c.pat_id
					and c.Doc_id=e.DOc_Id
					and e.team_code=d.team_code
					and d.const_id=f.const_id
					and c.pat_id=g.pat_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Patient ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Patient Name : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>CU Code : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Bed Number : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Consultant ID : </label><?php echo $row[4];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Admit date : </label><?php echo $row[5];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			
		
			}
		
		else if ($ward_name)
		{
				$query="select a.* from nurseshift a,ward b where a.incharge_ward=b.ward_id
				and b.name='$ward_name'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Ward Record</font><br><br>
			</div>
			
			<?PHP
			
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Ward ID : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;">
						<label>Sister : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Shift : </label><?php echo $row[2];?>
					</td>
				</tr>
				
				<tr>
					<td>
						<label><br></label>
					</td>
				</tr>
				
					
			</table>
			<?php
			}
		
			
			
			$query="select * from nurseprehistory p,careunit c,ward a
    , regnurse r
    where a.ward_id=c.ward_id
    and a.name='$ward_name'
    and p.nurse_id=r.rnurse_id
    and c.cu_code=p.cu_code
		";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Register Nurse ID : </label><?php echo $row[1];?>
					</td>	
				</tr>
								
					
			</table>
			<?php
			}
			
			?>
		
<?php			
			$query="select * from nurseprehistory p,careunit c,ward a
    , nonregnurse r
    where a.ward_id=c.ward_id
    and a.name='$ward_name'
    and p.nurse_id=r.nrnurse_id
    and c.cu_code=p.cu_code
		";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Non Register Nurse ID : </label><?php echo $row[1];?>
					</td>	
				</tr>
								
					
			</table>
			<?php
			}
			
			?>
		

	
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> History </font><br><br>
			</div>
			
			
			<?php
			
			$query="select c.Pat_id,t.ward_id,g.name,a.cu_code,a.bedno,f.const_id,a.admit_date from cu_admit a,careunit b,pataint_Incharge c,team d,DocTeam_rec e,consultant f,patient g,ward t
					where a.cu_code=b.Cu_code
					and t.name='$ward_name'
					and t.ward_id=b.ward_id
					and a.pat_id=c.pat_id
					and c.Doc_id=e.DOc_Id
					and e.team_code=d.team_code
					and d.const_id=f.const_id
					and c.pat_id=g.pat_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Patient ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Patient Name : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>CU Code : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Bed Number : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Consultant ID : </label><?php echo $row[4];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Admit date : </label><?php echo $row[5];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			
		
		}
		else if($staff_id)
		{
			$query="select a.name,a.positon,b.joindate
					from juniorDr a,docteam_rec b
					where a.doc_id=b.doc_id
					and a.doc_id='$staff_id'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Consultant Team Record</font><br><br>
			</div>
			
			<?PHP
			
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Name : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Position : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Join Date : </label><?php echo $row[2];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			?>
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> History </font><br><br>
			</div>
			
			<?php
			
			
			$query="select * from performance
					where doc_id = '$staff_id'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Performance NO. : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Doctor ID: </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>TEAM NO.: </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Grade : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Description : </label><?php echo $row[4];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>FROM date : </label><?php echo $row[5];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>TO date : </label><?php echo $row[6];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>ESTAB : </label><?php echo $row[7];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>New position : </label><?php echo $row[8];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			
		}
		else if ($staff_name)
		{
			$query="select a.name,a.positon,b.joindate
					from juniorDr a,docteam_rec b
					where a.doc_id=b.doc_id
					and a.name='$staff_name'";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			
			?>
			
			<div style = "width:100%; height:6%; background-color:#2FA5EB;">
			</div>	
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#428bca"> IVOR  </font><font color="#000"> Hospital Consultant Team Record</font><br><br>
			</div>
			
			<?PHP
			
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
				
			?>
			
			<table align = "center" width = "100%">
				<tr align = "center">
					<td style="font-size:20px;">
						<label>Name : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Position : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Join Date : </label><?php echo $row[2];?>
					</td>
				</tr>
				
				<br><br>
			</table>
			
			<?php
			}
			?>
			
			<div align = "center" width="600px" style="font-size:50px;font-family:forte;">
				<font color="#000"> History </font><br><br>
			</div>
			
			<?php
			
			
			$query="select SerPerf_NO,
					a.Doc_ID ,
					a.Team_Code ,
					a.DATE_GRADE ,
					a.perf_description ,
					a.fromDate ,
					a.toDate ,
					a.estab ,
					a.newPosition from performance a,juniorDr b
					where b.name='$staff_name'
					and b.Doc_id=a.Doc_id";
			
			$a = oci_parse($con, $query); 
			$r = oci_execute($a);
			
			while($row = oci_fetch_array($a, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			{
			?>
			
			<table align = "center" width = "100%">
				<tr>
					<td style="font-size:20px;" align = "center">
						<label>Performance NO. : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Doctor ID: </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>TEAM NO.: </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Grade : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>Description : </label><?php echo $row[4];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>FROM date : </label><?php echo $row[5];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>TO date : </label><?php echo $row[6];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>ESTAB : </label><?php echo $row[7];?>
					</td>
					<td style="font-size:20px;" align = "center">
						<label>New position : </label><?php echo $row[8];?>
					</td>
				</tr>
				
				 <br><br>
			</table>
			
			<?php
			}
			
		}
		
		?>
		
		<div align = "center" style = "color:#428bca;">
			<td><br><br><a href="IVOR_Hospital.html">RETURN TO MAIN PAGE</a></td>
		</div>
		
		<?php
		
		?>
	</body>
</html>