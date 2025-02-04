<div>
    <!-- Initial Timeline -->
    <div>
        @forelse($initialTransactions as $transaction)
        <!-- Timeline Item -->
        <div class="flex gap-x-3">
            <div class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200">
                <div class="relative z-10 flex items-center justify-center size-7">
                    <svg class="bg-gray-100 rounded-full shrink-0 size-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.3365 12.3466L14.0765 11.9195C13.9082 12.022 13.8158 12.2137 13.8405 12.4092C13.8651 12.6046 14.0022 12.7674 14.1907 12.8249L14.3365 12.3466ZM9.6634 12.3466L9.80923 12.8249C9.99769 12.7674 10.1348 12.6046 10.1595 12.4092C10.1841 12.2137 10.0917 12.022 9.92339 11.9195L9.6634 12.3466ZM4.06161 19.002L3.56544 18.9402L4.06161 19.002ZM19.9383 19.002L20.4345 18.9402L19.9383 19.002ZM16 8.5C16 9.94799 15.2309 11.2168 14.0765 11.9195L14.5965 12.7737C16.0365 11.8971 17 10.3113 17 8.5H16ZM12 4.5C14.2091 4.5 16 6.29086 16 8.5H17C17 5.73858 14.7614 3.5 12 3.5V4.5ZM7.99996 8.5C7.99996 6.29086 9.79082 4.5 12 4.5V3.5C9.23854 3.5 6.99996 5.73858 6.99996 8.5H7.99996ZM9.92339 11.9195C8.76904 11.2168 7.99996 9.948 7.99996 8.5H6.99996C6.99996 10.3113 7.96342 11.8971 9.40342 12.7737L9.92339 11.9195ZM9.51758 11.8683C6.36083 12.8309 3.98356 15.5804 3.56544 18.9402L4.55778 19.0637C4.92638 16.1018 7.02381 13.6742 9.80923 12.8249L9.51758 11.8683ZM3.56544 18.9402C3.45493 19.8282 4.19055 20.5 4.99996 20.5V19.5C4.70481 19.5 4.53188 19.2719 4.55778 19.0637L3.56544 18.9402ZM4.99996 20.5H19V19.5H4.99996V20.5ZM19 20.5C19.8094 20.5 20.545 19.8282 20.4345 18.9402L19.4421 19.0637C19.468 19.2719 19.2951 19.5 19 19.5V20.5ZM20.4345 18.9402C20.0164 15.5804 17.6391 12.8309 14.4823 11.8683L14.1907 12.8249C16.9761 13.6742 19.0735 16.1018 19.4421 19.0637L20.4345 18.9402Z" fill="#000000"></path>
                    </svg>
                </div>
            </div>
            <div class="grow pt-0.5 pb-8">
                <h3 class="flex gap-x-1.5 font-axiatamedium text-gray-800">
                    <span class="font-axiatamedium">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                </h3>
                <p class="mt-1 text-gray-600">
                    {{ $transaction->is_anonymous ? $transaction->name : 'Hamba Allah' }}
                </p>
                <p class="mt-1 text-xs text-gray-600">
                    {{ $transaction->doa ?: '' }}
                </p>
                <p class="mt-1 text-xs text-gray-400">
                    {{ $transaction->created_at->format('d M Y, H:i') }}
                </p>
            </div>
        </div>
        @empty
        <div class="py-4 text-center text-gray-500">
            No donations yet
        </div>
        @endforelse
    </div>

    <!-- Show More Button -->
    @if($initialTransactions->count() > 0)
    <div class="mt-4 text-center">
        <button wire:click="toggleModal" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-800">
            Show All Donations
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
    </div>
    @endif

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div class="relative inline-block w-full max-w-2xl p-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:p-6">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 border-b">
                    <h3 class="text-lg font-semibold">All Donations</h3>
                    <button wire:click="toggleModal" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal content -->
                <div class="mt-4 space-y-4 max-h-[60vh] overflow-y-auto">
                    @if($allTransactions)
                    @foreach($allTransactions as $transaction)
                    <div class="flex pb-4 border-b gap-x-3 last:border-b-0">
                        <div class="shrink-0">
                            <div class="flex items-center justify-center size-7">
                                <svg class="bg-gray-100 rounded-full shrink-0 size-7" viewBox="0 0 24 24" fill="none">
                                    <!-- Same SVG as above -->
                                </svg>
                            </div>
                        </div>
                        <div class="grow">
                            <h3 class="flex gap-x-1.5 font-axiatamedium text-gray-800">
                                <span class="font-axiatamedium">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                            </h3>
                            <p class="mt-1 text-gray-600">
                                {{ $transaction->donor_name ?: 'Hamba Allah' }}
                            </p>
                            <p class="mt-1 text-xs text-gray-600">
                                {{ $transaction->message ?: 'Barakallah' }}
                            </p>
                            <p class="mt-1 text-xs text-gray-400">
                                {{ $transaction->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $allTransactions->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Loading State -->
    <div wire:loading.delay class="w-full py-4 text-center">
        <div class="animate-spin inline-block w-6 h-6 border-[3px] border-current border-t-transparent text-gray-400 rounded-full">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

</div>
