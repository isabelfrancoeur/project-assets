@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.storage.title_singular') }}:
                    {{ trans('cruds.storage.fields.id') }}
                    {{ $storage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('storage.edit', [$storage])
        </div>
    </div>
</div>
@endsection