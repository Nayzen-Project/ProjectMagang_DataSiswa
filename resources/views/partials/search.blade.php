
<div id="search-results">
    @if(isset($results))
        @if($results->isEmpty())
            <p>No results found for your search.</p>
        @else
            <ul>
                @foreach($results as $siswa)
                    <li>
                        <div class="bg-white p-4 border border-neutral-500 rounded shadow-md">
                            <p>Nama : {{ $siswa->nama }}</p>
                            <p>Tempat Tanggal Lahir : {{ $siswa->ttl }}</p>
                            <p>Sekolah : {{ $siswa->sekolah }}</p>
                            <p>Keterangan : {{ $siswa->keterangan }}</p>
                            <div class="flex space-x-2 py-5 mt-4">
                                <button class="bg-neutral-500 text-white px-3 py-2 rounded" data-modal-target="static-modal{{ $siswa->id }}" data-modal-toggle="static-modal{{ $siswa->id }}">Edit</button>
                                <a href="{{ route('siswa.destroy', $siswa->id) }}" class="bg-neutral-500 text-white px-2 py-2 rounded">Delete</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
