let chatlist = document.getElementById("chatlist");

ChatList = () => {
  let ClosedChatList = () => {
    chatlist.classList.remove("chatlist", "chatlist__Open");
    chatlist.classList.add("chatlist", "chatlist__Closed");
  };

  let OpenChatList = () => {
    chatlist.classList.remove("chatlist", "chatlist__Closed");
    chatlist.classList.add("chatlist", "chatlist__Open");
  };

  if (chatlist.classList[1] === "chatlist__Open") {
    ClosedChatList();
  } else {
    OpenChatList();
  }
};

refreshChatlist = () => {
    let chatlist = document.getElementById("Contacts");
    let Contacts = chatlist.getElementsByClassName("chatlist__card")
      if (Contacts.length >0) {
          chatlist.innerHTML=''
      }
  fetch("./jsonFiles/Contacts.json")
    .then(function (response) {
      return response.json();
    })
    .then(function (Contacts) {
      for (let i = 0; i < Contacts.length; i++) {
        let chatlistCard = document.createElement("div");
        chatlistCard.classList.add("chatlist__card");
        chatlistCard.addEventListener("click", () => {
          let chatlistisActive = document.getElementsByClassName(
            "chatlist--is--active"
          );
          console.log(chatlistisActive);
          if (chatlistisActive.length >= 1) {
            chatlistisActive[0].classList.remove("chatlist--is--active");
          }
          chatlistCard.classList.add("chatlist--is--active");
        });

        let chatlistPhoto = document.createElement("div");
        chatlistPhoto.classList.add("chatlist__photo");

        let chatlistImg = document.createElement("img");
        chatlistImg.classList.add("chatlist__img");

        let chatlistInfo = document.createElement("div");
        chatlistInfo.classList.add("chatlist__info");

        let chatlistDetails = document.createElement("div");
        chatlistDetails.classList.add("chatlist__details");
        let chatlistName = document.createElement("span");
        chatlistName.classList.add("chatlist__name");
        let chatlistDate = document.createElement("span");
        chatlistDate.classList.add("chatlist__date");

        let chatlistMore = document.createElement("div");
        chatlistMore.classList.add("chatlist__more");
        let chatlistSender = document.createElement("span");
        chatlistSender.classList.add("chatlist__sender");
        let chatlistMessage = document.createElement("p");
        chatlistMessage.classList.add("chatlist__message");
        let chatlistBadge = document.createElement("span");
        chatlistBadge.classList.add("chatlist__badge");

        console.log(Contacts[i]);
        chatlistImg.src = Contacts[i].profile;
        chatlistName.textContent = Contacts[i].name;
        chatlistDate.textContent = Contacts[i].date;
        chatlistSender.textContent = Contacts[i].sender;
        chatlistMessage.textContent = Contacts[i].lastMessage;
        chatlistBadge.textContent = Contacts[i].numberMessages;
        if (Contacts[i].chatType === "group") {
          chatlistName.classList.add("chatlist__name--group");
        } else if (Contacts[i].chatType === "channel") {
          chatlistName.classList.add("chatlist__name--channel");
        }
        chatlistPhoto.appendChild(chatlistImg);
        chatlistCard.appendChild(chatlistPhoto);
        chatlistDetails.appendChild(chatlistName);
        chatlistDetails.appendChild(chatlistDate);
        chatlistInfo.appendChild(chatlistDetails);
        chatlistMore.appendChild(chatlistSender);
        chatlistMore.appendChild(chatlistMessage);
        chatlistMore.appendChild(chatlistBadge);
        chatlistInfo.appendChild(chatlistMore);
        chatlistCard.appendChild(chatlistInfo);
        chatlist.appendChild(chatlistCard);
      }
    });
};

addContact=()=>{
    
}
