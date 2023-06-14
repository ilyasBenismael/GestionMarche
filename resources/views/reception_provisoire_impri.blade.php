<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reception Provisoire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .signatory {
            text-align: center;
        }

        .signatory1 {
            text-align: center;
            margin-top: 20px;
        }

        .smallImage{
            width: 120px;
            height: 120px;
        }

        .margintop{
            margin-top: 30px;
        }

        .bottom-right {
            margin-top: 30px;
        }
        h1, h2, h3 {
            color: #333;
        }

        h1 {
            font-size: 18px;
            font-weight: bold;
            text-align: left;
            margin: 0;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        h3 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        p {
            margin-bottom: 10px;
        }

        .section {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .section2 {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
        }


        .sectionw {
            padding: 10px;
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .center-text {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h3 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        p {
            margin-bottom: 10px;
        }

        .signatory {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .marginbot{
            margin-bottom: 40px;
            margin-top: 40px;
        }


        .name {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .row {
            margin-bottom: 20px;
        }

        .signatory3 {
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            display: inline-block;
            width: 45%; /* Adjust the width as needed */
        }

        .smallImage {
            width: 150px;
            height: 150px;
            background-image: url('{{ asset('files/logomaroc.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


    </style>
</head>
<body>



    <div class="sectionw">
        <h1>Royaume du Maroc</h1>
        <h3>Ministère de l'Intérieur</h3>
        <h3>Wilaya Région Marrakech Safi</h3>
        <h3>Préfecture de Marrakech</h3>
        <h3>Secrétariat général</h3>
    </div>


    <h2 class="center-text">PROCES VERBAL DE RECEPTION PROVISOIRE</h2>
    <div class="section">
        <p>Marche N°: {{$marche->numero_marche}}</p>
        <p>Objet: {{$marche->objet}}</p>
        <p>Titulaire: nom SOCIETE</p>
        <p>Adresse: 25 RUE LALA NEZHA FES</p>
    </div>

<div class="marginbot">
    <h3>Le ------------------------------------------------</h3>
    <h3>Nous soussignés:</h3>
</div>

    <div class="signatory">
        <h3>HASSAN AIT LAHCEN</h3>
        <p>Chef de Service des systèmes d’information et de Communication</p>
    </div>

    <div class="signatory">
        <h3>RACHID SAKOUNI</h3>
        <p>Administrateur à la DSICG</p>
    </div>

    <div class="signatory">
        <h3>AAAAAAAAAAAAAAAAAAA</h3>
        <p>Gérant de La société INFODIX SARL</p>
    </div>


    <div class="section2">
<div >
    Nous sommes réunis pour examiner et vérifier la prestation objet du marché sus indiqué exécutées par la société INFO SARL.
</div>
    <div>
    Nous avons reconnu que la prestation est livrée et qu’il peut être reçu provisoirement.
    En foi de quoi, nous avons dressé le présent procès-verbal.
    </div>
    </div>

    <div class="row">
        <div class="signatory3">
            <h3>Administrateur à la DSICG</h3>
        </div>

        <div class="signatory3">
            <h3>Gérant de la société INFODIX SARL</h3>
        </div>
    </div>

    <div class="row">
        <div class="signatory3">
            <h3>Rachid SAKOUNI</h3>
        </div>

        <div class="signatory3">
            <h3>NOM GERANT</h3>
        </div>
    </div>

    <div class="row">
        <div class="signatory3">
            <h3>Chef de Service des systèmes d’information et de Communication</h3>
        </div>

        <div class="signatory3">
            <h3>Visa du Chef de la DSICG</h3>
        </div>
    </div>

    <div class="bottom-right">
        <h8>LE WALI DE LA REGION DE MARRAKECH SAFI</h8>
    </div>
        <div>
        <h8>GOUVERNEUR DE LA PREFECTURE DE MARRAKECH</h8>
    </div>

</body>
</html>











