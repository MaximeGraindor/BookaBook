<section class="orderConfirmed">
    <h1> Book a Book</h1>
    <p>
        Le statut de votre commande est passé à{{ $status->name}}
    </p>
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
        <p>
            Vous devez fournir le paiement au numéro de compte suivant. une fois le paiement réceptionné, le statut de votre commande passera à "payé". Veuillez renseigner le numéro de votre commande en communication
        </p>
        <p class="info-number">
            BE88 2324 4546 7879 1415
        </p>
    </article>
</section>
