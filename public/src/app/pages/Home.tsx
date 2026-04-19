import { Link } from "react-router";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";

export default function Home() {
  return (
    <div className="flex flex-col w-full bg-[#1e1914]">
      {/* Hero Section */}
      <div className="relative w-full h-[500px] overflow-hidden flex flex-col justify-center items-center">
        <ImageWithFallback 
          src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=1080&q=80" 
          alt="Art Workshop" 
          className="absolute inset-0 w-full h-full object-cover opacity-50"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-transparent to-[#1e1914] z-10" />
        
        <div className="relative z-20 text-center px-4 flex flex-col items-center">
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Taller Destacat</p>
          <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-4xl mb-4">Art and Wine</h1>
          <p className="font-['Inter',sans-serif] text-[#f2ede6] text-sm text-center max-w-[280px]">
            Descobreix la nostra experiència: gaudeix de la pintura i el vi en un ambient creatiu i únic.
          </p>
        </div>
      </div>

      {/* Obres d'art section */}
      <section className="px-6 py-12 flex flex-col items-center">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Col·lecció</h2>
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-3xl mb-8">Obres d'art</h3>
        
        <div className="w-full max-w-[340px] bg-[#282119] rounded-xl overflow-hidden border border-[#3d352b] flex flex-col">
          <ImageWithFallback 
            src="https://images.unsplash.com/photo-1700607125451-3637d313b3f0?auto=format&fit=crop&w=600&q=80" 
            alt="Artwork" 
            className="w-full h-[220px] object-cover"
          />
          <div className="p-6">
            <div className="flex justify-between items-start mb-2">
              <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl">Bessones</h4>
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-lg">150€</span>
            </div>
            <p className="font-['Inter',sans-serif] text-[#a0937f] text-sm mb-4 italic">Ainoa Sillero</p>
            <div className="flex items-center gap-2 mb-6">
              <div className="w-2 h-2 rounded-full bg-[#00c950]" />
              <span className="font-['Inter',sans-serif] text-[#f2ede6] text-xs">Disponible</span>
            </div>
            <Link to="/obres/bessones" className="block w-full py-4 text-center bg-[#3d352b] hover:bg-[#c9973a] text-[#f2ede6] hover:text-[#1e1914] font-['Dela_Gothic_One',sans-serif] text-sm tracking-wider uppercase rounded transition-colors">
              Veure Detall
            </Link>
          </div>
        </div>

        <Link to="/obres" className="mt-8 px-8 py-4 bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] font-['Dela_Gothic_One',sans-serif] text-sm tracking-wider uppercase rounded shadow-lg transition-colors">
          Veure Galeria
        </Link>
      </section>

      {/* Tallers section */}
      <section className="px-6 py-12 flex flex-col items-center bg-[#282119]/30">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Esdeveniments</h2>
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-3xl mb-8">Tallers</h3>

        <div className="w-full max-w-[340px] bg-[#282119] rounded-xl overflow-hidden border border-[#3d352b] flex flex-col">
          <ImageWithFallback 
            src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=600&q=80" 
            alt="Workshop" 
            className="w-full h-[220px] object-cover"
          />
          <div className="p-6 text-center">
            <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl mb-2">ART and Wine</h4>
            <p className="font-['Inter',sans-serif] text-[#a0937f] text-sm mb-6">experiència única</p>
            <Link to="/tallers" className="block w-full py-4 text-center bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] font-['Dela_Gothic_One',sans-serif] text-sm tracking-wider uppercase rounded transition-colors">
              Veure Taller
            </Link>
          </div>
        </div>
      </section>

      {/* Description section */}
      <section className="px-6 py-16 text-center">
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl mb-6">Descripció</h3>
        <p className="font-['Inter',sans-serif] text-[#a0937f] text-sm leading-relaxed max-w-[300px] mx-auto">
          La nostra passió per l'art es reflecteix en cada obra. Seleccionem les millors peces per als nostres clients, garantint l'autenticitat i la qualitat de cada creació.
        </p>
      </section>
    </div>
  );
}
