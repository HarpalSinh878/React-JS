<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Delivery Slip</title>

    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        @media print {
            .new-page {
                page-break-before: always;
            }

            .hidePrint {
                display: none;
            }

            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }

            table {
                border-collapse: collapse;
            }

            @page {
                size: auto;
                /* auto is the initial value */
                margin-bottom: 0px;
                /* this affects the margin in the printer settings */
                margin-top: 20px;
            }

            .table td {
                padding: 4px;
            }

            a {
                color: black;
                text-decoration: none !important;
                text-underline: none;
            }
        }

        body {
            font-size: 16px;
            font-family: "Times New Roman"
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body onload="window.print()">

    @isset($order)

        @foreach ($order as $row)
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-sm text-center">
                        <p></p>
                        <p><strong>{{ $row->client->name }}</strong></p>
                        <p><strong>{{ $row->client->address }}</strong></p>
                        <p>

                            Phone: <strong>{{ $row->client->phone }}</strong>
                        </p>
                    </div>
                </div>

                <table style="text-align: center;" align="center">
                    <tbody>
                        <tr>
                            <td>
                                <div class="" style="width: 350px; border: 1px solid #676767; padding: 10px;">
                                    <h6>Delivery Slip</h6>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>
                <div class="row">
                    <div class="col-sm">
                        <p><strong><u>CLIENT:</u></strong> <br>{{ $row->recipient->name }}</p>
                        <p>{{ $row->recipient->address }} , {{ $row->recipient->city }}, {{ $row->recipient->state }}
                            {{ $row->recipient->zip }}</p>
                        <p>Ph#: +{{ $row->recipient->phone }}</p>
                        <p>Cell#: {{ $row->recipient->phone }}</p>
                        <p>Order#: {{ $row->id }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        Cal
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Delivery Acceptance Date</th>
                                    <th>Rx #</th>
                                    <!--<th>Rf #</th>-->
                                    <th>Rx. Barcode</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>COD Amt</th>
                                    <th>Packages</th>
                                    <th>Pres. Addr</th>
                                </tr>
                                <tr>
                                    <td>0.00</td>
                                    <td>{{ $row->package_item }}</td>
                                    <td>{{ $row->recipient->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <table width="100%">
                    <tbody>
                        <tr valign="top">
                            <td width="75%">
                                <p>Total Rx Count: 0</p>
                                <p>Counseling Requested: Yes ____ No <u> &nbsp; ✔ &nbsp; &nbsp;</u>&nbsp;&nbsp;Receiver`s
                                    Name:
                                    <u>{{ $row->recipient->name }}</u>
                                </p>
                                <p>Receiver's Signature: </p>
                            </td>
                            <td>
                                <p>Amount Collected $0.00</p>
                                <p>Date: <u>{{ date('d/m/y', strtotime($row->date_to_deliver)) }}</u></p>
                                <p>Time: <u>{{ date('H:s A', strtotime($row->created_at)) }}</u></p>

                                <p>Delivered By: <u>{{ isset($row->driver) ? $row->driver->name : '' }}</u></p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        @endforeach

    @endisset



    <div class="new-page"></div>
    <style>
        body {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>


</body>

</html>
