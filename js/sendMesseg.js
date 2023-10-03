const dialog = document.getElementById('dialog__message')
const dialogIcon = document.getElementById('dialog__icon')
const dialogIconattach = document.getElementById('dialog__attach')

const IconChanger=()=>{
    let full
if(dialog.value.length>0 && dialog.value !==""){
    dialogIcon.setAttribute('class','dialog__send')
    dialogIconattach.style="::before { content : '1'}"
    full=true
}else{
    dialogIcon.setAttribute('class','dialog__voice')
    full=false
}
return full
}

const sendmesseg=()=>{
    const full=IconChanger()
    if(full===true){
        let dialogBody=document.getElementById("dialogBody");
        let messageSelf=document.createElement("div");
        messageSelf.classList.add('message','message__self')
        dialogBody.appendChild(messageSelf);
        let messagePhoto = document.createElement("div")
        messagePhoto.setAttribute("class", "message__photo");
        let messageImg=document.createElement("img")
        messageImg.src="./image/user.png"
        messageImg.setAttribute("class", "message__img");
        messagePhoto.appendChild(messageImg);
        messageSelf.appendChild(messagePhoto);
        let messageCard = document.createElement("div")
        messageCard.classList.add("message__card", "message__card--self");
        let messageText = document.createElement("span")
        messageText.setAttribute("class", "message__text");
        messageText.setAttribute("id", "message__text__self");
        messageText.textContent=dialog.value
        messageCard.appendChild(messageText);
        messageSelf.appendChild(messageCard);
        dialog.value=null
    }
}

dialog.addEventListener("keydown",(event)=>{
    if(event.key === "Enter"){
        sendmesseg()
        dialog.value=null
    }else if (event.key ==="Enter + Shift"){
        dialog.value="</br>"
    }
})