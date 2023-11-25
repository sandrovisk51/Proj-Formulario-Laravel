@extends('templates.list')
@section('content')
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo-ip4y.jpg') }}" width="50" height="50" class="d-inline-block align-top">
        </a>
        <a class="btn btn-success btn-lg" role="button" aria-disabled="true" href="{{ route('form.client') }}">Novo Cadastro</a>
    </nav>
    <div class="table-responsive custom-table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th scope="col">Cód.</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Info</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr scope="row" id="li-{{ $client->id }}">
                        <td>
                            {{ $client->id }}
                        </td>
                        <td><a class="text-success text-capitalize" href="{{ route('edit.client', $client->id) }}">{{ $client->first_name }} {{ $client->last_name }}</a></td>
                        <td>
                            {{ $client->email }}
                            <small class="d-block">{{ $client->cpf }}</small>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm" data-apid="{{ $client->id  }} " data-apse="{{ $client->first_name }} {{ $client->last_name }}" alt="Envio do dados do cliente">Enviar Dados</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-uuid="{{ $client->id  }} " data-uuse="{{ $client->first_name }} {{ $client->last_name }}" alt="Deletar Registro">X</button>
                        </td>
                    </tr>
                    <tr class="spacer"><td colspan="100"></td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
