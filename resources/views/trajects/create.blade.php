<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposer un trajet</title>
    <style>
:root {
    --primary-color: #4a90e2;
    --secondary-color: #357abd;
    --bg-color: #f4f7f9;
    --text-color: #333;
    --border-color: #ddd;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.trajects-container {
    background: #00065cff;
    width: 300%;
    max-width: 700px;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(88, 86, 86, 0.1);
}

h2 {
    color: #ffffff;
    margin-bottom: 10px;
    text-align: center;
}

p {
    color: #ffffffff;
    font-size: 0.9rem;
    text-align: center;
    margin-bottom: 20px;
}

hr {
    border: 0;
    border-top: 1px solid var(--border-color);
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: white
}

.input-group input {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.input-group input:focus {
    outline: none;
    border-color: var(--primary-color);
}

.textarea-group {
    margin-bottom: 15px;
}

.textarea-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: white
}

.textarea-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.textarea-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.select-group {
    margin-bottom: 15px;
}

.select-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: white
}

.select-group select {
    width: 50%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.select-group select:focus {
    outline: none;
    border-color: var(--primary-color);
}



.btn-submit {
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s;
    margin-top: 10px;
}

.btn-submit:hover {
    background-color: var(--secondary-color);
}
        
    </style>
</head>
<body>
    <div class="trajects-container">
<form action="{{route('trajects.store')}}" method="POST" class="proposer-traject">
    @csrf
    <h2>Proposer un Trajet</h2>

        <div class="input-group">
                <label for="date_heure">Date et heure</label>
                <input type="datetime-local" id="date_heure" name="date_heure" required>
            </div>
            <div class="input-group">
               <label for="quartier_depart">Quartier de départ</label>
                <input type="text" id="quartier_depart" name="quartier_depart" required>
            </div>
            <div class="input-group">
               <label for="quartier_arrivee">Quartier d'arrivée</label>
                <input type="text" id="quartier_arrivee" name="quartier_arrivee" required>
            </div>
            <div class="input-group">
                <label for="nb_places_disponibles">Nombre de places disponibles</label>
                <input type="number" id="nb_places_disponibles" name="nb_places_disponibles" required>
            </div>
            <div class="input-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" required>
            </div>
            <div class="textarea-group">
                <label for="commentaire">Commentaire</label>
                <textarea id="commentaire" name="commentaire"></textarea>
            </div>
            <div class="input-group">
                <label for="statut">Statut</label>
                <select id="statut" name="statut">
                    <option value="Disponible">Disponible</option>
                    <option value="Complet">Complet</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Proposer</button>


</form>





    </div>
    
</body>
</html>