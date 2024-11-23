<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        // Todoテーブルから全データの取り出し
        
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        // フォームデータの取得
        Todo::create($todo);
        // 新しいTodoレコードの取得
        return redirect('/')->with('message', 'Todoを作成しました');
        // リダイレクト
    }
}
