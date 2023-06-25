<div>
    @forelse($recentClients as $recentClient)
        <div class="activity-item d-flex">
            <div class="activite-label">{{$recentClient->created_at->shortRelativeDiffForHumans()}}</div>
            <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
            <div class="activity-content">
                <b>{{$recentClient->code}}</b> {{$recentClient->company_name}} <br> {{$recentClient->description}}
            </div>
        </div><!-- End activity item-->
    @empty
        <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No client found.</p>
    @endforelse
</div>
