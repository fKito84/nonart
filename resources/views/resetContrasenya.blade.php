@extends('master')
@section('title', 'Nova Contrasenya')

@section('content')
<div class="flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] rounded-2xl p-8 sm:p-12 shadow-2xl">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl text-[#f2ede6] uppercase mb-2">Nova Contrasenya</h1>
            <p class="text-[#a0937f] text-sm tracking-widest">Introdueix la teva nova contrasenya de seguretat.</p>
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf 
            
            <input type="hidden" name="token" value="{{ $token }}">

            @error('email')
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg
                                 text-[#fb2c36] text-xs text-center tracking-widest uppercase">
                    {{ $message }}
                </div>
            @enderror

            @error('password')
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg
                             text-[#fb2c36] text-xs text-center tracking-widest uppercase">
                    Les contrasenyes no coincideixen o no són vàlides.
                </div>
            @enderror

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                                tracking-widest mb-2">Correu electrònic:</label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" 
                        class="w-full bg-[#1e1914] border border-[#3d352b] text-[#a0937f] rounded-lg 
                        px-4 py-3 focus:outline-none cursor-not-allowed" readonly>
            </div>

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                                tracking-widest mb-2">Nova Contrasenya:</label>
                <input type="password" name="password" required class="w-full bg-[#332b22] border border-[#3d352b] 
                                                                    text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none 
                                                                        focus:border-[#c9973a] transition-colors">
            </div>

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                                tracking-widest mb-2">Repeteix la Contrasenya:</label>
                <input type="password" name="password_confirmation" required class="w-full bg-[#332b22] border border-[#3d352b] 
                                                                                text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none 
                                                                                focus:border-[#c9973a] transition-colors">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-[#c9973a] text-[#1e1914] 
                                            rounded-lg text-sm uppercase tracking-widest 
                                            hover:bg-[#b08432] transition-colors">
                    Desar Contrasenya
                </button>
            </div>
        </form>

    </div>
</div>
@endsection