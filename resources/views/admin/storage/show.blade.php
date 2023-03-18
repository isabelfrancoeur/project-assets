@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.storage.title_singular') }}:
                    {{ trans('cruds.storage.fields.id') }}
                    {{ $storage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.storage.fields.id') }}
                            </th>
                            <td>
                                {{ $storage->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.storage.fields.type') }}
                            </th>
                            <td>
                                {{ $storage->type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.storage.fields.location') }}
                            </th>
                            <td>
                                {{ $storage->location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.storage.fields.project') }}
                            </th>
                            <td>
                                @foreach($storage->project as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('storage_edit')
                    <a href="{{ route('admin.storages.edit', $storage) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.storages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection