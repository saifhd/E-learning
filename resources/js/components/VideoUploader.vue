<template>
    <form @submit.prevent="onSubmit">
        <fieldset>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" accept="video/*" ref="fileContainer" @change="onChangeFile">
                    <label class="custom-file-label" for="customFile" ref="fileLabel">{{ label }}</label>
                </div>
                <div class="my-3 progress">
                    <div v-if="queue_progress==0" class="progress-bar" role="progressbar" v-bind:style="{ width: progress + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div>Uploading</div>
                    </div>
                    <div v-else class="progress-bar" role="progressbar" v-bind:style="{ width: queue_progress + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div v-if="queue_progress==100">Completed</div>
                        <div v-else>Processing</div>
                    </div>
                </div>
                <div class="my-3 alert alert-primary" v-bind:class="{ 'd-none': null === result }" role="alert">
                    <a v-bind:href="result" target="_blank">{{ result }}</a>
                </div>
            </div>
            <div class="text-right">
                <button v-if="isShow && progress == 0" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </fieldset>
    </form>
</template>
<script>
import axios from 'axios';
import { uploadService } from '../Services';
export default {
    props:[
        'video_id',
        'section_id'
    ],
    data() {
        return {
            label: 'Choose File',
            file: null,
            progress: 0,
            result: null,
            interval:null,
            queue_progress:0,
            isShow:true
        };
    },
    methods: {
        onSubmit() {

            if (null === this.file) {
                alert('File Null.');
            } else {
                this.progress = 0;
                this.result = null;
                const uploader=uploadService.chunk(
                    '/manage/videos/upload/'+this.video_id,
                    this.file,
                    // onProgress
                    percent => {
                        this.progress = percent;
                    },
                    // onError
                    err => {
                        alert('Upload Error');
                        console.log(err);
                    },
                    // onSuccess
                    res => {
                            console.log(res.status=='200');
                            const { data } = res;
                            this.result = data.path;
                            console.log('success');
                            this.interval=setInterval(()=>{
                                axios.get('/manage/videos/show/'+this.video_id).then(res=>{
                                    console.log(res.data.percentage);
                                    this.queue_progress=res.data.percentage;
                                    if(res.data.percentage==100){
                                        clearInterval(this.interval)
                                        window.location='/manage/sections/'+this.section_id+'/videos?success=true'
                                    }
                                });
                            },3000)
                        }
                );


            }
        },
        onChangeFile() {
            const file = this.$refs.fileContainer.files;
            this.file = file.length > 0 ? file[0] : null;
            if (null !== this.file) {
                const type=file[0].type.split("/")
                if(type.includes('video')){
                    this.label = `${this.file.name}`;
                    this.isShow=true
                }
                else{
                    this.label = 'Choose File';
                    alert('Please Select Video File')
                    this.isShow=false
                }

            } else {

                this.label = 'Choose File';
            }
        }
    },
    created(){
        // alert(123);
        console.log(this.video_id)
    }
}
</script>

