<h1 class="text-center pt-4">Listagem de Usuários</h1>

<a class="btn btn-success mb-2" href="/add" title="Adicionar usuário"><i class="fa fa-plus" aria-hidden="true"></i></a>

<?php if ($users) { ?>
    <div class="table-responsive">
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Gênero</th>
                    <th>Nascimento</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['gender'] == 'm' ? 'Masculino' : 'Feminino'; ?></td>
                        <td><?php echo dateConvert($user['birthdate']); ?></td>
                        <td><?php echo calculateAge($user['birthdate']); ?> anos</td>
                        <td>
                            <a href="/edit/<?php echo $user['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/remove/<?php echo $user['id']; ?>"
                               onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
<?php } else { ?>
    Nenhum usuário cadastrado
<?php } ?>