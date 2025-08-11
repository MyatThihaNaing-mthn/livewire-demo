<div>
    <h3>The <code>Index</code> livewire component is loaded from the <code>Blog</code> module.</h3>
    <h1>Blog Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </li>
        @endforeach
    </ul>
    @if (sizeof($posts) === 0)
        <p>No blog posts found.</p>
    @endif
    <script>
    window.addEventListener('log-message', event => {
        console.log('Livewire Log:', event.detail);
    });
    </script>
</div>
