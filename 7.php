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
	 select p.name,c.com_code,c.title, t.trt_code,t.name
 from patient p inner join medical_histroy mh
   on p.pat_id=mh.pat_id
   join treatment t on t.trt_code=mh.trt_code
     inner join complaint c on c.com_code=mh.com_code
     where mh.pat_id in (
      select m.pat_id
     from medical_histroy m
     where m.pat_id=mh.pat_id and m.com_code!=mh.com_code)
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
						<label>Patient Name : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Complain Code : </label><?php echo $row[1];?>
					</td>
				
					<td style="font-size:20px;">
						<label>Complain Title : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:22px;">
						<label>Treatment Code : </label><?php echo $row[3];?>
					</td>					
					<td style="font-size:22px;">
						<label>Treatment Name : </label><?php echo $row[4];?>
					</td>					
				</tr>
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