<template>
  <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="clearfix" style="width: 100%;">
        <p style="height:70px; font-size: 20px; outline: none; border-color: #9ecaed; box-shadow: 0 0 30px #9ecaed; border-width: 100px;">
        Lista de usuarios Registrados
        <a class="btn btn-info" 
        style="height:70px; width:90px; float:right" 
        data-toggle="modal" 
        data-target="#crear">NUEVO +</a></p>
 
        </div>
        <div class="modal fade" id="crear">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Registro de Nuevo Usuario</h4>
                        <buton type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </buton>
                    </div>
                        <div class="modal-body">
                        <registro-component
                        @nuevo="agregarUsuario"
                        ></registro-component>
                        </div>
                </div>
            </div>
        </div>
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <usuarios-component 
                        v-for="(usuario, index) in usuario" 
                        :key="usuario.id" 
                        :usuario="usuario"
                        @update="updateUsuario(index, ...arguments)"
                        @borrar="borrarUsuario(index)"
                    ></usuarios-component>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</template>
<script>



    export default {
        data() {
            return{
                usuario: []
            }
        },
        mounted() {
            axios.get('/usuario').then((response)=>{
                this.usuario = response.data;
            });
        },
        methods: {
            agregarUsuario(usuario){
                this.usuario.push(usuario);
            },
            updateUsuario(index){
                this.usuario[index] = usuario
            },
            borrarUsuario(index){
                this.usuario.splice(index, 1)
            }          
        }
    }
</script>