<section class="createBook-extraData max-width">
    <h2 class="createBook-title" role="heading" aria-level="1">
        Auteurs
    </h2>
    <form {{-- action="/authors/store" method="post" --}}>
        @csrf
        <label for="author" class="hidden">Auteur</label>
        <input type="text" id="author" name="name" wire:model="name">
        <input type="submit" value="Ajouter" wire:click.prevent="store">
        @error('name')
            <span>
                {{$message}}
            </span>
        @enderror
    </form>
    <div class="createBook-extraData-wrapper">
        @foreach ($authors as $author)
            <div>
                <p>{{$author->name}}</p>
                <form action="/authors/{{$author->id}}" method="post" wire:click.prevent="delete({{$author->id}})">
                    @csrf
                    <input type="submit" value="" class="delete-item">
                </form>
            </div>
        @endforeach
    </div>
</section>
