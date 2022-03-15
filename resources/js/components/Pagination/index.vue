<template>
    <div class="card text-center m-3" v-if="categoryPag">
        <h3 class="card-header">Vue.js Pagination Tutorial & Example</h3>
        <div class="card-body">
            <div v-for="item in records"  :key="item.id">{{item.id}}. {{item.name}}</div>
        </div>
        <pagination
            :pager="pager"
        ></pagination>
    </div>
</template>
<style>
  @import './pagination.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import axios from 'axios'
import JwPagination from 'jw-vue-pagination'
import pagination from './pagination'
const paginate = require('jw-paginate')

export default {
    components: {
      'jw-pagination': JwPagination,
      pagination
    },
    data() {
        return {
          pageOfItems: [],
          totalPage:0,
          records:[],
          pager:[],
          current_page:0,
          per_page:0
        }
    },
    created(){
      var params = {}
      this.getPaginationCategory({id:6,page:1})
    },
    watch:{
      categoryPag(){
        this.totalPage = this.categoryPag.meta.total
        this.current_page = this.categoryPag.meta.current_page
        this.per_page = this.categoryPag.meta.per_page
        this.records = this.categoryPag.data
        this.pager = paginate(this.totalPage,this.current_page,this.per_page)
      }
    },
    computed: {
      ...mapGetters(['categoryPag'])
    },
    methods: {
      ...mapActions(['getPaginationCategory']),
      pageChanges(currentItem) {
        if(currentItem>0){
          this.pager = paginate(this.totalPage,currentItem,this.per_page)
          this.getPaginationCategory({id:6,page:currentItem})
        }
      }
    }
}
</script>
