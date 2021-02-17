<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-center">
                    <form id="form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('post.update', $post->id) }}" method="POST">
                    <br>
                    <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">Update Post</h1>
                    <br>
                    <div class="mb-4 w-96">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="title" id="name" type="text" value="{{ old( 'title', $post->title) }}" required>
                        <span class="text-red-400">@error('title'){{$message}}@enderror</span>
                    </div>
                    
                    <div class="mb-4">

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="sub_text">
                            Your Comment
                        </label>

                        <textarea class="bshadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="comment" id="message2" type="text" rows="10" required>{{ old( 'comment', $post->body) }}</textarea>
                        <span class="text-red-400">@error('comment'){{$message}}@enderror</span>
                    </div>


                    <div class="flex items-center justify-between">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $post->id}}">
                        <button id="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            <i class="fab fa-whatsapp"></i> Submit
                        </button>
                    </div>

                    <div class="mb-4">


                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
