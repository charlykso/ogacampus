<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\ServiceMontlyReport;

class ServiceReportChart extends BaseChart
{
         /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'service_report_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'service_report_chart';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    public ?string $prefix = 'chart';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];
 
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    { 
            $defaultYear = $request->rfilter; 
            $raw_result = ServiceMontlyReport::where('year', $defaultYear)->get();  
            $rawCount = [];
            $months = array('January'=>0,'February'=>0,'Match'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0);
           
            foreach($raw_result as $raw_results){
                $rawCount[] = [$raw_results->month => $raw_results->total];
            }
            $endResult = array_replace($months,...$rawCount);
            $array = array_values($endResult);
           
            return Chartisan::build()
                ->labels(['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'])
                ->dataset('Sample', $array); 
    }
}