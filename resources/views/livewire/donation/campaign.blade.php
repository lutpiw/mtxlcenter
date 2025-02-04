<div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Card -->
            @foreach ($campaigns as $campaign)
            <div class="flex flex-col overflow-hidden transition bg-white border border-b-4 shadow-sm max-w-m border-b-mtxl2 group rounded-xl hover:shadow-lg hover:border-b-mtxl1 focus:outline-none focus:shadow-lg">
                <div class="relative size-auto h-[400px] pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                    <img class="absolute top-0 object-cover transition-transform duration-500 ease-in-out size-full start-0 group-hover:scale-105 group-focus:scale-105 rounded-t-xl" src={{ Storage::url($campaign->thumbnail) }} alt="Thumbnail">
                    @if (false)
                    <div class="absolute flex p-3 text-center text-white bg-gray-700 rounded-3xl bottom-1 left-1 opacity-90">
                        <p class="text-xs font-axiatabook">Terkumpul:<br>Rp 10.000.000,00</p>
                    </div>
                    @endif
                </div>
                <div class="p-4 md:p-5">
                    <h3 class="text-xl font-bold text-center text-gray-800 font-axiatabold">
                        {{$campaign->name}}
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="mt-1 text-xs text-gray-500 font-axiatabook">
                            Dana Dibutuhkan
                        </p>

                        <p class="mt-1 text-xs text-right text-gray-500 font-axiatamedium">
                            @if (!is_null($campaign->cost))
                            {{$campaign->formatted_cost}}
                            @else
                            N/A
                            @endif
                        </p>
                    </div>
                </div>
                <div class="pb-1 pr-3">
                    <p class="text-xs text-right text-gray-500 dark:text-neutral-500">
                        @if ($campaign->remaining_days > 0)
                        {{ $campaign->remaining_days }} hari lagi
                        @elseif ($campaign->remaining_days === 0)
                        Hari ini terakhir!
                        @endif
                    </p>
                </div>
                <div class="flex mt-auto border-t border-gray-200 divide-x divide-gray-200">
                    <a class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-800 bg-white shadow-sm gap-x-2 rounded-es-xl hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="{{ route('donasi.campaign_detail', ['ziswafCampaign' => $campaign]) }}">
                        <span class=" font-axiatabold">
                            Donasi
                        </span>
                    </a>
                </div>
            </div>
            <!-- End Card -->
            @endforeach
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
</div>
