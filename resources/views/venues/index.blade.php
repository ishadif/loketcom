@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" style="display:flex;">
                    <span>All Venues</span>
                    <a href="/venues/create" class="btn btn-info" style="margin-left: auto;">Buat Venue</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Tempat</th>
                                <th scope="col" colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($venues as $venue)
                            <tr>
                                <td>{{ $venue->name }}</td>
                                <td>{{ $venue->address }}</td>
                                <td>{{ $venue->created_at }}</td>
                                <td>
                                    <a href="#"><span class="oi oi-eye" title="Lihat Event"></span></a>
                                </td>
                                <td>
                                    <a href="#"><span class="oi oi-pencil" title="Ubah Event"></span></a>
                                </td>
                                <td>
                                    <a href="#"><span class="oi oi-trash" title="Hapus Event"></span></a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Anda Belum Mempunyai Venue Saat Ini</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection