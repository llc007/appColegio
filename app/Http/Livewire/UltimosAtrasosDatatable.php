<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Atraso;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UltimosAtrasosDatatable extends DataTableComponent
{
    protected $model = Atraso::class;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setRefreshTime(2000);
        $this->setPerPage(10);
        $this->setPaginationVisibilityStatus(false);
        $this->setPerPageVisibilityStatus(false);
        $this->setComponentWrapperAttributes([

            'class' => 'table-responsive',
        ]);


    }

    public function columns(): array
    {
        return [

             Column::make("Id", "id")
            ->sortable()
            ->deselected()
            ->searchable(),



            Column::make('Estudiante','estudiante.nombrecompleto')
            ->sortable()
            ->searchable(),
            Column::make('Curso','estudiante.curso.nombre'),
            Column::make('Hora Entrada','horaEntrada.hora'),
            Column::make("Hora Llegada", "hora_atraso")
                ->sortable(),
            Column::make("Minutos")
                ->label(
                    fn($row, Column $column) => $row->minutosAtraso()
                )
               ->sortable(),

            Column::make('Acciones')
                // Note: The view() method is reserved for columns that have a field
                ->label(
                    fn($row, Column $column) => view('livewire.act-dt-atrasos')->withRow($row)
                ),



        ];

    }
}
