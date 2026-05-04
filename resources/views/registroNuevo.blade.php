@extends('master')
@section('title', 'Crea el teu compte')

@section('content')
<!-- Contenidor principal -->
<div class="flex items-center justify-center min-h-[70vh] py-8 md:py-12 px-4 md:px-0">
    
    <!-- Targeta del formulari -->
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] rounded-2xl 
                p-6 md:p-12 shadow-2xl">
        
        <!-- Capçalera -->
        <div class="text-center mb-8 md:mb-10">
            <h1 class="text-2xl md:text-3xl text-[#f2ede6] uppercase mb-2">Nou Compte</h1>
            <p class="text-[#a0937f] text-xs md:text-sm tracking-widest">
                Uneix-te a la família Nonart.
            </p>
        </div>

        <form action="{{ route('register.post') }}" method="POST" class="space-y-5 md:space-y-6">
            @csrf 

            <!-- Llista d'errors -->
            @if ($errors->any())
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg text-[#fb2c36] 
                            text-[10px] text-center tracking-widest uppercase">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Camp: Nom complet -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Nom complet:</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="El teu usuari" 
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors 
                              placeholder:text-[#a0937f]/50" required>
            </div>

            <!-- Camp: Correu electrònic -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Correu electrònic:</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                       placeholder="correu@exemple.com" onkeydown="return event.code !== 'Space'" 
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors 
                              placeholder:text-[#a0937f]/50" required>
            </div>

            <!-- Camp: Contrasenya -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Contrasenya:</label>
                <input type="password" name="password" placeholder="Mínim 6 caràcters" 
                       onkeydown="return event.code !== 'Space'"
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors 
                              placeholder:text-[#a0937f]/50" required>
            </div>

            <!-- Camp: Repetir contrasenya -->
            <div>
                <label class="block text-[#c9973a] text-[13px] md:text-[15px] uppercase 
                              tracking-widest mb-2">Repeteix contrasenya:</label>
                <input type="password" name="password_confirmation" placeholder="Torna a escriure-la" 
                       onkeydown="return event.code !== 'Space'"
                       class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg 
                              px-4 py-3 focus:outline-none focus:border-[#c9973a] transition-colors 
                              placeholder:text-[#a0937f]/50" required>
            </div>

            <!-- Botó d'enviament -->
            <div class="pt-4">
                <button type="submit" 
                        class="w-full py-3 md:py-4 bg-[#c9973a] text-[#1e1914] rounded-lg text-xs 
                               md:text-sm uppercase tracking-widest hover:bg-[#b08432] transition-colors">
                    Crear Compte
                </button>
            </div>
            
            <!-- Enllaç a Login -->
            <div class="text-center pt-2 md:pt-4">
                <a href="{{ route('login') }}" 
                   class="text-[#a0937f] text-[12px] md:text-[15px] uppercase tracking-widest 
                          hover:text-[#f2ede6] transition-colors">
                    Ja tens compte? Inicia sessió aquí
                </a>
            </div>
        </form>

    </div>
</div>
@endsection