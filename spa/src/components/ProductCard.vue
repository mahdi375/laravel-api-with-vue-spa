<template >
  <div class="border-2 w-56 m-2 mt-3 bg-white rounded-lg overflow-hidden hover:scale-105 hover:cursor-pointer">
        <div class="w-full h-40 bg-teal-400 flex flex-col justify-end">
            <div class="text-lg justify-items-end text-center text-gray-800">{{ product.attributes.name }}</div>
        </div>
        <div class="truncate text-sm p-1">{{ product.attributes.description }}</div>
        <div class="flex flex-row p-2 scroll-smooth overflow-scroll space-x-2">
            <div v-for="price in product.relationships.prices" :key="price.id" class="flex flex-col ">
                <div class="w-full h-2 rounded-full border-gray-500 border" :style="{'backgroundColor': price.attributes.color.hex}"></div>
                <div class="text-sm">{{price.attributes.price}}</div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  name: 'ProductCard',
  props:['product']
}

</script>