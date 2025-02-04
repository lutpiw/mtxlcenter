<div class="w-full">
    <section id="featured" class="container px-4 py-8 mx-auto">
        <p class="font-axiatabold text-xl leading-[27px] mb-8">Konfirmasi Donasi</p>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
            <div class="relative flex flex-col col-span-1 gap-4 overflow-hidden rounded-xl">
                <div class="relative aspect-[3/4] rounded-xl overflow-hidden">
                    <img class="absolute inset-0 object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-105 group-focus:scale-105" src="{{ Storage::url($ziswafCampaign->thumbnail) }}" alt="Campaign Thumbnail">
                </div>
            </div>
            <div class="flex flex-col col-span-2 rounded-[20px] p-4 mx-4 pb-5 gap-5 bg-white border">
                <div id="info">
                    <h1 id="title" class="font-axiatabold text-[22px] leading-[30px]">{{$ziswafCampaign->name}}</h1>
                </div>
                <hr class="border-[#EAEAED]">

                <div class="relative">
                    <!-- Progress Bar -->
                    <div class="absolute top-5 w-full h-0.5 bg-gray-200">
                        <div class="absolute h-0.5 bg-mtxl2 transition-all duration-300" style="width: {{ ($currentStep - 1) * 33.33 }}%"></div>
                    </div>

                    <!-- Steps -->
                    <div class="relative flex justify-between">
                        @foreach(['Nominal', 'Profil', 'Akad', 'Pembayaran'] as $index => $step)
                        <div class="flex flex-col items-center">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full
                                    {{ $currentStep > ($index + 1) ? 'bg-mtxl2 text-white' :
                                       ($currentStep == ($index + 1) ? 'bg-mtxl2 text-white' :
                                       'bg-gray-200 text-gray-700') }}">
                                @if($currentStep > ($index + 1))
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                @else
                                {{ $index + 1 }}
                                @endif
                            </div>
                            <span class="mt-2 text-sm font-axiatamedium
                                    {{ $currentStep >= ($index + 1) ? 'text-mtxl2' : 'text-gray-500' }}">
                                {{ $step }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step Content -->
                <form form wire:submit.prevent="submit">
                    @if($currentStep === 1)
                    <div class=" flex flex-col rounded-[20px] p-4 gap-5 bg-white border">

                        <!-- Nominal Step -->
                        <div class="space-y-4">
                            <div class="flex flex-col gap-2">
                                <label for="name" class="font-semibold">Nominal</label>
                                <div class="flex items-center w-full rounded-full ring-1 {{ $errors->has('nominal') ? 'ring-red-500 focus-within:red-500' : 'ring-[#090917] focus-within:ring-mtxl1' }} px-[14px] gap-[10px] overflow-hidden transition-all duration-300 focus-within:ring-2">
                                    <svg class="flex w-6 h-6 shrink-0" fill="#000000" viewBox="0 0 24 24" id="rupiah" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                        <path id="primary" d="M21,13.5h0A2.5,2.5,0,0,0,18.5,11H16v5h2.5A2.5,2.5,0,0,0,21,13.5ZM16,16v4" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                        <path id="primary-2" data-name="primary" d="M7.5,13H3V4H7.5A4.49,4.49,0,0,1,12,8.5h0A4.49,4.49,0,0,1,7.5,13ZM3,12v8m6-7,3,7" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                    </svg>
                                    <input type="text" wire:model.live="formattedNominal" class="appearance-none outline-none w-full font-axiatabook placeholder:text-sm placeholder:text-[#878785] py-[14px]" placeholder="Masukkan Nominal Donasi" inputmode="numeric">
                                </div>
                                <div class="flex items-center w-full">
                                    <svg class="flex w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75Z" fill="#6b7280"></path>
                                        <path d="M12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#6b7280"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="#6b7280"></path>
                                    </svg>
                                    <p class="text-xs text-gray-500 font-axiatabook ms-1">
                                        Minimal Nominal Donasi Rp 10.000
                                    </p>
                                </div>
                                @error('nominal')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Amount Suggestions -->
                            <div class="flex flex-wrap gap-2">
                                @foreach($formattedSuggestions as $suggestion)
                                <button wire:click="selectAmount({{ $suggestion['value'] }})" class="px-4 py-2 text-sm border rounded-full hover:bg-gray-50">
                                    {{ $suggestion['display'] }}
                                </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @elseif($currentStep === 2)
                    <!-- Profile Step -->
                    <div class="flex flex-col rounded-[20px] p-4 gap-5 bg-white border">
                        <div class="flex flex-col gap-2">
                            <label for="name" class="font-semibold">Nama Lengkap</label>
                            <div class="flex items-center w-full rounded-full ring-1 {{ $errors->has('name') ? 'ring-red-500 focus-within:red-500' : 'ring-[#090917] focus-within:ring-mtxl1' }} px-[14px] gap-[10px] overflow-hidden transition-all duration-300 focus-within:ring-2">
                                <svg class="flex w-6 h-6 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <input type="text" wire:model.live="name" class="appearance-none outline-none w-full font-axiatabook placeholder:text-sm placeholder:text-[#878785] py-[14px]" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="flex">
                                <input id="isAnonymous" wire:model.live="isAnonymous" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-mtxl2 focus:ring-mtxl2 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-mtxl2 dark:checked:border-mtxl2 dark:focus:ring-offset-gray-800">
                                <label for="isAnonymous" class="text-xs text-gray-500 font-axiatabook ms-3">Donasi sebagai Hamba Allah</label>
                            </div>
                            @if ($isAnonymous)
                            <div class="flex items-center w-full">
                                <svg class="flex w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75Z" fill="#6b7280"></path>
                                    <path d="M12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#6b7280"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="#6b7280"></path>
                                </svg>
                                <p class="text-xs text-gray-500 font-axiatabook ms-1">
                                    Nama Anda Tidak Akan Ditampilkan Pada List Donatur
                                </p>
                            </div>
                            @endif
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="name" class="font-semibold">No. HP</label>
                            <div class="flex items-center w-full rounded-full ring-1 {{ $errors->has('phone') ? 'ring-red-500 focus-within:red-500' : 'ring-[#090917] focus-within:ring-mtxl1' }} px-[14px] gap-[10px] overflow-hidden transition-all duration-300 focus-within:ring-2">
                                <svg class="flex w-6 h-6 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 5.5C21 14.0604 14.0604 21 5.5 21C5.11378 21 4.73086 20.9859 4.35172 20.9581C3.91662 20.9262 3.69906 20.9103 3.50103 20.7963C3.33701 20.7019 3.18146 20.5345 3.09925 20.364C3 20.1582 3 19.9181 3 19.438V16.6207C3 16.2169 3 16.015 3.06645 15.842C3.12515 15.6891 3.22049 15.553 3.3441 15.4456C3.48403 15.324 3.67376 15.255 4.05321 15.117L7.26005 13.9509C7.70153 13.7904 7.92227 13.7101 8.1317 13.7237C8.31637 13.7357 8.49408 13.7988 8.64506 13.9058C8.81628 14.0271 8.93713 14.2285 9.17882 14.6314L10 16C12.6499 14.7999 14.7981 12.6489 16 10L14.6314 9.17882C14.2285 8.93713 14.0271 8.81628 13.9058 8.64506C13.7988 8.49408 13.7357 8.31637 13.7237 8.1317C13.7101 7.92227 13.7904 7.70153 13.9509 7.26005L13.9509 7.26005L15.117 4.05321C15.255 3.67376 15.324 3.48403 15.4456 3.3441C15.553 3.22049 15.6891 3.12515 15.842 3.06645C16.015 3 16.2169 3 16.6207 3H19.438C19.9181 3 20.1582 3 20.364 3.09925C20.5345 3.18146 20.7019 3.33701 20.7963 3.50103C20.9103 3.69907 20.9262 3.91662 20.9581 4.35173C20.9859 4.73086 21 5.11378 21 5.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <input type="phone" maxlength="16" wire:model.live="phone" class="appearance-none outline-none w-full font-axiatabook placeholder:text-sm placeholder:text-[#878785] py-[14px]" placeholder="Masukkan Nomor HP Anda">
                            </div>
                            @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="email" class="font-semibold">Email</label>
                            <div class="flex items-center w-full rounded-full ring-1 {{ $errors->has('email') ? 'ring-red-500 focus-within:red-500' : 'ring-[#090917] focus-within:ring-mtxl1' }} px-[14px] gap-[10px] overflow-hidden transition-all duration-300 focus-within:ring-2">
                                <svg class="flex w-6 h-6 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <input type="email" wire:model.live="email" class="appearance-none outline-none w-full font-axiatabook placeholder:text-sm placeholder:text-[#878785] py-[14px]" placeholder="Masukkan Alamat email Anda">
                            </div>
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @elseif($currentStep === 3)
                    <!-- Akad Step -->
                    <div class="flex flex-col rounded-[20px] p-4 gap-5 bg-white border">
                        <div class="flex flex-col gap-2">
                            <label for="doa" class="font-semibold">Doa (Opsional)</label>
                            <textarea wire:model="doa" rows="3" class="w-full p-3 border rounded-lg placeholder:text-sm focus:ring-2 focus:ring-mtxl1 focus:border-transparent" placeholder="Tuliskan doa Anda di sini..."></textarea>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="p-4 rounded-lg bg-gray-50">
                                <div class="text-sm text-gray-700 whitespace-pre-wrap">{!! $this->getAkadText() !!}</div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="flex">
                                <input id="akad-agreement" wire:model.live="isAgree" type="checkbox" class="border-gray-200 rounded text-mtxl2 shrink-0 focus:ring-mtxl2 disabled:opacity-50 disabled:pointer-events-none">
                                <label for="akad-agreement" class="text-sm font-axiatabook ms-3">Saya menyetujui akad dan ketentuan di atas</label>
                            </div>
                            @error('isAgree')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @elseif($currentStep === 4)
                    <!-- Payment Step -->
                    <div class="flex flex-col rounded-[20px] p-4 gap-5 bg-white border">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-axiatamedium">Kategori</p>
                                <p class="text-sm font-axiatabold">{{$ziswafCampaign->ziswafCategory->name}}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-axiatamedium">Program</p>
                                <p class="text-sm font-axiatabold">{{$ziswafCampaign->ziswafProgram->name}}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-axiatamedium">Campaign</p>
                                <p class="text-sm font-axiatabold">{{$ziswafCampaign->name}}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-axiatamedium">Total Donasi</p>
                                <p class="text-sm font-axiatabold">Rp. {{$formattedNominal}}</p>
                            </div>
                            <hr class="border-[#EAEAED]">
                            <label for="name" class="font-semibold">Metode Pembayaran</label>
                            <div class="grid space-y-2">
                                <div class="relative">
                                    <input type="radio" wire:model.live="paymentMethod" id="bank_transfer" value="bank_transfer" class="hidden peer">
                                    <label for="bank_transfer" class="flex items-center p-4 border rounded-lg cursor-pointer peer-checked:border-mtxl2 peer-checked:ring-1 peer-checked:ring-mtxl2">
                                        <div class="flex items-center justify-between w-full">
                                            <div class="flex items-center gap-x-4">
                                                <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg">
                                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                                        <path d="M2 12.6101H19" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M19 10.28V17.43C18.97 20.28 18.19 21 15.22 21H5.78003C2.76003 21 2 20.2501 2 17.2701V10.28C2 7.58005 2.63003 6.71005 5 6.57005C5.24003 6.56005 5.50003 6.55005 5.78003 6.55005H15.22C18.24 6.55005 19 7.30005 19 10.28Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24003 6.56 5 6.57C5.03003 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M5.25 16.75H8.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M10.25 16.75H14.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-axiatamedium">Transfer Bank</p>
                                                    <p class="text-sm text-gray-500 font-axiatabook">Transfer manual melalui rekening bank</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @if (!@empty($bankAccount->qris))
                                <div class="relative">
                                    <input type="radio" wire:model.live="paymentMethod" id="qris" value="qris" class="hidden peer">
                                    <label for="qris" class="flex items-center p-4 border rounded-lg cursor-pointer peer-checked:border-mtxl2 peer-checked:ring-1 peer-checked:ring-mtxl2">
                                        <div class="flex items-center justify-between w-full">
                                            <div class="flex items-center gap-x-4">
                                                <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg">
                                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                                        <path d="M2 9V7C2 4 4 2 7 2H17C20 2 22 4 22 7V9" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M2 15V17C2 20 4 22 7 22H17C20 22 22 20 22 17V15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M2 12H22" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-axiatamedium">QRIS</p>
                                                    <p class="text-sm text-gray-500 font-axiatambook">Pembayaran menggunakan QRIS</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @endif
                            </div>
                            @if($paymentMethod === 'bank_transfer')
                            <div class="p-4 mt-4 rounded-lg bg-gray-50">
                                <div class="space-y-3">
                                    <h4 class="font-axiatamedium">Informasi Rekening</h4>
                                    <div class="space-y-2">
                                        <img class="w-[200px]" src="{{ Storage::url($bank->logo) }}" alt="Campaign Thumbnail">
                                        <p class="flex items-center gap-2 text-sm">
                                            <span class="text-gray-500">No. Rekening:</span>
                                            <span class="font-axiatamedium">{{ $bankAccount->account_number }}</span>
                                            <button wire:click="copyToClipboard('{{ $bankAccount->account_number }}')" class="p-1.5 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" title="Copy to clipboard">
                                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 12.9V17.1C16 20.6 14.6 22 11.1 22H6.9C3.4 22 2 20.6 2 17.1V12.9C2 9.4 3.4 8 6.9 8H11.1C14.6 8 16 9.4 16 12.9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M22 6.9V11.1C22 14.6 20.6 16 17.1 16H16V12.9C16 9.4 14.6 8 11.1 8H8V6.9C8 3.4 9.4 2 12.9 2H17.1C20.6 2 22 3.4 22 6.9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </p>
                                        <p class="text-sm">
                                            <span class="text-gray-500">Atas Nama:</span>
                                            <span class="font-axiatamedium">{{ $bankAccount->account_name }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($paymentMethod === 'qris')
                            <div class="p-4 mt-4 rounded-lg bg-gray-50">
                                <div class="space-y-3">
                                    <h4 class="flex justify-center text-sm text-center font-axiatabook">Scan QRIS to proceed your payment<br>via E-Wallet, Mobile Banking, or other options.</h4>

                                    <div class="space-y-2">
                                        <div class="flex justify-center">
                                            {!! QrCode::size(200)->generate($bankAccount->qris) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <hr class="border-[#EAEAED]">
                        <div class="flex flex-col gap-2">
                            <label for="name" class="font-semibold">Upload Bukti</label>
                            <input type="file" wire:model.live="paymentProof" id="payment-proof" accept="image/*" class="hidden">
                            <label for="payment-proof" class="flex flex-col items-center justify-center w-full h-48
                                      border-2 border-dashed rounded-lg cursor-pointer
                                      bg-gray-50 hover:bg-gray-100
                                      {{ $paymentProof ? 'border-mtxl2' : 'border-gray-300' }}">

                                @if($paymentProof)
                                <!-- Preview -->
                                <div class="relative w-full h-full">
                                    <img src="{{ $paymentProof->temporaryUrl() }}" class="object-contain w-full h-full p-2" alt="Payment Proof">
                                    <button wire:click.prevent="$set('paymentProof', null)" class="absolute p-1 text-white bg-red-500 rounded-full top-2 right-2 hover:bg-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                @else
                                <!-- Upload Icon and Text -->
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Click to upload</span>&nbsp;or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG or JPEG (MAX. 2MB)
                                    </p>
                                </div>
                                @endif
                            </label>
                        </div>
                    </div>
                    @endif

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-8">
                        <button wire:click="previousStep" @class([ 'px-4 py-2 text-sm font-axiatamedium rounded-lg' , 'invisible'=> $currentStep === 1,
                            'text-gray-700 bg-white border border-gray-300 hover:bg-gray-50' => $currentStep !== 1
                            ])>
                            Back
                        </button>

                        <button wire:click="nextStep" @class([ 'px-4 py-2 text-sm font-axiatamedium rounded-lg' , 'bg-mtxl2 text-white hover:bg-mtxl1'=> $isStepValid,
                            'bg-gray-100 text-gray-400 cursor-not-allowed' => !$isStepValid
                            ])
                            @disabled(!$isStepValid)>
                            {{ $currentStep === 4 ? 'Submit' : 'Next' }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- Stepper -->
        </div>
    </section>
</div>
