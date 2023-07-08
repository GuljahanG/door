@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Edit Attribute Value</h3>
        <form class="form-horizontal" action="{{ route('attribute_values.update', $attribute_value->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div>
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="title">Attribute</label>
                    <div class="col-sm-10">
                        <select name="attribute_id" class="form-select">
                            @foreach (\App\Models\Attribute::get() as $attribute)
                                    <option value={{$attribute->id}} @if ($attribute->id==$attribute_value->attribute_id) selected @endif> {{$attribute->title}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$attribute_value->title}}"  name="title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="name">ColorName</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$attribute_value->color}}" name="color" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="color_code">ColorCode</label>
                    <div class="col-sm-10">
                        <input type="color"value="{{$attribute_value->color_code}}" name="color_code" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="price">Price</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$attribute_value->price}}" name="price" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
</div>

@endsection
