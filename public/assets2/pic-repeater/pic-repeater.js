function map(arr, func) {
  narr = [];
  for (let i = 0; i < arr.length; i++) {
    narr[i] = func(arr[i]);
  }
  return narr;
}
function repnum(repclass, idprefix) {
  testimg = $("." + repclass);
  testimg = map(testimg, function (x) {
    return +x.id.replace(idprefix, "");
  });
  if (testimg.length > 0) return testimg[testimg.length - 1] + 1;
}
let fileful = false;
let object = {
  name: null,
};
let nm = 1;
const initPicRepeater = (name) => {
  object.name = name;
  let num = nm;
  const str = `<div id="all${num}_pic-img-rep-row" class="allz  mb-3" style="display:flex;flex-wrap:wrap">
    <div
      id="all${num}_img-slot1"
      class="all${num} pic-img-rep-wrap"
      style="margin-right:15px;margin-top:0px"
    >
      <input
        id="all${num}_up-img1"
        name="${object.name != null ? object.name : "fileinput"}[]"
        type="file"
        onchange="loadfile(event,this.id)"
        accept="image/*"
        hidden
      />
      <div
        id="all${num}_img1"
        class="pic-img-rep"
        onclick="repclick(this.id)"
      >
        <span class="pic-pluss">&times;</span>
      </div>
    </div>
    </div>`;
  nm++;
  return str;
};

function repclick(id) {
  let prefix = id.split("_")[0];
  let num = repnum(prefix, prefix + "_img-slot");
  if (+id.replace(prefix + "_img", "") == num - 1)
    $(`#${prefix}_up-img${num - 1}`).click();
}

function droprep(num, id) {
  let prefix = id.split("_")[0];
  $(`#${prefix}_pic-img-rep-row #${prefix}_img-slot${num}`).remove();
}
function droprepbyclass(num, url, cls) {
  $(`#${cls}_deleted_images${num}`).val(url);
  $(`#${cls}_pic-img-rep-row #${cls}_img-slot${num}`).remove();
  // $(`#${cls}_pic-img-rep-row #${cls}_deleted_images${num}`).remove();
}
function dropall(cls) {
  const images = $(`.${cls}`);
  const inputs = $(`.${cls}_input`);
  var num;
  for (let i = 0; i < images.length; i++) {
    if (inputs[i]) {
      $(`#${inputs[i].id}`).remove();
    }
    if (i != images.length - 1) {
      $(`#${images[i].id}`).remove();
    }
  }
}
function loadfile(event, id) {
  let prefix = id.split("_")[0];
  let num = repnum(prefix, prefix + "_img-slot");
  if (+id.replace(prefix + "_up-img", "") == num - 1) {
    let divstr = `<img id="${prefix}_pic-rep${
      num - 1
    }" onclick="display(this.id)" class="pic-a-img-rep">
        <i id="${prefix}_drop${num - 1}" onclick="droprep(${
      num - 1
    },this.id)" class="fa fa-times-circle pic-drop"></i>`;
    $(`#${prefix}_img-slot${num - 1} #${prefix}_img${num - 1}`).remove();
    $(`#${prefix}_img-slot${num - 1}`).append(divstr);
    $(`#${prefix}_pic-rep${num - 1}`).attr(
      "src",
      URL.createObjectURL(event.target.files[0])
    );
    divstr = `<div id="${prefix}_img-slot${num}" class="${prefix} pic-img-rep-wrap" ${
      true ? `style="margin-right:15px;margin-top:0px"` : ``
    }>
            <input id='${prefix}_up-img${num}' name='${
      object.name != null ? object.name : "fileinput"
    }[]' type="file" onchange="loadfile(event,this.id)" accept="image/*" hidden>
            <div id="${prefix}_img${num}" class="pic-img-rep" onclick="repclick(this.id)">
                <span class="pic-pluss">&times;</span>
            </div>
        </div>`;
    $(`#${prefix}_pic-img-rep-row`).append(divstr);
  } /// a
}

function loadfilefromserver(url) {
  let prefix = "all2";
  let num = repnum(prefix, prefix + "_img-slot");
  let deleted = `<input id="${prefix}_deleted_images${
    num - 1
  }" class="${prefix}_input" type="hidden" name="deleted_images">`;
  let divstr = `<img id="${prefix}_pic-rep${
    num - 1
  }" onclick="display(this.id)" class="pic-a-img-rep">
    <i id="${prefix}_drop${num - 1}" onclick="droprepbyclass(${
    num - 1
  },'${url}','all2')" class="fa fa-times-circle pic-drop"></i>`;
  $(`#${prefix}_img-slot${num - 1} #${prefix}_img${num - 1}`).remove();
  $(`#${prefix}_img-slot${num - 1}`).append(divstr);
  $(`#${prefix}_pic-rep${num - 1}`).attr("src", url);
  divstr = `<div id="${prefix}_img-slot${num}" class="${prefix} pic-img-rep-wrap" ${
    true ? `style="margin-right:15px; margin-top: 0px"` : ``
  }>
        <input id='${prefix}_up-img${num}' name='${
    object.name != null ? object.name : "fileinput"
  }[]' type="file" onchange="loadfile(event,this.id)" accept="image/*" hidden>
        <div id="${prefix}_img${num}" class="pic-img-rep" onclick="repclick(this.id)">
            <span class="pic-pluss">&times;</span>
        </div>
    </div>`;
  $(`#${prefix}_pic-img-rep-row`).append(deleted + divstr);
}

function loadfilefromserverV2(url,prefix) {
  let num = repnum(prefix, prefix + "_img-slot");
  let deleted = `<input id="${prefix}_deleted_images${
    num - 1
  }" class="${prefix}_input" type="hidden" name="deleted_images">`;
  let divstr = `<img id="${prefix}_pic-rep${
    num - 1
  }" onclick="display(this.id)" class="pic-a-img-rep">
    <i id="${prefix}_drop${num - 1}" onclick="droprepbyclass(${
    num - 1
  },'${url}','${prefix}')" class="fa fa-times-circle pic-drop"></i>`;
  $(`#${prefix}_img-slot${num - 1} #${prefix}_img${num - 1}`).remove();
  $(`#${prefix}_img-slot${num - 1}`).append(divstr);
  $(`#${prefix}_pic-rep${num - 1}`).attr("src", url);
  divstr = `<div id="${prefix}_img-slot${num}" class="${prefix} pic-img-rep-wrap" ${
    true ? `style="margin-right:15px; margin-top: 0px"` : ``
  }>
        <input id='${prefix}_up-img${num}' name='${
    object.name != null ? object.name : "fileinput"
  }[]' type="file" onchange="loadfile(event,this.id)" accept="image/*" hidden>
        <div id="${prefix}_img${num}" class="pic-img-rep" onclick="repclick(this.id)">
            <span class="pic-pluss">&times;</span>
        </div>
    </div>`;
  $(`#${prefix}_pic-img-rep-row`).append(deleted + divstr);
}

function display(id) {
  let prefix = id.split("_")[0];
  let nid = prefix + "_up-img" + id.replace(prefix + "_pic-rep", "");
  let src = $("#" + id).attr("src");
  let input = document.getElementById(nid);
  $("#myModal").css("display", "block");
  $("#display-pic").attr("src", src);
}

$(".pic-close").on("click", () => {
  $("#myModal").css("display", "none");
});
