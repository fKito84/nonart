import { Link } from "react-router";
import { Instagram } from "lucide-react";

export function Footer() {
  return (
    <footer className="bg-[#282119] border-t border-[#3d352b] mt-auto w-full pt-10 pb-8 flex flex-col items-center">
      <div className="w-full max-w-[360px] mx-auto px-6 flex flex-col gap-8 text-center items-center">
        
        {/* Navegació */}
        <div className="flex flex-col items-center gap-3">
          <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-base uppercase tracking-widest mb-1">
            Navegació
          </h4>
          <Link to="/" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Inici</Link>
          <Link to="/obres" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Obres d'art</Link>
          <Link to="/tallers" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Tallers</Link>
          <Link to="/carret" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Carret</Link>
          <Link to="/compte" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">El meu compte</Link>
        </div>

        {/* Ajuda */}
        <div className="flex flex-col items-center gap-3">
          <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-base uppercase tracking-widest mb-1">
            Ajuda
          </h4>
          <Link to="#" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Contacte</Link>
          <Link to="#" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Preguntes freqüents</Link>
          <Link to="#" className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-sm transition-colors">Enviaments</Link>
        </div>

        {/* Separator & Bottom */}
        <div className="w-full border-t border-[rgba(61,53,43,0.3)] pt-8 mt-4 flex flex-col items-center">
          <a href="https://www.instagram.com/ainoanona" target="_blank" rel="noreferrer" className="text-[#a0937f] hover:text-[#c9973a] mb-6 transition-colors">
            <Instagram size={24} />
          </a>
          <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl tracking-wide mb-2">
            NONART
          </h3>
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-widest uppercase">
            © 2026 Nonart
          </p>
        </div>
      </div>
    </footer>
  );
}
