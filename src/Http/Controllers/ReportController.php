<?php

namespace Packages\Reporter\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Packages\Reporter\Model\Reporter;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends BaseController
{
    public function report(Request $request)
    {
        $token = $request->get('token');
        if($token !== env('REPORTER_TOKEN')) abort(403, 'Invalid token');

        $report = [];
        $reporters = config()->get('reporter.reporters');
        foreach ($reporters as $reporterClass) {
            $reporter = resolve($reporterClass);
            if($reporter instanceof Reporter) {
                $report[$reporter->getName()] = $reporter->getValue();
            }
        }
        return response()->json([
            'date' => Carbon::now()->format('d.m.Y H:i'),
            'report' => $report
        ]);
    }
}
