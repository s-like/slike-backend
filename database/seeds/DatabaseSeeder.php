<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(AdSettingsTableSeeder::class);
        $this->call(AppLoginPageTableSeeder::class);
        $this->call(AppSettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DriverTableSeeder::class);
        $this->call(HomeSettingsTableSeeder::class);
        $this->call(MailTypesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SocialMediaLinksTableSeeder::class);
        $this->call(SoundsTableSeeder::class);
        $this->call(SponsorsTableSeeder::class);
        $this->call(UpdateVersionNumber::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(LabelsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
    }
}