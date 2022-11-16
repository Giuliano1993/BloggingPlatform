<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                       <label for="title">Title</label>
                       <input type="text" id="title" name="title" required="" class="block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                     </div>
                     <div class="mt-4">
                       <label for="content">Content</label>
                       <textarea name="content" rows="20" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""></textarea>
                     </div>
                     <div class="mt-4">
                        <label for="cover_image">Cover Photo</label>
                        <input type="file" name="cover_image" id="cover_image">
                      </div>
                     <button type="submit" class="block mt-4 rounded-md font-bold ml-auto py-2 px-3 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 ">Publish</button>
                   </form>
            </div>
        </div>
    </div>
</x-app-layout>
