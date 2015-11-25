module.exports = ['$scope','$stateParams','GroupFactory', function($scope,$stateParams,GroupFactory) {
  var id = $stateParams.id;
  //$scope.newsObj = {};

  GroupFactory.getNews().then(function(result) {
    console.log(result);
    console.log('ID:'+id+" obj: "+result);
    result.forEach(function(item) {
      if(item.id == id){
        $scope.newsObj = item;
        this.newsObj = item;
        console.log('finded');
        return;
      }
    });
  });
  
  
  
  
}];
