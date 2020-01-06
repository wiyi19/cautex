<template>
<div>
    <div class="row">
        <div class="col-md-2">
            <div class="presupuesto-title">
                <div :class="'presupuesto-title__image color--'+step1">
                    <img :src="publicPATH + '/img/website/presupuesto-step-1-'+step1+'.png'">
                </div>
                <hr :class="'color--'+step1">
            </div>
        </div>
        <div :class="'col-md-10 presupuesto-title__text color--'+step1">DATOS</div>
    </div>
    <div class="row">
        <div :class="'offset-md-2 col-md-10'">
            <div class="row">
                <div class="form-group col-md-6">
                    <label :for="nombre">Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="nombre"
                        :name="nombre"
                        v-model="nombre"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label :for="empresa">Empresa</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="empresa"
                        :name="empresa"
                        v-model="empresa"
                    >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label :for="telefono">Teléfono</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="telefono"
                        :name="telefono"
                        v-model="telefono"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label :for="direccion">Dirección</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="direccion"
                        :name="direccion"
                        v-model="direccion"
                    >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label :for="email">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="email"
                        :name="email"
                        v-model="email"
                    >
                </div>
                <div class="col-md-6 d-flex align-items-end justify-content-end mb-3" v-if="step == 1" @click="goStep2()">
                    <button class="btn btn--outline-orange btn--style-custom">Siguiente</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-if="step == 2">
        <div class="col-md-2">
            <div class="presupuesto-title">
                <div :class="'presupuesto-title__image color--'+step2">
                    <img :src="publicPATH + '/img/website/presupuesto-step-1-'+step2+'.png'">
                </div>
                <hr :class="'color--'+step2">
            </div>
        </div>
        <div :class="'col-md-10 presupuesto-title__text color--'+step2">CONSULTA</div>
    </div>
    <div class="row" v-if="step == 2">
        <div :class="'offset-md-2 col-md-10'">
            <div class="row">
                <div class="form-group col-md-12">
                    <label :for="consulta">Escriba acá su consulta</label>
                    <textarea
                        class="form-control"
                        :id="consulta"
                        :name="consulta"
                        v-model="consulta"
                        rows="5"
                    ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="custom-control custom-checkbox">
                        <input
                        type="checkbox"
                        v-bind:true-value="1"
                        v-bind:false-value="0"
                        v-model.number="accept_conditions"
                        class="custom-control-input"
                        id="customCheck1"
                        >
                        <label class="custom-control-label" for="customCheck1">Acepto los términos y condiciones de privacidad</label>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-end">
                        <button class="btn btn--outline-orange btn--style-custom">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    var publicPATH = document.head.querySelector('meta[name="public-path"]').content;
    export default {
        props: {
            urlData: '',
            urlBack: '',
            urlAction: '',
            formName: '',
        },
        components: {},
        data(){
            return{
                publicPATH: publicPATH,
                step: 1,
                step1: 'orange',
                step2: 'orange',
                nombre: '',
                empresa: '',
                telefono: '',
                direccion: '',
                email: '',
                consulta: '',
                accept_conditions: 0,
            }
        },
        created() {
            this.$nextTick(() => {});
        },
        updated: function () {
            this.$nextTick(function () {
            })
        },
        methods: {
            goStep2() {
                this.step1 = 'gray'
                this.step = 2
            },
            postForm() {
                this.loaded = 2
                var form = new FormData();
                if (this.content.imagenes.length) {
                    this.content.imagenes.forEach(function(file, index){
                        if (file && file instanceof File) {
                            form.append('imagenes['+index+']', file);
                        }
                        if (typeof file === 'string' || file instanceof String) {
                            form.append('imagenes['+index+']', file);
                        }
                        if (typeof file === 'object' || file instanceof Object) {
                            form.append('imagenes['+index+']', file.path);
                        }
                    })
                }
                if (this.content.imagen) {
                    if (this.content.imagen instanceof File) {
                        form.append('imagen', this.content.imagen);
                    }
                    if (this.content.imagen instanceof Object && this.content.imagen.remove) {
                        form.append('imagen', '--remove--');
                    }
                }
                // medidas
                if (this.content.medidas.length) {
                    this.content.medidas.forEach(function(presentacion, pindex){
                        form.append('medidas['+pindex+'][titulo]', presentacion.titulo);
                        if (presentacion.elementos.length) {
                            presentacion.elementos.forEach(function(medida, mindex){
                                form.append('medidas['+pindex+'][elementos]['+mindex+'][texto]', medida.texto);
                                if (medida.imagen && medida.imagen instanceof File) {
                                    form.append('medidas['+pindex+'][elementos]['+mindex+'][imagen]', medida.imagen);
                                }
                                if (typeof medida.imagen === 'string' || medida.imagen instanceof String) {
                                    form.append('medidas['+pindex+'][elementos]['+mindex+'][imagen]', medida.imagen);
                                }
                                if (typeof medida.imagen === 'object' || medida.imagen instanceof Object) {
                                    form.append('medidas['+pindex+'][elementos]['+mindex+'][imagen]', medida.imagen.path);
                                }
                            })
                        }
                    })
                }
                // end medidas
                form.append('orden',      this.content.orden);
                form.append('texto1',     this.content.texto1);
                form.append('texto2',     this.content.texto2);
                form.append('familia_id', this.content.familia_id);
                axios.post(this.urlAction, form).then((response) => {
                    this.loaded = 3
                    setTimeout(function(){
                        //this.loaded = 1
                       window.location.href = this.urlBack
                    }.bind(this), 1000)
                })
                //this.loaded = 1
            },
        }
  }
</script>
<style lang="scss" scoped>
$theme-gray: #575656;
$theme-orange: #F07D00;
.presupuesto-title {
    display: flex;
    justify-content: center;
    align-items: center;
    .presupuesto-title__image {
        border-radius: 100%;
        border: 4px solid $theme-gray;
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        &.color--orange {
            border: 4px solid $theme-orange;
        }
        img {
            max-width: 55px;
            max-height: 55px;
        }
    }
    hr {
        border-bottom: 4px solid $theme-gray;
        &.color--orange {
            border-bottom: 4px solid $theme-orange;
        }
        flex: 1;
    }
}
.presupuesto-title__text {
    display: flex;
    align-items: center;
    font-weight: 700;
    font-size: 25px;
    color: $theme-gray;
    &.color--orange {
        color: $theme-orange;
    }
}
</style>