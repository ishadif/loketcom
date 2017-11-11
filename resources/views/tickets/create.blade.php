@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">
                        Form Tiket Baru
                    </h3>
                    <p class="card-text">
                        <form action="{{ $event->path() }}/tickets" method="POST">
                        	{{ csrf_field() }}

							<div class="form-group">
								<label for="name">Nama Tiket:</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Kategori Tiket">
							</div>

							<div class="form-group">
								<label for="price">Harga Tiket:</label>
								<input type="text" class="form-control" name="price" id="price" placeholder="Masukkan Harga Tiket">
							</div>

							<div class="form-group">
								<label for="quantity">Jumlah Tiket:</label>
								<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Jumlah Tiket">
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection