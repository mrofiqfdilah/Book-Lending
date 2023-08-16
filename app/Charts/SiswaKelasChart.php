<?php

namespace App\Charts;

use App\Models\Pinjaman;
use ArielMejiaDev\LarapexCharts\PieChart; // Ubah BarChart menjadi PieChart
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SiswaKelasChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): PieChart // Ubah BarChart menjadi PieChart
    {
        $kelassiswa = Pinjaman::get();
        $data = [
            [
                'name' => 'Kelas 10',
                'data' => [$kelassiswa->where('kelas', '10')->count()],
            ],
            [
                'name' => 'Kelas 11',
                'data' => [$kelassiswa->where('kelas', '11')->count()],
            ],
            [
                'name' => 'Kelas 12',
                'data' => [$kelassiswa->where('kelas', '12')->count()],
            ],
        ];

        return $this->chart->pieChart() // Ubah barChart() menjadi pieChart()
            ->setTitle('Data Siswa Yang Sering Pinjam Buku')
            ->setSubtitle(date('Y'))
            ->setLabels(['Kelas 10', 'Kelas 11', 'Kelas 12']) // Menyediakan label untuk sektor Pie Chart
            ->setDataset([$kelassiswa->where('kelas', '10')->count(), $kelassiswa->where('kelas', '11')->count(), $kelassiswa->where('kelas', '12')->count()])
            ->setColors(['#695CFE', '#2C82BE', '#FF7F0E']); // Menyesuaikan warna untuk masing-masing sektor Pie Chart
    }
}
