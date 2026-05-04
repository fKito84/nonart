@extends('master')
@section('title', 'Nova Contrasenya')

@section('content')
<!-- Contenidor principal -->
<div class="flex items-center justify-center min-h-[70vh] px-4 md:px-0 py-8 md:py-0">
    
    <!-- Targeta del formulari -->
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] rounded-2xl 
                p-6 md:p-12 shadow-2xl">
        
        <!-- Capçalera -->
        <div class="text-center mb-8 md:mb-10">
            <h1 class="text-2xl md:text-3xl text-[#f2ede6] uppercase mb-2">
                Nova Contrasenya
            </h1>
            <p class="text-[#a0937f] text-xs md:text-sm tracking-widest">
                Introdueix la teva nova contrasenya de seguretat.
            </p>
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-5 md:space-y-6">
            @csrf 
           
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Error de correu -->
            @error('email')
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg text-[#fb2c36] 
                            text-[10px] md:text-xs text-center tracking-widest uppercase">
                    {{ $message }}
                </div>
            @enderror

            <!-- Error de contrasenya  -->
            @error('password')
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg text-[#fb2c36] 
                            text-[10px] md:text-xs text-center tracking-widest uppercase">
                    Les contrasenyes no coincideixen o no són vàlides.
                </div>
            @enderror

            <!-- Camp: Correu electrònic -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Correu electrònic:</label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" 
                       class="w-full bg-[#1e1914] border border-[#3d352b] text-[#a0937f] rounded-lg 
                              px-4 py-3 focus:outline-none cursor-not-allowed" readonly>
            </div>

            <!-- Camp: Nova Contrasenya -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Nova Contrasenya:</label>
                <input type="password" name="password" required 
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors">
            </div>

            <!-- Camp: Confirmar Contrasenya -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Repeteix la Contrasenya:</label>
                <input type="password" name="password_confirmation" required 
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors">
            </div>

            <!-- Botó d'enviament -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full py-3 md:py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-xs 
                               md:text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                    Desar Contrasenya
                </button>
            </div>
        </form>

    </div>
</div>
@endsection