<div>
    @forelse($recentLicenses as $recentLicense)
        <div class="activity-item d-flex">
            <div class="activite-label">{{$recentLicense->created_at->shortRelativeDiffForHumans()}}</div>
            <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
            <div class="activity-content">
                <b>{{$recentLicense->client->company_name}}</b> <br>{{$recentLicense->software->name}}
            </div>
        </div><!-- End activity item-->
    @empty
        <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No license update found.</p>
        @endforelse
        </divwire:poll.keep-alive>
</div>
