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

class DatosController extends Controller
{
    public function index()
    {
        $viewBag = array();
        $viewBag['meses']=null;
        $viewBag['colegios'] = Colegio::get();
        return view('GestionarDatos.index', $viewBag);
    }

    public function mostrarGrafica(Request $request)
    {
        if($request->input('colegio') != 'Seleccione un colegio'){

            $viewBag = array();
            $viewBag['colegios'] = Colegio::get();
            $viewBag['colegioSeleccionado'] = $request->input('colegio');
            $colegioSeleccionado = $request->input('colegio');
            $colegio = json_decode(Colegio::where('Nombre',$colegioSeleccionado)->get());
            $idColegio = $colegio[0]->id_colegio;
            $datosConsumo = ConsumoAgua::where('id_colegio', $idColegio)->where('id_Anio','2024')->get();

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

            $datosConsumo = $datosConsumo->sortBy(function ($registro) use ($ordenMeses) {
                return $ordenMeses[strtolower($registro->Mes)];
            });

            $meses = $datosConsumo->pluck('Mes');
            $consumo = $datosConsumo->pluck('Consumo_m3');
            
            return view('GestionarDatos.index', [
                'meses' => $meses,
                'consumo' => $consumo,
            ], $viewBag);

        }
        else{
            return redirect('datos');
        }
    }

