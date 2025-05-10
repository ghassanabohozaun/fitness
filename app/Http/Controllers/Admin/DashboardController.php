<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\Revenue;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('dashboard.admin_panel');
        $latest_articles = Article::orderByDesc('created_at')->limit(6)->get();
        $latest_courses = Course::orderByDesc('created_at')->limit(6)->get();

        $revenues = Revenue::select(DB::raw('Sum(value) as count'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $revenueMonths = Revenue::select(DB::raw('Month(created_at) as month'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $revenueData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($revenueMonths as $index => $month) {
            $revenueData[$month - 1] = $revenues[$index];
        }


        /// Article Chart
        $articlesViews = Article::select(DB::raw('Sum(views) as count'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $articleMonths = Article::select(DB::raw('Month(created_at) as month'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $articleData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($articleMonths as $index => $month) {
            $articleData[$month - 1] = $articlesViews[$index];
        }

        return view('admin.dashboard', compact('title', 'latest_articles', 'latest_courses', 'articleData','revenueData'));
    }

    // not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }
}
