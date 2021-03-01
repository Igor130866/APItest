<?php
function errmessage ($logerr) {
    switch ($logerr) {
        case 1:
            return 'Ошибка P0010';
        case 2:
            return 'Ошибка P0011';
        case 3:
            return 'Ошибка P0012';
        case 4:
            return 'Некорректные данные в поле Логин';
        case 5:
            return 'Некорректные данные в поле Пароль';
        case 11:
            return 'Ошибка B0010';
        case 6:
            return 'Ошибка B0011';
        case 7:
            return 'Ошибка B0012';
        case 17:
            return 'Ошибка B0112';
        case 8:
            return 'Ошибка B0013';
        case 9:
            return 'Ошибка B0014';
        case 10:
            return 'Ошибка G0011';
        default:
            return false;
    }
}
