<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="../images/favicon.ico" />

    <title>Order Details</title>

    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
    </style>
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Main content -->
                <section class="invoice printableArea">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-header">
                                <div class="pull-right text-right">
                                    <h3>{{ \Carbon\Carbon::now()->format('d F Y') }}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-md-6 invoice-col" style="float: left">
                            <strong>From</strong>
                            <address>
                                <strong class="text-blue font-size-24">Easy Shop</strong><br />
                                <strong>Email:</strong>support@easyShop.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 invoice-col text-right" style="float: right">
                            <strong>To</strong>
                            <address>
                                <strong class="text-blue font-size-24">{{ $order['name_user'] }}</strong><br />
                                 {{ $data['division'] }} , {{ $data['district'] }} , {{ $data['state'] }}<br />
                                <strong>Phone:</strong> {{ $order['phone'] }} <br>
                                <strong>Email:</strong> {{ $order['email'] }}
                            </address>
                            <strong>Invoice Num</strong><span style="color: red">#{{ $order['invoice_no'] }}</span>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">

                            <table id="customers">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col" class="text-right">Quantity</th>
                                    <th scope="col" class="text-right">Unit Cost</th>
                                    <th scope="col" class="text-right">Subtotal</th>
                                </tr>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($data['carts'] as $cart)
                                <tr>
                                  <td><?= ++$i?></td>
                                  <td>{{ $cart->name }}</td>
                                  <td>{{ $cart->quantity }}</td>
                                  <td class="text-right">${{ number_format($cart->price) }}</td>
                                  <td class="text-right">${{ number_format($cart->price * $cart->quantity) }}</td>
                                </tr>
                            @endforeach
                            </table>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-12 text-right">
                            @if (Session::has('coupon'))
                                <div style="float: right">
                                    <p><strong>Payment Type :</strong>{{ $data['payment_type'] }}</p>
                                    <p><strong>Copon Name ({{ session()->get('coupon')['coupon_discount'] }}%) :</strong>{{ session()->get('coupon')['coupon_name'] }}</p>
                                    <p><strong>Discount Amount :</strong> ${{ session()->get('coupon')['discount_amount'] }}</p>
                                    <h3><b><strong>Total :</strong> </b> ${{ number_format($data['amount']) }}</h3>
                                </div>
                            @else
                                <div class="total-payment" style="float: right">
                                    <p><strong>Payment Type :</strong>{{ $data['payment_type'] }}</p>
                                    <h3><b><strong>Total :</strong> </b> ${{ number_format($data['amount']) }}</h3>
                                </div>
                            @endif

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->


</body>

</html>
