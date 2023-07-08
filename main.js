function Aparecer() {
    var pass = document.getElementById("senha")

    if(pass.type == "password") {
        pass.type = "text"
    } else {
        pass.type = "password"
    }
}