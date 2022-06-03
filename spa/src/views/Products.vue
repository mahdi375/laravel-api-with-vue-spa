<template class="flex flex-col">
  <h1 class="text-3xl text-center py-6">Products Page</h1>
  <div class="px-5 lg:px-20 flex flex-row justify-center flex-wrap mt-10 pb-10">
    <ProductCard v-for="product in products" :product="product" :key="product.id"/>
  </div>
</template>

<script>
import axios from 'axios';
import ProductCard from '@/components/ProductCard.vue'

export default {
  name: 'Products',
  data() {
    return {
      products: []
    }
  },
  components: {
    ProductCard
  },
  mounted() {
    // we may extract http request to a service ....
    const url = process.env.VUE_APP_API_URL+'/products';
    axios.get(url).then(resp => {
      this.products = resp.data.data;
    })
  }
}

</script>