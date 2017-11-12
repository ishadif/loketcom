@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body d-flex align-items-center">
                    <div>
                        <h3 class="card-title">
                            {{ $event->title }}
                        </h3>

                        <p class="card-text text-muted">
                            {{ $event->venue->name }} &mdash; {{ $event->event_date->toFormattedDateString() }}
                        </p>
                    </div>
                    
                    @can('update', $event)
                        <div class="ml-auto">
                            <a href="{{ $event->path() }}/edit" class="btn btn-text">Edit</a>
                        </div>
                    @endcan

                </div>

                <div class="card-body">
                    <p class="card-text">
                        {{ $event->description }}
                    </p>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <h4 class="text-muted">
                            Share event with:
                        </h4>
                        <a href="{{ $event->path() }}/tweet" class="btn btn-outline-primary">
                            <i class="fa fa-twitter" aria-hidden="true" title="Twitter"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('events.ticket')

    @include('events.venue')
</div>

@endsection