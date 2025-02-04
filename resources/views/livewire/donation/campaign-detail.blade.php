<div>
    <section id="gallery" class="flex flex-col gap-[10px] py-5">
        <div class="flex w-full h-[500px] shrink-0 overflow-hidden px-4">
            <img id="main-thumbnail" src={{ Storage::url($ziswafCampaign->thumbnail) }} class="object-contain object-center w-full h-full" alt="thumbnail">
        </div>
        <div class="w-full overflow-hidden swiper">
            <div class="swiper-wrapper">
                @foreach ($ziswafCampaign->photos as $photo)
                <div class="swiper-slide !w-fit py-[2px]">
                    <label class="thumbnail-selector flex flex-col shrink-0 w-20 h-20 rounded-[20px] p-[10px] bg-white transition-all duration-300 hover:ring-2 hover:ring-mtxl1 has-[:checked]:ring-2 has-[:checked]:ring-mtxl1">
                        <input type="radio" name="image" class="hidden" checked>
                        <img src={{ Storage::url($photo->photo) }} class="object-contain w-full h-full" alt="thumbnail">
                    </label>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="info" class="flex flex-col gap-[14px] mx-10 mb-2">
        <div class="flex items-center justify-between">
            <div class="sm:flex-col ">

                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-teal-800 bg-teal-100 rounded-full gap-x-1 dark:bg-teal-500/10 dark:text-teal-500">
                    <svg class="shrink-0 size-7" fill="#14b8a6" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 475.479 475.479" xml:space="preserve" stroke="#14b8a6">
                        <path id="XMLID_490_" d="M471.085,201.536L329.663,60.116c-5.857-5.857-15.354-5.858-21.213,0l-42.427,42.425v0h-0.001 l-31.819,31.82l-31.817-31.819h-0.001v-0.001l-42.429-42.426c-5.858-5.857-15.355-5.858-21.213,0L4.394,194.466 C1.58,197.279,0,201.095,0,205.073c0,3.979,1.581,7.794,4.394,10.607l42.427,42.426c2.929,2.929,6.768,4.393,10.606,4.393 c2.212,0,4.418-0.502,6.456-1.475l145.568,145.57c0.002,0.001,0.003,0.003,0.004,0.005c8.773,8.772,20.297,13.158,31.82,13.158 c11.523,0,23.047-4.386,31.819-13.159c7.914-7.913,12.512-18.255,13.109-29.344c10.675-0.589,21.18-4.946,29.317-13.082 c8.144-8.144,12.5-18.658,13.085-29.342c10.684-0.584,21.199-4.941,29.342-13.084c0.006-0.006,0.012-0.013,0.019-0.02 l53.634-53.634c1.999,0.954,4.195,1.478,6.452,1.478c3.978,0,7.794-1.581,10.606-4.393l42.427-42.427 c2.813-2.813,4.394-6.628,4.394-10.606C475.479,208.164,473.898,204.349,471.085,201.536z M36.213,205.073L149.351,91.935 l21.215,21.213l-4.466,4.466L57.427,226.286L36.213,205.073z M294.308,342.959c-5.846,5.845-15.357,5.847-21.207,0.007 c-0.002-0.002-0.004-0.005-0.007-0.008l-21.214-21.213c-5.858-5.857-15.356-5.857-21.213,0c-5.857,5.858-5.857,15.355,0.001,21.213 l21.21,21.209c0.001,0.001,0.003,0.003,0.004,0.005c0.002,0.002,0.004,0.004,0.006,0.006c2.829,2.832,4.387,6.596,4.387,10.599 c0,4.006-1.56,7.773-4.394,10.608c-5.848,5.848-15.365,5.848-21.214-0.001c-0.001-0.001-0.003-0.003-0.005-0.004L85.712,240.427 l106.067-106.066l21.212,21.213l-31.819,31.82c-0.003,0.003-0.006,0.007-0.009,0.01c-17.535,17.546-17.533,46.087,0.008,63.63 c8.773,8.773,20.296,13.16,31.82,13.16c11.523,0,23.046-4.386,31.818-13.158c0,0,0-0.001,0.001-0.001l31.82-31.82l53.026,53.026 c0.002,0.003,0.004,0.004,0.006,0.007l7.085,7.084c2.825,2.832,4.381,6.592,4.381,10.592c0,4.002-1.558,7.765-4.384,10.597 l-0.01,0.01c-0.001,0.001-0.003,0.003-0.004,0.005c-5.847,5.84-15.351,5.841-21.2,0.005c-0.005-0.005-0.009-0.01-0.014-0.015 l-21.209-21.208c-5.858-5.857-15.356-5.857-21.213,0.001c-5.857,5.858-5.857,15.355,0,21.213l21.2,21.199 c0.005,0.005,0.009,0.01,0.014,0.015C300.156,327.594,300.156,337.11,294.308,342.959z M368.554,268.712l-10.602-10.602 c-0.002-0.001-0.003-0.004-0.005-0.005c-0.001-0.001-0.002-0.001-0.002-0.003l-7.069-7.069c0-0.001-0.001-0.001-0.002-0.002 l-63.637-63.637c-2.813-2.813-6.628-4.393-10.606-4.393c-3.978,0-7.794,1.58-10.606,4.393l-42.426,42.426 c-5.849,5.85-15.366,5.849-21.214,0.001c-5.847-5.848-5.848-15.363-0.001-21.212c0.001-0.001,0.001-0.001,0.002-0.002 l42.414-42.415c0.004-0.003,0.008-0.006,0.012-0.01c0.004-0.004,0.007-0.008,0.011-0.012l31.809-31.81l113.137,113.138 L368.554,268.712z M418.052,233.356L297.843,113.147l21.213-21.212l120.208,120.208L418.052,233.356z"></path>
                    </svg>
                    {{ $ziswafCampaign->ziswafCategory->name }}
                </span>
                <h1 id="title" class="text-4xl leading-9 font-axiatabold">{{$ziswafCampaign->name}}</h1>
                <p class="text-sm text-gray-400">
                    @if ($ziswafCampaign->remaining_days > 0)
                    {{ $ziswafCampaign->remaining_days }} hari lagi
                    @elseif ($ziswafCampaign->remaining_days === 0)
                    Hari ini terakhir!
                    @endif
                </p>

            </div>
            <div class="sm:flex-col ">

                <div class="inline-flex items-center gap-1 mt-10 ">
                    <svg class="w-[26px] h-[26px]" fill=" #000000" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                        <path d="M47.74,22H2.26L5.61,11.12A2.98216,2.98216,0,0,1,8.48,9H15.05c-.03.33-.05.66-.05,1a9.93438,9.93438,0,0,0,2.01,6H16a1,1,0,0,0,0,2H34a1,1,0,0,0,0-2H32.99A9.93438,9.93438,0,0,0,35,10c0-.34-.02-.67-.05-1h6.57a2.98209,2.98209,0,0,1,2.87,2.12ZM28.61475,29a4.08076,4.08076,0,0,0-2.90723,1.208,1.03055,1.03055,0,0,1-1.415,0A4.08076,4.08076,0,0,0,21.38525,29a4.12359,4.12359,0,0,0-4.1123,4.126c0,4.38574,5.93652,8.542,7.727,9.69629,1.79053-1.1543,7.727-5.31055,7.727-9.69629A4.12359,4.12359,0,0,0,28.61475,29ZM38,29a.99974.99974,0,0,0,1,1h9v5H39a1,1,0,0,0,0,2h9v5H39a1,1,0,0,0,0,2h9v1a3.00328,3.00328,0,0,1-3,3H5a3.00328,3.00328,0,0,1-3-3V44h9a1,1,0,0,0,0-2H2V37h9a1,1,0,0,0,0-2H2V30h9a1,1,0,0,0,0-2H2V24H48v4H39A.99974.99974,0,0,0,38,29Zm-3.273,4.126A6.12619,6.12619,0,0,0,28.61475,27,6.05647,6.05647,0,0,0,25,28.18457,6.05647,6.05647,0,0,0,21.38525,27a6.12619,6.12619,0,0,0-6.1123,6.126c0,6.28515,8.84668,11.51855,9.22314,11.73828a1.01922,1.01922,0,0,0,1.00782,0C25.88049,44.64446,34.72705,39.41109,34.72705,33.126ZM17,10a8,8,0,1,1,13.27374,6H19.72626A7.97566,7.97566,0,0,1,17,10Zm7-3a.99974.99974,0,0,0,1,1,2.00229,2.00229,0,0,1,2,2,1,1,0,0,0,2,0,4.00427,4.00427,0,0,0-4-4A.99974.99974,0,0,0,24,7Zm-3,3a4.00427,4.00427,0,0,0,4,4,1,1,0,0,0,0-2,2.00229,2.00229,0,0,1-2-2,1,1,0,0,0-2,0Z"></path>
                    </svg>
                    <span class="font-semibold text-xl leading-[30px]">{{$ziswafCampaign->formatted_amount}}</span>
                </div>
                <p class="text-sm leading-[21px] text-[#878785]">terkumpul dari <span class="font-bold text-mtxl2 text-md">{{$ziswafCampaign->transaction_count}} </span>Donatur</p>
            </div>
        </div>
    </section>
    <section id="donate" class="flex flex-col gap-[14px] mb-5 mx-10">
        <div class="grid grid-cols-1 gap-3 md:grid-cols-8">
            <button onclick="copyToClipboard()" type="button" class="flex md:col-span-2 rounded-x rounded-full p-[12px_20px] bg-white border shadow-sm hover:bg-gray-100 font-bold items-center justify-center ">
                <svg class="mr-2 size-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 6C12.6569 6 14 4.65685 14 3C14 1.34315 12.6569 0 11 0C9.34315 0 8 1.34315 8 3C8 3.22371 8.02449 3.44169 8.07092 3.65143L4.86861 5.65287C4.35599 5.24423 3.70652 5 3 5C1.34315 5 0 6.34315 0 8C0 9.65685 1.34315 11 3 11C3.70652 11 4.35599 10.7558 4.86861 10.3471L8.07092 12.3486C8.02449 12.5583 8 12.7763 8 13C8 14.6569 9.34315 16 11 16C12.6569 16 14 14.6569 14 13C14 11.3431 12.6569 10 11 10C10.2935 10 9.644 10.2442 9.13139 10.6529L5.92908 8.65143C5.97551 8.44169 6 8.22371 6 8C6 7.77629 5.97551 7.55831 5.92908 7.34857L9.13139 5.34713C9.644 5.75577 10.2935 6 11 6Z" fill="#000000"></path>
                </svg>
                Share
            </button>
            <a href="{{ route('donasi.campaign_order', ['ziswafCampaign' => $ziswafCampaign]) }}" class="flex md:col-span-6 items-center justify-center rounded-full p-[12px_20px] bg-mtxl2 border shadow-sm hover:bg-mtxl1 font-bold text-white">
                Donasi Sekarang
            </a>
        </div>
        <!-- Toast Message -->
        <div id="toast" class="fixed flex items-center gap-2 px-4 py-2 text-white transition-all duration-300 transform translate-y-full bg-gray-900 rounded-lg opacity-0 bottom-5 right-5">
            <svg class="text-green-400 size-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            Copied to clipboard!
        </div>

    </section>

    <section id="info" class="flex flex-col gap-[14px] mb-5 mx-10">
        <div class="flex flex-col bg-white border border-t-4 shadow-sm border-t-blue-600 rounded-xl">
            <div class="p-4 md:p-5">
                <p class="mt-2 text-gray-500 font-axiatabook">
                    {!! $ziswafCampaign->about !!} </p>
            </div>
        </div>
    </section>

    <section class="flex flex-col gap-[14px] mb-5 mx-10">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
            <div class="flex flex-col bg-white border border-t-4 shadow-sm border-t-blue-600 rounded-xl">
                <div class="p-4 md:p-5">
                    <div id="title-tersalur" class="mb-5">
                        <h1 class="text-xl font-axiatabold">Updates</h1>
                        {{-- <p class="text-xs">Total <span class="font-bold">Rp. 50.000.000</span></p> --}}
                    </div>
                </div>
            </div>
            <div class="flex flex-col bg-white border border-t-4 shadow-sm border-t-blue-600 rounded-xl">
                <div class="p-4 md:p-5">
                    <div id="title-tersalur" class="mb-8">
                        <h1 class="text-xl font-axiatabold">Donatur ({{$ziswafCampaign->transaction_count}})</h1>

                    </div>
                    <livewire:utility.timeline :campaign-id="$ziswafCampaign->id" />
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function copyToClipboard() {
        // Copy URL to clipboard
        navigator.clipboard.writeText(window.location.href)
            .then(() => showToast())
            .catch(() => {
                // Fallback for older browsers
                const tempInput = document.createElement('input');
                tempInput.value = window.location.href;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                showToast();
            });
    }

    function showToast() {
        const toast = document.getElementById('toast');
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        // Hide toast after 2 seconds
        setTimeout(() => {
            toast.style.transform = 'translateY(full)';
            toast.style.opacity = '0';
        }, 2000);
    }

</script>
