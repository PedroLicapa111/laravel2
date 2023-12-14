extends ('pagPlantilla')

@section('titulo')
    <h1>PAGINA DE LISTA...</h1>
@endsection

@section('seccion')
    <h3>Detalle estudiante </h3>

    <p>Id Seguimiento                  {{$xDetAlumnosSeg->idSeg}}</p>
    <p>Id Estudiante               {{$xDetAlumnosSeg->idEst}}</p>
    <p>Trabajo Actual  {{$xDetAlumnosSeg->traAct}}</p>
    <p>Oficio Actual  {{$xDetAlumnosSeg->ofiAct}}</p>
    <p>Satisfaccion Est                {{$xDetAlumnosSeg->satEst}}</p>
    <p>Fecha Segumiento       {{$xDetAlumnosSeg->fecSeg}}</p>
    <p>Estado de seguimiento  {{$xDetAlumnosSeg->estSeg}}</p>
       
@endsection