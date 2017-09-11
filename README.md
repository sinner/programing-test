**Test**

**a.- Puedes encontrar la respuesta en el directorio first.**

**b.- Puedes encontrar la respuesta en el directorio second.**

**c.- Puedes encontrar la respuesta en el directorio third.**

**d.- Enumera todas las formas que conozcas de cargar y ejecutar javascript de forma asíncrona en un navegador web:**
 
- Haciendo uso de Javascript Nativo:

```javascript

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log(this.responseText);
  }
};
xhttp.open("GET", "http://myapi.com/", true);
xhttp.send();

```

- Haciendo uso de jQuery:

```javascript

$.ajax({
  url: 'http://myapi.com',
  type: 'POST',
  data: {
    country: 'Venezuela'
  }
  sucess: function (response, status, xhr) {
    console.log(response);
  },
  error: function(xhr, status, error) {
    console.log(error);
  }
});

```

- Haciendo uso de Angular 1.x:

```javascript

/**
 * @ngdoc service
 * @name MyModule:GetDataFactory
 *
 * @description
 *
 **/
angular.module('MyModule')
    .factory('GetDataFactory', ['$q', '$http',  function($q, $http) {

        var csrfToken = $window.csrfToken;

        function getData(criteria) {
            return $http({
                url: 'http://myapi.com',
                method: 'GET',
                params: {
                    country: 'Venezuela'
                }
            }).then(getData);

            function getData(response, status, headers, config) {
                return response.data;
            }
        }

        var Service = {
            getData: getData
        };

        return Service;
}]);

```

- Haciendo uso de Angular 2/4:

```typescript jsx

// Service 

import { Injectable } from '@angular/core';
import { Http }       from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import { MyData }       from '../models/my-data';

@Injectable()
export class GetDataService {

  constructor(private http: Http) {}

  getData(term: string): Observable<MyData[]> {
    return this.http
      .get(`http://myapi.com/?country=${term}`)
      .map(response => response.json().data as MyData[]);
  }

}

// Using from the component

import {Component, OnInit} from '@angular/core';
import {MyData} from "../models/my-data";
import {GetDataService} from "../services/get-data.service";

@Component({
  selector: 'app-getting-data',
  providers: [],
  templateUrl: './getting-data.component.html',
  styleUrls: ['./getting-data.component.scss']
})
export class GettingDataComponent implements OnInit {

  myData: MyData[];

  constructor (private getDataService: GetDataService){
  }

  ngOnInit(): void {
    this.getData();
  }

  getData(): void {
    this.getDataService.getData('Venezuela').then((response)=>{
      this.myData = response;
    });
  }

}

```

- Haciendo uso de React con la librería "Superagent" de javascript:

```javascript

import React from 'react';
import request from 'superagent';

class DisplayData extends React.Component {

    constructor() {
        super();
        this.data = [];
    }

    onInputChange(term) {
        let url = `https://myapi.com?country=${term}`;
        request.get(url).then((response) => {
            this.data = response;
        }).
        catch(function(error) {
          console.log(error)
        });
    }

    render() {
        return (
            <div className="search">
                <input placeholder="Enter Venezuela!"
                       onChange={event => this.onInputChange(event.target.value)} />
            </div>
        );
    }

}

export default SearchBar;

```

**e.- ¿Que formas conoces para dotar a las aplicaciones basadas en ajax (Single Page Application) la funcionalidad de avanzar y retroceder en el historial?:**

- Haciendo uso de Angular 1.x (ngRoute, $routeProvider)

```typescript jsx

// main template
<ng-view></ng-view>


// router configuration
angular.module("myApp", ["ngRoute"]).config(
  function($routeProvider) {
    $routeProvider
    .when("/", {
      templateUrl : "list.html",
      controller : "listCtrl"
    })
    .when("/red", {
      templateUrl : "detail.html"
      controller : "detailCtrl"
    })
    .otherwise({
      templateUrl : "list.html",
      controller : "listCtrl"
    });
});

// controllers
angular.module("myApp")
  .controller("detailCtrl", ['$scope', function ($scope) {
    var vm = this;
  }]
);

angular.module("myApp")
  .controller("listCtrl", ['$scope', function ($scope) {
    var vm = this;
  }]
);

```

- Haciendo uso de Angular 2/4 (@angular/router)

```typescript

//Component

import {Component, OnInit} from '@angular/core';
import {MyData} from "../models/my-data";
import {GetDataService} from "../services/get-data.service";
import {Router} from "@angular/router";

