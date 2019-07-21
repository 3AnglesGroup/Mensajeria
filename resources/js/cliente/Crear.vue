<template>
<div class="">
    <section class="content-header">
      <h1>
        Crear Cliente
      </h1>
      <ol class="breadcrumb">
        <li>
          <router-link to="/dashboard">
            <i class="fa fa-dashboard" ></i>Dashboard
          </router-link>
        </li>
        <li>
        <router-link to="/paquete-index">
          <i class="fa fa-book" ></i>Clientes
        </router-link>
        </li>
        <li class="active" ><i class="fa fa-pencil"></i>Crear</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Main content -->
      <section class="content">
    <form @submit.prevent="crearCliente">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de la Empresa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Tipo</label>
                  <select name="" id="" class="form-control" v-model="form.tipo">
                      <option >Seleccione...</option>
                      <option value="Empresa">Empresa</option>
                      <option value="Persona Natural">Persona Natural</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input  v-model="form.nombre_empresa"  class="form-control"  required  placeholder="Ingresar nombre">
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Cedula o Nit</label>
                  <input v-model="form.cedula" type="number" required class="form-control" onkeyup="javascript:this.value = this.value.replace(/[.,,]/,'');">
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Ciudad</label>
                  <input type="text" class="form-control" v-model="form.ciudad" required   placeholder="Ingresar ciudad">
                </div>
                 
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Dirección</label>
                  <input type="text" class="form-control" v-model="form.direccion"   placeholder="Ingrese dirección">
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Correo</label>
                  <input type="mail" class="form-control" v-model="form.correo"   placeholder="Ingrese correo de la empresa">
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Télefono/Celular</label>
                  <input type="text" class="form-control" v-model="form.telefono"   placeholder="Ingrese correo de la empresa">
                </div>
               
                
                <!-- <div class="form-group col-md-6">
                  <label>Estado</label>
                  <select class="form-control"  v-model="form.tiempo" >
                    <option  value="">Seleccione...</option>
                    <option value="6" >6 Meses</option>
                    <option value="12" >1 Año</option>
                  </select>
                </div> -->
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Descripción o actividad que realiza</label>
                  <textarea v-model="form.actividad" class="form-control" rows="5" cols="80"></textarea>
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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos representante legal</h3>
            </div>

              <div class="box-body">
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" v-model="form.representante" placeholder="Ingresar nombre">
                </div>
               
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Télefono - Celular</label>
                  <input type="text" class="form-control" v-model="form.tel_representante" placeholder="Ingresar nombres">
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Coreo</label>
                  <input type="mail" class="form-control" v-model="form.correo_representante" placeholder="Ingresar correo">
                </div>
                <div class="form-group col-md-12">
                  <hr>
                </div>

                

                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Usuario</label>
                  <input type="mail" class="form-control" v-model="form.usuario" required  placeholder="Ingrese usuario">
                </div>
                 <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Contraseña</label>
                  <input type="text" class="form-control" v-model="form.pass" required   placeholder="Ingrese contraseña">
                </div>
               
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" :disabled="enviando" >
                  <span v-if="enviando">Enviando...</span>
                  <span v-else>Crear</span>
                </button>
              </div>
          </div>
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
import toastr from 'toastr'
toastr.options ={
  "closeButton": true,
  "timeOut": "10000",
  // "progressBar": true,
};
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return{
            enviando:false,
            form:{
              tipo:'Seleccione...',
              nombre_empresa:'',
              telefono:'',
              ciudad:'',
              direccion:'',
              correo:'',
              actividad:'',
              cedula:'',
              representante:'',
              tel_representante:'',
              correo_representante:'',
              usuario:'',
              pass:'',

              
            }
          }
        },
        computed:{

        },
        methods:{
          crearCliente(){
            this.enviando='true';
            axios.post('/api/cliente/',this.form).then(res =>{
              
                toastr.success('Se creó el paquete correctamente');
                console.log(res.data);
                
              this.form = {
                nombres:'',
                
              }

                this.enviando = false;
            })
            .catch(error =>{
              this.enviando = false;
              toastr.error('Error al subir el paquete, Intenta nuevamente o comunicate con Soporte');
            });
          }
        }
    }
</script>
