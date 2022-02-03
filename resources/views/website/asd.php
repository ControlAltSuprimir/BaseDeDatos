<?php
            
            $host = '127.0.0.1'; //or localhost
            $database = 'depto_mat';
            $port = 3306;
            $user = 'root';
            $password = '';
            
            $currentUrl = basename($_SERVER['REQUEST_URI']);
            $academicos = [];
            $articulos = [];
            
            if (empty($_GET['academico'])) {
                $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
                //$pdo = new PDO('mysql:host=localhost;dbname=matemat1_db_prueba', 'matemat1_trivial_db','hurdet-tymqoc-2mIxqe');
                $statement = $pdo->prepare('SELECT academicos.estudios, academicos.area_investigacion, academicos.id_Persona, personas.email, personas.primer_apellido, personas.segundo_apellido, personas.primer_nombre,personas.segundo_nombre,personas.id FROM academicos INNER JOIN personas ON personas.id=academicos.id_Persona WHERE academicos.is_valid = 1');
                $statement->execute();
            
                while ($result = $statement->fetch()) {
                    $leAcademico = [
                        'nombre' =>
                        $result['primer_apellido'] .
                            ' ' .
                            $result['segundo_apellido'] .
                            ', ' .
                            $result['primer_nombre'] .
                            '
                        ' .
                        $result['segundo_nombre'] ,
                        'area' =>$result['area_investigacion'],
                        'estudios' =>$result['estudios'],
                        'id' => $result['id_Persona'],
                        'email' => $result['email'],
                    ];
                    array_push($academicos, $leAcademico);
                }
                sort($academicos);
                echo '<h3> Equipo del Departamento </h3>';
            
                foreach ($academicos as $academico) {
                    echo '<p><a href="' . $currentUrl . '?academico=' . $academico['id'] . '">' .$academico['nombre'] . '</a>, '.$academico['estudios']. '. ' .$academico['area'] . '. Correo:' . $academico['email'] . '</p>';
                }
            
                echo '<br>';
            } else {
                //echo 'hola';
                $maxAcademico = $_GET['academico'];
                //echo $maxAcademico;
                $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
                $getProfile = $pdo->prepare('SELECT personas.email,personas.primer_nombre, personas.segundo_nombre,personas.primer_apellido,personas.segundo_apellido,academicos.estudios,academicos.area_investigacion, academicos.jerarquia, academicos.carrera FROM personas INNER JOIN academicos ON academicos.id_Persona=personas.id WHERE (academicos.is_valid=1 AND academicos.id_Persona=?)');
                $getProfile->execute([$maxAcademico]);

                $profile= $getProfile->fetch();
                echo '<h1>'.$profile['primer_nombre'].' '.$profile['segundo_nombre'].' '.$profile['primer_apellido'].' '.$profile['segundo_apellido'].' </h1>';
                echo '<p>'.$profile['estudios'].'</p>';
                echo '<p>Área de Investigación: '.$profile['area_investigacion'].'</p>';
                echo ($profile['carrera']=='' ? '': '<p>'.$profile['carrera'].'</p>');
                echo '<p>Email: '.$profile['email'].'</p>';

                echo '<br> <hr>';

                //$pdo = new PDO('mysql:host=localhost;dbname=matemat1_db_prueba', 'matemat1_trivial_db', 'hurdet-tymqoc-2mIxqe');
                //$statementArticulos = $pdo->prepare('SELECT persona_articulo.id,persona_articulo.id_Articulo, articulos.titulo, articulos.fecha_publicacion, articulos.id, revistas.nombre, revistas.id  FROM persona_articulo INNER JOIN articulos ON articulos.id=persona_articulo.id_Articulo WHERE (articulos.is_valid=1 AND persona_articulo.is_valid=1 AND revistas.id=articulos.id_Revista AND persona_articulo.id_Persona= ?) ORDER BY articulos.fecha_publicacion DESC');
                $statementArticulos = $pdo->prepare('SELECT persona_articulo.id,persona_articulo.id_Articulo, articulos.titulo, articulos.fecha_publicacion, articulos.id, revistas.nombre, revistas.id  FROM articulos INNER JOIN persona_articulo ON articulos.id=persona_articulo.id_Articulo INNER JOIN revistas ON articulos.id_Revista=revistas.id WHERE (articulos.is_valid=1 AND persona_articulo.is_valid=1 AND persona_articulo.id_Persona= ?) ORDER BY articulos.fecha_publicacion DESC');
                $statementArticulos->execute([$maxAcademico]);
            
                while ($result = $statementArticulos->fetch()) {
                    $statementAutores = $pdo->prepare('SELECT persona_articulo.id_Articulo,personas.id,personas.primer_apellido, personas.segundo_apellido, personas.primer_nombre,personas.segundo_nombre  FROM persona_articulo INNER JOIN personas ON personas.id=persona_articulo.id_Persona WHERE (personas.is_valid=1 AND persona_articulo.is_valid=1 AND persona_articulo.id_Articulo= ?) ORDER BY personas.primer_apellido ASC');
                    $statementAutores->execute([$result['id_Articulo']]);
            
                    $autores = [];
            
                    while ($authorResult = $statementAutores->fetch()) {
                        $autores[] = $authorResult['primer_apellido'] . ' ' . $authorResult['segundo_apellido'] . ', ' . $authorResult['primer_nombre'] . ' ' . $authorResult['segundo_nombre'];
                    }
            
                    $leArticulo = [
                        'id' => $result['id'],
                        'autores' => implode('; ', $autores),
                        'titulo' => $result['titulo'],
                        'fecha' => $result['fecha_publicacion'],
                        'revista' => $result['nombre'],
                    ];
                    array_push($articulos, $leArticulo);
                }
                echo '<h3> Artículos Publicados </h3>';
            
                foreach ($articulos as $articulo) {
                    echo '<p>' . '<b>' . $articulo['autores'] . '</b>. ' . '<i>' . $articulo['titulo'] . '</i>' . '.  ' . $articulo['revista'] . '. ' . $articulo['fecha'] . '.' . '</p>';
                }
            
                echo '<br>';
                //
            
                $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
                //$pdo = new PDO('mysql:host=localhost;dbname=matemat1_db_prueba', 'matemat1_trivial_db', 'hurdet-tymqoc-2mIxqe');
                //$statementArticulos = $pdo->prepare('SELECT persona_articulo.id,persona_articulo.id_Articulo, articulos.titulo, articulos.fecha_publicacion, articulos.id, revistas.nombre, revistas.id  FROM persona_articulo INNER JOIN articulos ON articulos.id=persona_articulo.id_Articulo WHERE (articulos.is_valid=1 AND persona_articulo.is_valid=1 AND revistas.id=articulos.id_Revista AND persona_articulo.id_Persona= ?) ORDER BY articulos.fecha_publicacion DESC');
                $statementProyectos = $pdo->prepare('SELECT proyectos_personas.id, proyectos_personas.id_proyecto, proyectos.titulo, proyectos.codigo_proyecto, proyectos.comienzo, proyectos.termino, proyectos.tipo_proyecto, personas.primer_nombre, personas.segundo_nombre, personas.primer_apellido,personas.segundo_apellido  FROM proyectos INNER JOIN proyectos_personas ON proyectos.id=proyectos_personas.id_proyecto INNER JOIN personas ON proyectos.investigador_responsable=personas.id WHERE (personas.is_valid=1 AND proyectos_personas.is_valid=1 AND proyectos_personas.id_persona= ?) ORDER BY proyectos.comienzo DESC');
                $statementProyectos->execute([$maxAcademico]);

                $proyectos=[];
            
                while ($result = $statementProyectos->fetch()) {
                    /*
                    $statementAutores = $pdo->prepare('SELECT persona_articulo.id_Articulo,personas.id,personas.primer_apellido, personas.segundo_apellido, personas.primer_nombre,personas.segundo_nombre  FROM persona_articulo INNER JOIN personas ON personas.id=persona_articulo.id_Persona WHERE (personas.is_valid=1 AND persona_articulo.is_valid=1 AND persona_articulo.id_Articulo= ?) ORDER BY personas.primer_apellido ASC');
                    $statementAutores->execute([$result['id_Articulo']]);
            
                    $autores = [];
            
                    while ($authorResult = $statementAutores->fetch()) {
                        $autores[] = $authorResult['primer_apellido'] . ' ' . $authorResult['segundo_apellido'] . ', ' . $authorResult['primer_nombre'] . ' ' . $authorResult['segundo_nombre'];
                    }
                    */
            
                    $leProyecto = [
                        'id' => $result['id'],
                        //'autores' => implode('; ', $autores),
                        'titulo' => $result['titulo'],
                        'fecha' => '('. date('Y', strtotime($result['comienzo']))  . '-' . date('Y', strtotime($result['termino'])) .')',
                        'tipo' => $result['tipo_proyecto'],
                        'codigo' => $result['codigo_proyecto'],
                        'responsable' => $result['primer_apellido'].' ' .$result['segundo_apellido']. ', '.$result['primer_nombre'].' '. $result['segundo_nombre'],
                    ];
                    array_push($proyectos, $leProyecto);
                }
                echo '<h3> Proyectos </h3>';
            
                foreach ($proyectos as $proyecto) {
                    echo '<p>' . '<i>' . $proyecto['titulo'] . '</i>' . '.  Investigador Responsable:' . $proyecto['responsable'] . '. '. ($proyecto['tipo']=='' ? '':$proyecto['tipo']. ', ').($proyecto['codigo']=='' ? '':' Código: '. $proyecto['codigo'].  ' '). ' ' . ($proyecto['fecha']=='' ? '': $proyecto['fecha']). '.' . '</p>';
                }
            
                echo '<br>';
            }
            ?>