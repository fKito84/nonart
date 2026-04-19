import { useState } from "react";
import { Link, useNavigate } from "react-router";
import { User, ShoppingCart, Menu, X } from "lucide-react";
import { clsx } from "clsx";

export function Navbar() {
  const [menuOpen, setMenuOpen] = useState(false);
  const navigate = useNavigate();

  const toggleMenu = () => setMenuOpen((prev) => !prev);
  const closeMenu = () => setMenuOpen(false);

  return (
    <nav className="fixed top-0 left-0 w-full h-[72px] bg-[#1e1914]/95 backdrop-blur-sm border-b border-[#3d352b] z-50 flex items-center justify-between px-4">
      {/* Logo */}
      <Link to="/" className="w-[54px] h-[54px] bg-[#f2ede6] rounded-xl flex items-center justify-center flex-shrink-0" onClick={closeMenu}>
        <span className="font-['Dela_Gothic_One',sans-serif] text-xs text-[#282119]">NONART</span>
      </Link>

      {/* Nav Icons */}
      <div className="flex items-center space-x-1">
        <button onClick={() => { navigate('/login'); closeMenu(); }} className="w-10 h-10 flex items-center justify-center text-[#f2ede6] hover:text-[#c9973a] transition-colors">
          <User size={24} strokeWidth={2} />
        </button>
        <button onClick={() => { navigate('/carret'); closeMenu(); }} className="w-10 h-10 flex items-center justify-center text-[#f2ede6] hover:text-[#c9973a] transition-colors relative">
          <ShoppingCart size={24} strokeWidth={2} />
        </button>
        <button onClick={toggleMenu} className="w-10 h-10 flex items-center justify-center text-[#f2ede6] hover:text-[#c9973a] transition-colors">
          {menuOpen ? <X size={28} strokeWidth={2.5} /> : <Menu size={28} strokeWidth={2.5} />}
        </button>
      </div>

      {/* Dropdown Menu (Desplegable) */}
      <div 
        className={clsx(
          "absolute top-[80px] right-4 w-[238px] bg-[#282119] border border-[#3d352b] rounded-lg shadow-2xl transition-all duration-200 origin-top-right",
          menuOpen ? "scale-100 opacity-100 visible" : "scale-95 opacity-0 invisible"
        )}
      >
        <div className="py-4 flex flex-col items-center">
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-[16px] mb-4">Menu Options</p>
          <div className="w-[202px] h-px bg-[#3d352b] mb-2" />
          <Link to="/obres" onClick={closeMenu} className="w-full text-center py-3 font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] hover:text-[#c9973a] text-[15px] transition-colors">
            Obres d'art
          </Link>
          <Link to="/tallers" onClick={closeMenu} className="w-full text-center py-3 font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] hover:text-[#c9973a] text-[15px] transition-colors">
            Tallers
          </Link>
          <Link to="/carret" onClick={closeMenu} className="w-full text-center py-3 font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] hover:text-[#c9973a] text-[15px] transition-colors">
            Carret de la compra
          </Link>
          <div className="w-[202px] h-px bg-[#3d352b] my-2" />
          <Link to="/compte" onClick={closeMenu} className="w-full text-center py-3 font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] hover:text-[#c9973a] text-[15px] transition-colors">
            Conta d'usuari
          </Link>
          <Link to="/" onClick={closeMenu} className="w-full text-center py-3 font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] hover:text-[#c9973a] text-[15px] tracking-wider uppercase transition-colors">
            SORTIR
          </Link>
        </div>
      </div>
    </nav>
  );
}
