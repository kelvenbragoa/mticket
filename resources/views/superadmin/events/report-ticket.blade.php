<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        html {
            margin-top: 30px ;
            
        
        }
        body {
            margin-top: 50px;
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

        .invoice h2 {
            
            margin-left: 15px;
        }
        .invoice h5 {
            
            margin-left: 15px;
        }

        .information p {
            color: rgb(255, 255, 255);
        }
        
        .information {
            background-color: #1795ee;
            color: #FFF;
            position:relative;
        }

        .informationbar {
            background-color: #1795ee;
            color: #FFF;
            position:relative;
        }
        .information .logo {
           
        }
        .information table {
            padding: 15px;
        }
    </style>

</head>
<body>

<div class="information" style="width:100%; position: absolute; top: -50;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <p><strong> Evento</strong></p>
                <p>{{$event->name}}</p>
                <p>{{$event->user->name}}</p>
                <p>{{$event->user->email}}</p>


            </td>
            <td align="center">
                <img src="http://mticket.co.mz/template/logo1.png" alt="Logo" width="256" class="logo"/>
            </td> 
            <td align="right" style="width: 40%;">
                
                <h3>MTicket</h3>
                
                   <p> https://www.mticket.co.mz</p>
                   <p> +258 8500000</p>
                    <p> Beira, Mozambique</p>
                        <p> ConnectUs LTD</p>
               
            </td>
        </tr>

    </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br/>

<div class="invoice">
    <h3 style="text-align:center" >Relatório das vendas bilhetes</h3>
    <h5><strong>Número de vendas fisicas</strong>: {{$event->products->count()}}</h5>
    <h5><strong>Número de vendas online</strong>: {{$investment}} MT</h5>
    <h5><strong>Valor arrecadado fisico</strong>: {{$event->sell_bar->sum('total')}} MT</h5>
    <h5><strong>Valor arrecadodo online</strong>: {{$event->sell_bar->sum('total')-$investment}} MT</h5>
    {{-- <h5><strong>Margem Mticket(6%)</strong>: @if ($event->sell_bar->sum('total')-$investment < 0) 0 MT @else {{($event->sell_bar->sum('total')-$investment)*6/100}} MT @endif</h5> --}}

    <hr>
    <br>

    <h2>Bilhetes Registrados</h2>
    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Nome
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Qtd
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                       Preço de Venda
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Preço de Compra
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Qtd Venda
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Valor Venda
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Lucro
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->products as $item)
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->name}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->qtd}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sell_price}} MT
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->buy_price}} MT
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->sum('qtd')}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->sum('qtd') * $item->sell_price}} MT
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{($item->sells->sum('qtd') * $item->sell_price) - ($item->sells->sum('qtd') * $item->buy_price)}} MT
                    </td>
                   
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <hr>

    <br>
    <h2>Protocolos Operadores do Sistema</h2>
    <h2>Número de Operadores: {{$event->barman->count()}}</h2>
    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Nome
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Telefone
                    </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                       Usuário
                    </th>

                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Número de Vendas
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Valor de Vendas
                     </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($event->barman as $item)
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->name}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->mobile}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->user}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->count()}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->sells->sum('total')}} MT
                    </td>
                    
                   
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <hr>

    <br>
    <h2>Vendas Físicas</h2>
    <h2>Número de Vendas: {{$event->sell_bar->count()}}</h2>

    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Data
                    </th>
                    
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Recibo #
                     </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                       Valor
                    </th>

                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Pagamento
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Venda Efetuada por
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Venda Verificada por
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Estado
                     </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($event->sell_bar as $item)
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->created_at->format('d-M H:i')}}
                    </td>
                    
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        #{{$item->id}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->total}} MT
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->method}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->user->name ?? '-'}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->verified_by_user->name ?? '-'}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        @if ($item->status == 1)
                            <span>Não verificada</span>
                        @else
                            <span>Verificada</span>
                        @endif
                    </td>
                    
                   
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <hr>

    <h2>Vendas Online</h2>
    <h2>Número de Vendas: {{$event->sell_bar->count()}}</h2>

    <div>
        <table style="table-layout: fixed; width: 95%;">
            <thead>
                <tr>
                    <th  width="20%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Data
                    </th>
                    
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Recibo #
                     </th>
                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                       Valor
                    </th>

                    <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Pagamento
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Venda Efetuada por
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Venda Verificada por
                     </th>

                     <th align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        Estado
                     </th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($event->sell_bar as $item)
                <tr>
                    <td style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->created_at->format('d-M H:i')}}
                    </td>
                    
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        #{{$item->id}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->total}} MT
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->method}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->user->name ?? '-'}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        {{$item->verified_by_user->name ?? '-'}}
                    </td>
                    <td align="left" style="border-top: 1px solid #eee; padding: 5px;">
                        @if ($item->status == 1)
                            <span>Não verificada</span>
                        @else
                            <span>Verificada</span>
                        @endif
                    </td>
                    
                   
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

   
</div>

<div class="informationbar" style="width:100%; position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} Mticket. Todos direitos reservado. 
            </td>
            <td align="right" style="width: 60%;">
                        ConnectUs LTD, Mozambique 
            </td>
        </tr>

    </table>
</div>
</body>
</html>