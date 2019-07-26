<template>
  <div class>
    <section class="content-header">
      <h1>Crear Producto</h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="/dashboard">
            <i class="fa fa-dashboard"></i>Dashboard
          </router-link>
        </li>
        <li>
          <router-link to="/paquete-index">
            <i class="fa fa-book"></i>Mis Productos
          </router-link>
        </li>
        <li class="active">
          <i class="fa fa-pencil"></i>Crear
        </li>
      </ol>
    </section>

    <section class="content container-fluid">
      <section class="content">
        <form @submit.prevent="crearProducto">
          <div class="row">
            <div class="col-md-7">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del prodcuto</h3>
                </div>
                <div class="box-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Tipo</label>
                    <select class="form-control" v-model="form.tipo">
                      <option value>Seleccione...</option>
                      <option value="Salud">Salud</option>
                      <option value="Belleza">Belleza</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input
                      v-model="form.nombre"
                      class="form-control"
                      required
                      placeholder="Ingresar nombres"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Propietario</label>
                    <select class="form-control" v-model="form.propietario" required>
                      <option value>Seleccione...</option>
                      <option
                        v-for="cliente in clientes"
                        :key="cliente.id"
                        :value="cliente.id"
                      >{{cliente.razon_social}}</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Bodega</label>
                    <select class="form-control" v-model="form.bodega" required>
                      <option value>Seleccione...</option>
                      <option value="Cartagena">Cartagena</option>
                      <option value="Bogota">Bogota</option>
                      <option value="Barranquilla">Barranquilla</option>
                      <option value="Medellin">Medellin</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="form.cantidad"
                      onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');"
                      placeholder="Ingrese cantidad"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Detalles</label>
                    <input
                      v-model="form.detalle"
                      class="form-control"
                      required
                      placeholder="Ingresar detalle"
                    />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1">Ficha técnica del producto</label>
                    <textarea v-model="form.ficha" class="form-control" rows="5" cols="80"></textarea>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Acción</h3>
                </div>

                <!-- <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fecha de entrada</label>
                    <input type="date" required v-model="form.fecha_pago" class="form-control" />
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
          </div>
        </form>
      </section>
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
      clientes: [],
      form: {
        tipo: "",
        nombre: "",
        propietario: "",
        bodega: "",
        cantidad: "",
        detalle: "",
        ficha: "",
        fecha_entrada: ""
      }
    };
  },
  created() {
    this.getClientes();
  },
  methods: {
    getClientes() {
      axios.get("/api/clientes").then(res => {
        this.clientes = res.data.data;
        console.log(this.clientes.data);
      });
    },
    crearProducto() {
      this.enviando = "true";
      axios
        .post("/api/producto", this.form)
        .then(res => {
          toastr.success("Se creó  correctamente");
          this.form = {
            nombres: ""
          };

          this.enviando = false;
        })
        .catch(error => {
          this.enviando = false;
          toastr.error(
            "Error al subir el producto, Intenta nuevamente o comunicate con Soporte"
          );
        });
    }
  }
};
</script>
