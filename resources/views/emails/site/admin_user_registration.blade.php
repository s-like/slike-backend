@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>	
	<tr>
	 	<td style='color:#000;'>
	 		<h1 class='email_title'>USER REGISTER CONFIRMATION!</h1>	 		 
	 		Dear Admin,<br/><br/>
	 		New registration request received, Details are following:<br /><br />
	 		<b>Company Name: </b><?php echo $data['company_name'];?> <br /><br />
            <b>Name: </b><?php echo $data['first_name'].' '.$data['last_name'];?> <br /><br />
            <b>Phone: </b><?php echo $data['telephone'];?> <br /><br />
            <b>Email: </b><?php echo $data['email'];?> <br /><br />
            To check full details and activate the user, click on following link<br /><br />
            <?php echo $data['activation_url'];?> <br /><br />
	 		<br /><br /><strong>Thanks,</strong>
	 		<br /><br /><strong>Rachel Allan</strong>
	 	</td>
	</tr>
</table>
@endsection

 
       
        
       