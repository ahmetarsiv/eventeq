<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\City;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Components\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Etkinliğin Adı'),
                        Forms\Components\Select::make('city_id')
                            ->options(City::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required()
                            ->label('Şehir'),
                        Forms\Components\RichEditor::make('description')
                            ->nullable()
                            ->columnSpanFull()
                            ->label('Etkinliğin Açıklaması'),
                        Forms\Components\DateTimePicker::make('start_date')
                            ->required()
                            ->label('Başlangıç Tarihi'),
                        Forms\Components\DateTimePicker::make('end_date')
                            ->required()
                            ->label('Bitiş Tarihi'),
                        Forms\Components\FileUpload::make('img')
                            ->required()
                            ->label('Resim')
                            ->columnSpanFull()
                            ->directory('events/')
                            ->visibility('public')
                            ->imageEditor(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Etkinliğin Adı'),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->label('Şehir'),
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->sortable()
                    ->label('Başlangıç Tarihi'),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->label('Bitiş Tarihi'),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
