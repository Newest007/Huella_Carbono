<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\ConsumoAgua;
use App\Models\ConsumoAguaAnual;
use App\Models\ConsumoDiesel;
use App\Models\ConsumoDieselAnual;
use App\Models\ConsumoEnergetico;
use App\Models\ConsumoEnergeticoAnual;
use App\Models\ConsumoGasolina;
use App\Models\ConsumoGasolinaAnual;
use App\Models\ConsumoPapel;
use App\Models\ConsumoPapelAnual;
use App\Models\Colegio;
use App\Models\User;

class DatosControllerUser extends Controller
{
    public function index()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['anioSeleccionado']=null;

        $ordenAño = [
            '2022' => 1,
            '2023' => 2,
            '2024' => 3,
            '2025' => 4
        ];

        //Consumo Agua
        $datosAgua = ConsumoAguaAnual::where('id_colegio', $idColegio)->get();
        $datosAgua = $datosAgua->sortBy(function ($registro) use ($ordenAño) {
            return $ordenAño[strtolower($registro->id_Anio)];
        });
        $anioAnual = $datosAgua->pluck('id_Anio');
        $consumoAguaAnual = $datosAgua->pluck('Consumo_Agua_Anual');

        //Consumo Diesel
        $datosDiesel = ConsumoDieselAnual::where('id_colegio', $idColegio)->get();
        $datosDiesel = $datosDiesel->sortBy(function ($registro) use ($ordenAño) {
            return $ordenAño[strtolower($registro->id_Anio)];
        });
        $consumoDieselAnual = $datosDiesel->pluck('Cantidad_Anual');

        //Consumo Energetico
        $datosEnergia = ConsumoEnergeticoAnual::where('id_colegio', $idColegio)->get();
        $datosEnergia = $datosEnergia->sortBy(function ($registro) use ($ordenAño) {
            return $ordenAño[strtolower($registro->id_Anio)];
        });
        $consumoEnergiaAnual = $datosEnergia->pluck('Consumo_kWts_Anual');

        //Consumo Gasolina
        $datosGasolina = ConsumoGasolinaAnual::where('id_colegio', $idColegio)->get();
        $datosGasolina = $datosGasolina->sortBy(function ($registro) use ($ordenAño) {
            return $ordenAño[strtolower($registro->id_Anio)];
        });
        $consumoGasAnual = $datosGasolina->pluck('Cantidad_Anual');

        //Consumo Papel
        $datosPapel = ConsumoPapelAnual::where('id_colegio', $idColegio)->get();
        $datosPapel = $datosPapel->sortBy(function ($registro) use ($ordenAño) {
            return $ordenAño[strtolower($registro->id_Anio)];
        });
        $consumoPapelAnual = $datosPapel->pluck('Consumo_m3_Anual');

