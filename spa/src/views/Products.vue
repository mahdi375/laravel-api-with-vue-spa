<template class="flex flex-col">
  <h1 class="text-3xl text-center py-6">Products Page</h1>
  <div class="flex flex-row">
    <div class="basis-1/4 lg:basis-1/6">
      <ProductFilters :colors="colors" @filter="filter" />
    </div>
  
    <div class="basis-3/4 lg:basis-5/6 px-5 ">
      <div class="flex flex-row justify-center flex-wrap mt-10 pb-10">
        <ProductCard v-for="product in products.data" :product="product" :key="product.id"/>
      </div>
      <div class="mb-10">
        <Pagination :data="products" class="flex flex-row space-x-4 justify-center" @pagination-change-page="changePage" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import ProductCard from '@/components/ProductCard.vue'
import ProductFilters from '@/components/ProductFilters.vue'
import Pagination from 'laravel-vue-pagination'

export default {
  name: 'Products',
  data() {
    return {
      products: {
        data: []
      },
      colors: [],
      filterQuery: '?',
      page: 1,
    }
  },
  components: {
    ProductCard,
    ProductFilters,
    Pagination
  },
  mounted() {
    this.getColorsData();
    this.getPoductsData();
  },
  methods: {
    filter(query){
      this.filterQuery = query;
      this.page = 1;
      this.getPoductsData();
    },

    changePage(page = 1) {
      this.page = page;
      this.getPoductsData();
    },

    getPoductsData() {
      // we may extract http request to a service ....
      const url = process.env.VUE_APP_API_URL+'/products'
      let fullUrl = `${url}${this.filterQuery}page=${this.page}`
      axios.get(fullUrl).then(resp => {
        this.products = resp.data
      })
    },

    getColorsData() {
      const url = process.env.VUE_APP_API_URL+'/products/colors';
      axios.get(url).then(resp => {
        this.colors = resp.data.data
      })
    }
  }
}

</script>