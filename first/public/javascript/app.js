(function(){

  var people = getPeopleData();

  var tableBody = document.querySelector("tbody");

  buildTable(people, tableBody);

  function buildTable(data, tableElement) {

    var df = document.createDocumentFragment();

    for(var i=0; i<data.length; i++) {

      var register = data[i];

      var indexColumn = document.createElement("td");
      var firstNameColumn = document.createElement("td");
      var lastNameColumn = document.createElement("td");
      var dniColumn = document.createElement("td");

      var row = document.createElement("tr");

      indexColumn.textContent = i+1;
      firstNameColumn.textContent = register[0];
      lastNameColumn.textContent = register[1];
      dniColumn.textContent = register[2];

      row.appendChild(indexColumn);
      row.appendChild(firstNameColumn);
      row.appendChild(lastNameColumn);
      row.appendChild(dniColumn);

      df.appendChild(row);

    }

    tableElement.appendChild(df);
  }

  function getPeopleData() {
    return [
      ['Joe 01', 'First', '123456789'],
      ['Joe 02', 'First', '123456789'],
      ['Joe 03', 'First', '123456789'],
      ['Joe 04', 'First', '123456789'],
      ['Joe 05', 'First', '123456789'],
      ['Joe 06', 'First', '123456789'],
      ['Joe 07', 'First', '123456789'],
      ['Joe 08', 'First', '123456789'],
      ['Joe 09', 'First', '123456789'],
      ['Joe 10', 'First', '123456789'],
      ['Joe 11', 'First', '123456789'],
      ['Joe 12', 'First', '123456789'],
      ['Joe 13', 'First', '123456789'],
      ['Joe 14', 'First', '123456789'],
      ['Joe 15', 'First', '123456789'],
      ['Joe 16', 'First', '123456789'],
      ['Joe 17', 'First', '123456789'],
      ['Joe 18', 'First', '123456789'],
      ['Joe 19', 'First', '123456789'],
      ['Joe 20', 'First', '123456789']
    ];
  }

})();