@Component({
  selector: 'app-getting-data',
  providers: [],
  templateUrl: './getting-data.component.html',
  styleUrls: ['./getting-data.component.scss']
})
export class GettingDataComponent implements OnInit {

  myData: MyData[];

  constructor (private getDataService: GetDataService, private  router: Router){
  }

  ngOnInit(): void {
    this.getData();
  }

  getData(): void {
    this.getDataService.getData('Venezuela').then((response)=>{
      this.myData = response;
    });
  }
  
  gotoDetail(myDataSelected: MyData): void {
    this.router.navigate(['/detail', myDataSelected.id]);
  }

}

import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { GettingDataComponent } from "./getting-data/getting-data.component";
import { MyDataDetailComponent } from './my-data-detail/my-data-detail.component';

const routes: Routes = [
  { path: '', redirectTo: '/list', pathMatch: 'full' },
  { path: 'list',  component: GettingDataComponent },
  { path: 'detail/:id', component: MyDataDetailComponent }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}

```

- Haciendo uso de React con el componente "react-router-dom" y/o "react-router-redux".

**f.- Transforma el código necesario con el objetivo de definir un callback que se ejecute al final de todo el proceso y nos devuelva el valor de n. Suponemos que data responderá el valor del parámetro num. Asumimos que la función “get” existe y funciona como se espera.**

```js

  // Entendí que que todos los procesos debían ejecutarse de forma ordenada y dado que al menos dos de las tres
  // operaciones con la variable "n" son asíncronos me tomé la libertad de encapsular cada operación dentro de una promesa
  // y encadenar las promesas para obtener el resultado de "n" 

  var x = process();

  x.then(function(n){
    console.log(n);
  });

  function process() {
    var p1 = new Promise(function(resolve, reject) {
      var n = 0;
      get('data', {num: 10}, function(res){
        n = n * res;
      });
    });

    var p2 = function(n){
        return new Promise(function(resolve, reject) {
          setTimeout(function(){
            n = n * 2;
            resolve(n);
          }, 0);
        });
      }
    ;

    var p3 = function(n) {
      return new Promise(function(resolve, reject) {
        n = n + 2;
        resolve(n);
      });
    };

    return p1.then(p2).then(p3);
  }
```

**g. En php, teniendo una clase la cual es extendida por varias y que dispone de un método que necesitamos utilizar... ¿Que opciones tenemos para saber cual es el tipo de objeto sobre el que estamos actualmente dentro de este método? Además, de que métodos dispondríamos para obtener el mismo resultado si se tratara de una función estática?**

- Puedes hacer uso de las funciones get_class() or get_called_class(), si quisieras obtener la clase padre get_parent_class(). Si necesitas obtener la misma información de un método estático lo mejor es utilizar la función get_called_class. 

 ```php
<?php

// Model.php
 
namespace Core;
 
/**
* Class Model
* @package Core
*/
class Model {

   public function getMyClassName(): array {
       return [
           get_class($this),
           get_called_class(),
           get_parent_class($this),
       ];
   }

   public static function getMyClassNameFromStatic(): string {
       return get_called_class();
   }

}
 
// User.php
 
namespace Entities;

use Core\Model;

/**
 * Class User
 * @package Entities
 */
class User extends Model {

}

// Post.php

namespace Entities;

use Core\Model;

/**
 * Class Post
 * @package Entities
 */
class Post extends Model {

}

```

**h. Describe y explica con código php la estructura de una clase que pueda ser iterada mediante la función foreach y que nos devuelva su número de índices mediante la función count**

- Para que un objeto pueda ser recorrido con el bloque foreach debe implementar la interfaz Iterator de PHP y para que pueda obtener la cantidad de elementos que posee a través de la función "count" debe implementar la interfaz Countable de PHP. 

```php
<?php

namespace Core;

/**
 * Class myIterator
 * @package Core
 */
class MyIterator implements \Iterator, \Countable {

    private $position = 0;

    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function setData(array $data){
        $this->array = $data;
        $this->rewind();
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }

    public function count() {
        return count($this->array);
    }

}

$iterator = new MyIterator();

foreach($iterator as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}

var_dump(count($iterator));

?>

```

**i. En php, dada una clase padre que tiene una función cuya salida es el número de filas que existen en
  una supuesta tabla de nuestra base de datos denominada “productos”, muestra en código como sería
  una clase que extienda de esta y que devuelva el número de filas de la misma tabla, pero multiplicado
  por 100. Has de tener en cuenta que que los nombres de la función deben tener el mismo nombre en
  ambos casos.**

 ```php
