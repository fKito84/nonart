import { useState } from "react";
import { ChevronLeft, ChevronRight, ChevronDown } from "lucide-react";
import { clsx } from "clsx";

export function Calendari() {
  const [currentDate, setCurrentDate] = useState(new Date(2025, 8, 1)); // September 2025
  const [selectedDate, setSelectedDate] = useState<number | null>(10);

  const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
  const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();

  const days = [];
  for (let i = 0; i < firstDayOfMonth; i++) {
    days.push(null);
  }
  for (let i = 1; i <= daysInMonth; i++) {
    days.push(i);
  }

  const handlePrevMonth = () => {
    setCurrentDate(new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1));
  };

  const handleNextMonth = () => {
    setCurrentDate(new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1));
  };

  return (
    <div className="bg-[#1e1914] w-full max-w-[340px] rounded-2xl p-4 border border-black shadow-lg mx-auto">
      {/* Header */}
      <div className="flex items-center justify-between mb-4">
        <button onClick={handlePrevMonth} className="p-2 text-white hover:text-[#c9973a]">
          <ChevronLeft size={20} />
        </button>
        
        <div className="flex gap-2 flex-grow mx-2">
          <div className="flex-1 bg-[#a39f9f] rounded-lg px-3 py-1.5 flex items-center justify-between border border-[#0e0e0e] cursor-pointer">
            <span className="font-['Inter',sans-serif] text-white text-sm">
              {currentDate.toLocaleString('en-US', { month: 'short' })}
            </span>
            <ChevronDown size={14} className="text-white" />
          </div>
          <div className="flex-1 bg-[#a39f9f] rounded-lg px-3 py-1.5 flex items-center justify-between border border-[#0e0e0e] cursor-pointer">
            <span className="font-['Inter',sans-serif] text-white text-sm">
              {currentDate.getFullYear()}
            </span>
            <ChevronDown size={14} className="text-white" />
          </div>
        </div>

        <button onClick={handleNextMonth} className="p-2 text-white hover:text-[#c9973a]">
          <ChevronRight size={20} />
        </button>
      </div>

      {/* Weekdays */}
      <div className="grid grid-cols-7 mb-2">
        {['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'].map((day, i) => (
          <div key={day} className="flex justify-center py-2">
            <span className={clsx(
              "font-['Geist',sans-serif] text-xs",
              i === 0 ? "text-[#4ee303]" : i === 5 ? "text-[#37ff00]" : i === 6 ? "text-[#5fff03]" : "text-[#a39f9f]"
            )}>
              {day}
            </span>
          </div>
        ))}
      </div>

      {/* Days Grid */}
      <div className="grid grid-cols-7 gap-1">
        {days.map((day, i) => (
          <div key={i} className="flex justify-center aspect-square">
            {day ? (
              <button
                onClick={() => setSelectedDate(day)}
                className={clsx(
                  "w-10 h-10 rounded-lg flex items-center justify-center font-['Inter',sans-serif] text-base transition-colors",
                  selectedDate === day
                    ? "bg-white text-[#050505]"
                    : day === 9 || day === 13 // simulate some specific styling from figma
                    ? "bg-[#2c2c2c] text-white" 
                    : "text-white hover:bg-[#2c2c2c]"
                )}
              >
                {day}
              </button>
            ) : (
              <div className="w-10 h-10" />
            )}
          </div>
        ))}
      </div>
    </div>
  );
}
