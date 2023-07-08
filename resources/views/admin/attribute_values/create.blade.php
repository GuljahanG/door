@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Add Attribute Value</h3>
    <form class="form-horizontal" action="{{ route('attribute_values.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <select name="attribute_id" class="form-select">
                    @foreach (\App\Models\Attribute::get() as $attribute)
                         <option value={{$attribute->id}}> {{$attribute->title}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label class="col-sm-2 control-label" for="name">Title</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Title" name="title" class="form-control" required>
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="col-sm-2 control-label" for="name">ColorName</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Color" name="color" class="form-control" required>
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="col-sm-2 control-label" for="name">ColorCode</label>
                <div class="col-sm-10">
                    <input type="color" placeholder="ColorCode" name="color_code" class="form-control" required>
                </div>
            </div>
            <div class="form-group mt-2">
                <label class="col-sm-2 control-label" for="name">Price</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Price" name="price" class="form-control" required>
                </div>
            </div>
        <div class="mt-2">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>
@endsection
