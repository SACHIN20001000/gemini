<template>
  <div class="card-footer pb-0 pt-3">
    <ul v-if="pager.pages && pager.pages.length" class="pagination">
        <li :class="{'disabled':pager.currentPage === 1}" class="page-item first-item">
            <a href="javascript:;" @click="pageChange(1)" class="page-link">First</a>
        </li>
        <li :class="{'disabled':pager.currentPage === 1}" class="page-item previous-item">
            <a href="javascript:;" @click="pageChange(pager.currentPage - 1)" class="page-link">Previous</a>
        </li>
        <li v-for="page in pager.pages" :key="page" :class="{'active':pager.currentPage === page}" class="page-item number-item">
            <a  href="javascript:;" @click="pageChange(page)" class="page-link">{{page}}</a>
        </li>
        <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item next-item">
            <a  href="javascript:;" @click="pageChange(pager.currentPage + 1)" class="page-link">Next</a>
        </li>
        <li :class="{'disabled':pager.currentPage === pager.totalPages}" class="page-item last-item">
            <a  href="javascript:;" @click="pageChange(pager.totalPages)" class="page-link">Last</a>
        </li>
    </ul>
  </div>
</template>
<script>
    export default {
        props: ['pager'],
        methods: {
            pageChange(currentItem) {
                this.$parent.pageChanges(currentItem);
            }
        }
    }
</script>
