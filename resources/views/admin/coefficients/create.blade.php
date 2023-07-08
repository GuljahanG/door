@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Add Coefficient</h3>
    <form class="form-horizontal" action="{{ route('coefficients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <select name="coefficient_type" class="form-select">
                    <option value='dealer'> Dealer </option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label class="col-sm-2 control-label" for="price">Coefficient</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Coefficient" name="coefficient" class="form-control" required>
                </div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
    </form>
</div>
@endsection
