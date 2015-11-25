module.exports = ['$http','$state','$q','AuthFactory',function($http,$state,$q,AuthFactory) {
  if(AuthFactory.isAuthorized()){
    
    function error(result) {
      if(result.status == 401){
        AuthFactory.setAuthorize(false);
        $state.go('login');
      }
    }
    
    function getGroup() {
      var def = $q.defer();
      $http.get('/group/getGroup').then(function(result) {
        def.resolve(result.data);
      }, error);
      return def.promise;
    }

    function getNews() {
      var def = $q.defer();
      $http.get('/group/getNews').then(function(result) {
        def.resolve(result.data);
      }, error);
      return def.promise;
    }
    
    function getUsers() {
      var def = $q.defer();
      $http.get('/group/getUsers').then(function(result) {
        def.resolve(result.data);
      }, error);
      return def.promise;
    }
    
    function getFiles() {
      var def = $q.defer();
      $http.get('/group/getFiles').then(function(result) {
        def.resolve(result.data);
      }, error);
      return def.promise;
    }
    
    return {
      getNews: getNews,
      getGroup: getGroup,
      getUsers: getUsers,
      getFiles: getFiles
    };
    
  }else{
    $state.go('login');
  }
}];
