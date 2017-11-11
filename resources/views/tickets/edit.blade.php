@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title">
                        Perbarui Tiket
                    </h3>
                    <p class="card-text">
                        <form action="{{ $event->path() }}/tickets/{{ $ticket->id }}" method="POST">
                        	{{ method_field('PATCH') }}
                        	{{ csrf_field() }}

							<div class="form-group">
								<label for="name">Nama Tiket:</label>
								<input type="text" class="form-control" 
									name="name" id="name"
									value="{{ $ticket->name }}" 
									placeholder="Masukkan Kategori Tiket">
							</div>

							<div class="form-group">
								<label for="price">Harga Tiket:</label>
								<input type="text" class="form-control" 
									name="price" id="price"
									value="{{ $ticket->price }}"
									placeholder="Masukkan Harga Tiket">
							</div>

							<div class="form-group">
								<label for="quantity">Jumlah Tiket:</label>
								<input type="text" class="form-control" 
									id="quantity" name="quantity"
									value="{{ $ticket->quantity }}"
									placeholder="Masukkan Jumlah Tiket">
							</div>

							<button type="submit" class="btn btn-primary">Update</button>
						</form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection