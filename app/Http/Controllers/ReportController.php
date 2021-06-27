<?php

namespace App\Http\Controllers;


use App\Models\Strip;
use Carbon\Carbon;

class ReportController extends Controller
{

    private int $totalstrips = 0;

    /**
     * Returns statistics for the previous days
     *
     * @todo Refactor & add numbers
     * @param int $days
     * @return array
     */
    public function statistics(int $days = 7)
    {
        $daily = [];
        $i = $days;

        while ($i <> 0) {
            $i--;

            $date = Carbon::today()->subDays($i);

            $daily[] = $this->dailyStat($date);
        }

        return [
            'days' => $days,
            'webcomics_added' => 0,
            'sources_added' => 0,
            'strips_downloaded_total' => $this->totalstrips,
            'daily' => $daily,
        ];
    }

    /**
     * Retrieves statistics for a specific date
     *
     * @param Carbon $date
     * @return array
     */
    private function dailyStat(Carbon $date)
    {
        $downloads = Strip::where('date', $date->format('Y-m-d'))->count();

        $this->totalstrips = $this->totalstrips + $downloads;

        return [
            'date' => $date->format('Y-m-d'),
            'strips_downloaded' => $downloads,
        ];
    }
}
