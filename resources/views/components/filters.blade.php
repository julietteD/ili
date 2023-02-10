@if($tags->count())

<div class="allFilters">
            @foreach ($tags as $tag)
                <a class="tag" href="{{ route('tags', $tag->id) }}">{{ $tag->title}}</a>
            @endforeach
        </div>
        
       @endif