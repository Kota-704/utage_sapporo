// 送信完了後に表示するテキスト(*1)
const submitText =
  "お問い合わせ頂きありがとうございます。メッセージは正常に送信されました。";

// 送信完了後に表示するリンク(*1)
const submitLink = "/";

// モーダル要素を作成する
const modalElement = document.createElement("div");
modalElement.id = "wpcf7-modal";
const modalBg = document.createElement("div");
modalBg.id = "wpcf7-modal__bg";
const modalWrap = document.createElement("div");
modalWrap.id = "wpcf7-modal__wrap";
const modalText = document.createElement("p");
modalText.classList.add("modal_text");
modalText.appendChild(document.createTextNode(submitText));
const modalLink = document.createElement("a");
modalLink.classList.add("modal_link");
modalLink.href = submitLink;
modalLink.appendChild(document.createTextNode("TOPに戻る"));

// モーダル要素をDOMツリーに追加する
modalElement.appendChild(modalBg);
modalElement.appendChild(modalWrap);
modalWrap.appendChild(modalText);
modalWrap.appendChild(modalLink);

// モーダルをbody直下に追加する(*2)
const bodyElement = document.getElementsByTagName("body");
bodyElement[0].appendChild(modalElement);

// 送信完了時にモーダルを表示する(*3)
document.addEventListener("wpcf7mailsent", function (e) {
  modalElement.style.display = "flex";
});

// モーダル範囲外をクリックしたときにモーダルを非表示にする
modalBg.addEventListener("click", function () {
  modalElement.style.display = "none";
});
