@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>	
	<tr>
	 	<td style='color:#000;'>
	 		<h1 class='email_title'>Congratulations!</h1>
	 		<h3 class='email_title'>Your online account is now activated!</h3>
	 		Dear <?php echo $data['first_name'];?> <?php echo $data['last_name'];?>,<br/><br/>
	 		Your Account Details:<br /><br />
	 		<table width="100%" cellpadding="3" cellspacing="0" align="center">
	 			<tr>
	 				<th align='left'>Username: </th>
	 				<td><?php echo $data['email'];?></td>
	 			</tr>
		        <tr>
		        	<th align='left'>Password: </th>
		        	<td><?php echo $data['password'];?></td>
		        </tr>		        				
	 		</table>
	 		<br /><br /><strong>Thanks,</strong>
	 		<br /><br /><strong>Rachel Allan</strong>
	 	</td>
	</tr>
</table>
@endsection

 
       
        
       