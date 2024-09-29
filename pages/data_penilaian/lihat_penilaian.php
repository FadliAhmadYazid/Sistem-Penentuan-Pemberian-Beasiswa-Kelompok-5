<?php  
require '../../config/connect_db.php';

// Define score descriptions based on new criteria
$scoreDescriptions = [
    1 => [ // Pekerjaan Orang Tua
        '1' => 'Wirausaha',
        '2' => 'Wiraswasta',
        '3' => 'Buruh'
    ],
    2 => [ // Penghasilan Orang Tua
        '3' => '2 juta kebawah',
        '2' => '2 juta - 5 juta',
        '1' => '5 juta keatas'
    ],
    3 => [ // Jumlah Tanggungan Orang Tua
        '3' => '5 atau lebih tanggungan',
        '2' => '3 - 4 tanggungan',
        '1' => '1 - 2 tanggungan'
    ],
    4 => [ // IPK
        '3' => '3.20 - 4.0',
        '2' => '2.80 - 3.19',
        '1' => 'Di bawah 2.80'
    ],
    5 => [ // Bukti Keterangan Tidak Mampu
        '3' => 'Ada SKTM',
        '1' => 'Tidak ada SKTM'
    ],
    6 => [ // Mahasiswa Aktif
        '3' => 'Terdaftar di PDDIKTI',
        '1' => 'KTM'
    ]
];

// Function to get description based on score
function getScoreDescription($kriteria, $nilai) {
    global $scoreDescriptions;
    return isset($scoreDescriptions[$kriteria][$nilai]) ? $scoreDescriptions[$kriteria][$nilai] : 'Tidak ada deskripsi';
}

// Function to view evaluations that have been entered
if (isset($_POST['nama_mahasiswa'])) {
    $mahasiswa = $_POST['nama_mahasiswa'];

    $namaKriteria = "SELECT data_penilaian.ID_Penilaian, data_alternatif.ID_Alter, data_alternatif.Nama_Mahasiswa, 
    data_penilaian.ID_Kriteria, data_kriteria.Nama_Kriteria, data_penilaian.Nilai 
    FROM data_penilaian 
    INNER JOIN data_alternatif ON data_penilaian.ID_Alter = data_alternatif.ID_Alter 
    INNER JOIN data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.ID_Kriteria 
    WHERE data_alternatif.Nama_Mahasiswa = '$mahasiswa'";

    $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

    $tabel = '<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>';
    while ($alter = mysqli_fetch_assoc($rendKriteria)) {
        $kriteria = $alter['ID_Kriteria'];
        $nilai = $alter['Nilai'];
        $keterangan = getScoreDescription($kriteria, $nilai);
        
        $tabel .= "<tr>
                    <td>" . $alter['Nama_Kriteria'] . "</td>
                    <td>" . $nilai . "</td>
                    <td>" . $keterangan . "</td>
                   </tr>";
    }
    $tabel .= "</tbody>
                </table>
              </div>";

    echo $tabel;
}
?>
