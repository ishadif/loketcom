@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row p-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" style="display:flex;">
                    <span>Form Venue Baru</span>
                </div>

                <div class="card-body">
                    <form action="/venues" method="POST">
                    	{{ csrf_field() }}

                    	<div class="form-group">
                    		<label for="name">Nama Tempat:</label>
                    		<input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    	</div>

                    	<div class="form-group">
                    		<label for="address">Alamat:</label>
                    		<textarea class="form-control" name="address" id="address" cols="30" rows="10" required></textarea>
                    	</div>

                    	<div class="form-group">
                    		<button class="btn btn-info" type="submit">Submit</button>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection