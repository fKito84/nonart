@extends('master')
@section('title', 'Inici')

@section('content')
<div class="space-y-16 md:space-y-24">
    
    <!-- Capçalera principal (Hero) -->
    <section class="relative h-[400px] md:h-[600px] rounded-3xl overflow-hidden 
                    flex items-center justify-center text-center px-6">
        <img src="/images/talleres/fotoTaller.jpg" alt="Fons Hero Nonart" 
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40 rounded-3xl"></div>
    </section>
    
    <!-- Títol de benvinguda i taller destacat -->
    <section class="relative h-auto md:h-[200px] rounded-3xl flex items-top 
                    justify-center text-center px-4 md:px-1">
        <div class="text-center">
            <span class="text-[#c9973a] text-2xl md:text-[40px] uppercase tracking-[5px]">
                Taller Destacat
            </span>
            <h1 class="text-3xl md:text-4xl mt-4 uppercase tracking-tighter">Art and Wine</h1>
        </div>
    </section>
    
    <!-- Descripció breu central -->
    <section class="relative h-auto md:h-[100px] rounded-2xl flex items-center 
                    justify-center text-center px-4 md:px-6">
        <div class="text-center">
            <p class="text-[#f2ede6] text-xl md:text-[28px] leading-relaxed 
                      [-webkit-text-stroke:0.6px_black]">
                Descobreix la nostra experiència: 
            </p>
            <p class="text-[#f2ede6] text-xl md:text-[28px] leading-relaxed 
                      [-webkit-text-stroke:0.6px_black]">
                gaudeix de la pintura i el vi en un ambient creatiu i únic.
            </p>
        </div>
    </section>

    <!-- Carrusel d'obres destacades -->
    <section>
        <div class="text-center mb-8 md:mb-5">
            <span class="text-[#c9973a] text-2xl md:text-[40px] uppercase tracking-widest">
                Col·lecció
            </span>
            <h2 class="text-3xl md:text-4xl mt-2">Obres d'art</h2>
        </div>
       
        <!-- Contenidor del carrusel amb scroll horitzontal -->
        <div class="carrusel-obras cursor-grab flex overflow-x-auto gap-6 md:gap-8 pb-8 
                    snap-x snap-mandatory [&::-webkit-scrollbar]:hidden 
                    [-ms-overflow-style:none] [scrollbar-width:none]">
            
           @foreach($obras as $obra)     
                <!-- Targeta  d'obra -->
                <div class="bg-[#282119] border border-[#3d352b] rounded-2xl overflow-hidden 
                            group min-w-[280px] md:min-w-[300px] w-[280px] md:w-[300px] shrink-0 
                            snap-center flex flex-col">
                    
                    <div class="h-80 md:h-96 bg-[#332b22] relative overflow-hidden rounded-2xl 
                                object-cover object-top shrink-0">
                        <img src="{{ $obra->imagen }}" alt="{{ $obra->titulo }}" 
                             class="w-full h-full object-cover group-hover:scale-110 
                                    transition-transform duration-500">
                    </div>
                    
                    <div class="p-6 md:p-8 flex flex-col flex-1 rounded-2xl">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl md:text-2xl">{{ $obra->titulo }}</h3>
                            <span class="text-[#c9973a] text-lg md:text-xl font-medium shrink-0 ml-4">
                                {{ $obra->precio }}€
                            </span>
                        </div>
                        
                        <p class="text-[#a0937f] text-sm md:text-base mb-8">Ainoa Sillero</p> 
                        
                        <a href="/obras/{{$obra->id}}" 
                           class="mt-auto mb-2 md:mb-5 block w-full text-center py-3 md:py-4 
                                  bg-[#332b22] border border-[#3d352b] text-[#ddd2c0] rounded-lg 
                                  text-xs md:text-sm uppercase tracking-widest hover:bg-[#c9973a] 
                                  hover:text-[#1e1914] transition-colors">
                            Veure Detall
                        </a>
                    </div>
                </div>  
            @endforeach
        </div>
       
        <div class="text-center mt-8 md:mt-12">              
            <a href="/obras" 
               class="inline-block py-3 md:py-4 px-8 md:px-12 bg-[#c9973a] text-[#1e1914] 
                      rounded-lg text-xs md:text-sm uppercase tracking-widest">
                Veure Galeria
            </a>
        </div>
    </section>

    <!-- Secció de tallers -->
    <section class="flex flex-col items-center text-center gap-8 md:gap-12 max-w-4xl mx-auto py-8">
        <div class="flex flex-col items-center w-full gap-8 md:gap-12 px-4">
            
            <div>
                <span class="text-[#c9973a] text-2xl md:text-[30px] uppercase tracking-widest">
                    Esdeveniments
                </span>
                <h2 class="text-3xl md:text-4xl mt-2">Tallers</h2>
            </div>

            <!-- Imatge gran del taller -->
            <div class="relative w-full max-w-[1200px] h-[400px] md:h-[800px] rounded-3xl 
                        overflow-hidden group">
                <img src="/images/talleres/llocTaller.jpg" alt="Taller Art and Wine" 
                     class="w-full h-full object-cover group-hover:scale-110 
                            transition-transform duration-500">
            </div>
            
            <!-- Caixa informativa -->
            <div class="bg-[#282119] max-w-[90%] md:max-w-[800px] h-auto md:h-[200px] 
                        p-6 md:p-8 border border-[#3d352b] rounded-3xl items-center 
                        w-full mx-auto py-6 md:py-8 mt-[-40px] md:mt-0 relative z-10">
                <h3 class="text-lg md:text-xl mb-4">
                    ART and Wine <br>
                    <span class="text-[#a0937f] text-sm md:text-base">experiència única</span>
                </h3>
                <a href="/talleres" 
                   class="inline-block py-3 px-6 md:px-8 bg-[#c9973a] text-[#1e1914] rounded-lg 
                          text-[10px] md:text-xs uppercase tracking-widest hover:bg-white 
                          transition-colors">
                    Veure Taller
                </a>
            </div>
        </div>
    </section>
   
    <!-- Text de tancament -->
    <section class="flex flex-col items-center text-center gap-6 md:gap-12 max-w-4xl 
                    mx-auto py-8 px-4">
        <h2 class="text-3xl md:text-4xl mb-4 md:mb-6">Descripció</h2>
        <p class="text-[#a0937f] leading-relaxed text-xl md:text-[30px]">
            La nostra passió per l'art es reflecteix en cada obra. 
        </p>
        <p class="text-[#a0937f] leading-relaxed text-xl md:text-[30px]">
            Seleccionem les millors peces per als nostres clients, 
            garantint l'autenticitat i la qualitat de cada creació.
        </p>
    </section>
</div>
@endsection