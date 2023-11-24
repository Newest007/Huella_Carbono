<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\ConsumoAgua;
use App\Models\ConsumoDiesel;
use App\Models\ConsumoEnergetico;
use App\Models\ConsumoGasolina;
use App\Models\ConsumoPapel;
use App\Models\Colegio;
use App\Models\User;

class DatosController extends Controller
{
    public function index()
    {
        return view('GestionarDatos.index');
    }

    public function create()
    {
        
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
    public function show()
    {
        $nombre = session('nombre');
        $colegio = json_decode(User::where('nombre',$nombre)->get());
        //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
        $idColegio = $colegio[0]->id_colegio;

        $viewBag = array();
        $viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        $viewBag['consumoDiesel'] = DB::table('consumo_diesel')->join('colegio','colegio.id_colegio','=','consumo_diesel.id_colegio')->get();
        $viewBag['consumoGasolina'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        $viewBag['consumoPapel'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->get();
        //$viewBag['consumoAgua'] = DB::table('consumo_agua')->join('colegio','colegio.id_colegio','=','consumo_agua.id_colegio')->where('colegio.id_colegio',$idColegio)->get();
        return view('GestionarDatos.verDatos',$viewBag);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
