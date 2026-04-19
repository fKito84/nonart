export default function Calendari() {
  return (
    <div className="bg-[#1e1914] content-stretch flex flex-col isolate items-center p-[16px] relative rounded-[16px] size-full" data-name="Calendari">
      <div aria-hidden="true" className="absolute border border-black border-solid inset-[-0.5px] pointer-events-none rounded-[16.5px] shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" />
      <div className="content-stretch flex gap-[16px] items-center relative shrink-0 w-full z-[2]" data-name="Block">
        <div className="content-stretch flex items-center justify-center overflow-clip p-[8px] relative rounded-[32px] shrink-0" data-name="Icon Button">
          <div className="overflow-clip relative shrink-0 size-[20px]" data-name="Chevron left">
            <div className="absolute bottom-1/4 left-[37.5%] right-[37.5%] top-1/4" data-name="Icon">
              <div className="absolute inset-[-10%_-20%]">
                <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 7 12">
                  <path d="M6 11L1 6L6 1" id="Icon" stroke="var(--stroke-0, white)" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div className="content-stretch flex flex-[1_0_0] gap-[8px] isolate items-start min-h-px min-w-px relative" data-name="Calendar Select Group">
          <div className="content-stretch flex flex-[1_0_0] flex-col gap-[8px] items-start min-h-px min-w-px relative z-[2]" data-name="Calendar Month Field">
            <div className="bg-[#a39f9f] relative rounded-[8px] shrink-0 w-full" data-name="Select">
              <div aria-hidden="true" className="absolute border border-[#0e0e0e] border-solid inset-[-0.5px] pointer-events-none rounded-[8.5px]" />
              <div className="flex flex-row items-center size-full">
                <div className="content-stretch flex gap-[8px] items-center p-[6px] relative size-full">
                  <p className="flex-[1_0_0] font-['Inter:Regular',sans-serif] font-normal leading-none min-h-px min-w-px not-italic relative text-[16px] text-white">Sep</p>
                  <div className="overflow-clip relative shrink-0 size-[16px]" data-name="Chevron down">
                    <div className="absolute bottom-[37.5%] left-1/4 right-1/4 top-[37.5%]" data-name="Icon">
                      <div className="absolute inset-[-20%_-10%]">
                        <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 9.6 5.6">
                          <path d="M0.8 0.8L4.8 4.8L8.8 0.8" id="Icon" stroke="var(--stroke-0, white)" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.6" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] flex-col gap-[8px] items-start min-h-px min-w-px relative z-[1]" data-name="Calendar Year Field">
            <div className="bg-[#a39f9f] relative rounded-[8px] shrink-0 w-full" data-name="Select">
              <div aria-hidden="true" className="absolute border border-[#0e0e0e] border-solid inset-[-0.5px] pointer-events-none rounded-[8.5px]" />
              <div className="flex flex-row items-center size-full">
                <div className="content-stretch flex gap-[8px] items-center p-[6px] relative size-full">
                  <p className="flex-[1_0_0] font-['Inter:Regular',sans-serif] font-normal leading-none min-h-px min-w-px not-italic relative text-[16px] text-white">2025</p>
                  <div className="overflow-clip relative shrink-0 size-[16px]" data-name="Chevron down">
                    <div className="absolute bottom-[37.5%] left-1/4 right-1/4 top-[37.5%]" data-name="Icon">
                      <div className="absolute inset-[-20%_-10%]">
                        <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 9.6 5.6">
                          <path d="M0.8 0.8L4.8 4.8L8.8 0.8" id="Icon" stroke="var(--stroke-0, white)" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.6" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div className="content-stretch flex items-center justify-center overflow-clip p-[8px] relative rounded-[32px] shrink-0" data-name="Icon Button">
          <div className="overflow-clip relative shrink-0 size-[20px]" data-name="Chevron right">
            <div className="absolute bottom-1/4 left-[37.5%] right-[37.5%] top-1/4" data-name="Icon">
              <div className="absolute inset-[-10%_-20%]">
                <svg className="block size-full" fill="none" preserveAspectRatio="none" viewBox="0 0 7 12">
                  <path d="M1 11L6 6L1 1" id="Icon" stroke="var(--stroke-0, white)" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div className="content-stretch flex flex-col items-center pt-[16px] relative shrink-0 z-[1]" data-name="Table">
        <div className="content-stretch flex gap-px items-center justify-center relative shrink-0 w-full" data-name="Thead">
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#4ee303] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Su</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#a39f9f] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Mo</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#a39f9f] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Tu</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#a39f9f] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">We</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#a39f9f] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Th</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#37ff00] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Fr</p>
            </div>
          </div>
          <div className="content-stretch flex flex-[1_0_0] items-center justify-center min-h-px min-w-px relative" data-name="Td">
            <div className="flex flex-col font-['Geist:Regular',sans-serif] font-normal justify-center leading-[0] relative shrink-0 text-[#5fff03] text-[12px] text-center whitespace-nowrap">
              <p className="leading-[20px]">Sa</p>
            </div>
          </div>
        </div>
        <div className="content-stretch flex flex-col gap-px isolate items-center relative shrink-0" data-name="Tbody">
          <div className="content-stretch flex gap-px items-center relative shrink-0 z-[5]" data-name="Row">
            <div className="content-stretch flex items-center justify-center p-[16px] rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button" />
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">1</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">2</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">3</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">4</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">5</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">6</p>
              </div>
            </div>
          </div>
          <div className="content-stretch flex gap-px items-center relative shrink-0 z-[4]" data-name="Row">
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">7</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">8</p>
              </div>
            </div>
            <div className="bg-[#2c2c2c] content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">9</p>
              </div>
            </div>
            <div className="bg-white content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[#050505] text-[16px] text-center whitespace-nowrap">
                <p className="leading-[1.4]">10</p>
              </div>
            </div>
            <div className="bg-white content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[#050505] text-[16px] text-center whitespace-nowrap">
                <p className="leading-[1.4]">11</p>
              </div>
            </div>
            <div className="bg-white content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[#050505] text-[16px] text-center whitespace-nowrap">
                <p className="leading-[1.4]">12</p>
              </div>
            </div>
            <div className="bg-[#2c2c2c] content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">13</p>
              </div>
            </div>
          </div>
          <div className="content-stretch flex gap-px items-center relative shrink-0 z-[3]" data-name="Row">
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">14</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">15</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">16</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">17</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">18</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">19</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">20</p>
              </div>
            </div>
          </div>
          <div className="content-stretch flex gap-px items-center relative shrink-0 z-[2]" data-name="Row">
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">21</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">22</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">23</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">24</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">25</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">26</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">27</p>
              </div>
            </div>
          </div>
          <div className="content-stretch flex gap-px items-center relative shrink-0 z-[1]" data-name="Row">
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">28</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">29</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">30</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">1</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">2</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">3</p>
              </div>
            </div>
            <div className="content-stretch flex items-center justify-center p-[16px] relative rounded-[8px] shrink-0 size-[40px]" data-name="Calendar Button">
              <div className="flex flex-col font-['Inter:Regular',sans-serif] font-normal justify-center leading-[0] not-italic relative shrink-0 text-[16px] text-center text-white whitespace-nowrap">
                <p className="leading-[1.4]">4</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}