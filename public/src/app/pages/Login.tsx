import { Link, useNavigate } from "react-router";
import { LogIn } from "lucide-react";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";

export default function Login() {
  const navigate = useNavigate();

  const handleLogin = (e: React.FormEvent) => {
    e.preventDefault();
    navigate('/compte');
  };

  return (
    <div className="flex flex-col w-full min-h-screen bg-[#1e1914] px-5 py-8 items-center justify-center relative overflow-hidden pb-32">
      
      {/* Background glow effect */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[550px] bg-gradient-to-br from-[#c9973a]/20 to-[#332b22] rounded-[12px] blur-[24px] z-0" />

      {/* Login Box */}
      <div className="relative z-10 w-full max-w-[320px] bg-[#282119] border border-[#3d352b] rounded-2xl shadow-2xl p-8 flex flex-col items-center">
        
        {/* Logo Icon */}
        <div className="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center mb-8">
          <div className="w-[54px] h-[54px] bg-[#f2ede6] rounded-[10px] flex items-center justify-center flex-shrink-0">
            <span className="font-['Dela_Gothic_One',sans-serif] text-[10px] text-[#282119]">NONART</span>
          </div>
        </div>

        <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl mb-2 text-center">Inici de Sessió</h1>
        <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-xs text-center mb-8">
          Introdueix credencials per accedir.
        </p>

        <form onSubmit={handleLogin} className="w-full flex flex-col gap-6">
          <div className="flex flex-col gap-2">
            <label className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">
              Usuari :
            </label>
            <div className="relative">
              <div className="absolute inset-0 bg-black/40 rounded-md pointer-events-none" />
              <input 
                type="text" 
                placeholder="El teu usuari"
                className="w-full bg-transparent border border-[#3d352b] rounded-md py-4 px-4 text-[#f2ede6] font-['Inter',sans-serif] text-sm focus:outline-none focus:border-[#c9973a] relative z-10 shadow-[inset_0px_2px_4px_0px_rgba(0,0,0,0.05)] placeholder:text-[#a0937f]"
                required
              />
            </div>
          </div>

          <div className="flex flex-col gap-2">
            <label className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">
              Contrasenya :
            </label>
            <div className="relative">
              <div className="absolute inset-0 bg-black/40 rounded-md pointer-events-none" />
              <input 
                type="password" 
                placeholder="********"
                className="w-full bg-transparent border border-[#3d352b] rounded-md py-4 px-4 text-[#f2ede6] font-['Consolas',monospace] text-sm tracking-widest focus:outline-none focus:border-[#c9973a] relative z-10 shadow-[inset_0px_2px_4px_0px_rgba(0,0,0,0.05)] placeholder:text-[#a0937f]"
                required
              />
            </div>
          </div>

          <button 
            type="submit"
            className="w-max mx-auto px-6 bg-[#f2ede6] hover:bg-white text-black h-[44px] rounded-md flex items-center justify-center gap-2 transition-colors mt-4 shadow-[0px_10px_15px_0px_rgba(0,0,0,0.1),0px_4px_6px_0px_rgba(0,0,0,0.1)]"
          >
            <span className="font-['Dela_Gothic_One',sans-serif] text-sm tracking-wide mt-[2px]">Iniciar Sessió</span>
            <LogIn size={16} strokeWidth={2.5} />
          </button>
        </form>

        <Link to="#" className="mt-8 font-['Dela_Gothic_One',sans-serif] text-[#a0937f] hover:text-[#f2ede6] text-[10px] tracking-[1px] uppercase text-center transition-colors">
          Has oblidat la contrasenya?
        </Link>
      </div>

    </div>
  );
}
