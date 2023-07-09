@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h3 class="text-center py-3 pb-5">Конфигуратор входной двери</h3>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6 d-flex mb-5 px-4">
                <div class="col-6 border paint-color">
                    <div class="col-10 d-flex border align-items-center m-auto door-color" style="height: 100%;">
                        <div class="rounded-circle border ms-2 hand" style="width: 30px; height: 30px"></div>
                    </div>
                </div>
                <div class="col-6 border paint-color">
                    <div class="col-10 d-flex border align-items-center m-auto door-color" style="height: 100%;">
                        <div class="rounded-circle border ms-auto me-2 hand" style="width: 30px; height: 30px"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h3>Параметры</h3>
                @php $attributes = \App\Models\Attribute::whereIn('id', $order->order_attributes->pluck('attribute_id'))->get(); $coefficient = \App\Models\Coefficient::latest()->first(); @endphp

                <form action="{{ route('client_orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    @csrf
                    @foreach ($attributes as $attribute)
                        @foreach ($attribute->attribute_values as $value)
                            @if(count($order->order_attributes->where('attribute_id', $attribute->id)->where('attribute_value_id', $value->id)) > 0)
                                <style>
                                    .{{$attribute->element}}{
                                        background-color: {{$value->color_code}}
                                    }
                                </style>
                            @endif
                        @endforeach
                        <div class="d-flex mt-3 justify-content-between align-items-center">
                            <div class="col-md-3">
                                <h5>{{ $attribute->title }}</h5>
                            </div>
                            <div class="col-md-6">
                                @if (!$attribute->multiple)
                                    <select
                                        onchange="changeState(true, this.options[this.selectedIndex].getAttribute('data-element'), this.options[this.selectedIndex].getAttribute('data-color'),{{$coefficient->coefficient}})"
                                        class="form-select" name="attribute_{{ $attribute->id }}"
                                        id="attribute_{{ $attribute->id }}">
                                        @foreach ($attribute->attribute_values as $value)
                                            <option @if (count($order->order_attributes->where('attribute_id', $attribute->id)->where('attribute_value_id', $value->id)) > 0) selected @endif
                                                value="{{ $value->id }}" data-element="{{ $attribute->element }}"
                                                data-color="{{ $value->color_code }}" data-price="{{ $value->price }}">
                                                {{ $value->title }} - {{ $value->price }}
                                            </option>

                                        @endforeach
                                    </select>
                                @else
                                    <select
                                        onchange="changeState(false, this.options[this.selectedIndex].getAttribute('data-element'),null,{{$coefficient->coefficient}})"
                                        class="form-select select2" name="attribute_{{ $attribute->id }}[]"
                                        id="attribute_{{ $attribute->id }}" multiple="multiple">
                                        @foreach ($attribute->attribute_values as $value)
                                            <option @if (count($order->order_attributes->where('attribute_id', $attribute->id)->where('attribute_value_id', $value->id)) > 0) selected @endif
                                                value="{{ $value->id }}" data-price="{{ $value->price }}">
                                                {{ $value->title }} - {{ $value->price }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <h1 style="border-top:dashed; margin-top: 35px; border-block-width: 2px; text-align: right" id="final_sum">{{number_format($order->total, 2)}}</h1>
                    <button value="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        function changeState(has_color, element, color, coefficient) {
            console.log(coefficient)
            if (has_color) {
                $('.' + element).css('background-color', color);
            }
            var sum = 0;
            $("select option:selected").each(function() {
                sum = sum + parseFloat($(this).attr('data-price'));
            });
            $('#final_sum').text((Math.round(sum * parseInt(coefficient) * 100) / 100).toFixed(2));
        }
    </script>
@endsection
