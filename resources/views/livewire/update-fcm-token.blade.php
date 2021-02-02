<div>

    @if (session()->has('message'))
    <div class="px-6 py-3 mb-5 bg-green-600 text-white rounded-md">
        {{ session('message') }}
    </div>
    @endif

    <!-- Name -->
    <div>
        <x-label for="fcm_token" :value="__('FCM Token')" />

        <x-input wire:model.defer="fcm_token" id="fcm_token" class="block mt-1 w-full" type="text" name="fcm_token"
            :value="old('fcm_token')" required autofocus />
        @error('fcm_token')
        <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button wire:click="updateFcmToken">
            {{ __('Update FCM Token') }}
        </x-button>
    </div>
</div>
