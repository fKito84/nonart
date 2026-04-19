@extends('master')
@section('title', 'Obres d\'art')

@section('content')
<div class="space-y-20">
    <div class="text-center">
        <span class="text-[#c9973a] text-xs uppercase tracking-[3px]">Col·lecció Completa</span>
        <h1 class="text-4xl mt-4 uppercase tracking-tighter">Obres d'art</h1>
    </div>

    <section>
        <h2 class="text-[#c9973a] text-lg uppercase tracking-widest mb-10 border-b border-[#3d352b] pb-4">Vides</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-[#282119] p-4 rounded-xl border border-[#3d352b]">
                <div class="h-48 bg-[#332b22] rounded-lg mb-4"></div>
                <div class="flex justify-between items-center mb-1">
                    <h3 class="text-sm">Paisatge de tardor</h3>
                    <span class="text-[#fb2c36] text-[10px]">Venut</span>
                </div>
                <p class="text-[#a0937f] text-[10px] mb-4">Ainoa Sillero</p>
                <a href="#" class="block text-center py-2 border border-[#3d352b] text-[10px] uppercase text-[#a0937f]">Veure Detall</a>
            </div>
            <div class="bg-[#282119] p-4 rounded-xl border border-[#3d352b]">
                <div class="h-48 bg-[#332b22] rounded-lg mb-4"></div>
                <div class="flex justify-between items-center mb-1">
                    <h3 class="text-sm">Noia desconeguda</h3>
                    <span class="text-[#00c950] text-[10px]">• Disponible</span>
                </div>
                <p class="text-[#a0937f] text-[10px] mb-4">Ainoa Sillero</p>
                <a href="#" class="block text-center py-2 border border-[#3d352b] text-[10px] uppercase text-[#a0937f]">Veure Detall</a>
            </div>
            </div>
    </section>

    <section>
        <h2 class="text-[#c9973a] text-lg uppercase tracking-widest mb-10 border-b border-[#3d352b] pb-4">EPIDERMIS</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-[#282119] p-4 rounded-xl border border-[#3d352b]">
                <div class="h-48 bg-[#332b22] rounded-lg mb-4"></div>
                <h3 class="text-sm mb-1">Pell Descoberta</h3>
                <p class="text-[#a0937f] text-[10px] mb-4">Ainoa Sillero</p>
                <div class="flex justify-between items-center text-[10px]">
                    <span class="text-[#c9973a]">125€</span>
                    <span class="text-[#00c950]">• Disponible</span>
                </div>
            </div>
            </div>
    </section>
</div>
@endsection