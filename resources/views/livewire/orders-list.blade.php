<div class="orders max-width">
    <div class="orders-top">
        <h2 class="orders-title" role="heading" aria-level="2">
            Liste des commandes
        </h2>
        <form action="#" method="get" class="orders-form-filter">
            <div class="orders-filter-search">
                <label for="search"">Commande</label>
                <input type="search" id="search" name="search" placeholder="ex: 21225" wire:model="command">
            </div>
            <div class="orders-filter-student">
                <label for="search">Étudiant</label>
                <input type="search" id="search" name="student" placeholder="ex: Graindor" wire:model="student">
            </div>
            <noscript>
                <button type="submit">Filtrer</button>
            </noscript>
        </form>
    </div>

    <div class="orders-wrapper">
        <table class="orders-table">
            <thead>
                <th>Numéro</th>
                <th>Étudiant</th>
                <th>Groupe</th>
                <th>Montant</th>
                <th>Status</th>
                <th>Mise à jour</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->number}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->user->name}} {{$order->user->firstname}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->user->group}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->amount}}€</a>
                        </td>
                        <td>
                            <form action="/order/{{$order->id}}/status" method="post" >
                                @csrf
                                <label for="status" class="hidden">Changement de statut</label>
                                <select name="status" id="status" {{-- wire:change="updateOrder({{$order->id}})" --}}>
                                    @foreach ($statuses as $status)
                                        <option value="{{$status->id}}" {{$status->name === $order->last_status->name ? 'selected' : ''}}>{{$status->name}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Modifier">
                            </form>
                        </td>
                        <td>
                            <a href="profil/{{$order->user->slug}}/order/{{$order->number}}">{{$order->last_status->updated_at}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links('utils.paginate')}}
    </div>
</div>
