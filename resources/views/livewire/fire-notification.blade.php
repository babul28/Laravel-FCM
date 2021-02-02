<div>
    @if (session()->has('message'))
    <div class="px-6 py-3 mb-5 bg-green-600 text-white rounded-md">
        {{ session('message') }}
    </div>
    @endif

    <div class="flex items-center justify-start mt-4">
        <p>Fire a Notification</p>
        <x-button wire:click="fireNotification" class="ml-10">
            {{ __('Fire') }}
        </x-button>
    </div>
</div>
