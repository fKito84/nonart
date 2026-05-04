@extends('master')
@section('title', 'El Meu Compte')

@section('content')
<div class="space-y-12 md:space-y-16 pb-12 px-4 md:px-0">
    
    <!-- Capçalera de la pàgina -->
    <div class="text-center mt-8 md:mt-0">
        <span class="text-[#c9973a] text-[24px] md:text-[40px] uppercase tracking-[3px]">
            Compte Personal
        </span>
        <h1 class="text-3xl md:text-5xl mt-2 mb-8 md:mb-10">Usuari</h1>
    </div>

    <!-- Caixa de dades personals de l'usuari -->
    <div class="max-w-4xl mx-auto w-full md:w-[70%] lg:w-[60%]">
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 shadow-xl">
            <h2 class="text-2xl md:text-4xl text-[#c9973a] mb-6 md:mb-8 border-b border-[#3d352b] 
                       pb-4 uppercase text-center tracking-widest">
                Dades Personals
            </h2>
            
            <ul class="flex flex-col space-y-6 md:space-y-8 items-center text-center">
                <li class="w-full">
                    <span class="block text-[16px] md:text-[20px] text-[#a0937f] uppercase 
                                 tracking-[2px] md:tracking-[3px] mb-1 md:mb-2">Nom :</span>
                    <span class="text-xl md:text-2xl text-[#f2ede6] tracking-[1px] font-light">
                        {{ $usuario->name }}
                    </span>
                </li>
                <li class="w-full overflow-hidden">
                    <span class="block text-[16px] md:text-[20px] text-[#a0937f] uppercase 
                                 tracking-[2px] md:tracking-[3px] mb-1 md:mb-2">Email :</span>
                   
                    <span class="text-lg md:text-xl text-[#f2ede6] tracking-[1px] font-light break-all">
                        {{ $usuario->email }}
                    </span>
                </li>
                <li class="w-full">
                    <span class="block text-[16px] md:text-[20px] text-[#a0937f] uppercase 
                                 tracking-[2px] md:tracking-[3px] mb-1 md:mb-2">Rol :</span>
                    <span class="text-lg md:text-xl text-[#c9973a] tracking-[1px] font-light uppercase">
                        {{ $usuario->role }}
                    </span>
                </li>
                <li class="w-full">
                    <span class="block text-[16px] md:text-[20px] text-[#a0937f] uppercase 
                                 tracking-[2px] md:tracking-[3px] mb-1 md:mb-2">Telèfon :</span>
                    <span class="text-lg md:text-xl text-[#f2ede6] tracking-[1px] font-light">
                        {{ $usuario->phone ?? 'No has deixat informació' }}
                    </span>
                </li>
            </ul>  

            <!-- Botó de tancar sessió -->
            <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-[#3d352b] flex justify-center">
                <form method="POST" action="{{ route('logout') }}" class="w-full max-w-[250px] md:max-w-sm">
                    @csrf
                    <button type="submit" 
                            class="block w-full text-center py-3 md:py-4 border border-[#fb2c36] 
                                   text-[#fb2c36] rounded-xl text-xs md:text-sm uppercase tracking-widest 
                                   hover:bg-[#fb2c36] hover:text-white transition-colors">
                        Tancar Sessió
                    </button>
                </form>                       
            </div>
        </div>
    </div>

    <!-- Secció d'adquisicions i compres -->
    <div class="max-w-5xl mx-auto mt-16 md:mt-20">
        <h2 class="text-3xl md:text-5xl mb-8 md:mb-12 text-center border-b border-[#3d352b] 
                   pb-4 md:pb-6 uppercase tracking-widest leading-tight">
            Les meves adquisicions
        </h2>
        
        <div class="space-y-6 md:space-y-10">
            
            <!-- Bucle per les reserves de tallers -->
            @foreach($usuario->reserva_tallers as $reserva)
                <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-8 flex flex-col 
                            md:flex-row items-center md:items-start gap-6 md:gap-10 hover:border-[#c9973a] 
                            transition-all duration-300 text-center md:text-left">
                    
                    <div class="w-full md:w-56 h-48 md:h-56 flex-shrink-0 rounded-xl overflow-hidden bg-[#1e1914]">
                        <img src="{{ asset('images/talleres/llocTaller.png') }}" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex-grow pt-0 md:pt-2 w-full">
                        <div class="flex flex-col md:flex-row justify-between items-center md:items-start 
                                    gap-3 mb-4">
                            <span class="px-4 py-1 bg-[#332b22] text-[#c9973a] text-[10px] md:text-[12px] 
                                         uppercase tracking-widest rounded border border-[#c9973a]/30">
                                Taller
                            </span>
                            <div class="text-[#a0937f] text-xs md:text-sm">  
                                {{ \Carbon\Carbon::parse($reserva->data_taller)->format('d/m/Y') }}
                            </div>
                        </div>

                        <h3 class="text-2xl md:text-4xl text-[#f2ede6] mb-4">
                            {{ $reserva->taller?->nom ?? 'Taller descatalogat' }}
                        </h3>

                        <p class="text-[#00c950] text-sm md:text-lg flex items-center justify-center 
                                  md:justify-start gap-2 md:gap-3">
                            <span class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-[#00c950] 
                                         shadow-[0_0_10px_#00c950]"></span> 
                            Reserva confirmada ({{ $reserva->personas_reserva }} places)
                        </p>
                    </div>
                </div>
            @endforeach

            <!-- Bucle per les compres d'obres -->
            @foreach($usuario->compras as $venda)
                @foreach($venda->detalls as $detall)
                    @if($detall->tipus_article == 'obra')
                        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-8 flex flex-col 
                                    md:flex-row items-center md:items-start gap-6 md:gap-10 
                                    hover:border-[#c9973a] transition-all duration-300 text-center md:text-left">
                            
                            <div class="w-full md:w-56 h-48 md:h-56 flex-shrink-0 rounded-xl overflow-hidden 
                                        bg-[#1e1914]">
                                <img src="{{ asset($detall->obra->imagen) }}" 
                                     class="w-full h-full object-cover" 
                                     alt="{{ $detall->obra->titulo }}">
                            </div>
                            
                            <div class="flex-grow pt-0 md:pt-2 w-full">
                                <div class="flex flex-col md:flex-row justify-between items-center 
                                            md:items-start gap-3 mb-4">
                                    <span class="px-4 py-1 bg-[#332b22] text-[#f2ede6] text-[10px] 
                                                 md:text-[12px] uppercase tracking-widest rounded border 
                                                 border-[#3d352b]">
                                        Obra
                                    </span>
                                    <div class="text-[#a0937f] text-xs md:text-sm">
                                        {{ $venda->created_at->format('d/m/Y') }}
                                    </div>
                                </div>

                                <h3 class="text-2xl md:text-4xl text-[#f2ede6] mb-4">
                                    {{ $detall->obra?->titulo ?? 'Obra descatalogada' }}
                                </h3>

                                <p class="text-[#a0937f] text-sm md:text-lg flex items-center justify-center 
                                          md:justify-start gap-2 md:gap-3">
                                    <span class="w-2 md:w-3 h-2 md:h-3 rounded-full bg-[#a0937f]"></span> 
                                    Adquisició completada ({{ number_format($detall->preu_unitat, 2) }}€)
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach

            <!-- Missatge si no hi ha cap compra ni reserva -->
            @if($usuario->compras->isEmpty() && $usuario->reserva_tallers->isEmpty())
                <div class="text-center py-12 md:py-20 bg-[#282119] rounded-2xl border border-dashed 
                            border-[#3d352b] px-4">
                    <p class="text-[#a0937f] uppercase tracking-widest text-sm md:text-lg">
                        Encara no has realitzat cap compra
                    </p>
                    <a href="{{ route('obras.index') }}" 
                       class="inline-block mt-4 md:mt-6 text-[#c9973a] border-b border-[#c9973a] text-sm md:text-base">
                        Visitar la galeria
                    </a>
                </div>
            @endif

        </div>

        <!-- Botó final per anar a comprar -->
        <div class="mt-12 md:mt-16 text-center">
            <a href="/obras" 
               class="inline-block py-4 md:py-5 px-8 md:px-12 bg-[#c9973a] text-[#1e1914] rounded-xl 
                      text-sm md:text-[16px] font-bold uppercase tracking-[2px] md:tracking-[3px] 
                      hover:bg-[#e6ae42] transition-all shadow-xl">
                Nova Compra
            </a>
        </div>
    </div>
</div>
@endsection