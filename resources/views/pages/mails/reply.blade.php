<!-- Two Columns -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td class="pb-10" style="padding-bottom: 10px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <p>Dear {{$data->user->name}},</p>
                        <br>
                        <p>You didn't pay the fine.You will be submitted to court</p>
                        <p>Licence Number : {{$data->licence_number}}</p>
                        <p>Fine : {{$data->fine->offence}}</p>
                        <p>Amount : {{$data->amount}}</p>
                        <p>Expired date : {{$data->expire_date}}</p>
                        <br>
                        <p>Thank You</p>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- END Two Columns -->
