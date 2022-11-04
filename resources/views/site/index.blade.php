@extends('layouts.site.site')

@section('title')
    Wediloo
@endsection

@section('conteudo')

    <div class="slider" style="width: 100%">
        <div class="slider-conteudo">
            <div><img class="image-slider" src="site/img/banner1.png" alt=""></div>
            <div><img class="image-slider" src="site/img/banner2.png" alt=""></div>
            <div><img class="image-slider" src="site/img/banner3.png" alt=""></div>
        </div>
    </div>

    <div id="card-produto-site">
        @isset($produtos)
            @foreach ($produtos as $produto)
                <div class="card-produto-conteudo">

                    @if ($produto->image)
                        <img class="image-produto"src="/storage/{{ $produto->image }}">
                    @else
                        <img class="image-produto" src="{{ asset('site/img/banner1.png') }}">
                    @endif
                    <h2 class="name-produtos" id="name-produto">{{ $produto->name }} </h2>
                    <p class="description-produto">{{ $produto->description }}</p>
                    <p class="categoria-produto">{{ $produto->categoria->name }} </p>
                    <span class="price-produto"> R${{ $produto->price }}</span>
                    @if ($produto->quantity)
                        <p class="quantity-produto"> Estoque: {{ $produto->quantity }} </p>
                    @else
                        <p class="quantity-produto"> Sem estoque </p>
                    @endif

                </div>
            @endforeach
        @endisset
    </div>
    <script>
        $('.slider-conteudo').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            adaptiveHeight: true
        });
    </script>
@endsection
