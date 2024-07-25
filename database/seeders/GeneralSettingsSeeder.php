<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define data to be seeded
        $settings = [
            'id' => 1,
            'site_name' => 'MIKOPOCHAP',
            'cur_text' => 'TZS',
            'cur_sym' => 'TZS',
            'email_from' => '',
            'email_template' => '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n...',
            'sms_body' => 'hi {{fullname}} ({{username}}), {{message}}',
            'sms_from' => 'MikopoChap',
            'base_color' => '96E148',
            'mail_config' => '{"name":"php"}',
            'sms_config' => '{"name":"nexmo","clickatell":{"api_key":"----------------"},"infobip":{"username":"------------8888888","password":"-----------------"},"message_bird":{"api_key":"-------------------"},"nexmo":{"api_key":"----------------------","api_secret":"----------------------"},"sms_broadcast":{"username":"----------------------","password":"-----------------------------"},"twilio":{"account_sid":"-----------------------","auth_token":"---------------------------","from":"----------------------"},"text_magic":{"username":"-----------------------","apiv2_key":"-------------------------------"},"custom":{"method":"get","url":"https:\\/\\/hostname\\/demo-api-v1","headers":{"name":["api_key"],"value":["test_api 555"]},"body":{"name":["from_number"],"value":["5657545757"]}}}',
            'push_configuration' => NULL,
            'global_shortcodes' => '{\n    "site_name":"Name of your site",\n    "site_currency":"Currency of your site",\n    "currency_symbol":"Symbol of currency"\n}',
            'kv' => 0,
            'ev' => 1,
            'en' => 1,
            'sv' => 0,
            'sn' => 1,
            'pn' => 0,
            'force_ssl' => 0,
            'maintenance_mode' => 0,
            'secure_password' => 0,
            'agree' => 1,
            'multi_language' => 1,
            'registration' => 1,
            'active_template' => 'basic',
            'system_info' => '{"version":"2.1","details":""}',
            'system_customized' => 0,
            'last_cron' => '2024-05-01 12:44:14',
            'socialite_credentials' => '{"google":{"client_id":"157973156918-1lk2892pttn264pstis089cpo2pi80oc.apps.googleusercontent.com","client_secret":"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","status":1},"facebook":{"client_id":"1722606658114776","client_secret":"ecb94d75bf34bff9f6b44c6f93d7fd0a","status":1},"linkedin":{"client_id":"868mv3jobt5bqq","client_secret":"2GYeQjyzyhavFVr4","status":1}}',
            'created_at' => '2024-06-07 04:50:17',
            'updated_at' => '2024-06-07 04:50:17',
        ];

        // Insert data into the general_settings table
        GeneralSetting::create($settings);
    }
}
