<table class="table table-bordered  table-hover text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>العميل</th>
            <th>عدد المنتجات </th>
            <th>الاجمالي</th>
            <th>وقت الطلب</th>
            <th>الحالة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->products->count() }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>@lang('status.' . $order->status)</td>
            </tr>
        @endforeach
    </tbody>
</table>
