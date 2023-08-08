<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FuncionariosDatatable extends DataTableComponent
{
    public function builder(): Builder
    {
        return User::query()
            ->where('tipouser',1);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Name')
                ->sortable(),
        ];
    }
}
