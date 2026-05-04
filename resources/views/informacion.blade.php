@extends('master')
@section('title', 'Informació i Ajuda')

@section('content')
<!-- Contenidor principal -->
<div class="max-w-6xl mx-auto px-4 md:px-6 py-12 md:py-16 min-h-[70vh]">
    
    <!-- Capçalera de la pàgina -->
    <div class="text-center mb-12 md:mb-16">
        <h1 class="text-3xl md:text-4xl text-[#f2ede6] uppercase mb-2 md:mb-4 tracking-[3px] md:tracking-[4px]">
            Nonart 
        </h1>
        <h1 class="text-3xl md:text-4xl text-[#f2ede6] uppercase mb-4 tracking-[3px] md:tracking-[4px]">
            Informació d'Interès 
        </h1>
        <p class="text-[#a0937f] text-xs md:text-sm tracking-widest max-w-2xl mx-auto leading-relaxed">
            Tot el que necessites saber sobre les nostres obres, reserves de tallers, 
            enviaments i polítiques.
        </p>
    </div>

    <!-- Graella de targetes informatives -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        
        <!-- Targeta 1: Enviaments -->
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 
                    hover:border-[#c9973a] transition-colors duration-300">
            <div class="mb-4 md:mb-6 text-[#c9973a]">
                <!-- Icona Enviaments -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                    </path>
                </svg>
            </div>
            <h2 class="text-lg md:text-xl text-[#f2ede6] uppercase tracking-widest mb-4">
                Enviaments i Entregues
            </h2>
            <div class="space-y-4 text-[#a0937f] text-sm md:text-base leading-relaxed">
                <p>Realitzem enviaments a tota la península de forma segura. Cada obra 
                   s'embala amb materials protectors d'alta qualitat.</p>
                <ul class="list-disc pl-4 space-y-2 text-[#c9973a]">
                    <li><span class="text-[#a0937f]">Península: 3-5 dies laborables.</span></li>
                    <li><span class="text-[#a0937f]">Balears i Canàries: Consultar prèviament.</span></li>
                </ul>
            </div>
        </div>

        <!-- Targeta 2: Tallers -->
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 
                    hover:border-[#c9973a] transition-colors duration-300">
            <div class="mb-4 md:mb-6 text-[#c9973a]">
                <!-- Icona Tallers -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h2 class="text-lg md:text-xl text-[#f2ede6] uppercase tracking-widest mb-4">
                Sobre els Tallers
            </h2>
            <div class="space-y-4 text-[#a0937f] text-sm md:text-base leading-relaxed">
                <p>Els tallers presencials tenen places limitades per garantir una atenció personalitzada. 
                   La reserva garanteix el teu lloc i els materials.</p>
                <p>En cas de no poder assistir, preguem avisar amb 48 hores d'antelació per poder 
                   gestionar canvis de data.</p>
            </div>
        </div>

        <!-- Targeta 3: Devolucions -->
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 
                    hover:border-[#c9973a] transition-colors duration-300">
            <div class="mb-4 md:mb-6 text-[#c9973a]">
                <!-- Icona Devolucions -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                    </path>
                </svg>
            </div>
            <h2 class="text-lg md:text-xl text-[#f2ede6] uppercase tracking-widest mb-4">
                Política de Devolucions
            </h2>
            <div class="space-y-4 text-[#a0937f] text-sm md:text-base leading-relaxed">
                <p>Tractant-se d'obres d'art úniques, només s'accepten devolucions si l'obra
                   arriba danyada per culpa del transport.</p>
                <p>Si això passa, si us plau, posa't en contacte amb nosaltres durant les 24 hores 
                   posteriors a la recepció amb fotografies de l'embalatge.</p>
            </div>
        </div>

        <!-- Targeta 4: Contacte -->
        <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-6 md:p-10 
                    hover:border-[#c9973a] transition-colors duration-300">
            <div class="mb-4 md:mb-6 text-[#c9973a]">
                <!-- Icona Contacte -->
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h2 class="text-lg md:text-xl text-[#f2ede6] uppercase tracking-widest mb-4">
                Contacte Directe
            </h2>
            <div class="space-y-4 text-[#a0937f] text-sm md:text-base leading-relaxed">
                <p>Si tens qualsevol altra dubte que no estigui resolt aquí, estarem encantats 
                   d'atendre't personalment.</p>
                <p class="text-[#c9973a] tracking-wider text-xs md:text-sm">
                    CORREU: <span class="text-[#f2ede6]">nonart@nonart.es</span>
                </p>
                <p class="text-[#c9973a] tracking-wider text-xs md:text-sm">
                    TELÈFON: <span class="text-[#f2ede6]">+34 600 00 00 00</span>
                </p>
            </div>
        </div>

    </div>
</div>
@endsection