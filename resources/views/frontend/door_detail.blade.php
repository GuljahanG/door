@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Конфигуратор входной двери</h2>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="door">
                    <div class="hand">
                        
                    </div>
                </div>
                <div class="door"> </div>
        </div>
        <div class="col-md-6">
            @if(session()->has('message'))
                  <div class="alert alert-success">
                     {{ session()->get('message') }}
                  </div>
            @endif
            <h3>Параметры</h3>
            @php $attributes = \App\Models\Attribute::get(); @endphp
            <form action="{{route('calculate_price')}}" method="POST">
                @csrf
                @foreach ($attributes as $attribute)
                    <div class="d-flex mt-3">
                        <div class="col-md-3">
                            <h5>{{$attribute->title}}</h5>
                        </div>
                        <div class="col-md-3">
                            @if(!$attribute->multiple)
                                <select class="form-select" name="attribute_{{$attribute->id}}" id="attribute_{{$attribute->id}}" >
                                    @foreach ($attribute->attribute_values as $value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="form-select" name="attribute_{{$attribute->id}}[]" id="attribute_{{$attribute->id}}" multiple>
                                    @foreach ($attribute->attribute_values as $value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                @endforeach
                <button value="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>

@endsection
