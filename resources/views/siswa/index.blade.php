<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <!-- Tombol untuk menuju ke halaman create.blade.php -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('siswa.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Tambah Laporan
            </a>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Pelapor</th>
                    <th scope="col" class="px-6 py-3">Terlapor</th>
                    <th scope="col" class="px-6 py-3">Kelas</th>
                    <th scope="col" class="px-6 py-3">Bukti</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $siswa->pelapor }}</td>
                        <td class="px-4 py-3">{{ $siswa->terlapor }}</td>
                        <td class="px-4 py-3">{{ $siswa->kelas }}</td>
                        <td class="px-4 py-3">
                            @if (Str::endsWith($siswa->bukti, ['.jpg', '.jpeg', '.png']))
                                <!-- Menampilkan gambar jika file adalah gambar -->
                                <img src="{{ asset('uploads/' . $siswa->bukti) }}" alt="Bukti" class="w-20 h-20 object-cover">
                            @else
                                <!-- Tampilkan nama file jika bukan gambar -->
                                {{ $siswa->bukti }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="badge 
                                @if ($siswa->status == 'sedang dalam tinjauan') badge-danger 
                                @elseif($siswa->status == 'done') badge-success 
                                @endif">
                                {{ $siswa->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <!-- Tombol Edit -->
                            <a href="{{ route('siswa.edit', $siswa->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>

                            <!-- Tombol Delete -->
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="inline-block" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
