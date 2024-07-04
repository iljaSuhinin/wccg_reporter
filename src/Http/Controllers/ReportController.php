<?php

namespace Packages\Reporter\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends BaseController
{
    public function report(Request $request)
    {
        $report = [];
        return response()->json([
            'date' => Carbon::now()->format('d.m.Y H:i'),
            'report' => $report
        ]);
    }
}
