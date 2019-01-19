<template>
            <div class="card">
                <div class="card-body">
                    <form action="" v-on:submit.prevent="usuarioNuevo()">
                        <div class="form-group">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre"
                            v-model="nombre">
                            <label for="correo">Email</label>
                            <input type="text" class="form-control" name="correo"
                            v-model="correo">
                        </div>
                        <button type="submit" class="btn btn-info">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Registrar
                        </button>
                    </form>
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return{
                agregarEstado: false,
                nombre:'',
                correo:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            usuarioNuevo(){
                const params = {
                    nombre: this.nombre,
                    correo: this.correo
                };
                axios.post('/usuario', params)
                .then((response) =>{
                    const usuario = response.data;
                    this.$emit('nuevo',usuario);
                });
            }
        }
    }
</script>