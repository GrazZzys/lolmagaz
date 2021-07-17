<? if($solo === false): ?>
<? if($_SESSION['admin'] === true): ?>
    <div><button type="submit" class="pop-up logout" style="color: black">Добавить продукт</button></div>
    <br>
<? endif; ?>
<br>
<div class="modal-sign">
    <div class="modal-forms">
        <div class="close">
            <i class="fas fa-times"></i>
        </div>
        <form action="/product/add" method="post" enctype="multipart/form-data" novalidate>
            <div class="change_password">
                <p class="title-modal">Добавление продукта</p>
                <?= csrf_field() ?>
                <input name="title" type="text" placeholder="Название">
                <input name="description" type="text" placeholder="Описание">
                <input name="price" type="number" placeholder="Цена в $">
                <input name="image" type="file">
                <button type="submit" class="change_password">Подтвердить</button>
            </div>
        </form>
    </div>
</div>
<? if($product !== NULL): ?>
<div class="wrap">
    <section>
        <div class="wrap">
<? foreach ($product as $item): ?>
            <a href="/product/<?= $item->id ?>" class="link-item">
                <div class="magazine-item">
                    <div class="item-img">
                        <? if ($_SESSION['auth']): ?>
                        <div class="add-to-cart">
                            <div class="icons">
                                    <button type="button" value="<?= $item->id ?>" class="cart-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    <? if ($_SESSION['admin']): ?>
                                    <button type="submit" value="<?= $item->id ?>" class="delete-icon">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <? endif; ?>
                            </div>
                        </div>
                        <? endif; ?>
                        <img src="<?= $item->img_href ?>" alt="item1">
                    </div>
                    <div class="item-text">
                        <p class="item-name"><?= $item->title ?></p>
                        <p class="item-desc"><?= $item->description?></p>
                        <div class="price-block">
                            <p class="price-left">цена: </p>
                            <p class="price-number"><?= $item->price ?>$</p>
                        </div>
                    </div>
                </div>
            </a>
<? endforeach; ?>
        </div>
    </section>
</div>
<? endif; ?>
<? else: ?>
    <br>
    <div class="wrap">
        <div class="wrap">
            <img src="<?= '../'.$product['img_href'] ?>" alt="<?= $product['title'] ?>" style="position: relative;width: 20%;height: calc(100vh - 500px);overflow: hidden;">
            <p><?= 'Название: '.$product['title'] ?></p>
            <p><?= 'Описание: '.$product['description'] ?></p>
            <p><?= 'Цена: '.$product['price'] ?>$</p>
        </div>
    </div>

<? endif; ?>
