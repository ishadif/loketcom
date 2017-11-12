@if($event->tickets->count() == 0)
    <div class="row mt-4">
        <div class="col-sm">
            <div class="card">

                <div class="card-body">
                    @if(auth()->user()->can('create', $event))
                        <div class="text-center">
                            <a href="{{ $event->path() }}/tickets/create" class="btn btn-info text-center">Specify Your Tickets</a>
                        </div>
                    @else
                        <p class="text-center">
                            This Event Has No Ticket Yet!
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    @can('create', $event)
        <div class="row mt-3">
            <a href="{{ $event->path() }}/tickets/create" class="btn btn-text ml-auto">Add New Ticket</a>
        </div>
    @endcan

    <div class="row mt-4">
        @foreach($event->tickets as $ticket)
            <div class="col-sm">
                <div class="card text-center">

                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $ticket->name }}
                        </h3>
                    </div>
                        
                    <div class="card-body">
                        <p>Harga: {{ $ticket->price }}</p>
                        <p>Kuantitas: {{ $ticket->quantity }}</p>
                    </div>
                    
                    @can('update', $ticket)
                        <div class="card-body">
                            <a href="{{ $event->path() }}/tickets/{{ $ticket->id }}/edit" class="col">Edit Ticket</a>
                            <a href="#" class="col">Delete Ticket</a>
                        </div>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
@endif