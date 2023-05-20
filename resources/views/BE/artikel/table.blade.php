<div class="card-body">
    <table class="table table-responsive" id="table1">
        <thead>
            <tr>
                <th>no</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Isi artikel</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikel as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if ($data->image != null || $data->image != '')
                            <img src="/upload/artikel/{{ $data->image }}" width="100">
                        @else
                            <span style="color: red">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $data->judul_artikel }}</td>
                    <td>{!! Str::limit($data->isi_artikel  , 100, $end=" ...")!!}</td>
                    <td> mharulanam </td>
                    <td>{{ $data->tanggal }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('artikel.destroy', $data->id) }}" method="POST">
                            <a href="/artikel/{{ $data->id }}"><span class="badge badge-pill"
                                    style="background-color:#00AFE7"><i class="bi bi-file-text-fill"></i></span></a>
                            <a href="/artikel/{{ $data->id }}/edit"><span class="badge badge-pill"
                                    style="background-color:#FF5F00"><i class="bi bi-pencil-fill"></i></span></a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" style="background-color:#B20600; border: 0px solid white;" class="badge badge-pill"><i
                                    class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
