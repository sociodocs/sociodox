var chat_section = document.getElementById("chat-section");
var blog_section = document.getElementById("blog-section");
var profile_section = document.getElementById("profile-section");
var show_all_section = document.getElementById("show-all-section");
var settings_section = document.getElementById("settings-section");
var edit_section = document.getElementById("edit-section");
var cpass_section = document.getElementById("cpass-section");
var sorg_section = document.getElementById("sorg-section");


document.getElementById("chat").addEventListener("click", () => {
    chat_section.style.display = "block";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";

});

document.getElementById("blog").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "block";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";
});

document.getElementById("profile").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "block";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";
});

document.getElementById("show-all").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "block";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";
});

document.getElementById("settings").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "block";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";
});

document.getElementById("edit").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "block";
    cpass_section.style.display = "none";
    sorg_section.style.display = "none";
});

document.getElementById("cpass").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "block";
    sorg_section.style.display = "none";
});

document.getElementById("sorg").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
    show_all_section.style.display = "none";
    settings_section.style.display = "none";
    edit_section.style.display = "none";
    cpass_section.style.display = "none";
    sorg_section.style.display = "block";

});


function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');    
    var message = document.getElementById('confirmMessage');    
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        $('#cp').prop('disabled', false);
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        $('#cp').prop('disabled', true);
    }
}  

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "php/user_name.php?q=" + str, true);
        xmlhttp.send();
    }
}

