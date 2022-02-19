<?php

namespace Application\Modules\System\Projects\Models;

use Application\Modules\System\Modules\Models\Module;
use Application\Modules\System\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'user_id', 'project_id'
    ];

    public function modules() {
        return $this->hasMany(Module::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
