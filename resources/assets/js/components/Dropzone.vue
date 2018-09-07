<template>
    <div>
        <vue-dropzone style="height: auto" ref="dropzone" @vdropzone-removed-file="removeFile"
                      @vdropzone-success="afterFileUploadSuccess"
                      @vdropzone-complete="afterUploadAllFiles" @vdropzone-processing="onUploadProgress" id="drop1"
                      :options="dropOptions"></vue-dropzone>
    </div>
</template>

<script>
    export default {
        name: "dropzone",
        props: ['images_data'],
        http: {
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        },
        data() {
            return {
                dropOptions: {
                    url: '/en/image/upload',
                    maxFilesize: 20, // MB
                    maxFiles: 8,
                    dictDefaultMessage: 'إسحب الصور .. أو إضغط هنا للرفع',
                    paramName: 'image',
                    thumbnailHeight: 150,
                    thumbnailWidth: 150,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    headers: {'X-CSRF-TOKEN': Laravel.csrfToken}
                },
                image: {},
                images: [],
                is_all_images_uploaded: false
            }
        },
        updated() {
            window.is_all_images_uploaded = this.is_all_images_uploaded;
            window.images = this.images;
        },
        mounted() {
            var _this = this;
            this.images_data.forEach(function (obj, index) {
                var image = {
                    id: obj.id,
                    display_name: obj.display_name,
                    file_name: obj.file_name,
                    size: obj.size,
                    mime_type: obj.mime_type
                };
                _this.images.push(image);
                let mockFile = {name: obj.display_name, size: obj.size ,type : obj.mime_type};
                console.log(mockFile);
                _this.$refs.dropzone.manuallyAddFile(mockFile, '/ar/image/100x100/' + image.file_name);
            });
            window.images = this.images;
        },
        methods: {
            removeAllFiles() {
                this.$refs.dropzone.removeAllFiles();
                window.is_all_images_uploaded = this.is_all_images_uploaded;
            },
            onUploadProgress() {
                this.is_all_images_uploaded = false;
                window.is_all_images_uploaded = this.is_all_images_uploaded;
                window.images = this.images;
            },
            afterFileUploadSuccess(file, response) {
                this.images.push({
                    id: response.id,
                    display_name:  file.name,
                    file_name: response.file_name,
                    size: file.size,
                    mime_type: window.mime.extension(file.type)
                });
                console.log(this.images);
                window.is_all_images_uploaded = this.is_all_images_uploaded;
                window.images = this.images;
            },
            afterUploadAllFiles(file) {
                if (this.$refs.dropzone.getUploadingFiles().length === 0 && this.$refs.dropzone.getQueuedFiles().length === 0) {
                    this.is_all_images_uploaded = true;
                }
                window.is_all_images_uploaded = this.is_all_images_uploaded;
                window.images = this.images;
            },
            removeFile(file) {
                var _this = this;
                console.log( this.images);
                this.images.forEach(function (obj, index) {
                    if((obj.display_name === file.name) && (obj.size === file.size)){
                        _this.images.splice(index ,1)
                    }
                });
                console.log( this.images);

            }
        }
    }
</script>

<style scoped>
    .dropzone {
        border-radius: 10px;
    }
    /*.dz-default .dz-message{*/
        /*font-family: Cairo,serif !important;*/
    /*}*/
</style>