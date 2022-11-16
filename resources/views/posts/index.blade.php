<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-end">
                <a href="/posts/new" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 duration-300">
                        New Post
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                brief
                                 content</th>
                            <th scope="col" class="py-3 px-6">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                 <td class="py-4 px-6  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$post->id}}</td>
                                 <td class="py-4 px-6">
                                    {{$post->title}}</td>
                                 <td class="py-4 px-6">
                                    {{substr($post->content,0,100).'...'}}</td>
                                 <td class="py-4 px-6">

                                    <a href="/posts/{{$post->id}}/edit">Edit</a>
                                    <a href="#" class="deletePost" pid="{{$post->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

document.addEventListener('click', function (event) {

// If the clicked element doesn't have the right selector, bail
if (!event.target.matches('.deletePost')) return;

// Don't follow the link
event.preventDefault();

// Log the clicked element in the console
console.log(event.target);
console.log(event.target.getAttribute('pid'));
deleteClick(event.target.getAttribute('pid'))
}, false);


        async function deleteClick(id){
            try{
                var res = await fetch(`/posts/${id}/delete`,{
                    headers: {
                        "X-CSRF-Token": '{{ csrf_token() }}'
                    },
                    method: "delete",
                    credentials: "same-origin",
                });

                //console.log(await res.json())
                var resulted = await res.json();
                if(resulted.stato == 'ok'){
                    window.location.reload();
                }
                
            }catch(err){
                console.error(err)
            }
        }
</script>

