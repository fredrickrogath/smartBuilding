  function on() {
    document.getElementById("overlay").style.display = "block";
  }

  function off() {
    document.getElementById("overlay").style.display = "none";
  }

  function onUserSearch(){
    document.getElementById("overlayForUserAccount").style.display = "block";
    document.getElementById("overlay").style.display = "none";
  }

  function offUserSearch() {
    document.getElementById("overlayForUserAccount").style.display = "none";
    document.getElementById("overlay").style.display = "block";
  }

  function table2On(){
    document.getElementById("table").style.display = "none";
    document.getElementById("table2").style.display = "block";
    document.getElementById("notificationClose").style.display = "inline";
  }

  function table2Off(){
    document.getElementById("table").style.display = "block";
    document.getElementById("table2").style.display = "none";
    document.getElementById("openCertificate").style.display = "none";
    document.getElementById("notificationClose").style.display = "none";
  }

  function openCertificate(){
    document.getElementById("openCertificate").style.display = "block";
  }

  function closeCertificate(){
    document.getElementById("openCertificate").style.display = "none";
  }

 function pickedImage(){
     var image = document.getElementById("imageArch").value;
     document.getElementById("pickedArch").innerText = image;
 }

 function pickedVideo(){
    var video = document.getElementById("videoArch").value;
    document.getElementById("pickedArch").innerText = video;
}

function statusArchtecture(){
    var status = document.getElementById("status");
    status.value = 'archtecture';
    document.getElementById("statusValue").innerText = 'archtecture';
}

function statusEngineer(){

    var status = document.getElementById("status");
    status.value = 'houseBuilder';
    document.getElementById("statusValue").innerText = 'engineer';

}

function statusSeller(){
    var status = document.getElementById("status");
    status.value = 'seller';
    document.getElementById("statusValue").innerText = 'seller';
}

function submit(){

    setInterval(() => {

        swal("posted successfully !", {
            button: false,
          });

    }, 4000);

}

function makeComment(){
    document.getElementById("putComment").style.display="block";
    document.getElementById("addComent").style.display="block";
    document.getElementById("commentScreen").style.display="block";
}

function hideComment(){
    document.getElementById("putComment").style.display="none";
    document.getElementById("addComent").style.display="none";
    document.getElementById("commentScreen").style.display="none";
}

function makeCommentReply(){
    document.getElementById("putCommentReply").style.display="block";
    document.getElementById("addComentReply").style.display="block";
    document.getElementById("commentReplyScreen").style.display="block";
}

function hideCommentReply(){
    document.getElementById("putCommentReply").style.display="none";
    document.getElementById("addComentReply").style.display="none";
    document.getElementById("commentReplyScreen").style.display="none";
}

function showRequestForm(){
    document.getElementById("myRequest").style.display="block";
    document.getElementById("requestButton").style.display="block";
}

function hideRequestForm(){
    document.getElementById("myRequest").style.display="none";
    document.getElementById("requestButton").style.display="none";
}

