@extends('master')
@section('title', 'Panel de Control Admin')

@section('content')
<style>
    /* Forcem el calendari a ocupar el 100% de l'ample */
    .flatpickr-calendar.inline {
        width: 100% !important;
        max-width: 100% !important;
        box-shadow: none !important;
        border: none !important;
        background: transparent !important;
        padding: 0 !important;
    }
    
    /* Estirem tots els contenidors interns */
    .flatpickr-calendar.inline .flatpickr-innerContainer,
    .flatpickr-calendar.inline .flatpickr-rContainer,
    .flatpickr-calendar.inline .dayContainer,
    .flatpickr-calendar.inline .flatpickr-days {
        width: 100% !important;
        max-width: 100% !important;
        min-width: 100% !important;
    }
    
    /* Mida dels dies només per al calendari inline */
    .flatpickr-calendar.inline .flatpickr-day {
        max-width: none !important;
        width: 14.28% !important; /* 100% / 7 dies */
        height: 70px !important; 
        line-height: 70px !important;
        border-radius: 16px !important;
        margin: 2px 0 !important;
        font-size: 18px !important; 
    }
    
    /* Capçalera de la setmana (Dl, Dt, Dc...) */
    .flatpickr-calendar.inline .flatpickr-weekday {
        font-size: 16px !important;
        color: #c9973a !important;
        font-weight: bold !important;
    }

    /* Ajustos per a Mòbil */
    @media (max-width: 768px) {
        .flatpickr-calendar.inline .flatpickr-day {
            height: 50px !important;
            line-height: 50px !important;
            font-size: 14px !important;
            border-radius: 10px !important;
        }
        .flatpickr-calendar.inline .flatpickr-weekday {
            font-size: 12px !important;
        }
    }

    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #3d352b; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #c9973a; }
</style>

