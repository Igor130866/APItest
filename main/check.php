<?php
require 'err.php';
require 'header_check.php';
if (session_id()=='') {
    session_start();
}

class Check {

    public function definition($defrole, $defdate) {
        //print_r($defrole);
        if ($defrole == 'admin') {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://worldtimeapi.org/api/timezone/Europe/Moscow',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
));

            $response = curl_exec($curl);
            curl_close($curl);

            if ($response) {
                $response = json_decode($response, true);
                /*switch (json_last_error()) {
                    case JSON_ERROR_NONE:
                        echo 'Ошибок нет';
                        break;
                    case JSON_ERROR_DEPTH:
                        echo 'Достигнута максимальная глубина стека';
                        break;
                    case JSON_ERROR_STATE_MISMATCH:
                        echo 'Некорректные разряды или несоответствие режимов';
                        break;
                    case JSON_ERROR_CTRL_CHAR:
                        echo 'Некорректный управляющий символ';
                        break;
                    case JSON_ERROR_SYNTAX:
                        echo 'Синтаксическая ошибка, некорректный JSON';
                        break;
                    case JSON_ERROR_UTF8:
                        echo 'Некорректные символы UTF-8, возможно неверно закодирован';
                        break;
                    default:
                        echo 'Неизвестная ошибка';
                        break;
                }
                return; */
                if (isset($response["datetime"])) {
                    $deftime = $response["datetime"];

                   // var_dump("shopCode.-----> " . $deftime);
                    $def = '<body>
                                <div>
                                    <h3>День добрый, Уважаемый   ' . $defrole . ' !!!</h3>
                                </div>
                                <div>
                                Вы помните это мгновение -  ' . $deftime . ' ???
                                </div>
                            </body>
                        </html>';
                    return $def;
                } else {
                    return '  ошибка 25  ';
                }
            } else {
                return '  ошибка 20  ';
           }
        }
        else {
            $def = '<body>
                        <div>
                            <h3>День добрый, Уважаемый   '.$defrole.' !!!</h3>
                        </div>
                        <div>
                        Вы помните это мгновение -  '.$defdate.' ???
                        </div>
                    </body>
                </html>';
            return $def;
        }
        //print_r('ok_definition ');
        //return $this->def;
    }
}
//$message = '';
if (isset($_GET['role']) and !empty($_GET['role'])) {

    $clearrole = htmlspecialchars(trim($_GET['role']));
    $cleardate = htmlspecialchars(trim($_GET['date']));
    //print_r($clearrole);
    $role = new Check();
    $return = $role->definition($clearrole, $cleardate);
    echo $return;
} else {
    $_SESSION['err'] = errmessage(10);
    print_r($_SESSION['err']);
}

