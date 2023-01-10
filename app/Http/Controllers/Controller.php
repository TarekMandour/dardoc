<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function savLog($admin_id, $admin_name, $num, $name, $category, $type, $action_date, $start_date, $end_date, $days, $description)
    {
        $data = Log::create([
            'admin_id' => $admin_id,
            'admin_name' => $admin_name,
            'description' => $description,
            'num' => $num,
            'name' => $name,
            'category' => $category,
            'type' => $type,
            'action_date' => $action_date,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'days' => $days,
        ]);

        return $data;
    }
}
