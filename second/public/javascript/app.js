(function(){

  var json = getJson();

  var divFirst = document.querySelector("div#first");
  var divSecond = document.querySelector("div#second");

  divFirst.textContent = firstWay(json);

  divSecond.textContent = secondWay(json);

  var div = document.querySelector("div#first");

  function firstWay(jsonData) {
    var jsonKeys = Object.keys(jsonData);
    // console.log(jsonKeys);
    return jsonKeys.length;
  }

  function secondWay(jsonData) {
    var key = null;
    var count = 0;
    for(key in jsonData) {
      // console.log(key);
      count++;
    }
    return count;
  }

  function getJson() {
    return {
      id: 1,
      firstName: 'José Gabriel',
      lastname: 'González',
      dni: '123456789A'
    };
  }

})();
