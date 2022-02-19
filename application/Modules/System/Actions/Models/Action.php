<?php

namespace Application\Modules\System\Actions\Models;

use Application\Modules\System\Modules\Models\Module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
         'title', 'description', 'user_id', 'module_id'
    ];

    public function module() {
        return $this->BelongsTo(Module::class);
    }
}
