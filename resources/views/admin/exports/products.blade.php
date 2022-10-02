<table class="table table-bordered  table-hover text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الحالة</th>
            <th>القسم </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->category->title }}</td>
            </tr>
        @endforeach
    </tbody>
</table>