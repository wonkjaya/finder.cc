var app = angular.module('pfinderApp',["angucomplete-alt"]);

app.controller('userForm',userForm);
app.controller('detailUser',detailUser);

userForm.$inject=['$scope','$http'];
function userForm($scope,$http){
	$scope.levelVal='';
	$scope.accountEmail=false;
	$scope.accountPass=false;
	
	$scope.changeValLevel=function(id){
		$scope.levelVal=getLevelVal(id);
	}
	$scope.sendRegistration=function(formName){
		if($scope.accountEmail && $scope.accountPassword){
			var id=document.getElementById(formName);
			id.submit();
		}else{
			alert("gak boleh kosong");
		}
	}
}

function getLevelVal(id){
	if(id === '00') return 'Administrator';
	if(id === '01') return 'Editor';
	if(id === '02') return 'Pengguna';
	if(id === '03') return 'Pedagang';
	return 'Tidak Ada';
}

detailUser.$inject=['$scope','$http','$location'];
function detailUser($scope,$http,$location){
	$scope.levelVal=function(id){
		return getLevelVal('0' + id);
	};
	$scope.findLoc=function(id){
		var url=$location.host() + '/api/kelurahan/findById/?q=' + id;
		console.log(url);
		try{
		$http.get(url).then(function(res){
			return res;
		});
		}catch(e){
			console.log(e);
		}
		return '';
	};
}