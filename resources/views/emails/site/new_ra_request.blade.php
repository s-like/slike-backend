@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>    
    <tr>
        <td style='color:#000;'>
            <h1 class='email_title'>Return Authorization Request</h1>          
            Dear <?php echo $data['name'];?>,<br /><br />
            Your request has been received, We will processed it asap.<br /><br />            
            <br /><br /><strong>Thanks,</strong>
            <br /><br /><strong>Rachel Allan</strong>
        </td>
    </tr>
</table>
@endsection
