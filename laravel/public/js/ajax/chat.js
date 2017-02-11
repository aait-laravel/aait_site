
function send_message(message, receiver) {
  var token = $('input[name=_token]').val();
 
  $.ajax({
    url: '/send_chat_message',
    method: 'post',
    data: {'_token': token,chat_body: message, student: receiver},
    success: function(data) {
          $('textarea.form-control').val('');
          get_messages(receiver);
    }
  });
}


function get_messages(r) {
  $.ajax({
    url: '/'+r+'/get_chat_message',
    method: 'GET',
    success: function(data) {
      $('div#chatContent').html("");
      var sent = data['sent_messages'];
      var received = data['received_messages'];
      
      var mesSender = "";
      var mesReceiver = "";
      var st = "";
      var rd = "";
      JSON.parse(sent, function(k, v) {
       
      if(k == 0){

        mesSender = '<div class="left"><div class="author-name">Me</div><div class="chat-message active">'+v+'</div></div>'
      }
      else if(k == "date"){     
       mesSender = mesSender+'<div class="left"><small class="chat-date">'+v.substr(0,16)+'</small></div>'
        st = st + mesSender;
      }

      });
      JSON.parse(received, function(k, v) {
     
      if(k == 0){

        mesReceiver = '<div class="right"><div class="author-name">'+$('.sidebar-message').attr("name")+'</div><div class="chat-message">'+v+'</div></div>'
      }
      else if(k == "date"){     
       mesReceiver = mesReceiver+'<div class="right"><small class="chat-date">'+v.substr(0,16)+'</small></div>'
        rd = rd + mesReceiver;
      }

      });  
      $('div#chatContent').html(st+rd);
    }
  });
}
var set;
function boot_chat(id) {
  clearInterval(set);
  set = setInterval(function() {get_messages(id)}, 2000);

  $('#sendChat').on('click', function (event) {
      var message = $('textarea.form-control').val();
      var rid = $('#rid').val();
      // Check if the message is not empty
      if (message.length !== 0) {
        $('textarea.form-control').val('');
        send_message(message, rid);

      } else {
        $('textarea.form-control').val('');
      }
  });
}

// Initialize the chat
$('.sidebar-message').on('click', function (event) {
        var user_id = $(this).attr('id');
        var user_name = $(this).attr('name');
        if (user_name != ""){
            var html = $("<span>").text(user_name);
            $("#heading").html("");
            html.prependTo('#heading');
        }boot_chat(user_id);
        if (user_id != ""){
            $("#rid").attr("value", user_id);
        }
        $('.open-small-chat').children().toggleClass('fa-comments').toggleClass('fa-remove');
        if($('.small-chat-box').attr('class').includes('active')){
              //
        }
        else{
        $('.small-chat-box').toggleClass('active');
        }
        
    });
