<!-- Card Section -->
<div>
    <section id="program" class="flex flex-col gap-4 px-20 py-5">
        <div class="flex items-center justify-between">
            <h2 class="font-axiatabold text-xl leading-[20px]">Program Donasi</h2>
            <a href="{{ route('donasi.campaign') }}" class="rounded-full p-[6px_14px] border hover:bg-mtxl1 hover:text-white text-axiatabook text-xs leading-[18px]">
                View All
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach ($data['ziswafPrograms'] as $program)
            <a href="donasi/campaign/program/{{$program->slug}}">
                <div class="flex items-center justify-between w-full px-3 overflow-hidden transition-all duration-300 bg-white border rounded-2xl hover:ring-2 hover:ring-mtxl1">
                    <div class="flex flex-col gap-[2px] px-[14px]">
                        <h3 class="font-axiatamedium text-sm md:text-md leading-[21px]">{{$program->name}}</h3>
                        <p class="text-xs leading-[18px] text-[#878785]">{{$program->ziswaf_campaigns_count}} campaigns</p>
                    </div>
                    <div class="flex shrink-0 md:w-15 md:h-[90px] overflow-hidden">
                        <img src="{{ optional($program)->icon ? Storage::url($program->icon) : asset('image/icon/default-icon-program.png') }}" class="object-cover object-left w-full h-full p-3" alt="thumbnail">
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <section id="category" class="flex flex-col gap-4 px-20 py-5">
        <div class="flex items-center justify-between">
            <h2 class="font-axiatabold text-xl leading-[20px]">Kategori Donasi</h2>
            <a href="{{ route('donasi.campaign') }}" class="rounded-full p-[6px_14px] border hover:bg-mtxl1 hover:text-white text-axiatabook text-xs leading-[18px]">
                View All
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

            @foreach ($data['ziswafCategories'] as $category)
            <a href="donasi/campaign/category/{{$category->slug}}">
                <div class="flex items-center justify-between w-full p-3 overflow-hidden transition-all duration-300 bg-white border rounded-2xl hover:ring-2 hover:ring-mtxl1">
                    <div class="flex flex-col gap-[2px] px-[14px]">
                        <h3 class="font-axiatamedium text-md leading-[21px]">{{$category->name}}</h3>
                        <p class="text-xs leading-[18px] text-[#878785]">{{$category->ziswaf_campaigns_count}} campaigns</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <section id="featured" class="flex flex-col gap-4 px-20 py-5">
        <div class="grid grid-cols-1 md:gap-8 md:grid-cols-2">
            <div>
                <div class="flex items-center justify-between">
                    <h2 class="font-axiatabold text-xl leading-[20px]">Donasi Terbaru</h2>
                </div>
                <div class="w-full mt-3 overflow-hidden swiper">
                    <div class="swiper-wrapper">
                        @foreach ($data['campaignLatest'] as $campaignLatest)
                        <div class="swiper-slide !w-fit py-[2px]">
                            <a href="{{ route('donasi.campaign_detail', ['ziswafCampaign' => $campaignLatest]) }}">
                                <div class="flex flex-col shrink-0 w-[230px] h-full rounded-3xl gap-[14px] p-[10px] pb-4 bg-white transition-all duration-300 hover:ring-2 hover:ring-mtxl1">
                                    <div class="w-[210px] h-[230px] rounded-3xl bg-[#D9D9D9] overflow-hidden">
                                        <img src={{ Storage::url($campaignLatest->thumbnail) }} class="object-cover w-full h-full" alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-[14px] justify-between">
                                        <div class="flex items-center justify-between gap-4">
                                            <h3 class="font-axiatamedium text-md leading-[20px]">{{$campaignLatest->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <h2 class="font-axiatabold text-xl  leading-[20px]">Donasi Populer</h2>
                </div>
                <div class="w-full mt-3 overflow-hidden swiper">
                    <div class="swiper-wrapper">
                        @foreach ($data['campaignTrending'] as $campaignTrending)
                        <div class="swiper-slide !w-fit py-[2px]">
                            <a href="{{ route('donasi.campaign_detail', ['ziswafCampaign' => $campaignTrending]) }}">
                                <div class="flex flex-col shrink-0 w-[230px] h-full rounded-3xl gap-[14px] p-[10px] pb-4 bg-white transition-all duration-300 hover:ring-2 hover:ring-mtxl1">
                                    <div class="w-[210px] h-[230px] rounded-3xl bg-[#D9D9D9] overflow-hidden">
                                        <img src={{ Storage::url($campaignTrending->thumbnail) }} class="object-cover w-full h-full" alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-[14px] justify-between">
                                        <div class="flex items-center justify-between gap-4">
                                            <h3 class="font-axiatamedium text-md leading-[20px]">{{$campaignTrending->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('donasi.campaign') }}" class="text-center rounded-full p-[6px_14px] border hover:bg-mtxl1 hover:text-white text-axiatabook text-xs leading-[18px]">
            View All
        </a>
    </section>
</div>
<!-- End Card Section -->
