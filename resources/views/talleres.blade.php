@extends('master')
@section('title', 'Tallers')

@section('content')
    <div class="container mx-auto py-20 bg-[#1e1914] text-[#f2ede6]">
        
        <!-- Dades d'excepcions invisibles per a JS -->
        <div id="calendarExcepcions" 
             data-excepcions="{{ json_encode($excepcions ?? []) }}" 
             style="display: none;"></div>
    
        <!-- Títol principal -->
        <div class="relative z-10 max-w-3xl mx-auto text-center mb-24">
            <span class="text-[#c9973a] text-[20px] md:text-[30px] uppercase tracking-[3px] md:tracking-[5px]">
                EXPERIÈNCIES
            </span>
            <br/>
            <h12 class="text-3xl md:text-4xl mt-4 tracking-[3px] md:tracking-[5px]">
                Tallers de Pintura
            </h2>
        </div>

        <!-- Capçalera (Hero) amb imatge de fons -->
        <section class="relative h-[400px] md:h-[600px] rounded-3xl overflow-hidden 
                        flex items-center justify-center text-center px-6 mb-40">
            <img src="/images/talleres/fotoTaller.png" 
                 alt="Fons Hero Nonart" 
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 rounded-3xl"></div>
        </section>

        <!-- Llista de tallers disponibles -->
        <div class="flex flex-col items-center gap-64">
            @foreach($talleres as $taller)
                <article class="w-[95%] md:w-[55%] flex flex-col items-center">
                    
                    <div class="text-center space-y-4 mb-16">
                        <h1 class="text-4xl md:text-5xl font-light uppercase tracking-wide">
                            {{ $taller->nom }}
                        </h1>
                        <p class="text-[#a0937f] text-3xl md:text-3xl text-sm italic">
                            {{ number_format($taller->duracio_hores, 1) }} Hores d'immersió
                        </p>
                    </div>

                    <!-- Formulari de reserva -->
                    <div class="w-full bg-[#282119] border border-[#3d352b] rounded-[40px] 
                                p-10 md:p-16 shadow-2xl mt-4">
                        <div class="max-w-3xl mx-auto">
                            <form action="{{ route('carrito.store') }}" method="POST" class="space-y-8">
                                @csrf
                                <input type="hidden" name="taller_id" value="{{ $taller->id }}">

                                <!-- Aquest és el grid que s'adapta a mòbil i pc -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    
                                    <!-- Input de la data -->
                                    <div class="flex flex-col justify-end">
                                        <label class="block text-[#c9973a] text-[18px] uppercase 
                                                      tracking-[3px] mb-2 text-center md:text-left">
                                            Data:
                                        </label>
                                        <input type="text" name="fecha" required
                                               class="datepicker-input w-full bg-[#332b22] border 
                                                      border-[#3d352b] text-white text-[12px] rounded-xl 
                                                      px-5 py-3 focus:outline-none focus:border-[#c9973a]" 
                                               id="fecha_taller_{{ $taller->id }}" 
                                               data-taller-id="{{ $taller->id }}"
                                               placeholder="Selecciona dia">
                                    </div>
                                    
                                    <!-- Select d'horaris -->
                                    <div class="flex flex-col justify-end">
                                        <label class="block text-[#c9973a] text-[18px] uppercase 
                                                      tracking-[3px] mb-2 text-center md:text-left">
                                            Horari:
                                        </label>
                                        <select name="horari" required id="horari_taller_{{ $taller->id }}"
                                                class="w-full bg-[#332b22] border border-[#3d352b] text-white 
                                                       text-[12px] rounded-xl px-5 py-3 focus:outline-none 
                                                       focus:border-[#c9973a] appearance-none">
                                            <option value="">Selecciona data</option>
                                        </select>
                                    </div>

                                    <!-- Select de places (Corregit text i padding) -->
                                    <div class="flex flex-col justify-end">
                                        <label class="block text-[#c9973a] text-[18px] uppercase 
                                                      tracking-[3px] mb-2 text-center md:text-left 
                                                      whitespace-nowrap">
                                            Places:
                                        </label>
                                        <select name="cantidad" required 
                                                class="w-full bg-[#332b22] border border-[#3d352b] 
                                                       text-white text-[12px] rounded-xl px-5 py-3 
                                                       focus:outline-none focus:border-[#c9973a] 
                                                       appearance-none">
                                            @for ($i = 1; $i <= $taller->capacitat_max; $i++)
                                                <option value="{{ $i }}">
                                                    {{ $i }} {{ $i == 1 ? 'Persona' : 'Persones' }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>

                                <!-- Botons segons estat d'autenticació -->
                                @auth
                                    <button type="submit" 
                                            class="w-full py-6 bg-[#c9973a] text-black rounded-full text-sm 
                                                   uppercase tracking-[4px] font-bold hover:bg-[#e6ae42] 
                                                   transition-all shadow-lg hover:-translate-y-1 transform 
                                                   duration-300 mt-4">
                                        Reservar per {{ number_format($taller->preu, 0) }}€ / Persona
                                    </button>
                                @endauth

                                @guest
                                    <a href="/login" 
                                       class="block text-center w-full py-6 bg-[#3d352b] text-[#c9973a] 
                                              rounded-full text-sm uppercase tracking-[4px] font-bold 
                                              border border-[#3d352b] hover:bg-[#1e1914] transition-all 
                                              shadow-lg mt-4">
                                        Inicia sessió per reservar
                                    </a>
                                @endguest
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
            
            <!-- Informació sobre els tallers -->
            <section class="flex flex-col items-center text-center gap-12 max-w-4xl mx-auto py-8">
                <h2 class="text-4xl mb-6">Sobre els tallers.</h2>
                <p class="text-[#a0937f] leading-relaxed text-[30px]">
                    Endinsa't en el món de la creativitat amb la nostra experiència exclusiva. 
                </p>
                <p class="text-[#a0937f] leading-relaxed text-[30px]">
                    Els nostres tallers estan disenyats tant per a principiants com per artistes experimentats.
                </p>
                <p class="text-[#a0937f] leading-relaxed text-[30px]">
                    Gaudeix d'una copa de vi seleccionat mentre deixes volar la teva imaginació sobre el llenç.
                    Guiat per la meva professionalitat.
                </p>
            </section>

            <!-- Galeria d'imatges del taller -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 w-full mb-16">
                @foreach($imagenes as $img)
                    <div class="aspect-square bg-[#332b22] rounded-lg overflow-hidden border 
                                border-[#3d352b] group">
                        <img src="/images/talleres/{{$img}}" 
                             class="zoomable-image cursor-pointer w-full h-full object-cover opacity-60 
                                    group-hover:opacity-100 transition-all duration-500" 
                             alt="FotosTallers">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Modal per fer zoom a les imatges -->
    <div id="imageModal" 
         class="fixed inset-0 z-[9999] hidden bg-black/95 items-center justify-center 
                backdrop-blur-md transition-opacity duration-300 opacity-0">
        <button id="closeModal" 
                class="absolute top-8 right-10 text-[#f2ede6] text-5xl hover:text-[#c9973a] 
                       transition-colors focus:outline-none">
            &times;
        </button>
        <img id="modalImage" src="" alt="Zoom Taller" 
             class="max-w-[90%] max-h-[90vh] object-contain rounded-2xl 
                    shadow-[0_0_50px_rgba(0,0,0,0.8)] scale-95 transition-transform duration-300">
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cat.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Obtenim les excepcions de la base de dades
        const rawExcepcions = document.getElementById('calendarExcepcions').dataset.excepcions;
        const excepcions = rawExcepcions === '[]' ? {} : JSON.parse(rawExcepcions);
        
        // DEBUG: Això et permetrà veure a la consola (F12) quines dades arriben realment
        console.log("Excepcions carregades des de la BD:", excepcions);

        // Configuració del calendari (Flatpickr)
        const inputs = document.querySelectorAll('.datepicker-input');

        inputs.forEach(input => {
            const tallerId = input.getAttribute('data-taller-id');
            const selectHorari = document.getElementById('horari_taller_' + tallerId);

            flatpickr(input, {
                locale: "ca",
                minDate: "today",
                dateFormat: "Y-m-d",
                disable: [
                    function(date) {
                        const dayOfWeek = date.getDay(); // 0=Diumenge, 1=Dilluns...
                        const yyyy = date.getFullYear();
                        const mm = String(date.getMonth() + 1).padStart(2, '0');
                        const dd = String(date.getDate()).padStart(2, '0');
                        const dateStr = yyyy + "-" + mm + "-" + dd;

                        // Tancat per defecte: de dilluns (1) a dijous (4)
                        let estaTancat = (dayOfWeek >= 1 && dayOfWeek <= 4);

                        // Si hi ha una excepció a la BD, sobreescriu el valor per defecte
                        if (excepcions[dateStr]) {
                            // MÀGIA AQUÍ: Convertim a número per evitar errors de text vs número
                            estaTancat = parseInt(excepcions[dateStr].tancat) === 1;
                        }

                        return estaTancat; // Si retorna true, el dia queda gris i bloquejat
                    }
                ],
                onChange: function(selectedDates, dateStr) {
                    const date = selectedDates[0];
                    const day = date.getDay();

                    // Netegem el select d'horaris abans d'omplir-lo
                    selectHorari.innerHTML = ''; 

                    // Horaris segons el dia de la setmana
                    if (day === 5) { 
                        addOption(selectHorari, "18:00 - 20:30");
                        addOption(selectHorari, "19:30 - 22:00");
                    } else { 
                        addOption(selectHorari, "10:00 - 12:30");
                        addOption(selectHorari, "12:00 - 14:30");
                        addOption(selectHorari, "17:00 - 19:30");
                        addOption(selectHorari, "19:30 - 22:00");
                    }
                }
            });
        });

        // Funció auxiliar per crear opcions al select
        function addOption(select, text) {
            const el = document.createElement('option');
            el.value = text;
            el.text = text;
            select.appendChild(el);
        }

        // Lògica per ampliar les imatges 
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const closeBtn = document.getElementById('closeModal');
        const images = document.querySelectorAll('.zoomable-image');

        // Obrir modal
        images.forEach(img => {
            img.addEventListener('click', function() {
                modalImg.src = this.src; 
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalImg.classList.remove('scale-95');
                    modalImg.classList.add('scale-100');
                }, 10);
            });
        });

        // Tancar modal 
        const closeLightbox = () => {
            modal.classList.add('opacity-0');
            modalImg.classList.remove('scale-100');
            modalImg.classList.add('scale-95');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        };

        // Events de tancament 
        closeBtn.addEventListener('click', closeLightbox);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === "Escape" && !modal.classList.contains('hidden')) {
                closeLightbox();
            }
        });
    });
</script>
@endpush