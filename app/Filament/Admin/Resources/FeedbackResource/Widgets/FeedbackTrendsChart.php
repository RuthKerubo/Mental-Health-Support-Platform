<?php

namespace App\Filament\Admin\Resources\FeedbackResource\Widgets;

use Filament\Widgets\ChartWidget;

class FeedbackTrendsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
