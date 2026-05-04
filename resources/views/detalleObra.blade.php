@extends('master')
@section('title', 'Detalle Obra')

@section('content')

<div class="flex flex-col lg:flex-row gap-12 lg:gap-24 items-start px-4 md:px-0">
    
    <!-- Columna 1: Imatge de l'obra -->
    <div class="w-full lg:w-3/5">
        <div class="bg-[#282119] rounded-3xl h-[350px] md:h-[600px] flex items-center justify-center 
                    overflow-hidden shadow-2xl">
             <img src="{{ $obra->imagen }}" alt="{{ $obra->titulo }}" 
                  class="w-full h-full object-cover rounded-3xl transition-transform duration-1000 
                         hover:scale-105">
        </div>
        
        <!-- Enllaç per tornar enrere -->
        <a href="/obras" 
           class="inline-block mt-6 md:mt-8 text-sm md:text-[18px] text-[#a0937f] uppercase 
                  tracking-widest hover:text-[#c9973a] transition-colors">
            ← Tornar a obres
        </a>
    </div>

    <!-- Columna 2: Detalls, preu i botons -->
    <div class="w-full lg:w-2/5 space-y-8 md:space-y-10">
        
        <!-- Títol principal -->
        <div>
            <span class="text-[#c9973a] text-sm md:text-[18px] uppercase tracking-widest">
                Galeria
            </span>
            <h1 class="text-3xl md:text-5xl mt-2 mb-4 md:mb-6 uppercase">
                {{ $obra->titulo }}
            </h1>
        </div>

        <!-- Graella d'informació tècnica -->
        <div class="grid grid-cols-2 gap-6 md:gap-8 border-y border-[#3d352b] py-6 md:py-8">
            <div>
                <span class="block text-sm md:text-[18px] text-[#a0937f] uppercase mb-1">Col·lecció</span>
                <p class="text-xs md:text-sm uppercase">{{ $obra->coleccion }}</p>
            </div>
            
            <div>
                <span class="block text-sm md:text-[18px] text-[#a0937f] uppercase mb-1">Artista</span>
                <p class="text-xs md:text-sm uppercase leading-tight">Ainoa Sillero Bernaldez</p>
            </div>
            
            <div>
                <span class="block text-sm md:text-[18px] text-[#a0937f] uppercase mb-1">Preu</span>
                <p class="text-lg md:text-xl text-[#c9973a]">
                    {{ number_format($obra->precio, 0, ',', '.') }}€
                </p>
            </div>
            
            <!-- Etiqueta de disponibilitat -->
            <div class="flex items-center">
                @if($obra->disponible)
                    <div class="flex items-center gap-2.5">
                        <span class="w-2 h-2 bg-[#00c950] rounded-full shadow-[0_0_8px_#00c950]"></span>
                        <span class="text-[#00c950] text-[10px] md:text-xs uppercase tracking-[0.25em]">
                            Disponible
                        </span>
                    </div>
                @else
                    <span class="text-[#fb2c36] text-[10px] md:text-xs uppercase tracking-[0.25em] 
                                 border border-[#fb2c36]/30 px-3 py-1 rounded">
                        Venut
                    </span>
                @endif
            </div>
        </div>

        <!-- Descripció de l'obra -->
        <div>
            <h3 class="text-sm md:text-[18px] uppercase mb-3 md:mb-4 tracking-widest">Descripció</h3>
            <p class="text-[#a0937f] text-base md:text-[18px] leading-relaxed">
               {{ $obra->descripcion }}
            </p>
        </div>

        <!-- Gestió de Comprar / Al carret / Venut --> 
        @php
            // Comprovem si l'obra ja és al carret per no duplicar
            $carrito = session()->get('carrito', []);
            $enCarrito = isset($carrito['obra_' . $obra->id]);
        @endphp

        <div class="pt-4">
            @if($obra->disponible)
                @if($enCarrito)
                    <a href="{{ route('carrito.index') }}" 
                       class="block text-center w-full py-4 md:py-5 bg-[#00c950]/10 border 
                              border-[#00c950] text-[#00c950] rounded-xl text-[12px] md:text-[14px] 
                              uppercase tracking-[2px] md:tracking-[3px] hover:bg-[#00c950] 
                              hover:text-white transition-all shadow-lg">
                        ✓ Ja és al carret (Veure)
                    </a>
                @else
                    <form action="{{ route('carrito.store') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="obra_id" value="{{ $obra->id }}">
                        
                        @auth
                            <button type="submit" 
                                    class="w-full py-4 md:py-5 bg-[#c9973a] text-[#1e1914] rounded-xl 
                                           text-[12px] md:text-[14px] uppercase tracking-[2px] 
                                           md:tracking-[3px] font-bold hover:bg-[#e6ae42] transition-colors 
                                           shadow-lg hover:-translate-y-1 transform duration-300">
                                Afegir al carret
                            </button>
                        @endauth
                        
                        @guest
                            <a href="/login" 
                               class="block text-center w-full py-4 md:py-5 bg-[#3d352b] text-[#c9973a] 
                                      rounded-xl text-[12px] md:text-[14px] uppercase tracking-[2px] 
                                      md:tracking-[3px] hover:bg-[#1e1914] border border-[#3d352b] 
                                      transition-colors shadow-lg">
                                Inicia sessió per comprar
                            </a>
                        @endguest
                    </form>
                @endif
            @else
                <button disabled 
                        class="w-full py-4 md:py-5 bg-[#3d352b] text-[#a0937f] rounded-xl text-[12px] 
                               md:text-[14px] uppercase tracking-[2px] md:tracking-[3px] cursor-not-allowed 
                               opacity-70 border border-[#3d352b]">
                    Obra no disponible
                </button>
            @endif
        </div>
       
    </div>
</div>
@endsection