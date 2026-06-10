<?php

namespace App\Modules\Admin\Services;

use App\Modules\Payments\Models\Transaction;
use App\Modules\Authentication\Models\User;
use App\Modules\Listings\Models\Listing;
use Illuminate\Support\Facades\DB;

class AnalyticsService
{
    public function getAnalytics(): array
    {
        // Revenue Analytics (daily/monthly)
        $revenueMonthly = Transaction::where('payment_status', 'completed')
            ->selectRaw("SUM(amount) as total, DATE_FORMAT(created_at, '%Y-%m') as month")
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->limit(12)
            ->get();

        // User Growth Analytics
        $userGrowth = User::selectRaw("COUNT(id) as total, DATE_FORMAT(created_at, '%Y-%m') as month")
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->limit(6)
            ->get();

        // Listing Growth Analytics
        $listingGrowth = Listing::selectRaw("COUNT(id) as total, DATE_FORMAT(created_at, '%Y-%m') as month")
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->limit(6)
            ->get();

        // Top Cities
        $topCities = Listing::selectRaw("COUNT(listings.id) as total, cities.name as city_name")
            ->join('cities', 'listings.city_id', '=', 'cities.id')
            ->groupBy('city_name', 'listings.city_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // Top Categories
        $topCategories = Listing::selectRaw("COUNT(listings.id) as total, categories.name as category_name")
            ->join('categories', 'listings.category_id', '=', 'categories.id')
            ->groupBy('category_name', 'listings.category_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return [
            'revenue_monthly' => $revenueMonthly,
            'user_growth' => $userGrowth,
            'listing_growth' => $listingGrowth,
            'top_cities' => $topCities,
            'top_categories' => $topCategories,
        ];
    }
}
