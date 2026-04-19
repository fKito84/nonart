<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NONART - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Dela Gothic One', sans-serif; 
            background-color: #1e1914; 
            color: #f2ede6;
        }
        /* Ajuste para que la tipografía se vea fluida en web */
        p, h1, h2, h3, h4, a, button, span { font-family: 'Dela Gothic One', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <nav class="fixed top-0 left-0 w-full h-[80px] bg-[#1e1914]/95 backdrop-blur-md border-b border-[#3d352b] z-50 flex items-center justify-between px-6 lg:px-12">
        <a href="{{ route('home') }}" class="flex items-center">
            <div class="bg-[#f2ede6] text-[#1e1914] p-2 rounded-lg text-sm lg:text-base">NONART</div>
        </a>

        <div class="hidden md:flex gap-8 text-sm uppercase tracking-widest text-[#a0937f]">
            <a href="{{ route('home') }}" class="hover:text-[#c9973a] transition-colors">Inici</a>
            <a href="{{ route('tenda') }}" class="hover:text-[#c9973a] transition-colors">Obres d'art</a>
            <a href="{{ route('tallers') }}" class="hover:text-[#c9973a] transition-colors">Tallers</a>
        </div>

        <div class="flex items-center gap-4 lg:gap-6">
            <a href="{{ route('login') }}" class="text-[#f2ede6] hover:text-[#c9973a]">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 7a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg>
            </a>
            <a href="{{ route('carret') }}" class="text-[#f2ede6] hover:text-[#c9973a] relative">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </a>
            <button id="menuBtn" class="text-[#f2ede6] hover:text-[#c9973a]">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
            </button>
        </div>
    </nav>

    <div id="sideMenu" class="fixed inset-0 bg-[#1e1914]/90 z-[60] flex flex-col items-center justify-center translate-x-full transition-transform duration-300">
        <button id="closeMenu" class="absolute top-6 right-6 text-[#f2ede6]">TANCAR</button>
        <div class="flex flex-col gap-6 text-center text-xl lg:text-2xl uppercase">
            <a href="{{ route('home') }}" class="hover:text-[#c9973a]">Inici</a>
            <a href="{{ route('tenda') }}" class="hover:text-[#c9973a]">Obres d'art</a>
            <a href="{{ route('tallers') }}" class="hover:text-[#c9973a]">Tallers</a>
            <a href="{{ route('carret') }}" class="hover:text-[#c9973a]">Carret de la compra</a>
            <a href="{{ route('usuari') }}" class="hover:text-[#c9973a]">Conta d'usuari</a>
            <a href="#" class="text-sm mt-8 opacity-50">SORTIR</a>
        </div>
    </div>

    <main class="flex-grow pt-[100px] w-full max-w-7xl mx-auto px-6">
        @yield('content')
    </main>

    <footer class="bg-[#282119] border-t border-[#3d352b] py-12 px-6 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
            <div>
                <h4 class="text-[#c9973a] text-sm tracking-widest uppercase mb-4">Navegació</h4>
                <ul class="text-[#a0937f] text-xs flex flex-col gap-2">
                    <li><a href="{{ route('home') }}">Inici</a></li>
                    <li><a href="{{ route('tenda') }}">Obres d'art</a></li>
                    <li><a href="{{ route('tallers') }}">Tallers</a></li>
                    <li><a href="{{ route('usuari') }}">El meu compte</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-[#c9973a] text-sm tracking-widest uppercase mb-4">Ajuda</h4>
                <ul class="text-[#a0937f] text-xs flex flex-col gap-2">
                    <li><a href="#">Contacte</a></li>
                    <li><a href="#">Preguntes freqüents</a></li>
                    <li><a href="#">Enviaments</a></li>
                </ul>
            </div>
            <div class="flex flex-col items-center md:items-end">
                <div class="text-[#f2ede6] text-2xl mb-2">NONART</div>
                <div class="text-[#a0937f] text-[10px] uppercase">© 2026 Nonart</div>
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
</body>
</html>