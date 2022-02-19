<?php

namespace Application\Modules\System\Tasks\Models;

use Application\Modules\System\Actions\Models\Action;
use Application\Modules\System\Modules\Models\Module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
         'title', 'description', 'action_id', 'user_id', 'start_date', 'end_date', 'completion_date'
    ];

    public function action() {
        return $this->BelongsTo(Action::class);
    }
}
