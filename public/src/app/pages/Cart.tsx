import { Link } from "react-router";
import { ShoppingCart, CreditCard } from "lucide-react";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";

export default function Cart() {
  return (
    <div className="flex flex-col w-full min-h-screen bg-[#1e1914] px-5 py-8 items-center pb-24">
      
      {/* Header */}
      <div className="text-center mb-8">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Finalitza</h2>
        <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-4xl">Compra</h1>
      </div>

      {/* Cart Items */}
      <div className="w-full max-w-[400px] flex flex-col gap-4 mb-8">
        <div className="flex items-center gap-2 mb-2 text-[#f2ede6]">
          <ShoppingCart size={18} />
          <h3 className="font-['Dela_Gothic_One',sans-serif] text-xl">Resum Compra</h3>
        </div>

        {/* Item 1 */}
        <div className="bg-[#282119] rounded-xl border border-[#3d352b] p-4 flex gap-4 items-center">
          <ImageWithFallback 
            src="https://images.unsplash.com/photo-1745758278428-d733e4d66a74?auto=format&fit=crop&w=200&q=80" 
            alt="Item 1" 
            className="w-16 h-16 rounded-lg object-cover flex-shrink-0"
          />
          <div className="flex flex-col flex-grow justify-center">
            <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm leading-[1.4] mb-1">Mirada temptadora</h4>
            <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-wide uppercase">Pintura original</p>
          </div>
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-lg">125€</span>
        </div>

        {/* Item 2 */}
        <div className="bg-[#282119] rounded-xl border border-[#3d352b] p-4 flex gap-4 items-center">
          <ImageWithFallback 
            src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=200&q=80" 
            alt="Item 2" 
            className="w-16 h-16 rounded-lg object-cover flex-shrink-0"
          />
          <div className="flex flex-col flex-grow justify-center">
            <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm leading-[1.4] mb-1">Reserva taller</h4>
            <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-wide uppercase">Art and Wine - 17 Agost</p>
          </div>
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-lg">50€</span>
        </div>
      </div>

      {/* Payment Details */}
      <div className="w-full max-w-[400px] bg-[#282119] rounded-2xl border border-[#3d352b] p-6 shadow-xl flex flex-col">
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl mb-6">Detall de pagament</h3>

        <div className="flex justify-between items-center mb-3">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-xs tracking-wider uppercase">TOTAL articles</span>
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">175,00€</span>
        </div>
        
        <div className="flex justify-between items-center mb-6">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-xs tracking-wider uppercase">IVA (21%)</span>
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">36,75€</span>
        </div>

        <div className="w-full border-t border-[#3d352b] mb-6" />

        <div className="flex justify-between items-center mb-8">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-lg tracking-wider uppercase">TOTAL</span>
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xl">211,75€</span>
        </div>

        <button className="w-full bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] h-14 rounded-lg flex items-center justify-center gap-2 transition-colors mb-6 shadow-lg">
          <span className="font-['Dela_Gothic_One',sans-serif] text-sm tracking-wide uppercase mt-[2px]">PAGAMENT</span>
          <CreditCard size={18} strokeWidth={2.5} />
        </button>

        <Link to="/obres" className="w-full text-center">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-[10px] tracking-[1px] uppercase transition-colors underline underline-offset-4 decoration-[0.5px]">
            SEGUIR COMPRANT
          </span>
        </Link>
      </div>

    </div>
  );
}
