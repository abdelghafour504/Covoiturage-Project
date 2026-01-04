<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Covoiturage Scolaire</title>
    <style>
 
     body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background:black;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
        }

         a {
            padding: 20px 40px;
            font-size: 16px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
             display: inline-flex;
            justify-content: center;
            gap: 20px;
            text-decoration: none;

        }
        
        .center{
            text-align: center;
        }

        .signup {
            background-color: #4a90e2;
            color: white;
            width: 100px;

        }

        .signin {
            background-color: #ffffff;
            color: #4a90e2;
            width: 100px;

        }




        </style>
</head>
<body>

<div class="center">

<h1>Bienvenue dans le service de Covoiturage Scolaire</h1>
<p>Choisissez le trajet parfait : bus, train ou covoiturage. Économisez, et voyagez facilement</p>
<br>
<br>

<a href="{{route('students.register')}}" class="signup">S'inscrire</a>
<a href="{{route('login')}}" class="signin">Se connecter</a>


</div>


</body>
</html>