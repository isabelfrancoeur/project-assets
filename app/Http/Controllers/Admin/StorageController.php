<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StorageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('storage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.storage.index');
    }

    public function create()
    {
        abort_if(Gate::denies('storage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.storage.create');
    }

    public function edit(Storage $storage)
    {
        abort_if(Gate::denies('storage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.storage.edit', compact('storage'));
    }

    public function show(Storage $storage)
    {
        abort_if(Gate::denies('storage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $storage->load('project');

        return view('admin.storage.show', compact('storage'));
    }
}
