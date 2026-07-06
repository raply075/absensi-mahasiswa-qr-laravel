<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Absensi
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form action="{{ route('admin.absensi.store') }}"
                  method="POST">

                @csrf

                <!-- Mahasiswa -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Mahasiswa
                    </label>

                    <select
                        name="mahasiswa_id"
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="">
                            -- Pilih Mahasiswa --
                        </option>

                        @foreach($mahasiswa as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('mahasiswa_id') == $item->id ? 'selected' : '' }}>

                                {{ $item->nim }} - {{ $item->nama }}

                            </option>

                        @endforeach

                    </select>

                    @error('mahasiswa_id')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Tanggal -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        class="w-full border rounded-lg px-4 py-2">

                    @error('tanggal')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Jam -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Jam
                    </label>

                    <input
                        type="time"
                        name="jam"
                        value="{{ old('jam') }}"
                        class="w-full border rounded-lg px-4 py-2">

                    @error('jam')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Status -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option value="hadir">
                            Hadir
                        </option>

                        <option value="izin">
                            Izin
                        </option>

                        <option value="sakit">
                            Sakit
                        </option>

                        <option value="alpa">
                            Alpa
                        </option>

                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="flex gap-3">

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                        Simpan

                    </button>

                    <a
                        href="{{ route('admin.absensi.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>