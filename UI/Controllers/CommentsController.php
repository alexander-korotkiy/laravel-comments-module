<?php

namespace Deka\Comments\UI\Controllers;

use App\Http\Controllers\Controller;
use Deka\Comments\Application\Services\Request\GetComments;
use Deka\Comments\Application\Services\Request\GetOneComment;
use Deka\Comments\Application\Services\Request\GetCommentsInfo;
use Deka\Comments\Application\Services\Request\CreateNewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Tactician\CommandBus;

class CommentsController extends Controller
{
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * CommentsController constructor.
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus) {
        $this->bus = $bus;
    }

    public function list($goods_id = 0) {
        $list = $this->bus->handle(new GetComments($goods_id));
        return response()->json($list->toArray(), empty($list->get('items')) ? 404 : 200);
    }

    public function info($goods_id) {
        $info = $this->bus->handle(new GetCommentsInfo($goods_id));
        return response()->json($info->toArray(), !$info ? 404 : 200);
    }

    public function get(int $id) {
        $comment = $this->bus->handle(new GetOneComment($id));
        return response()->json($comment, empty($comment) ? 404 : 200);
    }
    
    public function store(Request $request, $goods_id = 0) {

        $validator = Validator::make($request->all(), [
            'parentId' => 'required|integer',
            'rating' => 'numeric|min:0|max:5',
            'comment' => 'required|max:10000',
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()->messages()], 400);
        }

        $result = $this->bus->handle(new CreateNewComment($goods_id, $request));
        return response()->json(['status' => (bool)$result, 'id' => $result], 200);
    }
}