<div class="space-y-16 pb-12">
    
    <!-- TÍTOL -->
    <div class="text-center">
        <span class="text-[#c9973a] text-[30px] md:text-[50px] uppercase tracking-[3px]">
            Panel de Control
        </span>
        <h1 class="text-3xl md:text-5xl mt-2 mb-10">Administració</h1>
    </div>

    <!-- BOTONS RÀPIDS -->
    <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-6 max-w-2xl mx-auto px-4">
        <a href="/talleres" 
           class="w-full text-center py-4 bg-[#c9973a] text-[#1e1914] rounded-xl font-bold 
                  uppercase tracking-widest hover:bg-[#e6ae42] transition-colors shadow-lg 
                  text-sm md:text-base">
            + Reservar Taller (Telèfon)
        </a>
        <a href="/obras" 
           class="w-full text-center py-4 border border-[#c9973a] text-[#c9973a] rounded-xl 
                  font-bold uppercase tracking-widest hover:bg-[#c9973a] hover:text-[#1e1914] 
                  transition-colors shadow-lg text-sm md:text-base">
            + Vendre Obra (Telèfon)
        </a>
    </div>

    <!-- SECCIÓ : DADES PERSONALS -->
    <div class="max-w-4xl mx-auto w-[95%] md:w-[60%]">
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 shadow-xl">
            <h2 class="text-2xl md:text-3xl text-[#c9973a] mb-8 border-b border-[#3d352b] 
                       pb-4 uppercase text-center tracking-widest">
                Dades Personals
            </h2>
            <ul class="flex flex-col space-y-4 items-center text-center">
                <li class="flex flex-col md:flex-row gap-2 md:gap-4">
                    <span class="text-[16px] md:text-[18px] text-[#a0937f] uppercase tracking-[2px]">Nom:</span> 
                    <span class="text-lg md:text-xl text-[#f2ede6] font-light">{{ $usuario->name }}</span>
                </li>
                <li class="flex flex-col md:flex-row gap-2 md:gap-4">
                    <span class="text-[16px] md:text-[18px] text-[#a0937f] uppercase tracking-[2px]">Email:</span> 
                    <span class="text-lg md:text-xl text-[#f2ede6] font-light break-all">
                        {{ $usuario->email }}
                    </span>
                </li>
                <li class="flex flex-col md:flex-row gap-2 md:gap-4">
                    <span class="text-[16px] md:text-[18px] text-[#a0937f] uppercase tracking-[2px]">Rol:</span> 
                    <span class="text-lg md:text-xl text-[#fb2c36] tracking-[1px] font-bold uppercase">
                        {{ $usuario->role }}
                    </span>
                </li>
            </ul>  
            <div class="mt-8 pt-6 border-t border-[#3d352b] flex justify-center">
                <form method="POST" action="{{ route('logout') }}" class="w-full max-w-xs">
                    @csrf
                    <button type="submit" 
                            class="block w-full py-3 border border-[#fb2c36] text-[#fb2c36] rounded-xl 
                                   text-sm uppercase tracking-widest hover:bg-[#fb2c36] hover:text-white 
                                   transition-colors">
                        Tancar Sessió
                    </button>
                </form>                       
            </div>
        </div>
    </div>

    <!-- SECCIÓ : CALENDARI DE TALLERS INTERACTIU -->
    <div class="max-w-5xl mx-auto mt-20 px-4">
        <h2 class="text-3xl md:text-5xl mb-12 text-center border-b border-[#3d352b] pb-6 
                   uppercase tracking-widest">
            Gestió del Calendari
        </h2>
        
        <!-- DADES INVISIBLES PER AL JS -->
        <div id="calendarData" 
             data-eventos="{{ json_encode($eventosCalendario ?? []) }}" 
             data-excepcions="{{ json_encode($excepcions ?? []) }}" 
             style="display: none;"></div>

        <!-- CONTENIDOR PRINCIPAL CALENDARI -->
        <div class="flex flex-col gap-8">
            
            <!-- CAIXA 1: El Calendari Gegant -->
            <div class="w-full bg-[#282119] border border-[#3d352b] rounded-2xl p-4 md:p-8 
                        shadow-xl overflow-hidden">
                <input type="text" id="adminCalendar" class="hidden">
            </div>

            <!-- CAIXA 2: Llista de reserves del dia seleccionat -->
            <div class="w-full bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-8 shadow-xl">
                <h3 id="diaSeleccionat" class="text-xl md:text-3xl text-[#c9973a] uppercase 
                                              tracking-widest mb-6 pb-4 border-b border-[#3d352b] 
                                              text-center">
                    Selecciona un dia
                </h3>
                <div id="llistaHoraris" class="flex flex-col gap-4">
                    <p class="text-[#a0937f] text-center italic text-sm md:text-base">
                        Fes clic a qualsevol dia del calendari per veure'n les reserves o canviar-ne l'estat.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- SECCIÓ : RESUMEN DE INGRESOS -->
    <div class="max-w-4xl mx-auto px-4 mt-12">
        <div class="bg-[#c9973a]/10 border border-[#c9973a] rounded-2xl p-6 md:p-8 text-center shadow-lg">
            <h2 class="text-lg md:text-2xl text-[#a0937f] uppercase tracking-widest mb-2">
                Total Ingressos Vendes
            </h2>
            <p class="text-3xl md:text-5xl text-[#c9973a] font-light">
                {{ number_format($totalIngresado, 2, ',', '.') }} €
            </p>
        </div>
    </div>

    <!-- SECCIÓ : HISTORIAL DE VENDES (ACORDEÓN) -->
    <div class="max-w-4xl mx-auto px-4 mt-12">
        <h2 class="text-2xl md:text-3xl mb-8 text-center border-b border-[#3d352b] pb-4 
                   uppercase tracking-widest text-[#f2ede6]">
            Historial de Vendes
        </h2>
        
        <div class="flex flex-col gap-4">
            @foreach($vendas as $venda)
            <div class="bg-[#282119] rounded-2xl border border-[#3d352b] overflow-hidden shadow-lg">
                
                <!-- Fila Principal (Clickable) -->
                <div class="p-4 md:p-6 flex flex-col md:flex-row justify-between items-start md:items-center 
                            cursor-pointer hover:bg-[#332b22] transition-colors" 
                     onclick="toggleDetall('{{ $venda->id }}')">
                    
                    <div class="flex flex-col gap-1 mb-4 md:mb-0 w-full md:w-auto">
                        <span class="text-[#c9973a] font-bold text-lg">
                            #{{ str_pad($venda->id, 4, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-[#a0937f] text-sm">{{ $venda->created_at->format('d/m/Y H:i') }}</span>
                    </div>

                    <div class="text-[#f2ede6] text-sm mb-4 md:mb-0 md:w-1/3 w-full">
                        Client: 
                        <span class="uppercase tracking-widest font-bold text-[#c9973a] block md:inline">
                            {{ $venda->user?->name ?? 'Desconegut' }}
                        </span>
                    </div>

                    <div class="flex justify-between md:justify-end items-center w-full md:w-auto gap-4 md:gap-8">
                        <div class="text-right">
                            <span class="px-2 py-1 mb-1 inline-block bg-[#3d352b] text-[#f2ede6] 
                                         rounded text-[10px] uppercase tracking-wider">
                                {{ $venda->metode_pagament }}
                            </span>
                            <div class="text-[#c9973a] font-bold text-xl">
                                {{ number_format($venda->total_comanda, 2, ',', '.') }} €
                            </div>
                        </div>
                        <svg id="icon-{{ $venda->id }}" 
                             class="w-6 h-6 text-[#c9973a] transform transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Detalle Desplegable -->
                <div id="detall-{{ $venda->id }}" 
                     class="hidden border-t border-[#3d352b] bg-[#1e1914] p-4 md:p-6 transition-all">
                    <h4 class="text-[#a0937f] text-xs uppercase tracking-widest mb-4">Articles de la comanda:</h4>
                    <div class="space-y-3">
                        @foreach($venda->detalls as $detall)
                            <div class="flex flex-col sm:flex-row justify-between sm:items-center bg-[#282119] 
                                        p-3 rounded-lg border border-[#3d352b] gap-2">
                                <div class="flex-grow">
                                    <span class="text-[#c9973a] text-[10px] md:text-xs uppercase tracking-widest 
                                                 mr-2 border border-[#c9973a]/30 px-2 py-1 rounded">
                                        {{ $detall->tipus_article }}
                                    </span>
                                    <span class="text-[#f2ede6] text-sm mt-2 sm:mt-0 block sm:inline">
                                        @if($detall->tipus_article == 'obra')
                                            {{ $detall->obra?->titulo ?? 'Obra esborrada' }}
                                        @elseif($detall->tipus_article == 'taller')
                                            {{ $detall->taller?->nom ?? 'Taller esborrat' }}
                                        @else
                                            Article desconegut
                                        @endif
                                    </span>
                                </div>
                                <div class="text-left sm:text-right border-t sm:border-t-0 border-[#3d352b] 
                                            pt-2 sm:pt-0">
                                    <span class="text-[#a0937f] text-xs mr-3">
                                        {{ $detall->quantitat }} x {{ number_format($detall->preu_unitat, 2, ',', '.') }}€
                                    </span>
                                    <span class="text-[#f2ede6] font-bold text-sm">
                                        {{ number_format($detall->subtotal, 2, ',', '.') }}€
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>

    <!-- SECCIÓ : ESTAT DE L'ESTOC -->
    <div class="max-w-6xl mx-auto px-4 mt-16">
        <h2 class="text-2xl md:text-3xl mb-8 text-center border-b border-[#3d352b] pb-4 
                   uppercase tracking-widest text-[#f2ede6]">
            Control d'Estoc
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($stock as $item)
                @php
                    $bgStatus = $item->quantitat < 20 
                                ? 'bg-[#fb2c36]/10 border-[#fb2c36]/50' 
                                : 'bg-[#282119] border-[#3d352b]';
                    $textStatus = $item->quantitat < 20 ? 'text-[#fb2c36]' : 'text-[#00c950]';
                @endphp
                <div class="border {{ $bgStatus }} rounded-xl p-4 flex flex-col items-center text-center 
                            shadow-lg hover:-translate-y-1 transition-transform">
                    <span class="text-[#a0937f] text-[10px] md:text-xs uppercase mb-2 h-10 flex 
                                 items-center justify-center">
                        {{ $item->nom_material }}
                    </span>
                    <span class="text-3xl md:text-4xl font-light text-[#f2ede6] mb-1">
                        {{ $item->quantitat }}
                    </span>
                    <span class="text-[10px] uppercase tracking-widest {{ $textStatus }}">Unitats</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cat.js"></script>

<script>
    // Acordeon per les vendes
    function toggleDetall(id) {
        const detallDiv = document.getElementById('detall-' + id);
        const icon = document.getElementById('icon-' + id);
        if (detallDiv.classList.contains('hidden')) {
            detallDiv.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            detallDiv.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }

    // AJAX Call per Obrir/Tancar dies
    window.canviarEstatDia = function(fecha) {
        fetch('{{ route("admin.toggleDia") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ fecha: fecha })
        })
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                location.reload(); 
            }
        }).catch(err => console.error(err));
    }

    // Lògica del Calendari d'Admin
    document.addEventListener('DOMContentLoaded', function() {
        const rawEventos = document.getElementById('calendarData').dataset.eventos;
        const rawExcepcions = document.getElementById('calendarData').dataset.excepcions;
        
        const eventos = rawEventos === '[]' ? {} : JSON.parse(rawEventos);
        const excepcions = rawExcepcions === '[]' ? {} : JSON.parse(rawExcepcions);
        
        const llistaHoraris = document.getElementById('llistaHoraris');
        const titolDia = document.getElementById('diaSeleccionat');

        flatpickr("#adminCalendar", {
            inline: true,
            locale: "cat",
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                const dateObj = dayElem.dateObj;
                const dayOfWeek = dateObj.getDay(); 
                
                const yyyy = dateObj.getFullYear();
                const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
                const dd = String(dateObj.getDate()).padStart(2, '0');
                const dateStr = yyyy + "-" + mm + "-" + dd;

                let estaTancat = (dayOfWeek >= 1 && dayOfWeek <= 4);
                
                if (excepcions[dateStr] !== undefined) {
                    let valorTancatDb = excepcions[dateStr].tancat;
                    estaTancat = (valorTancatDb === 1 || valorTancatDb === "1" || valorTancatDb === true);
                }

                if (estaTancat) {
                    dayElem.style.backgroundColor = 'rgba(251, 44, 54, 0.05)'; 
                    dayElem.style.color = '#fb2c36'; 
                }

                if (eventos[dateStr]) {
                    const colorEvento = eventos[dateStr][0].color; 
                    dayElem.style.backgroundColor = colorEvento + '20';
                    dayElem.style.border = '1px solid ' + colorEvento;
                    dayElem.style.color = colorEvento;
                    dayElem.style.fontWeight = 'bold';
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length > 0) {
                    const date = selectedDates[0];
                    const yyyy = date.getFullYear();
                    const mm = String(date.getMonth() + 1).padStart(2, '0');
                    const dd = String(date.getDate()).padStart(2, '0');
                    const key = yyyy + "-" + mm + "-" + dd;

                    titolDia.textContent = "Gestió del " + dd + "/" + mm + "/" + yyyy;
                    
                    let botoHTML = `
                        <div class="mb-6 pb-6 border-b border-[#3d352b] text-center">
                            <button onclick="canviarEstatDia('${key}')" 
                                    class="px-4 md:px-6 py-3 bg-[#3d352b] text-[#f2ede6] rounded-xl 
                                           text-xs md:text-sm uppercase tracking-widest hover:bg-[#c9973a] 
                                           hover:text-[#1e1914] transition-colors border border-[#c9973a]/30 
                                           shadow-lg w-full md:w-auto">
                                🔄 Obrir / Tancar aquest dia
                            </button>
                        </div>
                    `;

                    llistaHoraris.innerHTML = botoHTML;

                    if (eventos[key]) {
                        eventos[key].forEach(taller => {
                            const targeta = document.createElement('div');
                            targeta.className = "p-4 md:p-6 rounded-xl border bg-[#1e1914] flex flex-col " +
                                                "gap-3 md:gap-4 mb-4 shadow-lg";
                            targeta.style.borderColor = taller.color;
                            
                            targeta.innerHTML = `
                                <div class="flex flex-col sm:flex-row justify-between items-start gap-2">
                                    <h4 class="text-[#f2ede6] text-lg md:text-xl uppercase">${taller.taller}</h4>
                                    <span class="text-[10px] md:text-xs uppercase tracking-widest font-bold 
                                                 px-3 py-1 rounded shrink-0 w-max" 
                                          style="color: ${taller.color}; background-color: ${taller.color}20;">
                                        ${taller.estat}
                                    </span>
                                </div>
                                <div class="flex flex-col sm:flex-row justify-between sm:items-center mt-2 
                                            border-t border-[#3d352b] pt-3 gap-2">
                                    <span class="text-[#a0937f] text-sm md:text-base flex items-center gap-2">
                                        🕒 Torn: ${taller.horari}
                                    </span>
                                    <span class="text-[#f2ede6] text-sm md:text-base">
                                        Ocupació: 
                                        <span class="font-bold text-lg md:text-xl" style="color: ${taller.color}">
                                            ${taller.ocupacio}/${taller.capacitat}
                                        </span>
                                    </span>
                                </div>
                            `;
                            llistaHoraris.appendChild(targeta);
                        });
                    } else {
                        let estaTancat = (date.getDay() >= 1 && date.getDay() <= 4);
                        if (excepcions[key] !== undefined) {
                            let valorDb = excepcions[key].tancat;
                            estaTancat = (valorDb === 1 || valorDb === "1" || valorDb === true);
                        }
                        
                        let msgTancat = '<span class="text-[#fb2c36]">Aquest dia està TANCAT.</span>';
                        let msgObert = '<span class="text-[#00c950]">Aquest dia està OBERT, sense reserves.</span>';
                        let missatge = estaTancat ? msgTancat : msgObert;
                            
                        llistaHoraris.innerHTML += `
                            <p class="text-[#a0937f] text-sm md:text-base italic text-center mt-4">
                                ${missatge}
                            </p>
                        `;
                    }
                }
            }
        });
    });
</script>
@endpush