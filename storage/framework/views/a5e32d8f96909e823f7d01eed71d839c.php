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

    <?php if($errors->any()): ?>
        <div style="background-color: #ffcccc; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="color: black;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('evaluations.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="passengers_id">Passager</label>
        <select name="passengers_id" id="passengers_id" required>
            <option value="">Sélectionner un passager</option>
            <?php $__currentLoopData = $passengers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $passenger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($passenger->id); ?>"><?php echo e($passenger->students->nom); ?> <?php echo e($passenger->students->prenom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="drivers_id">Conducteur</label>
        <select name="drivers_id" id="drivers_id" required>
            <option value="">Sélectionner un conducteur</option>
            <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($driver->id); ?>"><?php echo e($driver->students->nom); ?> <?php echo e($driver->students->prenom); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\azerty\Desktop\laravel.test\CovoiturageProjet\resources\views/evaluations/create.blade.php ENDPATH**/ ?>