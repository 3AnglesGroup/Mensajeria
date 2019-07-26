<template>
  <div class>
    <section class="content-header">
      <h1>Crear Envio</h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="/dashboard">
            <i class="fa fa-dashboard"></i>Dashboard
          </router-link>
        </li>
        <li>
          <router-link to="/paquete-index">
            <i class="fa fa-book"></i>Lista Envios
          </router-link>
        </li>
        <li class="active">
          <i class="fa fa-pencil"></i>Crear
        </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
        <form @submit.prevent="crearPaquete">
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
                      class="form-control"
                      required
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
                      v-model="form.tel"
                      placeholder="Ingresar Tel/Cel"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Tel / Cel - Alternativo</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.tel_alt"
                      placeholder="Ingresar Tel/Cel"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Ciudad</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.ciudad"
                      placeholder="Ingresar ciudad"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Dirección</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.direccion"
                      placeholder="Ingrese dirección"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Barrio</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.barrio"
                      placeholder="Ingrese barrio"
                    />
                  </div>

                  <!-- <div class="form-group col-md-6">
                  <label>Estado</label>
                  <select class="form-control"  v-model="form.tiempo" >
                    <option  value="">Seleccione...</option>
                    <option value="6" >6 Meses</option>
                    <option value="12" >1 Año</option>
                  </select>
                  </div>-->
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Observación</label>
                    <textarea v-model="form.observacion" class="form-control" rows="5" cols="80"></textarea>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-5">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detalle del producto</h3>
                </div>

                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Bodega origen</label>
                  <select
                    class="form-control"
                    @change="getProductos()"
                    v-model="form.bodega"
                    required
                  >
                    <option value>Seleccione...</option>
                    <option value="Cartagena">Cartagena</option>
                    <option value="Bogota">Bogota</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Medellin">Medellin</option>
                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Producto</label>
                  <select class="form-control" v-model="form.producto" required>
                    <option value>Seleccione...</option>
                    <option v-for="producto in productos" :key="producto.id" value>
                      {{producto.nombre}} -
                      <span>Disponible: {{producto.cantidad}}</span>
                    </option>
                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Cantidad</label>
                  <input
                    type="number"
                    min="0"
                    class="form-control"
                    v-model="form.cantidad"
                    onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"
                    placeholder="Ingrese barrio"
                  />
                </div>

                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Valor</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="form.valor"
                    onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"
                    placeholder="Ingrese valor a cobrar"
                  />
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Total</label>
                  <input
                    type="number"
                    disabled
                    class="form-control"
                    :value="form.cantidad * form.valor"
                  />
                </div>

                <!-- <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de salida</label>
                    <input type="date" required v-model="form.fecha_pago" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha programada de entrega:</label>
                    <input
                      type="date"
                      class="form-control"
                      v-model="form.fecha_inicio"
                      name="inicio"
                    />
                  </div>
                </div>-->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" :disabled="enviando">
                    <span v-if="enviando">Enviando...</span>
                    <span v-else>Crear</span>
                  </button>
                </div>
              </div>
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
  data() {
    return {
      enviando: false,
      productos: [],

      form: {
        nombre: "",
        tel: "",
        tel_alt: "",
        ciudad: "",
        direccion: "",
        barrio: "",
        observacion: "",
        bodega: "",
        producto: "",
        cantidad: "0",
        valor: ""
      }
    };
  },
  created() {},
  methods: {
    getProductos() {
      axios.get("/api/productos-bodega/" + this.form.bodega).then(res => {
        this.productos = res.data;
        console.log(res.data);
      });
    },
    crearPaquete() {
      this.enviando = "true";
      axios
        .post("/api/paquete", this.form)
        .then(res => {
          toastr.success("Se creó el paquete correctamente");

          this.form = {
            nombres: ""
          };

          this.enviando = false;
        })
        .catch(error => {
          this.enviando = false;
          toastr.error(
            "Error al subir el paquete, Intenta nuevamente o comunicate con Soporte"
          );
        });
    }
  }
};
</script>
