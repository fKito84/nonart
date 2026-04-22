@extends('master')
@section('title', 'Carret de la Compra')

@section('content')
<div class="space-y-12 pb-12">
    
    <div class="text-center">
        <span class="text-[#c9973a] text-[40px] uppercase tracking-[3px]">Finalitza Compra</span>
        <h1 class="text-4xl md:text-5xl mt-2 mb-10">Resum Compra</h1>
    </div>

    <div class="max-w-4xl mx-auto w-full lg:w-[70%] space-y-8">
        
        @if(empty($carrito))
            <div class="text-center py-20 bg-[#282119] border border-dashed border-[#3d352b] rounded-2xl shadow-xl">
                <p class="text-[#a0937f] uppercase tracking-widest text-lg mb-6">El teu carret està buit</p>
                <a href="/obras" class="inline-block px-8 py-3 text-[#c9973a] border 
                                border-[#c9973a] rounded-lg hover:bg-[#c9973a] hover:text-[#1e1914] 
                                transition-colors uppercase tracking-widest text-xs">
                    Veure obres disponibles
                </a>
            </div>
        @else
            
            <div class="space-y-6">
                @foreach($carrito as $key => $item)
                    <div class="flex flex-col sm:flex-row gap-6 bg-[#282119] border border-[#3d352b] p-8 
                                rounded-2xl items-center sm:items-start relative hover:border-[#c9973a] 
                                    transition-all duration-300 shadow-lg">
                        
                        <form action="{{ route('carrito.destroy', $key) }}" method="POST" class="absolute top-4 right-6">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[#fb2c36] text-[10px] uppercase tracking-widest
                                                 hover:text-white transition-colors"> ✕ Eliminar </button>
                        </form>

                        <div class="w-32 h-32 bg-[#332b22] rounded-xl shrink-0 flex items-center 
                            justify-center overflow-hidden border {{ $item['tipo'] == 'taller' ? 
                                'border-dashed border-[#c9973a]' : 'border-transparent' }}">
                            @if($item['tipo'] == 'obra')
                                <img src="{{ asset($item['imagen']) }}" class="w-full h-full object-cover rounded-xl" alt="Obra">
                            @else
                                <img src="/images/talleres/fotoTaller.png" class="w-full h-full object-cover rounded-xl" alt="Taller">
                            @endif
                        </div>
                        <div class="flex-grow text-center sm:text-left pt-2 flex flex-col justify-center h-full">
                            <h3 class="text-[20px]  text-[#f2ede6] mb-3 pr-8"> {{ $item['titulo'] }} </h3>
                            
                            @if($item['tipo'] == 'obra')
                                <p class="text-[#a0937f] text-[20px]  tracking-widest">Obra original única</p>
                            @else
                                <p class="text-[#a0937f] text-[20px]  tracking-widest">
                                    Reserva per a 
                                    <span class="text-[#c9973a] font-bold">
                                    {{ $item['cantidad'] }} {{ $item['cantidad'] > 1 ? 'persones' : 'persona' }}</span>
                                </p>
                            @endif
                        </div>
                        
                        <div class="text-4xl text-[#c9973a] sm:pt-4 ">
                            {{ number_format($item['precio'] * $item['cantidad'], 2, ',', '.') }}€
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-[#282119] border border-[#3d352b] rounded-2xl p-10 mt-12 shadow-2xl">
                <h3 class="text-[30px]  text-[#c9973a] mb-10 uppercase text-center border-b border-[#3d352b]
                 pb-6 tracking-widest">Detall de pagament</h3>
                
                <div class="max-w-md mx-auto space-y-6 mb-12">
                    <div class="flex justify-between text-sm uppercase tracking-widest">
                        <span class="text-[#a0937f] text-[20px] ">Base Imposable</span>
                        <span class="text-[#f2ede6] text-[20px] ">{{ number_format($subtotal, 2, ',', '.') }}€</span>
                    </div>
                    <div class="flex justify-between text-sm uppercase tracking-widest border-b border-[#3d352b] pb-6">
                        <span class="text-[#a0937f] text-[20px]">IVA (21%)</span>
    
                        <span class="text-[#f2ede6] text-[20px]">{{ number_format($iva, 2, ',', '.') }}€</span>
                    </div>
                    <div class="flex justify-between text-[20px] text-[#c9973a] pt-4 font-light">
                        <span>TOTAL</span>
                        <span>{{ number_format($total_amb_iva, 2, ',', '.') }}€</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <a href="/obras" class="w-full flex items-center justify-center py-4 border text-[12px] border-[#3d352b] text-[#a0937f] 
                        rounded-xl  uppercase tracking-widest hover:text-[#f2ede6] hover:border-[#f2ede6] transition-colors">
                        Seguir Comprant
                    </a>
                    <form action="{{ route('carrito.pagar') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full py-4 bg-[#c9973a] text-[#1e1914] rounded-xl font-bold text-[12px] uppercase tracking-[2px] hover:bg-[#e6ae42] transition-colors shadow-lg">
                            Pagar Ara
                        </button>
                    </form>
                </div>
            </div>

        @endif
    </div>
</div>
@endsection