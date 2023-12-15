<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Seguimiento;
use Illuminate\Pagination\Paginator;

class PagesController extends Controller
{
    //
    public function fnIndex () {   
        return view('welcome');
    }

    public function fnEstDetalle($id) {
        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate (Request $request, $id) {

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst  = $request->codEst;
        $xUpdateAlumnos->nomEst  = $request->nomEst;
        $xUpdateAlumnos->apeEst  = $request->apeEst;
        $xUpdateAlumnos->fnaEst  = $request->fnaEst;
        $xUpdateAlumnos->turMat  = $request->turMat;
        $xUpdateAlumnos->semMat  = $request->semMat;
        $xUpdateAlumnos->estMat  = $request->estMat;

        $xUpdateAlumnos->save();

        $xAlumnos = Estudiante::all();
        return view('pagLista', compact('xAlumnos'));
        //return back() -> with('msj', 'Se actualizó con éxito...');
    }


    public function fnRegistrar (Request $request) {

        //return $request;          //verificando "token" y datos recibidos

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'          
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst  = $request->codEst;
        $nuevoEstudiante->nomEst  = $request->nomEst;
        $nuevoEstudiante->apeEst  = $request->apeEst;
        $nuevoEstudiante->fnaEst  = $request->fnaEst;
        $nuevoEstudiante->turMat  = $request->turMat;
        $nuevoEstudiante->semMat  = $request->semMat;
        $nuevoEstudiante->estMat  = $request->estMat;

        $nuevoEstudiante->save();

        return back()->with('msj', 'Se registró con éxito.');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno -> delete();
        return back() -> with ('msj', 'Se elimino con éxito...');
    }

    public function fnLista () {       

        $xAlumnos = Estudiante::all(); //datos BD
        $xAlumnos = Estudiante::paginate(1);
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria ($numero=0) {
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }

    public function fnListaSeg () {
        $xAlumnosSeg = Seguimiento::all(); //datos BD
        $xAlumnosSeg = Seguimiento::paginate(1);
        return view('pagListaSeg', compact('xAlumnosSeg'));
    }

    public function fnEstDetalleSeg($id) {
        $xDetAlumnosSeg = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagDetalleSeg', compact('xDetAlumnosSeg'));
    }

    public function fnEliminarSeg($id){
        $deleteAlumnoSeg = Seguimiento::findOrFail($id);
        $deleteAlumnoSeg -> delete();
        return back() -> with ('msj', 'Se elimino(seg) con éxito...');
    }

    public function fnEstActualizarSeg($id){
        $xActAlumnosSeg = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagActualizarSeg', compact('xActAlumnosSeg'));
    }

    public function fnUpdateSeg (Request $request, $id) {

        $xUpdateAlumnosSeg = Seguimiento::findOrFail($id);

        $xUpdateAlumnosSeg->idSeg   = $request->idSeg;
        $xUpdateAlumnosSeg->idEst   = $request->idEst;
        $xUpdateAlumnosSeg->traAct  = $request->traAct;
        $xUpdateAlumnosSeg->ofiAct  = $request->ofiAct;
        $xUpdateAlumnosSeg->satEst  = $request->satEst;
        $xUpdateAlumnosSeg->fecSeg  = $request->fecSeg;
        $xUpdateAlumnosSeg->estSeg  = $request->estSeg;

        $xUpdateAlumnosSeg->save();

        $xAlumnosSeg = Seguimiento::all();
        return view('pagListaSeg', compact('xAlumnosSeg'));      
        //return back() -> with('msj', 'Se actualizó(seg) con éxito...');
    }

    public function fnRegistrarSeg (Request $request) {

        //return $request;          //verificando "token" y datos recibidos

        $request -> validate([
            'idSeg'=>'required',
            'idEst'=>'required',
            'traAct'=>'required',
            'ofiAct'=>'required',
            'satEst'=>'required',
            'fecSeg'=>'required',
            'estSeg'=>'required'          
        ]);

        $nuevoEstudianteSeg = new Seguimiento;

        $nuevoEstudianteSeg->idSeg  = $request->idSeg;
        $nuevoEstudianteSeg->idEst  = $request->idEst;
        $nuevoEstudianteSeg->traAct  = $request->traAct;
        $nuevoEstudianteSeg->ofiAct  = $request->ofiAct;
        $nuevoEstudianteSeg->satEst  = $request->satEst;
        $nuevoEstudianteSeg->fecSeg  = $request->fecSeg;
        $nuevoEstudianteSeg->estSeg  = $request->estSeg;

        $nuevoEstudianteSeg->save();

        $xAlumnosSeg = Seguimiento::all();
        return view('pagListaSeg', compact('xAlumnosSeg'));
        //return back()->with('msj', 'Se registró(seg) con éxito.');
    }
}
