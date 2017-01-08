Simple Restful API for testing purpose

api_token: hostname/get_api_token
POST {"email": "user@laravel.api","password": "password"}
or GET: hostname/get_api_token?email=user@laravel.api&password=password

Get all movies: hostname/api/movie?api_token={api_token} GET
Get movie by id: hostname/api/movie/{id}?api_token={api_token} GET
Create new movies: hostname/api/movie?api_token={api_token} POST {JSON}
Update movie by id: hostname/api/movie/{id}?api_token={api_token} PATCH/PUT {JSON}
