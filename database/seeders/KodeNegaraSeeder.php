<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KodePlatNomor;

class KodeNegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kodeNegara = [
            [
                'nama_negara' => 'Austria',
                'kode_registrasi_negara' => 'A',
            ],
            [
                'nama_negara' => 'Afghanistan',
                'kode_registrasi_negara' => 'AFG',
            ],
            [
                'nama_negara' => 'Albania',
                'kode_registrasi_negara' => 'AL',
            ],
            [
                'nama_negara' => 'Andorra',
                'kode_registrasi_negara' => 'AND',
            ],
            [
                'nama_negara' => 'Armenia',
                'kode_registrasi_negara' => 'AM',
            ],
            [
                'nama_negara' => 'Australia',
                'kode_registrasi_negara' => 'AUS',
            ],
            [
                'nama_negara' => 'Azerbaijan',
                'kode_registrasi_negara' => 'AZ',
            ],
            [
                'nama_negara' => 'Belgia',
                'kode_registrasi_negara' => 'B',
            ],
            [
                'nama_negara' => 'Bangladesh',
                'kode_registrasi_negara' => 'BD',
            ],
            [
                'nama_negara' => 'Barbados',
                'kode_registrasi_negara' => 'BDS',
            ],
            [
                'nama_negara' => 'Burkina Faso',
                'kode_registrasi_negara' => 'BF',
            ],
            [
                'nama_negara' => 'Bulgaria',
                'kode_registrasi_negara' => 'BG',
            ],
            [
                'nama_negara' => 'Belize',
                'kode_registrasi_negara' => 'BH',
            ],
            [
                'nama_negara' => 'Bosnia dan Herzegovina',
                'kode_registrasi_negara' => 'BIH',
            ],
            [
                'nama_negara' => 'Bolivia',
                'kode_registrasi_negara' => 'BOL',
            ],
            [
                'nama_negara' => 'Brazil',
                'kode_registrasi_negara' => 'BR',
            ],
            [
                'nama_negara' => 'Bahrain',
                'kode_registrasi_negara' => 'BRN',
            ],
            [
                'nama_negara' => 'Brunei',
                'kode_registrasi_negara' => 'BRU',
            ],
            [
                'nama_negara' => 'Bahamas',
                'kode_registrasi_negara' => 'BS',
            ],
            [
                'nama_negara' => 'Myanmar',
                'kode_registrasi_negara' => 'BUR',
            ],
            [
                'nama_negara' => 'British Virgin Islands',
                'kode_registrasi_negara' => 'BVI',
            ],
            [
                'nama_negara' => 'Botswana',
                'kode_registrasi_negara' => 'BW',
            ],
            [
                'nama_negara' => 'Belarus',
                'kode_registrasi_negara' => 'BY',
            ],
            [
                'nama_negara' => 'Kamerun',
                'kode_registrasi_negara' => 'CAM',
            ],
            [
                'nama_negara' => 'Kanada',
                'kode_registrasi_negara' => 'CDN',
            ],
            [
                'nama_negara' => 'Replubik Demokratik Kongo',
                'kode_registrasi_negara' => 'CGO',
            ],
            [
                'nama_negara' => 'Swiss',
                'kode_registrasi_negara' => 'CH',
            ],
            [
                'nama_negara' => 'Ivory Coast',
                'kode_registrasi_negara' => 'CI',
            ],
            [
                'nama_negara' => 'Sri Lanka',
                'kode_registrasi_negara' => 'CL',
            ],
            [
                'nama_negara' => 'Kolombia',
                'kode_registrasi_negara' => 'CO',
            ],
            [
                'nama_negara' => 'Kosta Rika',
                'kode_registrasi_negara' => 'CR',
            ],
            [
                'nama_negara' => 'Kuba',
                'kode_registrasi_negara' => 'CU',
            ],
            [
                'nama_negara' => 'Siprus',
                'kode_registrasi_negara' => 'CY',
            ],
            [
                'nama_negara' => 'Republik Ceko',
                'kode_registrasi_negara' => 'CZ',
            ],
            [
                'nama_negara' => 'Jerman',
                'kode_registrasi_negara' => 'D',
            ],
            [
                'nama_negara' => 'Denmark',
                'kode_registrasi_negara' => 'DK',
            ],
            [
                'nama_negara' => 'Dominican Republic',
                'kode_registrasi_negara' => 'DOM',
            ],
            [
                'nama_negara' => 'Benin',
                'kode_registrasi_negara' => 'DY',
            ],
            [
                'nama_negara' => 'Algeria',
                'kode_registrasi_negara' => 'DZ',
            ],
            [
                'nama_negara' => 'Spain',
                'kode_registrasi_negara' => 'E',
            ],
            [
                'nama_negara' => 'Kenya',
                'kode_registrasi_negara' => 'EAK',
            ],
            [
                'nama_negara' => 'Tanzania',
                'kode_registrasi_negara' => 'EAT',
            ],
            [
                'nama_negara' => 'Uganda',
                'kode_registrasi_negara' => 'EAU',
            ],
            [
                'nama_negara' => 'Zanzibar',
                'kode_registrasi_negara' => 'EAZ',
            ],
            [
                'nama_negara' => 'Ecuador',
                'kode_registrasi_negara' => 'EC',
            ],
            [
                'nama_negara' => 'Eritrea',
                'kode_registrasi_negara' => 'ER',
            ],
            [
                'nama_negara' => 'El Salvador',
                'kode_registrasi_negara' => 'ES',
            ],
            [
                'nama_negara' => 'Estonia',
                'kode_registrasi_negara' => 'EST',
            ],
            [
                'nama_negara' => 'Mesir',
                'kode_registrasi_negara' => 'ET',
            ],
            [
                'nama_negara' => 'Ethiopia',
                'kode_registrasi_negara' => 'ETH',
            ],
            [
                'nama_negara' => 'Prancis',
                'kode_registrasi_negara' => 'F',
            ],
            [
                'nama_negara' => 'Finlandia',
                'kode_registrasi_negara' => 'FIN',
            ],
            [
                'nama_negara' => 'Fiji',
                'kode_registrasi_negara' => 'FJI',
            ],
            [
                'nama_negara' => 'Liechtenstein',
                'kode_registrasi_negara' => 'FL',
            ],
            [
                'nama_negara' => 'Kepuulauan Faroe',
                'kode_registrasi_negara' => 'FO',
            ],
            [
                'nama_negara' => 'Gabon',
                'kode_registrasi_negara' => 'G',
            ],
            [
                'nama_negara' => 'Alderney',
                'kode_registrasi_negara' => 'GBA',
            ],
            [
                'nama_negara' => 'Guernsey',
                'kode_registrasi_negara' => 'GBG',
            ],
            [
                'nama_negara' => 'Jersey',
                'kode_registrasi_negara' => 'GBJ',
            ],
            [
                'nama_negara' => 'Isle of Man',
                'kode_registrasi_negara' => 'GBM',
            ],
            [
                'nama_negara' => 'Gibraltar',
                'kode_registrasi_negara' => 'GBZ',
            ],
            [
                'nama_negara' => 'Guatemala',
                'kode_registrasi_negara' => 'GCA',
            ],
            [
                'nama_negara' => 'Georgia',
                'kode_registrasi_negara' => 'GE',
            ],
            [
                'nama_negara' => 'Ghana',
                'kode_registrasi_negara' => 'GH',
            ],
            [
                'nama_negara' => 'Yunani',
                'kode_registrasi_negara' => 'GR',
            ],
            [
                'nama_negara' => 'Guyana',
                'kode_registrasi_negara' => 'GUY',
            ],
            [
                'nama_negara' => 'Hungaria',
                'kode_registrasi_negara' => 'H',
            ],
            [
                'nama_negara' => 'Yordania',
                'kode_registrasi_negara' => 'HKJ',
            ],
            [
                'nama_negara' => 'Honduras',
                'kode_registrasi_negara' => 'HN',
            ],
            [
                'nama_negara' => 'Kroasia',
                'kode_registrasi_negara' => 'HR',
            ],
            [
                'nama_negara' => 'Italia',
                'kode_registrasi_negara' => 'I',
            ],
            [
                'nama_negara' => 'Israel',
                'kode_registrasi_negara' => 'IL',
            ],
            [
                'nama_negara' => 'India',
                'kode_registrasi_negara' => 'IND',
            ],
            [
                'nama_negara' => 'Iran',
                'kode_registrasi_negara' => 'IR',
            ],
            [
                'nama_negara' => 'Irlandia',
                'kode_registrasi_negara' => 'IRL',
            ],
            [
                'nama_negara' => 'Irak',
                'kode_registrasi_negara' => 'IRQ',
            ],
            [
                'nama_negara' => 'Islandia',
                'kode_registrasi_negara' => 'IS',
            ],
            [
                'nama_negara' => 'Jepang',
                'kode_registrasi_negara' => 'J',
            ],
            [
                'nama_negara' => 'Jamaika',
                'kode_registrasi_negara' => 'JA',
            ],
            [
                'nama_negara' => 'Kamboja',
                'kode_registrasi_negara' => 'K',
            ],
            [
                'nama_negara' => 'Krygyzstan',
                'kode_registrasi_negara' => 'KG',
            ],
            [
                'nama_negara' => 'Arab Saudi',
                'kode_registrasi_negara' => 'KSA',
            ],
            [
                'nama_negara' => 'Kuwait',
                'kode_registrasi_negara' => 'KWT',
            ],
            [
                'nama_negara' => 'Kazakhstan',
                'kode_registrasi_negara' => 'KZ',
            ],
            [
                'nama_negara' => 'Luksemburg',
                'kode_registrasi_negara' => 'L',
            ],
            [
                'nama_negara' => 'Laos',
                'kode_registrasi_negara' => 'LAO',
            ],
            [
                'nama_negara' => 'Libya',
                'kode_registrasi_negara' => 'LAR',
            ],
            [
                'nama_negara' => 'Liberia',
                'kode_registrasi_negara' => 'LB',
            ],
            [
                'nama_negara' => 'Lesotho',
                'kode_registrasi_negara' => 'LS',
            ],
            [
                'nama_negara' => 'Lithuania',
                'kode_registrasi_negara' => 'LT',
            ],
            [
                'nama_negara' => 'Latvia',
                'kode_registrasi_negara' => 'LV',
            ],
            [
                'nama_negara' => 'Malta',
                'kode_registrasi_negara' => 'M',
            ],
            [
                'nama_negara' => 'Maroko',
                'kode_registrasi_negara' => 'MA',
            ],
            [
                'nama_negara' => 'Malaysia',
                'kode_registrasi_negara' => 'MAL',
            ],
            [
                'nama_negara' => 'Monako',
                'kode_registrasi_negara' => 'MC',
            ],
            [
                'nama_negara' => 'Moldova',
                'kode_registrasi_negara' => 'MD',
            ],
            [
                'nama_negara' => 'Meksiko',
                'kode_registrasi_negara' => 'MEX',
            ],
            [
                'nama_negara' => 'Montenegro',
                'kode_registrasi_negara' => 'MNE',
            ],
            [
                'nama_negara' => 'Mongolia',
                'kode_registrasi_negara' => 'MGL',
            ],
            [
                'nama_negara' => 'Mozambik',
                'kode_registrasi_negara' => 'MOC',
            ],
            [
                'nama_negara' => 'Mauritius',
                'kode_registrasi_negara' => 'MS',
            ],
            [
                'nama_negara' => 'Maladewa',
                'kode_registrasi_negara' => 'MV',
            ],
            [
                'nama_negara' => 'Malawi',
                'kode_registrasi_negara' => 'MW',
            ],
            [
                'nama_negara' => 'Norwegia',
                'kode_registrasi_negara' => 'N',
            ],
            [
                'nama_negara' => 'Namibia',
                'kode_registrasi_negara' => 'NAM',
            ],
            [
                'nama_negara' => 'Nauru',
                'kode_registrasi_negara' => 'NAU',
            ],
            [
                'nama_negara' => 'Nepal',
                'kode_registrasi_negara' => 'NEP',
            ],
            [
                'nama_negara' => 'Nikaragua',
                'kode_registrasi_negara' => 'NIC',
            ],
            [
                'nama_negara' => 'Belanda',
                'kode_registrasi_negara' => 'NL',
            ],
            [
                'nama_negara' => 'Makedonia Utara',
                'kode_registrasi_negara' => 'NMK',
            ],
            [
                'nama_negara' => 'Selandia Baru',
                'kode_registrasi_negara' => 'NZ',
            ],
            [
                'nama_negara' => 'Oman',
                'kode_registrasi_negara' => 'OM',
            ],
            [
                'nama_negara' => 'Portugal',
                'kode_registrasi_negara' => 'P',
            ],
            [
                'nama_negara' => 'Panama',
                'kode_registrasi_negara' => 'PA',
            ],
            [
                'nama_negara' => 'Peru',
                'kode_registrasi_negara' => 'PE',
            ],
            [
                'nama_negara' => 'Pakistan',
                'kode_registrasi_negara' => 'PK',
            ],
            [
                'nama_negara' => 'Polandia',
                'kode_registrasi_negara' => 'PL',
            ],
            [
                'nama_negara' => 'Papua Nugini',
                'kode_registrasi_negara' => 'PNG',
            ],
            [
                'nama_negara' => 'Paraguay',
                'kode_registrasi_negara' => 'PY',
            ],
            [
                'nama_negara' => 'Qatar',
                'kode_registrasi_negara' => 'Q',
            ],
            [
                'nama_negara' => 'Argentina',
                'kode_registrasi_negara' => 'RA',
            ],
            [
                'nama_negara' => 'Taiwan',
                'kode_registrasi_negara' => 'RC',
            ],
            [
                'nama_negara' => 'Afrika Tengah',
                'kode_registrasi_negara' => 'RCA',
            ],
            [
                'nama_negara' => 'Republik Kongo',
                'kode_registrasi_negara' => 'RCB',
            ],
            [
                'nama_negara' => 'Chile',
                'kode_registrasi_negara' => 'RCH',
            ],
            [
                'nama_negara' => 'Guinea',
                'kode_registrasi_negara' => 'RG',
            ],
            [
                'nama_negara' => 'Haiti',
                'kode_registrasi_negara' => 'RH',
            ],
            [
                'nama_negara' => 'Indonesia',
                'kode_registrasi_negara' => 'RI',
            ],
            [
                'nama_negara' => 'Mauritania',
                'kode_registrasi_negara' => 'RIM',
            ],
            [
                'nama_negara' => 'Kosovo',
                'kode_registrasi_negara' => 'RKS',
            ],
            [
                'nama_negara' => 'Lebanon',
                'kode_registrasi_negara' => 'RL',
            ],
            [
                'nama_negara' => 'Madagaskar',
                'kode_registrasi_negara' => 'RM',
            ],
            [
                'nama_negara' => 'Mali',
                'kode_registrasi_negara' => 'RMM',
            ],
            [
                'nama_negara' => 'Niger',
                'kode_registrasi_negara' => 'RN',
            ],
            [
                'nama_negara' => 'Rumania',
                'kode_registrasi_negara' => 'RO',
            ],
            [
                'nama_negara' => 'Korea Selatan',
                'kode_registrasi_negara' => 'ROK',
            ],
            [
                'nama_negara' => 'Filipina',
                'kode_registrasi_negara' => 'RP',
            ],
            [
                'nama_negara' => 'San Marino',
                'kode_registrasi_negara' => 'RSM',
            ],
            [
                'nama_negara' => 'Burundi',
                'kode_registrasi_negara' => 'RU',
            ],
            [
                'nama_negara' => 'Rusia',
                'kode_registrasi_negara' => 'RUS',
            ],
            [
                'nama_negara' => 'Rwanda',
                'kode_registrasi_negara' => 'RWA',
            ],
            [
                'nama_negara' => 'Swedia',
                'kode_registrasi_negara' => 'S',
            ],
            [
                'nama_negara' => 'Eswatini',
                'kode_registrasi_negara' => 'SD',
            ],
            [
                'nama_negara' => 'Singapura',
                'kode_registrasi_negara' => 'SGP',
            ],
            [
                'nama_negara' => 'Slovakia',
                'kode_registrasi_negara' => 'SK',
            ],
            [
                'nama_negara' => 'Slovenia',
                'kode_registrasi_negara' => 'SLP',
            ],
            [
                'nama_negara' => 'Suriname',
                'kode_registrasi_negara' => 'SME',
            ],
            [
                'nama_negara' => 'Senegal',
                'kode_registrasi_negara' => 'SN',
            ],
            [
                'nama_negara' => 'Somalia',
                'kode_registrasi_negara' => 'SO',
            ],
            [
                'nama_negara' => 'Serbia',
                'kode_registrasi_negara' => 'SRB',
            ],
            [
                'nama_negara' => 'Sudan',
                'kode_registrasi_negara' => 'SUD',
            ],
            [
                'nama_negara' => 'Seychelles',
                'kode_registrasi_negara' => 'SY',
            ],
            [
                'nama_negara' => 'Suriah',
                'kode_registrasi_negara' => 'SYR',
            ],
            [
                'nama_negara' => 'Thailand',
                'kode_registrasi_negara' => 'T',
            ],
            [
                'nama_negara' => 'Chad',
                'kode_registrasi_negara' => 'TCH',
            ],
            [
                'nama_negara' => 'Togo',
                'kode_registrasi_negara' => 'TG',
            ],
            [
                'nama_negara' => 'Tajikistan',
                'kode_registrasi_negara' => 'TJ',
            ],
            [
                'nama_negara' => 'Turkmenistan',
                'kode_registrasi_negara' => 'TM',
            ],
            [
                'nama_negara' => 'Tunisia',
                'kode_registrasi_negara' => 'TN',
            ],
            [
                'nama_negara' => 'Tonga',
                'kode_registrasi_negara' => 'TO',
            ],
            [
                'nama_negara' => 'Turki',
                'kode_registrasi_negara' => 'TR',
            ],
            [
                'nama_negara' => 'Trinidad dan Tobago',
                'kode_registrasi_negara' => 'TT',
            ],
            [
                'nama_negara' => 'Ukraina',
                'kode_registrasi_negara' => 'UA',
            ],
            [
                'nama_negara' => 'Uni Emirat Arab',
                'kode_registrasi_negara' => 'UAE',
            ],
            [
                'nama_negara' => 'Inggris Raya',
                'kode_registrasi_negara' => 'UK',
            ],
            [
                'nama_negara' => 'Amerika Serikat',
                'kode_registrasi_negara' => 'USA',
            ],
            [
                'nama_negara' => 'Uruguay',
                'kode_registrasi_negara' => 'UY',
            ],
            [
                'nama_negara' => 'Uzbekistan',
                'kode_registrasi_negara' => 'UZ',
            ],
            [
                'nama_negara' => 'Kota Vatikan',
                'kode_registrasi_negara' => 'V',
            ],
            [
                'nama_negara' => 'Vietnam',
                'kode_registrasi_negara' => 'VN',
            ],
            [
                'nama_negara' => 'Gambia',
                'kode_registrasi_negara' => 'WAG',
            ],
            [
                'nama_negara' => 'Sierra Leone',
                'kode_registrasi_negara' => 'WAL',
            ],
            [
                'nama_negara' => 'Nigeria',
                'kode_registrasi_negara' => 'WAN',
            ],
            [
                'nama_negara' => 'Dominika',
                'kode_registrasi_negara' => 'WD',
            ],
            [
                'nama_negara' => 'Grenada',
                'kode_registrasi_negara' => 'WG',
            ],
            [
                'nama_negara' => 'Saint Lucia',
                'kode_registrasi_negara' => 'WL',
            ],
            [
                'nama_negara' => 'Samoa',
                'kode_registrasi_negara' => 'WS',
            ],
            [
                'nama_negara' => 'Saint Vincent and the Grenadines',
                'kode_registrasi_negara' => 'WV',
            ],
            [
                'nama_negara' => 'Yaman',
                'kode_registrasi_negara' => 'YAR',
            ],
            [
                'nama_negara' => 'Venezuela',
                'kode_registrasi_negara' => 'YV',
            ],
            [
                'nama_negara' => 'Zambia',
                'kode_registrasi_negara' => 'Z',
            ],
            [
                'nama_negara' => 'Afrika Selatan',
                'kode_registrasi_negara' => 'ZA',
            ],
            [
                'nama_negara' => 'Zimbabwe',
                'kode_registrasi_negara' => 'ZW',
            ],
        ];

        foreach($kodeNegara as $key=>$user){
            KodePlatNomor::create($user);
        }
    }
}
