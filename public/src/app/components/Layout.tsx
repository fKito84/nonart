import { Outlet } from "react-router";
import { Navbar } from "./Navbar";
import { Footer } from "./Footer";

export function Layout() {
  return (
    <div className="bg-[#1e1914] min-h-screen text-[#f2ede6] font-['Inter',sans-serif] flex flex-col relative w-full overflow-x-hidden">
      <Navbar />
      <main className="flex-grow pt-[72px] flex flex-col">
        <Outlet />
      </main>
      <Footer />
    </div>
  );
}
