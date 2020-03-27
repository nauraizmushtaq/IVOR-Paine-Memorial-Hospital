<html>
  <head><title>Hospital</title>
  	<style>
		body{
		background: white;
		padding-top: 30px}
		
		.container{
		background: #c4c4c4;
		font-weight: bold;
		padding: 20px;
		}
		
		input{
		margin-left: 50px;
		width: 200px;
		}
		

	</style>
</head>
  <body>
   <?php
     $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = Lenovo)(PORT = 1521)) ) (CONNECT_DATA = (SID = DB) ) )"; 
     $db_user = "hospital"; 
     $db_pass = "asdf";
				$a= $_POST["id"];
				$b=$_POST["name"];
				$c=$_POST["address"];
				$d=$_POST["rate"];
				$e=$_POST["salary"];
				$f=$_POST["phone"];
				$g=$_POST["date"];
				$h=$_POST["spec_code"];
				$i=$_POST["position"];
				
				
					
				
      $con = oci_connect($db_user,$db_pass,$db_sid); 
      if($con) 
      { 
       //echo "Oracle Connection Successful."; 
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
				
				
	
  $query="insert into Consultant
values( '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i')
";
  	
     $a = oci_parse($con, $query);
	 $r = oci_execute($a);
	 if($r)
	 {
echo "Data Inserted";
	 }
	 $query="select * from consultant";
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
			?>	<table align = "center" width = "100%">
				<tr align = "left">
					<td style="font-size:16px;">
						<label>Consultant ID : </label><?php echo $row[0];?>
					</td>
					<td style="font-size:16px;">
						<label>Name : </label><?php echo $row[1];?>
					</td>
				
					<td style="font-size:16px;">
						<label>Address : </label><?php echo $row[2];?>
					</td>
					<td style="font-size:16px;">
						<label>Billing Rate : </label><?php echo $row[3];?>
					</td>					
				
					<td style="font-size:16px;">
						<label>Salary : </label><?php echo $row[4];?>
					</td>
						
					
					<td style="font-size:16px;">
						<label>Phone : </label><?php echo $row[5];?>
					</td>			

					<td style="font-size:16px;">
						<label>Date of Birth : </label><?php echo $row[6];?>
					</td>			

					<td style="font-size:16px;">
						<label>Speciality Code : </label><?php echo $row[7];?>
					</td>			

					<td style="font-size:16px;">
						<label>Position : </label><?php echo $row[8];?>
					</td>								
				</tr>
				
					<br><br>
			</table>
			<?php
			

		  }                 
?>

<div>
<table>
  <tr align = "center">
				<td><br><br><a href="c.html">Back</a></td>
			</tr>
			</table>

</body>
</html>	
	
