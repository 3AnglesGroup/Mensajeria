<template>
  <div class>
    <section class="content-header">
      <h1>Detalle del Paquete</h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="/dashboard">
            <i class="fa fa-dashboard"></i>Dashboard
          </router-link>
        </li>
        <li>
          <router-link to="/paquete-index">
            <i class="fa fa-book"></i>Mis Paquetes
          </router-link>
        </li>
        <li class="active">
          <i class="fa fa-pencil"></i>Editar
        </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
        <form @submit.prevent="editarPaquete">
          <div class="row">
            <!-- left column -->
            <div class="col-md-7">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos de quien recibe</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input
                      v-model="form.nombre"
                      :disabled="!editar"
                      class="form-control"
                      placeholder="Ingresar nombres"
                    />
                  </div>

                  <!-- <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Cedula</label>
                  <input v-model="form.cedula" type="text" class="form-control" onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"    placeholder="Ingrese cedula,">
                  </div>-->

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Télefono - Celular</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.telefono"
                      placeholder="Ingresar nombres"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Télefono - Celular /Alternativo</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.telefono_alternativo"
                      placeholder="Ingresar nombres"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Ciudad</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.ciudad"
                      placeholder="Ingresar ciudad"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Dirección</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.direccion"
                      placeholder="Ingrese dirección"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Barrio</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.barrio"
                      placeholder="Ingrese barrio"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Articulo</label>
                    <input
                      type="text"
                      class="form-control"
                      :disabled="!editar"
                      v-model="form.producto"
                      placeholder="Ingrese producto"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <input
                      type="text"
                      class="form-control"
                      disabled
                      v-model="form.cantidad"
                      placeholder="Ingrese producto"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Valor</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="form.total"
                      onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"
                      :disabled="!editar"
                      placeholder="Ingrese barrio"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label>Estado</label>
                    <select :disabled="!editar" v-model="form.estado" class="form-control">
                      <option>{{form.estado}}</option>
                      <option value="VERIFICACION">VERIFICACIÓN</option>
                      <option value="PROGRAMADO">PROGRAMADO</option>
                      <option value="REPARTO">REPARTO</option>
                      <option value="ENTREGADO">ENTREGADO</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Observación</label>
                    <textarea
                      :disabled="!editar"
                      v-model="form.observacion"
                      class="form-control"
                      rows="5"
                      cols="80"
                    ></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <button v-if="editar" type="submit" class="btn btn-primary">
                      <span v-if="editar">Actualizar</span>
                      <span v-else>Editar</span>
                    </button>

                    <button type="submit" class="btn btn-primary" v-if="!editar" :disabled="editar">
                      <span v-if="!editar" @click="edit()">Editar</span>
                    </button>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-5">
              <!-- Horizontal Form -->
              <!-- Main content -->
              <section class="content">
                <!-- row -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">HISTORIAL</span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i> 12:05
                          </span>

                          <h3 class="timeline-header">
                            <a href="#">Asunto</a>
                          </h3>

                          <div class="timeline-body">DESCRIPCION...</div>
                        </div>
                      </li>
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i> 12:05
                          </span>

                          <h3 class="timeline-header">
                            <a href="#">Asunto</a>
                          </h3>

                          <div class="timeline-body">DESCRIPCION...</div>
                        </div>
                      </li>
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i> 12:05
                          </span>

                          <h3 class="timeline-header">
                            <a href="#">Asunto</a>
                          </h3>

                          <div class="timeline-body">DESCRIPCION...</div>
                        </div>
                      </li>

                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </section>
              <!-- /.content -->
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
        </form>
      </section>
      <!-- /.content -->
    </section>
  </div>
</template>

<script>
import toastr from "toastr";
toastr.options = {
  closeButton: true,
  timeOut: "10000"
  // "progressBar": true,
};
export default {
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.getPaquete();
  },
  data() {
    return {
      editar: false,
      form: {},
      url: this.$route.params.id
    };
  },
  computed: {},
  methods: {
    getPaquete() {
      axios.get("/api/paquete/" + this.$route.params.id).then(res => {
        this.form = res.data;
      });
    },
    edit() {
      this.editar = true;
    },
    editarPaquete() {}
  }
};
</script>
