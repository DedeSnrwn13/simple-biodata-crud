@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=""><a href="{{ route('biodata.create') }}" class="btn btn-success mb-3">Tambah Data</a></div>
            <form method="POST" action="{{ route('biodata.pencarian') }}">
                @csrf
                <div class="card card-header">Pencarian
                    <input type="text" name="cari" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-2 mb-2 px-5">Cari</button>
            </form>
            <div class="card">
                <div class="card-header">Biodata List</div>
                    @if (session('pesan'))
                        <div class="alert alert-success">
                            <b>Pesan</b> : {{ session('pesan') }}
                        </div>
                    @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        @php 
                            $no = 1;
                        @endphp
                        @foreach ($biodata as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-warning mb-1 btn-sm float-left">Edit</a>
                                    <form method="POST" action="{{ route('biodata.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" href="" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php 
                                $no++
                            @endphp
                        @endforeach
                    </table>
                </div>
                {{ $biodata->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
