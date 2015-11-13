module.exports = ['$http','$state','$q','AuthFactory',function($http,$state,$q,AuthFactory) {
  if(AuthFactory.isAuthorized()){
    var users;
    
    function error(result) {
      if(result.status == 401){
        AuthFactory.setAuthorize(false);
        $state.go('login');
      }
    }
    
   
    
    
    function getNews() {
      return httpGroup('/group/getNews');
    }
    
    function getGroup() {
      return httpGroup('/group/getGroup');  
    }
    
    function getUsers() {
      var def = $q.defer();
      $http.get('/group/getUsers').then(function(result) {
        def.resolve(result.data);
      }, error);
      return def.promise;
    }
    
    function getStaticBlocks() {
      return httpGroup('/group/getStaticBlocks');
    }
    
    function getFiles() {
      return httpGroup('/group/getFiles');
    }
    
    return {
      getNews: getNews,
      getGroup: getGroup,
      getUsers: getUsers,
      getStaticBlocks: getStaticBlocks,
      getFiles: getFiles
    };
  }else{
    $state.go('login');
  }
}];
