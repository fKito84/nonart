@extends('master')
@section('title', 'Recuperar Contrasenya')

@section('content')
<!-- Contenidor principal -->
<div class="flex items-center justify-center min-h-[60vh] px-4 md:px-0">
    
    <!-- Targeta del formulari -->
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] rounded-2xl 
                p-6 md:p-12 shadow-2xl">
        
        <!-- Capçalera -->
        <div class="text-center mb-8 md:mb-10">
            <h1 class="text-2xl md:text-3xl text-[#f2ede6] uppercase mb-2">
                Recuperar Contrasenya
            </h1>
            <p class="text-[#a0937f] text-xs md:text-sm tracking-widest">
                Introdueix el teu correu i t'enviarem un enllaç.
            </p>
        </div>

        <!-- Missatge d'èxit (enllaç enviat) -->
        @if (session('status'))
            <div class="mb-6 p-4 bg-[#00c950]/20 border border-[#00c950]/50 rounded-lg 
                        text-[#00c950] text-[10px] md:text-xs text-center tracking-widest uppercase">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
            @csrf 

            <!-- Error de correu no trobat -->
            @error('email')
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg 
                            text-[#fb2c36] text-[10px] md:text-xs text-center tracking-widest uppercase">
                    {{ $message }}
                </div>
            @enderror

            <!-- Camp: Correu electrònic -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Correu electrònic:</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="El teu correu" 
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors 
                              placeholder:text-[#a0937f]/50" required>
            </div>

            <!-- Botó d'enviament -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full py-3 md:py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-xs 
                               md:text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                    Enviar Enllaç
                </button>
            </div>
            
            <!-- Enllaç de retorn -->
            <div class="text-center pt-2 md:pt-4">
                <a href="/login" class="text-[#a0937f] text-[12px] md:text-[15px] uppercase tracking-widest 
                                        hover:text-[#f2ede6] transition-colors">
                    Tornar a l'inici de sessió
                </a>
            </div>
        </form>

    </div>
</div>
@endsection