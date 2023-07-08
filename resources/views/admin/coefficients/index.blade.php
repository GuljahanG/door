@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Add Coefficient</h3>
    <a href="{{route('coefficients.create')}}" class="btn btn-primary"> Add </a>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Coefficient</th>
            <th scope="col">CoefficientType</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($coefficients as $key=> $coefficient)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$coefficient->created_at}}</td>
                    <td>{{$coefficient->coefficient}}</td>
                    <td>{{$coefficient->coefficient_type}}</td>
                    <td>
                        <li class="d-flex">
                            <ul><a href="{{route('coefficients.edit', $coefficient->id)}}" class="btn btn-primary mr-2"> Edit </a></ul>
                            <ul><a href="{{route('coefficients.destroy', $coefficient->id)}}" class="btn btn-danger"> Delete </a></ul>
                        </li>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
