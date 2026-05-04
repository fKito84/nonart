@extends('master')
@section('title', 'Obres d\'art')

@section('content')
<div class="space-y-12 md:space-y-20">
    
    <!-- Títol de la pàgina -->
    <div class="text-center px-4">
        <span class="text-[#c9973a] text-[20px] md:text-[30px] uppercase tracking-[3px] md:tracking-[5px]">
            Col·lecció Completa
        </span>
        <h1 class="text-3xl md:text-4xl mt-4 tracking-[3px] md:tracking-[5px]">
            Obres d'art
        </h1>
    </div>

    <!-- Capçalera amb imatge del museu/exposició -->
    <section class="relative h-[300px] md:h-[600px] rounded-3xl overflow-hidden 
                    flex items-center justify-center text-center px-4 md:px-6 mx-4 md:mx-0">
        <img src="/images/exposiciones/museu_pell2.jpeg" alt="Fons Hero Nonart" 
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 rounded-3xl"></div>
    </section>

    <!-- Subtítol de l'artista -->
    <div class="text-center px-4">
        <span class="text-[#c9973a] text-[20px] md:text-[30px] uppercase tracking-[3px] md:tracking-[5px]">
            Ainoa Sillero Bernaldez
        </span>
        <h1 class="text-3xl md:text-4xl mt-4 uppercase tracking-tighter">Obres creades</h1>
        <br>
        <p class="text-[#f2ede6] text-xl md:text-[28px] leading-relaxed [-webkit-text-stroke:0.6px_black]">
            Endinsa't en la meva col·lecció d'art.
        </p>
    </div>

    <!-- Contenidor principal de les col·leccions -->
    <div class="container mx-auto py-10 md:py-20 px-4 md:px-0">
        @foreach($obrasAgrupadas as $nombreColeccion => $obras)
            
            <!-- Secció per cada col·lecció agrupada -->
            <section class="mb-32 md:mb-52"> 
                
                <!-- Títol de la col·lecció -->
                <div class="text-center mb-16 md:mb-24">
                    <span class="text-[#a0937f] text-[24px] md:text-[35px] uppercase tracking-[0.3em] 
                                 md:tracking-[0.5em] block mb-3">
                        COL·LECCIÓ
                    </span>
                    <h2 class="text-[#c9973a] text-3xl md:text-5xl uppercase tracking-[0.15em] 
                               md:tracking-[0.25em] border-b border-[#3d352b] pb-6 md:pb-10 
                               inline-block px-4 md:px-24">
                        {{ $nombreColeccion }}
                    </h2>
                </div>

                <!-- Llistat de les obres d'aquesta col·lecció -->
                <div class="flex flex-col items-center gap-24 md:gap-52">
                    @foreach($obras as $obra)
                        
                        <!-- Targeta de l'obra -->
                        <div class="w-full md:w-[65%] lg:w-[55%] bg-[#282119] py-10 md:py-16 px-6 
                                    md:px-16 rounded-[24px] md:rounded-[32px] border border-[#3d352b] 
                                    shadow-[0_20px_40px_-15px_rgba(0,0,0,0.5)] md:shadow-[0_40px_80px_-15px_rgba(0,0,0,0.5)] 
                                    transition-all duration-700 hover:border-[#c9973a]/40">
                            
                            <!-- Imatge de l'obra -->
                            <div class="w-full h-64 md:h-[500px] object-cover object-top bg-[#332b22] 
                                        rounded-xl mb-8 md:mb-12 shadow-xl overflow-hidden">
                                @if($obra->imagen)
                                    <img src="{{ $obra->imagen }}" alt="{{ $obra->titulo }}" 
                                         class="w-full h-full object-cover transition-transform 
                                                duration-1000 hover:scale-105">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-[#3d352b] text-xs uppercase tracking-widest italic">
                                            Sense Imatge
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Dades i botó de l'obra -->
                            <div class="text-center max-w-xl mx-auto">
                                <h3 class="text-2xl md:text-4xl font-light mb-3 uppercase 
                                           tracking-[0.12em] text-white">
                                    {{ $obra->titulo }}
                                </h3>
                                
                                <p class="text-[#a0937f] text-sm md:text-lg mb-6 md:mb-8 
                                          italic tracking-wide">
                                    Ainoa Sillero
                                </p>

                                <div class="flex flex-col items-center gap-6">
                                    <!-- Preu i Disponibilitat -->
                                    <div class="flex flex-col md:flex-row items-center gap-3 md:gap-10">
                                        <span class="text-[#c9973a] text-2xl md:text-3xl font-light">
                                            {{ number_format($obra->precio, 0, ',', '.') }}€
                                        </span>

                                        @if($obra->disponible)
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-2 h-2 bg-[#00c950] rounded-full 
                                                             shadow-[0_0_8px_#00c950]"></span>
                                                <span class="text-[#00c950] text-[10px] md:text-xs 
                                                             uppercase tracking-[0.25em]">
                                                    Disponible
                                                </span>
                                            </div>
                                        @else
                                            <span class="text-[#fb2c36] text-[10px] md:text-xs 
                                                         uppercase tracking-[0.25em] border 
                                                         border-[#fb2c36]/30 px-3 py-1 rounded">
                                                Venut
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Botó de compra/detall -->
                                    <a href="/obras/{{$obra->id}}" 
                                       class="mt-4 md:mt-6 px-8 md:px-12 py-3 md:py-4 border border-[#3d352b] 
                                              text-[#a0937f] text-[10px] md:text-xs uppercase 
                                              tracking-[0.2em] md:tracking-[0.35em] hover:bg-[#c9973a] 
                                              hover:text-black hover:border-[#c9973a] transition-all 
                                              duration-500 rounded-full w-full md:w-auto">
                                        Veure Detall
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>
</div>
@endsection