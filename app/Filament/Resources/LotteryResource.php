<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LotteryResource\Pages;
use App\Filament\Resources\LotteryResource\RelationManagers;
use App\Models\Lottery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LotteryResource extends Resource
{
    protected static ?string $model = Lottery::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('shop_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shop_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('area_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('customer_phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('imei')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gift_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_settled')
                    ->required(),
                Forms\Components\DateTimePicker::make('settled_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('shop_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shop_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imei')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gift_name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_settled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('settled_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLotteries::route('/'),
            'create' => Pages\CreateLottery::route('/create'),
            'edit' => Pages\EditLottery::route('/{record}/edit'),
        ];
    }
}
