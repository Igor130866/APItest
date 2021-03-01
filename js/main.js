document.addEventListener('DOMContentLoaded',function (){
    let button = document.querySelector('#submitBtn');
    if (button) {
        button.addEventListener('click',function (e){
            e.preventDefault();
            let err = '';
            let email =document.querySelector('.user');
            let parol =document.querySelector('#password2');
            if (email && parol) {
                if (email.value) {
                    if (parol.value) {
                        ajax(email.value, parol.value);
                    } else {
                        err = "Поле Пароль пустое";
                        error(err);
                    }
                } else {
                    err = "Поле Логин пустое";
                    error(err);
                }
            }
        })
    }
    function ajax(email, parol) {
        $.ajax({
            type: "POST",
            url: './checkout.php',
            data: {
                "email": email,
                "parol": parol,
            },
            success: function (response) {
                console.log(response);
                //console.log(response['role']);
                if(response){
                    let check=IsJsonString(response);
                    if (check) {
                        let resrole = JSON.parse(response);
                        console.log(resrole);
                        let check = 'role=' + resrole.role + '&date=' + resrole.date;
                        window.location.href='./main/check.php?'+check;
                    } else {
                        let err = document.querySelector('#err');
                        if (err) {
                            error(response);
                        }
                    }
                }
            },
            error: function (jqXHR, exception) {
                console.log('ERROR' + exception);
            }
        });
    }
    function error(response) {
        err.style.display = 'block';
        err.innerText = response;
    }
    function IsJsonString(str) {
        try {
            //console.log('IsJsonString-true');
            response = JSON.parse(str);
        } catch (e) {
            //console.log('IsJsonString-false');
            return false;
        }
        console.log('IsJsonString');
        return true;
    }
})