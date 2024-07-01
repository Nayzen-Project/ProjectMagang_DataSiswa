<div id="static-modal{{$siswa->id}}" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="modal-title" class="text-xl font-semibold dark:text-black">
                    Edit Data Siswa {{$siswa->nama}}
                </h3>
                <button type="button" id="close-modal{{$siswa->id}}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal{{$siswa->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-5">
                        <label for="nama" class="">Nama : </label>
                        <input type="text" name="nama" id="nama" class="form-control w-full rounded h-10 appearance-none border-2 mt-1 border-gray-300 hover:border-gray-400 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" value="{{ $siswa->nama }}" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="ttl">Tempat Tanggal Lahir : </label>
                        <br>
                        <input type="text" name="ttl" id="ttl" class="form-control w-full rounded h-10 appearance-none border-2 mt-1 border-gray-300 hover:border-gray-400 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" value="{{ $siswa->ttl }}" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="sekolah">Sekolah : </label>
                        <br>
                        <input type="text" name="sekolah" id="sekolah" class="form-control w-full rounded h-10 appearance-none border-2 mt-1 border-gray-300 hover:border-gray-400 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" value="{{ $siswa->sekolah }}" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="keterangan">Keterangan : </label>
                        <br>
                        <input type="text" name="keterangan" id="keterangan" class="form-control w-full rounded h-10 appearance-none border-2 mt-1 border-gray-300 hover:border-gray-400 transition-colors py-2 px-3 text-gray-800 leading-tight focus:outline-none  focus:ring-gray-500 focus:border-gray-700 focus:shadow-outline" value="{{ $siswa->keterangan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5 bg-neutral-500 hover:bg-neutral-600 text-white rounded p-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>