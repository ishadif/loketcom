@if($event->tickets->count() == 0)
    <div class="row mt-4">
        <div class="col-sm">
            <div class="card">

                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ $event->path() }}/tickets/create" class="btn btn-info text-center">Specify Your Tickets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row mt-3">
        <a href="{{ $event->path() }}/tickets/create" class="btn btn-text ml-auto">Add New Ticket</a>
    </div>
    <div class="row mt-4">
        @foreach($event->tickets as $ticket)
            <div class="col-sm">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $ticket->name }}
                        </h3>
                    </div>
                        
                    <div class="card-body">
                        <p>Harga: {{ $ticket->price }}</p>
                        <p>Kuantitas: {{ $ticket->quantity }}</p>
                    </div>

                    <div class="card-body">
                        <a href="{{ $event->path() }}/tickets/{{ $ticket->id }}/edit" class="col">Edit Ticket</a>
                        <a href="#" class="col">Delete Ticket</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif