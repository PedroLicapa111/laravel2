@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Página de Seguimiento </h1>
@endsection

@section ('seccion')

    @if(session('msj'))
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Seguimiento.xUpdateSeg', $xActAlumnosSeg->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('idSeg')
            <div class="alert alert-danger">
                El Id seguimiento es requerido
            </div>
        @enderror

        @error('idEst')
            <div class="alert alert-danger">
                El id Estudiante es requerido
            </div>
        @enderror
        
        @if($errors ->has('traAct'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong> trabajo actual </strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif

        
        <input type="text" name="idSeg" placeholder="Id Seguimiento" value="{{ old('idSeg') }}" class="form-control mb-2">
        <input type="text" name="idEst" placeholder="Id Estudiante" value="{{ old('idEst') }}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Seleccione: Trabaja?</option>
            <option value="0" @if($xActAlumnosSeg->traAct == 0) {{"SELECTED"}} @endif>Sí</option>
            <option value="1" @if($xActAlumnosSeg->traAct == 1) {{"SELECTED"}} @endif>No</option>            
        </select>        
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Oficio actual...</option>
            @for($i=1; $i < 16; $i++)
                <option value="{{$i}}" @if ($xActAlumnosSeg->ofiAct == $i) {{"SELECTED"}} @endif> {{$i}}cp</option>
            @endfor 
        </select>        
        <select name="satEst" class="form-control mb-2">
            <option value="">Seleccione stado Seguimiento:</option>
            <option value="0" @if($xActAlumnosSeg->satEst == 0) {{"SELECTED"}} @endif>No está satisfecho</option>
            <option value="1" @if($xActAlumnosSeg->satEst == 1) {{"SELECTED"}} @endif>Regular</option>
            <option value="2" @if($xActAlumnosSeg->satEst == 2) {{"SELECTED"}} @endif>Bueno</option>
            <option value="3" @if($xActAlumnosSeg->satEst == 3) {{"SELECTED"}} @endif>Muy bueno</option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ old('fecSeg') }}" class="form-control mb-2">
        <input type="text" name="estSeg" placeholder="Estado de seguimiento" value="{{ old('estSeg') }}" class="form-control mb-2">
        <button class="btn btn-primary" type="submit">Actualizar Seguimiento</button>
        
    </form>
@endsection