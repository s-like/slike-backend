@extends('layouts.email_template')
@section('content')
<table width='660' cellpadding='3' cellspacing='0' align="center" class="normal" style='border:1px solid #ccc;color:black;'>    
    <tr>
        <td style='color:#000;'>
            <h1 class='email_title'>Return Authorization Request</h1>          
            Dear Admin,<br /><br />
            New return authorization request received, Details are following:<br /><br />
            <table width="100%" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <th align='left'>Store Name: </th>
                    <td><?php echo $data['store_name'];?></td>
                </tr>
                <tr>
                    <th align='left'>Account No: </th>
                    <td><?php echo $data['account_no'];?></td>
                </tr>
                <tr>
                    <th align='left'>Contact Name: </th>
                    <td><?php echo $data['contact_name'];?></td>
                </tr>
                <tr>
                    <th align='left'>Email: </th>
                    <td><?php echo $data['email'];?></td>
                </tr>
                <tr>
                    <th align='left'>Order Date: </th>
                    <td><?php echo $data['order_date'];?></td>
                </tr>
                <tr>
                    <th align='left'>Telephone No: </th>
                    <td><?php echo $data['telephone'];?></td>
                </tr>
                <tr>
                    <th align='left'>Invoice No: </th>
                    <td><?php echo $data['invoice_no'];?></td>
                </tr>
                <tr>
                    <th align='left'>Reason For Return: </th>
                    <td><?php echo $data['return_reason'];?></td>
                </tr>
                <tr>
                    <th align='left'>Replacement: </th>
                    <td>Style No: <?php echo $data['style_no'];?>, Color: <?php echo $data['color'];?>, Size:<?php echo $data['size'];?></td> 
                </tr>
                <tr>
                    <th align='left'>Call Tag: </th>
                    <td><?php echo $data['call_tag'];?></td>
                </tr>
                <tr>
                    <th align='left'>Status: </th>
                    <td>New</td>
                </tr>
            </table>
            <br /><br />To check full details and processed the request, click on following link
            <br /><br /><?php echo url('')."/secureAdminArea/RARequest/";?>
            <br /><br /><strong>Thanks,</strong>
            <br /><br /><strong>Rachel Allan</strong>
        </td>
    </tr>
</table>
@endsection
