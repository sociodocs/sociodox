var chat_section = document.getElementById("chat-section");
var blog_section = document.getElementById("blog-section");
var profile_section = document.getElementById("profile-section");

document.getElementById("chat").addEventListener("click", () => {
    chat_section.style.display = "block";
    blog_section.style.display = "none";
    profile_section.style.display = "none";
});

document.getElementById("blog").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "block";
    profile_section.style.display = "none";
});

document.getElementById("profile").addEventListener("click", () => {
    chat_section.style.display = "none";
    blog_section.style.display = "none";
    profile_section.style.display = "block";
});