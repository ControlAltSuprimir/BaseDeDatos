<?php
$pdo = new PDO('mysql:host=localhost;dbname=matemat1_db_prueba', 'matemat1_trivial_db', 'hurdet-tymqoc-2mIxqe');
$statement = $pdo->prepare('SELECT DISTINCT ano FROM lista_articulos ORDER BY ano DESC');
$statement->execute();

$years = array();
while ($result = $statement->fetch()) {
    array_push($years, $result['ano']);
}
$currentUrl = basename($_SERVER['REQUEST_URI']);
                $maxYear = max($years);
                if (isset($_GET["year_p"])) {
                    $maxYear = $_GET["year_p"];
                }
//echo ($maxYear);
?>
<p> Selecciona un año </p>        
            <select class="form-control" name="select-year" onchange="location = this.value;"  id="select-year">
               
                <?php foreach ($years as $year) { ?>
                    <option value="<?php echo '?year_p='. $year. "#articulos"; ?>"
                           <?php
                    if($maxYear==$year){ echo('selected');}
                     ?>
><?php echo $year; ?></option>';
                <?php } ?>
            </select>
            <br>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=matemat1_db_prueba', 'matemat1_trivial_db', 'hurdet-tymqoc-2mIxqe',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
                $statement = $pdo->prepare('SELECT titulo,autores,revista,ano FROM lista_articulos WHERE ano = ? ');

                $statement->execute(
                    array(
                        $maxYear,
                    )
                );
                $return = array();
                while ($result = $statement->fetch()) {
                    $return[] = array(
                        'autores' => $result['autores'],
                        'titulo' => $result['titulo'],
                        'revista' => $result['revista'],
                        'ano' => $result['ano']
                    );
                } ?>
<br><br>
                <h3>Publicaciones del año <?php echo $maxYear; ?> </h3>
                
                <?php
                    foreach ($return as $row) { ?>
                        <p>
                            <b><?php echo $row["autores"]; ?></b>. <?php echo $row["titulo"]; ?>. <?php echo $row["revista"]; ?> (<?php echo $row["ano"]; ?>).
                        </p>
                    <?php } ?>