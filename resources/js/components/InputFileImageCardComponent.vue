<template>
    <div class="card x-100">
        <img :src="getPreviewImage()" class="card-img-top" alt="Imagen" v-if="displayImage">
        <div class="card-body">
            <div class="card-title">{{ label }}</div>
            <small class="card-text">{{ createImageName() }}</small>
            <input type="file" :id="id" class="d-none" @change="onFileChange($event)">
        </div>
        <div class="card-body card-buttons">
            <label class="btn btn-primary" :for="id">Seleccione</label>
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
                    return publicPATH + 'img/no-disponible.png'
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
            createImageName() {
                let file = this.image
                if (file && file instanceof File) {
                    return file.name
                }
                if (typeof file === 'string' || file instanceof String) {
                    return file.split('/').pop()
                }
                if (typeof file === 'object' || file instanceof Object) {
                    if(file.url) {
                        return file.url.split('/').pop()
                    }
                }
            },
            deleteFileGallery(index) {
                this.content.gallery.splice(index, 1);
            }
        }
  }
</script>
<style lang="scss" scoped>
    .card-buttons {
        padding: 0;
        display: flex;
        justify-content: flex-start;
        align-items: flex-end;
        .btn {
            flex: 1;
            border-top-right-radius: 0;
            border-top-left-radius: 0;
            margin: 0;
        }
    }
</style>