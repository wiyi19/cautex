<template>
    <div>
        <label :for="id">{{ label }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" :for="id"><i class="fas fa-2x fa-images"></i></label>
            </div>
            <div class="input-group-prepend" v-if="getPreviewImage()">
                <div class="input-group-text px-4 remove-btn" @click="removeImage()"><i class="fas fa-2x fa-trash-alt mr-2"></i> Quitar</div>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" :id="id"  @change="onFileChange($event)">
                <label class="custom-file-label2" :for="id">
                    <img :src="getPreviewImage()" v-if="displayImage" style="max-height: 100%;">
                </label>
            </div>
        </div>
    </div>
</template>
<script>
    var publicPATH = document.head.querySelector('meta[name="public-path"]').content;
    export default {
        props: ['model', 'label'],
        components: {
        },
        data(){
            return{
                config: {},
                image: {},
                displayImage: true,
                id: ''
            }
        },
        created() {
        },
        mounted () {
            this.id = 'image-' + this._uid.toString() + Math.random().toString(36).substring(2)
            this.image = this.model
        },
        watch: {
            image: function(val, oldVal) {
                this.$emit('update:model', this.image || [])
            }
        },
        methods: {
            removeImage () {
                this.image      = {}
                this.image.url  = ''
                this.image.path = ''
                this.image.type = ''
                this.image.remove = true
            },
            onFileChange(e) {
                this.displayImage = false
                const file = e.target.files[0];
                this.image = file
                this.displayImage = true
            },
            getFileIcon(file) {
                // Este metodo deberia encargarse se sacar las preview de imagenes y pdf
                // Este metodo deberia ser global o una libreria independiente
                let icon = false
                let fileIcon = [
                    {
                        ext: [
                            'application/zip',
                            'application/x-zip-compressed'
                        ],
                        icon: publicPATH + '/images/icons/zip.svg'
                    },
                    {
                        ext: [
                            'application/pdf'
                        ],
                        icon: publicPATH + '/images/icons/pdf.svg'
                    },
                    {
                        ext: [
                            'text/csv',
                            'text/xml',
                            'text/plain'
                        ],
                        icon: publicPATH + '/images/icons/txt.svg'
                    },
                    {
                        ext: [
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel'
                        ],
                        icon: publicPATH + '/images/icons/xls.svg'
                    },
                    {
                        ext: [
                            'application/msword'
                        ],
                        icon: publicPATH + '/images/icons/doc.svg'
                    },
                ]
                fileIcon.forEach(item => {
                    if (item.ext.includes(file.type)) {
                        icon = item.icon
                    }
                });
                return icon
            },
            getPreviewImage() {
                let file = this.image
                if (!file.type) {
                    return ''
                }

                let icon = this.getFileIcon(file)
                if (icon) {
                    return icon
                }

                let imgExt = ['image/jpeg', 'image/png']
                if (imgExt.includes(file.type)) {
                    if (file && file instanceof File) {
                        return URL.createObjectURL(file)
                    }
                    if (typeof file === 'object' || file instanceof Object) {
                        return file.url
                    }
                }
                return publicPATH + '/images/icons/raw.svg'
                if (typeof file === 'string' || file instanceof String) {
                    return this.storage_path(file)
                }
            },
            deleteFileGallery(index) {
                this.content.gallery.splice(index, 1);
            }
        }
  }
</script>
<style lang="scss" scoped>
    .custom-file-label2 {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        line-height: 1.5;
        color: #444;
        background-color: #fff;
        border: 1px solid #cbc8d0;
        height: 100px;
        display: flex;
        justify-content: flex-start;
    }
    .custom-file-label2::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        padding: 0.375rem 0.75rem;
        line-height: 1.5;
        color: #444;
        background-color: #F9F8FC;
        border-left: inherit;
        content: "Seleccione Archivo" !important;
        height: auto !important;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .custom-file {
        height: 100px !important;
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
    }
    .remove-btn {
        cursor: pointer;
        user-select: none;
        &:hover {
            background-color: #f0f0f1;
        }
        &:active {
            background-color: #e0e0e0;
        }
    }
    label {
        font-size: 13px;
        color: #495057;
        font-weight: 800;
    }
</style>
