<?php

namespace Ewwe\FilamentRevisionsPlugin\RelationManagers;

use Ewwe\FilamentRevisionsPlugin\Models\Revision;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class RevisionRelationManager extends RelationManager
{
    protected static string $relationship = 'revisions';

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'DESC')
            ->columns([

                TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i:s')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->description(fn (Model $record) => $record->user?->email ?: ''),
            ])
            ->actions([
                Action::make('Restore')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $this->restoreRevision(revision: $record)),
            ]);
    }

    protected function restoreRevision(Revision $revision): void
    {
        $model = $revision->model_type::find($revision->model_id);
        foreach ($revision->data as $field => $value) {
            $model->{$field} = $value;
        }
        if ($model->save()) {
            Notification::make()
                ->title('Restored')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Restoration failed')
                ->danger()
                ->send();
        }
    }
}
