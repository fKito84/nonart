import { Link, useNavigate } from "react-router";
import { ArrowLeft, ShoppingBag } from "lucide-react";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";

export default function ArtworkDetail() {
  const navigate = useNavigate();

  return (
    <div className="flex flex-col w-full min-h-screen bg-[#1e1914] px-5 py-6">
      
      {/* Back Button */}
      <button 
        onClick={() => navigate(-1)} 
        className="flex items-center gap-2 text-[#a0937f] hover:text-[#f2ede6] transition-colors mb-6 w-max mx-auto mt-4"
      >
        <ArrowLeft size={16} />
        <span className="font-['Dela_Gothic_One',sans-serif] text-[10px] tracking-[1px] uppercase mt-[2px]">Tornar a obres</span>
      </button>

      {/* Image Container */}
      <div className="w-full max-w-[400px] mx-auto bg-[#282119] rounded-xl overflow-hidden border border-[#3d352b] mb-8 shadow-xl">
        <div className="p-1">
          <ImageWithFallback 
            src="https://images.unsplash.com/photo-1700607125451-3637d313b3f0?auto=format&fit=crop&w=800&q=80" 
            alt="Artwork Detail" 
            className="w-full h-auto aspect-square object-cover rounded-[10px]"
          />
        </div>
      </div>

      {/* Artwork Info */}
      <div className="w-full max-w-[400px] mx-auto flex flex-col gap-6 mb-8">
        
        <div className="flex flex-col gap-1">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-sm tracking-[1px] uppercase">Galeria</span>
          <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-3xl">Noia Elegant</h1>
        </div>

        <div className="flex flex-col gap-1">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-sm tracking-[1px] uppercase">Col·lecció</span>
          <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl">Vides</h2>
        </div>

        <div className="flex flex-col gap-1 mb-2">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-sm tracking-[1px] uppercase">Artista</span>
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-lg">Ainoa Sillero Bernaldez</p>
        </div>

        {/* Price & Status Box */}
        <div className="bg-[#282119] rounded-xl border border-[#3d352b] flex items-center h-[90px] w-full">
          <div className="flex-1 flex flex-col px-6">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase mb-1">Preu</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl">125€</span>
          </div>
          <div className="flex-1 flex flex-col px-6 border-l border-[#3d352b]">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase mb-1">Estat</span>
            <div className="flex items-center gap-2 mt-1">
              <div className="w-[10px] h-[10px] rounded-full bg-[#00c950]" />
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Disponible</span>
            </div>
          </div>
        </div>

        {/* Description */}
        <div className="flex flex-col gap-3 mt-4 border-b border-[#3d352b] pb-8">
          <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-sm tracking-[1px] uppercase">Descripció</span>
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm leading-[1.6]">
            Una pintura acrílica que captura l'essència i el misteri d'una noia elegant en plena primavera.
          </p>
        </div>

        {/* Add to Cart Button */}
        <button 
          onClick={() => navigate('/carret')}
          className="w-full bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] h-14 rounded-md flex items-center justify-center gap-3 transition-colors mt-2 shadow-lg"
        >
          <ShoppingBag size={20} strokeWidth={2.5} />
          <span className="font-['Dela_Gothic_One',sans-serif] text-sm tracking-wide uppercase mt-[2px]">Afegir al carret</span>
        </button>

      </div>
    </div>
  );
}
