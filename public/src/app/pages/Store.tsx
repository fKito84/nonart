import { Link } from "react-router";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";

const artworksVideo = [
  { id: "1", title: "Pintura a l'oli", author: "Ainoa Sillero", price: "150€", status: "Venut", img: "https://images.unsplash.com/photo-1745758278428-d733e4d66a74?auto=format&fit=crop&w=600&q=80", color: "red" },
  { id: "2", title: "Noia Atractiva", author: "Ainoa Sillero", price: "175€", status: "Disponible", img: "https://images.unsplash.com/photo-1745758278428-d733e4d66a74?auto=format&fit=crop&w=600&q=80", color: "green" },
  { id: "3", title: "Noia Elegant", author: "Ainoa Sillero", price: "125€", status: "Disponible", img: "https://images.unsplash.com/photo-1700607125451-3637d313b3f0?auto=format&fit=crop&w=600&q=80", color: "green" },
  { id: "4", title: "Bessones", author: "Ainoa Sillero", price: "150€", status: "Disponible", img: "https://images.unsplash.com/photo-1700607125451-3637d313b3f0?auto=format&fit=crop&w=600&q=80", color: "green" },
];

const artworksEpidermis = [
  { id: "5", title: "HallDecolorat", author: "Ainoa Sillero", price: "140€", status: "Disponible", img: "https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=600&q=80", color: "green" },
  { id: "6", title: "Dona a la xarxa", author: "Ainoa Sillero", price: "160€", status: "Venut", img: "https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=600&q=80", color: "red" },
  { id: "7", title: "Mascara o dóna", author: "Ainoa Sillero", price: "120€", status: "Disponible", img: "https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=600&q=80", color: "green" },
  { id: "8", title: "Vergonya", author: "Ainoa Sillero", price: "145€", status: "Disponible", img: "https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=600&q=80", color: "green" },
];

export default function Store() {
  return (
    <div className="flex flex-col w-full bg-[#1e1914] pb-20">
      {/* Header Image */}
      <div className="relative w-full h-[240px] flex flex-col justify-center items-center">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2 relative z-20">Col·lecció Completa</h2>
        <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-4xl relative z-20">Obres d'art</h1>
      </div>

      <ImageWithFallback 
        src="https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=1080&q=80" 
        alt="Gallery" 
        className="w-full h-[180px] object-cover opacity-80"
      />

      {/* Collection Vides */}
      <section className="px-6 py-12 flex flex-col items-center">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Col·lecció</h2>
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-3xl mb-8">Vides</h3>
        
        <div className="w-full flex flex-col gap-6">
          {artworksVideo.map((art) => (
            <div key={art.id} className="w-full bg-[#282119] rounded-xl overflow-hidden border border-[#3d352b] flex flex-col">
              <div className="p-4">
                 <ImageWithFallback 
                  src={art.img} 
                  alt={art.title} 
                  className="w-full h-[280px] object-cover rounded-lg border border-[#3d352b]"
                />
              </div>
              <div className="px-6 pb-6 pt-2">
                <div className="flex justify-between items-start mb-2">
                  <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-lg">{art.title}</h4>
                  <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-base">{art.price}</span>
                </div>
                <p className="font-['Inter',sans-serif] text-[#a0937f] text-sm mb-4 italic">{art.author}</p>
                <div className="flex items-center gap-2 mb-6">
                  <div className={`w-2 h-2 rounded-full ${art.color === 'green' ? 'bg-[#00c950]' : 'bg-[#e30000]'}`} />
                  <span className="font-['Inter',sans-serif] text-[#f2ede6] text-xs">{art.status}</span>
                </div>
                <Link to={`/obres/${art.id}`} className="block w-full py-4 text-center bg-[#3d352b] hover:bg-[#c9973a] text-[#f2ede6] hover:text-[#1e1914] font-['Dela_Gothic_One',sans-serif] text-sm tracking-wider uppercase rounded transition-colors">
                  Veure Detall
                </Link>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* Collection Epidermis */}
      <section className="px-6 pt-4 pb-12 flex flex-col items-center">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Col·lecció</h2>
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-3xl mb-8 uppercase tracking-widest">Epidermis</h3>
        
        <div className="w-full flex flex-col gap-6">
          {artworksEpidermis.map((art) => (
            <div key={art.id} className="w-full bg-[#282119] rounded-xl overflow-hidden border border-[#3d352b] flex flex-col">
              <div className="p-4">
                 <ImageWithFallback 
                  src={art.img} 
                  alt={art.title} 
                  className="w-full h-[280px] object-cover rounded-lg border border-[#3d352b]"
                />
              </div>
              <div className="px-6 pb-6 pt-2">
                <div className="flex justify-between items-start mb-2">
                  <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-lg">{art.title}</h4>
                  <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-base">{art.price}</span>
                </div>
                <p className="font-['Inter',sans-serif] text-[#a0937f] text-sm mb-4 italic">{art.author}</p>
                <div className="flex items-center gap-2 mb-6">
                  <div className={`w-2 h-2 rounded-full ${art.color === 'green' ? 'bg-[#00c950]' : 'bg-[#e30000]'}`} />
                  <span className="font-['Inter',sans-serif] text-[#f2ede6] text-xs">{art.status}</span>
                </div>
                <Link to={`/obres/${art.id}`} className="block w-full py-4 text-center bg-[#3d352b] hover:bg-[#c9973a] text-[#f2ede6] hover:text-[#1e1914] font-['Dela_Gothic_One',sans-serif] text-sm tracking-wider uppercase rounded transition-colors">
                  Veure Detall
                </Link>
              </div>
            </div>
          ))}
        </div>
      </section>
    </div>
  );
}
