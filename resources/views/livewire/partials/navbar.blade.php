  <!-- ========== HEADER ========== -->
  <header class="z-50 flex flex-wrap w-full bg-white border-b border-gray-200 md:justify-start md:flex-nowrap">
      <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-2 px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between gap-x-1">
              <a class="flex-none inline-block text-xl font-semibold rounded-md focus:outline-none focus:opacity-80" href="/" aria-label="Preline">
                  <img class="w-auto h-auto" src="{{ asset('logo/mtxl-logo.png') }}" alt="MTXL">
              </a>
              <!-- Collapse Button -->
              <button type="button" class="hs-collapse-toggle md:hidden relative size-9 flex justify-center items-center font-medium text-[12px] rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" id="hs-header-base-collapse" aria-expanded="false" aria-controls="hs-header-base" aria-label="Toggle navigation" data-hs-collapse="#hs-header-base">
                  <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <line x1="3" x2="21" y1="6" y2="6" />
                      <line x1="3" x2="21" y1="12" y2="12" />
                      <line x1="3" x2="21" y1="18" y2="18" /></svg>
                  <svg class="hidden hs-collapse-open:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18" />
                      <path d="m6 6 12 12" /></svg>
                  <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- End Collapse Button -->
          </div>

          <!-- Collapse -->
          <div id="hs-header-base" class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow md:block " aria-labelledby="hs-header-base-collapse">
              <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                  <div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
                      <div class="grow">
                          <div class="flex flex-col md:flex-row md:justify-end md:items-center gap-0.5 md:gap-1">
                              <a class="flex items-center p-2 text-gray-800 bg-gray-100 rounded-lg font-axiatamedium text-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#" aria-current="page">
                                  <svg class="block shrink-0 size-4 me-3 md:me-2 md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                      <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /></svg>
                                  Tentang Kami
                              </a>

                              <!-- Mega Menu -->
                              <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
                                  <button id="hs-header-base-mega-menu-small" type="button" class="flex items-center w-full p-2 text-gray-800 rounded-lg font-axiatamedium text-md hs-dropdown-toggle hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-haspopup="menu" aria-expanded="false" aria-label="Mega Menu">
                                      <svg class="block shrink-0 size-4 me-3 md:me-2 md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                          <circle cx="12" cy="12" r="3" /></svg>
                                      Layanan
                                      <svg class="duration-300 hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 shrink-0 size-4 ms-auto md:ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="m6 9 6 6 6-6" /></svg>
                                  </button>

                                  <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative md:w-80 hidden z-10 top-full md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5" role="menu" aria-orientation="vertical" aria-labelledby="hs-header-base-mega-menu-small">
                                      <div class="py-1 md:px-1 space-y-0.5">
                                          <!-- Link -->
                                          <a class="flex p-3 rounded-lg gap-x-4 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="https://assalam.mtxl.or.id/">
                                              <svg class="mt-1 text-gray-800 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                  <line x1="22" x2="2" y1="12" y2="12" />
                                                  <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                                                  <line x1="6" x2="6.01" y1="16" y2="16" />
                                                  <line x1="10" x2="10.01" y1="16" y2="16" /></svg>
                                              <div class="grow">
                                                  <span class="block text-sm font-semibold text-gray-800">Masjid As-Salam</span>
                                                  <p class="text-sm text-gray-500">How you get the most accurate and up-to-date data</p>
                                              </div>
                                          </a>
                                          <!-- End Link -->

                                          <div class="my-2 border-t border-gray-100"></div>

                                          <!-- Link -->
                                          <a class="flex p-3 rounded-lg gap-x-4 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="/donasi">
                                              <svg class="mt-1 text-gray-800 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                  <circle cx="9" cy="7" r="4" />
                                                  <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                  <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                                              <div class="grow">
                                                  <span class="block text-sm font-semibold text-gray-800">Donasi</span>
                                                  <p class="text-sm text-gray-500">Meet the people building products to help your business grow</p>
                                              </div>
                                          </a>
                                          <!-- End Link -->

                                          <div class="my-2 border-t border-gray-100"></div>

                                          <!-- Link -->
                                          <a class="flex p-3 rounded-lg gap-x-4 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                              <svg class="mt-1 text-gray-800 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                  <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                                  <path d="M18 14h-8" />
                                                  <path d="M15 18h-5" />
                                                  <path d="M10 6h8v4h-8V6Z" /></svg>
                                              <div class="grow">
                                                  <span class="block text-sm font-semibold text-gray-800">Umroh</span>
                                                  <p class="text-sm text-gray-500">The latest news, feature releases, and how to grow with data</p>
                                              </div>
                                          </a>
                                          <!-- End Link -->
                                      </div>
                                  </div>
                              </div>
                              <!-- End Mega Menu -->

                              <a class="flex items-center p-2 text-gray-800 rounded-lg font-axiatamedium text-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                  <svg class="block shrink-0 size-4 me-3 md:me-2 md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                      <circle cx="12" cy="7" r="4" /></svg>
                                  Berita
                              </a>

                              <a class="flex items-center p-2 text-gray-800 rounded-lg font-axiatamedium text-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                  <svg class="block shrink-0 size-4 me-3 md:me-2 md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M12 12h.01" />
                                      <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                      <path d="M22 13a18.15 18.15 0 0 1-20 0" />
                                      <rect width="20" height="14" x="2" y="6" rx="2" /></svg>
                                  Work
                              </a>

                              <a class="flex items-center p-2 text-gray-800 rounded-lg font-axiatamedium text-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                  <svg class="block shrink-0 size-4 me-3 md:me-2 md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                      <path d="M18 14h-8" />
                                      <path d="M15 18h-5" />
                                      <path d="M10 6h8v4h-8V6Z" /></svg>
                                  Blog
                              </a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
          <!-- End Collapse -->
      </nav>
  </header>
  <!-- ========== END HEADER ========== -->
