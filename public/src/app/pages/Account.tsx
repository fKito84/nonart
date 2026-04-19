import { Link, useNavigate } from "react-router";
import { User, LogOut } from "lucide-react";

export default function Account() {
  const navigate = useNavigate();

  return (
    <div className="flex flex-col w-full min-h-screen bg-[#1e1914] px-5 py-8 items-center pb-24">
      
      {/* Header */}
      <div className="text-center mb-8 flex flex-col items-center">
        <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-[10px] tracking-[1px] uppercase mb-2">Compte Personal</h2>
        <div className="flex items-center gap-2">
          <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-4xl">Usuari</h1>
          <User size={24} className="text-[#f2ede6]" />
        </div>
      </div>

      {/* Personal Info Box */}
      <div className="w-full max-w-[400px] bg-[#282119] rounded-2xl border border-[#3d352b] p-6 shadow-xl flex flex-col mb-6 relative overflow-hidden">
        <div className="flex justify-between items-start mb-6">
          <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl z-10 relative">Dades Personals</h3>
          <User size={48} className="text-[#a0937f] opacity-20 absolute top-4 right-4" />
        </div>

        <div className="flex flex-col gap-4 z-10 relative">
          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Nom :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Fransisco</span>
          </div>
          
          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Cognom :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Muñoz</span>
          </div>

          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Any Neixement :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">1984</span>
          </div>

          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Localitat :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Igualada</span>
          </div>

          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Província :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Barcelona</span>
          </div>

          <div className="flex flex-col gap-1">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">Direcció :</span>
            <span className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-sm">Carrer Gran 123, 4t 2a</span>
          </div>
        </div>

        <div className="w-full border-t border-[#3d352b] mt-6 mb-4" />

        <button 
          onClick={() => navigate('/')}
          className="flex items-center justify-center gap-2 text-[#c9973a] hover:text-[#b08330] transition-colors self-center py-2"
        >
          <LogOut size={16} />
          <span className="font-['Dela_Gothic_One',sans-serif] text-[10px] tracking-[1px] uppercase">Tancar Sessió</span>
        </button>
      </div>

      {/* Purchases Box */}
      <div className="w-full max-w-[400px] bg-[#282119] rounded-2xl border border-[#3d352b] p-6 shadow-xl flex flex-col">
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl mb-6">Compres</h3>

        <div className="flex flex-col gap-4">
          
          {/* Purchase 1 */}
          <div className="bg-[#1e1914] rounded-lg border border-[#3d352b] p-4 flex flex-col gap-2">
            <div className="flex justify-between items-center w-full">
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-[10px] tracking-[1px] uppercase">TALLER</span>
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px]">12/12/2025</span>
            </div>
            <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl">Art and Wine</h4>
            <span className="font-['Inter',sans-serif] text-[#a0937f] text-xs">Assistència confirmada.</span>
          </div>

          {/* Purchase 2 */}
          <div className="bg-[#1e1914] rounded-lg border border-[#3d352b] p-4 flex flex-col gap-2">
            <div className="flex justify-between items-center w-full">
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-[10px] tracking-[1px] uppercase">OBRA</span>
              <span className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px]">1/04/2026</span>
            </div>
            <h4 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl">Les nenes jugant</h4>
            <span className="font-['Inter',sans-serif] text-[#a0937f] text-xs">Lliurament completat.</span>
          </div>
          
        </div>

        <button 
          onClick={() => navigate('/obres')}
          className="w-full bg-transparent border border-[#3d352b] hover:bg-[#3d352b] text-[#a0937f] hover:text-[#f2ede6] h-12 rounded-lg flex items-center justify-center transition-colors mt-6"
        >
          <span className="font-['Dela_Gothic_One',sans-serif] text-xs tracking-wider uppercase mt-[2px]">NOVA COMPRA</span>
        </button>
      </div>

    </div>
  );
}