<?php

// Model.php
 
namespace Core;
 
/**
* Class Model
* @package Core
*/
class Producto {
    
   private $mysqli;
   
   public function __construct() {
       $this->mysqli = $mysqli = new \mysqli("localhost", "my_user", "my_password", "productos_db");;
   }

   public function getProductsCount() {
       $sql = 'SELECT COUNT(*) AS total FROM productos';
       $result = $this->mysqli->query($sql);
       $data = $result->fetch_assoc();
       return $data['total'];
   }

}
 
// OtroProducto.php
 
namespace Entities;

use Core\Producto;

/**
 * Class User
 * @package Entities
 */
class OtroProducto extends Producto {

    public function getProductsCount() {
        return parent::getProductsCount() * 100;
    }

}

```

**j. Describe brevemente los componentes (lógica, clases o estructuras) que utilizarías en una aplicación en php con soporte para múltiples idiomas**

- Mi experiencia implementando internacionalización o multiples idiomas con PHP ha sido haciendo uso de frameworks como Symfony.
- Con Symfony:

  Se pueden hacer uso de archivos "YML" o "XLIFF". Se recomienda que estos archivos esté localizados en el directorio "app/Resources/translations/".
  Un ejemplo de uno de estos archivos pudiera ser el siguiente:
  
```yaml
# messages.es.yml
welcome.message: "Hola, Bienvenido!"
```

```xml
<!-- messages.es.xlf -->
<?xml version="1.0"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
    <file source-language="en" datatype="plaintext" original="file.ext">
        <body>
            <trans-unit id="welcome.message">
                <source>Hello, Wellcome!</source>
                <target>Hola, Bienbenido!</target>
            </trans-unit>
        </body>
    </file>
</xliff>
```

  Los nombres de estos archivos están compuestos por domain ("messages") y el locale ("es").
  El domain o dominio por defecto en symfony es "messages", pero, puedes definir otros dominios (archivos) para tener
  más ordenado tus mensajes de internationalization.
  
  Para hacer uso de estos archivos desde los controllers, repositories, services se hace uso del servicio (translator):

```php
<?php

use Symfony\Component\HttpFoundation\Response;

public function indexAction(Request $request) {

    $param = [];
    $domain = 'messages';
    $translated = $this->get('translator')->trans('welcome.message', $param, $domain);

    return new Response($translated);

}

```

  Para hacer uso de la internacionalización desde las plantillas twig, puedes apoyarte en la función o filtro "trans":
  
```twig

<h3>{{ 'welcome.message' | trans({}, 'messages') }}</h3>

```

  Por otra parte para definir el locale, hay muchas formas, la primera es la configuración por defecto que se realiza en 
  el archivo app/config/config,yml:

```yaml
# app/config/config.yml
framework:
    translator: { fallbacks: [es] }
```

  Otra forma es definirlo en la configuración de las rutas:

```yaml
# app/config/routing.yml
contact:
    path:     /{_locale}/contact
    defaults: { _controller: AppBundle:Contact:index }
    requirements:
        _locale: en|fr|de
```

  Otra forma es ajustarlo a los parámetros que un usuario requiera, para esto se define un event listener
  al evento request y se le setea el locale deseado a la petición (request):

```php
<?php

public function onKernelRequest(GetResponseEvent $event) {
    $request = $event->getRequest();
    $request->setLocale($locale);
}

```

**k. Dada una tabla de “empleados”, otra de “solicitudes” (por ej solicitud de revisión médica o de algún
  tipo de documentación) y otra “estados” donde se define el histórico de estados de estas, forma la
  query necesaria para obtener de un solo empleado la información de este, de las solicitudes y sus
  estados**

```sql  
  SELECT e.id, e.cargo, e.departamento, e.dni, e.nombre, e.apellido,
         s.id AS solicitud_id, s.descripcion AS solicitud_descripcion, s.ultimo_estado AS solicitud_ultimo_estado,
         t.estado AS solicitud_estado
    FROM empleado e 
    LEFT JOIN solicitud s ON e.id = s.empleado_id
    LEFT JOIN estado t ON s.id = t.solicitud_id
```

**l. Describe brevemente las técnicas o mecanismos que conozcas para validar un campo de tipo fecha (dd/mm/yyyy) recibido en una petición post utilizando php.**

```php
<?php

    public static function isValidate(string $date): bool {
        list($day, $month, $year) = explode('/', $date);
        return checkdate((int)$month, (int)$day, (int)$year);
    }
 
```