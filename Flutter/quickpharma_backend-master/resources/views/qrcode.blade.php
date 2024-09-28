<!DOCTYPE html>
<html>

<head>
    <title>Quick Pharma | Print Labels</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
    <style>
        .my-qr-code tr {
            mso-height-source: userset;
            height: 12.75pt
        }

        @media print {
            .my-qr-code {
                page-break-after: always;
                border-collapse: collapse;
                table-layout: fixed;
                width: 504pt;
                margin-top: 40px;
            }
        }
    </style>
</head>

<body onload="window.print()">
    @php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
    @isset($order)
        @foreach ($order as $row)
            @for ($i = 1; $i <= $row->items; $i++)
                <table class="my-qr-code" border="0" cellpadding="0" cellspacing="0" style="">
                    <colgroup>
                        <col class="x-1" width="182" style="mso-width-source:userset;background:none;width:136.5pt">
                        <col class="x-1" width="165" style="mso-width-source:userset;background:none;width:123.75pt">
                        <col class="x-1" width="129" style="mso-width-source:userset;background:none;width:96.75pt">
                    </colgroup>
                    <tbody>
                        <tr height="17">
                            <td height="17" width="182" style="height:12.75pt;width:136.5pt;"><span
                                    style="mso-spacerun:yes;">&nbsp;&nbsp;&nbsp; </span>{{ date('m/d/y H:s') }}</td>
                            <td width="165" style="width:100.75pt;"></td>
                            <td width="129" style="width:96.75pt;" colspan="3">Quick Pharma | Print Labels</td>
                        </tr>
                        <tr height="17">
                            <td height="17" width="182" style="height:12.75pt;width:136.5pt;"></td>
                            <td width="165" style="width:100.75pt;"></td>
                            <td width="129" style="width:96.75pt;" colspan="3"></td>
                        </tr>
                        <tr height="17">
                            <td height="17" style="height:12.75pt;" colspan="2"><span
                                    style="mso-spacerun:yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $row->recipient->name }}
                            </td>
                            <td rowspan="7" colspan="3">{!! QrCode::size(150)->generate($row->id . '-' . $i) !!}</td>
                        </tr>
                        <tr height="17">
                            <td height="17" style="height:12.75pt;" colspan="2"><span
                                    style="mso-spacerun:yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $row->recipient->address }}
                            </td>
                        </tr>
                        <tr height="17">
                            <td height="17" style="height:12.75pt;" colspan="2"><span
                                    style="mso-spacerun:yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $row->recipient->city }},{{ $row->recipient->state }}
                                {{ $row->recipient->zip }} </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr height="17">
                            <td height="17" style="height:12.75pt;" colspan="2"><span
                                    style="mso-spacerun:yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Printed:
                                {{ date('m/d/y H:s') }}</td>
                            <td colspan="2" style="mso-ignore:colspan;"></td>
                        </tr>
                        <tr height="17">
                            <td rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><img alt="Logo"
                                    style="height: 69px;width: 132px;" src="assets/image/dark.png" /></td>
                            <td>{{ $row->recipient->recipient_name }}</td>
                        </tr>
                        <tr height="17">
                            <td>Item {{ $i }}/{{ $row->items }}</td>
                            <td></td>
                        </tr>
                        <tr height="17">
                            <td><span style="mso-spacerun:yes;"></span>#{{ $row->id }},Copay:
                                ${{ $row->copay }}
                            </td>
                            <td></td>
                        </tr>
                        <!--[if supportMisalignedColumns]-->
                        <tr height="0" style="display:none">
                            <td width="182" style="width:136.5pt;"></td>
                            <td width="165" style="width:123.75pt;"></td>
                            <td width="129" style="width:96.75pt;"></td>
                        </tr>
                        <!--[endif]-->
                    </tbody>
                </table>
            @endfor
        @endforeach
    @endisset
</body>

</html>
<script>
    var arguments = window.location.href.split('?')[1].split('=');
    arguments.shift();
    document.title = "Quick_Pharma_#" + arguments;
</script>
