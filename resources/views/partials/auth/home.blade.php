<div class="text-center space-y-4">
    <h3 class="text-2xl font-semibold">CRUD Home page</h3>
    <div class="form-div" id="postForm">
        <h3 class="text-xl font-semibold mb-3">Create a New Post?</h3>

        <form action="/create-post" method="POST" class="space-y-3">
            @csrf

            <input type="text" name="title" placeholder="Create a title..."
                class="input-field"/>

            <textarea name="content" class="input-field" placeholder="Type in what you want to post..." ></textarea>

            <button type="submit"
                    class="btn-secondary">
                Create Post
            </button>
        </form>
    </div>
    <div>
        <button class="posts-btn" onclick="showAllPosts()">All Posts</button>
        <button class="posts-btn" onclick="showMyPosts()">My Posts</button>
    </div>
    <div class="form-div" id="allPosts">
        <h3 class="text-2xl font-semibold">All Posts</h3>
        @foreach ($allPosts as $post)
            <div class="border border-gray-400 p-4 mt-3">
                <div class="flex flex-row justify-center">
                    <h4 class="text-l font-semibold mb-2">{{$post['title']}}&nbsp;</h4><p>by {{$post->user->name}}</p>
                </div>
                <p>~ {{$post['content']}}</p>
                @if ($post->user_id == $userId)
                    <div class="flex flex-row justify-around w-full">
                        <a class="posts-btn" href="/edit-post/{{$post->id}}">Edit</a>
                        <form action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="posts-btn" type="submit">Delete</button>
                        </form>
                    </div> 
                @endif
            </div>
        @endforeach
    </div>
    <div class="form-div" id="userPosts">
        <h3 class="text-2xl font-semibold">User Posts</h3>
        @foreach ($userPosts as $post)
            <div class="border border-gray-400 p-4 mt-3">
                <h4 class="text-l font-semibold mb-2">{{$post['title']}}</h4>
                <p>~ {{$post['content']}}</p>
                <div class="flex flex-row justify-around w-full">
                    <a class="posts-btn" href="/edit-post/{{$post->id}}">Edit</a>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="posts-btn" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <a href="/user-logout"
    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
        Log out
    </a>
</div>