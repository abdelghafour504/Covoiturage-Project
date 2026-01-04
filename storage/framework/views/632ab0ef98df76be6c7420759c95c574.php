<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes réservations</title>

    <style>
        
        body {
            background-color: #000; 
            font-family: 'Segoe UI', Arial, sans-serif;
            padding: 40px 20px;
            color: white;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.2rem;
        }

        .reservations-container {
            max-width: 900px;
            margin: auto;
        }

   
        .reservation-card {
            background-color: #00065cff; 
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: transform 0.2s;
        }

        .reservation-card:hover {
            transform: scale(1.01);
        }

       
        .reservation-card p {
            margin: 10px 0;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }

        .reservation-card strong {
            color: #4a90e2;
            margin-right: 8px;
            min-width: 150px;
            display: inline-block;
        }

        
        .statut {
            margin: 15px 0;
            font-weight: bold;
            padding: 6px 15px;
            border-radius: 20px;
            display: inline-block;
            font-size: 0.9rem;
            text-transform: uppercase;
            background: rgba(255, 255, 255, 0.1);
        }

        .Disponible { color: #2ecc71; border: 1px solid #2ecc71; }
        .Complet { color: #e74c3c; border: 1px solid #e74c3c; }

       
        .reservation-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-action {
            flex: 1; 
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
            cursor: pointer;
            border: none;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background-color: #4a90e2;
            color: white;
        }

        .btn-edit:hover {
            background-color: #357abd;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        form {
            flex: 1; 
            margin: 0;
        }

        
        .empty {
            text-align: center;
            color: #888;
            margin-top: 100px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h1> Mes réservations</h1>

    <div class="reservations-container">

        <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="reservation-card">
                
                <?php if($reservation->trajects): ?>
                    <p><strong> Départ :</strong> <?php echo e($reservation->trajects->quartier_depart); ?></p>
                    <p><strong> Arrivée :</strong> <?php echo e($reservation->trajects->quartier_arrivee); ?></p>
                    <p><strong> Date du trajet :</strong> <?php echo e(\Carbon\Carbon::parse($reservation->trajects->date_heure)->format('d/m/Y H:i')); ?></p>

                    <p><strong> Places :</strong> <?php echo e($reservation->nb_places); ?> place(s)</p>
                    <p><strong> Réservé le :</strong> <?php echo e(\Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y')); ?></p>

                    <div class="statut <?php echo e($reservation->statut); ?>">
                        <?php echo e($reservation->statut); ?>

                    </div>

                    <div class="reservation-actions">
                        <a href="<?php echo e(route('reservations.edit', $reservation->id)); ?>" class="btn-action btn-edit">
                             Modifier
                        </a>

                        <form action="<?php echo e(route('reservations.destroy', $reservation->id)); ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-action btn-delete">
                                 Annuler
                            </button>
                        </form>
                    </div>
                <?php else: ?>
                    <p style="color: #e74c3c;"> Ce trajet a été supprimé par le conducteur.</p>
                <?php endif; ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty">
                <p>Vous n'avez aucune réservation pour le moment.</p>
            </div>
        <?php endif; ?>

    </div>

</body>
</html><?php /**PATH C:\Users\azerty\Desktop\laravel.test\CovoiturageProjet\resources\views/reservations/index.blade.php ENDPATH**/ ?>