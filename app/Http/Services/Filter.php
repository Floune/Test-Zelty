<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Filter
{
    private $filters;
    private $user;
    public function __construct(array $filters, $user) {
        $this->filters = $filters;
        $this->user = $user;
    }

    public function run() {
        $query = $this->user->posts();
        if (array_key_exists("status", $this->filters)) {
            $query->where("status", $this->filters["status"]);
        }
        if (array_key_exists("title", $this->filters)) {
            $query->where("title", "like", "%".$this->filters["title"]."%");
        }
        return $query->get();
    }
}
