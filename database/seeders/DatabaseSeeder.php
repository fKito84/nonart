<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Obra;
use App\Models\Stock;
use App\Models\Taller;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        //  USUARIO ADMIN
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'sbainoa@hotmail.com',
            'password' => Hash::make('projecte'),
            'role' => 'admin',
            'phone' => '633333333',
        ]);
        \App\Models\User::create([
            'name' => 'Marta',
            'email' => 'marta.agullo.online@mataro.epiaedu.cat',
            'password' => Hash::make('projecte'),
            'role' => 'client',
            'phone' => '637799999',
        ]);
        \App\Models\User::create([
            'name' => ' Fran',
            'email' => 'alu.francisco.munoz@mataro.epiaedu.cat',
            'password' => Hash::make('projecte'),
            'role' => 'client',
            'phone' => '637799994',
        ]);

        // OBRAS 2 COLECCIONES
        $obrasVidas = [
            ['titulo' => 'Pigues', 'imagen' => '/images/obras/noia_pecas.png', 
            'descripcion' => 'Retrat detallat amb èmfasi en les pigues i la mirada de la noia.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Noia Curiosa', 'imagen' => '/images/obras/noia_curiosa.jpg', 
            'descripcion' => 'Exploració de la profunditat visual i l\'expressió de curiositat.', 'medidas' => '60x70 cm'],
            ['titulo' => 'Fada', 'imagen' => '/images/obras/noia_fada.png',
             'descripcion' => 'Joc de llums i reflexos sobre la pell de una noia que sembla una fada.', 'medidas' => '50x50 cm'],
            ['titulo' => 'Noia Anglesa', 'imagen' => '/images/obras/noia_anglesa.png', 
            'descripcion' => 'Representació de la noia de cabell curt amb introspecció i el buit.', 'medidas' => '80x1000 cm'],
            ['titulo' => 'Noia Apache', 'imagen' => '/images/obras/noia_apache.jpg', 
            'descripcion' => 'L\'absència de so capturada en una imatge d\'una noia descendent d\'una tribu Americana.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Contenta', 'imagen' => '/images/obras/noia_contenta.jpg', 
            'descripcion' => 'La sensació de la noia de felicitat i alegria al rostre.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Colors', 'imagen' => '/images/obras/noia_colors.jpg', 
            'descripcion' => 'Estudi de la il·luminació natural sobre el rostre amb combinació de colors estridents.', 'medidas' => '50x60 cm'],
            ['titulo' => 'Decidida', 'imagen' => '/images/obras/noia_decidida.png', 
            'descripcion' => 'Contrastos marcats i misteri amb l\'expresiò de serietat .', 'medidas' => '50x70 cm'],
            ['titulo' => 'Noia Elegant', 'imagen' => '/images/obras/noia_elegant.png', 
            'descripcion' => 'Colors suaus i una mirada cap al futur.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Desafiant', 'imagen' => '/images/obras/noia_desafiant.jpg', 
            'descripcion' => 'Record de temps passats a través de l\'art ,en un retrat que recorda a un temps pasat
                            on hi habien dones amb la voluntat d\'enfrontar les desigualtats.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Elegant', 'imagen' => '/images/obras/noia_elegant2.png', 
            'descripcion' => 'Perspectiva i distància emocional d\'una noia que recorda a una elegant actriu de cinema .', 'medidas' => '50x70 cm'],
            ['titulo' => 'Geisha', 'imagen' => '/images/obras/noia_geisha.png', 
            'descripcion' => 'La delicadesa de l\'ésser humà en la imatge d\'una geisha provocadora.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Malalta', 'imagen' => '/images/obras/noia_malalta.png', 
            'descripcion' => 'Poder i determinació en el traç d\'una dona que pateix una malaltia .', 'medidas' => '50x60 cm'],
            ['titulo' => 'Noia Mexicana', 'imagen' => '/images/obras/noia_mexicana.png', 
            'descripcion' => 'Vincle entre elements i emocions d\'aquesta dona gran del interior de Mèxic.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Sincera', 'imagen' => '/images/obras/noia_sincera.png', 
            'descripcion' => 'Espai negatiu i minimalisme emocional de la cara d\'aquesta dona amb mirada trista i sincera.', 'medidas' => '50x70 cm'],
            ['titulo' => 'Bessones', 'imagen' => '/images/obras/noia_bessones.png', 
            'descripcion' => 'Espai de dos germanes, minimalisme emocional del costat d\'aquestes dones amb miradestant iguals i diferents a la vegada.', 'medidas' => '150x70 cm'],
        ];

        foreach ($obrasVidas as $item) {
            Obra::create([
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'tecnica' => 'Tècnica mixta',
                'medidas' => $item['medidas'],
                'precio' => rand(150, 500),
                'coleccion' => 'Vidas',
                'disponible' => true,
                'imagen' => $item['imagen'],
            ]);
        }

        
        $obrasEpidermis = [
            ['titulo' => 'Epidermis Origen', 'imagen' => '/images/obras/epidermis0.png', 'descripcion' => 'L\'inici de la textura i la forma 
                                                                                        ,es on es forma la vida.', 'medidas' => '50x90 cm'],
            ['titulo' => 'Epidermis Textura del cos', 'imagen' => '/images/obras/epidermis1.png',
                'descripcion' => 'Relleus marcats que conviden al tacte d\'un cos humà.', 'medidas' => '60x60 cm'],
            ['titulo' => 'Epidermis Porus', 'imagen' => '/images/obras/epidermis2.png', 
                'descripcion' => 'Detall del costat de la pell humana .', 'medidas' => '50x90 cm'],
            ['titulo' => 'Epidermis Cicatriu', 'imagen' => '/images/obras/epidermis3.png',
             'descripcion' => 'Història i marques del temps pel cos i la pell.', 'medidas' => '60x60 cm'],
            ['titulo' => 'Epidermis Capes', 'imagen' => '/images/obras/epidermis4.png',
                'descripcion' => 'Superposició de colors i matisos foscos que representen les parts fosques que superem.', 'medidas' => '60x60 cm'],
            ['titulo' => 'Epidermis Tacte', 'imagen' => '/images/obras/epidermis5.png', 
                'descripcion' => 'Representació visual de la sensació tèrmica.', 'medidas' => '60x60 cm'],
            ['titulo' => 'Epidermis Identitat', 'imagen' => '/images/obras/epidermis6.png', 
                 'descripcion' => 'La pell com a mirall de l\'ànima deixant veure les parts mes guardades.', 'medidas' => '50x120 cm'],
            ['titulo' => 'Epidermis Final', 'imagen' => '/images/obras/epidermis7.png', 
                'descripcion' => 'Cloenda de la sèrie sobre la superfície ,mostrant que el cos pot ser mes coses del que pensem.', 'medidas' => '70x50 cm'],
        ];

        foreach ($obrasEpidermis as $item) {
            Obra::create([
                'titulo' => $item['titulo'],
                'descripcion' => $item['descripcion'],
                'tecnica' => 'Acrílic',
                'medidas' => $item['medidas'],
                'precio' => rand(200, 600),
                'coleccion' => 'Epidermis',
                'disponible' => true,
                'imagen' => $item['imagen'],
            ]);
        }

      //   TALLERES 
        \App\Models\Taller::create([
            'nom' => 'Art and Wine',
            'descripcio' => 'Taller de pintura acrílica amb pica pica y vi per amenitzar el taller,
                             per compartir amb amics o invidual i disfrutar d\'aquesta experiencia unica .',
            'tecnica' => 'oleo',
            'duracio_hores' => 2.5,
            'capacitat_max' => 20,
            'preu' => 35.00,
            'actiu' => true
        ]);

        \App\Models\Taller::create([
            'nom' => 'Pintura Acrílica per a Nens',
            'descripcio' => 'Taller creatiu enfocat a els mes petits per l\'exploració del color.',
            'tecnica' => 'acrilica',
            'duracio_hores' => 2.5,
            'capacitat_max' => 10,
            'preu' => 20.00,
            'actiu' => true
        ]);

        \App\Models\Taller::create([
            'nom' => 'Taller Aquareles',
            'descripcio' => 'Introducció a les técniques de transparencia y aigua amb acuarel.la.',
            'tecnica' => 'aquarela',
            'duracio_hores' => 2.5,
            'capacitat_max' => 20,
            'preu' => 25.00,
            'actiu' => true
        ]);

        /// STOCK
        $materials = [

            ['nom_material' => 'Pincel redondo #2', 'descripcio' => 'Pincel de detalle','tecnica' => 'false', 'quantitat' => 35,  'reutilitzable' => true, 'preu_unitat' => 3.50],
            ['nom_material' => 'Pincel plano #8', 'descripcio' => 'Pincel para fondos y trazos rectos', 'tecnica' => 'false', 'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 4.20],
            ['nom_material' => 'Pincel lengua de gato #10', 'descripcio' => 'Pincel versátil para difuminar','tecnica' => 'false',  'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 5.00],
            ['nom_material' => 'Pincel abanico #4', 'descripcio' => 'Ideal para texturas y follaje', 'tecnica' => 'false', 'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 4.80],
            ['nom_material' => 'Pincel liner #00', 'descripcio' => 'Pincel extrafino para líneas largas', 'tecnica' => 'false', 'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 2.90],

            ['nom_material' => 'Paleta de plástico con pocillos', 'descripcio' => 'Ideal para acrílico y acuarela', 'tecnica' => 'false',  'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 2.50],
            ['nom_material' => 'Caballete de mesa', 'descripcio' => 'Soporte de madera para lienzos pequeños/medianos', 'tecnica' => 'false',  'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 18.00],
            ['nom_material' => 'Espátula de metal', 'descripcio' => 'Para mezclar pintura en paleta o texturas','tecnica' => 'false',  'quantitat' => 35, 'reutilitzable' => true, 'preu_unitat' => 4.50],

   
            ['nom_material' => 'Óleo 12ml - Blanco', 'descripcio' => 'Tubo mini básico','tecnica' => 'oleo',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.50],
            ['nom_material' => 'Óleo 12ml - Amarillo', 'descripcio' => 'Tubo mini básico','tecnica' =>'oleo',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.50],
            ['nom_material' => 'Óleo 12ml - Rojo', 'descripcio' => 'Tubo mini básico','tecnica' =>'oleo',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.50],
            ['nom_material' => 'Óleo 12ml - Azul', 'descripcio' => 'Tubo mini básico', 'tecnica' =>'oleo', 'quantitat' => 75, 'reutilitzable' =>false , 'preu_unitat' => 1.50],
            ['nom_material' => 'Óleo 12ml - Verde', 'descripcio' => 'Tubo mini básico','tecnica' => 'oleo',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.50],
            ['nom_material' => 'Óleo 12ml - Negro', 'descripcio' => 'Tubo mini básico', 'tecnica' =>'oleo', 'quantitat' =>75, 'reutilitzable' => false, 'preu_unitat' => 1.50],

            ['nom_material' => 'Acrílico 12ml - Blanco', 'descripcio' => 'Tubo mini primario','tecnica' => 'acrilica',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.20],
            ['nom_material' => 'Acrílico 12ml - Amarillo', 'descripcio' => 'Tubo mini primario','tecnica' => 'acrilica', 'quantitat' =>75, 'reutilitzable' => false, 'preu_unitat' => 1.20],
            ['nom_material' => 'Acrílico 12ml - Rojo', 'descripcio' => 'Tubo mini primario', 'tecnica' =>'acrilica', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.20],
            ['nom_material' => 'Acrílico 12ml - Azul', 'descripcio' => 'Tubo mini primario', 'tecnica' =>'acrilica', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.20],
            ['nom_material' => 'Acrílico 12ml - Negro', 'descripcio' => 'Tubo mini primario', 'tecnica' => 'acrilica', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 1.20],

            ['nom_material' => 'Godet Acuarela - Blanco', 'descripcio' => 'Pastilla formato viaje','tecnica' => 'aquarela',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 0.90],
            ['nom_material' => 'Godet Acuarela - Amarillo', 'descripcio' => 'Pastilla formato viaje', 'tecnica' => 'aquarela', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 0.90],
            ['nom_material' => 'Godet Acuarela - Rojo', 'descripcio' => 'Pastilla formato viaje', 'tecnica' => 'aquarela', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 0.90],
            ['nom_material' => 'Godet Acuarela - Azul', 'descripcio' => 'Pastilla formato viaje', 'tecnica' => 'aquarela', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 0.90],
            ['nom_material' => 'Godet Acuarela - Negro', 'descripcio' => 'Pastilla formato viaje','tecnica' => 'aquarela', 'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 0.90],

            
            ['nom_material' => 'Lienzo 35x25', 'descripcio' => 'Bastidor de madera con tela de algodón imprimada','tecnica' => 'false',  'quantitat' => 75, 'reutilitzable' => false, 'preu_unitat' => 4.50],
        ];

        foreach ($materials as $material) {
            Stock::create([
                'nom_material' => $material['nom_material'],
                'descripcio' => $material['descripcio'],
                'tecnica' => $material['tecnica'],
                'quantitat' => $material['quantitat'],
                'preu_unitat' => $material['preu_unitat'],
                'proveidor' => 'Abacus', // 
                'reutilitzable' => $material['reutilitzable'],
            ]);
        }
    }
}
