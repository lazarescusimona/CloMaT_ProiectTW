var btn=document.getElementById('submit');

window.onload = function(){
    window.addEventListener('keypress',function(e){
    if(e.keyCode=='13'){
        authorize();
        console.log('enter pressed');
    }
    },false);
}

function authorize(){
    var username=document.getElementById('username').value;

    var password=document.getElementById('password').value;

    username= username.toLowerCase();

    if(username.substr(0,6) != 'admin:'){
        return deny();
    }
    else{

        username = username.substring(6);
        username= username.replace(' ', '');
        console.log(username);

        return authorized();
    }

}

function deny(){
    console.log('denied');
}

function authorized(){
    location.assign('./admin.html');
}