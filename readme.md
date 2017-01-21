Simple Restful API for testing purpose

api_token: hostname/api/user
POST {"email": "user@laravel.api","password": "password"}
or GET: hostname/api/user?email=user@laravel.api&password=password

Get all movies: hostname/api/movies?api_token={api_token} GET
Get movie by id: hostname/api/movie/{id}?api_token={api_token} GET
Create new movies: hostname/api/movie?api_token={api_token} POST {JSON}
Update movie by id: hostname/api/movie/{id}?api_token={api_token} PATCH/PUT {JSON}
