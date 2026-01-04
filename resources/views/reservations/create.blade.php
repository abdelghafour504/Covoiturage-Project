<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réserver un trajet</title>

    <style>
        body {
            background-color: black;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .reservation-container {
            background-color: #00065cff;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-top: 10px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: none;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

<div class="reservation-container">

    <h2> Réserver ce trajet</h2>

    <p><strong>Départ :</strong> {{ $trajects->quartier_depart }}</p>
    <p><strong>Arrivée :</strong> {{ $trajects->quartier_arrivee }}</p>
    <p><strong>Places disponibles :</strong> {{ $trajects->nb_places_disponibles }}</p>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <input type="hidden" name="trajects_id" value="{{ $trajects->id }}">

        <label for="nb_places">Nombre de places</label>
        <input type="number"name="nb_places"min="1"max="{{ $trajects->nb_places_disponibles }}" required>

        <label for="date_reservation">Date de Reservation</label>
        <input type="date"name="date_reservation"required>

        <button type="submit">Confirmer la réservation</button>
    </form>

</div>

</body>
</html>
