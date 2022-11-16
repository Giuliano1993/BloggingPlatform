<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table>

                    <tr>
                        <td>id</td>
                        <td>title</td>
                        <td>brief content</td>
                        <td>actions</td>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{substr($post->content,0,100).'...'}}</td>
                            <td>
                                <a>Edit</a>    
                                <a>Delete</a>    
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
