//<script type="text/javascript">
{/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> */}
  $(document).ready(function(){  
    $(".MetaDataJCSeivoc").click(function(){
      // evitamos la acción por defecto
      //e.preventDefault();
      // Aja scritp 
      meta = document.getElementById("mdseivoc").innerHTML;
      if(meta==""){
        $.ajax({
          type: "POST",
          data: {
            "_token": $("meta[name='csrf-token']").attr("content"),                              
            "Ref": $(this).attr("ReferenciaMetaSEIVOC")
          },
          
             url:"/api/meta_info_candidato/" ,
          
          success: function (data) {
            console.log("Guardando MetaDataJCSeivoc");
          }
      });
      }
      if(meta>=0){
        $.ajax({
            type: "POST",
            data: {
              "_token": $("meta[name='csrf-token']").attr("content"),
              
              "id":meta,
              
              "Ref": $(this).attr("ReferenciaMetaSEIVOC")
            },               
               url:"/api/meta_info_usuario/"+meta+"/"+$(this).attr("ReferenciaMetaSEIVOC") ,                
            success: function (data) {
              console.log("Guardando MetaDataJCSeivoc");
            }
        });

      }
    });
  });
  // </script>

/* <script type="text/javascript">
$(document).ready(function(){  
  $(".MetaDataJCSeivoc").click(function(){
    // evitamos la acción por defecto
    //e.preventDefault();
    // Aja scritp 
    $.ajax({
        type: "POST",
        data: {
          "_token": $("meta[name='csrf-token']").attr("content"),
          @guest
          @else 
          "id":{{ Auth::user()->usuario_id }},
          @endguest
          "Ref": $(this).attr("ReferenciaMetaSEIVOC")
        },
        @guest
           url:"/api/meta_info_candidato/" ,
        @else 
           url:"/api/meta_info_usuario/{{ Auth::user()->usuario_id }}/"+$(this).attr("ReferenciaMetaSEIVOC") ,
        @endguest
       
        success: function (data) {
          console.log("Guardando MetaDataJCSeivoc");
        }
    });
  });
});
</script> */