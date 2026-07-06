<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Absensi
        </h1>

        <div class="bg-white shadow rounded-lg p-6">

            <form
                action="{{ route('admin.absensi.update', $absensi) }}"
                method="POST">

                @csrf
                @method('PUT')

                <!-- Mahasiswa -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Mahasiswa
                    </label>

                    <select
                        name="mahasiswa_id"
                        class="w-full border rounded-lg px-4 py-2">

                        @foreach($mahasiswa as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('mahasiswa_id', $absensi->mahasiswa_id) == $item->id ? 'selected' : '' }}>

                                {{ $item->nim }} - {{ $item->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Tanggal -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $absensi->tanggal) }}"
                        class="w-full border rounded-lg px-4 py-2">

                </div>

                <!-- Jam -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Jam
                    </label>

                    <input
                        type="time"
                        name="jam"
                        value="{{ old('jam', $absensi->jam) }}"
                        class="w-full border rounded-lg px-4 py-2">

                </div>

                <!-- Status -->
                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-2">

                        <option value="hadir"
                            {{ $absensi->status == 'hadir' ? 'selected' : '' }}>
                            Hadir
                        </option>

                        <option value="izin"
                            {{ $absensi->status == 'izin' ? 'selected' : '' }}>
                            Izin
                        </option>

                        <option value="sakit"
                            {{ $absensi->status == 'sakit' ? 'selected' : '' }}>
                            Sakit
                        </option>

                        <option value="alpa"
                            {{ $absensi->status == 'alpa' ? 'selected' : '' }}>
                            Alpa
                        </option>

                    </select>

                </div>

                <div class="flex gap-3">

                    <button
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg">

                        Update

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