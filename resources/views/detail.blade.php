
<x-layout>
    <div class="pageColumns">
    <aside>
        <ul>
            @foreach ($locations as $location)
            <li> <a href="{{ route('detail', $location->id) }}">{{ $location->id }}</a></li>
            @endforeach
        </ul>
    </aside>
    <main>
        Contenu de l'article
    </main>
</div>
</x-layout>