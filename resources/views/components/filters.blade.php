@if($tags->count())
    <div class="allFilters">
        <a class="tag alltag @if( $activeTag == '0') active @endif"  href="{{ route('welcome', [ $article->slug, 0 ]) }}">All </a>
        @foreach ($tags as $tag)
            <a class="tag @if( $activeTag == $tag->id) active @endif"  href="{{ route('welcome', [$article->slug,  $tag->id ]) }}">{{ $tag->title}}</a>
        @endforeach
    </div>
 @endif