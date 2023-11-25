@extends('templates.form')
@section('content')
    <form method="POST" id="signup-form" class="signup-form" action="{{ route('register.client') }}">
        @csrf
        <div>
            <h3>{{ $step }}</h3>
            <fieldset>
                <h2>Formulário do Cliente</h2>
                <p class="desc">Insira suas informações necessárias para prossiga para a próxima etapa.
                </p>
                <div class="fieldset-content">
                    <div class="form-row">
                        <label class="form-label">Nome do cliente</label>
                        <div class="form-flex">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" maxlength="50"
                                    value="{{ old('first_name') }} {{ $client->first_name }}" />
                                <span class="text-input">nome</span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" maxlength="100"
                                    value="{{ old('last_name') }} {{ $client->last_name }}" />
                                <span class="text-input">sobrenome</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" maxlength="100" value="{{ old('email') }} {{ $client->email }}" />
                        <span class="text-input">Example :<span> sandro@email.com</span></span>
                    </div>
                    <div class="form-group">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text"  class="input-cor-green" name="cpf" id="cpf" data-mask-cpf value="{{ old('cpf') }} {{ $client->cpf }}"  @readonly($client->cpf) />
                    </div>
                    <div class="form-date">
                        <label for="birth_date" class="form-label">Date de nascimento</label>
                        <div class="form-date-group">
                            <div class="form-date-item">
                                <select id="birth_day" name="birth_day" value="{{ old('birth_day') }} "></select>
                                <span class="text-input">dia</span>
                            </div>
                            <div class="form-date-item">
                                <select id="birth_month" name="birth_month" value="{{ old('birth_month') }}"></select>
                                <span class="text-input">Mês</span>
                            </div>
                            <div class="form-date-item">
                                <select id="birth_year" name="birth_year" value="{{ old('birth_year') }} {{ $client->birth_year }}"></select>
                                <span class="text-input">Ano</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gênero</label>
                        <div>
                            <div class="radio-container">
                                <label for="gender-mas">
                                    <input type="radio" id="gender-mas" name="gender" value="M" @if ( $client->gender == 'M' ) checked @endif />
                                    <div class="custom-radio">
                                        <span></span>
                                    </div>
                                    <span>Masculino</span>
                                </label>
                            </div>

                            <div class="radio-container">
                                <label for="gender-fem">
                                    <input type="radio" id="gender-fem" name="gender" value="F" @if ( $client->gender == 'F' ) checked @endif />
                                    <div class="custom-radio">
                                        <span></span>
                                    </div>
                                    <span>Feminino</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <h3>Ip4y</h3>
            <fieldset>
                <div id="pag-thanks">
                    <div class="center-vertical">
                        <img class="logo-ip4y" src="{{ asset('images/logo-ip4y.jpg') }}" alt="">
                        <h2 class="padding-left-3"> Dados inseridos com sucesso!</h2>
                    </div>
                    <p class="desc">Banco virtual com as melhores taxas do mercado. Solicite agora mesmo o seu cartão.</p>
                    <div class="fieldset-content">
                        <div class="choose-bank">

                            <div class="form-radio-flex">

                                <div class="form-radio-item">
                                    <label for="bank_1"><img src="{{ asset('images/icon-master.png') }}"
                                            alt=""></label>
                                </div>
                                <div class="form-radio-item">
                                    <label for="bank_2"><img src="{{ asset('images/icon-visa.png') }}"
                                            alt=""></label>
                                </div>
                            </div>

                            <img  src="{{ asset('images/cartao.png') }}" height="500">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
@endsection

@once
    @push('scripts')
        <script>
            var birthClient = "<?=$client->birth_day;?>";
        </script>
    @endpush
@endonce
