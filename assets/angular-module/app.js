var usercontroller = function(){
	sayHello();
}

sayHello = function(){
	console.log('hello')
}


angular.module('pfinderApp',[])
.controller('usercontroller',usercontroller);

