<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use Filament\Forms\Components\SpatieTagsInput;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Traits\HasContentEditor;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

use function now;

class ArticleResource extends Resource
{
    use HasContentEditor;

    protected static ?string $model = Article::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->required()
                            ->unique(Article::class, 'slug', fn ($record) => $record),

                        Forms\Components\Textarea::make('excerpt')
                            ->rows(2)
                            ->minLength(50)
                            ->maxLength(1000)
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        Forms\Components\FileUpload::make('banner')
                            ->image()
                            ->maxSize(config('filament-blog.banner.maxSize', 5120))
                            ->imageCropAspectRatio(config('filament-blog.banner.cropAspectRatio', '16:9'))
                            ->disk(config('filament-blog.banner.disk', 'public'))
                            ->directory(config('filament-blog.banner.directory', 'blog'))
                            ->columnSpan([
                                'sm' => 2,
                            ]),

                        self::getContentEditor('content'),

                        Forms\Components\BelongsToSelect::make('blog_author_id')
                            ->label(__('filament-blog::filament-blog.author'))
                            ->relationship('author', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\BelongsToSelect::make('blog_category_id')
                            ->label(__('filament-blog::filament-blog.category'))
                            ->relationship('category', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\DatePicker::make('published_at')
                            ->label(__('filament-blog::filament-blog.published_date')),
                        SpatieTagsInput::make('tags')
                            ->label(__('filament-blog::filament-blog.tags'))
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label(__('filament-blog::filament-blog.created_at'))
                            ->content(fn (
                                ?Article $record
                            ): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label(__('filament-blog::filament-blog.last_modified_at'))
                            ->content(fn (
                                ?Article $record
                            ): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
