<?php

namespace App\Filament\Resources\Feature\Partners\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Set;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make(Str::headline(__('rincian')))
                    ->collapsible()
                    ->columnSpan(2)
                    ->schema([
                        Toggle::make('is_show')
                            ->label(Str::title(__('status')))
                            ->default(true),
                        TextInput::make('title')
                            ->label(Str::title(__('judul')))
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(1024),
                        TextInput::make('slug')
                            ->label(Str::title(__('slug')))
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(1024),
                        RichEditor::make('description')
                            ->label(Str::title(__('deskripsi')))
                    ]),
                Section::make(Str::headline(__('lampiran')))
                    ->collapsible()
                    ->columnSpan(1)
                    ->schema([
                        FileUpload::make('file')
                            ->label(Str::title(__('file')))
                            ->helperText(Str::title(__('max: 10 MB.')))
                            ->directory('partner-file/' . date('Y/m'))
                            ->image()
                            ->imageEditor()
                            // ->imageAspectRatio('16:9')
                            // ->automaticallyCropImagesToAspectRatio('16:9')
                            // ->automaticallyResizeImagesMode('cover')
                            ->automaticallyResizeImagesToWidth('960')
                            // ->automaticallyResizeImagesToHeight('720')
                            // ->automaticallyOpenImageEditorForAspectRatio()
                            ->openable()
                            ->downloadable()
                            ->maxSize(10240),
                    ]),
            ]);
    }
}
