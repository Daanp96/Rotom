window.onload = () =>{


  $(function(){
    if($('div').is('.volumeControl')){

      //NOTIFICATIE
      const notification = document.getElementById("js--notification");
      const notification_background = document.getElementsByClassName("notificationBox__background")[0];
      const notification_title = document.getElementById("js--notification_title");
      const notification_close = document.getElementById("js--notification_close");
      const notification_text = document.getElementById("js--notification_text");
      const notification_confirm = document.getElementById("js--notification_ok");

      const open_notification = (title, text, button_text) =>{
        notification_title.innerHTML = title;
        notification_text.innerHTML = text;
        notification_confirm.innerHTML = button_text;

        notification.style.display = "block";
      }

      notification_close.onclick = (event) =>{
        notification.style.display = "none";
      }
      notification_background.onclick = (event) =>{
        notification.style.display = "none";
      }


      //temp NOTIIFCATIE TEST
      const header = document.getElementsByClassName("volumeText")[0];
      const temp_values = {title:"NOTIFICATIE", text:"Er is iets fout met de bel! Er is geen vingerafdruk gescanned. Het is mogelijk dat de scanner vervangen moet worden.", button:"begrepen"};
      header.onclick = () =>{
        open_notification(temp_values.title,temp_values.text,temp_values.button)
      }

      //SLIDER
      const volumeSlider = document.getElementsByClassName("volumeControl__slider")[0];
      volumeSlider.onchange = () =>{
        console.log(volumeSlider.value);
      }
    }
  });
}
