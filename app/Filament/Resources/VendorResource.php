<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Vendors';
    protected static ?string $navigationGroup = 'Manajemen Vendor';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Tabs::make('Vendor Tabs')
                    ->columnSpan('full')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Info Umum')->schema([
                            Forms\Components\FileUpload::make('thumbnail')
                                ->image()
                                ->directory('vendors')
                                ->required(),
                            Forms\Components\TextInput::make('name')->required(),
                            Forms\Components\Textarea::make('description')->required(),
                            Forms\Components\TextInput::make('whatsapp_number')->label('Nomor WA')->required(),
                            Forms\Components\TextInput::make('instagram')->nullable(),
                            Forms\Components\TextInput::make('facebook')->nullable(),
                            Forms\Components\TextInput::make('tiktok')->nullable(),
                            Forms\Components\TextInput::make('price_range')
                                ->label('Kisaran Harga (contoh: Rp 500K - 5JT)')
                                ->required(),
                            Forms\Components\Toggle::make('is_verified')->label('Terverifikasi?'),
                        ]),

                        Forms\Components\Tabs\Tab::make('Kategori')->schema([
                            Forms\Components\Select::make('categories')
                                ->multiple()
                                ->relationship('categories', 'name')
                                ->preload()
                                ->required(),
                        ]),

                        Forms\Components\Tabs\Tab::make('Lokasi')->schema([
                            Forms\Components\Select::make('cities')
                                ->multiple()
                                ->relationship('cities', 'name')
                                ->preload()
                                ->required(),
                        ]),

                        Forms\Components\Tabs\Tab::make('Properti')->schema([
                            Forms\Components\Select::make('properties')
                                ->multiple()
                                ->relationship('properties', 'name')
                                ->preload()
                                ->required(),
                        ]),

                        Forms\Components\Tabs\Tab::make('Paket')->schema([
                            Forms\Components\Repeater::make('packages')
                                ->relationship('packages')
                                ->schema([
                                    Forms\Components\TextInput::make('name')->required(),
                                    Forms\Components\Textarea::make('description')->required(),
                                    Forms\Components\TextInput::make('price')->numeric()->prefix('Rp')->required(),
                                    Forms\Components\TextInput::make('capacity')->numeric()->label('Kapasitas Orang')->required(),
                                    Forms\Components\FileUpload::make('image')->image()->directory('packages')->required(),
                                    Forms\Components\Select::make('properties')
                                        ->multiple()
                                        ->relationship('properties', 'name')
                                        ->preload(),
                                ])
                        ]),

                        Forms\Components\Tabs\Tab::make('Riwayat Event')->schema([
                            Forms\Components\Repeater::make('events')
                                ->relationship('events')
                                ->schema([
                                    Forms\Components\TextInput::make('name')->label('Nama Event')->required(),
                                    Forms\Components\Textarea::make('description')->required(),
                                    Forms\Components\DatePicker::make('event_date')->label('Tanggal')->required(),
                                    Forms\Components\FileUpload::make('image')
                                        ->image()
                                        ->directory('events')
                                        ->required(),
                                ])
                        ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('thumbnail')->label('Foto'),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('price_range')->label('Kisaran Harga')->sortable(),
            Tables\Columns\TextColumn::make('categories.name')
                ->label('Kategori')
                ->badge()
                ->limitList(2) // bisa dihapus kalau mau tampil semua
                ->sortable(),
            Tables\Columns\TextColumn::make('properties.name')
                ->label('Properti')
                ->badge()
                ->limitList(2),
            Tables\Columns\TextColumn::make('cities.name')
                ->label('Wilayah')
                ->badge()
                ->limitList(2),
            Tables\Columns\ToggleColumn::make('is_verified')->label('Verifikasi'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
