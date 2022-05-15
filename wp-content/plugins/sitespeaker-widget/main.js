(function($) {
  var allVoices, bootstrap, apiKey, selectedLang, selectedVoice, testAudio = document.createElement("AUDIO");
  $(onDomReady);
  
  function onDomReady() {
    apiKey = $("#sitespeaker_key").val() || "";
    selectedLang = $("#sitespeaker_lang").data("value") || "en-US";
    selectedVoice = $("#sitespeaker_voice").data("value") || "";
    Promise.all([loadVoices(), loadBootstrap()]).then(update);
    $("#sitespeaker_key").change(function() {
      apiKey = this.value;
      loadVoices().then(update);
    })
    $("#sitespeaker_lang").change(function() {
      selectedLang = this.value;
      update();
    })
    $("#sitespeaker_voice").change(function() {
      selectedVoice = this.value;
      update();
    })
    $("#sitespeaker_test").click(function() {
      if (selectedLang && selectedVoice) {
        $.get("https://ws.sitespeaker.link/test-voice?lang=" + selectedLang + "&voice=" + encodeURIComponent(selectedVoice), function(res) {
          testAudio.src = res.url;
          testAudio.play();
        })
      }
    })
  }

  function loadVoices() {
    if (!apiKey) {
      allVoices = [];
      return Promise.resolve();
    }
    return new Promise(function(fulfill) {
      $.post({
        url: "https://ws.sitespeaker.link/list-voices",
        data: JSON.stringify({key: apiKey}),
        contentType: "application/json",
        dataType: "json",
        success: function(res) {
          allVoices = res;
          fulfill();
        },
        error: function() {
          alert("Failed to load voice list, possibly invalid API key");
          allVoices = [];
          fulfill();
        }
      })
    })
  }

  function loadBootstrap() {
    return new Promise(function(fulfill) {
      $.get("https://assets.sitespeaker.link/embed/js/bootstrap.min.js", function(res) {
        bootstrap = res;
        fulfill();
      })
    })
  }

  function update() {
    var languages = Array.from(new Set(allVoices.map(function(voice) {return voice.lang}))).sort();
    if (selectedLang && languages.indexOf(selectedLang) == -1) selectedLang = "";
    $("#sitespeaker_lang").empty();
    $("<option>").val("").appendTo("#sitespeaker_lang");
    languages.forEach(function(lang) {
      $("<option>").val(lang)
        .text(lang)
        .appendTo("#sitespeaker_lang");
    })
    $("#sitespeaker_lang").val(selectedLang);

    var voices = allVoices.filter(function(voice) {return voice.lang == selectedLang}).sort(function(a,b) {return a.desc.localeCompare(b.desc)});
    if (selectedVoice && !voices.some(function(voice) {return voice.name == selectedVoice})) selectedVoice = "";
    $("#sitespeaker_voice").empty();
    $("<option>").val("").appendTo("#sitespeaker_voice");
    voices.forEach(function(voice) {
      $("<option>").val(voice.name)
        .text((voice.desc||voice.name) + " (" + voice.gender[0].toLowerCase() + ")")
        .appendTo("#sitespeaker_voice");
    })
    $("#sitespeaker_voice").val(selectedVoice);

    var apiKey = $("#sitespeaker_key").val();
    if (apiKey && selectedLang && selectedVoice) {
      var code = "";
      code += '<style>#ra-player {margin-bottom: 1em;} .ra-button {padding: .3em .9em; border-radius: .25em; background: linear-gradient(#fff, #efefef); box-shadow: 0 1px .2em gray; display: inline-flex; align-items: center; cursor: pointer;} .ra-button img {height: 1em; margin: 0 .5em 0 0;}</style>\n';
      code += '<div id="ra-player" data-skin="https://assets.sitespeaker.link/embed/skins/default">';
      code += '<div class="ra-button" onclick="readAloud(document.getElementById(\'ra-audio\'), document.getElementById(\'ra-player\'))">';
      code += '<img src="https://assets.sitespeaker.link/embed/skins/default/play-icon.png"/> Listen to this article';
      code += '</div>';
      code += '</div>\n';
      code += '<audio id="ra-audio" data-lang="' + selectedLang + '" data-voice="' + selectedVoice + '" data-key="' + apiKey + '"></audio>\n';
      code += '<script>\n<!--\n' + bootstrap + '\n//-->\u003c/script>\n';
      $("#sitespeaker_code").val(code);
    }
    else {
      $("#sitespeaker_code").val("");
    }
  }
})
(jQuery)
