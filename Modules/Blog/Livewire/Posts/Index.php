<?php

namespace Modules\Blog\Livewire\Posts;

use Livewire\Component;
use Modules\Blog\Entities\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Index extends Component
{
    public $posts = [];
    protected $user;
    protected $userId;


    public function mount()
    {
        $this->user = Auth::user();
        $this->userId = $this->user ? $this->user->id : null;

        // Check permissions early
        if ($this->userId) {
            $permissions = Cache::get("user_permissions_{$this->userId}", []);
            $blogPermissions = array_filter($permissions, function ($permission) {
                return str_starts_with($permission, 'Blog.');
            });
            $blogViewPermission = in_array('Blog.view', $blogPermissions);

            if (!$blogViewPermission) {
                $this->redirect(route('login'));
                return;
            }
        } else {
            $this->redirect(route('login'));
            return;
        }

        // Fetch posts from the database
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('blog::livewire.posts.index');
    }
}
