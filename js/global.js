const PROTOCOL = "http";
//const HOST = "wartekgroup.co.id/bengkel";
const HOST = "localhost/bengkel";
const PHP_URL = PROTOCOL+"://"+HOST+"/php/";

function logout() {
    localStorage.setItem("user_id", 0);
    $.ajax({
        type: 'GET',
        url: PHP_URL+'logout.php',
        dataType: 'text',
        cache: false,
        success: function(response) {
            window.location.href = "login.html";
        }
    });
}
