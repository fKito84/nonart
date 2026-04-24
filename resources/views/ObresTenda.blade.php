@extends('master')
@section('title', 'Obres d\'art')

@section('content')
<div class="space-y-20">
    <div class="text-center">
        <span class="text-[#c9973a] text-[30px] uppercase tracking-[5px]">Col·lecció Completa</span>
        <h1 class="text-4xl mt-4  tracking-[5px]">Obres d'art</h1>
    </div>
    <section class="relative h-[400px] md:h-[600px] rounded-3xl overflow-hidden flex items-center justify-center text-center px-6">
        <img src="/images/exposiciones/museu_pell2.jpeg" 
            alt="Fons Hero Nonart" 
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-black/40 rounded-3xl  "></div>
    </section>
    <div class="text-center">
        <span class="text-[#c9973a] text-[30px] uppercase tracking-[5px]">Ainoa Sillero Bernaldez</span>
        <h1 class="text-4xl mt-4 uppercase tracking-tighter">Obres creades</h1>
        </br>
        <p class="text-[#f2ede6] text-[28px] leading-relaxed [-webkit-text-stroke:0.6px_black]">
            Endinsat en la meva col.lecció d'art.
        </p>
    </div>

    <div class="container mx-auto py-20">
        @foreach($obrasAgrupadas as $nombreColeccion => $obras)
            <section class="mb-52"> <div class="text-center mb-24">
                    <span class="text-[#a0937f] text-[35px] uppercase tracking-[0.5em] block mb-3">COLECCIÓ</span>
                    <h2 class="text-[#c9973a] text-4xl md:text-5xl uppercase tracking-[0.25em] border-b border-[#3d352b] pb-10 inline-block px-10 md:px-24">
                        {{ $nombreColeccion }}
                    </h2>
                </div>

                <div class="flex flex-col items-center gap-52">
                    @foreach($obras as $obra)
                        <div class="w-[95%] md:w-[55%] bg-[#282119] py-16 px-8 md:px-16 rounded-[32px] border border-[#3d352b] shadow-[0_40px_80px_-15px_rgba(0,0,0,0.5)] transition-all duration-700 hover:border-[#c9973a]/40">
                            
                            <div class="w-full h-full object-cover object-top bg-[#332b22] rounded-xl mb-12 shadow-xl">
                                @if($obra->imagen)
                                    <img src="{{ $obra->imagen }}" 
                                        alt="{{ $obra->titulo }}" 
                                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-105">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-[#3d352b] text-xs uppercase tracking-widest italic">Sense Imatge</span>
                                    </div>
                                @endif
                            </div>

                            <div class="text-center max-w-xl mx-auto">
                                <h3 class="text-2xl md:text-4xl font-light mb-3 uppercase tracking-[0.12em] text-white">
                                    {{ $obra->titulo }}
                                </h3>
                                
                                <p class="text-[#a0937f] text-base md:text-lg mb-8 italic tracking-wide">
                                    Ainoa Sillero
                                </p>

                                <div class="flex flex-col items-center gap-6">
                                    <div class="flex flex-col md:flex-row items-center gap-4 md:gap-10">
                                        <span class="text-[#c9973a] text-2xl md:text-3xl font-light">
                                            {{ number_format($obra->precio, 0, ',', '.') }}€
                                        </span>

                                        @if($obra->disponible)
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-2 h-2 bg-[#00c950] rounded-full shadow-[0_0_8px_#00c950]"></span>
                                                <span class="text-[#00c950] text-[10px] md:text-xs uppercase tracking-[0.25em]">Disponible</span>
                                            </div>
                                        @else
                                            <span class="text-[#fb2c36] text-[10px] md:text-xs uppercase tracking-[0.25em] border border-[#fb2c36]/30 px-3 py-1">Venut</span>
                                        @endif
                                    </div>

                                    <a href="/obras/{{$obra->id}}" 
                                    class="mt-6 px-12 py-4 border border-[#3d352b] text-[#a0937f] text-xs uppercase tracking-[0.35em] hover:bg-[#c9973a] hover:text-black hover:border-[#c9973a] transition-all duration-500 rounded-full">
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