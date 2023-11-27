<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $dataCities = [
            ['id' => 1, 'name' => 'PIDIE JAYA', 'province_id' => 1],
            ['id' => 2, 'name' => 'SIMEULUE', 'province_id' => 1],
            ['id' => 3, 'name' => 'BIREUEN', 'province_id' => 1],
            ['id' => 4, 'name' => 'ACEH TIMUR', 'province_id' => 1],
            ['id' => 5, 'name' => 'ACEH UTARA', 'province_id' => 1],
            ['id' => 6, 'name' => 'PIDIE', 'province_id' => 1],
            ['id' => 7, 'name' => 'ACEH BARAT DAYA', 'province_id' => 1],
            ['id' => 8, 'name' => 'GAYO LUES', 'province_id' => 1],
            ['id' => 9, 'name' => 'ACEH SELATAN', 'province_id' => 1],
            ['id' => 10, 'name' => 'ACEH TAMIANG', 'province_id' => 1],
            ['id' => 11, 'name' => 'ACEH BESAR', 'province_id' => 1],
            ['id' => 12, 'name' => 'ACEH TENGGARA', 'province_id' => 1],
            ['id' => 13, 'name' => 'BENER MERIAH', 'province_id' => 1],
            ['id' => 14, 'name' => 'ACEH JAYA', 'province_id' => 1],
            ['id' => 15, 'name' => 'LHOKSEUMAWE', 'province_id' => 1],
            ['id' => 16, 'name' => 'ACEH BARAT', 'province_id' => 1],
            ['id' => 17, 'name' => 'NAGAN RAYA', 'province_id' => 1],
            ['id' => 18, 'name' => 'LANGSA', 'province_id' => 1],
            ['id' => 19, 'name' => 'BANDA ACEH', 'province_id' => 1],
            ['id' => 20, 'name' => 'ACEH SINGKIL', 'province_id' => 1],
            ['id' => 21, 'name' => 'SABANG', 'province_id' => 1],
            ['id' => 22, 'name' => 'ACEH TENGAH', 'province_id' => 1],
            ['id' => 23, 'name' => 'SUBULUSSALAM', 'province_id' => 1],
            ['id' => 24, 'name' => 'NIAS SELATAN', 'province_id' => 2],
            ['id' => 25, 'name' => 'MANDAILING NATAL', 'province_id' => 2],
            ['id' => 26, 'name' => 'DAIRI', 'province_id' => 2],
            ['id' => 27, 'name' => 'LABUHAN BATU UTARA', 'province_id' => 2],
            ['id' => 28, 'name' => 'TAPANULI UTARA', 'province_id' => 2],
            ['id' => 29, 'name' => 'SIMALUNGUN', 'province_id' => 2],
            ['id' => 30, 'name' => 'LANGKAT', 'province_id' => 2],
            ['id' => 31, 'name' => 'SERDANG BEDAGAI', 'province_id' => 2],
            ['id' => 32, 'name' => 'TAPANULI SELATAN', 'province_id' => 2],
            ['id' => 33, 'name' => 'ASAHAN', 'province_id' => 2],
            ['id' => 34, 'name' => 'PADANG LAWAS UTARA', 'province_id' => 2],
            ['id' => 35, 'name' => 'PADANG LAWAS', 'province_id' => 2],
            ['id' => 36, 'name' => 'LABUHAN BATU SELATAN', 'province_id' => 2],
            ['id' => 37, 'name' => 'PADANG SIDEMPUAN', 'province_id' => 2],
            ['id' => 38, 'name' => 'TOBA SAMOSIR', 'province_id' => 2],
            ['id' => 39, 'name' => 'TAPANULI TENGAH', 'province_id' => 2],
            ['id' => 40, 'name' => 'HUMBANG HASUNDUTAN', 'province_id' => 2],
            ['id' => 41, 'name' => 'SIBOLGA', 'province_id' => 2],
            ['id' => 42, 'name' => 'BATU BARA', 'province_id' => 2],
            ['id' => 43, 'name' => 'SAMOSIR', 'province_id' => 2],
            ['id' => 44, 'name' => 'PEMATANG SIANTAR', 'province_id' => 2],
            ['id' => 45, 'name' => 'LABUHAN BATU', 'province_id' => 2],
            ['id' => 46, 'name' => 'DELI SERDANG', 'province_id' => 2],
            ['id' => 47, 'name' => 'GUNUNGSITOLI', 'province_id' => 2],
            ['id' => 48, 'name' => 'NIAS UTARA', 'province_id' => 2],
            ['id' => 49, 'name' => 'NIAS', 'province_id' => 2],
            ['id' => 50, 'name' => 'KARO', 'province_id' => 2],
            ['id' => 51, 'name' => 'NIAS BARAT', 'province_id' => 2],
            ['id' => 52, 'name' => 'MEDAN', 'province_id' => 2],
            ['id' => 53, 'name' => 'PAKPAK BHARAT', 'province_id' => 2],
            ['id' => 54, 'name' => 'TEBING TINGGI', 'province_id' => 2],
            ['id' => 55, 'name' => 'BINJAI', 'province_id' => 2],
            ['id' => 56, 'name' => 'TANJUNG BALAI', 'province_id' => 2],
            ['id' => 57, 'name' => 'DHARMASRAYA', 'province_id' => 3],
            ['id' => 58, 'name' => 'SOLOK SELATAN', 'province_id' => 3],
            ['id' => 59, 'name' => 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 'province_id' => 3],
            ['id' => 60, 'name' => 'PASAMAN BARAT', 'province_id' => 3],
            ['id' => 61, 'name' => 'SOLOK', 'province_id' => 3],
            ['id' => 62, 'name' => 'PASAMAN', 'province_id' => 3],
            ['id' => 63, 'name' => 'PARIAMAN', 'province_id' => 3],
            ['id' => 64, 'name' => 'TANAH DATAR', 'province_id' => 3],
            ['id' => 65, 'name' => 'PADANG PARIAMAN', 'province_id' => 3],
            ['id' => 66, 'name' => 'PESISIR SELATAN', 'province_id' => 3],
            ['id' => 67, 'name' => 'PADANG', 'province_id' => 3],
            ['id' => 68, 'name' => 'SAWAH LUNTO', 'province_id' => 3],
            ['id' => 69, 'name' => 'LIMA PULUH KOTO / KOTA', 'province_id' => 3],
            ['id' => 70, 'name' => 'AGAM', 'province_id' => 3],
            ['id' => 71, 'name' => 'PAYAKUMBUH', 'province_id' => 3],
            ['id' => 72, 'name' => 'BUKITTINGGI', 'province_id' => 3],
            ['id' => 73, 'name' => 'PADANG PANJANG', 'province_id' => 3],
            ['id' => 74, 'name' => 'KEPULAUAN MENTAWAI', 'province_id' => 3],
            ['id' => 75, 'name' => 'INDRAGIRI HILIR', 'province_id' => 4],
            ['id' => 76, 'name' => 'KUANTAN SINGINGI', 'province_id' => 4],
            ['id' => 77, 'name' => 'PELALAWAN', 'province_id' => 4],
            ['id' => 78, 'name' => 'PEKANBARU', 'province_id' => 4],
            ['id' => 79, 'name' => 'ROKAN HILIR', 'province_id' => 4],
            ['id' => 80, 'name' => 'BENGKALIS', 'province_id' => 4],
            ['id' => 81, 'name' => 'INDRAGIRI HULU', 'province_id' => 4],
            ['id' => 82, 'name' => 'ROKAN HULU', 'province_id' => 4],
            ['id' => 83, 'name' => 'KAMPAR', 'province_id' => 4],
            ['id' => 84, 'name' => 'KEPULAUAN MERANTI', 'province_id' => 4],
            ['id' => 85, 'name' => 'DUMAI', 'province_id' => 4],
            ['id' => 86, 'name' => 'SIAK', 'province_id' => 4],
            ['id' => 87, 'name' => 'TEBO', 'province_id' => 5],
            ['id' => 88, 'name' => 'TANJUNG JABUNG BARAT', 'province_id' => 5],
            ['id' => 89, 'name' => 'MUARO JAMBI', 'province_id' => 5],
            ['id' => 90, 'name' => 'KERINCI', 'province_id' => 5],
            ['id' => 91, 'name' => 'MERANGIN', 'province_id' => 5],
            ['id' => 92, 'name' => 'BUNGO', 'province_id' => 5],
            ['id' => 93, 'name' => 'TANJUNG JABUNG TIMUR', 'province_id' => 5],
            ['id' => 94, 'name' => 'SUNGAIPENUH', 'province_id' => 5],
            ['id' => 95, 'name' => 'BATANG HARI', 'province_id' => 5],
            ['id' => 96, 'name' => 'JAMBI', 'province_id' => 5],
            ['id' => 97, 'name' => 'SAROLANGUN', 'province_id' => 5],
            ['id' => 98, 'name' => 'PALEMBANG', 'province_id' => 6],
            ['id' => 99, 'name' => 'LAHAT', 'province_id' => 6],
            ['id' => 100, 'name' => 'OGAN KOMERING ULU TIMUR', 'province_id' => 6],
            ['id' => 101, 'name' => 'MUSI BANYUASIN', 'province_id' => 6],
            ['id' => 102, 'name' => 'PAGAR ALAM', 'province_id' => 6],
            ['id' => 103, 'name' => 'OGAN KOMERING ULU SELATAN', 'province_id' => 6],
            ['id' => 104, 'name' => 'BANYUASIN', 'province_id' => 6],
            ['id' => 105, 'name' => 'MUSI RAWAS', 'province_id' => 6],
            ['id' => 106, 'name' => 'MUARA ENIM', 'province_id' => 6],
            ['id' => 107, 'name' => 'OGAN KOMERING ULU', 'province_id' => 6],
            ['id' => 108, 'name' => 'OGAN KOMERING ILIR', 'province_id' => 6],
            ['id' => 109, 'name' => 'EMPAT LAWANG', 'province_id' => 6],
            ['id' => 110, 'name' => 'LUBUK LINGGAU', 'province_id' => 6],
            ['id' => 111, 'name' => 'PRABUMULIH', 'province_id' => 6],
            ['id' => 112, 'name' => 'OGAN ILIR', 'province_id' => 6],
            ['id' => 113, 'name' => 'BENGKULU TENGAH', 'province_id' => 7],
            ['id' => 114, 'name' => 'REJANG LEBONG', 'province_id' => 7],
            ['id' => 115, 'name' => 'MUKO MUKO', 'province_id' => 7],
            ['id' => 116, 'name' => 'KAUR', 'province_id' => 7],
            ['id' => 117, 'name' => 'BENGKULU UTARA', 'province_id' => 7],
            ['id' => 118, 'name' => 'LEBONG', 'province_id' => 7],
            ['id' => 119, 'name' => 'KEPAHIANG', 'province_id' => 7],
            ['id' => 120, 'name' => 'BENGKULU SELATAN', 'province_id' => 7],
            ['id' => 121, 'name' => 'SELUMA', 'province_id' => 7],
            ['id' => 122, 'name' => 'BENGKULU', 'province_id' => 7],
            ['id' => 123, 'name' => 'LAMPUNG UTARA', 'province_id' => 8],
            ['id' => 124, 'name' => 'WAY KANAN', 'province_id' => 8],
            ['id' => 125, 'name' => 'LAMPUNG TENGAH', 'province_id' => 8],
            ['id' => 126, 'name' => 'MESUJI', 'province_id' => 8],
            ['id' => 127, 'name' => 'PRINGSEWU', 'province_id' => 8],
            ['id' => 128, 'name' => 'LAMPUNG TIMUR', 'province_id' => 8],
            ['id' => 129, 'name' => 'LAMPUNG SELATAN', 'province_id' => 8],
            ['id' => 130, 'name' => 'TULANG BAWANG', 'province_id' => 8],
            ['id' => 131, 'name' => 'TULANG BAWANG BARAT', 'province_id' => 8],
            ['id' => 132, 'name' => 'TANGGAMUS', 'province_id' => 8],
            ['id' => 133, 'name' => 'LAMPUNG BARAT', 'province_id' => 8],
            ['id' => 134, 'name' => 'PESISIR BARAT', 'province_id' => 8],
            ['id' => 135, 'name' => 'PESAWARAN', 'province_id' => 8],
            ['id' => 136, 'name' => 'BANDAR LAMPUNG', 'province_id' => 8],
            ['id' => 137, 'name' => 'METRO', 'province_id' => 8],
            ['id' => 138, 'name' => 'BELITUNG', 'province_id' => 9],
            ['id' => 139, 'name' => 'BELITUNG TIMUR', 'province_id' => 9],
            ['id' => 140, 'name' => 'BANGKA', 'province_id' => 9],
            ['id' => 141, 'name' => 'BANGKA SELATAN', 'province_id' => 9],
            ['id' => 142, 'name' => 'BANGKA BARAT', 'province_id' => 9],
            ['id' => 143, 'name' => 'PANGKAL PINANG', 'province_id' => 9],
            ['id' => 144, 'name' => 'BANGKA TENGAH', 'province_id' => 9],
            ['id' => 145, 'name' => 'KEPULAUAN ANAMBAS', 'province_id' => 10],
            ['id' => 146, 'name' => 'BINTAN', 'province_id' => 10],
            ['id' => 147, 'name' => 'NATUNA', 'province_id' => 10],
            ['id' => 148, 'name' => 'BATAM', 'province_id' => 10],
            ['id' => 149, 'name' => 'TANJUNG PINANG', 'province_id' => 10],
            ['id' => 150, 'name' => 'KARIMUN', 'province_id' => 10],
            ['id' => 151, 'name' => 'LINGGA', 'province_id' => 10],
            ['id' => 152, 'name' => 'JAKARTA UTARA', 'province_id' => 11],
            ['id' => 153, 'name' => 'JAKARTA BARAT', 'province_id' => 11],
            ['id' => 154, 'name' => 'JAKARTA TIMUR', 'province_id' => 11],
            ['id' => 155, 'name' => 'JAKARTA SELATAN', 'province_id' => 11],
            ['id' => 156, 'name' => 'JAKARTA PUSAT', 'province_id' => 11],
            ['id' => 157, 'name' => 'KEPULAUAN SERIBU', 'province_id' => 11],
            ['id' => 158, 'name' => 'DEPOK', 'province_id' => 12],
            ['id' => 159, 'name' => 'KARAWANG', 'province_id' => 12],
            ['id' => 160, 'name' => 'CIREBON', 'province_id' => 12],
            ['id' => 161, 'name' => 'BANDUNG', 'province_id' => 12],
            ['id' => 162, 'name' => 'SUKABUMI', 'province_id' => 12],
            ['id' => 163, 'name' => 'SUMEDANG', 'province_id' => 12],
            ['id' => 164, 'name' => 'INDRAMAYU', 'province_id' => 12],
            ['id' => 165, 'name' => 'MAJALENGKA', 'province_id' => 12],
            ['id' => 166, 'name' => 'KUNINGAN', 'province_id' => 12],
            ['id' => 167, 'name' => 'TASIKMALAYA', 'province_id' => 12],
            ['id' => 168, 'name' => 'CIAMIS', 'province_id' => 12],
            ['id' => 169, 'name' => 'SUBANG', 'province_id' => 12],
            ['id' => 170, 'name' => 'PURWAKARTA', 'province_id' => 12],
            ['id' => 171, 'name' => 'BOGOR', 'province_id' => 12],
            ['id' => 172, 'name' => 'BEKASI', 'province_id' => 12],
            ['id' => 173, 'name' => 'GARUT', 'province_id' => 12],
            ['id' => 174, 'name' => 'PANGANDARAN', 'province_id' => 12],
            ['id' => 175, 'name' => 'CIANJUR', 'province_id' => 12],
            ['id' => 176, 'name' => 'BANJAR', 'province_id' => 12],
            ['id' => 177, 'name' => 'BANDUNG BARAT', 'province_id' => 12],
            ['id' => 178, 'name' => 'CIMAHI', 'province_id' => 12],
            ['id' => 179, 'name' => 'PURBALINGGA', 'province_id' => 13],
            ['id' => 180, 'name' => 'KEBUMEN', 'province_id' => 13],
            ['id' => 181, 'name' => 'MAGELANG', 'province_id' => 13],
            ['id' => 182, 'name' => 'CILACAP', 'province_id' => 13],
            ['id' => 183, 'name' => 'BATANG', 'province_id' => 13],
            ['id' => 184, 'name' => 'BANJARNEGARA', 'province_id' => 13],
            ['id' => 185, 'name' => 'BLORA', 'province_id' => 13],
            ['id' => 186, 'name' => 'BREBES', 'province_id' => 13],
            ['id' => 187, 'name' => 'BANYUMAS', 'province_id' => 13],
            ['id' => 188, 'name' => 'WONOSOBO', 'province_id' => 13],
            ['id' => 189, 'name' => 'TEGAL', 'province_id' => 13],
            ['id' => 190, 'name' => 'PURWOREJO', 'province_id' => 13],
            ['id' => 191, 'name' => 'PATI', 'province_id' => 13],
            ['id' => 192, 'name' => 'SUKOHARJO', 'province_id' => 13],
            ['id' => 193, 'name' => 'KARANGANYAR', 'province_id' => 13],
            ['id' => 194, 'name' => 'PEKALONGAN', 'province_id' => 13],
            ['id' => 195, 'name' => 'PEMALANG', 'province_id' => 13],
            ['id' => 196, 'name' => 'BOYOLALI', 'province_id' => 13],
            ['id' => 197, 'name' => 'GROBOGAN', 'province_id' => 13],
            ['id' => 198, 'name' => 'SEMARANG', 'province_id' => 13],
            ['id' => 199, 'name' => 'DEMAK', 'province_id' => 13],
            ['id' => 200, 'name' => 'REMBANG', 'province_id' => 13],
            ['id' => 201, 'name' => 'KLATEN', 'province_id' => 13],
            ['id' => 202, 'name' => 'KUDUS', 'province_id' => 13],
            ['id' => 203, 'name' => 'TEMANGGUNG', 'province_id' => 13],
            ['id' => 204, 'name' => 'SRAGEN', 'province_id' => 13],
            ['id' => 205, 'name' => 'JEPARA', 'province_id' => 13],
            ['id' => 206, 'name' => 'WONOGIRI', 'province_id' => 13],
            ['id' => 207, 'name' => 'KENDAL', 'province_id' => 13],
            ['id' => 208, 'name' => 'SURAKARTA (SOLO)', 'province_id' => 13],
            ['id' => 209, 'name' => 'SALATIGA', 'province_id' => 13],
            ['id' => 210, 'name' => 'SLEMAN', 'province_id' => 14],
            ['id' => 211, 'name' => 'BANTUL', 'province_id' => 14],
            ['id' => 212, 'name' => 'YOGYAKARTA', 'province_id' => 14],
            ['id' => 213, 'name' => 'GUNUNG KIDUL', 'province_id' => 14],
            ['id' => 214, 'name' => 'KULON PROGO', 'province_id' => 14],
            ['id' => 215, 'name' => 'GRESIK', 'province_id' => 15],
            ['id' => 216, 'name' => 'KEDIRI', 'province_id' => 15],
            ['id' => 217, 'name' => 'SAMPANG', 'province_id' => 15],
            ['id' => 218, 'name' => 'BANGKALAN', 'province_id' => 15],
            ['id' => 219, 'name' => 'SUMENEP', 'province_id' => 15],
            ['id' => 220, 'name' => 'SITUBONDO', 'province_id' => 15],
            ['id' => 221, 'name' => 'SURABAYA', 'province_id' => 15],
            ['id' => 222, 'name' => 'JEMBER', 'province_id' => 15],
            ['id' => 223, 'name' => 'PAMEKASAN', 'province_id' => 15],
            ['id' => 224, 'name' => 'JOMBANG', 'province_id' => 15],
            ['id' => 225, 'name' => 'PROBOLINGGO', 'province_id' => 15],
            ['id' => 226, 'name' => 'BANYUWANGI', 'province_id' => 15],
            ['id' => 227, 'name' => 'PASURUAN', 'province_id' => 15],
            ['id' => 228, 'name' => 'BOJONEGORO', 'province_id' => 15],
            ['id' => 229, 'name' => 'BONDOWOSO', 'province_id' => 15],
            ['id' => 230, 'name' => 'MAGETAN', 'province_id' => 15],
            ['id' => 231, 'name' => 'LUMAJANG', 'province_id' => 15],
            ['id' => 232, 'name' => 'MALANG', 'province_id' => 15],
            ['id' => 233, 'name' => 'BLITAR', 'province_id' => 15],
            ['id' => 234, 'name' => 'SIDOARJO', 'province_id' => 15],
            ['id' => 235, 'name' => 'LAMONGAN', 'province_id' => 15],
            ['id' => 236, 'name' => 'PACITAN', 'province_id' => 15],
            ['id' => 237, 'name' => 'TULUNGAGUNG', 'province_id' => 15],
            ['id' => 238, 'name' => 'MOJOKERTO', 'province_id' => 15],
            ['id' => 239, 'name' => 'MADIUN', 'province_id' => 15],
            ['id' => 240, 'name' => 'PONOROGO', 'province_id' => 15],
            ['id' => 241, 'name' => 'NGAWI', 'province_id' => 15],
            ['id' => 242, 'name' => 'NGANJUK', 'province_id' => 15],
            ['id' => 243, 'name' => 'TUBAN', 'province_id' => 15],
            ['id' => 244, 'name' => 'TRENGGALEK', 'province_id' => 15],
            ['id' => 245, 'name' => 'BATU', 'province_id' => 15],
            ['id' => 246, 'name' => 'TANGERANG', 'province_id' => 16],
            ['id' => 247, 'name' => 'SERANG', 'province_id' => 16],
            ['id' => 248, 'name' => 'PANDEGLANG', 'province_id' => 16],
            ['id' => 249, 'name' => 'LEBAK', 'province_id' => 16],
            ['id' => 250, 'name' => 'TANGERANG SELATAN', 'province_id' => 16],
            ['id' => 251, 'name' => 'CILEGON', 'province_id' => 16],
            ['id' => 252, 'name' => 'KLUNGKUNG', 'province_id' => 17],
            ['id' => 253, 'name' => 'KARANGASEM', 'province_id' => 17],
            ['id' => 254, 'name' => 'BANGLI', 'province_id' => 17],
            ['id' => 255, 'name' => 'TABANAN', 'province_id' => 17],
            ['id' => 256, 'name' => 'GIANYAR', 'province_id' => 17],
            ['id' => 257, 'name' => 'BADUNG', 'province_id' => 17],
            ['id' => 258, 'name' => 'JEMBRANA', 'province_id' => 17],
            ['id' => 259, 'name' => 'BULELENG', 'province_id' => 17],
            ['id' => 260, 'name' => 'DENPASAR', 'province_id' => 17],
            ['id' => 261, 'name' => 'MATARAM', 'province_id' => 18],
            ['id' => 262, 'name' => 'DOMPU', 'province_id' => 18],
            ['id' => 263, 'name' => 'SUMBAWA BARAT', 'province_id' => 18],
            ['id' => 264, 'name' => 'SUMBAWA', 'province_id' => 18],
            ['id' => 265, 'name' => 'LOMBOK TENGAH', 'province_id' => 18],
            ['id' => 266, 'name' => 'LOMBOK TIMUR', 'province_id' => 18],
            ['id' => 267, 'name' => 'LOMBOK UTARA', 'province_id' => 18],
            ['id' => 268, 'name' => 'LOMBOK BARAT', 'province_id' => 18],
            ['id' => 269, 'name' => 'BIMA', 'province_id' => 18],
            ['id' => 270, 'name' => 'TIMOR TENGAH SELATAN', 'province_id' => 19],
            ['id' => 271, 'name' => 'FLORES TIMUR', 'province_id' => 19],
            ['id' => 272, 'name' => 'ALOR', 'province_id' => 19],
            ['id' => 273, 'name' => 'ENDE', 'province_id' => 19],
            ['id' => 274, 'name' => 'NAGEKEO', 'province_id' => 19],
            ['id' => 275, 'name' => 'KUPANG', 'province_id' => 19],
            ['id' => 276, 'name' => 'SIKKA', 'province_id' => 19],
            ['id' => 277, 'name' => 'NGADA', 'province_id' => 19],
            ['id' => 278, 'name' => 'TIMOR TENGAH UTARA', 'province_id' => 19],
            ['id' => 279, 'name' => 'BELU', 'province_id' => 19],
            ['id' => 280, 'name' => 'LEMBATA', 'province_id' => 19],
            ['id' => 281, 'name' => 'SUMBA BARAT DAYA', 'province_id' => 19],
            ['id' => 282, 'name' => 'SUMBA BARAT', 'province_id' => 19],
            ['id' => 283, 'name' => 'SUMBA TENGAH', 'province_id' => 19],
            ['id' => 284, 'name' => 'SUMBA TIMUR', 'province_id' => 19],
            ['id' => 285, 'name' => 'ROTE NDAO', 'province_id' => 19],
            ['id' => 286, 'name' => 'MANGGARAI TIMUR', 'province_id' => 19],
            ['id' => 287, 'name' => 'MANGGARAI', 'province_id' => 19],
            ['id' => 288, 'name' => 'SABU RAIJUA', 'province_id' => 19],
            ['id' => 289, 'name' => 'MANGGARAI BARAT', 'province_id' => 19],
            ['id' => 290, 'name' => 'LANDAK', 'province_id' => 20],
            ['id' => 291, 'name' => 'KETAPANG', 'province_id' => 20],
            ['id' => 292, 'name' => 'SINTANG', 'province_id' => 20],
            ['id' => 293, 'name' => 'KUBU RAYA', 'province_id' => 20],
            ['id' => 294, 'name' => 'PONTIANAK', 'province_id' => 20],
            ['id' => 295, 'name' => 'KAYONG UTARA', 'province_id' => 20],
            ['id' => 296, 'name' => 'BENGKAYANG', 'province_id' => 20],
            ['id' => 297, 'name' => 'KAPUAS HULU', 'province_id' => 20],
            ['id' => 298, 'name' => 'SAMBAS', 'province_id' => 20],
            ['id' => 299, 'name' => 'SINGKAWANG', 'province_id' => 20],
            ['id' => 300, 'name' => 'SANGGAU', 'province_id' => 20],
            ['id' => 301, 'name' => 'MELAWI', 'province_id' => 20],
            ['id' => 302, 'name' => 'SEKADAU', 'province_id' => 20],
            ['id' => 303, 'name' => 'KOTAWARINGIN TIMUR', 'province_id' => 21],
            ['id' => 304, 'name' => 'SUKAMARA', 'province_id' => 21],
            ['id' => 305, 'name' => 'KOTAWARINGIN BARAT', 'province_id' => 21],
            ['id' => 306, 'name' => 'BARITO TIMUR', 'province_id' => 21],
            ['id' => 307, 'name' => 'KAPUAS', 'province_id' => 21],
            ['id' => 308, 'name' => 'PULANG PISAU', 'province_id' => 21],
            ['id' => 309, 'name' => 'LAMANDAU', 'province_id' => 21],
            ['id' => 310, 'name' => 'SERUYAN', 'province_id' => 21],
            ['id' => 311, 'name' => 'KATINGAN', 'province_id' => 21],
            ['id' => 312, 'name' => 'BARITO SELATAN', 'province_id' => 21],
            ['id' => 313, 'name' => 'MURUNG RAYA', 'province_id' => 21],
            ['id' => 314, 'name' => 'BARITO UTARA', 'province_id' => 21],
            ['id' => 315, 'name' => 'GUNUNG MAS', 'province_id' => 21],
            ['id' => 316, 'name' => 'PALANGKA RAYA', 'province_id' => 21],
            ['id' => 317, 'name' => 'TAPIN', 'province_id' => 22],
            ['id' => 318, 'name' => 'BANJAR', 'province_id' => 22],
            ['id' => 319, 'name' => 'HULU SUNGAI TENGAH', 'province_id' => 22],
            ['id' => 320, 'name' => 'TABALONG', 'province_id' => 22],
            ['id' => 321, 'name' => 'HULU SUNGAI UTARA', 'province_id' => 22],
            ['id' => 322, 'name' => 'BALANGAN', 'province_id' => 22],
            ['id' => 323, 'name' => 'TANAH BUMBU', 'province_id' => 22],
            ['id' => 324, 'name' => 'BANJARMASIN', 'province_id' => 22],
            ['id' => 325, 'name' => 'KOTABARU', 'province_id' => 22],
            ['id' => 326, 'name' => 'TANAH LAUT', 'province_id' => 22],
            ['id' => 327, 'name' => 'HULU SUNGAI SELATAN', 'province_id' => 22],
            ['id' => 328, 'name' => 'BARITO KUALA', 'province_id' => 22],
            ['id' => 329, 'name' => 'BANJARBARU', 'province_id' => 22],
            ['id' => 330, 'name' => 'KUTAI BARAT', 'province_id' => 23],
            ['id' => 331, 'name' => 'SAMARINDA', 'province_id' => 23],
            ['id' => 332, 'name' => 'PASER', 'province_id' => 23],
            ['id' => 333, 'name' => 'KUTAI KARTANEGARA', 'province_id' => 23],
            ['id' => 334, 'name' => 'BERAU', 'province_id' => 23],
            ['id' => 335, 'name' => 'PENAJAM PASER UTARA', 'province_id' => 23],
            ['id' => 336, 'name' => 'BONTANG', 'province_id' => 23],
            ['id' => 337, 'name' => 'KUTAI TIMUR', 'province_id' => 23],
            ['id' => 338, 'name' => 'BALIKPAPAN', 'province_id' => 23],
            ['id' => 339, 'name' => 'MALINAU', 'province_id' => 24],
            ['id' => 340, 'name' => 'NUNUKAN', 'province_id' => 24],
            ['id' => 341, 'name' => 'BULUNGAN (BULONGAN)', 'province_id' => 24],
            ['id' => 342, 'name' => 'TANA TIDUNG', 'province_id' => 24],
            ['id' => 343, 'name' => 'TARAKAN', 'province_id' => 24],
            ['id' => 344, 'name' => 'BOLAANG MONGONDOW (BOLMONG)', 'province_id' => 25],
            ['id' => 345, 'name' => 'BOLAANG MONGONDOW SELATAN', 'province_id' => 25],
            ['id' => 346, 'name' => 'MINAHASA SELATAN', 'province_id' => 25],
            ['id' => 347, 'name' => 'BITUNG', 'province_id' => 25],
            ['id' => 348, 'name' => 'MINAHASA', 'province_id' => 25],
            ['id' => 349, 'name' => 'KEPULAUAN SANGIHE', 'province_id' => 25],
            ['id' => 350, 'name' => 'MINAHASA UTARA', 'province_id' => 25],
            ['id' => 351, 'name' => 'KEPULAUAN TALAUD', 'province_id' => 25],
            ['id' => 352, 'name' => 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 'province_id' => 25],
            ['id' => 353, 'name' => 'MANADO', 'province_id' => 25],
            ['id' => 354, 'name' => 'BOLAANG MONGONDOW UTARA', 'province_id' => 25],
            ['id' => 355, 'name' => 'BOLAANG MONGONDOW TIMUR', 'province_id' => 25],
            ['id' => 356, 'name' => 'MINAHASA TENGGARA', 'province_id' => 25],
            ['id' => 357, 'name' => 'KOTAMOBAGU', 'province_id' => 25],
            ['id' => 358, 'name' => 'TOMOHON', 'province_id' => 25],
            ['id' => 359, 'name' => 'BANGGAI KEPULAUAN', 'province_id' => 26],
            ['id' => 360, 'name' => 'TOLI-TOLI', 'province_id' => 26],
            ['id' => 361, 'name' => 'PARIGI MOUTONG', 'province_id' => 26],
            ['id' => 362, 'name' => 'BUOL', 'province_id' => 26],
            ['id' => 363, 'name' => 'DONGGALA', 'province_id' => 26],
            ['id' => 364, 'name' => 'POSO', 'province_id' => 26],
            ['id' => 365, 'name' => 'MOROWALI', 'province_id' => 26],
            ['id' => 366, 'name' => 'TOJO UNA-UNA', 'province_id' => 26],
            ['id' => 367, 'name' => 'BANGGAI', 'province_id' => 26],
            ['id' => 368, 'name' => 'SIGI', 'province_id' => 26],
            ['id' => 369, 'name' => 'PALU', 'province_id' => 26],
            ['id' => 370, 'name' => 'MAROS', 'province_id' => 27],
            ['id' => 371, 'name' => 'WAJO', 'province_id' => 27],
            ['id' => 372, 'name' => 'BONE', 'province_id' => 27],
            ['id' => 373, 'name' => 'SOPPENG', 'province_id' => 27],
            ['id' => 374, 'name' => 'SIDENRENG RAPPANG / RAPANG', 'province_id' => 27],
            ['id' => 375, 'name' => 'TAKALAR', 'province_id' => 27],
            ['id' => 376, 'name' => 'BARRU', 'province_id' => 27],
            ['id' => 377, 'name' => 'LUWU TIMUR', 'province_id' => 27],
            ['id' => 378, 'name' => 'SINJAI', 'province_id' => 27],
            ['id' => 379, 'name' => 'PANGKAJENE KEPULAUAN', 'province_id' => 27],
            ['id' => 380, 'name' => 'PINRANG', 'province_id' => 27],
            ['id' => 381, 'name' => 'JENEPONTO', 'province_id' => 27],
            ['id' => 382, 'name' => 'PALOPO', 'province_id' => 27],
            ['id' => 383, 'name' => 'TORAJA UTARA', 'province_id' => 27],
            ['id' => 384, 'name' => 'LUWU', 'province_id' => 27],
            ['id' => 385, 'name' => 'BULUKUMBA', 'province_id' => 27],
            ['id' => 386, 'name' => 'MAKASSAR', 'province_id' => 27],
            ['id' => 387, 'name' => 'SELAYAR (KEPULAUAN SELAYAR)', 'province_id' => 27],
            ['id' => 388, 'name' => 'TANA TORAJA', 'province_id' => 27],
            ['id' => 389, 'name' => 'LUWU UTARA', 'province_id' => 27],
            ['id' => 390, 'name' => 'BANTAENG', 'province_id' => 27],
            ['id' => 391, 'name' => 'GOWA', 'province_id' => 27],
            ['id' => 392, 'name' => 'ENREKANG', 'province_id' => 27],
            ['id' => 393, 'name' => 'PAREPARE', 'province_id' => 27],
            ['id' => 394, 'name' => 'KOLAKA', 'province_id' => 28],
            ['id' => 395, 'name' => 'MUNA', 'province_id' => 28],
            ['id' => 396, 'name' => 'KONAWE SELATAN', 'province_id' => 28],
            ['id' => 397, 'name' => 'KENDARI', 'province_id' => 28],
            ['id' => 398, 'name' => 'KONAWE', 'province_id' => 28],
            ['id' => 399, 'name' => 'KONAWE UTARA', 'province_id' => 28],
            ['id' => 400, 'name' => 'KOLAKA UTARA', 'province_id' => 28],
            ['id' => 401, 'name' => 'BUTON', 'province_id' => 28],
            ['id' => 402, 'name' => 'BOMBANA', 'province_id' => 28],
            ['id' => 403, 'name' => 'WAKATOBI', 'province_id' => 28],
            ['id' => 404, 'name' => 'BAU-BAU', 'province_id' => 28],
            ['id' => 405, 'name' => 'BUTON UTARA', 'province_id' => 28],
            ['id' => 406, 'name' => 'GORONTALO UTARA', 'province_id' => 29],
            ['id' => 407, 'name' => 'BONE BOLANGO', 'province_id' => 29],
            ['id' => 408, 'name' => 'GORONTALO', 'province_id' => 29],
            ['id' => 409, 'name' => 'BOALEMO', 'province_id' => 29],
            ['id' => 410, 'name' => 'POHUWATO', 'province_id' => 29],
            ['id' => 411, 'name' => 'MAJENE', 'province_id' => 30],
            ['id' => 412, 'name' => 'MAMUJU', 'province_id' => 30],
            ['id' => 413, 'name' => 'MAMUJU UTARA', 'province_id' => 30],
            ['id' => 414, 'name' => 'POLEWALI MANDAR', 'province_id' => 30],
            ['id' => 415, 'name' => 'MAMASA', 'province_id' => 30],
            ['id' => 416, 'name' => 'MALUKU TENGGARA BARAT', 'province_id' => 31],
            ['id' => 417, 'name' => 'MALUKU TENGGARA', 'province_id' => 31],
            ['id' => 418, 'name' => 'SERAM BAGIAN BARAT', 'province_id' => 31],
            ['id' => 419, 'name' => 'MALUKU TENGAH', 'province_id' => 31],
            ['id' => 420, 'name' => 'SERAM BAGIAN TIMUR', 'province_id' => 31],
            ['id' => 421, 'name' => 'MALUKU BARAT DAYA', 'province_id' => 31],
            ['id' => 422, 'name' => 'AMBON', 'province_id' => 31],
            ['id' => 423, 'name' => 'BURU', 'province_id' => 31],
            ['id' => 424, 'name' => 'BURU SELATAN', 'province_id' => 31],
            ['id' => 425, 'name' => 'KEPULAUAN ARU', 'province_id' => 31],
            ['id' => 426, 'name' => 'TUAL', 'province_id' => 31],
            ['id' => 427, 'name' => 'HALMAHERA BARAT', 'province_id' => 32],
            ['id' => 428, 'name' => 'TIDORE KEPULAUAN', 'province_id' => 32],
            ['id' => 429, 'name' => 'TERNATE', 'province_id' => 32],
            ['id' => 430, 'name' => 'PULAU MOROTAI', 'province_id' => 32],
            ['id' => 431, 'name' => 'KEPULAUAN SULA', 'province_id' => 32],
            ['id' => 432, 'name' => 'HALMAHERA SELATAN', 'province_id' => 32],
            ['id' => 433, 'name' => 'HALMAHERA TENGAH', 'province_id' => 32],
            ['id' => 434, 'name' => 'HALMAHERA TIMUR', 'province_id' => 32],
            ['id' => 435, 'name' => 'HALMAHERA UTARA', 'province_id' => 32],
            ['id' => 436, 'name' => 'YALIMO', 'province_id' => 33],
            ['id' => 437, 'name' => 'DOGIYAI', 'province_id' => 33],
            ['id' => 438, 'name' => 'ASMAT', 'province_id' => 33],
            ['id' => 439, 'name' => 'JAYAPURA', 'province_id' => 33],
            ['id' => 440, 'name' => 'PANIAI', 'province_id' => 33],
            ['id' => 441, 'name' => 'MAPPI', 'province_id' => 33],
            ['id' => 442, 'name' => 'TOLIKARA', 'province_id' => 33],
            ['id' => 443, 'name' => 'PUNCAK JAYA', 'province_id' => 33],
            ['id' => 444, 'name' => 'PEGUNUNGAN BINTANG', 'province_id' => 33],
            ['id' => 445, 'name' => 'JAYAWIJAYA', 'province_id' => 33],
            ['id' => 446, 'name' => 'LANNY JAYA', 'province_id' => 33],
            ['id' => 447, 'name' => 'NDUGA', 'province_id' => 33],
            ['id' => 448, 'name' => 'BIAK NUMFOR', 'province_id' => 33],
            ['id' => 449, 'name' => 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 'province_id' => 33],
            ['id' => 450, 'name' => 'PUNCAK', 'province_id' => 33],
            ['id' => 451, 'name' => 'INTAN JAYA', 'province_id' => 33],
            ['id' => 452, 'name' => 'WAROPEN', 'province_id' => 33],
            ['id' => 453, 'name' => 'NABIRE', 'province_id' => 33],
            ['id' => 454, 'name' => 'MIMIKA', 'province_id' => 33],
            ['id' => 455, 'name' => 'BOVEN DIGOEL', 'province_id' => 33],
            ['id' => 456, 'name' => 'YAHUKIMO', 'province_id' => 33],
            ['id' => 457, 'name' => 'SARMI', 'province_id' => 33],
            ['id' => 458, 'name' => 'MERAUKE', 'province_id' => 33],
            ['id' => 459, 'name' => 'DEIYAI (DELIYAI)', 'province_id' => 33],
            ['id' => 460, 'name' => 'KEEROM', 'province_id' => 33],
            ['id' => 461, 'name' => 'SUPIORI', 'province_id' => 33],
            ['id' => 462, 'name' => 'MAMBERAMO RAYA', 'province_id' => 33],
            ['id' => 463, 'name' => 'MAMBERAMO TENGAH', 'province_id' => 33],
            ['id' => 464, 'name' => 'RAJA AMPAT', 'province_id' => 34],
            ['id' => 465, 'name' => 'MANOKWARI SELATAN', 'province_id' => 34],
            ['id' => 466, 'name' => 'MANOKWARI', 'province_id' => 34],
            ['id' => 467, 'name' => 'KAIMANA', 'province_id' => 34],
            ['id' => 468, 'name' => 'MAYBRAT', 'province_id' => 34],
            ['id' => 469, 'name' => 'SORONG SELATAN', 'province_id' => 34],
            ['id' => 470, 'name' => 'FAKFAK', 'province_id' => 34],
            ['id' => 471, 'name' => 'PEGUNUNGAN ARFAK', 'province_id' => 34],
            ['id' => 472, 'name' => 'TAMBRAUW', 'province_id' => 34],
            ['id' => 473, 'name' => 'SORONG', 'province_id' => 34],
            ['id' => 474, 'name' => 'TELUK WONDAMA', 'province_id' => 34],
            ['id' => 475, 'name' => 'TELUK BINTUNI', 'province_id' => 34],
        ];

        foreach ($dataCities as $key => $city) {
            City::create($city);
        }
    }
}