@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>    
    <tr>
        <td style='color:#000;'>
            New enquiry received from Rachel Allan website, Details are following:<br /><br />
            <table width="100%" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <th align='left'>Name: </th>
                    <td><?php echo $data['fname'] . ' ' . $data['lname'];?></td>
                </tr>                 
                <tr>
                    <th align='left'>Email: </th>
                    <td><?php echo $data['email'];?></td>
                </tr>                
                <tr>
                    <th align='left'>Telephone No: </th>
                    <td><?php echo $data['phone'];?></td></tr>
                <tr>
                    <th align='left'>Message: </th>
                    <td><?php echo $data['message'];?></td>
                </tr>                              
            </table>
            <br /><br /><strong>Thanks,</strong>
            <br /><br /><strong>Rachel Allan</strong>
        </td>
    </tr>
</table>
@endsection