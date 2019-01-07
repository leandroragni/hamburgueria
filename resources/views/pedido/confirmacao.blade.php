<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div>
            <p>Pedido</p>
                <table>
                    @foreach ($pedido['itens'] as $item)
                        <tr>
                            <td>
                                {{ $item['nome'] }}
                            </td>
                            <td>
                                {{ $item['preco'] }}
                            </td>
                            <td>
                                {{ $item['quantidade'] }}
                            </td>
                            <td>
                                {{ $item['preco_total_item'] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            <p>
                Total: {{ $pedido['valor_total'] }}
            </p>
            <p>
                @switch($pedido['status'])
                    @case(1)
                        <span>Realizado</span>
                        <a href="editar/pedido/{{ $id_pedido' }}">
                        @break

                    @case(3)
                        <span>Confirmado</span>
                        <a href="editar/pedido/{{ $id_pedido' }}">
                        @break

                    @case(4)
                        <span>Em preparação</span>
                        @break

                    @default
                        <span>Em entrega</span>
                @endswitch
            </p>
        </div>
    </body>
</html>
