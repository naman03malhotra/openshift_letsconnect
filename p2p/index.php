<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="author" content="Tomomi Imura  @girlie_mac">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <title>P2P Group chat</title>

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#00BCD4">

  <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#00BCD4">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">
  <link rel="icon" sizes="192x192" href="/img/lg123.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" sizes="128x128" href="images/app-icon-128.png">

  <!-- More icons -->
  <link rel="icon" sizes="192x192" href="/img/lg123.png">
  <link rel="icon" sizes="128x128" href="/img/lg123.png">
  <meta name="msapplication-TileImage" content="/img/lg123.png">

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
  <link rel="stylesheet" href="http://www.amaranjs.com/docs/dist/css/amaran.min.css">

  <script src="https://www.amaranjs.com/js/vendor/jquery.min.js"></script>
  <script src="https://www.amaranjs.com/AmaranJS/dist/js/jquery.amaran.min.js"></script>

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

       

         </script>



       </head>
       <script type="text/javascript">
       <?php



       class Stu{
         public $id="";
         public $name="";
         public $chan="";
         public $ava="";

       }
       $s = new Stu();


       $rand = uniqid();


       if(isset($_GET['channel']))
       {  
         $name = $_GET['name'];
         $s->name=$name; 
         $s->chan=$_GET['channel'];
         $s->id=$rand;


       }
       else
       {


        $data_uri = '/p2p/?channel='.$rand.'&name=YOUR_NAME';

        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $data_uri);
      }
      $s->ava='img/'.strtolower($name[0]).'_black.png';


      $user=json_encode($s);

      echo 'var user='.$user.';';


      ?>
      var data;

      {
        data=user;
        var usr_set="y";

      }

      </script>
      <body unresolved class="fullbleed layout vertical">

        <template is="dom-bind" id="app">

          <!-- Use your own publish_key and subscribe_key please!  --> 
          <core-pubnub publish_key="pub-c-143a86dc-4e11-49fb-b48b-2c4f8485d8ec" subscribe_key="sub-c-9a0e6398-ee08-11e5-ab43-02ee2ddab7fe" ssl="true" uuid="{{uuid}}">
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
      <div class="bottom uuid">{{name}}</div>
    </paper-toolbar>

    <!-- Drawer Content -->
    <section id="onlineList">
      <paper-item class="subdue layout horizontal center">Online Now</paper-item>
      <div style="display: none;">
        <template is="dom-repeat" items="{{cats}}" as="cat">
          <paper-item>{{cat}}</paper-item>
        </template>
      </div>

      <template is="dom-repeat" items="{{mens}}" as="men">
        <paper-item>{{men}}</paper-item>
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
  <div id="u_status"><i>You:</i><span class="online"></span></div>
  <div id="m_status"></div>
</paper-toolbar>

<!-- Main Content -->
<div class="layout vertical fit" id="chat">
  <div class="chat-list flex">
    <template is="dom-repeat" items="{{messageList}}" as="message">
      <x-chat-list color="{{message.color}}" avatar="{{message.avatar}}" username="{{message.name}}" text="{{message.text}}" status="{{message.status}}" timestamp="{{message.timestamp}}"></x-chat-list>
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
<script src="js/app.js"></script>
</body>
</html>

<script type="text/javascript">


Offline.check();
Offline.on('up', function() {
  $('#u_status').html('<i>You:</i><span class="online"></span>');



});
Offline.on('down', function() {
 $('#u_status').html('<i>You:</i><span class="offline"></span>');


});


</script>