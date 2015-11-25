<?php

namespace MotorolaSL\Http\Controllers;


use Illuminate\Database\Eloquent\Collection;
use MotorolaSL\CodigoPuesto;
use MotorolaSL\ModeloInfo;
use MotorolaSL\Puesto;
use Illuminate\Http\Request;
use MotorolaSL\Http\Requests;
use MotorolaSL\TrazabilidadMotorola;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'consultaImeis' => 'required',
        ]);

        $imeis = explode("\r\n", $request->get('consultaImeis'));
        $completeUnits = new Collection();

        foreach ($imeis as $imei)
        {
            $unidad = TrazabilidadMotorola::where('Codigo',$imei)->get();

            if (!$unidad->isEmpty() && $imei != '')
            {
                $puesto = Puesto::where([
                    'Nombre' => 'CFC',
                    'ConfigLinea_id' => $unidad->first()->ConfigLinea_id
                ])->get();

                $codigoPuestos = CodigoPuesto::where(
                    'Puesto_id', $puesto->first()->Id
                )->get();

                $modeloInfo = ModeloInfo::where([
                    'ConfigLinea_id' => $unidad->first()->ConfigLinea_id
                ])->get();

                $codigoPuestoSimLock = $this->findInCollection($codigoPuestos, 'Nombre', 'sim_lock_nkey');

                if ($codigoPuestoSimLock!=null) {

                    $trazabilidadUnidad = TrazabilidadMotorola::where([
                        'Unidad_id' => $unidad->first()->Unidad_id,
                        'CodigoPuesto_id' => $codigoPuestoSimLock->Id
                    ])->get();

                    $completeUnits->add($this->setUnitsCollection($imei, $trazabilidadUnidad, $modeloInfo));
                }
                else
                {
                    $completeUnits->add($this->setUnitsCollection($imei));
                }
            }
            elseif($imei != '')
            {
                $completeUnits->add($this->setUnitsCollection($imei));
            }
        }

        return view('pages.sl_results',[
            'units' => $completeUnits
        ]);
    }

    /**
     * @param $imei
     * @param Collection|null $traza
     * @return array
     */
    private function setUnitsCollection($imei, Collection $traza = null, Collection $modeloInfo = null)
    {
        $result = [];

        if (!$traza==null)
        {
            return $result = [
                'imei' => $imei,
                'sl' => $traza->first()->Codigo,
                'fechaHora' => $traza->first()->FechaHora,
                'carrier' => $this->findInCollection($modeloInfo,'Campo','CARRIER')->Valor,
                'salesModel' => $this->findInCollection($modeloInfo,'Campo','SALESMODEL')->Valor,
                'partNumber' => $this->findInCollection($modeloInfo,'Campo','PART_NUMBER')->Valor,
            ];
        }
        else
        {
            return $result = [
                'imei' => $imei,
                'sl' => 'Sin resultados',
                'fechaHora' => '-',
                'carrier' => '-',
                'salesModel' => '-',
                'partNumber' => '-',
            ];
        }
    }

    /**
     * Check if there is a item in a collection by given key and value
     * @param Illuminate\Support\Collection $collection collection in which search is to be made
     * @param string $key name of key to be checked
     * @param string $value value of key to be checkied
     * @return boolean|object false if not found, object if it is found
     */
    function findInCollection(Collection $collection, $key, $value) {
        foreach ($collection as $item) {
            if (isset($item->$key) && $item->$key == $value) {
                return $item;
            }
        }
        return FALSE;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
