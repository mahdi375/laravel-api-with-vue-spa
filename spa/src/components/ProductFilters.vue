<template >
    <div class="flex flex-col bg-gray-200 h-fit rounded-3xl py-5 ml-4 ">
        <h1 class="text-center text-3xl">Filters</h1>
        <hr class="w-3/4 m-auto">
        <form action="#" id="filter_form" class="space-y-6" @submit.prevent="filter">
            <!-- Name  -->
            <div class="flex flex-col">
                <h3 class="px-4 mb-5 text-xl">Name</h3>
                <div class="text-center">
                    <input
                        class="mx-2 lg:w-3/4 m-auto rounded p-1"
                        type="text"
                        name="name"
                        id="filter_name"
                        v-model="name"
                    >
                </div>
            </div>
            <hr class="w-3/4 m-auto">
            <!-- Price  -->
            <div class="flex flex-col space-y-2">
                <h3 class="px-4 mb-5 text-xl">Price</h3>
                <div class="flex flex-row justify-around">
                    <label for="filter_min_price">Min</label>
                    <input
                        class="w-16"
                        type="number"
                        name="min_price"
                        id="filter_min_price"
                        v-model="min_price"
                    >
                </div>
                <div class="flex flex-row justify-around">
                    <label for="filter_max_price">Max</label>
                    <input
                        class="w-16"
                        type="number"
                        name="max_price"
                        id="filter_max_price"
                        v-model="max_price"
                    >
                </div>
            </div>
            <hr class="w-3/4 m-auto">
            <!-- Colors  -->
            <div class="flex flex-col">
                <h3 class="px-4 mb-5 text-xl">Colors</h3>
                <div id="colors" class="flex flex-wrap mb-6 justify-around px-3">
                    <div v-for="color in colors" :key="color.id" class="w-20 ">
                        <label class="inline-flex items-center">
                            <input 
                                name="color_{{color.attributes.name}}"
                                type="checkbox"
                                :style="{accentColor: color.attributes.hex}"
                                class="form-checkbox text-indigo-600" 
                                v-model="selectedColors[color.attributes.name]"
                                unchecked
                            >
                            <span class="ml-2">{{ color.attributes.name }}</span>
                        </label>
                    </div>
                </div>
            </div>
            <hr class="w-3/4 m-auto">
            <div class="text-center">
                <button
                    class="text-white text-lg font-medium bg-blue-600 hover:bg-blue-700 px-5 py-1 rounded-full"
                    type="submit"
                >Filter</button>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    name: "ProductFilters",
    props: ['colors'],
    data() {
        return {
            name: '',
            min_price: '',
            max_price: '',
            selectedColors: {}
        }
    },

    methods: {
        filter() {
            let colors = this.getSelectedcolors()
            let query = '?';

            query += this.param('name', this.name.trim());
            query += this.param('min_price', this.min_price);
            query += this.param('max_price', this.max_price);
            query += this.param('colors', colors);

            this.$emit('filter', query);
        },

        getSelectedcolors() {
            let result = '';
            this.colors.forEach(color => {
                if(this.selectedColors[color.attributes.name]) {
                    result += `${color.attributes.name},`
                }
            });

            return result
        },

        param(name, value) {
            return value ? `${name}=${value}&` : '';
        }
    }
}

</script>