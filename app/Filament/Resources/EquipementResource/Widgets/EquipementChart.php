<?php

namespace App\Filament\Resources\EquipementResource\Widgets;

use App\Models\Equipement;
use App\Models\EtatEnum;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;

class EquipementChart extends ChartWidget
{
    protected static ?string $heading = 'Equipement stats';
    protected static string $color = 'info';

    protected function getData(): array
    {


        $equipements = Equipement::select('etat', DB::raw('count(*) as count'))
            ->groupBy('etat')
            ->get();

        // Mapper les états et leurs étiquettes
        $labels = EtatEnum::asSelectArray();

        // Initialiser les données pour chaque état
        $data = [];

        foreach ($labels as $etat => $label) {
            $data[$etat] = new TrendValue($label, 0);
        }

        // Remplir les données
        foreach ($equipements as $equipement) {
            $data[$equipement->etat] = $equipement->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Equipements',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgba(75, 255, 80, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(75, 255, 80, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    'borderWidth' => 1,

                ],
            ],
            'labels' => array_keys($labels),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
