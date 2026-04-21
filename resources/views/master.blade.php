<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>NONART - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">
    <style>
        body { 
            font-family: 'Dela Gothic One', sans-serif; 
            background-color: #1e1914; 
            color: #f2ede6;
        }
       
        p, h1, h2, h3, h4, a, button, span { font-family: 'Dela Gothic One', sans-serif; }

        /* Días deshabilitados en rojo */
        .flatpickr-day.flatpickr-disabled, 
        .flatpickr-day.flatpickr-disabled:hover {
            color: #fb2c36 !important;
            cursor: not-allowed;
            opacity: 0.5;
        }
        /* Color de fondo del input para que combine con tu diseño */
        .datepicker-input {
            background-color: #332b22 !important;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col mx-auto min-w-[320px] max-w-[1600px] overflow-x-hidden">

   <nav class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[1600px] min-w-[320px] h-[80px] 
                bg-[#1e1914]/95 backdrop-blur-md border-b border-[#3d352b] z-50 flex items-center 
                justify-between px-6 lg:px-12">
        <a href="/home" class="flex items-center w-16 h-16">
            <img src="/images/aplicacion/logo.png" alt="Logo Nonart" class="w-full h-full object-cover rounded-2xl shadow-sm">
        </a>

        <div class="hidden md:flex gap-8 text-sm uppercase tracking-widest text-[#a0937f]">
            <a href="/home" class="hover:text-[#c9973a] transition-colors">Inici</a>
            <a href="/obras" class="hover:text-[#c9973a] transition-colors">Obres d'art</a>
            <a href="/talleres" class="hover:text-[#c9973a] transition-colors">Tallers</a>
        </div>

        <div class="flex items-center gap-5 lg:gap-7">
    
            <a href="/login" class="text-[#f2ede6] hover:text-[#c9973a] transition-colors flex items-center">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
            
            <a href="/carrito" class="text-[#f2ede6] hover:text-[#c9973a] transition-colors relative flex items-center">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </a>
            
            <button id="menuBtn" class="text-[#f2ede6] hover:text-[#c9973a] transition-colors flex items-center">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            
        </div>
    </nav>

    <div id="sideMenu" class="fixed top-0 right-0 h-full w-[80%] md:w-[25%] bg-[#1e1914] z-[60] flex flex-col items-center pt-24 translate-x-full transition-transform duration-300 shadow-2xl border-l border-[#3d352b]">
        
        <button id="closeMenu" class="absolute top-6 right-6 text-[#f2ede6] text-xs tracking-widest hover:text-[#c9973a]">TANCAR</button>
        
        <div class="flex flex-col gap-8 text-center text-lg lg:text-xl uppercase">
            <a href="/home" class="hover:text-[#c9973a] transition-colors">Inici</a>
            <a href="/obras" class="hover:text-[#c9973a] transition-colors">Obres d'art</a>
            <a href="/talleres" class="hover:text-[#c9973a] transition-colors">Tallers</a>
            <a href="/carrito" class="hover:text-[#c9973a] transition-colors">Carret de la compra</a>
            <a href="/usuari" class="hover:text-[#c9973a] transition-colors">Conta d'usuari</a>
            
            <a href="/home" class="text-xm mt-19 opacity-50 hover:opacity-100 transition-opacity">SORTIR</a>
        </div>
    </div>

    <main class="flex-grow pt-[100px] w-full max-w-7xl mx-auto px-6">
        @yield('content')
    </main>
    <footer class="bg-[#282119] border-t border-[#3d352b] py-12 px-6 mt-20">
        <div class="max-w-7xl mx-auto flex flex-col items-center text-center gap-16">
            
            <div class="flex flex-col items-center">
                <h4 class="text-[#c9973a] tracking-widest uppercase mb-6 text-[30px]">Navegació</h4>
                <ul class="text-[#a0937f] text-xs flex flex-col items-center gap-6">
                    <li><a href="/home" class="hover:text-white transition-colors text-[20px]">Inici</a></li>
                    <li><a href="/obras" class="hover:text-white transition-colors text-[20px]">Obres d'art</a></li>
                    <li><a href="/talleres" class="hover:text-white transition-colors text-[20px]">Tallers</a></li>
                    <li><a href="/usuari" class="hover:text-white transition-colors text-[20px]">El meu compte</a></li>
                </ul>
            </div>
            
            <div class="flex flex-col items-center">
                <h4 class="text-[#c9973a] tracking-widest uppercase mb-6 text-[30px]">Ajuda</h4>
                <ul class="text-[#a0937f] text-xs flex flex-col items-center gap-6">
                    <li><a href="#" class="hover:text-white transition-colors text-[20px]">Contacte</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-[20px]">Preguntes freqüents</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-[20px]">Enviaments</a></li>
                </ul>
            </div>
            
            <div class="flex flex-col items-center">
                <a href="https://www.instagram.com/ainoanona?igsh=dWYxdWFpOXE4YmQ3" class="text-[#a0937f] hover:text-[#c9973a] transition-colors mb-6" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <div class="text-[#f2ede6] text-[30px] mb-4 tracking-widest">NONART</div>
                <div class="text-[#a0937f] text-[25px] uppercase">© 2026 Nonart</div>
            </div>
            
        </div>
    </footer>
    

    <script>
        const btn = document.getElementById('menuBtn');
        const close = document.getElementById('closeMenu');
        const menu = document.getElementById('sideMenu');
        btn.onclick = () => menu.classList.remove('translate-x-full');
        close.onclick = () => menu.classList.add('translate-x-full');
    </script>
    @stack('scripts')
</body>
</html>