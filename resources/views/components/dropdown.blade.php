@props(['categories'])

<div x-data="{ showCategories: false }">
                <button @click="showCategories = !showCategories" class="py-2 pl-3 pr-9 text-sm font-semibold w-32 inline-flex">
                    {{ isset($currentCategories) ? $currentCategories->name : 'Categories'}}
                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                            <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </button>
                <div x-show="showCategories" @click.away="showCategories = false" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl text-left z-50 max-h-52 overflow-auto style="display:none">
                    <a href="/" class="block text-left px-3 text-s leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">All</a>
                    @foreach($categories as $category)
                        <a href="/categories/{{ $category->slug }}" class="block text-left px-3 text-s leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>