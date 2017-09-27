<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="A chat room demo using Polymer 1.x and PubNub">
  <meta name="author" content="Tomomi Imura  @girlie_mac">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <title>Kitteh Anonymous Chat</title>

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#00BCD4">

    <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#00BCD4">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">
  <link rel="icon" sizes="192x192" href="images/app-icon-192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" sizes="128x128" href="images/app-icon-128.png">

  <!-- More icons -->
  <link rel="icon" sizes="192x192" href="images/app-icon-192.png">
  <link rel="icon" sizes="128x128" href="images/app-icon-128.png">
  <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">

  <!-- Polyfill Web Components support for older browsers -->
  <script src="bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
     <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">

  <!-- Polymer Elelments: will be replaced with elements/elements.vulcanized.html -->
  <link rel="import" href="elements/elements.html">

  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   <script src="offline/offline.js"></script>
        <link rel="stylesheet" href="offline/themes/offline-theme-default.css" />
        <link rel="stylesheet" href="offline/themes/offline-language-english.css" />
        <style is="custom-style">

    paper-input {
      padding-right: 10px;
      --paper-input-container-focus-color: #F44336; /* red */
    }
    paper-toolbar {
      --paper-toolbar-background: #00BCD4; /* cyan */
      --paper-toolbar: {
        font-size: 1.2em; 
      };
    }
     .online{
      padding-left: 22px;
    margin: 10px;
    background-color: #AFFF35;
    border: 1px solid #66EC66;
    border-radius: 22px;
    box-shadow: 0px 0px 5px #fff;
    }
    .offline{
          padding-left: 22px;
    margin: 10px;
    background-color: rgb(255, 86, 86);
    border: 1px solid rgba(255, 141, 141, 0.83);
    border-radius: 22px;
    box-shadow: 0px 0px 5px rgba(255, 248, 248, 0.74);
    }
    #u_status{
      margin-left: 10px;
    }
    #m_status{
      margin-left: 10px;
    }
  </style>
        <script type="text/javascript">
        Offline.options = {checkOnLoad: true}

         // alert(Offline.check());

        </script>

  
  
</head>
<script type="text/javascript">
<?php

class stu{
 public $id="";
  public $name="";
   public $chan="";
   public $ava="";

}
$s = new stu();
$s->id=$_GET['id'];
$s->name=$_GET['name'];
$s->chan=$_GET['channel'];
$s->ava="data: ;base64,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";
$data=json_encode($s);

echo 'var data='.$data.'';
?>
</script>
<body unresolved class="fullbleed layout vertical">

  <template is="dom-bind" id="app">

    <!-- Use your own publish_key and subscribe_key please!  --> 
    <core-pubnub publish_key="pub-c-156a6d5f-22bd-4a13-848d-b5b4d4b36695" subscribe_key="sub-c-f762fb78-2724-11e4-a4df-02ee2ddab7fe" ssl="true" uuid="{{uuid}}">
      <core-pubnub-subscribe channel="{{channel}}" id="sub" on-callback="subscribeCallback" on-presence="presenceChanged" on-error="{{error}}">
        <core-pubnub-publish channel="{{channel}}" message="" id="pub" on-error="{{error}}"></core-pubnub-publish>
        <core-pubnub-history channel="{{channel}}" count="30" on-success="historyRetrieved" on-error="{{error}}"></core-pubnub-history>
      </core-pubnub-subscribe>
    </core-pubnub>

  <!-- Drawer Panel (Left Column) -->
  <paper-drawer-panel id="drawerPanel">

    <!-- Drawer Header/Toolbar -->
    <paper-header-panel drawer>
      <paper-toolbar id="navheader" class="tall">
        <div class$="{{_colorClass(color)}} middle"  style$="{{_backgroundImage(avatar)}}"></div>
        <div class="bottom uuid">{{uuid}}</div>
      </paper-toolbar>

      <!-- Drawer Content -->
      <section id="onlineList">
        <paper-item class="subdue layout horizontal center">Online Now</paper-item>
        <template is="dom-repeat" items="{{cats}}" as="cat">
          <paper-item>{{cat}}</paper-item>
        </template>
      </section>
    </paper-header-panel>

    <!-- Main Area -->
    <paper-header-panel main>

      <!-- Main Header/Toolbar -->
      <paper-toolbar>
                        <paper-icon-button icon="menu" on-tap="menuAction" paper-drawer-toggle></paper-icon-button>

        <div class="flex"><strong>Chat</strong></div>
      <!-- <span>{{occupancy}}</span> <iron-icon icon="account-circle"></iron-icon>-->
         <div id="u_status"></div>
        <div id="m_status"></div>
      </paper-toolbar>

      <!-- Main Content -->
      <div class="layout vertical fit" id="chat">
        <div class="chat-list flex">
          <template is="dom-repeat" items="{{messageList}}" as="message">
            <x-chat-list color="{{message.color}}" avatar="{{message.avatar}}" username="{{message.uuid}}" text="{{message.text}}" status="{{message.status}}" timestamp="{{message.timestamp}}"></x-chat-list>
          </template>
        </div>
        <div class="shim"></div>

        <div class="send-message layout horizontal">
          <paper-input class="flex" label="Type message..." id="input" value="{{input}}" on-keyup="checkKey"></paper-input>
          <paper-fab icon="send" id="sendButton" on-tap="sendMyMessage"></paper-fab>
        </div>
      </div>
    </paper-header-panel>
  </paper-drawer-panel>

</template>
<script src="sound.js"></script>
<script src="only_id_chat.js"></script>
</body>
</html>

<script type="text/javascript">
Offline.check();
  Offline.on('up', function() {
            document.getElementById('u_status').innerHTML='<i>You:</i><span class="online"></span>'

});
Offline.on('down', function() {
            document.getElementById('u_status').innerHTML='<i>You:</i><span class="offline"></span>'

});
</script>