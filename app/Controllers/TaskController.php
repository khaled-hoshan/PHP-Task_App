<?php

namespace App\Controllers;

use App\Core\Request;
use App\Database\QuaryBuilder;

class TaskController
{
    public function index()
    {
        $completed = Request::get('completed');
        if ($completed != null) {
            $tasks = QuaryBuilder::get('tasks', ['completed', '=', $completed]);
        } else {
            $tasks = QuaryBuilder::get('tasks');
        }
        view('index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $description = Request::get('description');

        QuaryBuilder::insert('tasks', [
            'description' => $description
        ]);

        back();
    }

    public function delete()
    {
        if ($id = Request::get('id')) {
            QuaryBuilder::delete('tasks', $id);
        }
        back();
    }

    public function update()
    {
        $id = Request::get('id');
        $completed = Request::get('completed');

        if ($id && $completed != null) {
            QuaryBuilder::update('tasks', $id, [
                'completed' => $completed
            ]);
        }
        back();
    }
}
