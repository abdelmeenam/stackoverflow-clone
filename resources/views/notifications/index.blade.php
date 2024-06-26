@extends('layouts.default')

@section('title',  __('Notifications') )

@section('content')
    <div>
        @foreach ($notifications as $notification)
            <div class="card my-2">
                <a class="icon-link icon-link-hover" style ="text-decoration: none" href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}">
                    <div class="card-body {{ $notification->unread()? 'bg-gray fw-bold ' : '' }}">
                        <h4>{{ $notification->data['title'] }} </h4>
                        <p>{{ $notification->data['body'] }}</p>
                        <p class="text-muted">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection



