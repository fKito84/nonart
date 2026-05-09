<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>NONART - @yield('title')</title>
    
    <!-- Favicon i tipografies -->
    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    
    <!-- Estils del calendari Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">

    <style>
        .navbar {
            padding-top: env(safe-area-inset-top);
        }
        body { 
            font-family: 'Dela Gothic One', sans-serif; 
            background-color: #1e1914; 
            color: #f2ede6;
        }
       
        p, h1, h2, h3, h4, a, button, span { font-family: 'Dela Gothic One', sans-serif; }

        /* Dies deshabilitats del calendari en vermell */
        .flatpickr-day.flatpickr-disabled, 
        .flatpickr-day.flatpickr-disabled:hover {
            color: #fb2c36 !important;
            cursor: not-allowed;
            opacity: 0.5;
        }
        
        /* Color de fons de l'input del calendari */
        .datepicker-input {
            background-color: #332b22 !important;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col mx-auto min-w-[320px] max-w-[1600px] overflow-x-hidden">

    <!-- Capçalera principal : Navbar -->
    <nav style="padding-top: calc(env(safe-area-inset-top) + 15px); padding-bottom: 15px;" 
         class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[1600px] min-w-[320px] 
                bg-[#1e1914]/95 backdrop-blur-md border-b border-[#3d352b] z-50 flex items-center 
                justify-between px-6 lg:px-12">
        
        <!-- Logo -->
        <a href="/home" class="flex items-center w-16 h-16">
            <img src="{{ asset('images/aplicacion/logo.png') }}" alt="Logo Nonart" 
                 class="w-full h-full object-cover rounded-2xl shadow-sm">
        </a>

        <!-- Enllaços centrals : vistes grans -->
        <div class="hidden md:flex gap-8 text-sm uppercase tracking-widest text-[#a0937f]">
            <a href="/home" class="hover:text-[#c9973a] transition-colors">Inici</a>
            <a href="/obras" class="hover:text-[#c9973a] transition-colors">Obres d'art</a>
            <a href="/talleres" class="hover:text-[#c9973a] transition-colors">Tallers</a>
        </div>

        <!-- Icones de la dreta -->
        <div class="flex items-center gap-5 lg:gap-7">
    
            <!-- Icona Login (-->
            @guest
                <a href="/login" class="text-[#f2ede6] hover:text-[#c9973a] transition-colors flex items-center">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
            @endguest
            
            <!-- Icona Carret  -->
            @auth
            <a href="{{ route('carrito.index') }}" 
               class="text-[#f2ede6] hover:text-[#c9973a] transition-colors relative flex items-center group">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" 
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" 
                     class="transform group-hover:scale-110 transition-transform duration-300">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>

                <!-- Comptador d'articles al carret -->
                @if(session()->has('carrito') && count(session('carrito')) > 0)
                    @php
                        $totalArticulos = array_sum(array_column(session('carrito'), 'cantidad'));
                    @endphp
                    <span class="absolute -top-2 -right-3 bg-[#c9973a] text-[#1e1914] text-[10px] 
                                 font-bold w-5 h-5 flex items-center justify-center rounded-full 
                                 border-2 border-[#1e1914] shadow-lg animate-pulse">
                        {{ $totalArticulos }}
                    </span>
                @endif
            </a>
            @endauth
            
            <!-- Botó menú lateral  -->
            <button id="menuBtn" class="text-[#f2ede6] hover:text-[#c9973a] transition-colors flex items-center">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" 
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            
        </div>
    </nav>

    <!-- Menú lateral mòbil i PC -->
    <div id="sideMenu" style="padding-top: calc(env(safe-area-inset-top) + 80px);" 
         class="fixed top-0 right-0 h-full w-[80%] md:w-[25%] bg-[#1e1914] z-[60] flex flex-col 
                items-center translate-x-full transition-transform duration-300 shadow-2xl 
                border-l border-[#3d352b]">
        
        <!-- Botó tancar menú -->
        <button id="closeMenu" style="top: calc(env(safe-area-inset-top) + 20px);" 
                class="absolute right-6 text-[#f2ede6] text-xs tracking-widest hover:text-[#c9973a]">
            TANCAR
        </button>
        
        <!-- Enllaços del menú -->
        <div class="flex flex-col gap-8 text-center text-lg lg:text-xl uppercase">
            <a href="/home" class="hover:text-[#c9973a] transition-colors">Inici</a>
            <a href="/obras" class="hover:text-[#c9973a] transition-colors">Obres d'art</a>
            <a href="/talleres" class="hover:text-[#c9973a] transition-colors">Tallers</a>
            
            @auth
                <a href="/carrito" class="hover:text-[#c9973a] transition-colors">Cistell de la compra</a>
                <a href="/usuario" class="hover:text-[#c9973a] transition-colors">Conta d'usuari</a>
                
                <!-- Botó Sortir -->
                <form method="POST" action="{{ route('logout') }}" class="mt-19">
                    @csrf
                    <button type="submit" class="text-sm opacity-50 hover:opacity-100 transition-opacity 
                                                 uppercase cursor-pointer">
                        SORTIR
                    </button>
                </form>
            @endauth

            @guest
                <a href="/login" class="text-[#c9973a] mt-10 hover:text-white transition-colors">
                    Iniciar Sessió
                </a>
            @endguest
        </div>
    </div>
    <!-- Contingut Principal -->
    <!-- Contingut Principal -->
    <main style="padding-top: calc(env(safe-area-inset-top) + 110px);" 
                class="flex-grow w-full max-w-7xl mx-auto px-4 md:px-6">
        
        <!-- Sistema de Notificacions -->
        <div class="max-w-4xl mx-auto mt-6">
            @if(session('success'))
                <div class="bg-[#00c950]/10 border border-[#00c950] text-[#00c950] px-4 md:px-6 py-4 
                            rounded-lg flex items-center justify-between shadow-lg mb-6">
                    <span class="text-[10px] md:text-sm tracking-widest uppercase">{{ session('success') }}</span>
                    <button onclick="this.parentElement.style.display='none'" 
                            class="text-[#00c950] hover:text-white transition-colors ml-4">✕</button>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-[#fb2c36]/10 border border-[#fb2c36] text-[#fb2c36] px-4 md:px-6 py-4 
                            rounded-lg flex items-center justify-between shadow-lg mb-6">
                    <span class="text-[10px] md:text-sm tracking-widest uppercase">{{ session('error') }}</span>
                    <button onclick="this.parentElement.style.display='none'" 
                            class="text-[#fb2c36] hover:text-white transition-colors ml-4">✕</button>
                </div>
            @endif

            @if(session('info'))
                <div class="bg-[#c9973a]/10 border border-[#c9973a] text-[#c9973a] px-4 md:px-6 py-4 
                            rounded-lg flex items-center justify-between shadow-lg mb-6">
                    <span class="text-[10px] md:text-sm tracking-widest uppercase">{{ session('info') }}</span>
                    <button onclick="this.parentElement.style.display='none'" 
                            class="text-[#c9973a] hover:text-white transition-colors ml-4">✕</button>
                </div>
            @endif
        </div>

        <!-- Vista filla -->
        @yield('content')
        
    </main>

    <!-- Peu de pàgina : Footer -->
    <footer class="bg-[#282119] border-t border-[#3d352b] py-12 px-6 mt-20">
        <div class="max-w-7xl mx-auto flex flex-col items-center text-center gap-12 md:gap-16">
            
            <div class="flex flex-col items-center">
                <h4 class="text-[#c9973a] tracking-widest uppercase mb-4 md:mb-6 text-xl md:text-[30px]">
                    Navegació
                </h4>
                <ul class="text-[#a0937f] flex flex-col items-center gap-4 md:gap-6">
                    <li><a href="/home" class="hover:text-white transition-colors text-sm md:text-[20px]">Inici</a></li>
                    <li><a href="/obras" class="hover:text-white transition-colors text-sm md:text-[20px]">Obres d'art</a></li>
                    <li><a href="/talleres" class="hover:text-white transition-colors text-sm md:text-[20px]">Tallers</a></li>
                    @auth
                        <li><a href="/usuario" class="hover:text-white transition-colors text-sm md:text-[20px]">El meu compte</a></li>
                    @endauth
                </ul>
            </div>
            
            <div class="flex flex-col items-center">
                <h4 class="text-[#c9973a] tracking-widest uppercase mb-4 md:mb-6 text-xl md:text-[30px]">
                    Ajuda
                </h4>
                <ul class="text-[#a0937f] flex flex-col items-center gap-4 md:gap-6">
                    <li><a href="/informacion" class="hover:text-white transition-colors text-sm md:text-[20px]">Contacte</a></li>
                    <li><a href="/informacion" class="hover:text-white transition-colors text-sm md:text-[20px]">Preguntes freqüents</a></li>
                    <li><a href="/informacion" class="hover:text-white transition-colors text-sm md:text-[20px]">Enviaments</a></li>
                </ul>
            </div>
            
            <div class="flex flex-col items-center">
                <a href="https://www.instagram.com/ainoanona?igsh=dWYxdWFpOXE4YmQ3" 
                   class="text-[#a0937f] hover:text-[#c9973a] transition-colors mb-4 md:mb-6" 
                   aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" 
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                         stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <div class="text-[#f2ede6] text-2xl md:text-[30px] mb-2 md:mb-4 tracking-widest">NONART</div>
                <div class="text-[#a0937f] text-sm md:text-[25px] uppercase">© 2026 Nonart</div>
            </div>
            
        </div>
    </footer>
    
    <!-- Script de control del menú lateral -->
    <script>
        const btn = document.getElementById('menuBtn');
        const close = document.getElementById('closeMenu');
        const menu = document.getElementById('sideMenu');
        
        btn.onclick = () => menu.classList.remove('translate-x-full');
        close.onclick = () => menu.classList.add('translate-x-full');
    </script>
    
    <!-- Injecció d'scripts addicionals de les vistes -->
    @stack('scripts')
</body>
</html>