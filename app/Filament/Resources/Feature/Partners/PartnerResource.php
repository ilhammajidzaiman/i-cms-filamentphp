<?php

namespace App\Filament\Resources\Feature\Partners;

use App\Filament\Resources\Feature\Partners\Pages\CreatePartner;
use App\Filament\Resources\Feature\Partners\Pages\EditPartner;
use App\Filament\Resources\Feature\Partners\Pages\ListPartners;
use App\Filament\Resources\Feature\Partners\Pages\ViewPartner;
use App\Filament\Resources\Feature\Partners\Schemas\PartnerForm;
use App\Filament\Resources\Feature\Partners\Schemas\PartnerInfolist;
use App\Filament\Resources\Feature\Partners\Tables\PartnersTable;
use App\Models\Feature\Partner;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $recordTitleAttribute = 'title';
    protected static string | UnitEnum | null $navigationGroup = 'Fitur';
    protected static ?string $pluralModelLabel = 'Mitra';
    protected static ?string $slug = 'mitra';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return PartnerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PartnerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnersTable::configure($table);
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
            'index' => ListPartners::route('/'),
            'create' => CreatePartner::route('/create'),
            'view' => ViewPartner::route('/{record}'),
            'edit' => EditPartner::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
