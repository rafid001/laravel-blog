<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-lg font-bold mb-4">Edit your post : {{$post->title}}</h1>
        <form action="/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                    >
                Title
                </label>
                <input type="text"
                       class="border border-gray-400 p-2 w-full"
                       name="title"
                       id="title"
                       required
                       value = "{{$post->title}}"
                    >
                @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="slug"
                    >
                Slug
                </label>
                <input type="text"
                       class="border border-gray-400 p-2 w-full"
                       name="slug"
                       id="slug"
                       required
                       value="{{ $post->slug }}"
                    >
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                    >
                    Body
                </label>
                <textarea class="border border-gray-400 p-2 w-full"
                          name="body"
                          id="body"
                          required 
                >{{ $post->body }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="excerpt"
                    >
                    Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full"
                          name="excerpt"
                          id="excerpt"
                          required 
                >{{ $post->excerpt }}</textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                Category
            </label>
            <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full">
                <option value="">Select a category</option>
                @php
                    $categories = App\Models\Category::all();
                @endphp
                <!-- @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach -->
                @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
            </select>
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-white bg-blue-500 px-2 py-2 rounded-xl w-20 text-center mt-5 hover:bg-blue-700">
                <button type="submit">UPDATE</button>
            </div>
        </form>
    </section>
</x-layout>