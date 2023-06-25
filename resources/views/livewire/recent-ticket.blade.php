<div>
    @forelse($recentTickets as $item)

        <a href="{{route('master-ticket.edit', [$item->id])}}" class="activity-item d-flex text-dark text-decoration-none">
            <div class="activite-label">{{$item->created_at->shortRelativeDiffForHumans()}}</div>
            <i class='bi bi-circle-fill activity-badge {{Arr::random(['text-success', 'text-danger', 'text-info', 'text-warning', 'text-dark'])}} align-self-start'></i>
            <div class="activity-content">
                <b> {{$item->title}}</b> <br> {{$item->assignedToUser->name}} <br> <strong class="text-secondary text-uppercase small">Ticket </strong> | <strong class="text-primary] text-uppercase small">{{$item->status->name}}</strong>
            </div>
        </a>
    @empty
        <p class="text-center p-3 rounded fw-semibold" style="background-color: rgba(206,206,206,0.4)">No ticket or report found.</p>
    @endforelse
</div>
