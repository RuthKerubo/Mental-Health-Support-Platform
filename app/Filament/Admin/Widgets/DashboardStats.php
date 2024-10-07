<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStats extends BaseWidget
{
    protected static ?string $heading = 'Admin Dashboard Statistics';
    
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
                ->description('Users registered')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
                
            Card::make('New Users (This Month)', User::whereMonth('created_at', now()->month)->count())
                ->description('New registrations this month')
                ->color('success'),
            
            // Add more cards as needed
        ];
    }
}
