<?php

namespace App\Filament\Pages;

use Closure;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Outerweb\FilamentSettings\Filament\Pages\Settings as BaseSettings;

class Settings extends BaseSettings
{
    public function schema(): array|Closure
    {
        return [
            Tabs::make('Settings')
                ->schema([
                    Tabs\Tab::make(__('Languages'))

                        ->schema([
                            Select::make('language.default')
                                ->label(__('Default Language'))
                                ->options(cache('supported_locales')
                                    ->pluck('name', 'code'))
                                ->selectablePlaceholder(false),
                        ]),
                    Tabs\Tab::make('Logo')
                    ->label(__('Logo'))
                        ->schema([
                            FileUpload::make('logo')
                                ->label(__('Logo'))
                                ->image()
                                ->imageEditor()
                                ->required(),
                        ]),
                    Tabs\Tab::make('SEO')

                        ->schema([
                            TextInput::make('seo.title')
                                ->label(__('Meta Title'))
                                ->nullable(),
                            TextInput::make('seo.description')
                                ->label(__('Meta Description'))
                                ->nullable(),
                            Textarea::make('seo.keywords')
                                ->label(__('Meta Keywords'))
                                ->nullable(),
                        ]),
                    Tabs\Tab::make('Contact')
                    ->label(__('Contact'))
                        ->schema([
                            TextInput::make('social_media.email')
                                ->label(__('Email'))
                                ->email()
                                ->nullable(),
                            TextInput::make('social_media.phone')
                                ->label(__('Phone'))
                                ->nullable(),
                            TextInput::make('social_media.facebook')
                                ->label(__('Facebook'))
                                ->url()
                                ->nullable(),
                            TextInput::make('social_media.intagaram')
                                ->label(__('Instagram'))
                                ->url()
                                ->nullable(),
                            TextInput::make('social_media.youtube')
                                ->label(__('YouTube'))
                                ->url()
                                ->nullable(),
                            TextInput::make('social_media.whatsapp')
                                ->label(__('WhatsApp'))
                                ->placeholder('5xxxxxxxxx')
                                ->numeric()
                                ->length(10)
                                ->nullable(),
                        ]),
                ]),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('Settings saved successfully');
    }

    public function getTitle(): string
    {
        return __('Settings');
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save'))
                ->submit('data')
                ->keyBindings(['mod+s']),
        ];
    }
}
