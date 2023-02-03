
<x-layout>
    <div class="pageColumns">
       <form method="GET" action="#">
           <input type="text" name="search" placeholder="find">
</form>
    <aside>
    <x-filters :tags="$tags" ></x-filters>
        <ul>
            @foreach ($locations as $location)
            <li class="{{ isset($article) && $article->is($location) ? 'active' : '' }}"> <a href="{{ route('detail', $location->id) }}" >{{ $location->name }}</a></li>
            @endforeach
        </ul>
    </aside>
    <main>
       @if(isset($article))
            {{ $article->name}}<br/>
            {{ $article -> created_at }}<br/><br/>
            @foreach($article -> tags as $tag)
                 {{ $tag->title }} 
            @endforeach
            {{ $article->description}}
       @else
        il n'y a rien pour le moment
       @endif
    </main>
</div>
</x-layout>