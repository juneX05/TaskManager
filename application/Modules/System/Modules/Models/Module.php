<?php

namespace Application\Modules\System\Modules\Models;

use Application\Modules\System\Projects\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'project_id', 'user_id'
    ];

    public function project() {
        return $this->BelongsTo(Project::class);
    }
}
