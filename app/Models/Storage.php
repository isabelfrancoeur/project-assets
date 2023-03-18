<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'storages';

    protected $fillable = [
        'type',
        'location',
    ];

    public $orderable = [
        'id',
        'type',
        'location',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $filterable = [
        'id',
        'type',
        'location',
        'project.name',
    ];

    public const TYPE_SELECT = [
        'local'             => 'Local (U:)',
        'nas'               => 'NAS',
        'hard_drive'        => 'Hard drive',
        'cloud_aws'         => 'AWS',
        'cloud_azure'       => 'Azure',
        'cloud_google'      => 'Google Drive',
        'cloud_one_drive'   => 'One Drive',
        'cloud_share_point' => 'SharePoint',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_SELECT[$this->type] ?? null;
    }

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
