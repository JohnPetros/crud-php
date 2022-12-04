<?php


$sql = "SELECT * FROM user";
$data = mysqli_query($connect, $sql);
if (mysqli_num_rows($data) > 0) {
    while ($user = mysqli_fetch_assoc($data)) {
        echo '
        <tr>
            <td class="name">' . $user["name"] . '</td>
            <td class="email">' . $user["email"] . '</td>
            <td class="phone">' . $user["phone"] . '</td>
            <td colspan="2">
            <button id="' . $user['id'] . '" class="button update" type="button">editar</button>
            </td>
            <td colspan="2">
            <button id="' . $user['id'] . '" class="button delete" type="button">deletar</button>
            </td>
        </tr>
        ';
    }
} else {
    echo '
        <div class="empty">Nenhum usuário cadastrado!</div>
    ';
}
