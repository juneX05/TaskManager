<?php

namespace Application\Modules\System\Tasks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Application\Modules\Configurations\DevConfigs\Tabs\TaskStatuses\Models\TaskStatus; 
use Application\Modules\System\Projects\Models\Project; 


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        
		'name',
		'description',
		'start_date',
		'completion_date',
		'task_status_id',
		'project_id',

    ];


    public function task_status() {
      return $this->BelongsTo(TaskStatus::class);
    }
    public function project() {
      return $this->BelongsTo(Project::class);
    }

}
