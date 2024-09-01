const loginsec=document.querySelector('.login-section')

const loginlink=document.querySelector('.login-link')

const registerlink=document.querySelector('.register-link')

const forgetPassword=document.querySelector('.forgetPassword')
const login= document.querySelector('.login-regresar')

registerlink.addEventListener('click',()=>{
    loginsec.classList.add('activeRegister')
    
})

loginlink.addEventListener('click',()=>{
    loginsec.classList.remove('activeRegister')
})

forgetPassword.addEventListener('click',()=>{
    loginsec.classList.add('activeRestablecer')
    
})

login.addEventListener('click',()=>{
    loginsec.classList.remove('activeRestablecer')
})
