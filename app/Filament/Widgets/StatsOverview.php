<?php

namespace App\Filament\Widgets;

use App\Models\Equipement;
use App\Models\EtatEnum;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // protected static ?string $pollingInterval = null;
    // le titre de la carte
    protected function getStats(): array
    {
        $total_users = User::count();
        $Equipements = Equipement::count();
        return [
            //

            Stat::make('Total Users', $total_users)
                ->icon('heroicon-s-users')
                ->description('Le nombre total d\'utilisateurs')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([1,20,15,5,26,11,4,36,0,54]),

            Stat::make('Total Equipements', Equipement::count())
                ->icon('heroicon-s-cube')
                ->description('Le nombre total d\'equipements')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([1,20,45,5,30,11,4,36,0,5]),

            // ici on aura les stats des équipement en fonction de leur etat
            Stat::make('Total en bon etat', Equipement::where('etat', EtatEnum::BON_ETAT)->count())
                ->icon('heroicon-s-cube')
                ->description('Le nombre total d\'equipements en bon etat')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([
                ]),

            Stat::make('Total en mauvais etat', Equipement::where('etat', EtatEnum::EN_DOMMAGE)->count())
                ->icon('heroicon-s-cube')
                ->description('Le nombre total d\'equipements en mauvais etat')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([
                ]),

            Stat::make('Total en reparation', Equipement::where('etat', EtatEnum::EN_REPARATION)->count())
                ->icon('heroicon-s-cube')
                ->description('Le nombre total d\'equipements en reparation')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('warning')
                ->chart([
                ]),
        ];
    }
}
