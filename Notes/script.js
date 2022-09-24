let login=document.getElementById("login");
let password=document.getElementById("password");
let form=document.getElementById("form");
document.onsubmit=()=> {
    if(login.value=="" || password.value=="") {
        let span=document.createElement("span", "Заполните все поля")
        document.body.form.append(span)
        return false
    } else {
        return true
    }
}   
