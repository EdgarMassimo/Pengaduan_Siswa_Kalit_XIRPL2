<!-- resources/views/siswa/create.blade.php -->
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-6">Form Laporan Siswa</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="pelapor" class="block text-sm font-medium text-gray-700">Pelapor</label>
                    <input type="text" id="pelapor" name="pelapor" value="{{ old('pelapor') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="terlapor" class="block text-sm font-medium text-gray-700">Terlapor</label>
                    <input type="text" id="terlapor" name="terlapor" value="{{ old('terlapor') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="laporan" class="block text-sm font-medium text-gray-700">Laporan</label>
                    <textarea id="laporan" name="laporan" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('laporan') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="bukti" class="block text-sm font-medium text-gray-700">Bukti</label>
                    <input type="file" id="bukti" name="bukti" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
