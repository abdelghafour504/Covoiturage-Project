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

    <p><strong>Départ :</strong> <?php echo e($trajects->quartier_depart); ?></p>
    <p><strong>Arrivée :</strong> <?php echo e($trajects->quartier_arrivee); ?></p>
    <p><strong>Places disponibles :</strong> <?php echo e($trajects->nb_places_disponibles); ?></p>

    <form action="<?php echo e(route('reservations.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="trajects_id" value="<?php echo e($trajects->id); ?>">

        <label for="nb_places">Nombre de places</label>
        <input type="number"name="nb_places"min="1"max="<?php echo e($trajects->nb_places_disponibles); ?>" required>

        <label for="date_reservation">Date de Reservation</label>
        <input type="date"name="date_reservation"required>

        <button type="submit">Confirmer la réservation</button>
    </form>

</div>

</body>
</html>
<?php /**PATH C:\Users\azerty\Desktop\laravel.test\CovoiturageProjet\resources\views/reservations/create.blade.php ENDPATH**/ ?>