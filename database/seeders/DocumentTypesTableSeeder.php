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
        $documentType->document_type_code = "CC";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Tarjeta de Identidad";
        $documentType->document_type_code = "TI";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Cedula de Extranjeria";
        $documentType->document_type_code = "CE";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Otro Documento de Identidad";
        $documentType->document_type_code = "Otro Documento";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Permiso Especial de Permanencia";
        $documentType->document_type_code = "PEP";
        $documentType->save();

        $documentType = new Document_type();

        $documentType->document_type = "Permiso por Proteccion Temporal";
        $documentType->document_type_code = "PEPT";
        $documentType->save();
    }
}
