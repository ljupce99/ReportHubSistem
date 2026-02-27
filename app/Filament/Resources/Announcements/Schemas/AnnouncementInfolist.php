<?php

namespace App\Filament\Resources\Announcements\Schemas;

use App\Models\Announcement;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AnnouncementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('content')
                    ->columnSpanFull(),
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('created_by')
                    ->numeric(),
                IconEntry::make('is_active')
                    ->boolean(),
                IconEntry::make('is_pinned')
                    ->boolean(),
                TextEntry::make('status'),
                TextEntry::make('target'),
                TextEntry::make('publish_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('expire_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Announcement $record): bool => $record->trashed()),
            ]);
    }
}
