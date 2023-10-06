const chatlist = document.getElementById("chatlist");
const dialog = document.getElementById("dialog__message");
const ContactlistSection = document.getElementById("Contacts");
const dialogIconattach = document.getElementById("dialog__attach");
const Contacts = chatlist.getElementsByClassName("chatlist__cadre");

const ChatList = function () {
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

const foldersISactive = function (chatType) {
  const active = document.getElementsByClassName("folders--is--active");
  active[0].classList.remove("folders--is--active");

  switch (chatType) {
    case "all":
      const activeAll = document.getElementsByClassName("folders__allchat");
      activeAll[0].classList.add("folders--is--active");
      for (let i = 0; i < Contacts.length; i++) {
        Contacts[i].style = "display: flex;";
      }

      break;
    case "pv":
      const activePv = document.getElementsByClassName("folders__pv");
      activePv[0].classList.add("folders--is--active");
      for (let i = 0; i < Contacts.length; i++) {
        ContactlistSection.appendChild(Contacts[i]);
      }
      let datePv;
      for (let i = 0; i < Contacts.length; i++) {
        datePv = Contacts[i].querySelector("span[date='pv']");
        if (datePv !== null) {
          Contacts[i].style = "display: flex;";
        } else if (datePv === null) {
          Contacts[i].style = "display: none;";
        }
      }

      break;
    case "group":
      const activeGroup = document.getElementsByClassName("folders__group");
      activeGroup[0].classList.add("folders--is--active");
      for (let i = 0; i < Contacts.length; i++) {
        ContactlistSection.appendChild(Contacts[i]);
      }
      let dateGroup;
      for (let i = 0; i < Contacts.length; i++) {
        dateGroup = Contacts[i].querySelector("span[date='group']");
        if (dateGroup !== null) {
          Contacts[i].style = "display: flex;";
        } else if (dateGroup === null) {
          Contacts[i].style = "display: none;";
        }
      }

      break;
    case "channel":
      const activeChannel = document.getElementsByClassName("folders__channel");
      activeChannel[0].classList.add("folders--is--active");
      for (let i = 0; i < Contacts.length; i++) {
        ContactlistSection.appendChild(Contacts[i]);
      }
      let dateChannel;
      for (let i = 0; i < Contacts.length; i++) {
        dateChannel = Contacts[i].querySelector("span[date='channel']");
        if (dateChannel !== null) {
          Contacts[i].style = "display: flex;";
        } else if (dateChannel === null) {
          Contacts[i].style = "display: none;";
        }
      }

      break;
    case "setting":
      const activeSetting = document.getElementsByClassName("folders__setting");
      activeSetting[0].classList.add("folders--is--active");

      let sectionAddContact = document.getElementById("messengerSettings");
      sectionAddContact.style = "display: block;";

      let Messenger = document.getElementById("Messenger");
      Messenger.setAttribute("style", "display:none;");

      break;
  }
};

const CreateContactBox = (object) => {
  let chatlistCard = document.createElement("div");
  chatlistCard.classList.add("chatlist__cadre");

  chatlistCard.addEventListener("click", () => {
    let chatlistisActive = document.getElementsByClassName(
      "chatlist--is--active"
    );
    let dialog = document.getElementById("dialog");
    let nameDialog = document.getElementById("dialog__name");

    nameDialog.textContent = chatlistName.textContent;
    dialog.setAttribute("style", "display:block;");

    fetch("./jsonFiles/ChatList.json")
      .then(function (response) {
        return response.json();
      })
      .then(function (Contacts) {
        for (let i = 0; i < Contacts.length; i++) {
          if (Contacts[i].Name === nameDialog.textContent) {
            console.log(Contacts[i].Name);
            let dialogBody = document.getElementById("dialogBody");
            dialogBody.innerHTML = "";
            for (let j = 0; j < Contacts[i].chatlist.length; j++) {
              sendMesseg(Contacts[i].chatlist[j].text,Contacts[i].chatlist[j].type);
            }
          }
        }
      });

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

  if (object.profile === undefined) {
    chatlistImg.src = "./image/user.png";
  } else if (object.profile !== "") {
    chatlistImg.src = object.profile;
  }

  chatlistName.textContent = object.fullNname;

  if (object.date === undefined) {
    chatlistDate.textContent = "";
  } else if (object.date !== "") {
    chatlistDate.textContent = object.date;
  }

  if (object.sender === undefined) {
    chatlistSender.textContent = "";
  } else if (object.sender !== "") {
    chatlistSender.textContent = `${object.sender} : `;
  }

  if (object.lastMessage === undefined) {
    chatlistMessage.textContent = "";
  } else if (object.lastMessage !== "") {
    chatlistMessage.textContent = object.lastMessage;
  }

  if (object.chatType === "group") {
    chatlistName.classList.add("chatlist__name--group");
    chatlistName.setAttribute("date", "group");
  } else if (object.chatType === "channel") {
    chatlistName.setAttribute("date", "channel");
    chatlistName.classList.add("chatlist__name--channel");
  } else if (object.chatType === "pv") {
    chatlistName.setAttribute("date", "pv");
  }

  chatlistPhoto.appendChild(chatlistImg);
  chatlistCard.appendChild(chatlistPhoto);
  chatlistDetails.appendChild(chatlistName);
  chatlistDetails.appendChild(chatlistDate);
  chatlistInfo.appendChild(chatlistDetails);
  chatlistMore.appendChild(chatlistSender);
  chatlistMore.appendChild(chatlistMessage);
  if (object.numberMessages !== "" && object.numberMessages !== undefined) {
    let chatlistBadge = document.createElement("span");
    chatlistBadge.classList.add("chatlist__badge");
    chatlistBadge.textContent = object.numberMessages;
    chatlistMore.appendChild(chatlistBadge);
  }
  chatlistInfo.appendChild(chatlistMore);
  chatlistCard.appendChild(chatlistInfo);
  ContactlistSection.appendChild(chatlistCard);
};

const addContact = function () {
  let sectionAddContact = document.getElementById("addContact");
  sectionAddContact.style = "display: block;";

  let Messenger = document.getElementById("Messenger");
  Messenger.setAttribute("style", "display:none;");

  let closebtn = document.getElementById("closed");
  closebtn.onclick = closeWindow = () => {
    sectionAddContact.style = "display: none;";
    Messenger.removeAttribute("style", "display:block;");
  };

  let addbtn = document.getElementById("addition");
  addbtn.onclick = AddContact = () => {
    const phone = document.forms["form-contact"]["phone-Contact"].value;
    const Name = document.forms["form-contact"]["name-Contact"].value;

    const contactObject = {
      fName: Name,
      phone: phone,
      fullNname: Name,
      chatType: "pv",
    };

    CreateContactBox(contactObject);

    alert("مخاطب با موفقیت اضافه شد");

    document.forms["form-contact"]["phone-Contact"].value = null;
    document.forms["form-contact"]["name-Contact"].value = null;

    closeWindow();
  };
};

const refreshChatlist = function () {
  if (Contacts.length > 0) {
    ContactlistSection.innerHTML = "";
  }

  fetch("./jsonFiles/Contacts.json")
    .then(function (response) {
      return response.json();
    })
    .then(function (Contacts) {
      for (let i = 0; i < Contacts.length; i++) {
        CreateContactBox(Contacts[i]);
      }
    });
};

const dialogIcon = document.getElementById("dialog__icon");

const IconChanger = function () {
  if (dialog.value.length > 0 && dialog.value !== "") {
    dialogIcon.setAttribute("class", "dialog__send");
    dialogIconattach.classList.remove("dialog__attach--file");
  } else {
    dialogIcon.setAttribute("class", "dialog__voice");
    dialogIconattach.classList.add("dialog__attach--file");
  }
};

dialog.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    sendMesseg();
    dialog.value = null;
  }
});

