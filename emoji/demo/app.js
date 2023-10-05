addBtn = document.getElementById("add");
infoTable = document.getElementById("infoTable");
addBtn.onclick = function () {
  form = document.createElement("div");
  for (let i = 0; i < 6; i++) {
    let input = document.createElement("input");
    input.classList.add("inputs");
    let text = "";
    switch (i) {
      case 0:
        input.id = "dCode";
        input.type = "text";
        text = "شماره دانشجویی";
        break;
      case 1:
        input.id = "nCode";
        input.type = "text";
        text = "شماره ملی";
        break;
      case 2:
        input.id = "name";
        input.type = "text";
        text = "نام";
        break;
      case 3:
        input.id = "lName";
        input.type = "text";
        text = "نام خانوادگی";
        break;
      case 4:
        input.id = "avg";
        input.type = "text";
        text = "معدل";
        break;
      case 5:
        input.id = "photo";
        input.type = "file";
        text = "تصویر";
        break;
    }
    let lbl = document.createElement("label");
    lbl.innerHTML = text;
    form.appendChild(lbl);
    form.appendChild(input);
  }
  btn = document.createElement("button");
  btn.appendChild(document.createTextNode("ثبت"));
  form.appendChild(btn);
  btn.onclick = submit;

  //!!!!!!!!!!!!!!!!!!!!!!!
  body = document.getElementById("main");
  form.classList.add("form");
  body.appendChild(form);
  form.style.visibility = "visible";
  let width = 150;
  let height = 150;
  let timer = setInterval(function () {
    if (width > 450) {
      clearInterval(timer);
    } else {
      width += 50;
      height += 50;
      form.style.width = width + "px";
      form.style.height = height + "px";
    }
  }, 20);
  let inputPoto = document.getElementById("photo");
  inputPoto.addEventListener("change", function () {
    readURL(this);
  });
};

let photo;
function readURL(input) {
  photo=document.createElement("img")
  var url = input.value;
  var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
  if (
    input.files &&
    input.files[0] &&
    (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
  ) {
    var reader = new FileReader();

    reader.onload = function (e) {
      photo.setAttribute("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    photo.setAttribute("src", "/assets/no_preview.png");
  }
}

function submit() {
  let tr = document.createElement("tr");
  for (let i = 0; i < 7; i++) {
    let td = document.createElement("td");
    switch (i) {
      case 0:
        td.appendChild(
          document.createTextNode(document.getElementById("dCode").value)
        );
        break;
      case 1:
        td.appendChild(
          document.createTextNode(document.getElementById("nCode").value)
        );
        break;
      case 2:
        td.appendChild(
          document.createTextNode(document.getElementById("name").value)
        );
        break;
      case 3:
        td.appendChild(
          document.createTextNode(document.getElementById("lName").value)
        );
        break;
      case 4:
        td.appendChild(
          document.createTextNode(document.getElementById("avg").value)
        );
        break;
      case 5:
        td.appendChild(photo);
        break;
    }
    if (i == 6) {
      td.classList.add("links");
      for (let j = 0; j < 3; j++) {
        a = document.createElement("a");
        switch (j) {
          case 0:
            a.id = "delete";
            a.appendChild(document.createTextNode("حذف"));
            break;
          case 1:
            a.id = "edit";
            a.appendChild(document.createTextNode("ویرایش"));
            break;
          case 2:
            a.id = "show";
            a.appendChild(document.createTextNode("نمایش اطلاعات"));
            break;
        }
        td.appendChild(a);
      }
    }
    tr.appendChild(td);
  }
  infoTable.appendChild(tr);
  body.removeChild(form);
}
