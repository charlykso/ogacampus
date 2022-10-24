<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Interfaces\ReportViewRepositoryInterface;

class ItemReportPieChart extends BaseChart
{
    private ReportViewRepositoryInterface $reportViewRepository; 

    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct( ReportViewRepositoryInterface $reportViewRepository ) 
   { 
       $this->reportViewRepository = $reportViewRepository;  
   }

       /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'item_report_chart_pie';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'item_report_chart_pie';

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
        return Chartisan::build()
            ->labels(['Active Items', 'Pending Items', 'Expired Items', 'Reviewing Items'])
            ->dataset('Sample', [
                $this->reportViewRepository->getAllReport()['itemActive'], 
                $this->reportViewRepository->getAllReport()['itemPending'],
                $this->reportViewRepository->getAllReport()['itemExpired'],
                $this->reportViewRepository->getAllReport()['itemReview']
                ]) ; 

    }
}