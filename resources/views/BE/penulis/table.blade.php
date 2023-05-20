<div class="card-body">
    <table class="table table-responsive" id="table1">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penulis as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        @if ($data->status == 1)
                            <div
                                style="background-color: #08DF24; width: 50%; text-align: center;border-radius: 25px; color:white">
                                Aktif
                            </div>
                        @else
                            <div
                                style="background-color: #E4E4E4; width: 50%; text-align: center;border-radius: 25px; color:black">
                                Tidak Aktif
                            </div>
                        @endif
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('penulis.destroy', $data->id) }}" method="POST">
                            {{--  <a href="/penulis/{{ $data->id }}"><span class="badge badge-pill"
                                    style="background-color:#00AFE7"><i class="bi bi-file-text-fill"></i></span></a>  --}}
                            <a href="/penulis/{{ $data->id }}/edit"><span class="badge badge-pill"
                                    style="background-color:#FF5F00"><i class="bi bi-pencil-fill"></i></span></a>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
