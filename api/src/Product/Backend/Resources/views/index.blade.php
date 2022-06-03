<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col">
        {{-- Header --}}
        <div class="text-4xl text-center py-5">Products Page For Admin</div>

        {{-- Content --}}
        <div class="flex flex-row">
            {{-- Left --}}
            <div class="basis-1/4 lg:basis-1/6 flex flex-col bg-gray-200 h-fit rounded-3xl py-5 ml-4 ">
                <h1 class="text-center text-3xl">Filters</h1>
                <hr class="w-3/4 m-auto">
                <form action="#" id="filter_form" class="space-y-6">
                    {{-- Name --}}
                    <div class="flex flex-col">
                        <h3 class="px-4 mb-5 text-xl">Name</h3>
                        <div class="text-center">
                            <input class="mx-2 lg:w-3/4 m-auto rounded p-1" type="text" name="name" id="filter_name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <hr class="w-3/4 m-auto">
                    {{-- Price --}}
                    <div class="flex flex-col space-y-2">
                        <h3 class="px-4 mb-5 text-xl">Price</h3>
                        <div class="flex flex-row justify-around">
                            <label for="filter_min_price">Min</label>
                            <input class="w-16" type="number" name="min_price" value="{{ request('min_price') }}" id="filter_min_price">
                        </div>
                        <div class="flex flex-row justify-around">
                            <label for="filter_max_price">Max</label>
                            <input class="w-16" type="number" name="max_price" value="{{ request('max_price') }}" id="filter_max_price">
                        </div>
                    </div>
                    <hr class="w-3/4 m-auto">
                    {{-- Colors --}}
                    <div class="flex flex-col">
                        <h3 class="px-4 mb-5 text-xl">Colors</h3>
                        <div id="colors" class="flex flex-wrap mb-6 justify-around px-3">
                            @foreach ($colors as $color )
                                <div class="w-20 ">
                                    <label class="inline-flex items-center">
                                        <input 
                                            name="color_{{$color->name}}"
                                            type="checkbox"
                                            style="accent-color: {{ $color->hex }}"
                                            class="form-checkbox text-indigo-600" 
                                            {{str(request('colors'))->contains($color->name) ? "checked" : ""}}
                                        >
                                        <span class="ml-2">{{ $color->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="w-3/4 m-auto">
                    <div class="text-center">
                        <button class="text-white text-lg font-medium bg-blue-600 hover:bg-blue-700 px-5 py-1 rounded-full" type="submit">Filter</button>
                    </div>
                </form>
            </div>
            {{-- Right --}}
            <div class="basis-3/4 lg:basis-5/6 flex flex-col">
                {{-- Products --}}
                <div class="flex flex-row justify-center flex-wrap mt-10">
                    @foreach ($products as $product)
                        {{-- Card --}}
                        <div class="border-2 w-56 m-2 mt-3 bg-white rounded-lg overflow-hidden hover:scale-105 hover:cursor-pointer">
                            <div class="w-full h-40 bg-teal-400 flex flex-col justify-end">
                                {{-- image --}}
                                <div class="text-lg justify-items-end text-center text-gray-800">{{ $product->name }}</div>
                            </div>
                            {{-- Description --}}
                            <div class="truncate text-sm p-1">{{ $product->description }}</div>
                            {{-- Prices --}}
                            <div class="flex flex-row p-2 scroll-smooth overflow-scroll space-x-2">
                                @foreach ($product->prices as  $price)
                                    <div class="flex flex-col ">
                                        <div class="w-full h-2 rounded-full border-gray-500 border" style="background-color: {{$price->color->hex}}">
                                        </div>
                                        <div class="text-sm">{{$price->price}}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="flex flex-row justify-center my-10">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/modules/product/filter.js') }}"></script>
</body>
</html>