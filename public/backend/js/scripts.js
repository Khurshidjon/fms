$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#from_city').on('change', function () {
        var city_id = $('#from_city option:selected').val();
        var url = $(this).attr('data-city');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                city_id: city_id
            },
            success: function (data) {
                $('#from_district').attr('disabled', false);
                $('#from_district').empty().append("<option selected disabled>-- select once --</option>");
                $.each(data, function(key, value) {
                    var option = "<option value='"+ value.id + "'>" + value.name_ru + "</option>";
                    $('#from_district').append(option);
                });
                if(window.console || window.console.firebug) {
                    console.clear();
                }
            },
            async:true,
        })
    });

    $('#from_city_action').on('change', function () {
        var city_id = $('#from_city_action option:selected').val();
        var url = $(this).attr('data-city');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                city_id: city_id
            },
            success: function (data, textStatus, xhr) {
                if (data == null){
                    $('#from_district_action').attr('disabled', true);
                }
                $('#from_district_action').attr('disabled', false);
                $('#from_district_action').empty().append("<option selected disabled>-- select once --</option>");
                $('#from_district_action').append(data);
                if(window.console || window.console.firebug) {
                    console.clear();
                }
            },
            complete: function(xhr) {
                if (xhr.status == 500){
                    alert("Этот город не существует в системе")
                }
            },
            async:true,
        })
    });

    $('#to_city_action').on('change', function () {
        var city_id = $('#to_city_action option:selected').val();
        var url = $(this).attr('data-city');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                city_id: city_id
            },
            success: function (data) {
                $('#to_district_action').attr('disabled', false);
                $('#to_district_action').empty().append("<option selected disabled>-- select once --</option>");
                $('#to_district_action').append(data);
                if(window.console || window.console.firebug) {
                    console.clear();
                }
            },
            async:true,
        })
    });


    $('#to_city').on('change', function () {
        var city_id = $('#to_city option:selected').val();
        var url = $(this).attr('data-city');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                city_id: city_id
            },
            success: function (data) {
                $('#to_district').attr('disabled', false);
                $('#to_district').empty().append("<option selected disabled>-- select once --</option>");
                $.each(data, function(key, value) {
                    var option = "<option value='"+ value.id + "'>" + value.name_ru + "</option>";
                    $('#to_district').append(option);
                });
                if(window.console || window.console.firebug) {
                    console.clear();
                }
            },
            async:true,
        })
    });

    $(document).on('change', '.courier_type', function () {
        var url = $('.tbody-content').attr('data-courier');
        var dataForm = $(this).attr('data-form');
        var data;
        if($(this).prop("checked") == true){
            data = 'true';
        }else{
            data = 'false';
        }
        $.ajax({
            url:url,
            data: {
                result: data,
                dataName: dataForm
            },
            success: function (data) {
                var json = JSON.parse(data);
                if (json.data == 'true') {
                    $('.courier-modal').trigger('click');
                    if (dataForm == 'from') {
                        $('.from_courier_name').attr('disabled', true);
                        $('.from-courier-container').html('<h3>From courier</h3>' + '<br>' + json.result);
                    } else if (dataForm == 'post') {
                        $('.courier_name').attr('disabled', true);
                        $('.courier-container').html('<h3>Region courier</h3>' + '<br>' + json.result);
                    } else {
                        $('.to_courier_name').attr('disabled', true);
                        $('.to-courier-container').html('<h3>To courier</h3>' + '<br>' + json.result);
                    }
                }else{
                    if (json.result != null){
                        $('.courier-modal').trigger('click');
                    }
                    if (dataForm == 'from') {
                        $('.from_courier_name').attr('disabled', false);
                        $('.from-courier-container').html('');
                    } else if (dataForm == 'post') {
                        $('.courier_name').attr('disabled', false);
                        $('.courier-container').html('');
                    } else {
                        $('.to_courier_name').attr('disabled', false);
                        $('.to-courier-container').html('');
                    }
                }
            }
        })
    });

    window.onload = function() {
        MaskedInput({
           elm: document.getElementById('phone'), // select only by id
           format: '+998 (__) ___-__-__',
           separator: '+998 ()-'
        });
        MaskedInput({
            elm: document.getElementsByClassName('phone'), // select only by id
            format: '+998 (__) ___-__-__',
            separator: '+998 ()-'
        });
       MaskedInput({
           elm: document.getElementById('phone_reg'), // select only by id
           format: '+998 (__) ___-__-__',
           separator: '+998 ()-'
        });

        MaskedInput({
           elm: document.getElementById('from_phone'), // select only by id
           format: '+998 (__) ___-__-__',
           separator: '+998 ()-'
        });

        MaskedInput({
            elm: document.getElementById('to_phone'), // select only by id
            format: '+998 (__) ___-__-__',
            separator: '+998 ()-'
         });
     };
     
     // masked_input_1.4-min.js
     // angelwatt.com/coding/masked_input.php
     (function(a){a.MaskedInput=function(f){if(!f||!f.elm||!f.format){return null}if(!(this instanceof a.MaskedInput)){return new a.MaskedInput(f)}var o=this,d=f.elm,s=f.format,i=f.allowed||"0123456789",h=f.allowedfx||function(){return true},p=f.separator||"/:-",n=f.typeon||"_YMDhms",c=f.onbadkey||function(){},q=f.onfilled||function(){},w=f.badkeywait||0,A=f.hasOwnProperty("preserve")?!!f.preserve:true,l=true,y=false,t=s,j=(function(){if(window.addEventListener){return function(E,C,D,B){E.addEventListener(C,D,(B===undefined)?false:B)}}if(window.attachEvent){return function(D,B,C){D.attachEvent("on"+B,C)}}return function(D,B,C){D["on"+B]=C}}()),u=function(){for(var B=d.value.length-1;B>=0;B--){for(var D=0,C=n.length;D<C;D++){if(d.value[B]===n[D]){return false}}}return true},x=function(C){try{C.focus();if(C.selectionStart>=0){return C.selectionStart}if(document.selection){var B=document.selection.createRange();return -B.moveStart("character",-C.value.length)}return -1}catch(D){return -1}},b=function(C,E){try{if(C.selectionStart){C.focus();C.setSelectionRange(E,E)}else{if(C.createTextRange){var B=C.createTextRange();B.move("character",E);B.select()}}}catch(D){return false}return true},m=function(D){D=D||window.event;var C="",E=D.which,B=D.type;if(E===undefined||E===null){E=D.keyCode}if(E===undefined||E===null){return""}switch(E){case 8:C="bksp";break;case 46:C=(B==="keydown")?"del":".";break;case 16:C="shift";break;case 0:case 9:case 13:C="etc";break;case 37:case 38:case 39:case 40:C=(!D.shiftKey&&(D.charCode!==39&&D.charCode!==undefined))?"etc":String.fromCharCode(E);break;default:C=String.fromCharCode(E);break}return C},v=function(B,C){if(B.preventDefault){B.preventDefault()}B.returnValue=C||false},k=function(B){var D=x(d),F=d.value,E="",C=true;switch(C){case (i.indexOf(B)!==-1):D=D+1;if(D>s.length){return false}while(p.indexOf(F.charAt(D-1))!==-1&&D<=s.length){D=D+1}if(!h(B,D)){c(B);return false}E=F.substr(0,D-1)+B+F.substr(D);if(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1){D=D+1}break;case (B==="bksp"):D=D-1;if(D<0){return false}while(i.indexOf(F.charAt(D))===-1&&n.indexOf(F.charAt(D))===-1&&D>1){D=D-1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);break;case (B==="del"):if(D>=F.length){return false}while(p.indexOf(F.charAt(D))!==-1&&F.charAt(D)!==""){D=D+1}E=F.substr(0,D)+s.substr(D,1)+F.substr(D+1);D=D+1;break;case (B==="etc"):return true;default:return false}d.value="";d.value=E;b(d,D);return false},g=function(B){if(i.indexOf(B)===-1&&B!=="bksp"&&B!=="del"&&B!=="etc"){var C=x(d);y=true;c(B);setTimeout(function(){y=false;b(d,C)},w);return false}return true},z=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if((C.metaKey||C.ctrlKey)&&(B==="X"||B==="V")){v(C);return false}if(C.metaKey||C.ctrlKey){return true}if(d.value===""){d.value=s;b(d,0)}if(B==="bksp"||B==="del"){k(B);v(C);return false}return true},e=function(C){if(!l){return true}C=C||event;if(y){v(C);return false}var B=m(C);if(B==="etc"||C.metaKey||C.ctrlKey||C.altKey){return true}if(B!=="bksp"&&B!=="del"&&B!=="shift"){if(!g(B)){v(C);return false}if(k(B)){if(u()){q()}v(C,true);return true}if(u()){q()}v(C);return false}return false},r=function(){if(!d.tagName||(d.tagName.toUpperCase()!=="INPUT"&&d.tagName.toUpperCase()!=="TEXTAREA")){return null}if(!A||d.value===""){d.value=s}j(d,"keydown",function(B){z(B)});j(d,"keypress",function(B){e(B)});j(d,"focus",function(){t=d.value});j(d,"blur",function(){if(d.value!==t&&d.onchange){d.onchange()}});return o};o.resetField=function(){d.value=s};o.setAllowed=function(B){i=B;o.resetField()};o.setFormat=function(B){s=B;o.resetField()};o.setSeparator=function(B){p=B;o.resetField()};o.setTypeon=function(B){n=B;o.resetField()};o.setEnabled=function(B){l=B};return r()}}(window));
});
