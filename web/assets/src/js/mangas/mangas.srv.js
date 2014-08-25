angular.module('api')
  .factory("Mangas", function ($resource) {
    return $resource(
        "/api/mangas/:id",
        {id: "@id" }
    );
});
