<template>
  <div class>
    <section class="content-header">
      <h1>
        Listado
        <small>Paquetes</small>
        <br />
        <br />
        <button
          type="button"
          v-on:click="getTitular(3)"
          class="btn btn-primary btn-sm"
          name="button"
        >EN TRANCITO</button>
        <button
          type="button"
          v-on:click="getTitular(3)"
          class="btn btn-primary btn-sm"
          name="button"
        >PROGRAMADOS</button>
        <button
          type="button"
          v-on:click="getTitular(2)"
          class="btn btn-primary btn-sm"
          name="button"
        >ENTREGADOS</button>
        <button
          type="button"
          v-on:click="getTitular(1)"
          class="btn btn-primary btn-sm"
          name="button"
        >CANCELADOS</button>
        <button
          type="button"
          v-on:click="getTitular(1)"
          class="btn btn-primary btn-sm"
          name="button"
        >RE-PROGRAMADOS</button>
        <button
          type="button"
          v-on:click="getTitular(1)"
          class="btn btn-primary btn-sm"
          name="button"
        >EN BODEGA</button>
      </h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="#">
            <i class="fa fa-dashboard"></i> Dashboard
          </router-link>
        </li>
        <li class="active">
          <i class="fa fa-book"></i>Index
        </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Listado de Titulares</h3>
          <br />
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable-titulares" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ESTADO</th>
                <th>NOMBRE</th>
                <th>TELÉFONO</th>
                <th>CIUDAD</th>
                <th>ARTICULO</th>
                <th>VALOR</th>
                <th>ACCION</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
</template>
<script>
import datatable from "datatables";
export default {
  created() {
    $(document).ready(function() {
      $("#datatable-titulares").DataTable({
        serverSide: true,
        ajax: "/api/paquetes",
        columns: [
          { data: "estado" },
          { data: "nombre" },
          { data: "telefono" },
          { data: "ciudad" },
          { data: "articulo" },
          { data: "valor" },
          { data: "btn" }
        ],
        language: {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
    });
  }
};
</script>
