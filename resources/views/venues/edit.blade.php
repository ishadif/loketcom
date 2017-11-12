@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row p-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" style="display:flex;">
                    <span>Perbarui Venue</span>
                </div>

                <div class="card-body">
                    <form action="/venues/{{ $venue->id }}" method="POST">
                    	{{ method_field('PATCH') }}
                    	{{ csrf_field() }}

                    	<div class="form-group">
                    		<label for="name">Nama Acara:</label>
                    		<input type="text" class="form-control" 
                    			id="name" name="name" 
                    			value="{{ old('name') ?: $venue->name }}" 
                    			placeholder="Masukkan Nama Venue" required>
                    	</div>

                        <div class="form-group">
                            <label for="address">Alamat:</label>
                            <textarea class="form-control" name="address" 
                                id="address" cols="30" rows="10">{{ old('address') ?: $venue->address }}</textarea>
                        </div>

                    	<div class="form-group">
                    		<button class="btn btn-info" type="submit">Update</button>
                            <a href="/venues" class="btn btn-text">Cancel</a>
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