    public function storeAgua(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'consumoAgua' => 'required|numeric|min:1',
            //'toneladasAgua' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('AñadirDatos')->withErrors($validator)->withInput();
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

                $mesesRegistrados = ConsumoAgua::where('id_colegio', $idColegio)
                    ->where('id_anio', $anio)
                    ->count();
                //var_dump($mesesRegistrados);

                if ($mesesRegistrados == 12) {
                    ConsumoAguaAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                    // Calcular sumatoria y agregar registro a la tabla consumo_agua_anual
                    $sumatoriaAnualConsumo = ConsumoAgua::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Consumo_m3');

                    $sumatoriaAnualTon = ConsumoAgua::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Ton_CO2_m3');

                    $consumoAnual = new ConsumoAguaAnual();
                    $consumoAnual->id_colegio = $idColegio;
                    $consumoAnual->id_Anio = $anio;
                    $consumoAnual->Consumo_Agua_Anual = $sumatoriaAnualConsumo;
                    $consumoAnual->Ton_CO2_Anual = $sumatoriaAnualTon;
                    $consumoAnual->save();
                }
                else{
                    ConsumoAguaAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                }
                
                return redirect('AñadirDatos')->with('successAgua','Se ha añadido el registro del consumo de agua correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatos')->with('errorAgua','Ya existe un registro del consumo de agua para el mes de '. $mes)->withInput();
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
            return redirect('AñadirDatos')->withErrors($validator)->withInput();
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

                $mesesRegistrados = ConsumoDiesel::where('id_colegio', $idColegio)
                    ->where('id_anio', $anio)
                    ->count();
                //var_dump($mesesRegistrados);

                if ($mesesRegistrados == 12) {
                    ConsumoDieselAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                    // Calcular sumatoria y agregar registro a la tabla consumo_agua_anual
                    $sumatoriaAnualCantidad = ConsumoDiesel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Cantidad_Anual');

                    $sumatoriaAnualCombus = ConsumoDiesel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Combustible_m3_Anual');

                    $sumatoriaAnualTon = ConsumoDiesel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Ton_CO2_m3_Anual');

                    $sumatoriaAnualKGr = ConsumoDiesel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('kGr_Co2_m3_Anual');

                    $tablaAnual = new ConsumoDieselAnual();
                    $tablaAnual->id_colegio = $idColegio;
                    $tablaAnual->id_Anio = $anio;
                    $tablaAnual->Cantidad_Anual = $sumatoriaAnualCantidad;
                    $tablaAnual->Combustible_m3_Anual = $sumatoriaAnualCombus;
                    $tablaAnual->Ton_CO2_m3_Anual =  $sumatoriaAnualTon;
                    $tablaAnual->kGr_CO2_m3_Anual =  $sumatoriaAnualKGr;
                    $tablaAnual->save();
                }
                else{
                    ConsumoDieselAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                }
                
                return redirect('AñadirDatos')->with('successDiesel','Se ha añadido el registro del consumo de diesel correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatos')->with('errorDiesel','Ya existe un registro de la cantidad de diesel para el mes de '. $mes)->withInput();
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
            return redirect('AñadirDatos')->withErrors($validator)->withInput();
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
 
                $mesesRegistrados = ConsumoEnergetico::where('id_colegio', $idColegio)
                    ->where('id_anio', $anio)
                    ->count();
                //var_dump($mesesRegistrados);

                if ($mesesRegistrados == 12) {
                    ConsumoEnergeticoAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                    // Calcular sumatoria y agregar registro a la tabla consumo_agua_anual
                    $sumatoriaAnualConsumo = ConsumoEnergetico::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Consumo_kWts_Anual');

                    $sumatoriaAnualTon = ConsumoEnergetico::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Ton_CO2_Anual');

                    $tablaAnual = new ConsumoEnergeticoAnual();
                    $tablaAnual->id_colegio = $idColegio;
                    $tablaAnual->id_Anio = $anio;
                    $tablaAnual->Consumo_kWts_Anual = $sumatoriaAnualConsumo;
                    $tablaAnual->Ton_CO2_Anual = $sumatoriaAnualTon;
                    $tablaAnual->save();
                }
                else{
                    ConsumoEnergeticoAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                }

                return redirect('AñadirDatos')->with('successEnergia','Se ha añadido el registro del consumo de energia correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatos')->with('errorEnergia','Ya existe un registro del consumo de energia para el mes de '. $mes)->withInput();
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
            return redirect('AñadirDatos')->withErrors($validator)->withInput();
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
                
                $mesesRegistrados = ConsumoGasolina::where('id_colegio', $idColegio)
                    ->where('id_anio', $anio)
                    ->count();
                //var_dump($mesesRegistrados);

                if ($mesesRegistrados == 12) {
                    ConsumoGasolinaAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                    // Calcular sumatoria y agregar registro a la tabla consumo_agua_anual
                    $sumatoriaAnualCantidad = ConsumoGasolina::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Cantidad');

                    $sumatoriaAnualComb = ConsumoGasolina::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Combustible_m3');

                    $sumatoriaAnualTon = ConsumoGasolina::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Ton_CO2_m3');

                    $sumatoriaAnualKm = ConsumoGasolina::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Km_CO2_m3');

                    $tablaAnual = new ConsumoGasolinaAnual();
                    $tablaAnual->id_colegio = $idColegio;
                    $tablaAnual->id_Anio = $anio;
                    $tablaAnual->Cantidad_Anual = $sumatoriaAnualCantidad;
                    $tablaAnual->Combustible_m3_Anual = $sumatoriaAnualComb;
                    $tablaAnual->Ton_CO2_m3_Anual = $sumatoriaAnualTon;
                    $tablaAnual->Km_CO2_m3_Anual = $sumatoriaAnualKm;
                    $tablaAnual->save();
                }
                else{
                    ConsumoGasolinaAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                }

                return redirect('AñadirDatos')->with('successGasolina','Se ha añadido el registro del consumo de gasolina correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatos')->with('errorGasolina','Ya existe un registro de la cantidad de gasolina para el mes de '. $mes)->withInput();
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
            return redirect('AñadirDatos')->withErrors($validator)->withInput();
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

                $mesesRegistrados = ConsumoPapel::where('id_colegio', $idColegio)
                    ->where('id_anio', $anio)
                    ->count();
                //var_dump($mesesRegistrados);

                if ($mesesRegistrados == 12) {
                    ConsumoPapelAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                    // Calcular sumatoria y agregar registro a la tabla consumo_agua_anual
                    $sumatoriaAnualConsumo = ConsumoPapel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Consumo_m3');

                    $sumatoriaAnualTon = ConsumoPapel::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->sum('Ton_CO2');

                    $tablaAnual = new ConsumoPapelAnual();
                    $tablaAnual->id_colegio = $idColegio;
                    $tablaAnual->id_Anio = $anio;
                    $tablaAnual->Consumo_m3_Anual = $sumatoriaAnualConsumo;
                    $tablaAnual->Ton_CO2_Anual = $sumatoriaAnualTon;
                    $tablaAnual->save();
                }
                else{
                    ConsumoPapelAnual::where('id_colegio', $idColegio)
                        ->where('id_anio', $anio)
                        ->delete();
                }

                return redirect('AñadirDatos')->with('successPapel','Se ha añadido el registro del consumo de papel correctamente!')->withInput();
            }
            else{
                return redirect('AñadirDatos')->with('errorPapel','Ya existe un registro de la cantidad de papel para el mes de '. $mes)->withInput();
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

    public function showAgua()
    {
        $viewBag = array();
        $viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        return view('GestionarDatos.tablaDatos.datosAgua',$viewBag);
    }

    public function showDiesel()
    {
        $viewBag = array();
        $viewBag['consumoDiesel'] = DB::table('consumo_diesel')->join('colegio','colegio.id_colegio','=','consumo_diesel.id_colegio')->get();
        return view('GestionarDatos.tablaDatos.datosDiesel',$viewBag);
    }

    public function showEnergia()
    {
        $viewBag = array();
        $viewBag['consumoEnergia'] = DB::table('consumo_energetico')->join('colegio','colegio.id_colegio','=','consumo_energetico.id_colegio')->get();
        return view('GestionarDatos.tablaDatos.datosEnergia',$viewBag);
    }

    public function showGas()
    {
        $viewBag = array();
        $viewBag['consumoGas'] = DB::table('consumo_gasolina')->join('colegio','colegio.id_colegio','=','consumo_gasolina.id_colegio')->get();
        return view('GestionarDatos.tablaDatos.datosGas',$viewBag);
    }

    public function showPapel()
    {
        $viewBag = array();
        $viewBag['consumoPapel'] = DB::table('consumo_papel')->join('colegio','colegio.id_colegio','=','consumo_papel.id_colegio')->get();
        return view('GestionarDatos.tablaDatos.datosPapel',$viewBag);
    }

    public function showReporte22()
    {
        $viewBag = array();
        $viewBag['consumoPapel'] = DB::table('consumo_papel')->join('colegio','colegio.id_colegio','=','consumo_papel.id_colegio')->get();
        return view('GestionarDatos.reportes.reportes22',$viewBag);
    }

    public function showReporte23()
    {
        return view('GestionarDatos.reportes.reportes23');
    }

    public function showReporte24()
    {
        return view('GestionarDatos.reportes.reportes24');
    }

    public function showReporte25()
    {
        return view('GestionarDatos.reportes.reportes25');
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
        ConsumoAguaAnual::where('id_colegio', $id_colegio)
                ->where('id_anio', $id_Anio)
                ->delete();
        return redirect('VerDatosAgua')->with('successAgua','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyDiesel(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_diesel')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        ConsumoDieselAnual::where('id_colegio', $id_colegio)
                ->where('id_anio', $id_Anio)
                ->delete();
        return redirect('VerDatosDiesel')->with('successDiesel','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyEnergia(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_energetico')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        ConsumoEnergeticoAnual::where('id_colegio', $id_colegio)
                ->where('id_anio', $id_Anio)
                ->delete();
        return redirect('VerDatosEnergia')->with('successEnergia','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyGas(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_gasolina')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        ConsumoGasolinaAnual::where('id_colegio', $id_colegio)
                ->where('id_anio', $id_Anio)
                ->delete();
        return redirect('VerDatosGas')->with('successGasolina','Se ha eliminado el registro correctamente')->withInput();
    }

    public function destroyPapel(string $id_colegio, string $id_Anio, string $Mes)
    {
        DB::table('consumo_papel')
        ->where('id_colegio', $id_colegio)
        ->where('id_Anio', $id_Anio)
        ->where('Mes', $Mes)
        ->delete();
        ConsumoPapelAnual::where('id_colegio', $id_colegio)
                ->where('id_anio', $id_Anio)
                ->delete();
        return redirect('VerDatosPapel')->with('successPapel','Se ha eliminado el registro correctamente')->withInput();
    }

}