const sendMesseg = (dialogg = dialog.value, type = "self") => {

  let dialogBody = document.getElementById("dialogBody");

  let messageSelf = document.createElement("div");
  let messageCard = document.createElement("div");

  if (type === "other") {
    messageCard.classList.remove("message__card", "message__card--self");
    messageSelf.classList.remove("message", "message__self");
    messageSelf.classList.add("message", "message__other");
    messageCard.classList.add("message__card", "message__card--other");
  } else if (type === "self") {
    messageSelf.classList.remove("message", "message__other");
    messageCard.classList.remove("message__card", "message__card--other");
    messageCard.classList.add("message__card", "message__card--self");
    messageSelf.classList.add("message", "message__self");
  }

  dialogBody.appendChild(messageSelf);

  let messagePhoto = document.createElement("div");
  messagePhoto.setAttribute("class", "message__photo");

  let messageImg = document.createElement("img");
  messageImg.src = "./image/user.png";
  messageImg.setAttribute("class", "message__img");

  messagePhoto.appendChild(messageImg);
  messageSelf.appendChild(messagePhoto);

  let messageText = document.createElement("span");
  messageText.setAttribute("class", "message__text");
  messageText.textContent = dialogg;
  messageCard.appendChild(messageText);
  messageSelf.appendChild(messageCard);
  dialog.value = null;
};