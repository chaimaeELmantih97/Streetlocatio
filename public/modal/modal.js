$(document).on("ready",function () {

  $(".modal-open-v2").click(function() {
    let id = $(this).data("id");
    let type = $(this).data("type");
    let target = $(this).data("target");
    $("#modal-view-"+id).removeClass("modal-hide");
    $("#dark-overlay-"+id).removeClass("screen-undarken");
    $("#modal-view-"+id).addClass("modal-show");
    $("#dark-overlay-"+id).addClass("screen-darken");
    $("#modal-view-"+id).css("display","block");
    $("#dark-overlay-"+id).css("display","flex");
    if(type=="image") {
      $("#modal-content-generalized-"+id).html(`
        <img src="${target}" style="width:100%;height:100%; object-fit:cover">
      `);
    }
    if(type=="video") {
      $("#modal-content-generalized-"+id).html(`
        <video src="${target}" style="width:100%;height:100%; object-fit:cover" autoplay></video>
      `);
    }
    if(type=="iframe") {
      $("#modal-content-generalized-"+id).html(`
        <iframe style="width:100%;height:100%; object-fit:cover"
          src="${target}">
        </iframe>
      `);
    }
    if(type=="pdf") {
      $("#modal-content-generalized-"+id).html(`
      <object data="${target}" type="application/pdf" style="width:100%;height: 100%">
        alt : <a href="${target}">test.pdf</a>
      </object>
      `);
    }

  });
  
  $('.modal-close').click(function(){
    let id = $(this).attr("id").replace('modal-close-','');
    // $("#modal-content-generalized-"+id).html('');
    $(".cstm-modal").removeClass("modal-show");
    $(".modal-wrap").removeClass("screen-darken");
    $(".cstm-modal").addClass("modal-hide");
    $(".modal-wrap").addClass("screen-undarken");
    setTimeout(function () {
        $(".cstm-modal").css("display", "none");
        $(".modal-wrap").css("display", "none");
    },350);
  });
  

});
  
 