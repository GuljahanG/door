@extends('inc.sidebar')
@section('admin-content')
<div class="col-md-8 offset-1">
    <h3 class="mt-5">Edit Coefficient</h3>
    <form class="form-horizontal" action="{{ route('coefficients.update', $coefficient->id) }}" method="POST" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
            <div class="form-group">
                <select name="coefficient_type" class="form-select">
                    <option value='dealer' @if ($coefficient->coefficient_type=='dealer') selected @endif> Dealer </option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="name">Coefficient</label>
                <div class="col-sm-10">
                    <input type="text" value={{$coefficient->coefficient}} name="coefficient" class="form-control" required>
                </div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
    </form>
</div>
@endsection
