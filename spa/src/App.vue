<template>
<div class="flex flex-col">
  <div class="h-10 bg-gray-200 space-x-5 pt-2 pl-10" id="nav">
    <router-link class="hover:text-red-600" to="/">Home</router-link>
    <router-link class="hover:text-red-600" to="/products">Products</router-link>
  </div>
  <router-view />
</div>
</template>

<script>

export default {
  name: 'App',
  components: {
  }
}
</script>