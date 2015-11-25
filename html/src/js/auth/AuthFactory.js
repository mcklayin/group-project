module.exports = ['$cookies', function($cookies) {
  
  function isAuthorized() {
    return ($cookies.get('auth') === 'true');
  }
  
  function setAuthorize(auth) {
    $cookies.put('auth',auth);
  }
  
  return {
    isAuthorized: isAuthorized,
    setAuthorize: setAuthorize    
  }

}];
