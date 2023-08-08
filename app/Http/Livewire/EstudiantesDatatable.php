<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use App\Models\User;

class EstudiantesDatatable extends DataTableComponent
{


    public function builder(): Builder
    {
        return User::query()
            ->where('tipouser',3);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [

           /*
            Column::make("Id", "id")
                ->sortable(),
            */
            Column::make("Id", "id")
                ->sortable()
                ->deselected()
                ->searchable(),
            Column::make("Rut", "rut")
                ->sortable()->searchable(),

            Column::make("nombre", "nombrecompleto")
                ->sortable()->searchable(),
//            Column::make("Nombre", "paterno")
//                ->format(
//                    fn($value,$row,$column)=>$row->paterno.' '.$row->materno
//                )
//                ->sortable()->searchable(),

            Column::make("Curso", "curso.nombre")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make('Acciones')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn($row, Column $column) => view('livewire.act-dt-estudiantes')->withRow($row)
                ),


        ];
    }
}
