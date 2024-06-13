<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maquette d'absentéisme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .document-absenteisme {
            width: 100%;
        }

        .document-absenteisme table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        .document-absenteisme thead {
            background-color: #b3b325;
            color: #fff;
        }

        .document-absenteisme th,
        .document-absenteisme td {
            padding: 12px 15px;
            border: 1px solid #000;
            text-align: left;
        }

        .document-absenteisme th {
            background-color: #eeee24;
            color: #000;
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }

        .document-absenteisme caption {
            font-size: 1.5em;
            text-align: center;
            text-transform: uppercase;
        }

        .absenteisme-date-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .absenteisme-date {
            width: 70%;
            font-weight: normal;
            margin-left: 70%;
        }
    </style>
</head>

<body>
    <div class="document-absenteisme">
        <table>
            <caption>maquette d'absentéisme</caption>
        </table>
        <div class="absenteisme-date-container">
            <span class="absenteisme-date">févr-24</span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Motif</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Durée absence</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>24517</td>
                    <td>Alami</td>
                    <td>Amine</td>
                    <td>Vacances</td>
                    <td>11/03/2023</td>
                    <td>15/03/2023</td>
                    <td>4 jours</td>
                </tr>
                <tr>
                    <td>32651</td>
                    <td>Chami</td>
                    <td>Mohammed</td>
                    <td>Congé</td>
                    <td>02/03/2023</td>
                    <td>11/03/2023</td>
                    <td>7 jours</td>
                </tr>
                <tr>
                    <td>478122</td>
                    <td>Sarsri</td>
                    <td>Imrane</td>
                    <td>Malade</td>
                    <td>10/02/2023</td>
                    <td>12/02/2023</td>
                    <td>2 jours</td>
                </tr>
                <tr>
                    <td>326523</td>
                    <td>Alami</td>
                    <td>Yahya</td>
                    <td>Malade</td>
                    <td>02/02/2023</td>
                    <td>04/02/2023</td>
                    <td>2 jours</td>
                </tr>
                <tr>
                    <td>12345</td>
                    <td>Madani</td>
                    <td>Ali</td>
                    <td>Ordre de mission</td>
                    <td>22/01/2023</td>
                    <td>29/01/2023</td>
                    <td>5 jours</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>