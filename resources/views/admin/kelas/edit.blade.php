<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-6">

            <h1 class="text-3xl font-bold mb-6">
                Edit Data Kelas
            </h1>

            <div class="bg-white rounded-lg shadow p-6">

                <form action="{{ route('admin.kelas.update', $kelas) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label class="block mb-2 font-semibold">
                            Kode Kelas
                        </label>

                        <input
                            type="text"
                            name="kode"
                            value="{{ old('kode', $kelas->kode) }}"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('kode')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2 font-semibold">
                            Nama Kelas
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $kelas->nama) }}"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2 font-semibold">
                            Angkatan
                        </label>

                        <input
                            type="number"
                            name="angkatan"
                            value="{{ old('angkatan', $kelas->angkatan) }}"
                            class="w-full border rounded-lg px-4 py-2">

                        @error('angkatan')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg">

                            Update

                        </button>

                        <a href="{{ route('admin.kelas.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">

                            Kembali

                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>