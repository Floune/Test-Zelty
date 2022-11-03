<?php

namespace App\Permissions;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\Permission\Models\Permission;

class UserPost
{

    private $user;
    private $editPermission;
    private $deletePermission;
    public function __construct($user, Post $post) {
        $this->user = $user;
        $this->editPermission = "post.edit." . $post->id;
        $this->deletePermission = "post.delete." . $post->id;
    }

    public function up() {
        Permission::create(['name'=> $this->editPermission]);
        Permission::create(['name'=> $this->deletePermission]);
        $this->user->givePermissionTo($this->editPermission);
        $this->user->givePermissionTo($this->deletePermission);
    }

    public function down(User $user, Post $post) {
        $user->revokePermissionTo($this->editPermission);
        $user->revokePermissionTo($this->deletePermission);
    }
}
