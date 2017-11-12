@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! start manage your <a href="/events">events</a>. 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
