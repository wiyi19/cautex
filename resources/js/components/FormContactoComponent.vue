<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-6">
                    <label :for="nombre">Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="nombre"
                        :name="nombre"
                        v-model="nombre"
                        :disabled="disabledForm"
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
                        :disabled="disabledForm"
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
                        :disabled="disabledForm"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label :for="email">Email</label>
                    <input
                        type="text"
                        class="form-control"
                        :id="email"
                        :name="email"
                        v-model="email"
                        :disabled="disabledForm"
                    >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label :for="consulta">Escriba acá su consulta</label>
                    <textarea
                        class="form-control"
                        :id="consulta"
                        :name="consulta"
                        v-model="consulta"
                        :disabled="disabledForm"
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
                        :disabled="disabledForm"
                        >
                        <label class="custom-control-label" for="customCheck1">Acepto los términos y condiciones de privacidad</label>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end justify-content-end" v-if="accept_conditions == 1">
                    <button class="btn btn--outline-orange btn--style-custom" v-if="saving == 0" @click="recaptcha">Enviar</button>
                    <div class="btn-message" v-if="saving == 1"><i class="fas fa-spinner fa-pulse"></i> Enviando</div>
                    <div class="btn-message btn-message--success" v-if="saving == 2"><i class="fas fa-check"></i> Enviado con éxito</div>
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
                nombre: '',
                empresa: '',
                telefono: '',
                email: '',
                consulta: '',
                recaptcha_token: '',
                accept_conditions: 0,
                saving: 0,
                disabledForm: false
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
            async recaptcha() {
                this.saving = 1
                this.disabledForm = true
                try {
                    // (optional) Wait until recaptcha has been loaded.
                    await this.$recaptchaLoaded()

                    // Execute reCAPTCHA with action "login".
                    const token = await this.$recaptcha('login')
                    this.recaptcha_token = token
                } catch(e) {
                    this.saving = 0
                }
                this.postForm()
            },
            postForm() {
                console.log(this.recaptcha_token)
                var form = new FormData();
                form.append('nombre',          this.nombre);
                form.append('empresa',         this.empresa);
                form.append('telefono',        this.telefono);
                form.append('email',           this.email);
                form.append('consulta',        this.consulta);
                form.append('recaptcha_token', this.recaptcha_token);
                axios.post(this.urlAction, form).then((response) => {
                    this.saving = 2
                    setTimeout(function(){
                       // window.location.href = this.urlBack
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