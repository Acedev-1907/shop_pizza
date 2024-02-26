@extends('master.admin')
@section('js_donut')
    <script>
        var colorDanger = "#FF1744";
        var productCount = <?php echo $product; ?>;
        var categoryCount = <?php echo $category; ?>;
        Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#E0F7FA',
                '#B2EBF2',
                '#80DEEA',
                '#4DD0E1',
                '#26C6DA',
                '#00BCD4',
                '#00ACC1',
                '#0097A7',
                '#00838F',
                '#006064'
            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [{
                    label: "Product",
                    value: productCount,
                    color: colorDanger
                },
                {
                    label: "category",
                    value: categoryCount
                },
            ]
        });
    </script>
@stop()


@section('main')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $orderCount }}</h3>

                    <p>Orders</p>
                </div>
                <a href="{{ route('order.index') }}" class="icon">
                    <i class="ion ion-bag"></i>
                </a>
                <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $orders_success }}</h3>

                    <p>Confirmed Order</p>
                </div>
                <a href="{{ route('order.filter') . '?status=1' }}" class="icon">
                    <i class="ion ion-bag"></i>
                </a>
                <a href="{{ route('order.filter') . '?status=1' }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $orders_unconfimred }}</h3>

                    <p>Order Unconfimred</p>
                </div>
                <a href="{{ route('order.filter') . '?status=0' }}" class="icon">
                    <i class="ion ion-bag"></i>
                </a>
                <a href="{{ route('order.filter') . '?status=1' }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $customerCount }}</h3>

                    <p>Customer</p>
                </div>
                <a href="{{ route('customer.create') }}" class="icon">
                    <i class="ion ion-person-add"></i>
                </a>
                <a href="{{ route('customer.index') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>
    <div class="row mt-3">
        <div class="col-lg-3 col-xs-6">
            <div id="donut"></div>
        </div>
        <div class="col-lg-9 col-xs-9">
            <table class="table table-hover">
                <h3>Customer orders</h3>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($orders_bill as $bill)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $bill->name }}</td>
                            <td>{{ $bill->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if ($bill->status == 0)
                                    <span style="color: red">Unconfimred.</span>
                                @elseif ($bill->status == 1)
                                    <span style="color: green">Confirmed.</span>
                                @elseif ($bill->status == 2)
                                    <span style="color: green">Delivered.</span>
                                @else
                                    <span style="color: red">Cancelled.</span>
                                @endif
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop()
