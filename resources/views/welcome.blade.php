
<x-layout>
    <div class="pageColumns">
     <div id="searchForm">  
        <form method="GET" action="#">
        <input type="text" name="search" placeholder="find">
        </form>
        </div>

    <div id="ixellesMap"> 
        <div><img src="{{ asset('img/Carte_dixelles.png') }}" /></div>
    </div>

    <aside>
        <div id="switchView">
            <a href="#">Map</a>
            <a href="#">Liste</a>
        </div>
    <x-filters :tags="$tags" ></x-filters>
        <ul>
            @foreach ($locations as $location)
            <li class="{{ isset($article) && $article->is($location) ? 'active' : '' }}"> <a href="{{ route('detail', $location->id) }}" >{{ $location->name }}</a></li>
            @endforeach
        </ul>

    </aside>
    <main>
       @if(isset($article))
           <div class="text"> 
            <h2>{{ $article->name}}</h2>
            {{ $article -> created_at }}
          
            @foreach($article -> tags as $tag)
                 {{ $tag->title }} 
            @endforeach
            </div>
            {{ $article->description}}
            <img src="/storage/{{ $article->path }}"><br/>
            
       @else
        il n'y a rien pour le moment
       @endif
    </main>
</div>
</x-layout>