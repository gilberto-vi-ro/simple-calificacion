/**
 * @fileoverview all.js
 * @version      1.0.0
 * @author       Gilberto Villarreal Rodriguez <gil_yeung@outlook.com>
 * @link         https://proyecto-ti.com/
 * @copyright    proyecto-ti.com
 * desc          general functions
 * @since        18/12/2020
 * @license      License Open Source
 */ 

/*====================================================
LOAD AJAX
====================================================*/

function loadAjax(_url, _type , _data=null, _async=false){
    let response=null;
    let res = $.ajax({
          async: _async, //true = ASynchronous, false = Synchronous
          url: _url,
          type: _type,
          datatype: "json",
          data: _data,
          cache:false,
          contentType:false,
          processData:false,
        });
    res.done(function(resp){
        //console.log(response);
        response = resp;
    });
    res.fail(function(request, status, error){
        //console.log(response);
        response = error;
    });
    //console.log(response);
    return response;
}

/*====================================================
ON PETITION
====================================================*/
$(document).ajaxStart(function(e,b) {
    $('.cont-loader').show();
  });
    $(document).ajaxStop(function() {
        setTimeout(function(){
            $('.cont-loader').hide();
        },500)
  });


