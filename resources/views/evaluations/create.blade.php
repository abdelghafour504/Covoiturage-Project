<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Évaluation</title>

    <style>
        body {
            background-color: black;
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #00065cff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }

        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: white;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            margin-top: 25px;
            background-color: #4a90e2;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

<div class="container">
    <h1> Évaluer</h1>

    @if ($errors->any())
        <div style="background-color: #ffcccc; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="color: black;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <label for="passengers_id">Passager</label>
        <select name="passengers_id" id="passengers_id" required>
            <option value="">Sélectionner un passager</option>
            @foreach($passengers as $passenger)
                <option value="{{ $passenger->id }}">{{ $passenger->students->nom }} {{ $passenger->students->prenom }}</option>
            @endforeach
        </select>

        <label for="drivers_id">Conducteur</label>
        <select name="drivers_id" id="drivers_id" required>
            <option value="">Sélectionner un conducteur</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->students->nom }} {{ $driver->students->prenom }}</option>
            @endforeach
        </select>

        <label for="type_evaluation">Type d’Evaluation</label>
        <select name="type_evaluation" id="type_evaluation" required>
            <option value="driver to passenger">Conducteur → Passager</option>
            <option value="passenger to driver">Passager → Conducteur</option>
        </select>

        <label for="note">Note (0 à 5)</label>
        <input type="number"
               name="note"
               id="note"
               min="0"
               max="5"
               step="0.1"
               required>

        <label for="commentaire">Commentaire</label>
        <textarea name="commentaire" id="commentaire"
                  placeholder="Laissez un commentaire (optionnel)"></textarea>

        <button type="submit">Enregistrer l'évaluation</button>
    </form>
</div>

</body>
</html>
