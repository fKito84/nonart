import { useState } from "react";
import { useNavigate } from "react-router";
import { Calendar, Clock, ArrowRight } from "lucide-react";
import { ImageWithFallback } from "../components/figma/ImageWithFallback";
import { Calendari } from "../components/Calendari";

export default function Workshops() {
  const navigate = useNavigate();
  const [showCalendar, setShowCalendar] = useState(false);
  const [date, setDate] = useState("");
  const [time, setTime] = useState("");

  const handleReserve = (e: React.FormEvent) => {
    e.preventDefault();
    navigate('/carret');
  };

  return (
    <div className="flex flex-col w-full bg-[#1e1914] pb-16">
      {/* Hero Section */}
      <div className="relative w-full h-[400px] overflow-hidden flex flex-col justify-center items-center">
        <ImageWithFallback 
          src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=1080&q=80" 
          alt="Workshop Hero" 
          className="absolute inset-0 w-full h-full object-cover opacity-60"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#1e1914]/80 to-[#1e1914] z-10" />
        
        <div className="relative z-20 text-center px-4 pt-16 flex flex-col items-center">
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#c9973a] text-xs tracking-[1px] uppercase mb-2">Esdeveniment</p>
          <h1 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-5xl mb-4 tracking-wide uppercase">Tallers</h1>
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-sm text-center max-w-[280px]">
            Pintura i vi, experiència única.
          </p>
        </div>
      </div>

      {/* Reservation Form */}
      <div className="px-5 -mt-16 relative z-30 mb-8">
        <div className="bg-[#282119] rounded-2xl border border-[#3d352b] p-6 shadow-2xl w-full max-w-[400px] mx-auto flex flex-col items-center relative">
          <h2 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-xl mb-4">Reserva el teu taller</h2>
          <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-xs text-center mb-8 px-2 leading-[1.6]">
            Selecciona la data i l'hora per confirmar la teva assistència a Art and Wine.
          </p>

          <form onSubmit={handleReserve} className="w-full flex flex-col gap-6 relative">
            <div className="flex flex-col gap-2 relative">
              <label className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">
                Selecciona Data
              </label>
              <div 
                className="relative cursor-pointer"
                onClick={() => setShowCalendar(!showCalendar)}
              >
                <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <Calendar size={18} className="text-[#c9973a]" />
                </div>
                <div className="w-full bg-[#1e1914] border border-[#3d352b] rounded-lg py-3 pl-10 pr-4 text-[#f2ede6] font-['Inter',sans-serif]">
                  {date || "Tria una data..."}
                </div>
              </div>
              
              {showCalendar && (
                <div className="absolute top-[80px] left-0 w-full z-50 animate-in fade-in slide-in-from-top-2">
                  <div className="bg-[#1e1914] rounded-2xl border border-[#3d352b] shadow-2xl relative">
                    <Calendari />
                    <button 
                      type="button"
                      onClick={(e) => {
                        e.stopPropagation();
                        setDate("10 Setembre 2025");
                        setShowCalendar(false);
                      }}
                      className="absolute bottom-4 right-4 bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] font-['Inter',sans-serif] text-xs font-semibold px-4 py-2 rounded-lg transition-colors"
                    >
                      Confirmar
                    </button>
                  </div>
                </div>
              )}
            </div>

            <div className="flex flex-col gap-2">
              <label className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-[10px] tracking-[1px] uppercase">
                Agafa Hora
              </label>
              <div className="relative">
                <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <Clock size={18} className="text-[#c9973a]" />
                </div>
                <select 
                  className="w-full bg-[#1e1914] border border-[#3d352b] rounded-lg py-3 pl-10 pr-4 text-[#f2ede6] font-['Inter',sans-serif] focus:outline-none focus:border-[#c9973a] appearance-none"
                  value={time}
                  onChange={(e) => setTime(e.target.value)}
                  required
                >
                  <option value="" disabled>Selecciona una hora</option>
                  <option value="10:00">10:00 - Matí</option>
                  <option value="17:00">17:00 - Tarda</option>
                  <option value="19:00">19:00 - Vespre</option>
                </select>
              </div>
            </div>

            <button 
              type="submit"
              className="w-full bg-[#c9973a] hover:bg-[#b08330] text-[#1e1914] h-14 rounded-lg flex items-center justify-center gap-2 transition-colors mt-4 shadow-lg group"
            >
              <span className="font-['Dela_Gothic_One',sans-serif] text-sm tracking-wide uppercase mt-[2px]">Reservar Taller</span>
              <ArrowRight size={18} strokeWidth={2.5} className="group-hover:translate-x-1 transition-transform" />
            </button>
          </form>
        </div>
      </div>

      {/* About Description */}
      <section className="px-6 py-12 text-center max-w-[400px] mx-auto">
        <h3 className="font-['Dela_Gothic_One',sans-serif] text-[#f2ede6] text-2xl mb-6">Sobre els tallers</h3>
        <p className="font-['Dela_Gothic_One',sans-serif] text-[#a0937f] text-xs leading-[1.8]">
          Endinsa't en el món de la creativitat amb la nostra experiència exclusiva. Els nostres tallers estan dissenyats tant per a principiants com per a artistes experimentats. Gaudeix d'una copa de vi seleccionat mentre deixes volar la teva imaginació sobre el llenç, guiat pels nostres professionals.
        </p>
      </section>

      {/* Gallery Grid */}
      <div className="px-5 w-full max-w-[400px] mx-auto grid grid-cols-2 gap-4">
        <ImageWithFallback src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=400&q=80" alt="Workshop 1" className="w-full h-[160px] object-cover rounded-xl border border-[#3d352b]" />
        <ImageWithFallback src="https://images.unsplash.com/photo-1745758278428-d733e4d66a74?auto=format&fit=crop&w=400&q=80" alt="Workshop 2" className="w-full h-[160px] object-cover rounded-xl border border-[#3d352b]" />
        <ImageWithFallback src="https://images.unsplash.com/photo-1700607125451-3637d313b3f0?auto=format&fit=crop&w=400&q=80" alt="Workshop 3" className="w-full h-[160px] object-cover rounded-xl border border-[#3d352b]" />
        <ImageWithFallback src="https://images.unsplash.com/photo-1536241455566-5709c3aefd3d?auto=format&fit=crop&w=400&q=80" alt="Workshop 4" className="w-full h-[160px] object-cover rounded-xl border border-[#3d352b]" />
        <ImageWithFallback src="https://images.unsplash.com/photo-1757085242641-d829ddde7191?auto=format&fit=crop&w=400&q=80" alt="Workshop 5" className="w-full h-[160px] object-cover rounded-xl border border-[#3d352b] col-span-2" />
      </div>

    </div>
  );
}
