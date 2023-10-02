const signupBtn = document.getElementById("signupBtn");
const loginBtn = document.getElementById("loginBtn");

const ValidationSignup = () => {

const phone = document.forms["Signup"]["phone"].value;
const password = document.forms["Signup"]["password"].value;
const repassword = document.forms["Signup"]["repassword"].value;

const validationPhone = () => {
    let valid = false
    if (phone.length === 11 && phone.startsWith('09')) {
        valid = true
    } else {
        valid = false
    }
    return valid
}

const validationPasswordLength = () => {
    let valid = false
    if (password.length >= 8 && repassword.length >= 8) {
        valid = true
    } else {
        valid = false
    }
    return valid
}

const validationPassword = () => {
    let valid = false
    if (password === repassword) {
        valid = true
    } else {
        valid = false
    }
    return valid
}

const validationFilde = () => {
    let valid = false
    if (phone === "" && password === "" && repassword === "") {
        valid = false
    } else if (phone !== "" && password !== "" && repassword !== "") {
        valid = true
    }
    return valid
}

const Phone = validationPhone()
const PasswordLength = validationPasswordLength()
const Password = validationPassword()
const Filde = validationFilde()

if (Phone === false && PasswordLength === false && Password === false && Filde === false) {
    signupBtn.disabled = false;
    signupBtn.setAttribute("class", "submit_disabled");
} else if(Phone !== false && PasswordLength !== false && Password !== false && Filde !== false) {
    signupBtn.disabled = true;
    signupBtn.setAttribute("class", "submit");
}

}

const ValidationLogin = () => {

    const phone = document.forms["Login"]["phone"].value;
    const password = document.forms["Login"]["password"].value;
    
    const validationPhone = () => {
        let valid = false
        if (phone.length === 11 && phone.startsWith('09')) {
            valid = true
        } else {
            valid = false
        }
        return valid
    }
    
    const validationPasswordLength = () => {
        let valid = false
        if (password.length >= 8) {
            valid = true
        } else {
            valid = false
        }
        return valid
    }
    
    // const validationPassword = () => {
    //     let valid = false
    //     if (password === repassword) {
    //         valid = true
    //     } else {
    //         valid = false
    //     }
    //     return valid
    // }
    
    const validationFilde = () => {
        let valid = false
        if (phone === "" && password === "") {
            valid = false
        } else if (phone !== "" && password !== "") {
            valid = true
        }
        return valid
    }
    
    const Phone = validationPhone()
    const PasswordLength = validationPasswordLength()
    // const Password = validationPassword()
    const Filde = validationFilde()
    
    if (Phone === false && PasswordLength === false && Filde === false) {
        loginBtn.disabled = false;
        loginBtn.setAttribute("class", "submit_disabled");
    } else if(Phone !== false && PasswordLength !== false && Filde !== false) {
        loginBtn.disabled = true;
        loginBtn.setAttribute("class", "submit");
    }
    
    }