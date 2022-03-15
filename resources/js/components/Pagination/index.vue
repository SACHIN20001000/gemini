<template>
    <div class="card text-center m-3" v-if="categoryPag">
        <h3 class="card-header">Vue.js Pagination Tutorial & Example</h3>
        <div class="card-body">
            <div v-for="item in records"  :key="item.id">{{item.id}}. {{item.name}}</div>
        </div>
        <div class="card-footer pb-0 pt-3">
          <ul v-if="pager.pages && pager.pages.length" class="pagination">
              <li :class="{'disabled':pager.currentPage === 1}" class="page-item first-item">
                  <a href="javascript:;" @click="pageChanges(1)" class="page-link">First</a>
              </li>
              <li :class="{'disabled':pager.currentPage === 1}" class="page-item previous-item">
                  <a href="javascript:;" @click="pageChanges(pager.currentPage - 1)" class="page-link">Previous</a>
              </li>
              <li v-for="page in pager.pages" :key="page" :class="{'active':pager.currentPage === page}" class="page-item number-item">
                  <a  href="javascript:;" @click="pageChanges(page)" class="page-link">{{page}}</a>
              </li>
              <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item next-item">
                  <a  href="javascript:;" @click="pageChanges(pager.currentPage + 1)" class="page-link">Next</a>
              </li>
              <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item last-item">
                  <a  href="javascript:;" @click="pageChanges(pager.totalPages)" class="page-link">Last</a>
              </li>
          </ul>
        </div>
    </div>
</template>
<style>
  @import './pagination.css';
</style>
<script>
import {mapActions,mapGetters} from "vuex"
import axios from 'axios'
import JwPagination from 'jw-vue-pagination'
const paginate = require('jw-paginate')

export default {
    components: {
        'jw-pagination': JwPagination
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
