window.onload = () =>{

    //NOTIFICATIE POPUP VOOR OP ELKE PAGINA
    // const notification = document.getElementById("js--notification");
    // const notification_background = document.getElementsByClassName("notificationBox__background")[0];
    // const notification_title = document.getElementById("js--notification_title");
    // const notification_close = document.getElementById("js--notification_close");
    // const notification_text = document.getElementById("js--notification_text");
    // const notification_confirm = document.getElementById("js--notification_ok");
    //
    // const open_notification = (title, text, button_text) =>{
    //   notification_title.innerHTML = title;
    //   notification_text.innerHTML = text;
    //   notification_confirm.innerHTML = button_text;
    //
    //   notification.style.display = "block";
    // };
    //
    // notification_close.onclick = (event) =>{
    //   notification.style.display = "none";
    // };
    // notification_background.onclick = (event) =>{
    //   notification.style.display = "none";
    // };
    //
    //
    // //temp NOTIIFCATIE TEST
    // const header = document.getElementById("js--header");
    // const temp_values = {title:"NOTIFICATIE", text:"Er is iets fout met de bel! Er is geen vingerafdruk gescanned. Het is mogelijk dat de scanner vervangen moet worden.", button:"begrepen"};
    // header.onclick = () =>{
    //   open_notification(temp_values.title,temp_values.text,temp_values.button);
    // };

    //---------------------
    //VOLUME SLIDER FUNCTIE
    $(function(){
      if($('input').is('.settings__slider')){
        console.log("yeet");
        //SLIDER
        const volumeSlider = document.getElementById('js--slider');
        const volume = document.getElementById("js--volume");
        volumeSlider.onchange = () =>{
          volume.innerHTML = volumeSlider.value;
          console.log(volumeSlider.value);
        };
      }
    });

    //-------------------------------------------------------------------
    //DYNAMISCH VERANDEREN VAN AVATAR & BANNER PREVIEW WANNEER TOEGEVOEGD
    $(function(){
    	function previewBanner(bannerInput) {
          const banner = document.getElementById('js--banner');
          var file    = bannerInput.files[0];
          var reader  = new FileReader();
          reader.onloadend = function () {
            banner.src = reader.result;
          };

          if (file) {
            reader.readAsDataURL(file);
          } else {
            banner.src = "";
          }
        }

      function previewAvatar(avatarInput) {
          const avatar = document.getElementById('js--avatar');
          var file    = avatarInput.files[0];
          var reader  = new FileReader();
          reader.onloadend = function () {
            avatar.src = reader.result;
          };

          if (file) {
            reader.readAsDataURL(file);
          } else {
            avatar.src = "";
          }
        }

      if($('form').is('.addContact')){


      const bannerInput = document.getElementById("js--bannerInput");
      const avatarInput = document.getElementById("js--avatarInput");

      bannerInput.onchange = () => {
        previewBanner(bannerInput);
      };

      avatarInput.onchange = () => {
        previewAvatar(avatarInput);
      };
    }
  });

  //SEARCHBAR FUNCTIE
  $(function(){
    function search(filter){
      var searchbar = document.getElementById("js--searchbar");
      var listItems = document.getElementsByClassName("list__name")
      for (var i = 0; i < listItems.length; i++) {
        if (listItems[i].innerHTML.toLowerCase().indexOf(filter.toLowerCase()) !== -1) {
          listItems[i].style.display = " ";

        }else {
          listItems[i].style.display = " none";
        }
      }
    }
  }
};
