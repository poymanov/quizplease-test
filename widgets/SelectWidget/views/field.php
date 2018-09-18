<div class="custom-dropdown">
    <input type="text" name="fake-input" class="autocomplete-fake-input form-control" value="<?= $value ? $data[$value] : '' ?>" readonly>
    <ul class="custom-dropdown-list">
        <?php foreach ($data as $id => $val): ?>
            <li class="custom-dropdown-list-item" data-value="<?=$id?>"><?=$val?></li>
        <?php endforeach; ?>
    </ul>
    <input class="real-input" type="hidden" name="<?=$formName?>[<?=$attribute?>]" value="<?= $value ? $value : ''?>">
</div>


<?php

$this->registerJs(<<<JS
    $('input[name="fake-input"]').on('click', function(e) {
        e.preventDefault();
        var parent = $(this).parent('.custom-dropdown');
        parent.children('.custom-dropdown-list').toggle();
    });
    
    $('.custom-dropdown-list-item').on('click', function(e) {
        var label = $(this).text();
        var value = $(this).data('value');

        var parent = $(this).closest('.custom-dropdown');

        parent.children('.real-input').val(value);
        parent.children('input[name="fake-input"]').val(label);
        parent.children('.custom-dropdown-list').toggle();
    });
JS
);

?>

