<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areasLaborales = [
            ["work_area" => "Administración y Gestión Empresarial"],
            ["work_area" => "Recursos Humanos y Gestión del Talento"],
            ["work_area" => "Dirección y Coordinación de Equipos"],
            ["work_area" => "Marketing Estratégico y Digital"],
            ["work_area" => "Ventas y Desarrollo Comercial"],
            ["work_area" => "Finanzas Corporativas y Contabilidad"],
            ["work_area" => "Tecnología de la Información (TI) y Desarrollo de Software"],
            ["work_area" => "Ingeniería Civil y Construcción"],
            ["work_area" => "Ingeniería Eléctrica y Electrónica"],
            ["work_area" => "Ingeniería Mecánica y Automotriz"],
            ["work_area" => "Ingeniería Industrial y Manufactura"],
            ["work_area" => "Ingeniería Química y Procesos"],
            ["work_area" => "Investigación y Desarrollo (I+D) en Ciencia y Tecnología"],
            ["work_area" => "Servicios de Consultoría Empresarial"],
            ["work_area" => "Gestión de Proyectos y Planificación Estratégica"],
            ["work_area" => "Logística y Cadena de Suministro"],
            ["work_area" => "Comercio Internacional y Exportaciones"],
            ["work_area" => "Turismo y Hospitalidad"],
            ["work_area" => "Educación y Formación Profesional"],
            ["work_area" => "Servicios de Salud y Asistencia Médica"],
            ["work_area" => "Medios de Comunicación y Periodismo"],
            ["work_area" => "Diseño Gráfico y Multimedia"],
            ["work_area" => "Arquitectura y Diseño Urbano"],
            ["work_area" => "Derecho y Asesoría Legal"],
            ["work_area" => "Seguridad y Protección Empresarial"],
            ["work_area" => "Energías Renovables y Sostenibilidad Ambiental"],
            ["work_area" => "Agricultura y Desarrollo Rural"],
            ["work_area" => "Investigación de Mercado y Análisis de Datos"],
            ["work_area" => "Artes Escénicas y Producción Audiovisual"],
            ["work_area" => "Servicios Sociales y Desarrollo Comunitario"]
        ];

        DB::table('work_areas')->insert($areasLaborales);
    }
}
