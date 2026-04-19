@extends('master')
@section('title', 'Inici de Sessió')

@section('content')
<div class="flex items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] rounded-2xl p-8 sm:p-12 shadow-2xl">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl text-[#f2ede6] uppercase mb-2">Inici de Sessió</h1>
            <p class="text-[#a0937f] text-sm tracking-widest">Introdueix credencials per accedir.</p>
        </div>

        <form action="#" method="POST" class="space-y-6">
            <div>
                <label class="block text-[#c9973a] text-[10px] uppercase tracking-widest mb-2">Usuari:</label>
                <input type="text" placeholder="El_teu_usuari" class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors placeholder:text-[#a0937f]/50">
            </div>

            <div>
                <label class="block text-[#c9973a] text-[10px] uppercase tracking-widest mb-2">Contrasenya:</label>
                <input type="password" placeholder="********" class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors placeholder:text-[#a0937f]/50">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                    Iniciar Sessió
                </button>
            </div>
            
            <div class="text-center pt-4">
                <a href="#" class="text-[#a0937f] text-[10px] uppercase tracking-widest hover:text-[#f2ede6] transition-colors">Has oblidat la contrasenya?</a>
            </div>
        </form>

    </div>
</div>
@endsection