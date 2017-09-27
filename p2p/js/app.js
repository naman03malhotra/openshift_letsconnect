(function() {
  'use strict';

  var uuid, avatar, color, cat,chan, name;

  
  color= 'whitesmoke';
  avatar = data.ava;
  name= data.name;
  uuid = data.id;
  chan = data.chan;
  
  

  function showNewest() {
   
    var chatDiv = document.querySelector('.chat-list');
    chatDiv.scrollTop = chatDiv.scrollHeight; //TODO: Need to fix so that we can find the .chat-list class object
  }

  /* Polymer UI and UX */

  var template = document.querySelector('template[is=dom-bind]');

  template.name= name;
  template.channel = chan;
  template.uuid = uuid;
  template.avatar = avatar;
  template.color = color;
  template.cats = [];
   template.mens = [];

  // Sending a chat message by pressing a keyboard return key
  template.checkKey = function(e) {
    if(e.keyCode === 13 || e.charCode === 13) {
      template.publish();
     //sounds.play( 'mess_in' );
    }
  };
  // Sending a chat message by clicking a "Send" button
  template.sendMyMessage = function(e) {
    template.publish();
   sounds.play( 'mess_in' );
  };

  template.messageList = [];


  /* PubNub Realtime Chat */

  var pastMsgs = [];
  var onlineUuids = [];

  template.getListWithOnlineStatus = function(list) {
    [].forEach.call(list, function(l) {
      // sanitize avatars
       //sounds.play('mess_in');
      var catName = (l.name + '').split('-')[1];
      //l.avatar = 'images/' + catName + '.jpg';
     // alert("my UUID:"+uuid+"L uuid:"+l.uuid);
      l.avatar = "'"+l.avatar+"'";
    

      // Check status
      if(template.cats.indexOf(l.uuid) > -1) {
        l.status = 'online';
                  if(l.uuid!=uuid)
                  {
                    if(usr_set=="y")
                       document.getElementById('m_status').innerHTML='<i>Other Guy:</i><span class="online"></span>'
                     else
                        document.getElementById('m_status').innerHTML='<i>User:</i><span class="online"></span>'
                  
                  console.log("1");
                  }

      } else {
        l.status = 'offline';
             if(l.uuid!=uuid){
                  if(usr_set=="y")
                       document.getElementById('m_status').innerHTML='<i>Other Guy:</i><span class="offline"></span>'
                     else
                        document.getElementById('m_status').innerHTML='<i>User:</i><span class="offline"></span>'
                  console.log("3");
                }

      }
    });
    return list;
  };

  template.displayChatList = function(list) {
    template.messageList = list;
    // scroll to bottom when all list items are displayed
    template.async(showNewest);
  };

  template.subscribeCallback = function(e) {

    
    if(template.$.sub.messages.length > 0) { console.log(template.$.sub.messages);
      //alert(template.$.sub.messages[0].uuid);
        this.displayChatList(pastMsgs.concat(this.getListWithOnlineStatus(template.$.sub.messages)));
        //alert("my UUID:"+uuid+"L uuid:"+template.$.sub.messages);
    }
    //console.log("e det:"+e.detail);
  if(e.detail.uuid!=uuid && e.detail.uuid!==undefined) //play sound when msg recieved from other side.
  {
    //alert("sound");
    sounds.play('mess_in');

     $.amaran({
                
                'content'   :{
                   title:'you have a new message!',
                         bgcolor:'#5c8b5c',
                         color:'#f00',
                           icon:'fa fa-smile-o',
                           info:'',
                         message:'You have a new message!'
                       

                    
                     },
                     'theme'     :'default',

                     'sticky'    :true,
                     'closeOnClick':true,
                     'outEffect':'slideLeft',
                      'closeButton'   :true,
                       'afterEnd' :function()
                        {
                            $('html,body').animate({
                           scrollTop: $("#chatio").offset().top},
                                 'slow');
                        }
                   
                });
   // console.log("My uuid:"+uuid+" Other:"+e.detail.uuid);
  }  

  };

  template.presenceChanged = function(e) {
    var i = 0;
    var l = template.$.sub.presence.length;
    var d = template.$.sub.presence[l - 1];
   // alert(d.name);
      var who_online;
      

      if(d.uuid==data.id)
      {
        who_online=data.name;
        //alert("data name:"+data.name);
      }
      if(d.uuid==data2.id)
      {
        who_online=data2.name;
        //alert("data2 name:"+data2.name);
      }
      
     

    // how many users
    template.occupancy = d.occupancy;
    if(template.occupancy==1)
    {
      var occupan=1;
    }

    // who are online
    if(d.action === 'join') {
      //alert(d.uuid+" joined the conversation.");
      if(d.uuid==uuid)
      {
        //sounds.play( 'men_in' );
        document.getElementById('u_status').innerHTML='<i>You:</i><span class="online"></span>'
        if(occupan==1)
        {
                     if(usr_set=="y")
                       document.getElementById('m_status').innerHTML='<i>Other Guy:</i><span class="offline"></span>'
                     else
                        document.getElementById('m_status').innerHTML='<i>User:</i><span class="offline"></span>'

        }
      }
      else
      {
                     if(usr_set=="y")
                       document.getElementById('m_status').innerHTML='<i>Other Guy:</i><span class="online"></span>'
                     else
                        document.getElementById('m_status').innerHTML='<i>User:</i><span class="online"></span>'
         sounds.play( 'men_in' );
         console.log("2");

      }
     
      this.push('cats', d.uuid);
       this.push('mens', who_online);
        
    } else {
      var idx = template.cats.indexOf(d.uuid);
      if(idx > -1) {
        this.splice('cats', idx, 1);
      }
      var idx2 = template.mens.indexOf(who_online);
      if(idx2 > -1) {
        this.splice('mens', idx2, 1);
      }
    }

    if(d.action === 'leave' || d.action ==='timeout')
    {
      // alert(d.uuid+" left the conversation.");
      if(d.uuid==uuid)
      {
        
        
      }
      else
      {
                    if(usr_set=="y")
                       document.getElementById('m_status').innerHTML='<i>Other Guy:</i><span class="offline"></span>'
                     else
                        document.getElementById('m_status').innerHTML='<i>User:</i><span class="offline"></span>'
         sounds.play( 'men_out' );

      }
    }

    i++;

    // update the status at the main column
    if(template.messageList.length > 0) {

      template.messageList = this.getListWithOnlineStatus(template.messageList);
    }
  };

  template.historyRetrieved = function(e) {
  if(e.detail[0].length > 0) {
      pastMsgs = this.getListWithOnlineStatus(e.detail[0]);
      this.displayChatList(pastMsgs);
    }
  };

  template.publish = function() {
    if(!template.input) return;

    template.$.pub.message = {
      uuid: uuid,
      name: name,
      avatar: avatar,
      color: color,
      text: template.input,
      timestamp: new Date().toISOString()
    };
    template.$.pub.publish();
    template.input = '';
  };

  template.error = function(e) {
      console.log(e);
  };

  template._colorClass = function(color) {
      return 'middle avatar '+color;
  };

  template._backgroundImage = function(avatar) {
      return 'background-image: url("'+avatar+'");';
  };
})();