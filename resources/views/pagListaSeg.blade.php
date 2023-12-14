@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Página Seguimiento </h1>
@endsection

@section ('seccion')

    @if(session('msj'))
        <div class="alert alert-succes alert-dismissible fade show" role="aler">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('idSeg')
            <div class="alert alert-danger">
                El id de seguimiento es requerido
            </div>
        @enderror

        @error('idEst')
            <div class="alert alert-danger">
                El id de estudiante es requerido
            </div>
        @endError

        @if($errors ->has('traAct'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong> trabajo actual </strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="aler" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="idSeg" placeholder="Id Seguimiento" value="{{ old('idSeg') }}" class="form-control mb-2">
        <input type="text" name="idEst" placeholder="Id Estudiante" value="{{ old('idEst') }}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Trabaja?</option>
            <option value="0">Sí</option>
            <option value="1">No</option>            
        </select>        
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Oficio actual...</option>
            @for($i=1; $i < 16; $i++)
                <option value="{{$i}}"> {{$i}}cp</option>
            @endfor 
        </select>        
        <select name="satEst" class="form-control mb-2">
            <option value="">Estado Seguimiento:</option>
            <option value="0">No está satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy bueno</option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ old('fecSeg') }}" class="form-control mb-2">
        <input type="text" name="estSeg" placeholder="Estado de seguimiento" value="{{ old('estSeg') }}" class="form-control mb-2">
        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de Seguimiento</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Código</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach($xAlumnosSeg as $item)          
            <tr>
                <th scope="row">{{ $item -> id }}</th>
                <td>{{ $item->idSeg }}</td>
                <td>
                    <a href="{{route('Seguimiento.xDetalleSeg', $item->id ) }}">
                        {{ $item->traAct }}, {{ $item->ofiAct }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('Seguimiento.xEliminarSeg', $item->id )}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('Seguimiento.xActualizarSeg', $item->id ) }}">
                        ...A
                    </a>
                </td>
            </tr>                   
            @endforeach
        </tbody>
    </table>

    
@endsection