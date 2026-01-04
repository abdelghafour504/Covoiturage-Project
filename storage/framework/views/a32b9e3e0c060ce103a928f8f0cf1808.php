<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Trajets disponibles</title>

    <style>
        body {
            background-color: black;
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .trajets-container {
            max-width: 1000px;
            margin: auto;
        }

        .trajet-card {
            background-color: #00065cff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .trajet-info {
            color: white;
            flex-grow: 1;
        }

        .trajet-info p {
            margin: 6px 0;
        }

        .trajet-info strong {
            color: #4a90e2;
        }

        /* Conteneur des boutons pour les aligner proprement */
        .trajet-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }

        .btn-reserver {
            background-color: #4a90e2;
            color: white;
        }

        .btn-reserver:hover {
            background-color: #357abd;
        }

        .btn-supprimer {
            background-color: #dc3545; /* Rouge pour la suppression */
            color: white;
        }

        .btn-supprimer:hover {
            background-color: #a71d2a;
        }

        .empty {
            text-align: center;
            color: #ccc;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<h1> Trajets disponibles</h1>

<div class="trajets-container">

    <?php $__empty_1 = true; $__currentLoopData = $trajects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trajet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($trajet->statut === 'Disponible' && $trajet->nb_places_disponibles > 0): ?>

        <div class="trajet-card">

            <div class="trajet-info">
                <p><strong> Départ :</strong> <?php echo e($trajet->quartier_depart); ?></p>
                <p><strong> Arrivée :</strong> <?php echo e($trajet->quartier_arrivee); ?></p>
                <p><strong> Date :</strong> <?php echo e($trajet->date_heure); ?></p>
                <p><strong> Places :</strong> <?php echo e($trajet->nb_places_disponibles); ?></p>
                <p><strong> Prix :</strong> <?php echo e($trajet->prix); ?> DH</p>
            </div>

            <div class="trajet-actions">
                
                <a href="<?php echo e(route('reservations.create', $trajet->id)); ?>" class="btn btn-reserver">
                    Réserver
                </a>

                
                <form action="<?php echo e(route('trajects.destroy', $trajet->id)); ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce trajet ?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-supprimer">
                        Supprimer
                    </button>
                </form>
            </div>

        </div>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty">
            <p>Aucun trajet disponible pour le moment.</p>
        </div>
    <?php endif; ?>

</div>

</body>
</html><?php /**PATH C:\Users\azerty\Desktop\laravel.test\CovoiturageProjet\resources\views/trajects/index.blade.php ENDPATH**/ ?>