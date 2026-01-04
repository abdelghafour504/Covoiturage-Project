<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Covoiturage Scolaire</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #020a5c, #041b9c);
            color: #333;
        }

        header {
            background-color: #020a5c;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
        }

        header form button {
            background-color: white;
            color: #020a5c;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        nav {
            width: 240px;
            background-color: #2a2a2aff;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav li {
            padding: 15px;
            border-bottom: 1px solid #2a2a2aff
        }

        nav a {
            text-decoration: none;
            color: #ffffffff;
            font-weight: bold;
            display: block;
        }

        nav li:hover {
            background-color: #2a2a2aff;
        }

        main {
            flex: 1;
            padding: 30px;
        }

        .card {
            background-color: white;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat {
            flex: 1;
            background-color: #e9f0ff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            min-width: 180px;
        }

        .stat h4 {
            margin-bottom: 10px;
            color: #020a5c;
        }

        .stat p {
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    <h2>Tableau de bord </h2>

    <form method="POST" action="{{ route('students.logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</header>

<div class="container">

    <nav>
        <ul>
            <li><a href="{{ route('trajects.create') }}"> Proposer un trajet</a></li>
            <br>
            <li><a href="{{ route('trajects.index') }}"> Trajets Disponibles</a></li>
             <br>
            <li><a href="{{ route('reservations.index') }}">Mes réservations</a></li>
             <br>
            <li><a href="{{ route('evaluations.create') }}">Évaluer</a></li>
               <br>
            <li><a href="{{ route('profile') }}">Mon profil</a></li>
        </ul>
    </nav>

    <main>

        <div class="card">
            <h3>Bienvenue {{ auth()->user()->prenom }} {{ auth()->user()->nom }} </h3>
                
            
        </div>

        <div class="card">
            <h3>Mes statistiques</h3>

            <div class="stats">
                <div class="stat">
                    <h4>Trajets proposés</h4>
                    <p>{{ $nbTrajets ?? 0 }}</p>
                </div>

                <div class="stat">
                    <h4>Réservations</h4>
                    <p>{{ $nbReservations ?? 0 }}</p>
                </div>

                <div class="stat">
                    <h4>Note moyenne</h4>
                    <p> {{ $noteMoyenne ?? '0.0' }} / 5</p>
                </div>
            </div>
        </div>

    </main>
</div>

</body>
</html>
