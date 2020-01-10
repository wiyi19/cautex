<template>
<div class="row">
    <div class="col s12">
        <div class="row justify-content-center" v-if="loaded == 0">
            <h3><center><i class="fas fa-sync fa-spin"></i><br>Cargando</center></h3>
        </div>
        <div class="row justify-content-center" v-if="loaded == 2">
            <h3><center><i class="fas fa-sync fa-spin"></i><br>Guardando</center></h3>
        </div>
        <div class="row justify-content-center" v-if="loaded == 3">
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Mensaje</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Se ha guardado el <strong>Contenido</strong> con éxito
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="loaded == 1">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ formName }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label :for="'texto1'">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :id="'texto1'"
                                    :name="'texto1'"
                                    v-model="content.texto1"
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label :for="'texto2'">Descripción</label>
                                <vue-ckeditor 
                                  v-model="content.texto2" 
                                  :config="ckconfig" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="familia_id">Familia</label>
                                <select
                                    class="form-control"
                                    id="familia_id"
                                    name="familia_id"
                                    v-model="content.familia_id"
                                >
                                    <template v-for="familia in familias">
                                        <option :value="familia.id">{{ familia.text }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <custom-gallery label="Fotos del Producto" :model.sync="content.imagenes" class="mt-3"></custom-gallery>
                        <input-file-image label="Imagen con medidas" :model.sync="content.medidas_img" class="mt-3"></input-file-image>
                        <fieldset>
                            <legend>Medidas</legend>
                            <fieldset v-for="(presentacion, index) in content.medidas" class="pb-5">
                                <button @click="removePresentacion(index)" class="btn btn-danger btn-delete-item"><i class="fas fa-trash"></i></button>
                                <legend>{{ presentacion.titulo }}</legend>
                                Presentación: <input type="text" v-model="presentacion.titulo" name="" class="form-group">
                                <div class="row mx-1">
                                    <fieldset class="col-md-4" v-for="(medida, index) in presentacion.elementos">
                                        <legend>{{ medida.texto }}</legend>
                                        Medida: <input type="text" v-model="medida.texto" name="" class="form-group">
                                        <input-file-image-card label="Imagen de la medida (200px X 200px)" :model.sync="medida.imagen"></input-file-image-card>
                                    </fieldset>
                                </div>
                                <button @click="addMedida(index)" class="btn btn-primary btn-add-medida"><i class="fas fa-plus"></i> Añadir Medida</button>

                            </fieldset>
                            <button @click="addPresentacion()" class="btn btn-primary mt-2"><i class="fas fa-plus"></i> Añadir Presentación</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="loaded == 1">
            <div class="col-xl-12 col-lg-12 d-sm-flex align-items-center justify-content-between">
                <a :href="urlBack" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-step-backward fa-sm text-white-50"></i>
                    Volver Atras
                </a>

                <button type="button" @click="postForm()" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm">
                    <i class="fas fa-save fa-sm text-white-50"></i>
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import CustomGallery from '../hard/CustomGalleryComponent';
    import InputFileImage from '../hard/InputFileImageComponent';
    import InputFileImageCard from './InputFileImageCardComponent';
    import fichas from '../hard/FichaComponent'
    import VueCkeditor from 'vue-ckeditor2';

    var publicPATH = document.head.querySelector('meta[name="public-path"]').content;
    export default {
        props: {
            urlData: '',
            urlBack: '',
            urlAction: '',
            formName: '',
        },
        components: {
            'custom-gallery': CustomGallery,
            'input-file-image': InputFileImage,
            'input-file-image-card': InputFileImageCard,
            fichas,
            VueCkeditor
        },
        data(){
            return{
                config: {},
                ckconfig: {
                    toolbar: [
                        { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                        { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                        '/',
                        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                        { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                        '/',
                        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                        { name: 'about', items: [ 'About' ] }
                    ],
                    height: 300
                },
                content: {
                    lang: [],
                    orden: '',
                    texto1: '',
                    texto2: '',
                    imagen: '',
                    medidas_img: '',
                    imagenes: [],
                    medidas: [],
                    familia_id: '',
                },
                familias: [],
                formData: new FormData(),
                languages: {},
                defaultLang: '',
                loaded: 0,
                publicPATH: publicPATH
            }
        },
        created() {
            this.$nextTick(() => {
                axios.get(this.urlData).then((response) => {
                    this.config      = response.data.config
                    this.languages   = response.data.languages
                    this.defaultLang = Object.keys(this.languages)[0]
                    //console.log(response.data.content);
                    if (response.data.content != null) {
                        this.content = response.data.content
                    }
                    this.familias        = response.data.familias
                    this.content.lang = Object.keys(response.data.languages)
                    this.loaded       = 1
                });
            });
        },
        mounted: function () {
        },
        methods: {
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
                if (this.content.medidas_img) {
                    if (this.content.medidas_img instanceof File) {
                        form.append('medidas_img', this.content.medidas_img);
                    }
                    if (this.content.medidas_img instanceof Object && this.content.medidas_img.remove) {
                        form.append('medidas_img', '--remove--');
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
            addPresentacion() {
                this.content.medidas.push({
                    titulo: '',
                    elementos: []
                })
            },
            removePresentacion(index) {
                this.content.medidas.splice(index, 1)
            },
            addMedida(index) {
               this.content.medidas[index].elementos.push({texto:'', imagen:''})
            }
        }
  }
</script>
<style lang="scss" scoped>
    fieldset{
        position: relative;
    }
    .btn-delete-item {
        position: absolute;
        right: 0;
        top: 0;
        border-radius: 0;
    }
    .btn-add-medida {
        position: absolute;
        bottom: 0;
        right: 0;
        border-radius: 0;
    }
    .gallery-item {
        position: relative;
        width: 100%;
        margin-bottom: 5px;
    }
    .gallery-item-controls {
        position: absolute;
        right: 0;
        top: 0;
    }
    .gallery-item-container{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px;
        border: solid 1px #CCC;
        img {
            max-width: 100%;
            max-height: 100%;
        }
    }
    .gallery-item-overlay {
        padding-bottom: 100%;
    }
    .draggable-item {
        cursor: move;
        overflow: hidden;
        &:hover .gallery-item-path {
            bottom: 0;
            margin-top: 0;
        }
    }
</style>