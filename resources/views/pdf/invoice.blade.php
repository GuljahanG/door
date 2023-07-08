<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">

        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #333542;
        }
        .cf:before,
        .cf:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }

        .cf:after {
            clear: both;
        }

        /**
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
        .cf {
            *zoom: 1;
        }
        .wrapper{
            width:100%;
            margin-top:100px;
            margin-left:40px;
            margin-right:40px;
            height:auto;
            min-height:100px;
            box-sizing: border-box;
        }
        .col-left,.col-right{
            width:48%;
            float:left;
            min-height:100px;
        }
        .col-right{float:right;}
        .one{border:1px solid #000;width:100%;display:flex}
        .two{width:100%;}
        .foo{border-top:1px solid #ddd;margin-top:20px;width:100%;}
        .type{border-top:1px solid #ddd;width:100%;}

        .oneone{border:1px solid #000;width:100%;display:flex}
        .twotwo{width:100%;}
        .foofoo{border-top:1px solid #ddd;margin-top:20px;width:100%;}
        .typetype{border-top:1px solid #ddd;width:100%;}

        .col-left div:last-child,.col-right div:last-child{border-bottom:none;}

        .one p{float:right;}
        .type table{ float:right;}
        .type th{ text-align:right}


        .oneone p{float:right;}
        .typetype table{ float:right;}
        .typetype th{ text-align:left}

    </style>
</head>
<body>

<div class='wrapper cf'>

    <div class='col-right'>

        <div class='twotwo'>
            <p>Код: {{ $order->code ?? '-'}}</p>
        </div>
        <div class='foofoo'>
            <table style="text-align:left">
                <thead>
                    <tr>
                        <th >Параметры</th>
                        <th >Параметры</th>
                        <th >Цена</th>
                    </tr>
                </thead>
                <tbody class="strong">
                    @foreach ($order->order_attributes as $key => $attribute)
                        <tr class="">
                            <td>{{ $attribute->attribute->title }}:  </td>
                            <td >{{ $attribute->attribute_value->title }}</td>
                            <td >{{ $attribute->attribute_value->price }}</td>
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
