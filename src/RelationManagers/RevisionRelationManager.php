<?php

namespace Ewwe\FilamentRevisionsPlugin\RelationManagers;

use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class RevisionRelationManager extends RelationManager
{
    protected static string $relationship = 'revisions';

    public function table(Table $table)
    {
        return $table
            ->defaultSort('id', 'DESC')
            ->columns($this->getColumnsForTable())
            ->actions([
                Action::make('Restore'),
            ]);
    }

    protected function getColumnsForTable(): array
    {
        $columns = [];
        foreach ($this->ownerRecord->getFillable() as $item) {
            if (isset($this->ownerRecord?->translatable)) {

            }
        }

        return $columns;
    }
}
