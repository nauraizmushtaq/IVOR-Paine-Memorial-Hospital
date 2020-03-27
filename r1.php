
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
     $query="select * from nurse a,regnurse b
	 where a.nurse_id=b.rnurse_id
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
						<label>Nurse ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Name : </label><?php echo $row[1];?>
					</td>
					<td style="font-size:20px;">
						<label>Address : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:20px;">
						<label>Tel NO : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:20px;">
						<label>Date of Birth : </label><?php echo $row[4];?>
					</td>
					</tr>
						<tr align = "center">
					<td style="font-size:20px;">
						<label>Hire Date: </label><?php echo $row[5];?>
					</td>
					<td style="font-size:20px;">
						<label>Position : </label><?php echo $row[6];?>
					</td>
					<td style="font-size:20px;">
						<label>Salary : </label><?php echo $row[8];?>
					</td>
					
					<td style="font-size:20px;">
						<label>Bonus : </label><?php echo $row[9];?>
					</td>
					<td style="font-size:20px;">
						<label>Pension : </label><?php echo $row[10];?>
					</td>
									
				
			<br><br>
			
			<br><br>
				
				
			</table>
			
			<?php
			}
			
 

                  
?>

		<div align = "center" style = "color:#428bca;">
			<td><br><br><a href="nurse.html">Back</a></td>
		</div>
		
  </body>
</html>