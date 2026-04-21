<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\CustomeEdit;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use App\Filament\Pages\Auth\CustomeLogin;
use App\Filament\Widgets\CustomeAccountWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(CustomeLogin::class)
            ->profile(CustomeEdit::class)
            ->colors([
                'primary' => Color::Sky,
                'secondary' => Color::Slate,
                'success' => Color::Emerald,
                'info' => Color::Blue,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                CustomeAccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                    ->navigationIcon('heroicon-o-shield-check')
                    ->activeNavigationIcon('heroicon-o-shield-check')
                    ->navigationGroup('Administrasi'),
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->maxContentWidth('full')
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make()->label("Post"),
                NavigationGroup::make()->label("Media"),
                NavigationGroup::make()->label("Situs")->collapsible(),
                NavigationGroup::make()->label("Fitur")->collapsible(),
                NavigationGroup::make()->label("Pengaturan")->collapsible(),
                NavigationGroup::make()->label("Administrasi")->collapsible(),
            ])
            ->resourceCreatePageRedirect('index')
            // ->resourceEditPageRedirect('index')
        ;
    }
}
