<x-mail::message>
Idea Status Updated

The idea: {{ $idea->title }}

has been updated to a status of:

{{ $idea->status->name }}

<x-mail::button :url="route('idea.show',$idea)">
View Idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>




{{-- @component('mail::message')

Idea Status Updated

The idea: {{ $idea->title }}

has been updated to a status of:

{{ $idea->status->name }}

@component('mail::button',['url' => route(' idea.show',$idea)])
    
@endcomponent
<x-mail::button :url='{{  }}'>
    View Idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} --}}
