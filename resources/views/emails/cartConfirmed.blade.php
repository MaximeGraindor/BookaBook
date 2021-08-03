<section class="orderConfirmed">
    <h1> Book a Book</h1>
    <p>
        Vous venez de confirmer votre panier.
    <article>
        <h2>
            Récapitulatif de votre commande
        </h2>
        @foreach ($order->books as $book)
            <p>
                {{$book->name}}
            </p>
        @endforeach
        <p>
            total : {{$order->amount}}
        </p>
    </article>

    <article>
        <h2>Informations de paiement</h2>

    </article>
</section>
