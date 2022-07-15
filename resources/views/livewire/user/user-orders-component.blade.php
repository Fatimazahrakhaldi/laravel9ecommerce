<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">My Orders</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        </div>
                        <!--//row-->
                    </div>
                    <!--//table-utilities-->
                </div>
                <!--//col-auto-->
            </div>
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell text-capitalize">orderId</th>
                                    <th class="cell text-capitalize">subtotal</th>
                                    <th class="cell text-capitalize">discount</th>
                                    <th class="cell text-capitalize">tax</th>
                                    <th class="cell text-capitalize">total</th>
                                    <th class="cell text-capitalize">first name</th>
                                    <th class="cell text-capitalize">last name</th>
                                    <th class="cell text-capitalize">mobile </th>
                                    <th class="cell text-capitalize">email </th>
                                    <th class="cell text-capitalize">zipcode </th>
                                    <th class="cell text-capitalize">status </th>
                                    <th class="cell text-capitalize">order Date </th>
                                    <th class="cell text-capitalize">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td class="cell">{{ $order->id }}</td>
                                        <td class="cell">{{ $order->subtotal }}</td>
                                        <td class="cell">{{ $order->discount }}</td>
                                        <td class="cell">{{ $order->tax }}</td>
                                        <td class="cell">{{ $order->total }}</td>
                                        <td class="cell">{{ $order->firstname }}</td>
                                        <td class="cell">{{ $order->lastname }}</td>
                                        <td class="cell">{{ $order->mobile }}</td>
                                        <td class="cell">{{ $order->email }}</td>
                                        <td class="cell">{{ $order->zipcode }}</td>
                                        <td class="cell">{{ $order->status }}</td>
                                        <td class="cell">{{ $order->created_at }}</td>
                                        <td class="cell"><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">No orders found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->


            </div>
            <!--//app-card-->
            <div class="app-pagination">
                <div class="pagination justify-content-center">
                    {{ $orders->links() }}
                </div>
            </div>
            <!--//app-pagination-->

        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->

</div>
<!--//app-wrapper-->

