
<x-layout :view="$view">
  
    <div class="pageColumns">
     <div id="searchForm">  
        <form method="GET" action="#">
            <input type="text" name="search" placeholder="find">
        </form>
     </div>
 

    <aside>
        <div id="switchView">
            @if($article)
            <a href="{{ route('welcome',[ $article->slug, $activeTag, 'map']) }}" class="actionMap">Map</a>
            <a href="{{ route('welcome',[ $article->slug, $activeTag, 'list']) }}" class="actionList">Liste</a>
          @endif

        </div>
        <div id="ixellesMap"> 
        <div>
            <img src="{{ asset('img/map.svg') }}" />
            <ul>
                @foreach ($locations as $location)
                    <li class="dot {{ $article && $article->is($location) ? 'active' : '' }}" style="left:{{ $location->coordX }}%; top:{{ $location->coordY }}%; " > <a href="{{ route('welcome',[ $location->slug, $activeTag, 'map' ]) }}" >{{ $location->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
  <div id="locationsList">  
    <x-filters :tags="$tags" :activeTag="$activeTag" :article="$article" ></x-filters>
        <ul>
            @foreach ($locations as $location)
            <li class="{{ $article && $article->is($location) ? 'active' : '' }}"> <a href="{{ route('welcome',[ $location->slug, $activeTag ]) }}" >{{ $location->name }}</a></li>
            @endforeach
        </ul>
</div>
    </aside>
    <main>
       @if($article->slug!="welcome")
           <div class="text"> 
                <h2>{{ $article->name}}</h2>
                {{ $article -> created_at }}
            
                @foreach($article -> tags as $tag)
                    {{ $tag->title }} 
                @endforeach
               
            </div>
            
            @if($article->path)<img src="/storage/{{ $article->path }}"><br/>@endif
            <div class="specialLink">
                    @if($article->location_id) <a href="{{ route('welcome', [ $article->location_id, $activeTag]) }}">{{ $article->location->name }}</a>@endif
                   <a href="#" class="blabla">BlaBla</a> 
                    
                </div>
                <div class="blablacontent" style="display:none">
                <span class="close"></span>
                {!! $article->description !!}</div>

       @else
       <img src="{{ asset('img/coffee.gif') }}" />
       @endif
    </main>

    @if($view=='map'){
<script>
    let scrollimgto = function(x,y) {
        document.getElementById('ixellesMap').scrollTo(x, y)
    }
    
    window.addEventListener('DOMContentLoaded', (event) => {
        let box = document.querySelector('#ixellesMap img');
        let boxInside = document.querySelector('#ixellesMap');
        let boxwidth = box.offsetWidth;
        let boxheight = box.offsetHeight;
        let decX = boxInside.offsetWidth/2;
        let decY = boxInside.offsetHeight/2;
        let posX = boxwidth*{{ $article->coordX }}/100 - decX;
        let posY = boxheight*{{ $article->coordY }}/100 - decY;
        scrollimgto(posX,posY) 
});

    </script>
    }
    @endif
</div>
</x-layout>