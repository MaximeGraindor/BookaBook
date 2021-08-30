<section class="createBook-extraData max-width">
    <h2 class="createBook-title">
        Éditeur
    </h2>
    <form {{-- action="/publishers/store" method="post" --}} >
        @csrf
        <label for="publisher" class="hidden">Éditeur</label>
        <input type="text" id="publisher" name="name" wire:model="name">
        <input type="submit" value="Ajouter" wire:click.prevent="store">
        @error('name')
            <span>
                {{$message}}
            </span>
        @enderror
    </form>
    <div class="createBook-extraData-wrapper">
        @foreach ($publishers as $publisher)
            <div>
                <p>{{$publisher->name}}</p>
                <form action="/publishers/{{$publisher->id}}" method="post" wire:click.prevent="delete({{$publisher->id}})">
                    @csrf
                    <input type="submit" value="" class="delete-item">
                </form>
            </div>
        @endforeach
    </div>
</section>
