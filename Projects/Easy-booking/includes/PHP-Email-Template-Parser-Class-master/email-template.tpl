<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <style>
        body {
            width: 100% !important;
            margin: 0;
            line-height: 1.4;
            background-color: #F2F4F6;
            color: #74787E;
            -webkit-text-size-adjust: none;
        }

        .email-body {
            width: 600px;
            margin: 0 auto;
        }

        .button {
            background-color: #b70f1b !important;
            padding: 10px 0px;
            display: block;
            color: #FFF !important;
            text-align: center;
            width: 100% !important;
            text-decoration: none;
            border-radius: 3px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
            -webkit-text-size-adjust: none;
        }

        /*Media Queries ------------------------------ */
        @media only screen and (max-width: 600px) {
            .email-body {
                width: 100% !important;
            }
        }

    </style>
</head>
<body>
<table width="600" border="0" cellspacing="0" cellpadding="0" class="email-body">
    <tbody>
    <tr>
        <td bgcolor="#FFF">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td align="center"><img
                                src="https://dev62.onlinetestingserver.com/nina-v/wp-content/uploads/2018/08/ninass_03.png"
                                width="150"></td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#fff"></td>
    </tr>
    <tr>
        <td bgcolor="#fff">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>
                        <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 20px; color: #000;"><strong>Hi,</strong></span>
                    </td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                    <td style="font-size: 12px">&nbsp;</td>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>
                        <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; color: #74787E;">Your slot has been booked. Please see the details below: </span>
                    </td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="WHITE">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td width="50%"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;"><strong>Order ID: <br> {{order_id}}</strong></span>
                                </td>
                                <td width="50%" align="right"
                                    style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;">
                                    <strong>Date<br>
                                        {{date}}</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td bgcolor="white">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>
                        <table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-color: #CCC;"
                               class="email-body">
                            <tbody>
                            <tr>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;"><strong>Service Name</strong></span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;"><strong>Qty</strong></span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;"><strong>Slot</strong></span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;"><strong>Price</strong></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;">{{serviceName}}</span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;">{{qty}}</span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;">{{slot}}</span>
                                </td>
                                <td width="25%" valign="top"><span
                                            style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 14px; color: #000;">{{price}}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="10">&nbsp;</td>
                </tr>
                </tbody>
            </table>

        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td bgcolor="#ccc">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                    <td style="font-size: 12px">&nbsp;</td>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10">&nbsp;</td>
                    <td align="center"><span
                                style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px; color: #000;">
          Nina V
          <br>2725 North Thatcher ave (suit 104) River Grove,
          <br>IL 60171
        </span></td>
                    <td width="10">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                    <td style="font-size: 12px">&nbsp;</td>
                    <td width="10" style="font-size: 12px">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>
</html>