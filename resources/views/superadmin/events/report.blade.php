<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }

        .invoice h5 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 15px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <p>Evento</p>
                <h3>{{$event->name}}</h3>
                <p>{{$event->user->name}}</p>
                <p>{{$event->user->email}}</p>


            </td>
            <td align="center">
                <img src="http://mticket.co.mz/template/logo1.png" alt="Logo" width="256" class="logo"/>
            </td> 
            <td align="right" style="width: 40%;">
                <p>{{__('text.pay')}}</p>
                <h3>MTicket</h3>
                <pre>
                    https://www.mticket.co.mz
                    +258 850110300
                    Beira, Mozambique
                    ConnectUs LTD
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Relatório do venda dos produtos do bar</h3>
    <h5>Produtos</h5>
    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Nome
                    </th>
                    <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        Qtd
                    </th>
                    <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                       Preço de Venda
                    </th>
                    <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        Preço de Compra
                    </th>
                    <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        Qtd Venda
                    </th>
                    <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        Valor Venda
                    </th>
                    <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        Lucro
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->name}}
                    </td>
                    <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->qtd}}
                    </td>
                    <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sell_price}} MT
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->buy_price}} MT
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->sum('qtd')}}
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->sum('qtd') * $item->sell_price}} MT
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{($item->sells->sum('qtd') * $item->sell_price) - ($item->sells->sum('qtd') * $item->buy_price)}} MT
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{(($item->sells->sum('qtd') * $item->sell_price) - ($item->sells->sum('qtd') * $item->buy_price))*6/100}} MT
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
{{-- 
    <hr>

    <h5>{{__('text.transactions')}}</h5>
    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{__('text.date')}}
                    </th>
                    <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        {{__('text.method')}}
                    </th>
                    <th align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        {{__('text.reference')}}
                    </th>
                    <th align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        {{__('text.amount')}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->transaction as $item)
                    <tr>
                        <td style="border-top: 1px solid #eee; padding: 5px;">
                            {{$item->created_at->format('d-m-Y')}}
                        </td>
                        <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                            {{$item->method}}
                        </td>
                        <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                            {{$item->reference}}
                        </td>
                        <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                            {{$item->amount }} MT
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        &nbsp;
                    </td>
                    <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        &nbsp;
                    </td>
                    <td align="center" style="border-top: 1px solid #eee; padding: 5px;">
                        {{__('text.balance')}}
                    </td>
                    <td align="right" style="border-top: 1px solid #eee; padding: 5px;">
                        @if ($invoice->status == 0)
                        {{$invoice->amount + number_format( $invoice->amount*0.05,2)}} MT
                        @else
                        0 MT
                        @endif
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div> --}}

   
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} Mticket Marca do ConnectUs LTD. Todos direitos reservado. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; 
            </td>
            <td align="right" style="width: 60%;">
                        ConnectUs LTD
            </td>
        </tr>

    </table>
</div>
</body>
</html>