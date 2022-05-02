<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <h1>Paises de la región</h1>

    <table class ="table table-bordered">
        <thead>
            <tr>
                <th>País</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Población</th>
                <th>Ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $pais => $infopais)
                <tr>
                    <td rowspan="{{ count($infopais['ciu']) }}">{{ $pais }}</td>
                    <td rowspan="{{ count($infopais['ciu']) }}">{{ $infopais["Cap"] }}</td>
                    <td rowspan="{{ count($infopais['ciu']) }}">{{ $infopais["mon"] }}</td>
                    <td rowspan="{{ count($infopais['ciu']) }}">{{ $infopais["pob"] }}
                        millones hab.
                    </td>
                    @foreach($infopais["ciu"] as $ciudad)
                    <td>
                        {{ $ciudad }}
                    </td>
                    </tr>
                    @endforeach
            @endforeach
        </tbody>
    </table>
    
</body>
</html>