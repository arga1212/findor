@foreach($boardingHouse->testimonials as $testi)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">
                        <i class="fas fa-user-circle"></i> {{ $testi->user->name ?? 'Anonim' }}
                    </h5>
                    <div class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testi->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                
                <blockquote class="blockquote">
                    <p class="mb-0">"{{ $testi->content }}"</p>
                </blockquote>
                
                @if($testi->photo)
                    <div class="mt-3">
                        <img src="{{ asset('storage/'.$testi->photo) }}" 
                             alt="Foto testimoni" 
                             class="img-fluid rounded"
                             style="max-height: 200px;">
                    </div>
                @endif
                
                <div class="text-muted small mt-2">
                    {{ $testi->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
@endforeach