<div class="row">
    <div class="col-md-12">
        <div class="tile">
                <h3 class="tile-title"> Lista De usuarios</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($JData as $key => $value){
                                echo '<tr>
                                        <td>'.$value["Id"].'</td>
                                        <td>'.$value["Username"].'</td>
                                        <td>'.$value["Name"].'</td>
                                        <td>
                                            <a href="/User/registry/'.$value["Id"].'">Editar</a> | 
                                            <a class="delete" href="#">Borrar</a> 
                                        </td>
                                      </tr>';
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<script>
    $(".delete").on("click", function(){
        let op = confirm("Desea Eliminar El Registro");
        if(op){
            let element = $(this).parents("tr").find("td");

            $.post("/borrar.php", {id: element.eq(0).text()}, function(data){
                console.log(data);

            })
        }
    });
</script>