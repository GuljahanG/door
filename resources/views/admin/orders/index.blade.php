@extends('inc.sidebar')
@section('admin-content')
    <div class="col-md-8 offset-1">
        <h3 class="mt-5">Orders</h3>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Code</th>
                <th scope="col">Total</th>
                <th scope="col">Pdf</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key=> $order)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{ $order->code }}</td>
                        <td>{{ $order->total }}</td>
                        <td><a _target="blank" href="storage/{{$order->pdf_link}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                              </svg>
                            </a></td>
                        <td>
                            <li class="d-flex">
                                <ul><a href="{{route('orders.show', $order->id)}}" class="btn btn-primary"> Show </a></ul>
                            </li>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