        return view('GestionarDatos.indexColegio',[
        'anioAnual' =>$anioAnual,
        'consumoAguaAnual' => $consumoAguaAnual,
        'consumoDieselAnual' => $consumoDieselAnual,
        'consumoEnergiaAnual' => $consumoEnergiaAnual,
        'consumoGasAnual' => $consumoGasAnual,
        'consumoPapelAnual' => $consumoPapelAnual], $viewBag);
    }

    public function mostrarGrafica(Request $request)
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        $idColegio = $colegio[0]->id_colegio;

        if($request->input('anio') != 'Seleccione un año'){

            $anio = $request->input('anio');
            $ordenMeses = [
                'enero' => 1,
                'febrero' => 2,
                'marzo' => 3,
                'abril' => 4,
                'mayo' => 5,
                'junio' => 6,
                'julio' => 7,
                'agosto' => 8,
                'septiembre' => 9,
                'octubre' => 10,
                'noviembre' => 11,
                'diciembre' => 12,
            ];
            $ordenAño = [
                '2022' => 1,
                '2023' => 2,
                '2024' => 3,
                '2025' => 4
            ];
            
            //Consumo Agua
            $datosConsumoAgua = ConsumoAgua::where('id_colegio', $idColegio)->where('id_Anio',$anio)->get();
            $datosConsumoAgua = $datosConsumoAgua->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });
            $mesesAgua = $datosConsumoAgua->pluck('Mes');
            $consumoAgua = $datosConsumoAgua->pluck('Consumo_m3');
            $co2Agua = $datosConsumoAgua->pluck('Ton_CO2_m3');

            //Consumo Diesel
            $datosConsumoDiesel = ConsumoDiesel::where('id_colegio', $idColegio)->where('id_Anio',$anio)->get();
            $datosConsumoDiesel = $datosConsumoDiesel->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });
            $mesesDiesel = $datosConsumoDiesel->pluck('Mes');
            $consumoDiesel = $datosConsumoDiesel->pluck('Cantidad');
            $co2Diesel = $datosConsumoDiesel->pluck('Ton_CO2_m3');

            //Consumo Energetico
            $datosConsumoEner = ConsumoEnergetico::where('id_colegio', $idColegio)->where('id_Anio',$anio)->get();
            $datosConsumoEner = $datosConsumoEner->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });
            $mesesEner = $datosConsumoEner->pluck('Mes');
            $consumoEner = $datosConsumoEner->pluck('Consumo_kWts');
            $co2Ener = $datosConsumoEner->pluck('Ton_CO2');
            
            //Consumo Gas
            $datosConsumoGas = ConsumoGasolina::where('id_colegio', $idColegio)->where('id_Anio',$anio)->get();
            $datosConsumoGas = $datosConsumoGas->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });
            $mesesGas = $datosConsumoGas->pluck('Mes');
            $consumoGas = $datosConsumoGas->pluck('Cantidad');
            $co2Gas = $datosConsumoGas->pluck('Ton_CO2_m3');

            //Consumo Papel
            $datosConsumoPapel = ConsumoPapel::where('id_colegio', $idColegio)->where('id_Anio',$anio)->get();
            $datosConsumoPapel = $datosConsumoPapel->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });
            $mesesPapel = $datosConsumoPapel->pluck('Mes');
            $consumoPapel = $datosConsumoPapel->pluck('Consumo_m3');
            $co2Papel = $datosConsumoPapel->pluck('Ton_CO2');


            //Consumo Agua
            $datosAgua = ConsumoAguaAnual::where('id_colegio', $idColegio)->get();
            $datosAgua = $datosAgua->sortBy(function ($registro) use ($ordenAño) {
                return $ordenAño[strtolower($registro->id_Anio)];
            });
            $anioAnual = $datosAgua->pluck('id_Anio');
            $consumoAguaAnual = $datosAgua->pluck('Consumo_Agua_Anual');
    
            //Consumo Diesel
            $datosDiesel = ConsumoDieselAnual::where('id_colegio', $idColegio)->get();
            $datosDiesel = $datosDiesel->sortBy(function ($registro) use ($ordenAño) {
                return $ordenAño[strtolower($registro->id_Anio)];
            });
            $consumoDieselAnual = $datosDiesel->pluck('Cantidad_Anual');
    
            //Consumo Energetico
            $datosEnergia = ConsumoEnergeticoAnual::where('id_colegio', $idColegio)->get();
            $datosEnergia = $datosEnergia->sortBy(function ($registro) use ($ordenAño) {
                return $ordenAño[strtolower($registro->id_Anio)];
            });
            $consumoEnergiaAnual = $datosEnergia->pluck('Consumo_kWts_Anual');
    
            //Consumo Gasolina
            $datosGasolina = ConsumoGasolinaAnual::where('id_colegio', $idColegio)->get();
            $datosGasolina = $datosGasolina->sortBy(function ($registro) use ($ordenAño) {
                return $ordenAño[strtolower($registro->id_Anio)];
            });
            $consumoGasAnual = $datosGasolina->pluck('Cantidad_Anual');
    
            //Consumo Papel
            $datosPapel = ConsumoPapelAnual::where('id_colegio', $idColegio)->get();
            $datosPapel = $datosPapel->sortBy(function ($registro) use ($ordenAño) {
                return $ordenAño[strtolower($registro->id_Anio)];
            });
            $consumoPapelAnual = $datosPapel->pluck('Consumo_m3_Anual');
            
            return view('GestionarDatos.indexColegio', [
                'anioSeleccionado' =>$anio,

                'mesesAgua' => $mesesAgua,
                'consumoAgua' => $consumoAgua,
                'co2Agua' => $co2Agua,

                'mesesDiesel' => $mesesDiesel,
                'consumoDiesel' => $consumoDiesel,
                'co2Diesel' => $co2Diesel,

                'mesesEner' => $mesesEner,
                'consumoEner' => $consumoEner,
                'co2Ener' => $co2Ener,

                'mesesGas' => $mesesGas,
                'consumoGas' => $consumoGas,
                'co2Gas' => $co2Gas,

                'mesesPapel' => $mesesPapel,
                'consumoPapel' => $consumoPapel,
                'co2Papel' => $co2Papel,


                'anioAnual' =>$anioAnual,
                'consumoAguaAnual' => $consumoAguaAnual,
                'consumoDieselAnual' => $consumoDieselAnual,
                'consumoEnergiaAnual' => $consumoEnergiaAnual,
                'consumoGasAnual' => $consumoGasAnual,
                'consumoPapelAnual' => $consumoPapelAnual,
            ]);

        }
        else{
            //retorna  ala vista del colegio
            return redirect('datosSC');
        }
    }

    public function storeAgua(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'consumoAgua' => 'required|numeric|min:1',
            //'toneladasAgua' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('AñadirDatosC')->withErrors($validator)->withInput();
        }
        else{
            $nombre = session('nombre');
            $colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            $idColegio = $colegio[0]->id_colegio;

            //$factorEmision = $request->input('factorEmision');
            $factorEmision = 0.788;
            $anio = $request->input('anioAgua');
            $mes = $request->input('mesAgua');
            $consumo = $request->input('consumoAgua');
            $toneladas = number_format(($factorEmision * $consumo)/(1000),3,'.','');

            $registroExistente = ConsumoAgua::where('id_colegio', $idColegio)
            ->where('Mes', $mes)
            ->where('id_anio',$anio)
            ->exists();
            //var_dump($registroExistente);
            
            if($registroExistente==false){
                $datos = new ConsumoAgua();
                $datos->id_colegio = $idColegio;
                $datos->id_Anio = $anio;
                $datos->Mes = $mes;
                $datos->Consumo_m3 = $consumo;
                $datos->Ton_CO2_m3 = $toneladas;
                $datos->save();
                return redirect('AñadirDatosC')->with('successAgua','Se ha añadido el registro del consumo de agua correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatosC')->with('errorAgua','Ya existe un registro del consumo de agua para el mes de '. $mes)->withInput();
            }
        }
    }


    public function storeDiesel(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'consumoDiesel' => 'required|numeric|min:1',
            //'toneladasAgua' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('AñadirDatosC')->withErrors($validator)->withInput();
        }
        else{
            $nombre = session('nombre');
            $colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            $idColegio = $colegio[0]->id_colegio;
                        
            //$factorEmision = $request->input('factorEmision');
            $factorConsumo = 2.6892;
            $anio = $request->input('anioDiesel');
            $mes = $request->input('mesDiesel');
            $consumo = $request->input('consumoDiesel');
            $combustible_m3 = $consumo * 0.00375841;
            $Ton_CO2 = $factorConsumo * $combustible_m3;
            $Kg_CO2 = $Ton_CO2 * 1000;

            $registroExistente = ConsumoDiesel::where('id_colegio', $idColegio)
            ->where('Mes', $mes)
            ->where('id_anio',$anio)
            ->exists();
            //var_dump($registroExistente);
            
            if($registroExistente==false){
                $datos = new ConsumoDiesel();
                $datos->id_colegio = $idColegio;
                $datos->id_Anio = $anio;
                $datos->Mes = $mes;
                $datos->Cantidad = $consumo;
                $datos->Combustible_m3 = $combustible_m3;
                $datos->Ton_CO2_m3=$Ton_CO2;
                $datos->kGr_CO2_m3=$Kg_CO2;
                $datos->save();
                return redirect('AñadirDatosC')->with('successDiesel','Se ha añadido el registro del consumo de diesel correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatosC')->with('errorDiesel','Ya existe un registro de la cantidad de diesel para el mes de '. $mes)->withInput();
            }
        }
    }

    public function storeEnergia(Request $request)
    {
        $validator = Validator::make($request->all(),[
            //'consumoEnergia' => 'required|numeric|min:1',
            'consumoEnergia' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('AñadirDatosC')->withErrors($validator)->withInput();
        }
        else{
            $nombre = session('nombre');
            $colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            $idColegio = $colegio[0]->id_colegio;
                        
            //$factorEmision = $request->input('factorEmision');
            $factorEmision = 0.6798;
            $anio = $request->input('anioEnergia');
            $mes = $request->input('mesEnergia');
            $consumo = $request->input('consumoEnergia');
            $toneladas = ($factorEmision * $consumo)/(1000);

            $registroExistente = ConsumoEnergetico::where('id_colegio', $idColegio)
            ->where('Mes', $mes)
            ->where('id_anio',$anio)
            ->exists();
            //var_dump($registroExistente);
            
            if($registroExistente==false){
                $datos = new ConsumoEnergetico();
                $datos->id_colegio = $idColegio;
                $datos->id_Anio = $anio;
                $datos->Mes = $mes;
                $datos->Consumo_kWts = $consumo;
                $datos->Ton_CO2 = number_format($toneladas, 3, '.', '');
                $datos->save();
                return redirect('AñadirDatosC')->with('successEnergia','Se ha añadido el registro del consumo de energia correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatosC')->with('errorEnergia','Ya existe un registro del consumo de energia para el mes de '. $mes)->withInput();
            }
        }
    }
    
    
    public function storeGasolina(Request $request)
    {
        $validator = Validator::make($request->all(),[
            //'consumoEnergia' => 'required|numeric|min:1',
            'consumoGasolina' => 'required|numeric|min:1'
        ]);
        
        if ($validator->fails()) {
            return redirect('AñadirDatosC')->withErrors($validator)->withInput();
        }
        else{
            $nombre = session('nombre');
            $colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            $idColegio = $colegio[0]->id_colegio;
                        
            //$factorEmision = $request->input('factorEmision');
            $factorConsumo = 2.3476;
            $anio = $request->input('anioGasolina');
            $mes = $request->input('mesGasolina');
            $consumo = $request->input('consumoGasolina');
            $combustible_m3=$consumo * 0.00375841;
            $Ton_CO2 = $factorConsumo * $combustible_m3;
            $Kg_CO2 = $Ton_CO2 * 1000;
            
            $registroExistente = ConsumoGasolina::where('id_colegio', $idColegio)
            ->where('Mes', $mes)
            ->where('id_anio',$anio)
            ->exists();
            //var_dump($registroExistente);
            
            if($registroExistente==false){
                $datos = new ConsumoGasolina();
                $datos->id_colegio = $idColegio;
                $datos->id_Anio = $anio;
                $datos->Mes = $mes;
                $datos->Cantidad = $consumo;
                $datos->Combustible_m3 = $combustible_m3;
                $datos->Ton_CO2_m3 = $Ton_CO2;
                $datos->Km_CO2_m3 = $Kg_CO2;
                $datos->save();
                return redirect('AñadirDatosC')->with('successGasolina','Se ha añadido el registro del consumo de gasolina correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatosC')->with('errorGasolina','Ya existe un registro de la cantidad de gasolina para el mes de '. $mes)->withInput();
            }
        }
    }

    public function storePapel(Request $request)
    {
        $validator = Validator::make($request->all(),[
            //'consumoEnergia' => 'required|numeric|min:1',
            'consumoPapel' => 'required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect('AñadirDatosC')->withErrors($validator)->withInput();
        }
        else{
            $nombre = session('nombre');
            $colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            $idColegio = $colegio[0]->id_colegio;
                        
            //$factorEmision = $request->input('factorEmision');
            $factorEmision = 0.6798;
            $anio = $request->input('anioPapel');
            $mes = $request->input('mesPapel');
            $consumo = $request->input('consumoPapel');
            $toneladas = ($factorEmision * $consumo)/(1000);

            $registroExistente = ConsumoPapel::where('id_colegio', $idColegio)
            ->where('Mes', $mes)
            ->where('id_anio',$anio)
            ->exists();
            //var_dump($registroExistente);
            
            if($registroExistente==false){
                $datos = new ConsumoPapel();
                $datos->id_colegio = $idColegio;
                $datos->id_Anio = $anio;
                $datos->Mes = $mes;
                $datos->Consumo_m3 = $consumo;
                $datos->Ton_CO2 = $toneladas;
                $datos->save();
                return redirect('AñadirDatosC')->with('successPapel','Se ha añadido el registro del consumo de papel correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatosC')->with('errorPapel','Ya existe un registro de la cantidad de papel para el mes de '. $mes)->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    /*public function show()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        //$viewBag['consumoDiesel'] = DB::table('consumo_diesel')->join('colegio','colegio.id_colegio','=','consumo_diesel.id_colegio')->get();
        //$viewBag['consumoGasolina'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        //$viewBag['consumoPapel'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        //$viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.verDatos',$viewBag);
    }*/

    public function showAguaC()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.tablaDatosColegio.datosAgua',$viewBag);
    }

    public function showDieselC()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoDiesel'] = DB::table('consumo_diesel')->join('colegio','colegio.id_colegio','=','consumo_diesel.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.tablaDatosColegio.datosDiesel',$viewBag);
    }

    public function showEnergiaC()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoEnergia'] = DB::table('consumo_energetico')->join('colegio','colegio.id_colegio','=','consumo_energetico.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.tablaDatosColegio.datosEnergia',$viewBag);
    }

    public function showGasC()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoGas'] = DB::table('consumo_gasolina')->join('colegio','colegio.id_colegio','=','consumo_gasolina.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.tablaDatosColegio.datosGas',$viewBag);
    }

    public function showPapelC()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoPapel'] = DB::table('consumo_papel')->join('colegio','colegio.id_colegio','=','consumo_papel.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.tablaDatosColegio.datosPapel',$viewBag);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    //FUNCIONES DE ELIMINACIÓN

    public function destroyAgua(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_agua')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        return redirect('VerDatosAguaC')->with('successAgua','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyDiesel(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_diesel')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        return redirect('VerDatosDieselC')->with('successDiesel','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyEnergia(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_energetico')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        return redirect('VerDatosEnergiaC')->with('successEnergia','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyGas(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_gasolina')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        return redirect('VerDatosGasC')->with('successGasolina','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyPapel(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_papel')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        return redirect('VerDatosPapelC')->with('successPapel','Se ha eliminado el registro correctamente')->withInput();
    }
}
