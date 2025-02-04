<div class="w-full">
    <div class="relative flex flex-col">
        <div class="flex flex-col items-center justify-center p-4 gap-[30px]">
            {{-- <div class="flex overflow-hidden w-[530px] h-[396px] rounded-xl">
                <img src="{{ Storage::url($ziswafTransaction->ziswafCampaign->thumbnail) }}" class="object-contain w-full h-full" alt="thumbnail">
        </div> --}}
        <div class="flex flex-col w-full max-w-[700px] rounded-[20px] p-[20px_16px_30px_16px] gap-[30px] bg-white">
            <div class="flex flex-col text-center gap-[10px]">
                <h1 class="font-axiatabold text-2xl leading-[30px]">Jazakumullah Khairan Katsiran</h1>
                <p class="font-axiatamedium text-md leading-[30px]">Anda Telah Berdonasi untuk Program<br>{{$ziswafTransaction->ziswafCampaign->name}}</p>
                <div></div>
                <p class="text-2xl font-axiatabook">ﺁﺟَﺮَﻙ ﺍﻟﻠﻪُ ﻓِﻴْﻤَﺎ ﺍَﻋْﻄَﻴْﺖَ، ﻭَﺑَﺎﺭَﻙَ ﻓِﻴْﻤَﺎ ﺍَﺑْﻘَﻴْﺖَ ﻭَﺟَﻌَﻠَﻪُ ﻟَﻚَ ﻃَﻬُﻮْﺭًﺍ</p>
                <p class="text-sm font-axiatabookitalic">Semoga Allah memberikan pahala atas apa yang engkau berikan, dan semoga Allah memberikan berkah atas harta yang kau simpan dan menjadikannya sebagai pembersih bagimu</p>
                <p class="text-sm font-axiatabookitalic">Aamiin ya Robbal'alamin, Aamiin ya Mujibassailin</p>
            </div>
            <hr class="border-[#EAEAED]">

            <div class="flex flex-col gap-3">
                <a href="{{ route('donasi') }}" class="rounded-full p-[12px_20px] text-center w-full bg-mtxl2 font-axiatabold text-white">Donasi Lainnya</a>
                <a href="/" class="rounded-full p-[12px_20px] text-center w-full bg-[#090917] font-bold text-white">Halaman Utama</a>
            </div>
        </div>
    </div>
</div>
