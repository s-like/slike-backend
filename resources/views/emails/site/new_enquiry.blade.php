@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal">	
	<tr>
	 	<td style='color:#000;'>
	 		<h1 class='email_title'>NEW ENQUIRY</h1>	 		 
	 		Dear Admin,<br/><br/>
	 		New Enquiry received, Details are following:<br /><br />
            <b>Name: </b><?php echo $data['data']['name'];?> <br /><br />
            <b>Mobile: </b><?php echo $data['data']['mobile'];?> <br /><br />
            <b>Email: </b><?php echo $data['data']['email'];?> <br /><br />
            <b>Message: </b><?php echo $data['data']['comment'];?> <br /><br />
	 		<br /><br /><strong>Thanks,</strong>
	 		<br /><strong>HomIHelp</strong>
	 	</td>
	</tr>
</table>
@endsection

 
       
        
       