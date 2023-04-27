<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
</head>
<body>


@include('invoices/style')

    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">
                                            <a href="#" class="btn btn-primary">
                                                <i class="icon-download"></i> Mail
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="" class="invoice-logo">
                                           Invoice
                                        </a>
                                    </div>

                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                Test Invoice<br>
                                                {{ $invoices[0]['address'] }}
                                            </address>

                                            <div class="invoice-num" style="float:right">
                                                <div>Invoice - {{ $invoices[0]['number'] }}</div>
                                                <div>{{ $invoices[0]['date'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-body">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>

                                                        <th>Description</th>

                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0 ?>

                                                    @foreach ($invoices as $invoiceItem)

                                                    <tr>
                                                        <td>{{ $invoiceItem['description'] }}</td>
                                                        <td>$ {{ $invoiceItem['amount'] }}</td>
                                                    </tr>
                                                    <?php $total += $invoiceItem['amount'] ?>
                                                @endforeach
                                                <tr>
    												<td>&nbsp;</td>
    												<td>

    													<h5 class="text-success"><strong>Grand Total</strong></h5>
    												</td>
    												<td>

    													<h5 class="text-success"><strong>$ {{$total}}</strong></h5>
    												</td>
    											</tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-footer">
                                Thank you for your Business.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
