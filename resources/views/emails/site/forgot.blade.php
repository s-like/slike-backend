@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>	
	<tr>
	 	<td style='color:#000;'>	 		 		 
	 		Dear <?php echo $data['first_name']." ".$data['last_name'] ;?>,<br/><br/>
            We have reset your password on your forgot password request.<br/><br>
            Your New Account information is: <br/>
            <b>Username: <?php echo $data['email'];?></b><br/>
            <b>Password: <?php echo $data['password'];?></b><br/><br/>
            This is the auto confirmation email, Please donot reply this email<br/><br/>
	 		<br /><br /><strong>Thanks,</strong>
	 		<br /><br /><strong>Rachel Allan</strong>
	 	</td>
	</tr>
</table>
@endsection

 
       
        
       