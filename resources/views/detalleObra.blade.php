@extends('master')
@section('title', 'Detalle Obra')

@section('content')
<div class="flex flex-col lg:flex-row gap-24 items-start ">
    <div class="w-full lg:w-3/5">
        <div class="bg-[#282119] rounded-3xl h-[400px] md:h-[600px] flex items-center justify-center">
             <img src="{{ $obra->imagen }}" 
                alt="{{ $obra->titulo }}" 
                class="w-full h-full object-cover rounded-3xl  transition-transform duration-2000 hover:scale-105">
        </div>
        <a href="/obras" class="inline-block mt-8 text-[18px]  text-[#a0937f] uppercase tracking-widest">← Tornar a obres</a>
    </div>

    <div class="w-full lg:w-2/5 space-y-10">
        <div>
            <span class="text-[#c9973a] text-[18px] uppercase tracking-widest">Galeria</span>
            <h1 class="text-5xl mt-2 mb-6 uppercase">{{ $obra->titulo }}</h1>
        </div>

        <div class="grid grid-cols-2 gap-8 border-y border-[#3d352b] py-8">
            <div>
                <span class="block text-[18px] text-[#a0937f] uppercase mb-1">Colecció</span>
                <p class="text-sm uppercase">{{ $obra->coleccion }}</p>
            </div>
            <div>
                <span class="block text-[18px] text-[#a0937f] uppercase mb-1">Artista</span>
                <p class="text-sm uppercase leading-tight">Ainoa Sillero Bernaldez</p>
            </div>
            <div>
                <span class="block text-[18px] text-[#a0937f] uppercase mb-1">Preu</span>
                <p class="text-xl text-[#c9973a]">{{ number_format($obra->precio, 0, ',', '.') }}€</p>
            </div>
             @if($obra->disponible)
                <div class="flex items-center gap-2.5">
                    <span class="w-2 h-2 bg-[#00c950] rounded-full shadow-[0_0_8px_#00c950]"></span>
                    <span class="text-[#00c950] text-[10px] md:text-xs uppercase tracking-[0.25em]">Disponible</span>
                </div>
            @else
                <span class="text-[#fb2c36] text-[10px] md:text-xs uppercase tracking-[0.25em] border border-[#fb2c36]/30 px-3 py-1">Venut</span>
            @endif
        </div>

        <div>
            <h3 class="text-[18px]  uppercase mb-4 tracking-widest">Descripció</h3>
            <p class="text-[#a0937f] text-[18px] leading-relaxed">
               {{ $obra->descripcion }}
            </p>
        </div>
        <!-- gfag gestio dels botons del estat en el que estem
         tant si estem loguejats o si ja esta al carret , per no poder agafar-la 
         dos vegades --> 
       @php
            // Comprobamos si la obra ya está en el carrito
            $carrito = session()->get('carrito', []);
            $enCarrito = isset($carrito['obra_' . $obra->id]);
        @endphp

        @if($obra->disponible)
            @if($enCarrito)
                <a href="{{ route('carrito.index') }}" class="block text-center w-full py-5 bg-[#00c950]/10 border border-[#00c950] text-[#00c950] rounded-xl text-[14px] uppercase tracking-[3px] hover:bg-[#00c950] hover:text-white transition-all shadow-lg">
                    ✓ Ja és al carret (Veure)
                </a>
            @else
                <form action="{{ route('carrito.store') }}" method="POST">
                    @csrf 
                    <input type="hidden" name="obra_id" value="{{ $obra->id }}">
                    
                    @auth
                        <button type="submit" class="w-full py-5 bg-[#c9973a] text-[#1e1914] rounded-xl text-[14px] uppercase tracking-[3px] hover:bg-[#e6ae42] transition-colors shadow-lg hover:-translate-y-1 transform duration-300">
                            Afegir al carret
                        </button>
                    @endauth
                    
                    @guest
                        <a href="/login" class="block text-center w-full py-5 bg-[#3d352b] text-[#c9973a] rounded-xl text-[14px] uppercase tracking-[3px] hover:bg-[#1e1914] border border-[#3d352b] transition-colors shadow-lg">
                            Inicia sessió per comprar
                        </a>
                    @endguest
                </form>
            @endif
        @else
            <button disabled class="w-full py-5 bg-[#3d352b] text-[#a0937f] rounded-xl text-[14px] uppercase tracking-[3px] cursor-not-allowed opacity-70 border border-[#3d352b]">
                Obra no disponible
            </button>
        @endif
       
    </div>
</div>
@endsection