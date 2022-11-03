<?php

namespace App\Http\Requests;

use App\Http\Utils\Statuses;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $isOwner = auth()->user()->can("post.edit." . $this->request->all()["post_id"]);
        $isDraft = Post::findOrFail($this->request->all()["post_id"])->status === Statuses::DRAFT;
        if (collect($this->request)->except(['post_id', 'status'])->count() > 0) {
            return $isDraft && $isOwner;
        }

        return $isOwner;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "string|max:128",
            "body" => "string",
            "status" => [Rule::in(Statuses::get())],
            "post_id" => "integer|required",
        ];
    }
}
