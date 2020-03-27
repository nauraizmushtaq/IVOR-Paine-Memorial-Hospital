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
	  $doc1 = $_POST['doc1'];
     $query="select * from performance
where Doc_id='$doc1'
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
			
 

                  
?>

		<div align = "center" style = "color:#428bca;">
			<td><br><br><a href="IVOR_Hospital.html">RETURN TO MAIN PAGE</a></td>
		</div>
		
  </body>
</html>