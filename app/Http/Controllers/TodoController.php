<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos  = Todo::paginate(10)->toArray();
        $data   = array(
            'todos'         => $todos['data'],
            'total'         => $todos['total'],
            'last_page'     => $todos['last_page'],
            'current_page'  => $todos['current_page'],
        );

        return $this->success('查询成功!', $data);
    }

    public function store(Request $request)
    {
        $name = $request->input('name', '');
        if (empty($name)) {
            return $this->error('请输入任务内容!');
        }

        $todo       = new Todo();
        $todo->name = $name;
        $todo->save();

        return $this->success('任务添加成功!');
    }

    public function show($id)
    {
        try {
            $todo = Todo::findOrFail($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success('查询成功!', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        try {
            $name = $request->input('name', '');
            if (empty($name)) {
                throw new \Exception('请输入任务内容!');
            }

            $todo       = Todo::findOrFail($id);
            $todo->name = $name;
            $todo->save();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success('任务修改成功!');
    }

    public function destroy($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $todo->delete();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success('任务删除成功!');
    }
}
