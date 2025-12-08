<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact.address', 'Sample Address Line 1, Sample Address Line 2, Tamilnadu - 641016');
        $this->migrator->add('contact.phone', '(+91) 81222 21166');
        $this->migrator->add('contact.email', 'support@hansofttechnologies.com');
    }
};
