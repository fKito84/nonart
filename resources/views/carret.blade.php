@extends('master')
@section('title', 'Carret de la Compra')

@section('content')
<div class="space-y-12">
    <div>
        <span class="text-[#c9973a] text-xs uppercase tracking-[3px]">Finalitza Compra</span>
        <h1 class="text-4xl md:text-5xl mt-2 mb-10">Resum Compra</h1>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
        
        <div class="w-full lg:w-3/5 space-y-6">
            <div class="flex flex-col sm:flex-row gap-6 bg-[#282119] border border-[#3d352b] p-6 rounded-2xl items-center sm:items-start">
                <div class="w-24 h-24 bg-[#332b22] rounded-lg shrink-0">
                    <img src="/images/obra.jpg" class="w-full h-full object-cover rounded-lg" alt="Obra">
                </div>
                <div class="flex-grow text-center sm:text-left">
                    <h3 class="text-xl mb-1">Mirada temptadora</h3>
                    <p class="text-[#a0937f] text-sm mb-4">Pintura original</p>
                </div>
                <div class="text-2xl text-[#c9973a]">125€</div>
            </div>

            <div class="flex flex-col sm:flex-row gap-6 bg-[#282119] border border-[#3d352b] p-6 rounded-2xl items-center sm:items-start">
                <div class="w-24 h-24 bg-[#332b22] rounded-lg shrink-0 flex items-center justify-center border border-dashed border-[#c9973a]">
                    <span class="text-[#c9973a] text-[10px] uppercase text-center">Ticket<br>Taller</span>
                </div>
                <div class="flex-grow text-center sm:text-left">
                    <h3 class="text-xl mb-1">Reserva taller</h3>
                    <p class="text-[#a0937f] text-sm mb-4">Art and Wine - 17 Agost</p>
                </div>
                <div class="text-2xl text-[#c9973a]">50€</div>
            </div>
        </div>

        <div class="w-full lg:w-2/5">
            <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8 sticky top-32">
                <h3 class="text-2xl mb-8 uppercase text-center lg:text-left">Detall de pagament</h3>
                
                <div class="space-y-4 mb-8">
                    <div class="flex justify-between text-sm">
                        <span class="text-[#a0937f]">TOTAL articles</span>
                        <span>175,00€</span>
                    </div>
                    <div class="flex justify-between text-sm border-b border-[#3d352b] pb-4">
                        <span class="text-[#a0937f]">IVA (21%)</span>
                        <span>36,75€</span>
                    </div>
                    <div class="flex justify-between text-2xl text-[#c9973a] pt-2">
                        <span>TOTAL</span>
                        <span>211,75€</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <button class="w-full py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                        Pagament
                    </button>
                    <a href="{{ route('tenda') }}" class="block w-full text-center py-4 border border-[#3d352b] text-[#a0937f] rounded-lg text-xs uppercase tracking-widest hover:text-[#f2ede6] transition-colors">
                        Seguir Comprant
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection