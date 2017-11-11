@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row p-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" style="display:flex;">
                    <span>Form Acara Baru</span>
                </div>

                <div class="card-body">
                    <form action="/events" method="POST">
                    	{{ csrf_field() }}

                    	<div class="form-group">
                    		<label for="title">Nama Acara:</label>
                    		<input type="text" class="form-control" 
                                id="title" name="title" 
                                value="{{ old('title') ?: '' }}" required>
                    	</div>

                    	<div class="form-group">
                    		<label for="venue_id">Tempat Acara:</label>
                    		<select name="venue_id" id="venue_id" class="form-control">
                                <option value="">pilih tempat acara..</option>
                                @forelse($venues as $venue)
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @empty
                                    <option value="#">Tidak Ada Tempat Acara Terinput</option>
                                @endforelse      
                            </select>

                            <span class="text-muted">
                                Anda Mungkin Harus Input Tempat Acara Terlebih Dahulu <a href="/venues/create">Di sini</a>
                            </span>
                        </div>


                        <div class="form-group">
                            <label for="date">Tanggal Acara:</label>
                            <input type="date" class="form-control" 
                                id="event_date" name="event_date" 
                                value="{{ old('event_date') ?: '' }}" 
                                placeholder="Tanggal Acara">
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi:</label>
                            <textarea class="form-control" name="description" 
                            id="description" cols="30" rows="10">{{ old('description') ?: '' }}</textarea>
                        </div>

                    	<div class="form-group">
                    		<button class="btn btn-info" type="submit">Submit</button>
                    	</div>

                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection