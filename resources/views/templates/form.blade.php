<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="sandrovisk">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style-form.css') }}">
</head>

<body>

    <div class="main">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-mask/jquery-mask.js') }}"></script>
    <script src="{{ asset('libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('libs/minimalist-picker/dobpicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <script src="{{ asset('js/forms.js') }}"></script>
</body>

</html>