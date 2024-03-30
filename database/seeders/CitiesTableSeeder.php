<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesAntoquia = [
            ['city_name' => 'Medellín', 'departament_id' => 2],
            ['city_name' => 'Abejorral', 'departament_id' => 2],
            ['city_name' => 'Abriaquí', 'departament_id' => 2],
            ['city_name' => 'Alejandría', 'departament_id' => 2],
            ['city_name' => 'Amagá', 'departament_id' => 2],
            ['city_name' => 'Amalfi', 'departament_id' => 2],
            ['city_name' => 'Andes', 'departament_id' => 2],
            ['city_name' => 'Angelópolis', 'departament_id' => 2],
            ['city_name' => 'Angostura', 'departament_id' => 2],
            ['city_name' => 'Anorí', 'departament_id' => 2],
            ['city_name' => 'Anza', 'departament_id' => 2],
            ['city_name' => 'Apartadó', 'departament_id' => 2],
            ['city_name' => 'Arboletes', 'departament_id' => 2],
            ['city_name' => 'Argelia', 'departament_id' => 2],
            ['city_name' => 'Armenia', 'departament_id' => 2],
            ['city_name' => 'Barbosa', 'departament_id' => 2],
            ['city_name' => 'Bello', 'departament_id' => 2],
            ['city_name' => 'Betania', 'departament_id' => 2],
            ['city_name' => 'Betulia', 'departament_id' => 2],
            ['city_name' => 'Ciudad Bolívar', 'departament_id' => 2],
            ['city_name' => 'Briceño', 'departament_id' => 2],
            ['city_name' => 'Buriticá', 'departament_id' => 2],
            ['city_name' => 'Cáceres', 'departament_id' => 2],
            ['city_name' => 'Caicedo', 'departament_id' => 2],
            ['city_name' => 'Caldas', 'departament_id' => 2],
            ['city_name' => 'Campamento', 'departament_id' => 2],
            ['city_name' => 'Cañasgordas', 'departament_id' => 2],
            ['city_name' => 'Caracolí', 'departament_id' => 2],
            ['city_name' => 'Caramanta', 'departament_id' => 2],
            ['city_name' => 'Carepa', 'departament_id' => 2],
            ['city_name' => 'Carolina', 'departament_id' => 2],
            ['city_name' => 'Caucasia', 'departament_id' => 2],
            ['city_name' => 'Chigorodó', 'departament_id' => 2],
            ['city_name' => 'Cisneros', 'departament_id' => 2],
            ['city_name' => 'Cocorná', 'departament_id' => 2],
            ['city_name' => 'Concepción', 'departament_id' => 2],
            ['city_name' => 'Concordia', 'departament_id' => 2],
            ['city_name' => 'Copacabana', 'departament_id' => 2],
            ['city_name' => 'Dabeiba', 'departament_id' => 2],
            ['city_name' => 'Don Matías', 'departament_id' => 2],
            ['city_name' => 'Ebéjico', 'departament_id' => 2],
            ['city_name' => 'El Bagre', 'departament_id' => 2],
            ['city_name' => 'Entrerrios', 'departament_id' => 2],
            ['city_name' => 'Envigado', 'departament_id' => 2],
            ['city_name' => 'Fredonia', 'departament_id' => 2],
            ['city_name' => 'Giraldo', 'departament_id' => 2],
            ['city_name' => 'Girardota', 'departament_id' => 2],
            ['city_name' => 'Gómez Plata', 'departament_id' => 2],
            ['city_name' => 'Guadalupe', 'departament_id' => 2],
            ['city_name' => 'Guarne', 'departament_id' => 2],
            ['city_name' => 'Guatapé', 'departament_id' => 2],
            ['city_name' => 'Heliconia', 'departament_id' => 2],
            ['city_name' => 'Hispania', 'departament_id' => 2],
            ['city_name' => 'Itagüí', 'departament_id' => 2],
            ['city_name' => 'Ituango', 'departament_id' => 2],
            ['city_name' => 'Jardín', 'departament_id' => 2],
            ['city_name' => 'Jericó', 'departament_id' => 2],
            ['city_name' => 'La Ceja', 'departament_id' => 2],
            ['city_name' => 'La Estrella', 'departament_id' => 2],
            ['city_name' => 'La Pintada', 'departament_id' => 2],
            ['city_name' => 'La Unión', 'departament_id' => 2],
            ['city_name' => 'Liborina', 'departament_id' => 2],
            ['city_name' => 'Maceo', 'departament_id' => 2],
            ['city_name' => 'Marinilla', 'departament_id' => 2],
            ['city_name' => 'Montebello', 'departament_id' => 2],
            ['city_name' => 'Murindó', 'departament_id' => 2],
            ['city_name' => 'Mutatá', 'departament_id' => 2],
            ['city_name' => 'Nariño', 'departament_id' => 2],
            ['city_name' => 'Necoclí', 'departament_id' => 2],
            ['city_name' => 'Nechí', 'departament_id' => 2],
            ['city_name' => 'Olaya', 'departament_id' => 2],
            ['city_name' => 'Peñol', 'departament_id' => 2],
            ['city_name' => 'Peque', 'departament_id' => 2],
            ['city_name' => 'Pueblorrico', 'departament_id' => 2],
            ['city_name' => 'Puerto Berrío', 'departament_id' => 2],
            ['city_name' => 'Puerto Nare', 'departament_id' => 2],
            ['city_name' => 'Puerto Triunfo', 'departament_id' => 2],
            ['city_name' => 'Remedios', 'departament_id' => 2],
            ['city_name' => 'Retiro', 'departament_id' => 2],
            ['city_name' => 'Rionegro', 'departament_id' => 2],
            ['city_name' => 'Sabanalarga', 'departament_id' => 2],
            ['city_name' => 'Sabaneta', 'departament_id' => 2],
            ['city_name' => 'Salgar', 'departament_id' => 2],
            ['city_name' => 'San Andrés', 'departament_id' => 2],
            ['city_name' => 'San Carlos', 'departament_id' => 2],
            ['city_name' => 'San Francisco', 'departament_id' => 2],
            ['city_name' => 'San Jerónimo', 'departament_id' => 2],
            ['city_name' => 'San José de la Montaña', 'departament_id' => 2],
            ['city_name' => 'San Juan de Urabá', 'departament_id' => 2],
            ['city_name' => 'San Luis', 'departament_id' => 2],
            ['city_name' => 'San Pedro de los Milagros', 'departament_id' => 2],
            ['city_name' => 'San Pedro de Urabá', 'departament_id' => 2],
            ['city_name' => 'San Rafael', 'departament_id' => 2],
            ['city_name' => 'San Roque', 'departament_id' => 2],
            ['city_name' => 'San Vicente', 'departament_id' => 2],
            ['city_name' => 'Santa Bárbara', 'departament_id' => 2],
            ['city_name' => 'Santa Fe de Antioquia', 'departament_id' => 2],
            ['city_name' => 'Santa Rosa de Osos', 'departament_id' => 2],
            ['city_name' => 'Santo Domingo', 'departament_id' => 2],
            ['city_name' => 'El Santuario', 'departament_id' => 2],
            ['city_name' => 'Segovia', 'departament_id' => 2],
            ['city_name' => 'Sonsón', 'departament_id' => 2],
            ['city_name' => 'Sopetrán', 'departament_id' => 2],
            ['city_name' => 'Támesis', 'departament_id' => 2],
            ['city_name' => 'Tarazá', 'departament_id' => 2],
            ['city_name' => 'Tarso', 'departament_id' => 2],
            ['city_name' => 'Titiribí', 'departament_id' => 2],
            ['city_name' => 'Toledo', 'departament_id' => 2],
            ['city_name' => 'Turbo', 'departament_id' => 2],
            ['city_name' => 'Uramita', 'departament_id' => 2],
            ['city_name' => 'Urrao', 'departament_id' => 2],
            ['city_name' => 'Valdivia', 'departament_id' => 2],
            ['city_name' => 'Valparaíso', 'departament_id' => 2],
            ['city_name' => 'Vegachí', 'departament_id' => 2],
            ['city_name' => 'Venecia', 'departament_id' => 2],
            ['city_name' => 'Vigía del Fuerte', 'departament_id' => 2],
            ['city_name' => 'Yalí', 'departament_id' => 2],
            ['city_name' => 'Yarumal', 'departament_id' => 2],
            ['city_name' => 'Yolombó', 'departament_id' => 2],
            ['city_name' => 'Yondó', 'departament_id' => 2],
            ['city_name' => 'Zaragoza', 'departament_id' => 2]
        ];

        DB::table('cities')->insert($citiesAntoquia);

        $citiesAmazonas = [
            [
                'city_name' => 'Leticia',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'El Encanto',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'La Chorrera',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'La Pedrera',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'La Victoria',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'Puerto Arica',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'Puerto Nariño',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'Puerto Santander',
                'departament_id' => 1,
            ],
            [
                'city_name' => 'Tarapacá',
                'departament_id' => 1,
            ],
        ];

        DB::table('cities')->insert($citiesAmazonas);


        $citiesArauca = [
            [
                'city_name' => 'Arauquita',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Cravo Norte',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Fortul',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Puerto Rondón',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Saravena',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Tame',
                'departament_id' => 3,
            ],
            [
                'city_name' => 'Arauca',
                'departament_id' => 3,
            ],
        ];

        DB::table('cities')->insert($citiesArauca);

        $citiesAtlantico = [
            [
                'city_name' => 'Barranquilla',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Baranoa',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Candelaria',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Galapa',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Luruaco',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Malambo',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Manatí',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Piojó',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Polonuevo',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Sabanagrande',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Sabanalarga',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Santa Lucía',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Santo Tomás',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Soledad',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Suan',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Tubará',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Usiacurí',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Juan de Acosta',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Palmar de Varela',
                'departament_id' => 4,
            ],
            [
                'city_name' => 'Campo de La Cruz',
                'departament_id' => 4,
            ],
        ];

        DB::table('cities')->insert($citiesAtlantico);
    }
    }

