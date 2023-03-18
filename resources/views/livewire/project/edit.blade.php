<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.project.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="project.name">
        <div class="validation-message">
            {{ $errors->first('project.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.date_start') ? 'invalid' : '' }}">
        <label class="form-label required" for="date_start">{{ trans('cruds.project.fields.date_start') }}</label>
        <x-date-picker class="form-control" required wire:model="project.date_start" id="date_start" name="date_start" picker="date" />
        <div class="validation-message">
            {{ $errors->first('project.date_start') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.date_start_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.project.fields.status') }}</label>
        <select class="form-control" wire:model="project.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('project.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>