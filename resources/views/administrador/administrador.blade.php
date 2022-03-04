@extends('master')
@section('titulo','Administración')
@section('contenido')
<div id="reservacion">
    <center><h1>Verificación de Reservaciones</h1></center>
    <br>
    <center><form class="navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-2 small" placeholder="Buscar por Reservación o RFC" aria-label="Search" aria-describedby="basic-addon2" v-model="buscar">
            </div>
          </form>
    </center>
    <br>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Sucursal</th>
            <th>RFC</th>
        </thead>
        <tbody>
            <tr v-for="reservacion in filtroReservacion">
                <td>@{{reservacion.fecha}}</td>
                <td>@{{reservacion.horario}}</td>
                <td>@{{reservacion.mesa.restaurante.nombre_restaurante}}</td>
                <td>@{{reservacion.rfc}}</td>
                <td>
                    <span class="btn btn-primary btn-xs" v-on:click="editReservacion(reservacion.id_reservacion)"><i class="fas fa-fw fa-pen"></i></span>
                </td>
            </tr>
        </tbody>
    </table>
<div class="modal fade" tabindex="-1" role="dialog" id="edit_Reservacion" style="background-color: black;">
        <div class="row" >
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br>
                
                <label>Fecha de reservación</label>
                <input type="date" class="form-control" v-model="fecha">
                <br>
                <label>Hora de reservación</label>
                <input type="time" placeholder="Nombre de la Tarifa" class="form-control" v-model="hora">
                <br>
                <label>Restaurantes</label>
                <select class="form-control" v-model="id_restaurante">
                    <option placeholder="Elija un restaurante" disabled=""></option>
                    <option v-for='r in restaurantes' v-bind:value="r.id_restaurante">@{{r.nombre_restaurante}}</option>
                </select>
                <br>
                <label>Ubicaciones</label>
                <select class="form-control" v-model="id_ubicacion">
                    <option placeholder="Elija una ubicación" disabled=""></option>
                    <option v-for='u in ubicaciones' v-bind:value="u.id_ubicacion">@{{u.descripcion}}</option>
                </select>
                <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" v-on:click="getMesas()">Buscar Mesas</button>
                </div>
                <label>Mesas</label>
                <select class="form-control" v-model="id_mesa">
                    <option placeholder="Elija una Mesa" disabled=""></option>
                    <option v-for='m in mesas' v-bind:value="m.id_mesa">@{{m.numero_mesa}}</option>
                </select>
                <br>
                <label>Factura</label>
                <select class="form-control" v-model="factura">
                    <option>SI</option>
                    <option>NO</option>
                </select>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" v-on:click="editarReservacion()">Guardar Cambios</button>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript" src="js/proyecto/adminreservaciones.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/vue-resource.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">