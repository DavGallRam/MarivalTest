<template>
    <tr>
        <td>{{usuario.id}}</td>
        <td v-if="editEstado"><input type="text" class="form-control" v-model="usuario.nombre"></td>
        <td v-else>{{usuario.nombre}}</td>
        <td v-if="editEstado"><input type="text" class="form-control" v-model="usuario.correo"></td>
        <td v-else>{{usuario.correo}}</td>
        <td><button v-if="editEstado" style="border-radius: 24px" type="submit" class="btn btn-info" v-on:click="onClickUpdate()">
                Guardar Cambios
            </button>           
        <button v-else type="submit" style="border-radius: 24px" class="btn btn-info" v-on:click="onClickEditar()">
            Editar
        </button>                    
        <button type="submit" style="border-radius: 24px;" class="btn btn-danger" v-on:click="onClickBorrar()">
            Eliminar
        </button></td>
    </tr>
</template>


<script>
    export default {
        props: ['usuario'],
        data(){
            return{
                editEstado: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickBorrar(){
                axios.delete('/usuario/'+this.usuario.id).then(()=>{
                this.$emit('borrar');
                });            
            },
            onClickEditar(){
                this.editEstado = true;
            },        
            onClickUpdate(){
                const params = {
                    nombre: this.usuario.nombre,
                    correo: this.usuario.correo
                };
                axios.put('/usuario/'+this.usuario.id, params).then((response)=>{
                this.editEstado = false;
                const usuario = response.data;
                this.$emit('update',usuario);
                });
            }
        }
    }
</script>
