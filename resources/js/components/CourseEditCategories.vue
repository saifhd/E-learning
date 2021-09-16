<template>
    <div>
        <div class="row mg-t-20">
            <div class="col-lg">
                <label for="">Category</label>
                <select class="form-control select2-show-search" name="category_id"
                data-placeholder="Choose one"  @change="getSubCategories" v-model="category_select">
                    <option  v-for="category in categories" :key="category.id"
                        :value="category.id">
                            {{ category.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="row mg-t-20">
            <div class="col-lg">
                <label for="">Sub Category</label>
                <select class="form-control " name="sub_category_id" v-model="sub_category_select">
                    <option  v-for="sub_category in sub_categories" :key="sub_category.id" :value="sub_category.id">
                        {{ sub_category.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'category_id',
        'sub_category_id'
    ],
    data(){
        return{

            categories:{},
            category_select:'',
            sub_categories:{},
            sub_category_select:''

        }
    },
    methods:{
        async getSubCategories(){

            const res=await axios.get('/manage/course-categories/'+this.category_select);
            this.sub_categories=res.data;
        }
    },
    async mounted(){

        // fetching categories
        const res=await axios.get('/manage/course-categories');
        this.categories=res.data;
        this.category_select=this.category_id;

        this.getSubCategories();
        this.sub_category_select=this.sub_category_id;

    },

}
</script>
