<template class="flex flex-col">
  <h1 class="text-3xl text-center py-6">Products Page</h1>
  <div class="flex flex-row">
    <div class="basis-1/4 lg:basis-1/6">
      <ProductFilters :colors="colors" @filter="filter" />
    </div>
  
    <div class="basis-3/4 lg:basis-5/6 px-5 flex flex-row justify-center flex-wrap mt-10 pb-10">
      <ProductCard v-for="product in products" :product="product" :key="product.id"/>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import ProductCard from '@/components/ProductCard.vue'
import ProductFilters from '@/components/ProductFilters.vue'

export default {
  name: 'Products',
  data() {
    return {
      products: [],
      colors: []
    }
  },
  components: {
    ProductCard,
    ProductFilters
  },
  mounted() {
    this.getColorsData();
    this.getPoductsData();
  },
  methods: {
    filter(query){
      this.getPoductsData(query);
    },

    getPoductsData(query = '') {
      // we may extract http request to a service ....
      const url = process.env.VUE_APP_API_URL+'/products';
      axios.get(url+query).then(resp => {
        this.products = resp.data.data
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