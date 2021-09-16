

require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('course-categories', require('./components/CourseCategories.vue').default);
Vue.component('course-edit-categories', require('./components/CourseEditCategories.vue').default);
Vue.component('video-uploader', require('./components/VideoUploader.vue').default);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


const app = new Vue({
    el: '#app',
});
