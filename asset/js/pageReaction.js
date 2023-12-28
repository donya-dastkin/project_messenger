let wavesurfer;
let mediaRecorder,
  chunks = [],
  audioURL = "";
const footer = document.getElementById("footer");
const chatlist = document.getElementById("chatlist");
const emojiIcon = document.getElementById("emojiIcon");
const timerVoice = document.getElementById("timerVoice");
const dialogSection = document.getElementById("dialog");
const rootElement = document.getElementById("emojiMain");
const dialog = document.getElementById("dialog__message");
const footerVoice = document.getElementById("footerVoice");
const dialogIcon = document.getElementById("dialog__icon");
const ContactlistSection = document.getElementById("Contacts");
const footerChannels = document.getElementById("footerChannels");
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

// const CreateFooterBox = () => {
//   let dialogAttach = document.createElement("div");
//   dialogAttach.setAttribute("id", "dialog__attach");
//   dialogAttach.classList.add("dialog__attach", "dialog__attach--file");
//   let inputFile = document.createElement("input");
//   inputFile.setAttribute("type", "file");
//   inputFile.setAttribute("name", "dialog__input--attach");
//   inputFile.setAttribute("id", "dialog__input--attach");
//   inputFile.setAttribute("class", "dialog__attach--input");
//   let spanIcon = document.createElement("span");
//   spanIcon.setAttribute("id", "dialog__icon");
//   spanIcon.setAttribute("class", "dialog__voice");
//   spanIcon.addEventListener("click", sendMesseg());
//   dialogAttach.appendChild(inputFile);
//   dialogAttach.appendChild(spanIcon);

//   let dialogMessage = document.createElement("div");
//   dialogMessage.setAttribute("class", "dialog__message");
//   dialogMessage.addEventListener("change", IconChanger());
//   let dialogMessageInput = document.createElement("textarea");
//   dialogMessageInput.setAttribute("name", "dialog__message");
//   dialogMessageInput.setAttribute("id", "dialog__message");
//   dialogMessageInput.setAttribute("class", "dialog__message--input");
//   dialogMessageInput.setAttribute("placeholder", "message...");
//   dialogMessage.appendChild(dialogMessageInput);

//   let dialogTools = document.createElement("div");
//   dialogTools.setAttribute("class", "dialog__tools");
//   let spanEmoji = document.createElement("span");
//   spanEmoji.setAttribute("class", "dialog__emoji");
//   dialogTools.appendChild(spanEmoji);

//   footer.appendChild(dialogAttach);
//   footer.appendChild(dialogMessage);
//   footer.appendChild(dialogTools);
// };

