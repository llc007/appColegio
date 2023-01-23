<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class EstudiantesDatatable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("nombre", "nombrecompleto")
                ->sortable()->searchable(),
//            Column::make("Nombre", "paterno")
//                ->format(
//                    fn($value,$row,$column)=>$row->paterno.' '.$row->materno
//                )
//                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Paterno", "paterno")
                ->sortable(),
            Column::make("Materno", "materno")
                ->sortable(),
            Column::make("Rut", "rut")
                ->sortable()->searchable(),
            Column::make("Dv", "dv")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
