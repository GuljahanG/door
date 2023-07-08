@extends('inc.sidebar')
@section('admin-content')
    <div class="col-md-8 offset-1">
        <h3 class="mt-5">Orders</h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Attribute</th>
                <th scope="col">Attribute Value</th>
                <th scope="col">Price</th>
                <th scope="col">Price + Coefficient</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($order->order_attributes as $key=> $attribute)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{ $attribute->attribute->title }}</td>
                        <td>{{ $attribute->attribute_value->title }}</td>
                        <td>{{ $attribute->attribute_value->price }}</td>
                        <td>{{ $attribute->attribute_value->price*\App\Models\Coefficient::orderBy('created_at', 'desc')->first()['coefficient'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
