
 <html>
  <head><title>IVOR_Hospital</title></head>
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
     $query=" 
	  select m.*,t.*,c.*,p.*
from medical_histroy m,treatment t,complaint c,performance p
where m.trt_code=t.trt_code
and c.com_code=m.com_code
and m.doc_id=p.doc_id
order by c.com_code,t.trt_code
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
						<label>Treatment No : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Patient ID : </label><?php echo $row[1];?>
					</td>
				
					<td style="font-size:20px;">
						<label>Doctor ID : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:22px;">
						<label>Treatment Code : </label><?php echo $row[3];?>
					</td>					
				
					<td style="font-size:20px;">
						<label>Complain Code : </label><?php echo $row[4];?>
					</td>
					</tr>
					<tr align = "center">
					<td style="font-size:20px;">
						<label>Start Date : </label><?php echo $row[5];?>
					</td>
				
					<td style="font-size:20px;">
						<label>End Date : </label><?php echo $row[6];?>
					</td>
					<td style="font-size:22px;">
						<label>Treatment Desc : </label><?php echo $row[8];?>
					</td>					
				
					<td style="font-size:20px;">
						<label>Complain title : </label><?php echo $row[10];?>
					</td>
					<td style="font-size:20px;">
						<label>Complain Desc : </label><?php echo $row[11];?>
					</td>
				
				</tr>
				<tr align = "center">
					<td style="font-size:20px;">
							<label>Doctor Grade : </label><?php echo $row[16];?>
					</td>
				
					<td style="font-size:20px;">
						<label>Establishment : </label><?php echo $row[17];?>
					</td>
					<td style="font-size:22px;">
						<label>Performance Desc : </label><?php echo $row[20];?>
					</td>					
				
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