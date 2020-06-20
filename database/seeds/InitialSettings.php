<?php

use Illuminate\Database\Seeder;
use App\Setting;

class InitialSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Campos iniciales para estudiantes
        Setting::create([
            'name' => 'student_fields',
            'description' => 'Campos disponibles para estudiantes',
            'value' => json_encode([
                "name" => [
                    "label" => "Nombre",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "text",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required",
                    "editable" => false,
                    "order" => 0,
                    "visible_in_table" => true,
                ],
                "authorized_persons" => [
                    "label" => "Personas autorizadas",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "text",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required",
                    "editable" => false,
                    "order" => 1,
                    "visible_in_table" => true,
                ],
                "curp" => [
                    "label" => "CURP",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "text",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required",
                    "editable" => false,
                    "order" => 2,
                    "visible_in_table" => true,
                ],
                "tutors" => [
                    "label" => "Tutores",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "select",
                    "multiple" => true,
                    "options" => [
                        '1' => 'Primer valor',
                        '2' => 'Segundo valor',
                        '3' => 'Tercer valor'
                    ],
                    "visible" => false,
                    "required" => false,
                    "rules" => "",
                    "editable" => false,
                    "order" => 3,
                    "visible_in_table" => false,
                ]
            ])
        ]);
        // Campos iniciales para tutores
        Setting::create([
            'name' => 'tutor_fields',
            'description' => 'Campos disponibles para tutores',
            'value' => json_encode([
                "name" => [
                    "label" => "Nombre",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "text",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required",
                    "editable" => false,
                    "order" => 0
                ],
                "email" => [
                    "label" => "Correo electrónico",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "email",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required|email",
                    "editable" => false,
                    "order" => 1
                ],
                "phone" => [
                    "label" => "Teléfono",
                    "placeholder" => "",
                    "value" => "",
                    "type" => "phone",
                    "visible" => true,
                    "required" => true,
                    "rules" => "required|phone",
                    "editable" => false,
                    "order" => 2
                ]
            ])
        ]);

        Setting::create([
            'name' => 'ticket_header',
            'description' => 'Encabezado del ticket',
            'value' => '<p style="text-align: center;font-size:12px;margin-bottom:0;">COLEGIO HISPANIA A,C</p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">Un lugar para aprenser a ser</p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">PREESCOLAR PRIMARIA SECUNDARIA</p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">Ave. de los pinos, Los Pinos de Nares TIJUANA 825</p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">Correo: <a href="mailto:colegio_hispania@hotmail.com">colegio_hispania@hotmail.com</a></p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">Tel.6895181</p>'
        ]);

        Setting::create([
            'name' => 'ticket_footer',
            'description' => 'Pie de pagina del ticket',
            'value' => '<p style="text-align: center;font-size:12px;margin-bottom:0;">Agradecemos su confianza</p>
            <p style="text-align: center;font-size:12px;margin-bottom:0;">GRACIAS</p>'
        ]);

        Setting::create([
            'name' => 'money_currency',
            'description' => 'Tipo de cambio',
            'value' => '18.50'
        ]);

        Setting::create([
            'name' => 'company_name',
            'description' => 'Nombre del colegio',
            'value' => 'Brand Idea'
        ]);

        Setting::create([
            'name' => 'logo',
            'description' => 'Logotipo',
            'value' => 'https://brandidea.com.mx/assets/img/logo.png'
        ]);
    }
}
