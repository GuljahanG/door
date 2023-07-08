@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Add Attributes</h3>
        <form class="form-horizontal" action="{{ route('attributes.update', $attribute->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
                <div class="form-group mt-2">
                    <label class="col-sm-2 control-label" for="name">Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$attribute->title}}" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="flexCheckChecked"> Multiple </label>
                    <input class="form-check-input" type="checkbox" @if($attribute->multiple) checked @endif name="multiple">
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
        </form>
    </div>
</div>
@endsection
