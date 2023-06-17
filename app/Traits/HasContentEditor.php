<?php

namespace App\Traits;

use Filament\Forms\Components\RichEditor;

trait HasContentEditor
{
    public static function getContentEditor(string $field)
    {
        $defaultEditor = RichEditor::class;

        return $defaultEditor::make($field)
            ->required()
            ->toolbarButtons([
                'attachFiles',
                'blockquote',
                'bold',
                'bulletList',
                'codeBlock',
                'h2',
                'h3',
                'italic',
                'link',
                'orderedList',
                'redo',
                'strike',
                'undo',
            ])
            ->columnSpan([
                'sm' => 2,
            ]);
    }
}
