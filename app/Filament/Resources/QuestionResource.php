<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Widgets\QuestionOverview;
use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('name')->required(),

                Forms\Components\Select::make('question_type_id')
                ->options([
                    '1' => 'Multiple choice, single answer',
                    '2' => 'Multiple choice, multiple answer',
                    '3' => 'Fill in the blank',
                ])->required(),

                Forms\Components\Select::make('is_active')
                ->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])->required(),

                Forms\Components\FileUpload::make('media_url')
                ->disk('public')
                ->directory('question-images')
                ->preserveFilenames()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable()->limit(60),
                Tables\Columns\TextColumn::make('question_type_id'),
                Tables\Columns\TextColumn::make('media_url'),
                Tables\Columns\TextColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            QuestionOverview::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }    
}
