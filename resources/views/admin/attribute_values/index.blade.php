@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Add Attribute Value</h3>
    <a href="{{route('attribute_values.create')}}" class="btn btn-primary"> Add </a>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($attribute_values as $key=> $attribute_value)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$attribute_value->title}}</td>
                    <td>{{$attribute_value->color}}</td>
                    <td>{{$attribute_value->price}}</td>
                    <td>
                        <li class="d-flex">
                            <ul><a href="{{route('attribute_values.edit', $attribute_value->id)}}" class="btn btn-primary mr-2"> Edit </a></ul>
                            <ul><a href="{{route('attribute_values.destroy', $attribute_value->id)}}" class="btn btn-danger"> Delete </a></ul>
                        </li>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>

@endsection
