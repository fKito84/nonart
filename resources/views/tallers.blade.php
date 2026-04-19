@extends('master')
@section('title', 'Tallers')

@section('content')
<div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
    
    <div class="w-full lg:w-3/5 space-y-10">
        <div class="grid grid-cols-2 gap-4">
            <div class="h-48 md:h-64 bg-[#332b22] rounded-xl overflow-hidden">
                <img src="/images/taller1.jpg" class="w-full h-full object-cover opacity-80 hover:opacity-100 transition-opacity" alt="Taller 1">
            </div>
            <div class="h-48 md:h-64 bg-[#332b22] rounded-xl overflow-hidden">
                <img src="/images/taller2.jpg" class="w-full h-full object-cover opacity-80 hover:opacity-100 transition-opacity" alt="Taller 2">
            </div>
        </div>

        <div>
            <span class="text-[#c9973a] text-xs uppercase tracking-[3px]">Esdeveniment Tallers</span>
            <h1 class="text-4xl md:text-5xl mt-2 mb-8 leading-tight">Pintura i vi, experiencia unica.</h1>
        </div>

        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8">
            <h2 class="text-xl text-[#c9973a] mb-4 uppercase">Sobre els tallers</h2>
            <p class="text-[#a0937f] text-sm leading-relaxed">
                Endinsa't en el món de la creativitat amb la nostra experiència exclusiva. Els nostres tallers estan dissenyats tant per a principiants com per a artistes experimentats. Gaudeix d'una copa de vi seleccionat mentre deixes volar la teva imaginació sobre el llenç, guiat pels nostres professionals.
            </p>
        </div>
    </div>

    <div class="w-full lg:w-2/5">
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-8 sticky top-32">
            <h3 class="text-2xl mb-2">Reserva el teu taller</h3>
            <p class="text-[#a0937f] text-xs mb-8 leading-relaxed">
                Selecciona la data i l'hora per confirmar la teva assistència a Art and Wine.
            </p>

            <form action="#" class="space-y-6">
                <div>
                    <label class="block text-[#c9973a] text-[10px] uppercase tracking-widest mb-2">Selecciona Data:</label>
                    <input type="date" class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] css-date-icon">
                </div>

                <div>
                    <label class="block text-[#c9973a] text-[10px] uppercase tracking-widest mb-2">Agafa Hora:</label>
                    <select class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] appearance-none">
                        <option>17:00 - 19:00</option>
                        <option>19:30 - 21:30</option>
                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-sm uppercase tracking-[2px] hover:bg-[#b08432] transition-colors flex justify-center items-center gap-2">
                        Reservar Taller 
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection