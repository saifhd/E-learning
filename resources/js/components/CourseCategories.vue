<template>
    <div>
        <div class="row mg-t-20">
            <div class="col-lg">
                <label for="">Category</label>
                <select class="form-control select2-show-search" name="category_id"
                data-placeholder="Choose one"  @change="getSubCategories" v-model="selected">
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
                <select class="form-control select2-show-search" name="sub_category_id" data-placeholder="Choose one">
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
    data(){
        return{
            categories:{},
            selected:null,
            sub_categories:{}
        }
    },
    methods:{
        async getSubCategories(){

            const res=await axios.get('/manage/course-categories/'+this.selected);
            this.sub_categories=res.data
        }
    },
    async mounted(){
        const res=await axios.get('/manage/course-categories');
        this.categories=res.data
    }
}
</script>
