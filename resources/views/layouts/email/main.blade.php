<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        body{
            margin: 0px;
            background-color: #f2f3f8;
        }

        .tableBaseEmail{
            background-color: #f2f3f8;
            max-width:670px;
            margin:0 auto;
        }

        .tableConteudoEmail{
            max-width:670px;
            background:#fff;
            border-radius:3px;
            text-align:center;
            -webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);
            -moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);
            box-shadow:0 6px 18px 0 rgba(0,0,0,.06);
        }

        .copyrightEmail{
            font-size:14px;
            color:rgba(69, 80, 86, 0.7411764705882353);
            line-height:18px;
            margin:0 0 0;
        }

        .alertaNoReply{
            color: red;
            font-size: 11px
        }

        .saudacaoH{
            color:#1e1e2d;
            font-weight:500;
            margin:0;
            font-size:32px;
            font-family:'Rubik',sans-serif;
        }

        .paragrafoEstilo1{
            font-size:15px;
            color:#455056;
            margin:8px 0 0;
            line-height:24px;
        }

        .hrPersonalizado{
            display:inline-block;
            vertical-align:middle;
            margin:29px 0 26px;
            border-bottom:1px solid #cecece;
            width:100px;
        }

        .paragrafoEstilo2{
            color:#455056;
            font-size:18px;
            line-height:20px;
            margin:0;
            font-weight: 500;
        }

        .botaoPrimary{
            background:#f99f2f;
            text-decoration:none !important;
            display:inline-block;
            font-weight:500;
            margin-top:24px;
            color:#fff;
            text-transform:uppercase;
            font-size:14px;
            padding:10px 24px;
            display:inline-block;
            border-radius:50px;
        }

        .botaoAzul{
            background:#1c84c6;
            text-decoration:none !important;
            display:inline-block;
            font-weight:500;
            margin-top:24px;
            color:#fff;
            text-transform:uppercase;
            font-size:14px;
            padding:10px 24px;
            display:inline-block;
            border-radius:50px;
        }

        .table-container {
            width: 100%;
            max-width: 670px;
            margin: 0 auto;
            font-family: 'Open Sans', sans-serif;
        }

        b {
            color: #f99f2f;
        }

        a{
            text-decoration: none;
        }
    </style>

</head>
<body marginheight="0" marginwidth="0">

    <table class="tableContainer" cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8">
        <tr>
            <td>
                <table class="tableBaseEmail" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">

                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableConteudoEmail">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        @yield('content')
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p class="copyrightEmail"><strong>Copyright </strong>{{config('app.name')}} &copy; {{date('Y')}}</p>
                            <p><span class="alertaNoReply">Atenção este é um email automático, favor não responder*</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
