@extends('master')
@section('title', 'El Meu Compte')

@section('content')
<div class="space-y-16 pb-12">
    
    <div class="text-center">
        <span class="text-[#c9973a] text-[40px] uppercase tracking-[3px]">Compte Personal</span>
        <h1 class="text-4xl md:text-5xl mt-2 mb-10">Usuari</h1>
    </div>

    <div class="max-w-4xl mx-auto w-[60%]">
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-10 shadow-xl">
            <h2 class="text-4xl text-[#c9973a] mb-8 border-b border-[#3d352b] pb-4 uppercase text-center tracking-widest">
                Dades Personals
            </h2>
            
            <ul class="flex flex-col space-y-8 items-center text-center">
                <li>
                    <span class="block text-[20px] text-[#a0937f] uppercase tracking-[3px] mb-2 ">Nom : </span>
                    <span class="text-2xl text-[#f2ede6] tracking-[1px] font-light">{{ $usuario->name }} </span>
                </li>
                <li>
                    <span class="block text-[20px] text-[#a0937f] uppercase tracking-[3px] mb-2">Email : </span>
                    <span class="text-xl text-[#f2ede6] tracking-[1px] font-light">{{ $usuario->email }}</span>
                </li>
                <li>
                    <span class="block text-[20px] text-[#a0937f] uppercase tracking-[3px] mb-2">Rol : </span>
                    <span class="text-xl text-[#c9973a] tracking-[1px] font-light">{{ $usuario->role }}</span>
                </li>
                <li>
                    <span class="block text-[20px] text-[#a0937f] uppercase tracking-[3px] mb-2">Telèfon : </span>
                    <span class="text-xl text-[#f2ede6] tracking-[1px] font-light">
                            {{ $usuario->phone ?? 'No has deixat informació' }}</span>
                </li>
            </ul>  

            <div class="mt-12 pt-8 border-t border-[#3d352b] flex justify-center">
                <form method="POST" action="{{ route('logout') }}" class="w-full max-w-sm">
                    @csrf
                    <button type="submit" class="block w-full text-center py-4 border border-[#fb2c36] text-[#fb2c36]
                         rounded-xl text-sm uppercase tracking-widest hover:bg-[#fb2c36] hover:text-white transition-colors">
                        Tancar Sessió
                    </button>
                </form>                       
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto mt-20 px-4">
        <h2 class="text-4xl md:text-5xl mb-12 text-center border-b border-[#3d352b] pb-6 
                uppercase tracking-widest">Les meves adquisicions</h2>
        
        <div class="space-y-10">
            @foreach($usuario->reserva_tallers as $reserva)
                <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8 flex flex-col md:flex-row
                         items-center md:items-start gap-10 hover:border-[#c9973a] transition-all duration-300">
                    <div class="w-full md:w-56 h-56 flex-shrink-0 rounded-xl overflow-hidden bg-[#1e1914]">
                        <img src="{{ asset('images/talleres/llocTaller.png') }}" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex-grow pt-2">
                        <div class="flex justify-between items-start mb-4">
                            <span class="px-4 py-1 bg-[#332b22] text-[#c9973a] text-[12px]
                                 uppercase tracking-widest rounded border border-[#c9973a]/30">Taller</span>
                            <div class="text-[#a0937f] text-sm">  
                                {{ \Carbon\Carbon::parse($reserva->data_taller)->format('d/m/Y') }}
                            </div>
                        </div>

                        <h3 class="text-4xl text-[#f2ede6] mb-4">{{ $reserva->taller->nom }}</h3>

                        <p class="text-[#00c950] text-lg flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full bg-[#00c950] shadow-[0_0_10px_#00c950]"></span> 
                            Reserva confirmada ({{ $reserva->personas_reserva }} places)
                        </p>
                    </div>
                </div>
                @endforeach

                @foreach($usuario->compras as $venda)
                    @foreach($venda->detalls as $detall)
                        {{-- Solo mostramos este bloque si el artículo es una obra --}}
                        @if($detall->tipus_article == 'obra')
                            <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8 flex flex-col md:flex-row 
                                            items-center md:items-start gap-10 hover:border-[#c9973a] transition-all duration-300">
                                <div class="w-full md:w-56 h-56 flex-shrink-0 rounded-xl overflow-hidden bg-[#1e1914]">
                                    <img src="{{ asset($detall->obra->imagen) }}" 
                                        class="w-full h-full object-cover" 
                                        alt="{{ $detall->obra->titulo }}">
                                </div>
                                
                                <div class="flex-grow pt-2">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="px-4 py-1 bg-[#332b22] text-[#f2ede6] text-[12px] uppercase 
                                                    tracking-widest rounded border border-[#3d352b]">Obra</span>

                                        <div class="text-[#a0937f] text-sm">{{ $venda->created_at->format('d/m/Y') }}</div>
                                    </div>

                                    <h3 class="text-4xl text-[#f2ede6] mb-4">{{ $detall->obra->titulo }}</h3>

                                    <p class="text-[#a0937f] text-lg flex items-center gap-3">
                                        <span class="w-3 h-3 rounded-full bg-[#a0937f]"></span> 
                                        Adquisició completada ({{ number_format($detall->preu_unitat, 2) }}€)
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach

            @if($usuario->compras->isEmpty() && $usuario->reserva_tallers->isEmpty())
                <div class="text-center py-20 bg-[#282119] rounded-2xl border border-dashed border-[#3d352b]">
                    <p class="text-[#a0937f] uppercase tracking-widest text-lg">Encara no has realitzat cap compra</p>
                    <a href="{{ route('obras.index') }}" class="inline-block mt-6 text-[#c9973a] border-b border-[#c9973a]">Visitar la galeria</a>
                </div>
            @endif

        </div>

        <div class="mt-16 text-center">
            <a href="/obras" class="inline-block py-5 px-12 bg-[#c9973a] text-[#1e1914]
                     rounded-xl text-[16px] font-bold uppercase tracking-[3px]
                      hover:bg-[#e6ae42] transition-all shadow-xl">
                Nova Compra
            </a>
        </div>
    </div>
</div>
@endsection