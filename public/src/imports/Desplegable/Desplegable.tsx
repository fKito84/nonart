function Text() {
  return (
    <div className="absolute h-[24px] left-0 top-[16px] w-[238px]" data-name="Text">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[24px] left-[118.52px] not-italic text-[#c9973a] text-[16px] text-center top-[-1px] whitespace-nowrap">Menu Options</p>
    </div>
  );
}

function Container() {
  return <div className="absolute bg-[#3d352b] h-px left-[17.84px] top-[48px] w-[202.297px]" data-name="Container" />;
}

function Link() {
  return (
    <div className="absolute h-[50.5px] left-0 top-[53px] w-[238px]" data-name="Link">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[22.5px] left-[119.38px] not-italic text-[#f2ede6] text-[15px] text-center top-[13px] whitespace-nowrap">{`Obres d'art`}</p>
    </div>
  );
}

function Link1() {
  return (
    <div className="absolute h-[50.5px] left-0 top-[103.5px] w-[238px]" data-name="Link">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[22.5px] left-[119.33px] not-italic text-[#f2ede6] text-[15px] text-center top-[13px] whitespace-nowrap">Tallers</p>
    </div>
  );
}

function Link2() {
  return (
    <div className="absolute h-[50.5px] left-0 top-[154px] w-[238px]" data-name="Link">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[22.5px] left-[118.55px] not-italic text-[#f2ede6] text-[15px] text-center top-[13px] whitespace-nowrap">Carret de la compra</p>
    </div>
  );
}

function Container1() {
  return <div className="absolute bg-[#3d352b] h-px left-[17.84px] top-[208.5px] w-[202.297px]" data-name="Container" />;
}

function Link3() {
  return (
    <div className="absolute h-[50.5px] left-0 top-[213.5px] w-[238px]" data-name="Link">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[22.5px] left-[118.88px] not-italic text-[#f2ede6] text-[15px] text-center top-[13px] whitespace-nowrap">{`Conta d'usuari`}</p>
    </div>
  );
}

function Link4() {
  return (
    <div className="absolute h-[50.5px] left-0 top-[264px] w-[238px]" data-name="Link">
      <p className="-translate-x-1/2 absolute font-['Dela_Gothic_One:Regular',sans-serif] leading-[22.5px] left-[119.73px] not-italic text-[#f2ede6] text-[15px] text-center top-[13px] tracking-[0.375px] uppercase whitespace-nowrap">SORTIR</p>
    </div>
  );
}

export default function Desplegable() {
  return (
    <div className="bg-[#282119] border border-[#3d352b] border-solid relative rounded-[8px] shadow-[0px_25px_50px_0px_rgba(0,0,0,0.25)] size-full" data-name="Desplegable">
      <Text />
      <Container />
      <Link />
      <Link1 />
      <Link2 />
      <Container1 />
      <Link3 />
      <Link4 />
    </div>
  );
}