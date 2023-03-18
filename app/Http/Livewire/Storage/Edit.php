<?php

namespace App\Http\Livewire\Storage;

use App\Models\Project;
use App\Models\Storage;
use Livewire\Component;

class Edit extends Component
{
    public Storage $storage;

    public array $project = [];

    public array $listsForFields = [];

    public function mount(Storage $storage)
    {
        $this->storage = $storage;
        $this->project = $this->storage->project()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.storage.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->storage->save();
        $this->storage->project()->sync($this->project);

        return redirect()->route('admin.storages.index');
    }

    protected function rules(): array
    {
        return [
            'storage.type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['type'])),
            ],
            'storage.location' => [
                'string',
                'required',
            ],
            'project' => [
                'required',
                'array',
            ],
            'project.*.id' => [
                'integer',
                'exists:projects,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type']    = $this->storage::TYPE_SELECT;
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
    }
}
