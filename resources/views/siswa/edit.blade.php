<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Laporan
        </h2>

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Pelapor -->
            <div class="mt-4">
                <x-label for="pelapor" :value="__('Pelapor')" />
                <x-input id="pelapor" class="block mt-1 w-full" type="text" name="pelapor" value="{{ $siswa->pelapor }}" required autofocus />
            </div>

            <!-- Terlapor -->
            <div class="mt-4">
                <x-label for="terlapor" :value="__('Terlapor')" />
                <x-input id="terlapor" class="block mt-1 w-full" type="text" name="terlapor" value="{{ $siswa->terlapor }}" required />
            </div>

            <!-- Kelas -->
            <div class="mt-4">
                <x-label for="kelas" :value="__('Kelas')" />
                <x-input id="kelas" class="block mt-1 w-full" type="text" name="kelas" value="{{ $siswa->kelas }}" required />
            </div>

            <!-- Bukti -->
            <div class="mt-4">
                <x-label for="bukti" :value="__('Bukti (opsional)')" />
                <x-input id="bukti" class="block mt-1 w-full" type="file" name="bukti" />
                @if($siswa->bukti)
                    <img src="{{ asset('uploads/' . $siswa->bukti) }}" alt="Bukti" class="w-20 h-20 mt-2">
                @endif
            </div>

            <!-- Status -->
            <div class="mt-4">
                <x-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="block mt-1 w-full">
                    <option value="sedang dalam tinjauan" {{ $siswa->status == 'sedang dalam tinjauan' ? 'selected' : '' }}>Sedang dalam Tinjauan</option>
                    <option value="done" {{ $siswa->status == 'done' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Simpan') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
