<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('site/css/site.css') }}">
    <link rel="stylesheet" href="js/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="js/slick-1.8.1/slick/slick-theme.css" />


    <title>@yield('title')</title>
</head>

<body>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick-1.8.1/slick/slick.min.js"></script>

    @include('layouts.site.header')
    @yield('conteudo')
    @include('layouts.site.footer')


    {{-- Filtro --}}
    <script>
        const busca = document.getElementById("barrapesquisa");
        busca.addEventListener("keyup", function(e) {
            const produto = document.getElementsByClassName("name-produtos");
            for (i = 0; i < produto.length; i++) {
                if (produto[i].innerHTML.toLowerCase().includes(busca.value.toLowerCase())) {
                    produto[i].parentElement.style.display = "";
                } else {
                    produto[i].parentElement.style.display = "none";
                }
            }
        })
    </script>
</body>

</html>
