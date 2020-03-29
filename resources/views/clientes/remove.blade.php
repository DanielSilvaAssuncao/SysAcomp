@extends('shared.base')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Remover o Cliente</div>
    <div class="panel-body">
        <form method="post" action="{{route ('clientes.destroy', $clientes->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <h4>Tem certeza que deseja remover o cliente?</h4>
                    <hr>
                    <h4>Sobre o Cliente</h4>
                    <p>Nome: {{$clientes->nome}}</p>
                    <p>E-Mail: {{$clientes->email}}</p>
                    <p>Telefone: {{$clientes->telefone}}</p>
                    <p>Tipo de Cliente: {{$clientes->telefone}}</p>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Remover</button>
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>
</div>
@endsection
