<?php

namespace Database\Seeders;

use App\Models\Document_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $documentType = new Document_type();

        $documentType->document_type = "Cedula de Ciudadania";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Tarjeta de Identidad";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Cedula de Extranjeria";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Otro Documento de Identidad";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Permiso Especial de Permanencia";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Permiso por Proteccion Temporal";
        $documentType->save();
    }
}
