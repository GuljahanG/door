@extends('inc.sidebar')
@section('admin-content')
    <div class="col-md-8 offset-1">
        <h3 class="mt-5">Add Attributes</h3>
        <a href="{{route('attributes.create')}}" class="btn btn-primary mt-1 mb-1"> Add </a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $key=> $attribute)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$attribute->title}}</td>
                        <td>
                            <li class="d-flex">
                                <ul><a href="{{route('attributes.edit', $attribute->id)}}" class="btn btn-primary mr-2"> Edit </a></ul>
                                <ul><a href="{{route('attributes.destroy', $attribute->id)}}" class="btn btn-danger"> Delete </a></ul>
                            </li>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
