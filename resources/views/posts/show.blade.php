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
                    <div class='p-4 border-b border-gray-200'>
                        <h2 class='text-xl font-medium'>{{ $post->title }}</h2>
                        <p class='text-gray-600 leading-relaxed'>{{ $post->body }}</p>
                        <a href="{{ route('post.edit', $post->id) }}"><button type="button" class="border border-indigo-500 bg-indigo-500 text-xs text-white rounded-md px-1 py-1  transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
        Edit
                            </button></a> <a href="{{ route('post.delete', $post->id) }}"><button type="button" class="border border-red-500 bg-red-500 text-xs text-white rounded-md px-1 py-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
