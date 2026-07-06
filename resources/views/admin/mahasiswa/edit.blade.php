<x-app-layout>

    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Mahasiswa
        </h1>

        <div class="bg-white shadow rounded p-6">

            <form
                action="{{ route('admin.mahasiswa.update', $mahasiswa) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-2">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim', $mahasiswa->nim) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $mahasiswa->nama) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $mahasiswa->email) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">
                        No HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                        class="w-full border rounded p-2">
                </div>

                <div class="mb-6">
                    <label class="block mb-2">
                        Kelas
                    </label>

                    <select
                        name="kelas_id"
                        class="w-full border rounded p-2">

                        @foreach($kelas as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ old('kelas_id', $mahasiswa->kelas_id) == $item->id ? 'selected' : '' }}>

                                {{ $item->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="flex gap-3">

                    <button
                        class="bg-yellow-500 text-white px-5 py-2 rounded">

                        Update

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