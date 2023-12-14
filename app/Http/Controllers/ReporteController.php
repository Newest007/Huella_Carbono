<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Colegio;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag=array();
        $viewBag['colegios'] = Colegio::get();
        return view('GestionarDatos.reportes.reportes22', $viewBag);
    }

    public function pdf_anio(){
            $idColegio = "CSJ003"; 

            $consumoanual = DB::table('colegio')
            
                ->select('colegio.Nombre AS Nombre', 'consumo_papel_anual.id_Anio AS Año', 'consumo_papel_anual.Consumo_m3_Anual AS ConsumoPapelm3', 'consumo_gasolina_anual.Combustible_m3_Anual AS ConsumoGasolinam3', 'consumo_diesel_anual.Combustible_m3_Anual AS ConsumoDieselm3', 'consumo_energetico_anual.Consumo_kWts_Anual AS ConsumoEnergenitoKw', 'consumo_agua_anual.Consumo_Agua_Anual AS ConsumoAguam3')
                ->join('consumo_papel_anual', 'colegio.id_colegio', '=', 'consumo_papel_anual.id_colegio')
                ->join('consumo_gasolina_anual', 'colegio.id_colegio', '=', 'consumo_gasolina_anual.id_colegio')
                ->join('consumo_energetico_anual', 'colegio.id_colegio', '=', 'consumo_energetico_anual.id_colegio')
                ->join('consumo_diesel_anual', 'colegio.id_colegio', '=', 'consumo_diesel_anual.id_colegio')
                ->join('consumo_agua_anual', 'colegio.id_colegio', '=', 'consumo_agua_anual.id_colegio')
                ->where('colegio.id_colegio', '=', $idColegio)        
                ->get();
        
            $pdf = Pdf::loadView('GestionarDatos.reportes.reportepdf', compact('consumoanual'));
            return $pdf->stream();
        }
        
    

        public function pdf_anio_mes(Request $request){
            $colegioSeleccionado = $request->input('colegio');
            $colegio = json_decode(Colegio::where('Nombre',$colegioSeleccionado)->get());
            $idColegio = $colegio[0]->id_colegio;

            //$nombre = session('nombre');
            //$colegio = json_decode(User::where('nombre',$nombre)->get());
            //var_dump($colegio[0]->id_colegio); //Obteniendo el id del colegio
            //$idColegio = $colegio[0]->id_colegio;
            //$colegioNombre = json_decode(Colegio::where('id_colegio',$idColegio)->get());
            //var_dump($colegioNombre[0]->Nombre);

            $mes = $request->input('mes');
            $anio = $request->input('anio');


        $consumopapel = DB::table('consumo_papel')        
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_papel.id_colegio') 
            ->where('colegio.id_colegio', $idColegio)           
            ->where('consumo_papel.id_Anio', '=', $anio)
            ->where('consumo_papel.Mes', '=', $mes)
            ->get();

        $consumogasolina = DB::table('consumo_gasolina')
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_gasolina.id_colegio')
            ->where('colegio.id_colegio', $idColegio)
            ->where('consumo_gasolina.Id_Anio','=', $anio)
            ->where('consumo_gasolina.Mes','=', $mes)
            ->get();
        
        $consumodiesel = DB::table('consumo_diesel')
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_diesel.id_colegio')
            ->where('colegio.id_colegio', $idColegio)
            ->where('consumo_diesel.Id_Anio','=', $anio)
            ->where('consumo_diesel.Mes','=', $mes)
            ->get();
        
        $consumoagua = DB::table('consumo_agua')
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_agua.id_colegio')
            ->where('colegio.id_colegio', $idColegio)
            ->where('consumo_agua.Id_Anio','=', $anio)
            ->where('consumo_agua.Mes','=', $mes)
            ->get();
        
        
        
        $consumoenergetico = DB::table('consumo_energetico')
            ->where('colegio.id_colegio', $idColegio)
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_energetico.id_colegio')
            ->where('consumo_energetico.id_Anio', '=', $anio)
            ->where('consumo_energetico.Mes', '=', $mes)
            ->get();

            //Solo para el nombre
            /*$colegio = DB::table('consumo_energetico')
            ->where('colegio.id_colegio', $idColegio)
            ->join('colegio', 'colegio.id_colegio', '=', 'consumo_energetico.id_colegio')
            ->where('consumo_energetico.id_Anio', '=', $anio)
            ->where('consumo_energetico.Mes', '=', $mes)           
            ->get();*/

            $viewBag = array();
            $viewBag['consumopapel']=$consumopapel;
            $viewBag['consumogasolina']=$consumogasolina;
            $viewBag['consumodiesel']=$consumodiesel;
            $viewBag['consumoagua']=$consumoagua;
            $viewBag['consumoenergetico']=$consumoenergetico;
            //Solo para el nombre
            //$viewBag['colegio']=$colegioNombre[0]->Nombre;
            $viewBag['colegio']=$colegioSeleccionado;
            $viewBag['mes']=$mes;
            $viewBag['anio']=$anio;

            $pdf = Pdf::loadView('GestionarDatos.reportes.reportepdf', $viewBag);
            return $pdf->stream();

        }
        
        
}