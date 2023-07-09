<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta charset="UTF-8">
    <style media="all">
        .paint-color{
            border: 1px solid#0d0d0d;
            height: 330px;
            margin: 2px;
            position: relative;
        }
        .door-color{
            border: 1px solid#0d0d0d;
            height: 330px;
            left: 20px;
            position: absolute;
        }
        .hand{
            background-color: #e5eaa5;
            width: 20px;
            height: 20px;
            border-radius: 20px;
            position: absolute;
            left: 20px;
            top: 45%;
        }
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        .table-no-border tr td th{
            border : none;
        }
        td {
            height: 50px;
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <div style="width:38%; float: left">
            <div class="paint-color" style="width:48%; float:left">
                <div class="door-color" style="width: 94%; margin:auto">
                    <div class="hand">
                    </div>
                </div>
            </div>
            <div class="paint-color" style="width:48%; float:right">
                <div class="door-color" style="width: 94%; margin:auto; left:0px">
                    <div class="hand" style="margin-right:20px; float:right">
                    </div>
                </div>
            </div>
        </div>
        <div style="width:40%; margin-left: 10px; float:left">
            <div>
                <p>Код: {{ $order->code ?? '-'}}</p>
            </div>
            <div>
                <table>
                    <thead>
                        <tr style="100%">
                            <th style="33%">Параметры</th>
                            <th style="33%">Параметры</th>
                            <th style="33%">Цена</th>
                        </tr>
                    </thead>
                    <tbody class="strong">
                        @foreach ($order->order_attributes as $attribute)
                        @if($attribute->attribute->element)
                            <style>
                                .{{$attribute->attribute->element}}{
                                    background-color: {{$attribute->attribute_value->color_code}}
                                }
                            </style>
                        @endif
                            <tr style="100%">
                                <td style="33%">{{ $attribute->attribute->title }}: </td>
                                <td style="33%">{{ $attribute->attribute_value->title }} </td>
                                <td style="33%">{{ $attribute->attribute_value->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="margin-top:20px;padding-top:20px;margin-right:50px">
                <div>
                    <table>
                        <tbody>
                        <tr>
                            <th>Total: </th>
                            <td class="currency">{{number_format($order->total) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
