<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Mahasiswa
        </h1>

        <div class="bg-white shadow rounded p-6">

            <form action="{{ route('admin.mahasiswa.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">
                    <label class="block mb-2">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim') }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-6">
                    <label class="block mb-2">
                        Kelas
                    </label>

                    <select
                        name="kelas_id"
                        class="w-full border rounded p-2">

                        <option value="">
                            Pilih Kelas
                        </option>

                        @foreach($kelas as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('kelas_id') == $item->id ? 'selected' : '' }}>

                                {{ $item->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="flex gap-3">

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded">

                        Simpan

                    </button>

                    <a
                        href="{{ route('admin.mahasiswa.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>