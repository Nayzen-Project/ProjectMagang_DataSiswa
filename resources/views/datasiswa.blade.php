<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="bg-neutral-300 w-full h-20 items-center flex justify-between">
        <div class="uppercase font-sans text-gray-800 font-black text-2xl ml-8">DATA SISWA</div>
        <div name="search-engine" class="mr-8 py-2 relative">
            <form id="searchForm" action="{{ route('siswa.index') }}" method="GET" class="flex">
                <input class="appearance-none border-2 pl-10 border-gray-100 hover:border-gray-400 transition-colors rounded-md w-full py-2 text-gray-800 leading-tight focus:outline-none focus:ring-neutral-600 focus:border-neutral-700 focus:shadow-outline" id="search" name="query" type="text" placeholder="Search..." value="{{ request()->input('query') }}" />
                <button type="submit" class="ml-2 bg-neutral-500 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Search
                </button>
                
            </form>
        </div>
        
            
        </div>
    </header>
  

    
    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <h2 class="mt-8 font-bold text-center text-3xl">DATA SISWA</h2>
        <div class="flex justify-end mt-4">
            <button id="modal-toggle" data-modal-target="static-modal-tambah" data-modal-toggle="static-modal-tambah" class="bg-neutral-300 text-black font-bold px-3 py-2 rounded">Tambah Data Siswa</button>
        </div>

        @include('partials.search')

        <!-- Flash Messages -->
        @if(session('success'))
        <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <script>
        document.addEventListener('DOMContentLoaded', function () {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.classList.add('opacity-0');
                setTimeout(() => {
                    flashMessage.remove();
                }, 500); // waktu transisi yang sesuai dengan durasi transisi di CSS
            }, 3000); // ganti 3000 dengan waktu dalam milidetik yang Anda inginkan
        }
        });
        </script>
        <!-- Flash Messages -->

        <!--Tambah Data-->
        <!-- Modal -->
        @include('partials.modal-add')
        
        

        <div class="mt-8">
            <div class="grid grid-cols-3 gap-4">
                <!-- Card -->
                @foreach($siswas as $siswa)
                <div class="bg-white p-4 border border-neutral-500 rounded shadow-md">
                    <p>Nama : {{ $siswa->nama }}</p>
                    <p>Tempat Tanggal Lahir : {{ $siswa->ttl }}</p>
                    <p>Sekolah : {{ $siswa->sekolah }}</p>
                    <p>Keterangan : {{ $siswa->keterangan }}</p>
                    <div class="flex space-x-2 py-5 mt-4">
                        <button class="bg-neutral-500 text-white px-3 py-2 rounded" data-modal-target="static-modal{{$siswa->id}}" data-modal-toggle="static-modal{{$siswa->id}}">Edit</button>
                        <a href="{{ route('siswa.destroy', $siswa->id) }}" class="bg-neutral-500 text-white px-2 py-2 rounded">Delete</a>
                    </div>
                </div>
                @include('partials.modal-edit')
                @endforeach
            </div>
        </div>
    </div>



<script>
    document.addEventListener('DOMContentLoaded', () => {
    const toggleModalButtons = document.querySelectorAll('[data-modal-target]');
    const hideModalButtons = document.querySelectorAll('[data-modal-hide]');

    toggleModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-target');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        });
    });

    hideModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-hide');
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    window.addEventListener('click', (event) => {
        hideModalButtons.forEach(button => {
            const modalId = button.getAttribute('data-modal-hide');
            const modal = document.getElementById(modalId);
            if (event.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    });
});


</script>

</body>
</html>
