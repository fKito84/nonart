@extends('master')
@section('title', 'Inici')

@section('content')
<div class="space-y-24">
    <section class="relative h-[400px] md:h-[600px] rounded-3xl overflow-hidden bg-[#282119] flex items-center justify-center text-center px-6">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 max-w-2xl">
            <span class="text-[#c9973a] text-xs lg:text-sm tracking-[2px] uppercase">Taller Destacat</span>
            <h1 class="text-4xl md:text-6xl mt-4 mb-6">Art and Wine</h1>
            <p class="text-[#a0937f] text-sm md:text-base leading-relaxed">
                Descobreix la nostra experiència: gaudeix de la pintura i el vi en un ambient creatiu i únic.
            </p>
        </div>
    </section>

    <section>
        <div class="text-center mb-12">
            <span class="text-[#c9973a] text-[10px] uppercase tracking-widest">Col·lecció</span>
            <h2 class="text-3xl mt-2">Obres d'art</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-[#282119] border border-[#3d352b] rounded-2xl overflow-hidden group">
                <div class="h-64 bg-[#332b22] relative overflow-hidden">
                    <img src="/images/bessones.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg">Bessones</h3>
                        <span class="text-[#c9973a]">150€</span>
                    </div>
                    <p class="text-[#a0937f] text-sm mb-6">Ainoa Sillero</p>
                    <a href="{{ route('detall') }}" class="block w-full text-center py-4 bg-[#332b22] border border-[#3d352b] text-[#ddd2c0] rounded-lg text-xs uppercase tracking-widest hover:bg-[#c9973a] hover:text-[#1e1914] transition-colors">Veure Detall</a>
                </div>
            </div>
            </div>
        <div class="text-center mt-12">
            <a href="{{ route('tenda') }}" class="inline-block py-4 px-12 bg-[#c9973a] text-[#1e1914] rounded-lg text-sm uppercase tracking-widest">Veure Galeria</a>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            <span class="text-[#c9973a] text-[10px] uppercase tracking-widest">Esdeveniments</span>
            <h2 class="text-4xl mt-2 mb-8">Tallers</h2>
            <div class="bg-[#282119] p-8 border border-[#3d352b] rounded-2xl">
                <h3 class="text-xl mb-4">ART and Wine <br><span class="text-[#a0937f] text-sm">experiencia unica</span></h3>
                <a href="{{ route('tallers') }}" class="inline-block py-3 px-8 bg-[#c9973a] text-[#1e1914] rounded-lg text-xs uppercase tracking-widest">Veure Taller</a>
            </div>
        </div>
        <div class="order-1 md:order-2 h-[400px] rounded-3xl bg-[#332b22]"></div>
    </section>

    <section class="max-w-3xl mx-auto text-center border-t border-[#3d352b] pt-16">
        <h2 class="text-2xl mb-6">Descripció</h2>
        <p class="text-[#a0937f] leading-relaxed text-sm">
            La nostra passió per l'art es reflecteix en cada obra. Seleccionem les millors peces per als nostres clients, garantint l'autenticitat i la qualitat de cada creació.
        </p>
    </section>
</div>
@endsection
                <!--
                    Route::get('/', function () { return view('home'); })->name('home');
                    Route::get('/tenda', function () { return view('tenda'); })->name('tenda');
                    Route::get('/detall', function () { return view('detall'); })->name('detall');
                    Route::get('/tallers', function () { return view('tallers'); })->name('tallers');
                    Route::get('/login', function () { return view('login'); })->name('login');
                    Route::get('/carret', function () { return view('carret'); })->name('carret');
                    Route::get('/usuari', function () { return view('usuari'); })->name('usuari');

                -->