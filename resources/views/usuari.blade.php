@extends('master')
@section('title', 'El Meu Compte')

@section('content')
<div class="space-y-12">
    <div class="text-center lg:text-left">
        <span class="text-[#c9973a] text-xs uppercase tracking-[3px]">Compte Personal</span>
        <h1 class="text-4xl md:text-5xl mt-2 mb-10">Usuari</h1>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
        
        <div class="w-full lg:w-1/3">
            <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8">
                <h2 class="text-xl text-[#c9973a] mb-8 border-b border-[#3d352b] pb-4 uppercase">Dades Personals</h2>
                
                <ul class="space-y-6">
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Nom:</span>
                        <span class="text-lg">Fransisco</span>
                    </li>
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Cognom:</span>
                        <span class="text-lg">Muñoz</span>
                    </li>
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Any Naixement:</span>
                        <span class="text-lg">1984</span>
                    </li>
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Localitat:</span>
                        <span class="text-lg">Igualada</span>
                    </li>
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Província:</span>
                        <span class="text-lg">Barcelona</span>
                    </li>
                    <li>
                        <span class="block text-[10px] text-[#a0937f] uppercase tracking-widest mb-1">Direcció:</span>
                        <span class="text-lg">Carrer Gran 123, 4t 2a</span>
                    </li>
                </ul>

                <div class="mt-12 pt-6 border-t border-[#3d352b]">
                    <a href="{{ route('home') }}" class="block w-full text-center py-4 border border-[#fb2c36] text-[#fb2c36] rounded-lg text-xs uppercase tracking-widest hover:bg-[#fb2c36] hover:text-white transition-colors">
                        Tancar Sessió
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-2/3">
            <h2 class="text-2xl mb-8 uppercase text-center lg:text-left">Compres</h2>
            
            <div class="space-y-6">
                <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <span class="inline-block px-3 py-1 bg-[#332b22] text-[#c9973a] text-[10px] uppercase rounded mb-3 border border-[#3d352b]">Taller</span>
                        <div class="text-[#a0937f] text-xs mb-1">12/12/2025</div>
                        <h3 class="text-xl mb-1">Art and Wine</h3>
                        <p class="text-[#00c950] text-sm flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#00c950]"></span> Assistència confirmada.
                        </p>
                    </div>
                    <button class="px-6 py-3 border border-[#3d352b] text-[#a0937f] rounded-lg text-xs uppercase tracking-widest hover:text-[#f2ede6] hover:border-[#f2ede6] transition-colors w-full md:w-auto">
                        Veure Detall
                    </button>
                </div>

                <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <span class="inline-block px-3 py-1 bg-[#332b22] text-[#f2ede6] text-[10px] uppercase rounded mb-3 border border-[#3d352b]">Obra</span>
                        <div class="text-[#a0937f] text-xs mb-1">1/04/2026</div>
                        <h3 class="text-xl mb-1">Les nenes jugant</h3>
                        <p class="text-[#a0937f] text-sm flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#a0937f]"></span> Lliurament completat.
                        </p>
                    </div>
                    <button class="px-6 py-3 border border-[#3d352b] text-[#a0937f] rounded-lg text-xs uppercase tracking-widest hover:text-[#f2ede6] hover:border-[#f2ede6] transition-colors w-full md:w-auto">
                        Veure Detall
                    </button>
                </div>
            </div>

            <div class="mt-8 text-center lg:text-left">
                <a href="{{ route('tenda') }}" class="inline-block py-4 px-10 bg-[#c9973a] text-[#1e1914] rounded-lg text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                    Nova Compra
                </a>
            </div>
        </div>

    </div>
</div>
@endsection