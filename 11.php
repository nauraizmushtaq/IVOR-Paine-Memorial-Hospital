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
	  $d1 = $_POST["d1"];
	  $d2 = $_POST["d2"];
	  $c1 = $_POST["c1"];
	  
    $query="select t.trt_code, t.name, mh.*
    from medical_histroy mh inner join treatment t
    on mh.trt_code=t.trt_code
    where mh.com_code='$c1'
    and mh.start_date between '$d1' and '$d2'
    and mh.end_date between  '$d1'  and  '$d2'
    order by mh.trt_code
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
						<label>Patient ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:20px;">
						<label>Patient Name : </label><?php echo $row[1];?>
					</td>
				
					<td style="font-size:20px;">
						<label>Complain Code : </label><?php echo $row[3];?>
					</td>
					<td style="font-size:22px;">
						<label>Treatment Code : </label><?php echo $row[2];?>
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