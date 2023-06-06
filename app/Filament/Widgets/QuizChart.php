<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class QuizChart extends BarChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Trend::model(QuizAttemptAnswer::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Quiz Answers',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}
