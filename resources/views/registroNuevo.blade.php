@extends('master')
@section('title', 'Crea el teu compte')

@section('content')
<div class="flex items-center justify-center min-h-[70vh] py-12">
    <div class="w-full max-w-md bg-[#282119] border border-[#3d352b] 
                    rounded-2xl p-8 sm:p-12 shadow-2xl">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl text-[#f2ede6] uppercase mb-2">Nou Compte</h1>
            <p class="text-[#a0937f] text-sl tracking-widest">Uneix-te a la família Nonart.</p>
        </div>

        <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
            @csrf 

            @if ($errors->any())
                <div class="p-3 bg-[#fb2c36]/20 border border-[#fb2c36]/50 rounded-lg 
                            text-[#fb2c36] text-[10px] text-center tracking-widest uppercase">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                        tracking-widest mb-2">Nom complet:</label>
               <input type="text" name="name" value="{{ old('name') }}" placeholder="El teu usuari" 
                        class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 
                        focus:outline-none focus:border-[#c9973a] transition-colors 
                        placeholder:text-[#a0937f]/50" required>
            </div>

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                        tracking-widest mb-2">Correu electrònic:</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    placeholder="correu@exemple.com" onkeydown="return event.code !== 'Space'" 
                        class="w-full bg-[#332b22] border border-[#3d352b] 
                        text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] 
                        transition-colors placeholder:text-[#a0937f]/50" required>
            </div>

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                    tracking-widest mb-2">Contrasenya:</label>
                <input type="password" name="password" placeholder="Mínim 6 caràcters" 
                    onkeydown="return event.code !== 'Space'"
                    class="w-full bg-[#332b22] border 
                    border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 focus:outline-none focus:border-[#c9973a] 
                            transition-colors placeholder:text-[#a0937f]/50" required>
            </div>

            <div>
                <label class="block text-[#c9973a] text-[15px] uppercase 
                        tracking-widest mb-2">Repeteix contrasenya:</label>
                <input type="password" name="password_confirmation" placeholder="Torna a escriure-la" 
                        onkeydown="return event.code !== 'Space'"
                        class="w-full bg-[#332b22] border border-[#3d352b] text-[#f2ede6] rounded-lg px-4 py-3 
                            focus:outline-none focus:border-[#c9973a] transition-colors
                             placeholder:text-[#a0937f]/50" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-[#c9973a] text-[#1e1914] 
                    rounded-lg text-sm uppercase tracking-widest 
                                    hover:bg-[#b08432] transition-colors">
                    Crear Compte
                </button>
            </div>
            
            <div class="text-center pt-4">
                <a href="{{ route('login') }}" class="text-[#a0937f] text-[15px] 
                        uppercase tracking-widest hover:text-[#f2ede6] 
                            transition-colors">Ja tens compte? Inicia sessió aquí</a>
            </div>
        </form>

    </div>
</div>
@endsection