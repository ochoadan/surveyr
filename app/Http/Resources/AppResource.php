<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class AppResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $scheduleMonitors = $this->whenLoaded('scheduleMonitors');
        if (!$scheduleMonitors instanceof MissingValue) {
            $failingMonitors = $scheduleMonitors->filter(function ($monitor) {
                return $monitor->status == 'failing';
            });

            if ($scheduleMonitors->isEmpty()) {
                $data['is_passing'] = true;
                $data['status']     = 'No monitors yet';
            } elseif ($failingMonitors->isEmpty()) {
                $data['is_passing'] = true;
                $data['status']     = 'All monitors passing';
            } else {
                $data['is_passing'] = false;
                $data['status']     = number_format($failingMonitors->count()) . ' monitor(s) failing';
            }
        }

        return $data;
    }
}
