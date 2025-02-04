<!-- Hero -->
<div class="max-w-[85rem] mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <!-- Grid -->
    <div class="grid gap-4 md:grid-cols-2 md:gap-8 xl:gap-20 md:items-center">
        <div>
            <h1 class="block text-3xl text-gray-800 font-axiatabold sm:text-4xl lg:text-6xl lg:leading-tight">Majelis Taklim <span class="text-blue-600">XL Axiata</span></h1>
            <p class="mt-3 text-lg text-gray-800 font-axiatabook">MTXL adalah suatu badan hukum berbentuk yayasan yang telah mendapatkan pengesahan dari Menteri Hukum dan HAM RI Nomor AHU-0030904.AH.01.04 tahun 2016</p>
            <!-- Buttons -->
            <div class="grid w-full gap-3 mt-7 sm:inline-flex">
                <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    Tentang Kami
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" /></svg>
                </a>
                <a class="inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    Kontak
                </a>
            </div>
            <!-- End Buttons -->
        </div>
        <!-- End Col -->

        <div class="relative ms-4">
            {{-- <img class="w-full rounded-md" src="https://images.unsplash.com/photo-1665686377065-08ba896d16fd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=700&h=800&q=80" alt="Hero Image"> --}}
            <img class="w-full rounded-md" src="{{ asset('image/amir.jpeg') }}" alt="Hero Image">
            <div class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6"></div>

            <!-- SVG-->
            <div class="absolute bottom-0 start-0">
                <svg class="w-2/3 h-auto text-white ms-auto " width="630" height="451" viewBox="0 0 630 451" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="531" y="352" width="99" height="99" fill="currentColor" />
                    <rect x="140" y="352" width="106" height="99" fill="currentColor" />
                    <rect x="482" y="402" width="64" height="49" fill="currentColor" />
                    <rect x="433" y="402" width="63" height="49" fill="currentColor" />
                    <rect x="384" y="352" width="49" height="50" fill="currentColor" />
                    <rect x="531" y="328" width="50" height="50" fill="currentColor" />
                    <rect x="99" y="303" width="49" height="58" fill="currentColor" />
                    <rect x="99" y="352" width="49" height="50" fill="currentColor" />
                    <rect x="99" y="392" width="49" height="59" fill="currentColor" />
                    <rect x="44" y="402" width="66" height="49" fill="currentColor" />
                    <rect x="234" y="402" width="62" height="49" fill="currentColor" />
                    <rect x="334" y="303" width="50" height="49" fill="currentColor" />
                    <rect x="581" width="49" height="49" fill="currentColor" />
                    <rect x="581" width="49" height="64" fill="currentColor" />
                    <rect x="482" y="123" width="49" height="49" fill="currentColor" />
                    <rect x="507" y="124" width="49" height="24" fill="currentColor" />
                    <rect x="531" y="49" width="99" height="99" fill="currentColor" />
                </svg>
            </div>
            <!-- End SVG-->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Hero -->
