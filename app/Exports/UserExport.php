<?php

namespace App\Exports;

use App\Models\AsesiUjiKompetensi;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class UserExport implements FromView, WithEvents, ShouldAutoSize
{
    use RegistersEventListeners;

    public function __construct(int $year)
    {
        $this->year = $year;

        return $this;
    }

    public function view(): View
    {
        $user_asesi_id = AsesiUjiKompetensi::selectRaw('MAX(id) as id')
            ->whereYear('updated_at', $this->year)
            ->where('status_ujian_berlangsung', 2)
            ->groupBy('user_asesi_id')
            ->orderBy('user_asesi_id')
            ->get()
            ->map(function ($item) {
                return AsesiUjiKompetensi::find($item->id);
            });
        $user = User::with('relasi_user_detail', 'relasi_koreksi_jawaban', 'relasi_asesi_uji_kompetensi.relasi_pelaksanaan_ujian')->whereIn('id', $user_asesi_id->pluck('user_asesi_id')->all())->get();
        // dd($user);
        return view('admin.berkas.df_hadir_asesi_bnsp.index', [
            'users' => $user
        ]);
    }

    public static function afterSheet(AfterSheet $event)
    {
        $sheet = $event->sheet->getDelegate();
        $sheet->getStyle('A1:S1')->getFont()
            ->setSize(11)
            ->setBold(true)->getColor()->setARGB('FFFFFF');
        $sheet->getStyle('A1:S1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('1F4E78');
        $sheet->getStyle('A1:S1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:S1')->getAlignment()->setVertical('center');
        $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A')->getAlignment()->setVertical('center');
        $sheet->getStyle('C')->getAlignment()->setHorizontal('left');
        $sheet->getStyle('C')->getAlignment()->setVertical('center');
        $sheet->getStyle('F')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('F')->getAlignment()->setVertical('center');
        $sheet->getStyle('H')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('H')->getAlignment()->setVertical('center');
        $sheet->getStyle('I')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('I')->getAlignment()->setVertical('center');
        $sheet->getStyle('J')->getAlignment()->setHorizontal('left');
        $sheet->getStyle('J')->getAlignment()->setVertical('center');
        $sheet->getStyle('L')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('L')->getAlignment()->setVertical('center');
        $sheet->getStyle('M')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('M')->getAlignment()->setVertical('center');
        $sheet->getStyle('N')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('N')->getAlignment()->setVertical('center');
        $sheet->getStyle('Q')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('Q')->getAlignment()->setVertical('center');
        $sheet->getStyle('R')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('R')->getAlignment()->setVertical('center');
        $sheet->getStyle('S')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('S')->getAlignment()->setVertical('center');
        $sheet->getStyle('P')->getAlignment()->setHorizontal('left');
        $sheet->getStyle('P')->getAlignment()->setVertical('center');
        $cellRange = 'A1:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow();
        $event->sheet->getStyle($cellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
}
