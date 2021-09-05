<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commande confirmée</title>
</head>
<body>
    <header>
        <h1>Book a Book</h1>
    </header>
    <section class="orderConfirmed">
        <h2>
            Panier confirmé
        </h2>
        <p>
            Bravo ! vous venez de confirmer votre panier. Veuillez utiliser les informations de paiements ci-dessous pour fournir le paiement a Mr Spirlet.
        </p>
        <article>
            <h2>
                Récapitulatif de votre commande
            </h2>
            <ul>
                @foreach ($order->books as $book)
                    <li>
                        {{$book->pivot->quantity}}&nbsp;x&nbsp;{{$book->name}} - {{$book->pivot->quantity * $book->student_price}}€
                    </li>
                @endforeach
            </ul>

            <p class="total-amount">
                total à payer : {{$order->amount}}€
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


</body>
</html>
