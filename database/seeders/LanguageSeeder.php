<?php
/**
 *  database/seeders/LanguageSeeder.php
 *
 * Date-Time: 04.06.21
 * Time: 10:28
 * @author suspended values
 */
namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Class LanguageSeeder
 * @package Database\Seeders
 */
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Language array
        $languages = [
            [
                'title' => 'English',
                'locale' => 'en',
                'status' => true,
                'default' => true
            ],
            [
                'title' => 'Русский',
                'locale' => 'ru',
                'status' => true,
                'default' => false
            ]
        ];

        // Insert Languages
        Language::insert($languages);
    }
}
