<div class="p-5 m-5">
    <p>Filtros SQL</p>
    <form method="post">
        <button type="submit" name="crescente">A-Z</button>
        <button type="submit" name="decrescente">Z-A</button>
        <button type="submit" name="outro">Outro</button>

        <select class="form-select" aria-label="Default select example">
        <option selected>Escolhao Ator...</option>
        <?php
            require 'conexao.php';
            if (!$_POST) {
                $sql = "SELECT * FROM actor";
            } else {
                //depois
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'. $row["actor_id"] .'"> '. $row["first_name"] .' </option>' ;
                }
            } else {
                echo " <option value='0'>Nenhum encontradi</option>";
            }
            $conn->close();
        ?>
    </select>

    </form>

    <div>
        <div class="container mt-3">
            <h2>Lista dos Atores </h2>
            <p>Confira a lista dos piores atores de atualidade</p>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Ultima atualização</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //se não é POST carrega tudo
                    require 'conexao.php';
                    if (!$_POST) {
                        $sql = "SELECT * FROM actor";
                    } else {
                        if (isset($_POST['decrescente'])) {
                            //codigo para o botão 
                            $sql = "SELECT * FROM actor ORDER BY first_name DESC";
                        } else if (isset($_POST['crescente'])) {
                            //codigo para o botão 
                            $sql = "SELECT * FROM actor ORDER BY first_name";
                        } else if (isset($_POST['busca'])) {
                            //codigo para o botão busca
                            $nomeBusca = $_POST["textoBusca"];
                            if (!empty($nomeBusca)){
                                $sql = "SELECT * FROM actor WHERE first_name LIKE '%".$nomeBusca."%'
                                OR last_name LIKE '%".$nomeBusca."%'
                            ORDER BY first_name";
                            } 
                        } 
                        else {
                            //codigo para outro (limita 20 linhas)
                            $sql = "SELECT * FROM actor limit 20";
                        }
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>' .
                                '<td>' . $row["actor_id"] . "</td>" .
                                '<td>  <a class="text-decoration-none text-light" href="detalheAutor.php?idautor='. $row["actor_id"] .'" target="_blank">' . $row["first_name"] . " </a> </td>" .
                                "<td>" . $row["last_name"] . "</td>" .
                                "<td>" . $row["last_update"] . "</td>" .
                                '</tr>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>