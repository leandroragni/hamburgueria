<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #bc2026;">
            <a class="navbar-brand" href="cardapio">Valbernielson's Hamburgueria</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cardapio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerencial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meus pedidos</a>
                    </li>
                </ul>
          </div>
        </nav>

        <div class="container">
            <p class="m5">
            </p>
            <form method="POST" action="enviar/pedido">
                @csrf
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Lanche</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itens as $item)
                            <tr>
                                <td><img src="{{ $item->imagem }}" /></td>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->descricao }}</td>
                                <td>R$ {{ $item->preco }}</td>
                                <td>
                                    <input type="hidden" name="item_id[]" value="{{ $item->id }}" />
                                    <input type="number" name="quantidade[]" min="0" />
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <select name="endereco_id">
                        @foreach ($enderecos as $endereco)
                            <option value="{{ $endereco['id'] }}"> {{ $endereco['extenso'] }} </option>
                        @endforeach
                    </select>
                </div>
                <p>
                    <input type="hidden" name="cliente_id" value="1" />
                    <input type="submit" name="fazer_pedido" value="Pedir" />
                </p>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>