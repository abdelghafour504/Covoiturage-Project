<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Étudiant - Covoiturage</title>
    <style>
        :root {
            --primary: #4a90e2;
            --bg-dark: #00065cff;
            --card-bg: rgba(255, 255, 255, 0.05);
        }

        body {
            background-color: black;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 40px 20px;
        }

        .profile-container {
            max-width: 900px;
            margin: auto;
        }

        .profile-header {
            background-color: var(--bg-dark);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }

        .avatar {
            font-size: 50px;
            background: var(--primary);
            width: 100px;
            height: 100px;
            line-height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .profile-header h1 { margin: 10px 0; font-size: 1.8rem; }
        .profile-header p { color: #ccc; font-size: 1.1rem; }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--bg-dark);
            padding: 20px;
            border-radius: 12px;
            border-left: 5px solid var(--primary);
        }

        .stat-card h3 {
            margin-top: 0;
            font-size: 1rem;
            color: var(--primary);
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .stat-label { color: #aaa; font-size: 0.9rem; }

        .evaluations-section {
            background-color: var(--bg-dark);
            padding: 30px;
            border-radius: 15px;
        }

        .evaluations-section h2 {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .eval-item {
            background: var(--card-bg);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .eval-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .eval-note { color: #f1c40f; font-weight: bold; }
        .eval-type { font-size: 0.8rem; background: #333; padding: 2px 8px; border-radius: 4px; }
        .eval-comment { font-style: italic; color: #ddd; }

        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--primary);
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <a href="/dashboard" class="btn-back">← Retour au Dashboard</a>

    <div class="profile-header">
        <div class="avatar"></div>
        <h1>{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h1>
        <p> {{ auth()->user()->telephone ?? 'Non renseigné' }}</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <h3> En tant que Conducteur</h3>
            <div class="stat-value"> {{ number_format($noteConducteur, 1) }} / 5</div>
            <div class="stat-label">{{ $nbTrajetsConducteur }} trajets proposés</div>
        </div>

        <div class="stat-card">
            <h3> En tant que Passager</h3>
            <div class="stat-value"> {{ number_format($notePassager, 1) }} / 5</div>
            <div class="stat-label">{{ $nbTrajetsPassager }} réservations effectuées</div>
        </div>
    </div>

    <div class="evaluations-section">
        <h2> Évaluations reçues</h2>
        
        @forelse($evaluations as $eval)
            <div class="eval-item">
                <div class="eval-header">
                    <span class="eval-note">★ {{ $eval->note }}</span>
                    <span class="eval-type">{{ $eval->type_evaluation }}</span>
                </div>
                <p class="eval-comment">" {{ $eval->commentaire ?? 'Aucun commentaire' }} "</p>
                <small style="color: #666;">Le {{ \Carbon\Carbon::parse($eval->created_at)->format('d/m/Y') }}</small>
            </div>
        @empty
            <p style="text-align: center; color: #666;">Aucune évaluation reçue pour le moment.</p>
        @endforelse
    </div>
</div>

</body>
</html>