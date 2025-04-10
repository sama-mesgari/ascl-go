<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignResource\Pages;
use App\Filament\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('title')->required()->string(),
                    Forms\Components\RichEditor::make('content')->required()->string(),
                    Forms\Components\TextInput::make('goal_amount')->numeric()->required()->stripCharacters(','),
                    Forms\Components\TextInput::make('raised_amount')->required()->default(0)->numeric()->stripCharacters(',')->rule(function ($get) {
                        return function ($attribute, $value, $fail) use ($get) {
                            if ($value > $get('goal_amount')) {
                                $fail('The raised amount cannot be greater than the goal amount.');
                            }
                        };
                    }),
                ])->columnSpan(2),
                Forms\Components\Section::make([
                    Forms\Components\FileUpload::make('thumbnail_url')->required()->label('Thumbnail')->imageEditor()->directory('campaigns')->nullable(),
                    Forms\Components\Checkbox::make('is_old')->default(false),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('goal_amount'),
                Tables\Columns\TextColumn::make('raised_amount'),
                Tables\Columns\ImageColumn::make('thumbnail_url'),
                Tables\Columns\TextColumn::make('created_at'),
                Tables\Columns\TextColumn::make('updated_at'),

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
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
