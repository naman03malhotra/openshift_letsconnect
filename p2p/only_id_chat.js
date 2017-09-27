(function() {
  'use strict';

  var uuid, avatar, color, cat,chan;

  // Assign a uuid made of a random cat and a random color
  var randomColor = function() {
    var colors = ['navy', 'slate', 'olive', 'moss', 'chocolate', 'buttercup', 'maroon', 'cerise', 'plum', 'orchid'];
    return colors[(Math.random() * colors.length) >>> 0];
  };

  var randomCat = function() {
    var cats = ['tabby', 'bengal', 'persian', 'mainecoon', 'ragdoll', 'sphynx', 'siamese', 'korat', 'japanesebobtail', 'abyssinian', 'scottishfold'];
    return cats[(Math.random() * cats.length) >>> 0];
  };

  color = randomColor();
 /* cat = randomCat();
  uuid = color + '-' + cat;
  avatar = 'images/' + cat + '.jpg';*/
  avatar = data.ava;
  uuid = data.name;
  chan = data.chan;
  //alert(avatar);
  

  function showNewest() {
    //document.querySelector('core-scaffold').$.headerPanel.scroller.scrollTop = document.querySelector('.chat-list').scrollHeight;
//sounds.play('mess_in');
    var chatDiv = document.querySelector('.chat-list');
    chatDiv.scrollTop = chatDiv.scrollHeight; //TODO: Need to fix so that we can find the .chat-list class object
  }

  /* Polymer UI and UX */

  var template = document.querySelector('template[is=dom-bind]');

  template.channel = chan;
  template.uuid = uuid;
  template.avatar = avatar;
  template.color = color;
  template.cats = [];

  // Sending a chat message by pressing a keyboard return key
  template.checkKey = function(e) {
    if(e.keyCode === 13 || e.charCode === 13) {
      template.publish();
     sounds.play( 'mess_in' );
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
      var catName = (l.uuid + '').split('-')[1];
      //l.avatar = 'images/' + catName + '.jpg';
     // alert("my UUID:"+uuid+"L uuid:"+l.uuid);
      l.avatar = "'"+l.avatar+"'";
     /* if(l.uuid==uuid)
      {
        sounds.play('mess_in');
      }*/

     /* if (catName === undefined || /\s/.test(l.uuid)) {
        l.uuid = 'fail-cat';
        console.log('Oh you, I made this demo open so nice devs can play with, but you are not nice. Please use your keys, and do not mess with this chat room.');
      }*/

      // Check status
      if(template.cats.indexOf(l.uuid) > -1) {
        l.status = 'online';
                  document.getElementById('m_status').innerHTML='<i>Other:</i><span class="online"></span>'

      } else {
        l.status = 'offline';
                  document.getElementById('m_status').innerHTML='<i>Other:</i><span class="offline"></span>'

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

    
    if(template.$.sub.messages.length > 0) { //console.log(template.$.sub.messages);
      //alert(template.$.sub.messages[0].uuid);
        this.displayChatList(pastMsgs.concat(this.getListWithOnlineStatus(template.$.sub.messages)));
        //alert("my UUID:"+uuid+"L uuid:"+template.$.sub.messages);
    }
    console.log("e det:"+e.detail);
  if(e.detail.uuid!=uuid && e.detail.uuid!==undefined)
  {
    //alert("sound");
    sounds.play('mess_in');
   // console.log("My uuid:"+uuid+" Other:"+e.detail.uuid);
  }  

  };

  template.presenceChanged = function(e) {
    var i = 0;
    var l = template.$.sub.presence.length;
    var d = template.$.sub.presence[l - 1];
    
   // console.log(d.uuid);
     //console.log(d.occupancy);

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
          document.getElementById('m_status').innerHTML='<i>Other:</i><span class="offline"></span>'

        }
      }
      else
      {
        document.getElementById('m_status').innerHTML='<i>Other:</i><span class="online"></span>'
         sounds.play( 'men_in' );

      }
      /*if(d.uuid.length > 35) { // pubnub admin console
        d.uuid = 'the-mighty-big-cat';
      }*/
      this.push('cats', d.uuid);
        
    } else {
      var idx = template.cats.indexOf(d.uuid);
      if(idx > -1) {
        this.splice('cats', idx, 1);
      }
    }

    if(d.action === 'leave' || d.action ==='timeout')
    {
      // alert(d.uuid+" left the conversation.");
      if(d.uuid==uuid)
      {
        //document.getElementById('u_status').innerHTML='<i>You:</i><span class="offline"></span>'
        // sounds.play( 'men_out' );
        
      }
      else
      {
        document.getElementById('m_status').innerHTML='<i>Other:</i><span class="offline"></span>'
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