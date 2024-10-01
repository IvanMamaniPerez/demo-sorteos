<?php

namespace App\Observers;

use App\Enums\LogActionEnum;

class LoggableObserver
{

    public function created($model)
    {

        $model->logs()->create([
            'user_id'    => request()->user()?->id,
            'ip'         => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'action'     => LogActionEnum::CREATE,
            'before'     => json_encode($model->getAttributes()),
            'after'      => json_encode($model->getAttributes()),
        ]);
    }

    public function updated($model)
    {
        $model->logs()->create([
            'user_id'    => request()->user()?->id,
            'ip'         => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'action'     => LogActionEnum::UPDATE,
            'before'     => json_encode($model->getOriginal()),
            'after'      => json_encode($model->getAttributes()),
        ]);
    }

    public function deleted($model)
    {
        $model->logs()->create([
            'user_id'    => request()->user()?->id,
            'ip'         => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'action'     => LogActionEnum::DELETE,
            'before'     => json_encode($model->getOriginal()),
            'after'      => null,
        ]);
    }

    public function restored($model)
    {
        $model->logs()->create([
            'user_id'    => request()->user()?->id,
            'ip'         => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'action'     => LogActionEnum::RESTORE,
            'before'     => json_encode($model->getOriginal()),
            'after'      => json_encode($model->getAttributes()),
        ]);
    }

    public function forceDeleted($model)
    {
        $model->logs()->create([
            'user_id'    => request()->user()?->id,
            'ip'         => request()?->ip(),
            'user_agent' => request()?->userAgent(),
            'action'     => LogActionEnum::FORCE_DELETE,
            'before'     => json_encode($model->getOriginal()),
            'after'      => null,
        ]);
    }
}
