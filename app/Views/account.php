<br>
<p><?= 'Имя пользователя: '.$user['name'] ?></p>
<p><?= 'Почта пользователя: '.$user['email'] ?></p>
<br>
<div><button type="submit" class="sign logout" style="color: black">Изменить данные о пользователе</button></div>
<br>

<div class="modal-sign">
    <div class="modal-forms">
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
        <form action="/change_user_data" method="post" novalidate>
            <div class="change_password">
                <p class="title-modal">Изменение данных</p>
                <?= csrf_field() ?>
                <input name="newName" type="text" placeholder="Новое имя пользователя" value="<?=$user['name'] ?>">
                <input name="newEmail" type="email" placeholder="Новая почта пользователя" value="<?=$user['email']?>">
                <input name="newPassword" type="password" placeholder="Новый пароль пользователя">
                <button type="submit" class="change_password">Подтвердить</button>
            </div>
        </form>
    </div>
</div>