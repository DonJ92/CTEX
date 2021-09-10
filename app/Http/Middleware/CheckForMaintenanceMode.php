<?php

namespace App\Http\Middleware;

use App\Models\MaintenanceContent;
use App\Models\Master;
use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckForMaintenanceMode
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request_uri = $request->getRequestUri();
        if (str_contains($request_uri, 'maintenance'))
            return $next($request);

        $maintenance_flag = false;
        try {
            $maintenance_info = Master::where('option', 'MAINTENANCE_MODE')->first();
            if (is_null($maintenance_info))
                $maintenance_flag = false;
            elseif ($maintenance_info->value == 1)
                $maintenance_flag = true;
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            $maintenance_flag = false;
        }

        if ($maintenance_flag == true)
            return redirect()->route('maintenance');

        return $next($request);
    }
}
