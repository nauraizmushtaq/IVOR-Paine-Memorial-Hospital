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
     $query="select c.const_id, c.name, e.name,e.spec_code from consultant c ,speciality e where c.spec_code not in(
select d.spec_code from consultant d where d.const_id != c.const_id) and c.spec_code=e.spec_code
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
						<label>Consultant ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Consultant Name : </label><?php echo $row[1];?>
					</td>
			
					<td style="font-size:20px;">
						<label>Specialty Name : </label><?php echo $row[2];?>
					</td>	
					
					<td style="font-size:20px;">
						<label>Specialty Code : </label><?php echo $row[3];?>
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