@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>	
	<tr>
	 	<td style='color:#000;'>
	 		<?php echo $data['body']?>
	 	</td>
	</tr>
</table>
@endsection

 
       
        
       