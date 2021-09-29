<?php

namespace App\Exports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\UserCarrera;

class GanadoresExport implements FromCollection, WithMapping, WithHeadings,  WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usercarrera::with(['clients.persona','carreratotal.ticket','carreratotal.paga'
        ,'carreratotal.oldticket','carreratotal.premio'])->get();
    }
    public function map($item) : array 
    {
        if ($item->carreratotal->id_px == 1) {
            $team = $item->carreratotal->ticket->t_nombre;
        }elseif($item->carreratotal->paga != null){
           $team =  $item->carreratotal->paga->t_nombre;
        }elseif($item->carreratotal->paga == null){
            $team = $item->carreratotal->oldticket->t_nombre;
        }else{
            $team = 'No se encontro';
        }
        // para las relaciones
        return  [
            Carbon::parse($item->inicio)->toFormattedDateString(),
            Carbon::parse($item->inicio)->toTimeString(),
            $item->clients->persona->t_nombreper,
            $item->clients->persona->t_apellidoper,
            $item->clients->persona->c_dniper,
            $item->clients->n_celular,
            $item->clients->t_correoper,
            Carbon::parse($item->clients->persona->d_nacimientoper)->toFormattedDateString(),
            $item->clients->persona->c_sexoper,
            $item->carreratotal->premio->tipo,
            $team,
            $item->puesto,
            Carbon::parse($item->clients->d_fechcreacion)->toFormattedDateString(),
           
        ];
    }
    public function headings(): array 
    {
        return [
            'Fecha',
            'Hora',
            'Nombre',
            'Apellido',
            'DNI',
            'Celular',
            'Correo Electronico',
            'Fecha de Nacimiento',
            'Sexo',
            'Tipo de Premio',
            'Carreras',
            'Puesto',
            'Fecha de Creacion'
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 12,
            'B' => 10,
            'C'=>  15,
            'D'=>  18,
            'E' => 10,
            'F' => 11,
            'G' => 31,
            'H' => 20,
            'J' => 20,
            'K' => 23,
            'M' => 17
        ];
    }
    public function styles(Worksheet $sheet)
    {
        // $cell = $sheet->setBorder('A1:M5','thin');
        return [
            // Style the first row as bold text.
            1   => ['font' => ['bold' => true]],
            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}