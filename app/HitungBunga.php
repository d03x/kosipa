<?php

namespace App;

class HitungBunga
{

    /**
     * @param int $pinjaman
     * @param $bungaPertahun
     * @param int $jangkaWaktu
     * @return array
     */
    public static function kalkulasiEfektif(int $pinjaman, $bungaPertahun,int $jangkaWaktu):array{
        $angsurans =[];
        $sukuBunga = $bungaPertahun / 100;
        $pokok = $pinjaman / $jangkaWaktu;
        $sisaPinjaman = $pinjaman;

        for ( $i = 0; $i < $jangkaWaktu;$i++ )
        {
            $bunga = $sisaPinjaman * $sukuBunga * (30/360);
            $jumlahAngsuran = ($bunga+$pokok);
            $sisaPinjaman -= $pokok;
            $angsurans[$i+1] = [
                'bunga'=>round($bunga),
                'jumlah_angsuran'=>round($jumlahAngsuran),
                'sisa_pinjaman'=>round($sisaPinjaman),
                'pokok'=>round($pokok),
                'angsuran_ke'=> $i+1
            ];
        }
        return $angsurans;

    }

}
