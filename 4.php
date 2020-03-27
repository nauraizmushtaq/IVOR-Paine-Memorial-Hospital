<html>
  <head><title>Confirm</title></head>
  <body><br><br><br>
   <?php
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Lenovo)(PORT = 1521)) ) (CONNECT_DATA = (SID = DB) ) )"; 
     $db_user = "hospital"; 
     $db_pass = "asdf";
     
      $con = oci_connect($db_user,$db_pass,$db_sid); 
      if($con) 
      { 
      // echo "Oracle Connection Successful.";
        
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
     $query="select a.Doc_ID,a.pat_id,e.name,d.head_nurse,f.name
from pataint_Incharge a,JuniorDr b,CU_Admit c,careunit d,patient e,nurse f
where  b.Doc_id=a.DOc_Id
and b.positon='Junior HouseMan'
and c.pat_id=a.pat_id
and c.cu_code=d.cu_code
and a.pat_id=e.pat_id
and f.nurse_id=d.head_nurse
";
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
						<label>Doctor ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Patient ID : </label><?php echo $row[1];?>
					</td>
				
					<td style="font-size:20px;">
						<label>Patient Name : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:22px;">
						<label>Head Nurse of Careunit : </label><?php echo $row[3];?>
					</td>					
					<td style="font-size:22px;">
						<label>Head Nurse Name : </label><?php echo $row[4];?>
					</td>					
				</tr>
			<br><br>
				
				<br><br>
				
			</table>
			
			<?php
			}
			
 

                  
?>

		<div align = "center" style = "color:#428bca;">
			<td><br><br><a href="IVOR_Hospital.html">RETURN TO MAIN PAGE</a></td>
		</div>
		
  </body>
</html>