const CreateContactBox = (object) => {
  let chatlistCard = document.createElement("div");
  chatlistCard.classList.add("chatlist__cadre");

  chatlistCard.addEventListener("click", () => {
    let chatlistisActive = document.getElementsByClassName(
      "chatlist--is--active"
    );
    let nameDialog = document.getElementById("dialog__name");
    nameDialog.textContent = chatlistName.textContent;
    dialogSection.setAttribute("style", "display:block;");

    fetch("./jsonFiles/ChatList.json")
      .then(function (response) {
        return response.json();
      })
      .then(function (Contacts) {
        for (let i = 0; i < Contacts.length; i++) {
          if (Contacts[i].Name === nameDialog.textContent) {
            let dialogBody = document.getElementById("dialogBody");
            let subChannel = document.getElementsByClassName("dialog__status");
            let channels = chatlistCard.getElementsByClassName(
              "chatlist__name--channel"
            );
            let group = chatlistCard.getElementsByClassName(
              "chatlist__name--channel"
            );
            if (group.length > 0) {
              subChannel[0].classList.add("dialog__header-right--channel");
              footerChannels.style = "display: none;";
              footer.style = "display:flex;";
            } else {
              subChannel[0].classList.remove("dialog__header-right--channel");
              footerChannels.style = "display: none;";
              footer.style = "display:flex;";
            }
            if (channels.length > 0) {
              subChannel[0].classList.add("dialog__header-right--channel");
              footerChannels.style = "display: block;";
              footer.style = "display: none;";
            } else {
              footerChannels.style = "display: none;";
              footer.style = "display: flex;";
              subChannel[0].classList.remove("dialog__header-right--channel");
            }
            dialogBody.innerHTML = "";
            for (let j = 0; j < Contacts[i].chatlist.length; j++) {
              sendMesseg(
                Contacts[i].chatlist[j].text,
                "text",
                Contacts[i].chatlist[j].type
              );
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
    chatlistImg.src = "./asset/image/user.png";
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

let dialogBody = document.getElementById("dialogBody");
const sendMesseg = (dialogg = dialog.value, type = "text", sender = "0") => {
  let messageSelf = document.createElement("div");
  let messageCard = document.createElement("div");

  if (sender === "1") {
    messageCard.classList.remove("message__card", "message__card--self");
    messageSelf.classList.remove("message", "message__self");
    messageSelf.classList.add("message", "message__other");
    messageCard.classList.add("message__card", "message__card--other");
  } else if (sender === "0") {
    messageSelf.classList.remove("message", "message__other");
    messageCard.classList.remove("message__card", "message__card--other");
    messageCard.classList.add("message__card", "message__card--self");
    messageSelf.classList.add("message", "message__self");
  }

  dialogBody.appendChild(messageSelf);

  let messagePhoto = document.createElement("div");
  messagePhoto.setAttribute("class", "message__photo");

  let messageImg = document.createElement("img");
  messageImg.src = "./asset/image/user.png";
  messageImg.setAttribute("class", "message__img");

  messagePhoto.appendChild(messageImg);
  messageSelf.appendChild(messagePhoto);

  if (type === "voice") {
    let messageVoice = document.createElement("div");
    messageVoice.setAttribute("class", "dialog__message--voice");

    let messageVoiceControl = document.createElement("div");
    messageVoiceControl.setAttribute("class", "dialog__message--voice-control");
    let messageVoiceControlBtn = document.createElement("button");
    messageVoiceControlBtn.setAttribute("class", "dialog__message--playe");
    messageVoiceControlBtn.addEventListener(
      "click",
      (startPlayingVoice = () => {
        messageVoiceControlBtn.style = "transition: all 2s;";
        wavesurfer.playPause();

        if (messageVoiceControlBtn.classList[0] === "dialog__message--pause") {
          messageVoiceControlBtn.setAttribute(
            "class",
            "dialog__message--playe"
          );
        } else {
          messageVoiceControlBtn.setAttribute(
            "class",
            "dialog__message--pause"
          );
        }

        wavesurfer.once("finsh", () => {
          wavesurfer.stop();
        });
      })
    );
    messageVoiceControl.appendChild(messageVoiceControlBtn);

    let messageVoiceWave = document.createElement("div");
    messageVoiceWave.setAttribute("class", "dialog__message--voice-Wave");
    let messageVoiceWaveForm = document.createElement("div");
    messageVoiceWaveForm.setAttribute("class", "dialog__message--play");
    messageVoiceWaveForm.id = "waveform";
    messageVoiceWave.appendChild(messageVoiceWaveForm);

    messageVoice.appendChild(messageVoiceControl);
    messageVoice.appendChild(messageVoiceWave);
    messageCard.appendChild(messageVoice);
  } else if (type === "text") {
    let messageText = document.createElement("span");
    messageText.setAttribute("class", "message__text");
    messageText.textContent = dialogg;
    messageCard.appendChild(messageText);
    dialog.value = null;
  }
  messageSelf.appendChild(messageCard);
};

const EmojiIconActiv = () => {
  const { createPicker } = window.picmo;

  const EmojiActiv = () => {
    emojiIcon.classList.remove("dialog__emoji");
    emojiIcon.classList.add("dialog__Keyboard", "dialog__emoji--activ");
    rootElement.style = "display:block;";
    const picker = createPicker({
      rootElement,
    });
    picker.addEventListener("emoji:select", (selection) => {
      dialog.value += selection.emoji;
    });
  };
  const EmojiInactiv = () => {
    emojiIcon.classList.add("dialog__emoji");
    emojiIcon.classList.remove("dialog__Keyboard", "dialog__emoji--activ");
    rootElement.style = "display:none;";
  };
  if (emojiIcon.classList[1] === "dialog__emoji--activ") {
    EmojiInactiv();
  } else if (emojiIcon.classList[1] !== "dialog__emoji--activ") {
    EmojiActiv();
  }
};

dialog.addEventListener("mousedown", () => {
  rootElement.style = "display:none;";
});

//! insert data into database
$(document).ready(function () {
  $("#send_form").submit(function (event) {
    event.preventDefault();
    var values = $(this).serialize();
    $.ajax({
      type: "get",
      url: "asset/php/index.php",
      data: values,
      success: function (res) {
        alert("Sending Was Successfull! \n" + "Your Message is :  " + res);
        if (dialogIcon.classList[0] === "dialog__send") {
          sendMesseg();
        } else if (dialogIcon.classList[0] === "dialog__voice") {
          record();
          // !
        }
      },
    });
  });
});

function timer() {
  let seconds = 0;
  let minutes = 0;
  let startTime = 0;
  setInterval(() => {
    let currentTime = Date.now();
    let elapsedTime = currentTime - startTime;
    if (elapsedTime >= 1000) {
      if (seconds >= 60) {
        minutes += 1;
        seconds = 0;
      } else {
        seconds += 1;
      }
      timerVoice.textContent = minutes + ":" + seconds;
      startTime = Date.now();
    }
  }, 1);
}

function stopTimer() {
  mediaRecorder.stop();
  clearInterval(timer);
}

if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices
    .getUserMedia({
      audio: true,
    })
    .then((stream) => {
      mediaRecorder = new MediaRecorder(stream);

      mediaRecorder.ondataavailable = (e) => {
        chunks.push(e.data);
      };

      mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, { type: "audio/ogg; codecs=opus" });
        chunks = [];
        audioURL = window.URL.createObjectURL(blob);
        // document.querySelector('audio').src = audioURL
      };
    })
    .catch((error) => {
      alert(`Following error has occured : \n ${error}`);
    });
}
// ضبط شروع شود
const record = () => {
  timer();
  mediaRecorder.start();
  footerVoice.style = "display:block;";
};
// توقف ضبط
const stopRecording = () => {
  stopTimer();
  mediaRecorder.stop();
  footerVoice.style = "display:none;";
  if (audioURL !== "") {
    sendMesseg("", "voice", "0");
    const messageVoiceWaveF = document.querySelectorAll(
      ".dialog__message--play"
    );
    wavesurfer = WaveSurfer.create({
      container: messageVoiceWaveF[messageVoiceWaveF.length - 1],
      waveColor: "#3f3f49",
      progressColor: "#1e212a",
      cursorWidth: 2,
      barWidth: 1,
      barHeight: 20,
      barGap: 1,
      responsive: true,
      height: 25,
      barRadius: 30,
      url: audioURL,
    });
  } else {
    alert("دوباره ضبط کنید صدا ضبط نشده!!");
  }
};

//! fetch data from database
function creatMessageBox(text) {
  let messageSelf = document.createElement("div");
  let messageCard = document.createElement("div");

  messageCard.classList.add("message__card", "message__card--self");
  messageSelf.classList.add("message", "message__self");

  dialogBody.appendChild(messageSelf);

  let messagePhoto = document.createElement("div");
  messagePhoto.setAttribute("class", "message__photo");

  let messageImg = document.createElement("img");
  messageImg.src = "./asset/image/user.png";
  messageImg.setAttribute("class", "message__img");

  messagePhoto.appendChild(messageImg);
  messageSelf.appendChild(messagePhoto);

  let messageText = document.createElement("span");
  messageText.setAttribute("class", "message__text");
  messageText.textContent = text;
  messageCard.appendChild(messageText);
  messageSelf.appendChild(messageCard);
}

$("#dialog__refresh").click(() => {
  $.ajax({
    type: "get",
    url: "asset/php/fetch.php",
    dataType: "json",
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        let text = data[i];
        creatMessageBox(text);
      }
    },
  });
});
