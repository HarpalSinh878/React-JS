<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Confirmation And Delivery Slip</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <style>
        @media print {
            .new-page {
                page-break-before: always;
            }

            .hidePrint {
                display: none;
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
    </style>
</head>

<body onload="window.print()">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center mb-0">
                </p>
                <h4 align="center">{{ $order->client->name}}</h4>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>1. <u class="ml-3"><strong>Counseling Offer Acknowledgement (Full counseling fact sheet enclosed
                            with medication)</strong></u></p>
                <p>
                    Dear Patient:<br>
                    {{ $order->client->name}} would like to inform you that you
                    have the right to receive counseling for your compounded medication. If
                    you would like to<br>
                    receive counseling, one of our pharmacists will contact
                    you within 24 hours. Please choose one of the options below. Thank you.
                </p>
                <p>
                    <span><strong>[&nbsp;&nbsp; &nbsp;&nbsp;] Yes</strong> - I would like to receive counseling on my
                        compounded medication.</span>
                    <span class="ml-3"><strong>[&nbsp;&nbsp;✔&nbsp;&nbsp;] No</strong> - I decline the
                        counseling.</span>

                </p>
            </div>
        </div>
        <table width="100%">
            <tbody>
                <tr valign="top">
                    <td width="50%">
                        <p>2. <u class="ml-3"><strong>Refill Request</strong></u></p>
                        <p>
                            <span><strong>[&nbsp;✔&nbsp;] YES</strong> Refill my medication on:

                                <span class="underline">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                            </span><br>
                            <span><strong>[&nbsp; &nbsp;] NO</strong> Do not refill my medication. </span><br>
                        </p>

                    </td>
                    <td width="50%">
                        <div style="width: 430px; height: 150px; border: 2px dashed black; ">
                            <div style="margin: 10px; text-align: left; border: 1px solid black;">
                                <span>Place Rx sticker(s) here or write Rx Number(s) below:</span>
                            </div>
                            <div style="padding: 10px">
                                <b>{{ $order->recipient->name }}</b>
                                <br>
                                <b></b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LOCAL DELIVERY
                                <br>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <p>3. <strong class="ml-3">Authorization to leave medication with someone<br>&nbsp;&nbsp;<span
                            class="ml-4">other than the patient themselves.</span></strong></p>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-12">
                <p>
                    <strong>
                        [&nbsp;&nbsp; &nbsp;&nbsp;] I authorize for my medication to be left with:
                        <span
                            class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        Relationship: <span
                            class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        Phone #: <span
                            class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </strong>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>4. <u class="ml-3"><strong>For Medicaid patients, ONLY: If patient can't pay copay due to financial
                            hardship, please check box</strong></u><br>
                    [&nbsp; &nbsp;] I acknowledge that a {{ $order->client->name}}
                    representative requested a copay related to the above prescription.<br>
                    Unfortunately, I cannot pay this amount due to financial hardship. Patient's Initials: <span
                        class="underline"> &nbsp; &nbsp; W. G. &nbsp; &nbsp; </span>
                </p>
                <p>
                    <br>
                    <br>
                    <strong>Patient's Signature (attesting to all 4 of the above statements): X</strong>
                    ____________________________________________<br>
                    Best Contact Phone Numbers:
                    <span
                        class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    and <span
                        class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <br>
                    Emergency Contact Name: <span
                        class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    Phone Number: <span
                        class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <p>
                    <span>Date: <span class="underline"> &nbsp; {{ date('d/m/y', strtotime($order->created_at)) }}  &nbsp; </span>
                        &nbsp; Driver's Initials: <span class="underline"> &nbsp; &nbsp; Y. N. &nbsp; &nbsp;
                        </span></span>
                    <span class="ml-5"><strong>Amount Collected: </strong>
                        $<span
                            class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-sm text-center">
                <p></p>
                <p><strong>{{ $order->client->name}}</strong></p>
                <p><strong>{{ $order->client->address}}</strong></p>
                <p>

                    Phone: <strong>{{ $order->client->phone}}</strong>
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
                <p><strong><u>CLIENT:</u></strong> <br>{{ $order->recipient->name }}</p>
                <p>{{ $order->recipient->address }} , {{ $order->recipient->city }}, {{ $order->recipient->state }} {{ $order->recipient->zip }}</p>
                <p>Ph#: +{{ $order->recipient->phone }}</p>
                <p>Cell#: 0</p>
                <p>Order#: {{ $order->id }}</p>
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
                            <td>{{ $order->package_item }}</td>
                            <td>{{ $order->recipient->address }}</td>
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
                        <p>Counseling Requested: Yes ____ No <u> &nbsp; ✔ &nbsp; &nbsp;</u>&nbsp;&nbsp;Receiver`s Name:
                            <u>{{ $order->recipient->name }}</u>
                        </p>
                        <p>Receiver's Signature: </p>
                    </td>
                    <td>
                        <p>Amount Collected $0.00</p>
                        <p>Date: <u>{{ date('d/m/y', strtotime($order->created_at)) }}</u></p>
                        <p>Time: <u>{{ date('H:s A', strtotime($order->created_at)) }}</u></p>

                        <p>Delivered By: <u>{{ isset($order->driver) ? $order->driver->name : ''}}</u></p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
