<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la réservation</title>
    <style>
        body {
            background-color: #000;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .edit-container {
            background-color: #00065cff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #4a90e2;
        }

        .trajet-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #4a90e2;
        }

        .trajet-info p {
            margin: 5px 0;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background: #000;
            color: white;
            font-size: 1rem;
        }

        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
        }

        .btn-save {
            background-color: #28a745;
            color: white;
        }

        .btn-save:hover { background-color: #218838; }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover { background-color: #5a6268; }

        .error-msg {
            color: #ff4d4d;
            font-size: 0.85rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>✏️ Modifier ma réservation</h2>

    <div class="trajet-info">
        <p><strong>📍 De :</strong> {{ $reservations->trajects->quartier_depart }}</p>
        <p><strong>🏁 Vers :</strong> {{ $reservations->trajects->quartier_arrivee }}</p>
        <p><strong>🕒 Le :</strong> {{ \Carbon\Carbon::parse($reservations->trajects->date_heure)->format('d/m/Y H:i') }}</p>
    </div>

    <form action="{{ route('reservations.update', $reservations->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nb_places">Nombre de places à réserver :</label>
            <input type="number" 
                   id="nb_places" 
                   name="nb_places" 
                   value="{{ old('nb_places', $reservations->nb_places) }}" 
                   min="1" 
                   max="{{ $reservations->trajects->nb_places_disponibles + $reservations->nb_places }}" 
                   required>
            
            @error('nb_places')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-container">
            <a href="{{ route('reservations.index') }}" class="btn btn-cancel">Annuler</a>
            <button type="submit" class="btn btn-save">Enregistrer les modifications</button>
        </div>
    </form>
</div>

</body>
</html>