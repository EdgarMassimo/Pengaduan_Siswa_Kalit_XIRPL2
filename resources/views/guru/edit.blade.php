<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Siswa
        </h2>

        <!-- Form Edit Siswa -->
        <form action="{{ route('guru.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input untuk Pelapor -->
            <div class="mt-4">
                <label for="pelapor" class="block text-sm font-medium text-gray-700">Pelapor</label>
                <input type="text" name="pelapor" id="pelapor" value="{{ $siswa->pelapor }}" 
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Input untuk Terlapor -->
            <div class="mt-4">
                <label for="terlapor" class="block text-sm font-medium text-gray-700">Terlapor</label>
                <input type="text" name="terlapor" id="terlapor" value="{{ $siswa->terlapor }}" 
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Input untuk Kelas -->
            <div class="mt-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" name="kelas" id="kelas" value="{{ $siswa->kelas }}" 
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- Input untuk Status -->
            <div class="mt-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="sedang dalam tinjauan" {{ $siswa->status == 'sedang dalam tinjauan' ? 'selected
