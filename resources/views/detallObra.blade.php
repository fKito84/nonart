@extends('master')
@section('title', 'Noia Elegant')

@section('content')
<div class="flex flex-col lg:flex-row gap-16 items-start">
    <div class="w-full lg:w-3/5">
        <div class="bg-[#282119] rounded-3xl h-[400px] md:h-[600px] flex items-center justify-center">
            <span class="text-[#a0937f]">IMATGE OBRA</span>
        </div>
        <a href="{{ route('tenda') }}" class="inline-block mt-8 text-xs text-[#a0937f] uppercase tracking-widest">← Tornar a obres</a>
    </div>

    <div class="w-full lg:w-2/5 space-y-10">
        <div>
            <span class="text-[#c9973a] text-xs uppercase tracking-widest">Galeria</span>
            <h1 class="text-5xl mt-2 mb-6 uppercase">Noia Elegant</h1>
        </div>

        <div class="grid grid-cols-2 gap-8 border-y border-[#3d352b] py-8">
            <div>
                <span class="block text-[10px] text-[#a0937f] uppercase mb-1">Colecció</span>
                <p class="text-sm uppercase">Vides</p>
            </div>
            <div>
                <span class="block text-[10px] text-[#a0937f] uppercase mb-1">Artista</span>
                <p class="text-sm uppercase leading-tight">Ainoa Sillero Bernaldez</p>
            </div>
            <div>
                <span class="block text-[10px] text-[#a0937f] uppercase mb-1">Preu</span>
                <p class="text-xl text-[#c9973a]">125€</p>
            </div>
            <div>
                <span class="block text-[10px] text-[#a0937f] uppercase mb-1">Estat</span>
                <p class="text-sm text-[#00c950]">• Disponible</p>
            </div>
        </div>

        <div>
            <h3 class="text-sm uppercase mb-4 tracking-widest">Descripció</h3>
            <p class="text-[#a0937f] text-sm leading-relaxed">
                Una pintura acrilica que captura l'essència i el misteri d'una noia elegant en plena primavera.
            </p>
        </div>

        <button class="w-full py-5 bg-[#c9973a] text-[#1e1914] rounded-xl text-sm uppercase tracking-[3px]">
            Afegir al carret
        </button>
    </div>
</div>
@endsection