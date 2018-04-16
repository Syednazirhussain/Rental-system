<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 39081,
                'name' => 'Karlshamn',
                'state_id' => 3397,
            ),
            1 => 
            array (
                'id' => 39082,
                'name' => 'Karlskrona',
                'state_id' => 3397,
            ),
            2 => 
            array (
                'id' => 39083,
                'name' => 'Ronneby',
                'state_id' => 3397,
            ),
            3 => 
            array (
                'id' => 39084,
                'name' => 'Stenungsund',
                'state_id' => 3398,
            ),
            4 => 
            array (
                'id' => 39085,
                'name' => 'Avesta',
                'state_id' => 3399,
            ),
            5 => 
            array (
                'id' => 39086,
                'name' => 'Borlange',
                'state_id' => 3399,
            ),
            6 => 
            array (
                'id' => 39087,
                'name' => 'Falun',
                'state_id' => 3399,
            ),
            7 => 
            array (
                'id' => 39088,
                'name' => 'Hedemora',
                'state_id' => 3399,
            ),
            8 => 
            array (
                'id' => 39089,
                'name' => 'Ludvika',
                'state_id' => 3399,
            ),
            9 => 
            array (
                'id' => 39090,
                'name' => 'Malung',
                'state_id' => 3399,
            ),
            10 => 
            array (
                'id' => 39091,
                'name' => 'Bollnas',
                'state_id' => 3400,
            ),
            11 => 
            array (
                'id' => 39092,
                'name' => 'Bro',
                'state_id' => 3400,
            ),
            12 => 
            array (
                'id' => 39093,
                'name' => 'Gavle',
                'state_id' => 3400,
            ),
            13 => 
            array (
                'id' => 39094,
                'name' => 'Hudiksvall',
                'state_id' => 3400,
            ),
            14 => 
            array (
                'id' => 39095,
                'name' => 'Sandviken',
                'state_id' => 3400,
            ),
            15 => 
            array (
                'id' => 39096,
                'name' => 'Soderhamn',
                'state_id' => 3400,
            ),
            16 => 
            array (
                'id' => 39097,
                'name' => 'Skara',
                'state_id' => 3402,
            ),
            17 => 
            array (
                'id' => 39098,
                'name' => 'Visby',
                'state_id' => 3402,
            ),
            18 => 
            array (
                'id' => 39099,
                'name' => 'Anderstorp',
                'state_id' => 3403,
            ),
            19 => 
            array (
                'id' => 39100,
                'name' => 'Falkenberg',
                'state_id' => 3403,
            ),
            20 => 
            array (
                'id' => 39101,
                'name' => 'Halmstad',
                'state_id' => 3403,
            ),
            21 => 
            array (
                'id' => 39102,
                'name' => 'Ullared',
                'state_id' => 3403,
            ),
            22 => 
            array (
                'id' => 39103,
                'name' => 'Varberg',
                'state_id' => 3403,
            ),
            23 => 
            array (
                'id' => 39104,
                'name' => 'Farjestaden',
                'state_id' => 3404,
            ),
            24 => 
            array (
                'id' => 39105,
                'name' => 'Ostersund',
                'state_id' => 3404,
            ),
            25 => 
            array (
                'id' => 39106,
                'name' => 'Gislaved',
                'state_id' => 3405,
            ),
            26 => 
            array (
                'id' => 39107,
                'name' => 'Jonkoping',
                'state_id' => 3405,
            ),
            27 => 
            array (
                'id' => 39108,
                'name' => 'Nassjo',
                'state_id' => 3405,
            ),
            28 => 
            array (
                'id' => 39109,
                'name' => 'Tranas',
                'state_id' => 3405,
            ),
            29 => 
            array (
                'id' => 39110,
                'name' => 'Varnamo',
                'state_id' => 3405,
            ),
            30 => 
            array (
                'id' => 39111,
                'name' => 'Vetlanda',
                'state_id' => 3405,
            ),
            31 => 
            array (
                'id' => 39112,
                'name' => 'Blomstermala',
                'state_id' => 3406,
            ),
            32 => 
            array (
                'id' => 39113,
                'name' => 'Kalmar',
                'state_id' => 3406,
            ),
            33 => 
            array (
                'id' => 39114,
                'name' => 'Nybro',
                'state_id' => 3406,
            ),
            34 => 
            array (
                'id' => 39115,
                'name' => 'Oskarshamn',
                'state_id' => 3406,
            ),
            35 => 
            array (
                'id' => 39116,
                'name' => 'Solna',
                'state_id' => 3406,
            ),
            36 => 
            array (
                'id' => 39117,
                'name' => 'Torsas',
                'state_id' => 3406,
            ),
            37 => 
            array (
                'id' => 39118,
                'name' => 'Vastervik',
                'state_id' => 3406,
            ),
            38 => 
            array (
                'id' => 39119,
                'name' => 'Habo',
                'state_id' => 3407,
            ),
            39 => 
            array (
                'id' => 39120,
                'name' => 'Limhamn',
                'state_id' => 3407,
            ),
            40 => 
            array (
                'id' => 39121,
                'name' => 'Segeltorp',
                'state_id' => 3407,
            ),
            41 => 
            array (
                'id' => 39122,
                'name' => 'Svedala',
                'state_id' => 3407,
            ),
            42 => 
            array (
                'id' => 39123,
                'name' => 'Ljungby',
                'state_id' => 3408,
            ),
            43 => 
            array (
                'id' => 39124,
                'name' => 'Vaxjo',
                'state_id' => 3408,
            ),
            44 => 
            array (
                'id' => 39125,
                'name' => 'Boden',
                'state_id' => 3409,
            ),
            45 => 
            array (
                'id' => 39126,
                'name' => 'Kiruna',
                'state_id' => 3409,
            ),
            46 => 
            array (
                'id' => 39127,
                'name' => 'Lulea',
                'state_id' => 3409,
            ),
            47 => 
            array (
                'id' => 39128,
                'name' => 'Pitea',
                'state_id' => 3409,
            ),
            48 => 
            array (
                'id' => 39129,
                'name' => 'Askersund',
                'state_id' => 3410,
            ),
            49 => 
            array (
                'id' => 39130,
                'name' => 'Karlskoga',
                'state_id' => 3410,
            ),
            50 => 
            array (
                'id' => 39131,
                'name' => 'Kumla',
                'state_id' => 3410,
            ),
            51 => 
            array (
                'id' => 39132,
                'name' => 'Orebro',
                'state_id' => 3410,
            ),
            52 => 
            array (
                'id' => 39133,
                'name' => 'Finspang',
                'state_id' => 3411,
            ),
            53 => 
            array (
                'id' => 39134,
                'name' => 'Follinge',
                'state_id' => 3411,
            ),
            54 => 
            array (
                'id' => 39135,
                'name' => 'Kisa',
                'state_id' => 3411,
            ),
            55 => 
            array (
                'id' => 39136,
                'name' => 'Linkoping',
                'state_id' => 3411,
            ),
            56 => 
            array (
                'id' => 39137,
                'name' => 'Mjolby',
                'state_id' => 3411,
            ),
            57 => 
            array (
                'id' => 39138,
                'name' => 'Motala',
                'state_id' => 3411,
            ),
            58 => 
            array (
                'id' => 39139,
                'name' => 'Norrkoping',
                'state_id' => 3411,
            ),
            59 => 
            array (
                'id' => 39140,
                'name' => 'Vadstena',
                'state_id' => 3411,
            ),
            60 => 
            array (
                'id' => 39141,
                'name' => 'Skarpovagen',
                'state_id' => 3412,
            ),
            61 => 
            array (
                'id' => 39142,
                'name' => 'Angelholm',
                'state_id' => 3413,
            ),
            62 => 
            array (
                'id' => 39143,
                'name' => 'Arlov',
                'state_id' => 3413,
            ),
            63 => 
            array (
                'id' => 39144,
                'name' => 'Bastad',
                'state_id' => 3413,
            ),
            64 => 
            array (
                'id' => 39145,
                'name' => 'Eslov',
                'state_id' => 3413,
            ),
            65 => 
            array (
                'id' => 39146,
                'name' => 'Hassleholm',
                'state_id' => 3413,
            ),
            66 => 
            array (
                'id' => 39147,
                'name' => 'Helsingborg',
                'state_id' => 3413,
            ),
            67 => 
            array (
                'id' => 39148,
                'name' => 'Hjarup',
                'state_id' => 3413,
            ),
            68 => 
            array (
                'id' => 39149,
                'name' => 'Hoganas',
                'state_id' => 3413,
            ),
            69 => 
            array (
                'id' => 39150,
                'name' => 'Horby',
                'state_id' => 3413,
            ),
            70 => 
            array (
                'id' => 39151,
                'name' => 'Jonstorp',
                'state_id' => 3413,
            ),
            71 => 
            array (
                'id' => 39152,
                'name' => 'Klagstorp',
                'state_id' => 3413,
            ),
            72 => 
            array (
                'id' => 39153,
                'name' => 'Kristianstad',
                'state_id' => 3413,
            ),
            73 => 
            array (
                'id' => 39154,
                'name' => 'Landskrona',
                'state_id' => 3413,
            ),
            74 => 
            array (
                'id' => 39155,
                'name' => 'Lund',
                'state_id' => 3413,
            ),
            75 => 
            array (
                'id' => 39156,
                'name' => 'Malmo',
                'state_id' => 3413,
            ),
            76 => 
            array (
                'id' => 39157,
                'name' => 'Skanor',
                'state_id' => 3413,
            ),
            77 => 
            array (
                'id' => 39158,
                'name' => 'Staffanstorp',
                'state_id' => 3413,
            ),
            78 => 
            array (
                'id' => 39159,
                'name' => 'Trelleborg',
                'state_id' => 3413,
            ),
            79 => 
            array (
                'id' => 39160,
                'name' => 'Ystad',
                'state_id' => 3413,
            ),
            80 => 
            array (
                'id' => 39161,
                'name' => 'Hillerstorp',
                'state_id' => 3414,
            ),
            81 => 
            array (
                'id' => 39162,
                'name' => 'Markaryd',
                'state_id' => 3414,
            ),
            82 => 
            array (
                'id' => 39163,
                'name' => 'Smalandsstenar',
                'state_id' => 3414,
            ),
            83 => 
            array (
                'id' => 39164,
                'name' => 'Eskilstuna',
                'state_id' => 3415,
            ),
            84 => 
            array (
                'id' => 39165,
                'name' => 'Gnesta',
                'state_id' => 3415,
            ),
            85 => 
            array (
                'id' => 39166,
                'name' => 'Katrineholm',
                'state_id' => 3415,
            ),
            86 => 
            array (
                'id' => 39167,
                'name' => 'Nacka Strand',
                'state_id' => 3415,
            ),
            87 => 
            array (
                'id' => 39168,
                'name' => 'Nykoping',
                'state_id' => 3415,
            ),
            88 => 
            array (
                'id' => 39169,
                'name' => 'Strangnas',
                'state_id' => 3415,
            ),
            89 => 
            array (
                'id' => 39170,
                'name' => 'Vingaker',
                'state_id' => 3415,
            ),
            90 => 
            array (
                'id' => 39171,
                'name' => 'Akersberga',
                'state_id' => 3416,
            ),
            91 => 
            array (
                'id' => 39172,
                'name' => 'Boo',
                'state_id' => 3416,
            ),
            92 => 
            array (
                'id' => 39173,
                'name' => 'Bromma',
                'state_id' => 3416,
            ),
            93 => 
            array (
                'id' => 39174,
                'name' => 'Djursholm',
                'state_id' => 3416,
            ),
            94 => 
            array (
                'id' => 39175,
                'name' => 'Hallstavik',
                'state_id' => 3416,
            ),
            95 => 
            array (
                'id' => 39176,
                'name' => 'Jarfalla',
                'state_id' => 3416,
            ),
            96 => 
            array (
                'id' => 39177,
                'name' => 'Johannesfred',
                'state_id' => 3416,
            ),
            97 => 
            array (
                'id' => 39178,
                'name' => 'Lidingo',
                'state_id' => 3416,
            ),
            98 => 
            array (
                'id' => 39179,
                'name' => 'Marsta',
                'state_id' => 3416,
            ),
            99 => 
            array (
                'id' => 39180,
                'name' => 'Norrtalje',
                'state_id' => 3416,
            ),
            100 => 
            array (
                'id' => 39181,
                'name' => 'Norsborg',
                'state_id' => 3416,
            ),
            101 => 
            array (
                'id' => 39182,
                'name' => 'Nynashamn',
                'state_id' => 3416,
            ),
            102 => 
            array (
                'id' => 39183,
                'name' => 'Rosersberg',
                'state_id' => 3416,
            ),
            103 => 
            array (
                'id' => 39184,
                'name' => 'Sodertalje',
                'state_id' => 3416,
            ),
            104 => 
            array (
                'id' => 39185,
                'name' => 'Sollentuna',
                'state_id' => 3416,
            ),
            105 => 
            array (
                'id' => 39186,
                'name' => 'Stockholm',
                'state_id' => 3416,
            ),
            106 => 
            array (
                'id' => 39187,
                'name' => 'Sundbyberg',
                'state_id' => 3416,
            ),
            107 => 
            array (
                'id' => 39188,
                'name' => 'Taby',
                'state_id' => 3416,
            ),
            108 => 
            array (
                'id' => 39189,
                'name' => 'Tumba',
                'state_id' => 3416,
            ),
            109 => 
            array (
                'id' => 39190,
                'name' => 'Upplands-Vasby',
                'state_id' => 3416,
            ),
            110 => 
            array (
                'id' => 39191,
                'name' => 'Vallentuna',
                'state_id' => 3416,
            ),
            111 => 
            array (
                'id' => 39192,
                'name' => 'Vasterhaninge',
                'state_id' => 3416,
            ),
            112 => 
            array (
                'id' => 39193,
                'name' => 'Balsta',
                'state_id' => 3417,
            ),
            113 => 
            array (
                'id' => 39194,
                'name' => 'Enkoping',
                'state_id' => 3417,
            ),
            114 => 
            array (
                'id' => 39195,
                'name' => 'Knivsta',
                'state_id' => 3417,
            ),
            115 => 
            array (
                'id' => 39196,
                'name' => 'Skyttorp',
                'state_id' => 3417,
            ),
            116 => 
            array (
                'id' => 39197,
                'name' => 'Storvreta',
                'state_id' => 3417,
            ),
            117 => 
            array (
                'id' => 39198,
                'name' => 'Uppsala',
                'state_id' => 3417,
            ),
            118 => 
            array (
                'id' => 39199,
                'name' => 'Arvika',
                'state_id' => 3418,
            ),
            119 => 
            array (
                'id' => 39200,
                'name' => 'Hammaro',
                'state_id' => 3418,
            ),
            120 => 
            array (
                'id' => 39201,
                'name' => 'Karlstad',
                'state_id' => 3418,
            ),
            121 => 
            array (
                'id' => 39202,
                'name' => 'Kristinehamn',
                'state_id' => 3418,
            ),
            122 => 
            array (
                'id' => 39203,
                'name' => 'Skoghall',
                'state_id' => 3418,
            ),
            123 => 
            array (
                'id' => 39204,
                'name' => 'Guglingen',
                'state_id' => 3419,
            ),
            124 => 
            array (
                'id' => 39205,
                'name' => 'Robertsfors',
                'state_id' => 3419,
            ),
            125 => 
            array (
                'id' => 39206,
                'name' => 'Skelleftea',
                'state_id' => 3419,
            ),
            126 => 
            array (
                'id' => 39207,
                'name' => 'Umea',
                'state_id' => 3419,
            ),
            127 => 
            array (
                'id' => 39208,
                'name' => 'Gothenburg',
                'state_id' => 3420,
            ),
            128 => 
            array (
                'id' => 39209,
                'name' => 'Kallered',
                'state_id' => 3420,
            ),
            129 => 
            array (
                'id' => 39210,
                'name' => 'Kvanum',
                'state_id' => 3420,
            ),
            130 => 
            array (
                'id' => 39211,
                'name' => 'Timmersdala',
                'state_id' => 3420,
            ),
            131 => 
            array (
                'id' => 39212,
                'name' => 'Harnosand',
                'state_id' => 3421,
            ),
            132 => 
            array (
                'id' => 39213,
                'name' => 'Ornskoldsvik',
                'state_id' => 3421,
            ),
            133 => 
            array (
                'id' => 39214,
                'name' => 'Sundsvall',
                'state_id' => 3421,
            ),
            134 => 
            array (
                'id' => 39215,
                'name' => 'Arboga',
                'state_id' => 3422,
            ),
            135 => 
            array (
                'id' => 39216,
                'name' => 'Fagersta',
                'state_id' => 3422,
            ),
            136 => 
            array (
                'id' => 39217,
                'name' => 'Hallstahammar',
                'state_id' => 3422,
            ),
            137 => 
            array (
                'id' => 39218,
                'name' => 'Koping',
                'state_id' => 3422,
            ),
            138 => 
            array (
                'id' => 39219,
                'name' => 'Sala',
                'state_id' => 3422,
            ),
            139 => 
            array (
                'id' => 39220,
                'name' => 'Vasteras',
                'state_id' => 3422,
            ),
            140 => 
            array (
                'id' => 48315,
                'name' => 'Alvsborgs Lan',
                'state_id' => 3395,
            ),
            141 => 
            array (
                'id' => 48316,
                'name' => 'Angermanland',
                'state_id' => 3396,
            ),
            142 => 
            array (
                'id' => 48317,
                'name' => 'Gaza',
                'state_id' => 3401,
            ),
            143 => 
            array (
                'id' => 48318,
                'name' => 'Vastra Gotaland',
                'state_id' => 3423,
            ),
        ));
        
        
    }
}