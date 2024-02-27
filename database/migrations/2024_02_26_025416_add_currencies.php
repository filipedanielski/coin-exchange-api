<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('currencies')->insert([
            'code' => 'BRL',
            'description' => 'Real Brasileiro',
            'country' => 'br',
        ]);
        DB::table('currencies')->insert([
            'code' => 'USD',
            'description' => 'Dólar Americano',
            'country' => 'us',
        ]);
        DB::table('currencies')->insert([
            'code' => 'EUR',
            'description' => 'Euro',
            'country' => 'eu',
        ]);
        DB::table('currencies')->insert([
            'code' => 'ARS',
            'description' => 'Peso Argentino',
            'country' => 'ar',
        ]);
        DB::table('currencies')->insert([
            'code' => 'AUD',
            'description' => 'Dólar Australiano',
            'country' => 'au',
        ]);
        DB::table('currencies')->insert([
            'code' => 'CAD',
            'description' => 'Dólar Canadense',
            'country' => 'ca',
        ]);
        DB::table('currencies')->insert([
            'code' => 'CHF',
            'description' => 'Franco Suíço',
            'country' => 'ch',
        ]);
        DB::table('currencies')->insert([
            'code' => 'CLP',
            'description' => 'Peso Chileno',
            'country' => 'cl',
        ]);
        DB::table('currencies')->insert([
            'code' => 'DKK',
            'description' => 'Coroa Dinamarquesa',
            'country' => 'dk',
        ]);
        DB::table('currencies')->insert([
            'code' => 'HKD',
            'description' => 'Dólar de Hong Kong',
            'country' => 'hk',
        ]);
        DB::table('currencies')->insert([
            'code' => 'JPY',
            'description' => 'Iene Japonês',
            'country' => 'jp',
        ]);
        DB::table('currencies')->insert([
            'code' => 'MXN',
            'description' => 'Peso Mexicano',
            'country' => 'mx',
        ]);
        DB::table('currencies')->insert([
            'code' => 'SGD',
            'description' => 'Dólar de Cingapura',
            'country' => 'sg',
        ]);
        DB::table('currencies')->insert([
            'code' => 'AED',
            'description' => 'Dirham dos Emirados',
            'country' => 'ae',
        ]);
        DB::table('currencies')->insert([
            'code' => 'BBD',
            'description' => 'Dólar de Barbados',
            'country' => 'bb',
        ]);
        DB::table('currencies')->insert([
            'code' => 'BHD',
            'description' => 'Dinar do Bahrein',
            'country' => 'bh',
        ]);
        DB::table('currencies')->insert([
            'code' => 'CNY',
            'description' => 'Yuan Chinês',
            'country' => 'cn',
        ]);
        DB::table('currencies')->insert([
            'code' => 'CZK',
            'description' => 'Coroa Checa',
            'country' => 'cz',
        ]);
        DB::table('currencies')->insert([
            'code' => 'EGP',
            'description' => 'Libra Egípcia',
            'country' => 'eg',
        ]);
        DB::table('currencies')->insert([
            'code' => 'GBP',
            'description' => 'Libra Esterlina',
            'country' => 'gb',
        ]);
        DB::table('currencies')->insert([
            'code' => 'HUF',
            'description' => 'Florim Húngaro',
            'country' => 'hu',
        ]);
        DB::table('currencies')->insert([
            'code' => 'IDR',
            'description' => 'Rupia Indonésia',
            'country' => 'id',
        ]);
        DB::table('currencies')->insert([
            'code' => 'ILS',
            'description' => 'Novo Shekel Israelense',
            'country' => 'il',
        ]);
        DB::table('currencies')->insert([
            'code' => 'INR',
            'description' => 'Rúpia Indiana',
            'country' => 'in',
        ]);
        DB::table('currencies')->insert([
            'code' => 'ISK',
            'description' => 'Coroa Islandesa',
            'country' => 'is',
        ]);
        DB::table('currencies')->insert([
            'code' => 'JMD',
            'description' => 'Dólar Jamaicano',
            'country' => 'jm',
        ]);
        DB::table('currencies')->insert([
            'code' => 'JOD',
            'description' => 'Dinar Jordaniano',
            'country' => 'jo',
        ]);
        DB::table('currencies')->insert([
            'code' => 'KES',
            'description' => 'Shilling Queniano',
            'country' => 'ke',
        ]);
        DB::table('currencies')->insert([
            'code' => 'KRW',
            'description' => 'Won Sul-Coreano',
            'country' => 'kr',
        ]);
        DB::table('currencies')->insert([
            'code' => 'LBP',
            'description' => 'Libra Libanesa',
            'country' => 'lb',
        ]);
        DB::table('currencies')->insert([
            'code' => 'LKR',
            'description' => 'Rúpia de Sri Lanka',
            'country' => 'lk',
        ]);
        DB::table('currencies')->insert([
            'code' => 'MAD',
            'description' => 'Dirham Marroquino',
            'country' => 'ma',
        ]);
        DB::table('currencies')->insert([
            'code' => 'MYR',
            'description' => 'Ringgit Malaio',
            'country' => 'my',
        ]);
        DB::table('currencies')->insert([
            'code' => 'NAD',
            'description' => 'Dólar Namíbio',
            'country' => 'na',
        ]);
        DB::table('currencies')->insert([
            'code' => 'NOK',
            'description' => 'Coroa Norueguesa',
            'country' => 'no',
        ]);
        DB::table('currencies')->insert([
            'code' => 'NPR',
            'description' => 'Rúpia Nepalesa',
            'country' => 'np',
        ]);
        DB::table('currencies')->insert([
            'code' => 'NZD',
            'description' => 'Dólar Neozelandês',
            'country' => 'nz',
        ]);
        DB::table('currencies')->insert([
            'code' => 'OMR',
            'description' => 'Rial Omanense',
            'country' => 'om',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PAB',
            'description' => 'Balboa Panamenho',
            'country' => 'pa',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PHP',
            'description' => 'Peso Filipino',
            'country' => 'ph',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PKR',
            'description' => 'Rúpia Paquistanesa',
            'country' => 'pk',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PLN',
            'description' => 'Zlóti Polonês',
            'country' => 'pl',
        ]);
        DB::table('currencies')->insert([
            'code' => 'QAR',
            'description' => 'Rial Catarense',
            'country' => 'qa',
        ]);
        DB::table('currencies')->insert([
            'code' => 'RON',
            'description' => 'Leu Romeno',
            'country' => 'ro',
        ]);
        DB::table('currencies')->insert([
            'code' => 'RUB',
            'description' => 'Rublo Russo',
            'country' => 'ru',
        ]);
        DB::table('currencies')->insert([
            'code' => 'SAR',
            'description' => 'Riyal Saudita',
            'country' => 'sa',
        ]);
        DB::table('currencies')->insert([
            'code' => 'SEK',
            'description' => 'Coroa Sueca',
            'country' => 'se',
        ]);
        DB::table('currencies')->insert([
            'code' => 'THB',
            'description' => 'Baht Tailandês',
            'country' => 'th',
        ]);
        DB::table('currencies')->insert([
            'code' => 'TRY',
            'description' => 'Nova Lira Turca',
            'country' => 'tr',
        ]);
        DB::table('currencies')->insert([
            'code' => 'VEF',
            'description' => 'Bolívar Venezuelano',
            'country' => 've',
        ]);
        DB::table('currencies')->insert([
            'code' => 'XAF',
            'description' => 'Franco CFA Central',
            'country' => 'cf',
        ]);
        DB::table('currencies')->insert([
            'code' => 'XCD',
            'description' => 'Dólar do Caribe Oriental',
            'country' => 'kn',
        ]);
        DB::table('currencies')->insert([
            'code' => 'XOF',
            'description' => 'Franco CFA Ocidental',
            'country' => 'sn',
        ]);
        DB::table('currencies')->insert([
            'code' => 'ZAR',
            'description' => 'Rand Sul-Africano',
            'country' => 'za',
        ]);
        DB::table('currencies')->insert([
            'code' => 'TWD',
            'description' => 'Dólar Taiuanês',
            'country' => 'tw',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PYG',
            'description' => 'Guarani Paraguaio',
            'country' => 'py',
        ]);
        DB::table('currencies')->insert([
            'code' => 'UYU',
            'description' => 'Peso Uruguaio',
            'country' => 'uy',
        ]);
        DB::table('currencies')->insert([
            'code' => 'COP',
            'description' => 'Peso Colombiano',
            'country' => 'co',
        ]);
        DB::table('currencies')->insert([
            'code' => 'PEN',
            'description' => 'Sol do Peru',
            'country' => 'pe',
        ]);
        DB::table('currencies')->insert([
            'code' => 'BOB',
            'description' => 'Bolivian',
            'country' => 'bo',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('currencies')->truncate();
    }
};
