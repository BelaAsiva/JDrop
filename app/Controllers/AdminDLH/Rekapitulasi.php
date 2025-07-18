<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\RekapitulasiJelantahModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Rekapitulasi extends BaseController
{
    public function index()
    {
        $model = new RekapitulasiJelantahModel();
        $data['rekap'] = $model->getAllWithSekolah();

        return view('adminDLH/rekapitulasi/index', $data);
    }

    public function exportExcel()
    {
        $model = new \App\Models\RekapitulasiJelantahModel();
        $rekap = $model->getAllWithSekolah();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Rekap Jelantah');

        // Header kolom
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Nama Sekolah');
        $sheet->setCellValue('C1', 'Bulan');
        $sheet->setCellValue('D1', 'Tahun');
        $sheet->setCellValue('E1', 'Total Jelantah (Liter)');

        // Isi data
        $row = 2;
        foreach ($rekap as $i => $r) {
            $sheet->setCellValue('A' . $row, $i + 1);
            $sheet->setCellValue('B' . $row, $r['nama_sekolah']);
            $sheet->setCellValue('C' . $row, $r['bulan']);
            $sheet->setCellValue('D' . $row, $r['tahun']);
            $sheet->setCellValue('E' . $row, number_format($r['total_ml'] / 1000, 2));
            $row++;
        }

        // Kirim ke browser
        $writer = new Xlsx($spreadsheet);
        $filename = 'rekapitulasi_jelantah.xlsx';

        // Header HTTP
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        // Output file
        $writer->save('php://output');
        exit;
    }

    public function exportPDF()
    {
        $data['judul'] = 'Laporan Rekapitulasi'; // opsional
        $model = new \App\Models\RekapitulasiJelantahModel();
        $data['rekapitulasi'] = $model->getAllWithSekolah();

        // Load view ke dalam HTML
        $html = view('adminDLH/rekapitulasi/pdf', $data);

        // Inisialisasi dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape'); // atau 'portrait'
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream("laporan-rekapitulasi.pdf", [
            "Attachment" => false // true kalau mau auto download
        ]);
    }
}


