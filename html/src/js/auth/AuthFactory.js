module.exports = ['$cookies',function($cookies) {
  var authorized = $cookies.get('auth')?$cookies.get('auth'):false;
  
  function isAuthorized() {
    return authorized;
  }
  
  function setAuthorize(auth) {
    authorized = auth;
    $cookies.put('auth',auth);
  }
  
  return {
    isAuthorized: isAuthorized,
    setAuthorize: setAuthorize    
  }

}];
