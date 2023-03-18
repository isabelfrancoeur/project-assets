<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('storage.type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.storage.fields.type') }}</label>
        <select class="form-control" wire:model="storage.type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('storage.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.storage.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('storage.location') ? 'invalid' : '' }}">
        <label class="form-label required" for="location">{{ trans('cruds.storage.fields.location') }}</label>
        <input class="form-control" type="text" name="location" id="location" required wire:model.defer="storage.location">
        <div class="validation-message">
            {{ $errors->first('storage.location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.storage.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project') ? 'invalid' : '' }}">
        <label class="form-label required" for="project">{{ trans('cruds.storage.fields.project') }}</label>
        <x-select-list class="form-control" required id="project" name="project" wire:model="project" :options="$this->listsForFields['project']" multiple />
        <div class="validation-message">
            {{ $errors->first('project') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.storage.fields.project_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.storages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>