flApp.controller('profileController', ['$scope', function($scope) {
	$scope.editInfor = 0;
	$scope.editInforUser =function(){
		$scope.editInfor = 1 - $scope.editInfor;
	};
	$scope.cancelEditUser = function() {
		$scope.editInfor = 0;
	};
	$scope.inPage = function(index, page, pageSize) {
		return (index >= page * pageSize) && (index < (page + 1) * pageSize);
	};
	$scope.totalPage = function(numberOfItem, pageSize) {
		var rs = Math.ceil(numberOfItem / pageSize);
		return rs;
	};
	$scope.range = function(min, max, step) {
		var rs = [];
		for(var i = min; i <= max; i+= step) {
			rs.push(i);
		}
		return rs;
	};
	$scope.selectEnglishTestPage = function(page) {
		$scope.selectedEnglishTestPage = page;
	};
	$scope.selectTestPage = function (page) {
		$scope.selectedTestPage = page;
	};
	$scope.selectTestSetPage = function (page) {
		$scope.selectedTestSetPage = page;
	};

	// edit user
	$scope.userDetail= {};
	$scope.editUser = function(){
		if(!$scope.userDetail.name || !$scope.userDetail.phone || !$scope.userDetail.areacode || !$scope.userDetail.birthday || !$scope.userDetail.address){
			return false;
		}
		$scope.userDetail.userId= sessionUserId;
		jQuery.post(FL_API_URL+'/profile/editUser', $scope.userDetail, function(resp) {
			
		  	if(resp) {		  		
		  		$scope.success = resp.success;
		  		$scope.message ='<strong>' +resp.message+ '</strong>';
		  		$scope.$apply();
		  	}
		});		
	};
	$scope.editPassword = {};
	$scope.changePassword = function(){
		if(!$scope.editPassword.newPassword || !$scope.editPassword.reNewPassword || !$scope.editPassword.oldPassword){
			return false;
		}
		if($scope.editPassword.newPassword != $scope.editPassword.reNewPassword){
			$scope.editPassword.success = 0;
		  	$scope.editPassword.message ='<strong> Nhập lại mật khẩu mới chưa đúng</strong>';
		  	$scope.$apply();
		}else{
			$scope.editPassword.userId= sessionUserId;
			jQuery.post(FL_API_URL+'/profile/editPassword', $scope.editPassword, function(resp) {
				
			  	if(resp) {		  		
			  		$scope.editPassword.success = resp.success;
			  		$scope.editPassword.message ='<strong>' +resp.message+ '</strong>';
			  		$scope.$apply();
			  	}
			});
		}
			
	};
	$scope.createObjectURL = function(object){
	    return (window.URL) ? window.URL.createObjectURL(object) : window.webkitURL.createObjectURL(object);
	};
	$scope.revokeObjectURL= function(url) {
	    return (window.URL) ? window.URL.revokeObjectURL(url) : window.webkitURL.revokeObjectURL(url);
	};
	$scope.inputFile= 'Choose file';
	$scope.editAvatar= {};
	$scope.changeAvatar = function(){		
	    var userAvatar = document.getElementById("avatar");
		if(!userAvatar){
			return false;
		}		
		if(userAvatar.files.length) {
			if ('name' in userAvatar.files[0]) {
                var txt = "name: " + userAvatar.files[0].name;
                $scope.inputFile= txt;
            }	       
			var reader = new FileReader();
			reader.onloadend = function() {
			  	var base64_avatar = reader.result;
			    //console.log(base64_avatar);
			    jQuery.post('http://s1.nextnobels.com/upload.php', {avatar: base64_avatar, user_id: sessionUserId }, function(resp) {
			    	//console.log(resp);
			    	if(resp){
			    		console.log(resp);
			    		$scope.editAvatar.userId= sessionUserId;
			    		$scope.editAvatar.urlAvatar= 'http://s1.nextnobels.com/uploads/avatar/' + resp ;
			    		jQuery.post(FL_API_URL+'/profile/editAvatar', $scope.editAvatar, function(resp) {
						  	if(resp) {		  		
						  		$scope.editAvatar.success = resp.success;
						  		$scope.editAvatar.message ='<strong>' +resp.message+ '</strong>';
								  $scope.$apply();
								  window.location.reload();
						  	}
						});
			    	}
			    });

			}
	  		reader.readAsDataURL(userAvatar.files[0]);

	        
	    }
	    		
		
	};
	

	$scope.userDetail = [];
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/profile/getUser', 
		data: {
			userId: sessionUserId
		},
		dataType: 'json',
		success: function(resp) {
			$scope.userDetail = resp;
			$scope.userDetail.birthday = new Date($scope.userDetail.birthday);
			$scope.$apply();
		}
	});
	// Lessons
	$scope.lessonQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countLessons', 
		data: {
			userId: sessionUserId			
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.lessonQuantity = result;
			$scope.$apply();
		}
	});
	$scope.lessons = [];
	$scope.subjectNames = {};
	$scope.getSubjects = function(){
		var subjects= {};
		subjects['s51'] = 'Mathematics';
		subjects['s52'] = 'Science';
		subjects['s164'] = 'English';
		subjects['s157'] = 'Literature';
		subjects['s53'] = 'History';
		subjects['s50'] = 'Geography';
		subjects['s87'] = 'Life Skills';
		subjects['s59'] = 'Social Understanding';
		subjects['s88'] = 'Observing Listening';
		subjects['s54'] = 'Language And Communication';		
		$scope.subjectNames = subjects;		
	};
	$scope.getSubjects();
	$scope.getSubject= function(subjectId){		
		return $scope.subjectNames['s' +subjectId];
	};
	$scope.lessonPage = function(page){
		$scope.lessonPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getLessons', 
			data: {
				userId: sessionUserId,
				numberPage: page
			},
			dataType: 'json',
			success: function(resp) {
				$scope.lessons = resp;
						
				$scope.$apply();			
			}
		});
	};
	$scope.lessonPage(0);
	// On luyen tong hop
	$scope.testQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countTests', 
		data: {
			userId: sessionUserId,
			categoryId: 1412
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.testQuantity = result;
			$scope.$apply();
		}
	});
	$scope.historyTests = [];	
	$scope.testPage = function(page){
		$scope.testPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getTests', 
			data: {
				userId: sessionUserId,
				categoryId: 1412,
				numberPage: page
			},
			dataType: 'json',
			success: function(resp) {
				$scope.historyTests = resp;
				$scope.$apply();
			}
		});
	};
	$scope.testPage(0);
	// On luyen tieng Anh
	$scope.testEQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countTests', 
		data: {
			userId: sessionUserId,
			categoryId: 1411
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.testEQuantity = result;
			$scope.$apply();
		}
	});
	$scope.testEnglish = [];	
	$scope.testEPage = function(page){
		$scope.testEPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getTests', 
			data: {
				userId: sessionUserId,
				categoryId: 1411,
				numberPage: page
			},
			dataType: 'json',
			success: function(resp) {
				$scope.testEnglish = resp;
				$scope.$apply();
			}
		});
	};
	$scope.testEPage(0);
	// Thi thu Tran Dai Nghia
	$scope.tdnTestQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countTests', 
		data: {
			userId: sessionUserId,
			categoryId: 1413
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.tdnTestQuantity = result;
			$scope.$apply();
		}
	});
	$scope.tdnTests = [];	
	$scope.tdnTestPage = function(page){
		$scope.tdnTestPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getTests', 
			data: {
				userId: sessionUserId,
				categoryId: 1413,
				numberPage: page	
			},
			dataType: 'json',
			success: function(resp) {
				$scope.tdnTests = resp;
				$scope.$apply();
			}
		});
	};
	$scope.tdnTestPage(0);
	// De thi chinh thuc cac nam
	$scope.tdnRealTestQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countTests', 
		data: {
			userId: sessionUserId,
			categoryId: 1414
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.tdnRealTestQuantity = result;
			$scope.$apply();
		}
	});
	$scope.tdnRealTests = [];	
	$scope.tdnRealTestPage = function(page){
		$scope.tdnRealTestPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getTests', 
			data: {
				userId: sessionUserId,
				categoryId: 1414,
				numberPage: page	
			},
			dataType: 'json',
			success: function(resp) {
				$scope.tdnRealTests = resp;
				$scope.$apply();
			}
		});
	};
	$scope.tdnRealTestPage(0);

	// Tong hop de thi
	$scope.testAllQuantity = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/history/countTestAlls', 
		data: {
			userId: sessionUserId			
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.testAllQuantity = result;
			$scope.$apply();
		}
	});
	$scope.testAlls = [];	
	$scope.testAllPage = function(page){
		$scope.testAllPageSelected = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/history/getTestAlls', 
			data: {
				userId: sessionUserId,				
				numberPage: page	
			},
			dataType: 'json',
			success: function(resp) {
				$scope.testAlls = resp;
				$scope.$apply();
			}
		});
	};
	$scope.testAllPage(0);

	$scope.register = {};
	$scope.doRegister = function (url) {
		if (!$scope.register.username || !$scope.register.name || !$scope.register.password || !$scope.register.repassword || !$scope.register.phone || !$scope.register.email || !$scope.register.sex || !$scope.register.areacode) {
			return false;
		}
		$scope.register.url = url;
		if ($scope.register.password == $scope.register.repassword) {
			jQuery.post(FL_API_URL + '/register/userRegister', $scope.register, function (resp) {
				$scope.register.success = resp.success;
				$scope.register.message = resp.message;
				$scope.$apply();
				if (resp.success) {
					window.location = resp.url;
				}
			});

		} else {
			$scope.register.success = 0;
			$scope.register.message = "Mật khẩu tài khoản nhập lại không chính xác";

		}

	};
	$scope.login = {};
	$scope.doLogin = function (url) {
		if (!$scope.login.username || !$scope.login.password) {
			return false;
		}
		$scope.login.url = url;
		jQuery.post(FL_API_URL + '/login/userLogin', $scope.login, function (resp) {
			$scope.login.success = resp.success;
			$scope.login.message = resp.message;
			$scope.$apply();
			if (resp.success) {
				window.location = resp.url;
			}

		});
	};
	// get AreaCode
	$scope.areaCodes = [];
	proxy_ajax({
		url: FL_API_URL + '/register/getAreaCode', success: function (resp) {
			$scope.areaCodes = resp;
			$scope.$apply();
		}
	});


	// Error subject
	$scope.pageErrorSubject = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/profile/countErrorSubject', 
		data: {
			userId: sessionUserId			
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.pageErrorSubject = result;
			$scope.$apply();
		}
	});
	$scope.errorSubjects = [];	
	$scope.paginationErrorSubject = function(page){
		$scope.selectedErrorSubjectsPage = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/profile/getErrorSubject', 
			data: {
				userId: sessionUserId,				
				numberPage: page,
				numberRow: 20

			},
			dataType: 'json',
			success: function(resp) {
				$scope.errorSubjects = resp;
				$scope.$apply();
			}
		});
	};
	$scope.paginationErrorSubject(0);

	// Error test
	$scope.pageErrorTest = 0;
	proxy_ajax({
		type: 'post',
		url: FL_API_URL +'/profile/countErrorTest', 
		data: {
			userId: sessionUserId			
		},
		dataType: 'json',
		success: function(resp) {
			var quantity = Math.ceil(resp/20);
		    var result= [];
		    for(i =0; i< quantity; i++){
		      result.push(i);
		    }
			$scope.pageErrorTest = result;
			$scope.$apply();
		}
	});
	$scope.errorTests = [];	
	$scope.paginationErrorSubject = function(page){
		$scope.selectedErrorTestPage = page;
		proxy_ajax({
			type: 'post',
			url: FL_API_URL +'/profile/getErrorTest', 
			data: {
				userId: sessionUserId,				
				numberPage: page,
				numberRow: 20

			},
			dataType: 'json',
			success: function(resp) {
				$scope.errorTests = resp;
				$scope.$apply();
			}
		});
	};
	$scope.paginationErrorSubject(0);
	$scope.errorStatus = function (status) {
		switch(status){
			case 1:
			return 'Đã trả lời';
			case -1: 
			return 'Đóng';
			case 0:
			return 'Chưa trả lời';
		}
	};
}]);