<?php
namespace App\Filament\Pages;

use App\Filament\Resources\EquipementResource\Widgets\EquipementChart;
use Filament\Widgets;
use Filament\Panel;
use Filament\Widgets\Widget;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Dashboard';

    public function panel(Panel $panel): Panel
    {
        return $panel
        ->widgets([
            Widgets\AccountWidget::class,
            Widgets\FilamentInfoWidget::class,
            EquipementChart::class
        ]);
    }
}
