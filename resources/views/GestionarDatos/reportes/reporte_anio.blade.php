<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Anual</title>
    <style>
        .centrado {
            text-align: center;
        }
        table {
            width: 647px;
            margin-left: 25px;            
            border: 1px solid black;
        }
        th, td {
            height: 22px;
            text-align: center;
        }
        th {
            background-color: #d4efdf;
        }
    </style>
    <link rel="shortcut icon" href="{{ public_path().'/img/logo_con_l.png'}}">
</head>
<body>
    <h3 class="centrado">RESULTADO NACIONAL DE ESTUDIO DE ECOEFICIENCIA Y HUELLA DE CARBONO AIS</h3>
    <br>
        @if($colegio)
        <div style="text-align: center;">
            <h3 style="font-family: 'Arial', sans-serif; color: #333; display: inline-block; margin-left: -10px;">{{$colegio}} - </h3>
            <h3 style="font-family: 'Arial', sans-serif; color: #333; display: inline-block;">{{$anio}} - </h3>
        </div>
        @endif


    <table>

    @if($consumogasolina && count($consumogasolina) > 0)
    <thead>
        <tr>
            <th style="width: 206.262px;">Consumo de Gasolina</th>
            <th style="width: 274px;">Combustible m3</th>
            <th style="width: 165.938px;">Ton C02</th>
        </tr>
    </thead>
    @foreach ($consumogasolina as $gasofa)
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>{{$gasofa->Combustible_m3_Anual}}</td>
                <td>{{$gasofa->Ton_CO2_m3_Anual}}</td>
            </tr>
        </tbody>
    @endforeach
    @else
    <thead>
            <tr>
                <th style="width: 206.262px;">Consumo de Gasolina</th>
                <th style="width: 274px;">Combustible m3</th>
                <th style="width: 165.938px;">Ton C02</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td> No hay Datos </td>
                    <td> De Consumo de  </td>
                    <td> Gasolina </td>
                </tr>
            </tbody>
    @endif

        @if($consumodiesel&& count($consumodiesel) > 0)
        <thead>
            <tr>
                <th>Consumo de Diesel</th>
                <th>Diesel m3</th>
                <th>Ton C02</th>
            </tr>
        </thead>
        @foreach ($consumodiesel as $diesel)
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>{{$diesel->Combustible_m3_Anual}}</td>
                <td>{{$diesel->Ton_CO2_m3_Anual}}</td>
                
            </tr>
        </tbody>
        @endforeach
        @else
        <thead>
                <tr>
                    <th style="width: 206.262px;">Consumo de Diesel</th>
                    <th style="width: 274px;">Combustible m3</th>
                    <th style="width: 165.938px;">Ton C02</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> No hay Datos </td>
                        <td> De Consumo de  </td>
                        <td> Diesel </td>
                    </tr>
                </tbody>
        @endif

        @if($consumoagua && count($consumoagua) > 0)
        <thead>
            <tr>
                <th>Consumo de Agua</th>
                <th>Agua m3</th>
                <th>Ton C02</th>
            </tr>
        </thead>
        @foreach ($consumoagua as $agua)
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>{{$agua->Consumo_Agua_Anual}}</td>
                <td>{{$agua->Ton_CO2_Anual}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
        <thead>
                <tr>
                    <th style="width: 206.262px;">Consumo de Agua</th>
                    <th style="width: 274px;">Agua m3</th>
                    <th style="width: 165.938px;">Ton C02</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> No hay Datos </td>
                        <td> De Consumo de  </td>
                        <td> Agua </td>
                    </tr>
                </tbody>
        @endif

        @if($consumoenergetico  && count($consumoenergetico) > 0)
        <thead>
            <tr>
                <th>Consumo Energetico</th>
                <th>Consumo Kwh</th>
                <th>Ton C02</th>
            </tr>
        </thead>
        @foreach ($consumoenergetico as $energia)
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>{{$energia->Consumo_kWts_Anual}}</td>
                <td>{{$energia->Ton_CO2_Anual}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
        <thead>
                <tr>
                    <th style="width: 206.262px;">Consumo Energetico</th>
                    <th style="width: 274px;">Consumo Kwh</th>
                    <th style="width: 165.938px;">Ton C02</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> No hay Datos </td>
                        <td> De Consumo de  </td>
                        <td> energia </td>
                    </tr>
                </tbody>
        @endif

        @if($consumopapel && count($consumopapel) > 0)
        <thead>
            <tr>
                <th>Consumo Papel</th>
                <th>Consumo m3</th>
                <th>Ton C02</th>
            </tr>
        </thead>
        @foreach ($consumopapel as $papel)
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>{{$papel->Consumo_m3_Anual}}</td>
                <td>{{$papel->Ton_CO2_Anual}}</td>
            </tr>
        </tbody>
        @endforeach
        @else
        <thead>
                <tr>
                    <th style="width: 206.262px;">Consumo de Papel</th>
                    <th style="width: 274px;">Consumo m3</th>
                    <th style="width: 165.938px;">Ton C02</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> No hay Datos </td>
                        <td> De Consumo de  </td>
                        <td> Papel </td>
                    </tr>
                </tbody>
        @endif
        
    </table>
</body>
</html>
